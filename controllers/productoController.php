<?php

require_once './models/product.php';

class productoController
{
  public function index()
  {
    $B_product = new Product();
    $products = $B_product->getRandom(6);
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

      if ($name && $description && $price && $stock && $category) {
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->setStock($stock);
        $product->setCategory_id($category);

        // save image
        if (isset($_FILES)) {
          $file = $_FILES['image'];
          $filename = $file['name'];
          $mimetype = $file['type'];

          if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png") {
            if (!is_dir("uploads/images")) {
              mkdir("uploads/images", 0777, true);
            }
            move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
            $product->setImage($filename);
          }
        }

        if (isset($_GET['id'])) {
          $product->setId($_GET['id']);
          $isUpdate = $product->update();
          var_dump($isUpdate);
        } else {
          $isSave = $product->save();
        }

        if ($isSave || $isUpdate) {
          $_SESSION['product'] = "complete";
        } else {
          $_SESSION['product'] = "failed";
        }
      } else {
        $_SESSION['product'] = "failed";
      }
    } else {
      $_SESSION['product'] = "failed";
    }
    header('Location:' . base_url . 'producto/management');
  }

  public function edit()
  {
    $isEdit = "true";
    if (isset($_GET['id'])) {
      $productoId = $_GET['id'];
      $B_product = new Product();
      $B_product->setId($productoId);
      $product = $B_product->getById();
      require_once "./views/products/create.php";
    }

  }
  public function remove()
  {
    Utils::isAdmin();

    if (isset($_GET['id'])) {
      $productoId = $_GET['id'];
      $product = new Product();
      $product->setId($productoId);

      $isDelete = $product->delete();

      if ($isDelete) {
        $_SESSION['delete'] = "complete";
      } else {
        $_SESSION['delete'] = "failed";
      }
    } else {
      $_SESSION['delete'] = "failed";

    }
    header("Location:" . base_url . "/producto/management");
  }

}
