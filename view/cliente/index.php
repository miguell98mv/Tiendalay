<?php

if(!isset($_SESSION['client'])){
    if(isset($url[1])){
        if($url[1]==='iniciarSession'){
            require_once 'view/cliente/loginAdmin.php';

        }else if($url[1]==='registrarse'){
            require_once 'view/cliente/newAdmin.php';
        
        }else{
            header('location: '.URL);
        }
    }else{
        header('location: '.URL);
    }
}else{
    header('location: '.URL);
}