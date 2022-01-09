<?php if (isset($isEdit, $product) && is_object($product)): ?>
  <h1>Editar producto</h1>
  <?php $url_action = base_url . "producto/save&id=" . $product->id;?>
<?php else: ?>
  <h1>Crear nuevos productos</h1>
  <?php $url_action = base_url . "producto/save";?>
<?php endif;?>

<div class="form_container">
  <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nombre</label>
    <input type="text" name="name" value="<?=isset($product) ? $product->nombre : ''?>">

    <label for="description">Descripción</label>
    <textarea name="description" id="" cols="30" rows="5"><?=isset($product) ? $product->descripcion : ''?></textarea>

    <label for="price">Precio</label>
    <input type="text" name="price" value="<?=isset($product) ? $product->precio : ''?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($product) ? $product->stock : ''?>">

    <label for="category">Categoria</label>
    <?php $categories = Utils::showCategories();?>
    <select name="category">
      <?php while ($category = $categories->fetch_object()): ?>
        <option value="<?=$category->id?>" <?=isset($product) && is_object($product) && ($category->id == $product->categoria_id) ? 'selected' : ''?> >
          <?=$category->nombre?>
        </option>
      <?php endwhile;?>
    </select>

    <label for="image">Imagen</label>
    <?php if (isset($product) && is_object($product) && !empty($product->imagen)): ?>
      <img src="<?=base_url . "uploads/images/" . $product->imagen?>" alt="producto" class="thumb">
    <?php endif;?>
    <input type="file" name="image">

    <input type="submit" value="Guardar">
  </form>
</div>