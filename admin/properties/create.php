<?php
//* DATABASE
require '../../includes/config/database.php';
$database = connectDatabase();

//* GET SELLERS
$queryGetSellers = "SELECT * FROM sellers";
$resultGetSellers = mysqli_query($database, $queryGetSellers);

$errors = [];

$title = '';
$price = '';
$image = '';
$description = '';
$bedrooms = '';
$wc = '';
$parkings = '';
$seller_id = '';

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

  if (!$title || !$price || !$image['name'] || !$description || !$bedrooms || !$wc || !$parkings || !$seller_id) {
    $errors[] = "Todos los campos son obligatorios";
  }

  if (empty($errors)) {
    //* UPLOAD IMAGE
    $fileImages = '../../images';
    if (!is_dir($fileImages)) {
      mkdir($fileImages);
    }

    $nameImage = md5(uniqid(rand(), true)) . '.jpg';
    move_uploaded_file($image['tmp_name'], $fileImages . '/' . $nameImage);

    //* INSERTAR A LA BASE DE DATOS
    $queryInsertProperty = "INSERT INTO properties (title, price, image, description, bedrooms, wc, parkings, createdAt, seller_id) VALUES ('{$title}', '{$price}', '{$nameImage}', '{$description}', '{$bedrooms}', '{$wc}', '{$parkings}', '{$createdAt}', '{$seller_id}')";

    $resultInsertProperty = mysqli_query($database, $queryInsertProperty);
    if ($resultInsertProperty) {
      header("Location: /admin?result=1");
    }
  }
}

require "../../includes/helpers/index.php";
renderTemplate("header");
?>
<main class="container section">
  <h1>Crear propiedad</h1>
  <a href="/admin" class="btn-green">Volver</a>

  <?php foreach ($errors as $error) { ?>
    <div class="alert error">
      <?php echo $error ?>
    </div>
  <?php } ?>

  <form class="form" method="post" action="/admin/properties/create.php" enctype="multipart/form-data">
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

    <input type="submit" class="btn-green" value="Crear propiedad">
  </form>
</main>
<?php
renderTemplate("footer");
?>