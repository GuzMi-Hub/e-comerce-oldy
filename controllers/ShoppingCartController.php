<?php

require_once "./models/product.php";

class ShoppingCartController
{

  public function index()
  {
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1) {
      $shoppingCart = $_SESSION['cart'];
    } else {
      $shoppingCart = array();
    }
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

  public function delete()
  {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      unset($_SESSION['cart'][$index]);
    }
    header("Location:" . base_url . "ShoppingCart/index");
  }

  public function up()
  {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['amount']++;
    }
    header("Location:" . base_url . "ShoppingCart/index");
  }

  public function down()
  {
    if (isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['cart'][$index]['amount']--;

      if ($_SESSION['cart'][$index]['amount'] == 0) {
        unset($_SESSION['cart'][$index]);
      }
    }
    header("Location:" . base_url . "ShoppingCart/index");
  }

  public function delete_all()
  {
    Utils::deleteSession("cart");
    header("Location:" . base_url . "ShoppingCart/index");
  }

}
