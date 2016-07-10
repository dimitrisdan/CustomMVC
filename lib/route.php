<?php

class Route
{
    private $_name;
    private $_controller;
    private $_action;
    private $_method;
    
     public function __construct($method,$urlValues)
     {
         global $routes;

         if ($urlValues['controller'] != "" && $urlValues['action'] != "") {
             $url = $urlValues['controller'] . DS . $urlValues['action'];

         }elseif ($urlValues['controller'] != "" && $urlValues['action'] == ""){
             $url = $urlValues['controller'];
         }else {
             $url = "home";
         }

         if (array_key_exists($url, $routes)) {
             if (strtolower($method) == $routes[$url][0]) {
                 $this->_name = explode("/",$url)[0];
                 $this->_method = $routes[$url][0];
                 $this->_controller = $routes[$url][1];
                 $this->_action = $routes[$url][2];
             }
         }
     }

    public function getName()
    {
        return $this->_name;
    }
    public function getControllerClass()
    {
        return $this->_controller;
    }
    
    public function getAction()
    {
        return $this->_action;
    }

    public function getMethod()
    {
        return $this->_method;
    }
}