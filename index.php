<?php
# import routes
include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');
# imports
require_once(CONTROLLER_PATH . 'MainController.php');

if(!$_GET){
    $mainView = new MainController();
    call_user_func([$mainView, "view"]);
}elseif(
    (isset($_GET['c']) && isset($_GET['a'])) 
    && (!empty($_GET['c']) && !empty($_GET['a']))
){
    try{
        $controller = $_GET["c"];
        $action = $_GET["a"];

        $controller = ucwords($controller) . "Controller";
        if (!file_exists(CONTROLLER_PATH . $controller . ".php"))
            throw new Exception('Error al cargar el controlador.');
        else
            require_once(CONTROLLER_PATH . $controller . ".php");
       
        # instancia del controlador
        $cInstance = new $controller;
        call_user_func([$cInstance, $action]);

    }catch(Exception $ex){
        $mainView = new MainController();
        call_user_func([$mainView, "error500"]);
    }
}else{
    $mainView = new MainController();
    call_user_func([$mainView, "error404"]);
}