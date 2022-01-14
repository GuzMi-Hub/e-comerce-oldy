<?php
require_once "./models/Order.php";

class pedidoController
{
  public function realize()
  {
    require_once 'views/pedido/realize.php';
  }

  public function add()
  {
    if (isset($_SESSION['identity'])) {

      $usuario_id = $_SESSION['identity']->id;
      $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
      $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
      $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

      $stats = Utils::statsCart();
      $coste = $stats['total'];

      if ($provincia && $localidad && $direccion) {
        $order = new Order();
        $order->setUsuario_id($usuario_id);
        $order->setProvincia($provincia);
        $order->setLocalidad($localidad);
        $order->setDireccion($direccion);
        $order->setCoste($coste);

        $isSave = $order->save();

        $isSaveOrderLine = $order->save_line();

        if ($isSave && $isSaveOrderLine) {
          $_SESSION['order'] = "complete";
        } else {
          $_SESSION['order'] = "failed";
        }

      } else {
        $_SESSION['order'] = "failed";
      }
      header("Location:" . base_url . "pedido/confirmed");
    } else {
      header("Location:" . base_url);
    }
  }
  public function confirmed()
  {
    if (isset($_SESSION['identity'])) {
      $identity = $_SESSION['identity'];
      $B_order = new Order();
      $B_order->setUsuario_id($identity->id);

      $order = $B_order->getByUser();

      $B_order_products = new Order();
      $products = $B_order_products->getProductByOrder($order->id);

    }
    require_once "./views/pedido/confirmed.php";
  }

  public function myOrders()
  {
    Utils::isIdentity();

    $usuario_id = $_SESSION['identity']->id;
    $B_order = new Order();

    $B_order->setUsuario_id($usuario_id);
    $orders = $B_order->getAllByUser();

    require_once "./views/pedido/myOrders.php";
  }
}
