<?php

require_once '../../libs/require.php';

class GetSelectionCategoryController{

    function __construct()
    {
        require_once '../../model/gestor_de_contenido/getSelectionCategoryModel.php';
        $this->model = new GetSelectionCategoryModel;
    }
}

$GetSelectionCategory = new GetSelectionCategoryController;

echo json_encode($GetSelectionCategory->model->GetSelectionCategory());