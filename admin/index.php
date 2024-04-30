<?php
  require '../includes//config/database.php';
  $database = connectDatabase();
  $queryGetProperties = "SELECT * FROM properties";
  $resultGetProperties = mysqli_query($database, $queryGetProperties);

  $result = $_GET['result'] ?? null;
  require "../includes/helpers/index.php";
  renderTemplate("header");
?>
<main class="container section">
  <h1>Administrador de Bienes Raices</h1>
  <?php if (intval($result) === 1) { ?>
    <div class="alert success">Anuncio creado correctamente</div>
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
            <a href="#" class="btn-yellow-block">Editar</a>
            <a href="#" class="btn-red-block">Eliminar</a>
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