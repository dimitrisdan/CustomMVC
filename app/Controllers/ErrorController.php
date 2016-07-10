<?php

class ErrorController extends BaseController
{
    
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require(ROOT.DS."App/Models/ErrorModel.php");
        $this->model = new ErrorModel();
    }

    protected function badURL()
    {
        $this->view->output($this->model->badURL());
    }
}