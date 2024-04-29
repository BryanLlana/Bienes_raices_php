<?php
  require "../includes/helpers/index.php";
  renderTemplate("header");
?>
<main class="container section">
  <h1>Administrador de Bienes Raices</h1>

  <a href="/admin/properties/create.php" class="btn-green">Nueva propiedad</a>
</main>
<?php
  renderTemplate("footer");
?>