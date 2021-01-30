<?php

require_once '../../libs/require.php';

class GetCartClientController{

    function __construct()
    {
        require_once '../../model/cliente/getCartClientModel.php';
        $this->model = new GetCartClientModel;
    }
}

$GetCartClient = new GetCartClientController;

echo json_encode($GetCartClient->model->getArticuloCart($_POST['client']));
