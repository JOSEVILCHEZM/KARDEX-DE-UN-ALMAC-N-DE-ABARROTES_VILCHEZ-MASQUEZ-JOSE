<?php
require_once 'model/database.php';
require_once 'librerias/help/helps.php';
require_once 'controller/login.Controller.php';

$controller = 'login';

//La seccion
$oLoginController=new LoginController();
if($oLoginController->VaribleSeccion("usuario")){
}else{
    $_REQUEST['c']='login';
}


// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index(); 
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
       try {
           call_user_func( array( $controller, $accion ) );
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    

    
    
   
    /*if(!call_user_func( array( $controller, $accion ) )){
        call_user_func( array( $controller, 'Index' ) );
    }*/
}