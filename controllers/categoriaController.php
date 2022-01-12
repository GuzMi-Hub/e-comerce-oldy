<?php

require_once "./models/Category.php";
require_once "./models/product.php";
class categoriaController
{
  public function index()
  {
    Utils::isAdmin();
    $categoria = new Category();
    $categorias = $categoria->getAll();
    require_once "./views/categories/index.php";
  }

  public function show()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $b_category = new Category();
      $b_category->setId($id);
      $category = $b_category->getOne();

      $b_product = new Product();
      $b_product->setCategory_id($id);
      $products = $b_product->getByCategory();

      require_once "./views/categories/show.php";
    }

  }

  public function crear()
  {
    Utils::isAdmin();
    require_once "./views/categories/crear.php";
  }

  public function save()
  {
    Utils::isAdmin();
    if (isset($_POST)) {
      $categoria = new Category();
      $categoria->setNombre($_POST["nombre"]);
      $status = $categoria->save();
    } else {
      echo "error";
    }

    header("Location:" . base_url . "categoria/index");
  }

}
