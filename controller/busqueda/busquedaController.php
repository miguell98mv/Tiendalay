<?php

class Busqueda extends Controller
{
  function __construct($url)
  {
    parent::__construct();
  }

  function loadView($url){
   $this->view->loadView($url);
  }
}