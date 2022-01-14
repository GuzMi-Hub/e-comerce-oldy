<?php if (isset($_SESSION['order']) && $_SESSION['order'] == "complete"): ?>
  <h1>Tu pedido se ha confirmado</h1>
  <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaraia a la cuenta <strong>156165156165</strong> con el costo del pedido, será procesado y enviado.</p>
  <br>
  <?php if (isset($order)): ?>
    <h3>Datos del pedido:</h3>

    <p>Numero de pedido: #<?=$order->id?></p>
    <p>Total a pagar: $<?=$order->coste?></p>
    <p>Productos:</p>

    <table>
      <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
      </tr>
        <?php while ($product = $products->fetch_object()): ?>
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
             <?=$product->unidades?>
            </td>
          </tr>
        <?php endwhile;?>
    </table>

  <?php endif;?>

<?php elseif (!isset($_SESSION['order']) && !$_SESSION['oder'] == "complete"): ?>
  <h1>Tu pedido No ha podido procesarse</h1>
<?php endif;?>