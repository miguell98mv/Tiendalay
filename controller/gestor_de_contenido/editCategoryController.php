<?php

require_once '../../libs/require.php';

class EditCategoryController{
    
    function __construct()
    {
        require_once '../../model/gestor_de_contenido/editCategoryModel.php';
        $this->model = new EditCategoryModel;
    }
}

$EditCategory = new EditCategoryController;

$category=$_POST['category'];
$description=$_POST['description'];

echo $EditCategory->model->editCategory($category, $description);
