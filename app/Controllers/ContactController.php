<?php

class ContactController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        
        require(ROOT.DS."App/Models/ContactModel.php");
        $this->model = new ContactModel();
    }

    protected function index()
    {
        $this->view->output($this->model->index());
    }

    protected function create()
    {
        $contact = new ContactModel();
        $contact->name=$_POST['name'];
        $contact->phone=$_POST['phone_number'];
        $contact->text=$_POST['text_area'];
        $contact->save();

        $target_dir = ROOT.DS."files/";
        $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);

        $this->view->output($this->model->index());
    }
}