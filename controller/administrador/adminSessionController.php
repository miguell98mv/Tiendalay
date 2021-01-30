<?php

class AdminSession{
    function __construct()
    
    {
    
    session_set_cookie_params(60*60*24*1);
    session_start();
    
    if(isset($_POST['client'])){
        $_SESSION['client'] = isset($_POST['client']) ? $_POST['client'] : false;
        $_SESSION['user'] = isset($_POST['userLogin']) ? $_POST['userLogin'] : false;
        $_SESSION['password'] = isset($_POST['passwordLogin']) ? $_POST['passwordLogin'] : false;
    }

    if(isset($_POST['emailLogin'])){
        $_SESSION['email'] = isset($_POST['emailLogin']) ? $_POST['emailLogin'] : false;
        $_SESSION['user'] = isset($_POST['userLogin']) ? $_POST['userLogin'] : false;
        $_SESSION['password'] = isset($_POST['passwordLogin']) ? $_POST['passwordLogin'] : false;
    }

   
     unset($_POST);
    }
}

$adminSession = new AdminSession;