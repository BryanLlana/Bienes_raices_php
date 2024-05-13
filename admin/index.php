<?php
  require "../includes/helpers/index.php";
  
  if (!isAuthenticated()) {
    header('Location: /');
  }

  require '../includes//config/database.php';
  $database = connectDatabase();
  $queryGetProperties = "SELECT * FROM properties";
  $resultGetProperties = mysqli_query($database, $queryGetProperties);

  $result = $_GET['result'] ?? null;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
      $queryGetNameImage = "SELECT image FROM properties WHERE id = {$id}";
      $resultGetNameImage = mysqli_query($database, $queryGetNameImage);
      $property = mysqli_fetch_assoc($resultGetNameImage);

      $fileImages = '../images';
      unlink($fileImages . '/' . $property['image']);

      $queryDeleteProperty = "DELETE FROM properties WHERE id = {$id}";
      $resultDeleteProperty = mysqli_query($database, $queryDeleteProperty);

      if ($resultDeleteProperty) {
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
      <?php while($property = mysqli_fetch_assoc($resultGetProperties)) { ?>
        <tr>
          <td><?php echo $property['id'] ?></td>
          <td class="title"><?php echo $property['title'] ?></td>
          <td><img src="../images/<?php echo $property['image'] ?>" class="image-table" alt=""></td>
          <td>$ <?php echo $property['price'] ?></td>
          <td>
            <a href="/admin/properties/update.php?id=<?php echo $property['id'] ?>" class="btn-yellow-block">Editar</a>
            <form method="post" class="w-100">
              <input type="hidden" name="id" value="<?php echo $property['id'] ?>">
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