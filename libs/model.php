<?php

class Model
{
    function __construct($url)
    {
     $this->getModel($url);
    }

    function getModel($url)
    {
        if(file_exists('model/'.$url.'/'.$url.'.php'))
        {   
            require 'model/'.$url.'/'.$url.'.php';
            $this->model = new $url;
        }
         
    }
}