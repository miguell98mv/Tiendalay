<?php

class GetSelectionCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function GetSelectionCategory(){
        $arreglo =[];
        $query = $this->connect()->query("SELECT Category FROM category");

        if($query->rowCount()){
            foreach($query as $e){
               $arreglo[] = $e['Category'];
            }
        }

        return $arreglo;
    }
}