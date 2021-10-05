<?php
if (!isset($_REQUEST['controller'])) {
    require_once 'controller/login_controller.php';
    require_once 'controller/distrito_controller.php';
    require_once 'controller/cargo_controller.php';
    require_once 'controller/provincia_controller.php';
    require_once 'controller/directordistrital_controller.php';
    require_once 'controller/unidadeducativa_controller.php';
    require_once 'controller/funcionario_controller.php';
    require_once 'controller/usuario_controller.php';
    require_once 'controller/proceso_controller.php';
    $controller=new LoginController();
    $controller->indexInicio();
}else{
    $controller=$_REQUEST['controller'];
    $action=$_REQUEST['action'];
    require_once 'controller/'.$controller.'_controller.php';
    $controller=ucwords($controller).'Controller';
    $controller=new $controller;
    call_user_func(array($controller,$action));
}
?>