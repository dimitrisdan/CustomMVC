<?php

class AboutModel extends BaseModel
{

    public function index()
    {
        $this->viewModel->set("pageTitle","About Page");
        return $this->viewModel;
    }
}

