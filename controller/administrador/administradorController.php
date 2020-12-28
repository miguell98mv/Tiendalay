<?php

class Administrador extends Controller
{
  function __construct($url)
  {
    parent::__construct();
    $this->view->dataObtained = [];
    $this->getModel($url);
    $this->model = new $url;
    $this->view->dataObtained = $this->model->getAdmin();
  }

  function loadView($url){
   $this->view->loadView($url);
  }
}

class NewAdmin extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->getModel('administradorModel');
    $this->model = new NewUserModel;
  }
}

if(isset($_POST['userName']) && isset($_POST['email']) && isset($_POST['password'])){
  $hash=password_hash($_POST['password'], PASSWORD_DEFAULT, ["cost" =>10]);
  $controller = new NewAdmin;
  $var = $controller->model->newUser($_POST['userName'] , $_POST['email'], $hash);
}
