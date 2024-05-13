<?php
  $database = connectDatabase();
  $queryGetProperties = "SELECT * FROM properties LIMIT {$limit}";
  $resultGetProperties = mysqli_query($database, $queryGetProperties);
?>

<div class="container-announcements">
  <?php while ($property = mysqli_fetch_assoc($resultGetProperties)) { ?>
    <div class="announcement">
      <img loading="lazy" src="./images/<?php echo $property['image'] ?>" alt="Anuncio 1">

      <div class="content-announcement">
        <h3><?php echo $property['title'] ?></h3>
        <p><?php echo $property['description'] ?></p>
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

        <a href="./announcement.php?id=<?php echo $property['id'] ?>" class="btn-yellow-block">
          Ver propiedad
        </a>
      </div>
    </div>
  <?php } ?>
</div>

<?php 
  mysqli_close($database);
?>