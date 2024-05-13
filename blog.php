<?php
  require './includes/app.php';
  renderTemplate('header')
?>
  <main class="container section content-center">
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

            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
            </p>
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
            <p>Escrito el: <span>20/01/2021</span> por: <span>Admin</span></p>

            <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
          </a>
        </div>
      </article>
    </section>
  </main>
<?php 
  renderTemplate('footer')
?>