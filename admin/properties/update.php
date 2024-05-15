<?php
require "../../includes/app.php";

use App\Property;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

if (!isAuthenticated()) {
  header('Location: /');
}


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /admin');
}

//* DATABASE
$database = connectDatabase();

//* GET SELLERS
$queryGetSellers = "SELECT * FROM sellers";
$resultGetSellers = mysqli_query($database, $queryGetSellers);

$property = Property::findOne($id);
$errors = Property::getErrors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $property->toSynchronize($_POST);
  $errors = $property->validate();
  
  if (empty($errors)) {
    if ($_FILES['image']['tmp_name']) {
      $manager = new ImageManager(new Driver());
      $image = $manager->read($_FILES['image']['tmp_name'])->scale(800, 600);
      $nameImage = md5(uniqid(rand(), true)) . '.jpg';
      $property->setImage($nameImage);

      $image->save('../../images/' . $nameImage);
    }

    $result = $property->update();
    if ($result) {
      header('Location: /admin?result=2');
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
    <?php include '../../includes/templates/form_property.php' ?>
    <input type="submit" class="btn-green" value="Guardar cambios">
  </form>
</main>
<?php
renderTemplate("footer");
?>