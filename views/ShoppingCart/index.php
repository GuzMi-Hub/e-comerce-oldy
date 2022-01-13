<h1>Carrito de la compra</h1>

<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
  </tr>
  <?php foreach ($shoppingCart as $key => $value):
  $product = $value['product'];
  ?>
					    <tr>
					      <td>
					        <?php if (!empty($product->imagen)): ?>
					          <img src="<?=base_url . "uploads/images/" . $product->imagen?>" alt="producto" class="img_carrito">
					        <?php else: ?>
           <img src="<?=base_url?>/assets/img/camiseta.png" alt="producto" class="img_carrito">
          <?php endif;?>
        </td>
        <td>
          <a href="<?=base_url . "producto/show&id=" . $product->id?>">
          <?=$product->nombre?>
          </a>
        </td>
        <td>
        <?="$" . $product->precio?>
        </td>
        <td>
        <?=$value['amount']?>
        </td>
    </tr>
  <?php endforeach;?>
</table>
<br>

<div class="total-carrito">
  <?php $stats = Utils::statsCart();?>
  <h1>Precio total: <?=$stats['total']?></h1>
  <a href="" class="button">Hacer pedido</a>
</div>
