<?php

require_once '../../libs/require.php';

class GetCategoryController{

    function __construct()
    {
        require_once '../../model/gestor_de_contenido/getCategoryModel.php';
        $this->model = new GetCategoryModel;        
    }
}

$GetCategory = new GetCategoryController;

$data = json_encode($GetCategory->model->getCategory($_POST['urlName']));

echo $data;