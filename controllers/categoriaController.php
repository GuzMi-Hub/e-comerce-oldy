<?php

require_once "./models/Category.php";
class categoriaController
{
  public function index()
  {
    $categoria = new Category();
    $categorias = $categoria->getAll();
    require_once "./views/categories/index.php";
  }

}
