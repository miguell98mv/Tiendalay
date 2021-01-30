<?php

require_once '../../libs/require.php';


class SetCartArticuloController{
    
   function __construct()
   {
        require_once '../../model/articulo/setCartArticuloModel.php';
        $this->model = new SetCartArticuloModel;    
   }
}

$SetCartArticulo = new SetCartArticuloController();

$SetCartArticulo->model->getArticulo($_POST['userClient'], $_POST['id']);