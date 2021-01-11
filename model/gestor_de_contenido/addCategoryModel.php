<?php

class AddCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function addCategory($category, $description){
        $query = $this->connect()->prepare('INSERT INTO category(Category, Description) VALUES(:Category, :Description)');
        $arreglo=[];
        
        try{
            $query->execute(['Category'=> $category, 'Description'=>$description]);
            $arreglo['validate'] = true;
            return $arreglo;

        }catch(Exception $e){
            $arreglo['validate'] = false;
            return $arreglo;  
        }
    }
}