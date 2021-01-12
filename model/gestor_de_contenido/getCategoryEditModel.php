<?php

class GetCategoryEditModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function getCategoryEdit($Category){

        $query = $this->connect()->prepare("SELECT * FROM category WHERE Category=:Category");
        $query->execute(["Category"=>$Category]);
        $arreglo=[];

        if($query->rowCount()){
            foreach($query as $e){
                $arreglo['Category'] = $e['Category'];
                $arreglo['Description'] = $e['Description'];
            }
            return $arreglo;
        }

    }
}