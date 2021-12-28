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

      if(isset($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['password'])){

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
    }else{
        $_SESSION['register'] = "failed";
    }
    header("Location:".base_url."usuario/register");
  }

  public function login(){
    if(isset($_POST)){

      if(isset($_POST['email'], $_POST['password'])){

        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $verify = $usuario->login();

        if($verify && is_object($verify)){
          $_SESSION['usuario'] = $verify;
          var_dump($_SESSION['usuario']);
        }else{
          $_SESSION['error_login'] = 'Fallo en login';
        }
      }else{
        $_SESSION['error_login'] = 'Fallo en login';
      }
    }else{
      $_SESSION['error_login'] = 'Fallo en login';
      
    }
   header("Location:".base_url);
  }
}