<?php
require "../../includes/app.php";

use App\Property;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!isAuthenticated()) {
  header('Location: /');
}

$database = connectDatabase();

//* GET SELLERS
$queryGetSellers = "SELECT * FROM sellers";
$resultGetSellers = mysqli_query($database, $queryGetSellers);

$errors = Property::getErrors();

$title = '';
$price = '';
$image = '';
$description = '';
$bedrooms = '';
$wc = '';
$parkings = '';
$seller_id = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $property = new Property($_POST);

  //* Nombre de la imagen
  if ($_FILES['image']['tmp_name']) {
    $manager = new ImageManager(new Driver());
    $image = $manager->read($_FILES['image']['tmp_name'])->scale(800, 600);
    $nameImage = md5(uniqid(rand(), true)) . '.jpg';
    $property->setImage($nameImage);
  }

  $errors = $property->validate();

  if (empty($errors)) {
    $fileImages = '../../images';
    if (!is_dir($fileImages)) {
      mkdir($fileImages);
    }
    //* Guardar imagen en el servidor
    $image->save($fileImages . '/' . $nameImage);
    $resultInsertProperty = $property->save();

    if ($resultInsertProperty) {
      header('Location: /admin?result=1');
    }
  }
}

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
      <input type="text" id="title" name="title" value="<?php echo $property->title ?>" placeholder="Ejm: Casa con alberca">

      <label for="price">Precio</label>
      <input type="number" id="price" name="price" value="<?php echo $property->price ?>" placeholder="Ejm: 3000000">

      <label for="image">Imagen</label>
      <input type="file" id="image" name="image" accept="image/jpeg, image/png">

      <label for="description">Descripción</label>
      <textarea id="description" name="description"><?php echo $property->description ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información propiedad</legend>
      <label for="bedrooms">Habitaciones</label>
      <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $property->bedrooms ?>" placeholder="Ejm: 3" min="1" max="9">
      <label for="wc">Baños</label>
      <input type="number" id="wc" name="wc" value="<?php echo $property->wc ?>" placeholder="Ejm: 3" min="1" max="9">
      <label for="parking">Estacionamiento</label>
      <input type="number" id="parking" name="parkings" value="<?php echo $property->parkings ?>" placeholder="Ejm: 3" min="1" max="9">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>
      <select name="seller_id">
        <option value="" disabled selected>--Seleccione un vendedor--</option>
        <?php while ($seller = mysqli_fetch_assoc($resultGetSellers)) { ?>
          <option <?php echo $seller['id'] === $property->seller_id ? 'selected' : '' ?> value="<?php echo $seller['id'] ?>"><?php echo $seller['name'] . " " . $seller['lastname'] ?>
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