<?php
require "../../includes/helpers/index.php";
renderTemplate("header");
?>
<main class="container section">
  <h1>Crear propiedad</h1>
  <a href="/admin" class="btn-green">Volver</a>

  <form class="form">
    <fieldset>
      <legend>Información general</legend>
      <label for="title">Título</label>
      <input type="text" id="title" placeholder="Ejm: Casa con alberca">

      <label for="price">Precio</label>
      <input type="number" id="price" placeholder="Ejm: 3000000">

      <label for="image">Imagen</label>
      <input type="file" id="image" accept="image/jpeg, image/png">

      <label for="description">Descripción</label>
      <textarea id="description"></textarea>
    </fieldset>

    <fieldset>
      <legend>Información propiedad</legend>
      <label for="bedrooms">Habitaciones</label>
      <input type="number" id="bedrooms" placeholder="Ejm: 3" min="1" max="9">
      <label for="wc">Baños</label>
      <input type="number" id="wc" placeholder="Ejm: 3" min="1" max="9">
      <label for="parking">Estacionamiento</label>
      <input type="number" id="parking" placeholder="Ejm: 3" min="1" max="9">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>
      <select>
        <option value="" disabled selected>--Seleccione un vendedor--</option>
        <option value="1">Juan</option>
      </select>
    </fieldset>

    <input type="submit" class="btn-green" value="Crear propiedad">
  </form>
</main>
<?php
renderTemplate("footer");
?>