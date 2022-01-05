<?php

require_once './models/product.php';

class productoController
{
  public function index()
  {
    require_once 'views/products/featured.php';
  }

  public function management()
  {
    Utils::isAdmin();

    $producto = new Product();
    $productos = $producto->getAll();

    require_once 'views/products/management.php';
  }

  public function create()
  {
    Utils::isAdmin();
    require_once 'views/products/create.php';

  }

  public function save()
  {
    Utils::isAdmin();

    if (isset($_POST)) {
      var_dump($_POST);
    }
  }

}
