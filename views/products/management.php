<h1>Gestión de productos</h1>
<a href="<?=base_url?>producto/create" class="button button-small">Crear producto</a>

<table>
  <tr>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>PRECIO</th>
    <th>STOCK</th>
  </tr>
  <?php while ($producto = $productos->fetch_object()): ?>
    <tr>
      <td><?=$producto->id;?></td>
      <td><?=$producto->nombre;?></td>
      <td><?=$producto->precio;?></td>
      <td><?=$producto->stock;?></td>
    </tr>
    <?php endwhile;?>
</table>