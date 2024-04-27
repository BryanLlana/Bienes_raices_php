<?php
  require './includes/helpers/index.php';
  renderTemplate('header')
?>
  <main class="container section content-center">
    <h2>Casa en frente al bosque</h2>

    <picture>
      <source srcset="./build/img/destacada.webp" type="image/webp">
      <source srcset="./build/img/destacada.jpg" type="image/jpeg">
      <img src="./build/img/destacada.jpg" alt="Imagen de la propiedad">
    </picture>

    <div class="summary-announcement">
      <p class="price">$3,000,000</p>
      <ul class="icons">
        <li>
          <img loading="lazy" src="./build/img/icono_wc.svg" alt="Icono WC">
          <p>3</p>
        </li>
        <li>
          <img loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
          <p>3</p>
        </li>
        <li>
          <img loading="lazy" src="./build/img/icono_dormitorio.svg" alt="Icono habitaciones">
          <p>3</p>
        </li>
      </ul>

      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis nulla eius tenetur illum officiis, rerum sapiente veritatis. Cupiditate, nemo nisi nam blanditiis, aperiam aspernatur, sint eum sed dolores obcaecati quae!</p>
    </div>
  </main>
<?php 
  renderTemplate('footer')
?>