<?php
  require './includes/helpers/index.php';
  renderTemplate('header')
?>
  <main class="container section content-center">
    <h2>Contacto</h2>

    <picture>
      <source srcset="./build/img/destacada3.webp" type="image/webp">
      <source srcset="./build/img/destacada3.jpg" type="image/jpeg">
      <img loading="lazy" src="./build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>
    <form class="form">
      <fieldset>
        <legend>Información personal</legend>
        <label for="name">Nombre</label>
        <input type="text" id="name" placeholder="Ejm: Juan">

        <label for="email">E-mail</label>
        <input type="email" id="email" placeholder="Ejm: juan@gmail.com">

        <label for="phone">Teléfono</label>
        <input type="tel" id="phone" placeholder="Ejm: 245123948">

        <label for="message">Mensaje</label>
        <textarea id="message"></textarea>
      </fieldset>

      <fieldset>
        <legend>Información sobre la propiedad</legend>
        <label for="options">Vende o compra</label>
        <select id="options">
          <option value="" disabled selected>--Seleccione--</option>
          <option value="Compra">Compra</option>
          <option value="Vende">Vende</option>
        </select>

        <label for="budget">Precio o presupuesto</label>
        <input type="number" id="budget" placeholder="Ejm: 3000000">
      </fieldset>

      <fieldset>
        <legend>Información de la propiedad</legend>
        <p>¿Cómo desea ser contactado?</p>
        <div class="form-contact">
          <label for="radio-phone">Teléfono</label>
          <input name="contact" type="radio" id="radio-phone" value="phone">
          <label for="radio-email">E-mail</label>
          <input name="contact" type="radio" id="radio-email" value="email">
        </div>

        <p>Si eligió teléfono, elija la fecha y la hora</p>
        <label for="date">Fecha</label>
        <input type="date" id="date">
        <label for="hour">Hora</label>
        <input type="time" id="hour">
      </fieldset>

      <input type="submit" value="Enviar" class="btn-green">
    </form>
  </main>
<?php 
  renderTemplate('footer')
?>