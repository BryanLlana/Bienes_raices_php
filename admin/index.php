<?php
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
      <tr>
        <td>1</td>
        <td>Casa en la playa</td>
        <td><img src="../images/771c2d22813ffa0940bf2d6ec00e1387.jpg" class="image-table" alt=""></td>
        <td>120000</td>
        <td>
          <a href="#" class="btn-yellow-block">Editar</a>
          <a href="#" class="btn-red-block">Eliminar</a>
        </td>
      </tr>
    </tbody>
  </table>
</main>
<?php
  renderTemplate("footer");
?>