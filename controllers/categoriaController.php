<?php

require_once "./models/Category.php";
class categoriaController
{
  public function index()
  {
    Utils::isAdmin();
    $categoria = new Category();
    $categorias = $categoria->getAll();
    require_once "./views/categories/index.php";
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
