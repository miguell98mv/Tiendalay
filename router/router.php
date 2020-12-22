<?php


$url =  isset($_REQUEST['url']) ? $_REQUEST['url'] : null;


if($url)
{
    $url[strlen($url)-1] === '/' ?  $url= substr($url, 0 , strlen($url)-1) : false;
}


$url = explode('/', $url); 
empty($url[0]) ? require_once 'view/home/index.php' : false;


if(!empty($url[0]))
{           
    $model = $url[0].'Model';
    $controll = $url[0].'Controller';

    file_exists('controller/'.$controll.'.php') ? require_once 'controller/'.$controll.'.php' : false;
    class_exists($url[0]) ? $controller = new $url[0]($model) : false;
    $controller->loadView($url);
}

if(sizeof($url)==2)
{
    sizeof($url) > 1 ? print_r($url[1]) : false;
}


