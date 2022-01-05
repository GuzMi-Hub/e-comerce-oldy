<h1>Crear nuevos productos</h1>

<div class="form_container">
  <form action="<?=base_url?>producto/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name">

    <label for="description">Descripción</label>
    <textarea name="description" id="" cols="30" rows="5"></textarea>

    <label for="price">Precio</label>
    <input type="text" name="price">

    <label for="stock">Stock</label>
    <input type="number" name="stock">

    <label for="category">Categoria</label>
    <?php $categories = Utils::showCategories();?>
    <select name="category">
      <?php while ($category = $categories->fetch_object()): ?>
        <option value="<?=$category->id?>">
          <?=$category->nombre?>
        </option>
      <?php endwhile;?>
    </select>

    <label for="image">Imagen</label>
    <input type="file" name="image">

    <input type="submit" value="Guardar">
  </form>
</div>