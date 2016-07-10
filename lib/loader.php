<?php

class Loader {
    
    private $controllerName;
    private $controllerClass;
    private $action;
    private $urlValues;
    
    //store the URL request values on object creation
    public function __construct($method) {

        $this->urlValues = $_GET;

        $routes = new Route( $method, $this->urlValues );
        if (!$routes){
            require(ROOT.DS."app/Controllers/ErrorController.php");
            return new ErrorController("badurl",$this->urlValues);
        }
        $this->controllerName = $routes->getName();
        $this->controllerClass = $routes->getControllerClass();
        $this->action = $routes->getAction();

    }

    //factory method which establishes the requested controller as an object
    public function createController() {
        //check our requested controller's class file exists and require it if so
        if (file_exists(ROOT.DS."app/controllers/" . $this->controllerClass . ".php")) {
            require(ROOT . DS . "app/controllers/" . $this->controllerClass . ".php");
        } else {
            require(ROOT.DS."app/controllers/ErrorController.php");
            return new ErrorController("badurl",$this->urlValues);
        }

        //does the class exist?
        if (class_exists($this->controllerClass)) {
            $parents = class_parents($this->controllerClass);

            //does the class inherit from the BaseController class?
            if (in_array("BaseController",$parents)) {
                //does the requested class contain the requested action as a method?
                if (method_exists($this->controllerClass,$this->action))
                {
                    return new $this->controllerClass($this->action,$this->urlValues);
                } else {
                    //bad action/method error
                    require(ROOT.DS."app/controllers/ErrorController.php");
                    return new ErrorController("badurl",$this->urlValues);
                }
            } else {
                //bad controller error
                require(ROOT.DS."app/controllers/ErrorController.php");
                return new ErrorController("badurl",$this->urlValues);
            }
        } else {
            //bad controller error
            require(ROOT.DS."app/controllers/ErrorController.php");
            return new ErrorController("badurl",$this->urlValues);
        }
    }
}