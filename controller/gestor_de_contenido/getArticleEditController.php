<?php

require_once 'libs/require.php';

class GetArticleEditController{

    function __construct(){
        require 'model/gestor_de_contenido/getArticleEditModel.php';
        $this->model = new GetArticleEditModel;
    }
}

$GetArticleEdit = new GetArticleEditController;

$dataEditArticle = $GetArticleEdit->model->getArticleEdit($url[3]);