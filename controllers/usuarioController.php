<?php
require_once 'models/Usuario.php';

class usuarioController{
  public  function index(){
    echo "Controlador Usuarios, Acción index";
  }

  public function register(){
    require_once 'views/users/register.php';
  }

  public function save(){
    if(isset($_POST)){
      $usuario = new Usuario();
      $usuario->setNombre($_POST['nombre']);
      $usuario->setApellidos($_POST['apellidos']);
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);

      $saveStmt = $usuario->save();

      if($saveStmt){
        $_SESSION['register'] = "complete";
      }else{
        $_SESSION['register'] = "failed";
      }
    }else{
        $_SESSION['register'] = "failed";
    }
    header("Location:".base_url."usuario/register");
  }
}