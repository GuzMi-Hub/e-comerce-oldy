<?php

require_once "./models/product.php";

class ShoppingCartController
{

  public function index()
  {
    $shoppingCart = $_SESSION['cart'];
    require_once './views/ShoppingCart/index.php';
  }

  public function add()
  {
    if (isset($_GET['id'])) {
      $product_id = $_GET['id'];
    } else {
      header("Location:" . base_url);
    }

    if (isset($_SESSION['cart'])) {
      $counter = 0;
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value["id_product"] == $product_id) {
          $_SESSION['cart'][$key]['amount']++;
          $counter++;
        }
      }

    }
    if (!isset($counter) || $counter == 0) {
      //Get product
      $B_product = new Product();
      $B_product->setId($product_id);
      $product = $B_product->getById();

      if (is_object($product)) {
        $_SESSION['cart'][] = array(
          "id_product" => $product->id,
          "price" => $product->precio,
          "amount" => 1,
          "product" => $product,
        );
      }
    }
    header("Location:" . base_url . "ShoppingCart/index");
  }

  public function remove()
  {

  }

  public function delete_all()
  {
    Utils::deleteSession("cart");
    header("Location:" . base_url . "ShoppingCart/index");
  }

}
