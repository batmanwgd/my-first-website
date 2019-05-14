<?php
require_once 'kiss/utils.php';
require_once 'kiss/model.php'; 
require_once 'kiss/view.php'; 
require_once 'kiss/arg.php'; 
require_once 'kiss/controller.php';   
$default_controller .='_controller';
include 'controllers/'.$default_controller.'.php';
$controller = new $default_controller( new View(), argstr());
echo $controller->view->render();
?>