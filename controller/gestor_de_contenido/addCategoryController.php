<?php

require_once '../../libs/require.php';

class AddCategoryController{
    
    function __construct()
    {
        require '../../model/gestor_de_contenido/addCategoryModel.php';
        $this->model = new AddCategoryModel;
    }
}

$addCategory = new AddCategoryController();

$validate = $addCategory->model->addCategory($_POST['category'], $_POST['description']);

echo json_encode($validate);