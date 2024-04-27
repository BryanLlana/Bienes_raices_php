<?php
  require './includes/helpers/index.php';
  renderTemplate('header')
?>
  <main class="container section content-center">
    <h2>Guía para la decoración de tu hogar</h2>
    <picture>
      <source srcset="./build/img/blog1.webp" type="image/webp">
      <source srcset="./build/img/blog1.jpg" type="image/jpeg">
      <img src="./build/img/blog1.jpg" alt="Entrada blog">
    </picture>
    <p class="information-meta">Escrito el: <span>20/01/2021</span> por: <span>Admin</span></p>
    <p class="summary-announcement">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero a, rerum neque, qui nihil expedita dignissimos reiciendis molestias officia error mollitia assumenda amet beatae, ipsum doloremque nulla nesciunt impedit odio.</p>
  </main>
<?php 
  renderTemplate('footer')
?>