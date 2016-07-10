<?php

class ErrorModel extends BaseModel
{    

    public function badURL()
    {
        $this->viewModel->set("pageTitle","Error - Bad Route");
        return $this->viewModel;
    }
}

