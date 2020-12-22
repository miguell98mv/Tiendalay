<?php

class Administrador extends Controller
{
  function __construct($url)
  {
    parent::__construct();
    $this->view->dataObtained = [];
    $this->getModel($url);
  }

  function loadView($url){
   $this->view->loadView($url);
  }

  function getModel($url)
  {
    if(file_exists('model/'.$url.'/'.$url.'.php'))
    {
      require_once 'model/'.$url.'/'.$url.'.php';
      $this->model = new $url;
      $this->view->dataObtained = $this->model->getAdmin();
    }  
  }
}