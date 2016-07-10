<?php

class View {

    protected $viewFile;

    //establish view location on object creation
    public function __construct($controllerClass, $action) {
        $controllerName = str_replace("Controller", "", $controllerClass);
        $this->viewFile = ROOT.DS."app/Views/" . $controllerName . "/" . $action . ".php";
    }
               
    //output the view
    public function output($viewModel, $template = "maintemplate") {
        
        $templateFile = ROOT.DS."app/Views/".$template.".php";
        
        if (file_exists($this->viewFile)) {
            if ($template) {
                //include the full template
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require(ROOT.DS."app/Views/Error/badtemplate.php");
                }
            } else {
                //we're not using a template view so just output the method's view directly
                require($this->viewFile);
            }
        } else {
            require(ROOT.DS."app/Views/Error/badview.php");
        }
    }
}
