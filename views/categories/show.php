<?php if (isset($category)): ?>
  <h1><?=$category->nombre?></h1>
  <?php if ($products->num_rows > 0): ?>
      <?php while ($product = $products->fetch_Object()): ?>
      <div class="product">
        <?php if (!empty($product->imagen)): ?>
      <a href="<?=base_url . "producto/show&id=" . $product->id?>">
          <img src="<?=base_url . "uploads/images/" . $product->imagen?>" alt="producto">
        <?php else: ?>
          <img src="<?=base_url?>/assets/img/camiseta.png" alt="producto">
        <?php endif;?>
          <h2><?=$product->nombre?></h2>
      </a>
        <p>$<?=$product->precio?></p>
        <a href="" class="button">Comprar</a>
      </div>
    <?php endwhile?>
  <?php else: ?>
    <p>No hay productos</p>
  <?php endif;?>
<?php else: ?>
  <h1>La categoría no existe</h1>
<?php endif;?>