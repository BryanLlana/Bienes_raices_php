<?php
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if (!$id) {
    header('Location: /');
  }

  require './includes/app.php';
  $database = connectDatabase();

  $queryGetProperty = "SELECT * FROM properties WHERE id = {$id}";
  $resultGetProperty = mysqli_query($database, $queryGetProperty);

  if ($resultGetProperty->num_rows === 0) {
    header('Location: /');
  }

  $property = mysqli_fetch_assoc($resultGetProperty);

  renderTemplate('header')
?>
  <main class="container section content-center">
    <h2><?php echo $property['title'] ?></h2>

    <img src="./images/<?php echo $property['image'] ?>" alt="Imagen de la propiedad">

    <div class="summary-announcement">
      <p class="price">$ <?php echo $property['price'] ?></p>
      <ul class="icons">
        <li>
          <img loading="lazy" src="./build/img/icono_wc.svg" alt="Icono WC">
          <p><?php echo $property['wc'] ?></p>
        </li>
        <li>
          <img loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
          <p><?php echo $property['parkings'] ?></p>
        </li>
        <li>
          <img loading="lazy" src="./build/img/icono_dormitorio.svg" alt="Icono habitaciones">
          <p><?php echo $property['bedrooms'] ?></p>
        </li>
      </ul>

      <p><?php echo $property['description'] ?></p>
    </div>
  </main>
<?php 
  mysqli_close($database);
  renderTemplate('footer')
?>