<?php

class AdminSession{
    function __construct()
    
    {
    
    session_set_cookie_params(60*60*24*1);
    session_start();
    
    $_SESSION['user']=$_POST['userLogin'];
     $_SESSION['password']=$_POST['passwordLogin'];
     $_SESSION['email']=$_POST['emailLogin'];
     unset($_POST);
    }
}

$adminSession = new AdminSession;