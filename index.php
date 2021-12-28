<?php
session_start();
require_once 'config/parameters.php';
require_once 'config/db.php';
require_once 'autoload.php';
require_once 'views/layout/header.php ';
require_once 'views/layout/sidebar.php ';


function show404(){
  $controller = new errorController();
  $controller->index();
}

if(isset($_GET['controller'])){
  $nombre_controlador = $_GET['controller'].'Controller';
}else if(!isset($_GET['controller'], $_GET['action'])){
  $nombre_controlador = controller_default;
}else{
  show404();
  exit();
}



if(class_Exists($nombre_controlador)){
  $controlador = new $nombre_controlador();

  if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
    $action = $_GET['action'];
    $controlador->$action();
  }else if(!isset($_GET['controller'], $_GET['action'])){
    $actionDefault = action_default;
    $controlador->$actionDefault();
  }else{
    show404();
  }

}else{
  show404();
}

require_once 'views/layout/footer.php ';
