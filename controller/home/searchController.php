<?php

require_once '../../libs/require.php';

class SearchController{

    function __construct()
    {
        require_once '../../model/home/searchModel.php';
        $this->model = new SearchModel;
    }
}

$SearchController = new SearchController;

echo json_encode($SearchController->model->searchArticle($_POST['search']));