<?php

class usuarioController{
  public  function index(){
    echo "Controlador Usuarios, Acción index";
  }

  public function register(){
    require_once 'views/users/register.php';
  }

  public function save(){
    var_dump($_POST);
  }
}