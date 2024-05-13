<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  $isAuthenticated = $_SESSION['isAuthenticated'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raíces</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
  <header class="header <?php echo $isHomePage ? 'home' : '' ?>">
    <div class="container content-header">
      <div class="bar">
        <a href="/index.php">
          <img src="/build/img/logo.svg" alt="Logo bienes raices">
        </a>

        <nav class="navigation">
          <a href="/aboutus.php">Nosotros</a>
          <a href="/announcements.php">Anuncios</a>
          <a href="/blog.php">Blog</a>
          <a href="/contact.php">Contacto</a>
          <?php if ($isAuthenticated) { ?>
            <a href="/cerrar-sesion.php">Cerrar sesión</a>
          <?php } ?>
        </nav>
      </div>

      <?php if ($isHomePage) { ?>
        <h1>Venta de casas y departamentos exclusivos de lujo</h1>
      <?php } ?>
    </div>
  </header>