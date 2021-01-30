<?php

require_once '../../libs/require.php';

class RemoveArticleCartController{

    function __construct()
    {
        require_once '../../model/cliente/removeArticleCartModel.php';
        $this->model = new RemoveArticleCartModel;
    }
}

$LoginClientController = new RemoveArticleCartController;

$LoginClientController->model->removeArticleCart($_POST['id']);