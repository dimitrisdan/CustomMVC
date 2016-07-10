<?php

class ContactModel extends BaseModel
{
    public $name;
    public $phone;
    public $text;
    
    public function index()
    {
        $this->viewModel->set("pageTitle","Contact Page");
        return $this->viewModel;
    }

    public function save()
    {
        $database = new Database();
        $database->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $database->query('INSERT INTO contacts (name,phone_number,textarea) VALUES (:name, :phone,:text)');
        $database->bind(':name', $this->name);
        $database->bind(':phone', $this->phone);
        $database->bind(':text', $this->text);
        $database->execute();

        Redirect(BASEURL, false);
    }

}

