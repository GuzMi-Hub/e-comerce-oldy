<?php

class pedidoController
{
  public function realize()
  {
    require_once 'views/pedido/realize.php';
  }

  public function add()
  {
    var_dump($_POST);
  }
}
