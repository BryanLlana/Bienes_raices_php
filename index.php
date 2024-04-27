<?php
  $isHomePage = true;
  include './includes/templates/header.php'
?>
  <main class="container section">
    <h2>Más sobre nosotros</h2>

    <div class="icons-us">
      <div class="icon">
        <img src="./build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>La seguridad es nuestra principal prioridad. Nos comprometemos a garantizar que cada transacción se realice de manera segura y transparente, brindando la tranquilidad que nuestros clientes merecen al invertir en propiedades.</p>
      </div>
      <div class="icon">
        <img src="./build/img/icono2.svg" alt="Icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>Ofrecemos un enfoque centrado en el valor para cada una de nuestras propiedades. Nuestro equipo se esfuerza por negociar precios justos y competitivos, asegurando que nuestros clientes obtengan la mejor oferta posible sin comprometer la calidad.</p>
      </div>
      <div class="icon">
        <img src="./build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
        <h3>Tiempo</h3>
        <p>Entendemos la importancia de cumplir con los plazos y compromisos acordados. En nuestra inmobiliaria, nos comprometemos a cumplir con los horarios establecidos, ya sea para mostrar una propiedad o completar cualquier trámite necesario.</p>
      </div>
    </div>
  </main>

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

    <div class="align-right">
      <a href="./announcements.html" class="btn-green">Ver todas</a>
    </div>
  </section>

  <section class="image-contact">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="./contact.html" class="btn-yellow">Contáctanos</a>
  </section>

  <div class="container section section-lower">
    <section class="blog">
      <h2>Nuestro blog</h2>
      <article class="entrance-blog">
        <div class="image">
          <picture>
            <source srcset="./build/img/blog1.webp" type="image/webp">
            <source srcset="./build/img/blog1.jpg" type="image/jpeg">
            <img src="./build/img/blog1.jpg" alt="Entrada blog">
          </picture>
        </div>
        <div class="text-entrance">
          <a href="./entrance.html">
            <h4>Terraza en el techo de tu casa</h4>
            <p class="information-meta">Escrito el: <span>20/01/2021</span> por: <span>Admin</span></p>

            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
          </a>
        </div>
      </article>
      <article class="entrance-blog">
        <div class="image">
          <picture>
            <source srcset="./build/img/blog2.webp" type="image/webp">
            <source srcset="./build/img/blog2.jpg" type="image/jpeg">
            <img src="./build/img/blog2.jpg" alt="Entrada blog">
          </picture>
        </div>
        <div class="text-entrance">
          <a href="./entrance.html">
            <h4>Guía para la decoración de tu hogar</h4>
            <p class="information-meta">Escrito el: <span>20/01/2021</span> por: <span>Admin</span></p>

            <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
          </a>
        </div>
      </article>
    </section>

    <section class="testimonials">
      <h2>Testimoniales</h2>

      <div class="testimonial">
        <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
        <p>- Juan de la Torre</p>
      </div>
    </section>
  </div>
<?php 
  include './includes/templates/footer.php'
?>