<?php

require_once 'libs/require.php';

class GetCategoryEditController{

    function __construct(){
        require 'model/gestor_de_contenido/getCategoryEditModel.php';
        $this->model = new GetCategoryEditModel;
    }
}

$GetCategoryEdit = new GetCategoryEditController;

$dataCategoryArticle = $GetCategoryEdit->model->getCategoryEdit($url[3]);