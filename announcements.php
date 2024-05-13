<?php
  require './includes/app.php';
  renderTemplate('header')
?>
  <main class="container section">
    <section class="section container">
      <h2>Casas y depas en venta</h2>
  
      <?php 
        $limit = 50;
        include './includes/templates/announcements.php'
      ?>
    </section>
  </main>
<?php 
  renderTemplate('footer')
?>