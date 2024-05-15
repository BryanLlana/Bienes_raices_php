<fieldset>
  <legend>Información general</legend>
  <label for="title">Título</label>
  <input type="text" id="title" name="title" value="<?php echo sanitize($property->title) ?>" placeholder="Ejm: Casa con alberca">

  <label for="price">Precio</label>
  <input type="number" id="price" name="price" value="<?php echo sanitize($property->price) ?>" placeholder="Ejm: 3000000">

  <label for="image">Imagen</label>
  <input type="file" id="image" name="image" accept="image/jpeg, image/png">

  <?php if (!empty($property->image)) { ?>
    <img src="/images/<?php echo $property->image ?>" alt="Image propiedad" class="small-image">
  <?php } ?>

  <label for="description">Descripción</label>
  <textarea id="description" name="description"><?php echo sanitize($property->description) ?></textarea>
</fieldset>

<fieldset>
  <legend>Información propiedad</legend>
  <label for="bedrooms">Habitaciones</label>
  <input type="number" id="bedrooms" name="bedrooms" value="<?php echo sanitize($property->bedrooms) ?>" placeholder="Ejm: 3" min="1" max="9">
  <label for="wc">Baños</label>
  <input type="number" id="wc" name="wc" value="<?php echo sanitize($property->wc) ?>" placeholder="Ejm: 3" min="1" max="9">
  <label for="parking">Estacionamiento</label>
  <input type="number" id="parking" name="parkings" value="<?php echo sanitize($property->parkings) ?>" placeholder="Ejm: 3" min="1" max="9">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>
  <select name="seller_id">
    <option value="" disabled selected>--Seleccione un vendedor--</option>
    <?php while ($seller = mysqli_fetch_assoc($resultGetSellers)) { ?>
      <option <?php echo $seller['id'] === $property->seller_id ? 'selected' : '' ?> value="<?php echo $seller['id'] ?>"><?php echo $seller['name'] . " " . $seller['lastname'] ?>
      </option>
    <?php } ?>
  </select>
</fieldset>