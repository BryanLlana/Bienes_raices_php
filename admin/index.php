<?php
  require "../includes/app.php";
  use App\Property;
  
  if (!isAuthenticated()) {
    header('Location: /');
  }

  $properties = Property::all();

  $result = $_GET['result'] ?? null;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
      $property = Property::findOne($id);

      $fileImages = '../images';
      unlink($fileImages . '/' . $property->image);

      $result = $property->delete();

      if ($result) {
        header('location: /admin?result=3');
      }
    }
  }

  renderTemplate("header");
?>
<main class="container section">
  <h1>Administrador de Bienes Raices</h1>
  <?php if (intval($result) === 1) { ?>
    <div class="alert success">Anuncio creado correctamente</div>
  <?php } elseif (intval($result) === 2) { ?>
    <div class="alert success">Anuncio modificado correctamente</div>
  <?php } elseif (intval($result) === 3) { ?>
    <div class="alert success">Anuncio eliminado correctamente</div>
  <?php } ?>

  <a href="/admin/properties/create.php" class="btn-green">Nueva propiedad</a>

  <table class="properties">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($properties as $property) { ?>
        <tr>
          <td><?php echo $property->id ?></td>
          <td class="title"><?php echo $property->title ?></td>
          <td><img src="../images/<?php echo $property->image ?>" class="image-table" alt=""></td>
          <td>$ <?php echo $property->price ?></td>
          <td>
            <a href="/admin/properties/update.php?id=<?php echo $property->id ?>" class="btn-yellow-block">Editar</a>
            <form method="post" class="w-100">
              <input type="hidden" name="id" value="<?php echo $property->id ?>">
              <input type="submit" class="btn-red-block" value="Eliminar" />
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</main>
<?php
  mysqli_close($database);
  renderTemplate("footer");
?>