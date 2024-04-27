<?php
  require './includes/helpers/index.php';
  renderTemplate('header')
?>
  <main class="container section">
    <section class="section container">
      <h2>Casas y depas en venta</h2>
  
      <div class="container-announcements">
        <div class="announcement">
          <picture>
            <source srcset="./build/img/anuncio1.webp" type="image/webp">
            <source srcset="./build/img/anuncio1.jpg" type="image/jpeg">
            <img loading="lazy" src="./build/img/anuncio1.jpg" alt="Anuncio 1">
          </picture>
  
          <div class="content-announcement">
            <h3>Casa de lujo en el lago</h3>
            <p>Casa en el lago con excelente vista, acabados de lujo a un excelente precio.</p>
            <p class="price">$3.000.0000</p>
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
  
            <a href="./announcement.html" class="btn-yellow-block">
              Ver propiedad
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php 
  renderTemplate('footer')
?>