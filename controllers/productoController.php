<?php

class productoController{
  public  function index(){
    echo "Controlador productos, Acción index";
  }

  public function featured(){
    require_once 'views/products/featured.php';
  }
}