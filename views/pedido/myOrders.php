 <h1>Mis pedidos</h1>

 <table>
 <tr>
   <th>No Pedido</th>
   <th>Coste</th>
   <th>Fecha</th>
 </tr>


 <?php while ($order = $orders->fetch_object()): ?>
  <tr>
    <td>
      <a href="<?=base_url . "pedido/details&id=" . $order->id?>"><?=$order->id?></a>
    </td>
    <td>$<?=$order->coste?></td>
    <td><?=$order->fecha?></td>
  </tr>
<?php endwhile;?>

 </table>