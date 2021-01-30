<?php

class Cliente extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function loadView($url){
   $this->view->loadView($url);
  }
}