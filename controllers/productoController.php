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
      $name = isset($_POST['name']) ? $_POST['name'] : false;
      $description = isset($_POST['description']) ? $_POST['description'] : false;
      $price = isset($_POST['price']) ? $_POST['price'] : false;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
      $category = isset($_POST['category']) ? $_POST['category'] : false;
      // $image = isset($_POST['image']) ? $_POST['image'] : false;

      if ($name && $description && $price && $stock && $category) {
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->setStock($stock);
        $product->setCategory_id($category);

        $isSave = $product->save();
        if ($isSave) {
          $_SESSION['producto'] = "complete";
        } else {
          $_SESSION['producto'] = "failed";
        }
      } else {
        $_SESSION['producto'] = "failed";
      }
    } else {
      $_SESSION['producto'] = "failed";
    }
    header('Location:' . base_url . 'producto/management');
  }

}
