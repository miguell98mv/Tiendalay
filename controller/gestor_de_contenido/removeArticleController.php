<?php

require_once '../../libs/require.php';

class RemoveArticleController{
    function __construct(){
        require_once '../../model/gestor_de_contenido/removeArticleModel.php';
        $this->model = new RemoveArticleModel;
    }
}

$RemoveArticle = new RemoveArticleController;

$RemoveArticle->model->removeArticle($_POST['id']);