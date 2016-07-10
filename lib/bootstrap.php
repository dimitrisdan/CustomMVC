<?php
//load the required classes
require("basecontroller.php");
require("basemodel.php");
require("view.php");
require("viewmodel.php");
require("loader.php");
require("route.php");
require("database.php");

if (DEVELOPMENT_ENVIRONMENT == true)
{
    error_reporting(E_ALL);
    ini_set('display_errors','On');
}
else
{
    error_reporting(E_ALL);
    ini_set('display_errors','Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}

$loader = new Loader($_SERVER['REQUEST_METHOD']);

//creates the requested controller object based on the 'controller' URL value
$controller = $loader->createController();

//execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.
$controller->executeAction();