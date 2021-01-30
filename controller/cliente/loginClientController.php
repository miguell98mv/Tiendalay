<?php

require_once '../../libs/require.php';

class LoginClientController{

    function __construct()
    {
        require_once '../../model/cliente/loginClientModel.php';
        $this->model = new LoginClientModel;
    }
}

$LoginClientController = new LoginClientController;

echo json_encode($LoginClientController->model->loginClient($_POST['email'], $_POST['password']));