<?php
require "../../includes/helpers/index.php";

if (!isAuthenticated()) {
  header('Location: /');
}

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}

//* DATABASE
require '../../includes/config/database.php';
$database = connectDatabase();

//* GET SELLERS
$queryGetSellers = "SELECT * FROM sellers";
$resultGetSellers = mysqli_query($database, $queryGetSellers);

//* GET PROPERTY
$queryGetProperty = "SELECT * FROM properties WHERE id = '{$id}'";
$resultGetProperty = mysqli_query($database, $queryGetProperty);
$property = mysqli_fetch_assoc($resultGetProperty);

$errors = [];

$title = $property['title'];
$price = $property['price'];
$description = $property['description'];
$bedrooms = $property['bedrooms'];
$wc = $property['wc'];
$parkings = $property['parkings'];
$seller_id = $property['seller_id'];
$imageProperty = $property['image'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $title = mysqli_real_escape_string($database, $_POST['title']);
  $price = mysqli_real_escape_string($database, $_POST['price']);
  $image = $_FILES['image'];
  $description = mysqli_real_escape_string($database, $_POST['description']);
  $bedrooms = mysqli_real_escape_string($database, $_POST['bedrooms']);
  $wc = mysqli_real_escape_string($database, $_POST['wc']);
  $parkings = mysqli_real_escape_string($database, $_POST['parkings']);
  $seller_id = mysqli_real_escape_string($database, $_POST['seller_id']);
  $createdAt = date('Y/m/d'); 

  if (!$title || !$price || !$description || !$bedrooms || !$wc || !$parkings || !$seller_id) {
    $errors[] = "Todos los campos son obligatorios";
  }

  if (empty($errors)) {
    $fileImages = '../../images';
    $nameImage = '';
    if ($image['name']) {
      unlink($fileImages . '/' . $property['image']);
      $nameImage = md5(uniqid(rand(), true)) . '.jpg';
      move_uploaded_file($image['tmp_name'], $fileImages . '/' . $nameImage);
    } else {
      $nameImage = $property['image'];
    }

    //* ACTUALIZAR BASE DE DATOS
    $queryUpdateProperty = "UPDATE properties SET title = '{$title}', price = '{$price}', description = '{$description}', bedrooms ='{$bedrooms}', wc = '{$wc}', parkings = '{$parkings}', seller_id = '{$seller_id}', image = '{$nameImage}' WHERE id = '{$id}'";

    $resultUpdateProperty = mysqli_query($database, $queryUpdateProperty);
    if ($resultUpdateProperty) {
      header("Location: /admin?result=2");
    }
  }
}

renderTemplate("header");
?>
<main class="container section">
  <h1>Actualizar propiedad</h1>
  <a href="/admin" class="btn-green">Volver</a>

  <?php foreach ($errors as $error) { ?>
    <div class="alert error">
      <?php echo $error ?>
    </div>
  <?php } ?>

  <form class="form" method="post" action="/admin/properties/update.php?id=<?php echo $id ?>" enctype="multipart/form-data">
    <fieldset>
      <legend>Información general</legend>
      <label for="title">Título</label>
      <input
        type="text"
        id="title"
        name="title"
        value="<?php echo $title ?>" 
        placeholder="Ejm: Casa con alberca"
      >

      <label for="price">Precio</label>
      <input
        type="number"
        id="price"
        name="price"
        value="<?php echo $price ?>" 
        placeholder="Ejm: 3000000"
      >

      <label for="image">Imagen</label>
      <input
        type="file"
        id="image"
        name="image"
        accept="image/jpeg, image/png"
      >

      <img src="/images/<?php echo $imageProperty ?>" alt="Image propiedad" class="small-image">

      <label for="description">Descripción</label>
      <textarea id="description" name="description"><?php echo $description ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información propiedad</legend>
      <label for="bedrooms">Habitaciones</label>
      <input
        type="number"
        id="bedrooms"
        name="bedrooms"
        value="<?php echo $bedrooms ?>"
        placeholder="Ejm: 3"
        min="1"
        max="9"
      >
      <label for="wc">Baños</label>
      <input
        type="number"
        id="wc"
        name="wc"
        value="<?php echo $wc ?>"
        placeholder="Ejm: 3"
        min="1"
        max="9"
      >
      <label for="parking">Estacionamiento</label>
      <input
        type="number"
        id="parking"
        name="parkings"
        value="<?php echo $parkings ?>"
        placeholder="Ejm: 3"
        min="1"
        max="9"
      >
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>
      <select name="seller_id">
        <option value="" disabled selected>--Seleccione un vendedor--</option>
        <?php while($seller = mysqli_fetch_assoc($resultGetSellers)) { ?>
          <option
            <?php echo $seller['id'] === $seller_id ? 'selected' : '' ?>
            value="<?php echo $seller['id'] ?>"
          ><?php echo $seller['name'] . " " . $seller['lastname'] ?>
          </option>
        <?php } ?>
      </select>
    </fieldset>

    <input type="submit" class="btn-green" value="Guardar cambios">
  </form>
</main>
<?php
renderTemplate("footer");
?>