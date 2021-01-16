<?php

class GetCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function getCategory(){

        $arreglo = [];
        
        $query = $this->connect()->query('SELECT Category FROM category');
        
        if($query->rowCount()){
            
            foreach($query as $e){
                array_push($arreglo, $e['Category']);
            }
        }

        return $arreglo;
    }
}