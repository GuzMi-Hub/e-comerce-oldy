<h1>Gestión de productos</h1>
<a href="<?=base_url?>producto/create" class="button button-small">Crear producto</a>

  <?php if (isset($_SESSION['product']) && $_SESSION['product'] == "complete"): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
  <?php elseif (isset($_SESSION['product']) && $_SESSION['product'] != "complete"): ?>
    <strong class="alert_red">El producto NO se ha creado correctamente</strong>
  <?php endif;?>
  <?php Utils::deleteSession("product");?>
  <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete"): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
  <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != "complete"): ?>
    <strong class="alert_red">El producto NO se ha eliminado correctamente</strong>
  <?php endif;?>
  <?php Utils::deleteSession("delete");?>
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
      <td>
        <a href="<?=base_url?>producto/edit&id=<?=$producto->id?>" class="button button-gestion">Editar</a>
        <a href="<?=base_url?>producto/remove&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
      </td>
    </tr>
    <?php endwhile;?>
</table>