<?php

require_once 'libs/require.php';

class GetCategoryController{
    
    function __construct()
    {
        require_once 'model/home/getCategoryModel.php';
        $this->model = new GetCategoryModel;
    }
}

$GetCategory = new GetCategoryController;

