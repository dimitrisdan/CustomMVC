<?php

class HomeModel extends BaseModel
{

    public function index()
    {   
        $this->viewModel->set("pageTitle","Custom MVC");
        return $this->viewModel;
    }
}

