<?php
require "../../includes/app.php";

use App\Property;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!isAuthenticated()) {
  header('Location: /');
}

//* GET SELLERS
$queryGetSellers = "SELECT * FROM sellers";
$resultGetSellers = mysqli_query($database, $queryGetSellers);

$errors = Property::getErrors();
$property = new Property;

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
    <?php include '../../includes/templates/form_property.php' ?>
    <input type="submit" class="btn-green" value="Crear propiedad">
  </form>
</main>
<?php
renderTemplate("footer");
?>