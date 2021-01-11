<?php

require_once '../../libs/require.php';

class GetArticle{
    function __construct()
    {
        require_once '../../model/gestor_de_contenido/getArticleModel.php';
        $this->model = new GetArticleModel;
    }
}

$GetArticle = new GetArticle;

$data = json_encode($GetArticle->model->getArticle($_POST['urlName']));
echo $data;