<?php

require '../../libs/require.php';

class login{
    function __construct()
    {
        require '../../model/administradorModel/administradorModel.php';
        $this->model = new LoginAdminModel;
    }
  
  }
$login = new login();
$arrelgo = $login->model->loginAdmin($_POST['email'], $_POST['password']);

echo json_encode($arrelgo);
