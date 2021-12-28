<?php
function app_autoloader($class){

$class_rep = str_replace('\\', '/', $class);

$classname =  'controllers/' . $class_rep . '.php';
if (file_exists($classname)) {
        require $classname; 
    }

}

spl_autoload_register('app_autoloader');