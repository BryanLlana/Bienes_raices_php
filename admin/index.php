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
</main>
<?php
  renderTemplate("footer");
?>