<?php

require_once '../../libs/require.php';


class GetArticuloController{
    
   function __construct()
   {
        require_once '../../model/articulo/getArticuloModel.php';
        $this->model = new GetArticuloModel;    
   }
}

$GetArticulo = new GetArticuloController();

$id = isset($_POST['id']) ? $_POST['id'] : false;

echo json_encode($GetArticulo->model->getArticulo($id));