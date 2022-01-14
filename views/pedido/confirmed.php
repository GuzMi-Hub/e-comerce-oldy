<?php if (isset($_SESSION['order']) && $_SESSION['order'] == "complete"): ?>
  <h1>Tu pedido se ha confirmado</h1>
  <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaraia con el costo del pedido, será procesado y enviado.</p>
<?php elseif (!isset($_SESSION['order']) && !$_SESSION['oder'] == "complete"): ?>
  <h1>Tu pedido No ha podido procesarse</h1>
<?php endif;?>