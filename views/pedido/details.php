  <?php if (isset($order)): ?>
    <h3>Dirección de envio</h3>
    <p>Provincia: <?=$order->provincia?></p>
    <p>Ciudad: <?=$order->localidad?></p>
    <p>Dirección: <?=$order->direccion?></p>
    <br>

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