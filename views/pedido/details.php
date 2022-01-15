  <?php if (isset($order)): ?>
    <?php if (isset($_SESSION['admin'])): ?>
      <h3>Cambiar estado del pedido</h3>
      <form action="<?=base_url . "pedido/status"?>" method="POST">
        <input type="hidden" value="<?=$order->id?>" name="order_id">
        <select name="status" id="">
          <option value="confirm" <?=$order->estado == "confirm" ? "selected" : ""?>>Pendiente</option>
          <option value="preparation" <?=$order->estado == "preparation" ? "selected" : ""?>>En preparacion</option>
          <option value="ready" <?=$order->estado == "ready" ? "selected" : ""?>>Preparado para enviar</option>
          <option value="sended" <?=$order->estado == "sended" ? "selected" : ""?>>Enviado</option>
        </select>
        <input type="submit" value="Cambiar estado">
      </form>
      <br>
    <?php endif;?>


    <h3>Dirección de envio</h3>
    <p>Estado: <?=Utils::showStatus($order->estado)?></p>
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