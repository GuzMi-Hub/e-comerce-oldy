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

      if(isset($_POST['email'], $_POST['password'])){

        $usuario = new Usuario();
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $verify = $usuario->login();

        if($verify && is_object($verify)){
          $_SESSION['identity'] = $verify;

          if($_SESSION['identity']->role == 'admin'){
            $_SESSION['admin'] = true;
          }
        }else{
          $_SESSION['error_login'] = 'Identificacion fallida';
        }
      }else{
        $_SESSION['error_login'] = 'Identificacion fallida';
      }
   header("Location:".base_url);
  }

  public function logout(){
    if(isset($_SESSION['identity'])){
      Utils::deleteSession('identity');
      if(isset($_SESSION['admin'])){
        Utils::deleteSession('admin');
      }
    }
    header("Location:".base_url);
  }
}