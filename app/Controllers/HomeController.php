<?php

class HomeController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require(ROOT.DS."App/Models/HomeModel.php");
        $this->model = new HomeModel();
    }

    protected function index()
    {
        $this->view->output($this->model->index());
    }
}
