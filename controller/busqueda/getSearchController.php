<?php

class GetSearchController{

    function __construct()
    {
        require_once __DIR__.'/../../model/busqueda/getSearchModel.php';
        $this->model = new GetSearchModel;
    }
}

$GetSearch = new GetSearchController;

if(isset($url[1])){
    $GetSearch->model->getSearch($url[1]);
}else{
    echo '<div id="resultCategory">No se encontro articulos con en nombre de ""</div>';
}

