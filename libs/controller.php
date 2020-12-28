<?php

class Controller
{
    function __construct()
    {
        $this->view = new View();
    }   

    function getModel($url)
    {
      if(file_exists('model/'.$url.'/'.$url.'.php'))
      {
        require_once 'model/'.$url.'/'.$url.'.php';
        
      }  
    }
}