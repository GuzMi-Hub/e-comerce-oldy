<h1>Carrito de la compra</h1>

<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
<table>
	<tr>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Precio</th>
		<th>Unidades</th>
		<th>Eliminar</th>
	</tr>
	<?php
foreach ($shoppingCart as $key => $value):
  $product = $value['product'];
  ?>

						<tr>
							<td>
								<?php if ($product->imagen != null): ?>
									<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" class="img_carrito" />
								<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" />
			<?php endif;?>
		</td>
		<td>
			<a href="<?=base_url?>producto/show&id=<?=$product->id?>"><?=$product->nombre?></a>
		</td>
		<td>
			<?=$product->precio?>
		</td>
		<td>
			<?=$value['amount']?>
			<div class="updown-unidades">
				<a href="<?=base_url?>ShoppingCart/down&index=<?=$key?>" class="button">-</a>
				<a href="<?=base_url?>ShoppingCart/up&index=<?=$key?>" class="button">+</a>
			</div>
		</td>
		<td>
			<a href="<?=base_url?>ShoppingCart/delete&index=<?=$key?>" class="button button-carrito button-red">Quitar producto</a>
		</td>
	</tr>

	<?php endforeach;?>
</table>
<br/>
<div class="delete-carrito">
	<a href="<?=base_url?>ShoppingCart/delete_all" class="button button-delete button-red">Vaciar carrito</a>
</div>
<div class="total-carrito">
	<?php $stats = Utils::statsCart();?>
	<h3>Precio total: <?=$stats['total']?> $</h3>
	<a href="<?=base_url?>pedido/realize" class="button button-pedido">Hacer pedido</a>
</div>

<?php else: ?>
	<p>El carrito está vacio, añade algun producto</p>
<?php endif;?>