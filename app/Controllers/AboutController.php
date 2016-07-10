<?php

class AboutController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require(ROOT.DS."App/Models/AboutModel.php");
        $this->model = new AboutModel();
    }

    protected function index()
    {
        $this->view->output($this->model->index());
    }
}