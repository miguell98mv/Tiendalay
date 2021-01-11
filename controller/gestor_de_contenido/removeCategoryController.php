<?php

require_once '../../libs/require.php';

class RemoveCategoryController{

    function __construct()
    {
        require_once '../../model/gestor_de_contenido/RemoveCategoryModel.php';
        $this->model = new RemoveCategoryModel;
    }
}

$RemoveCategory = new RemoveCategoryController;

$RemoveCategory->model->removeCategory($_POST['id']);