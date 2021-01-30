<?php

require '../../libs/require.php';

class NewClientController{

    function __construct(){
        require_once '../../model/cliente/newClientModel.php';
        $this->model = new newClientModel;
    }
}

$NewClientController = new NewClientController;

echo $NewClientController->model->newClientUser($_POST['email'], $_POST['userName'], $_POST['password']);