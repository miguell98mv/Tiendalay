<?php

class View
{
    function loadView($url)
    {
        empty($url[0]) ? false : (file_exists('view/'.$url[0].'/index.php') ? require_once 'view/'.$url[0].'/index.php' : false);
    }
}