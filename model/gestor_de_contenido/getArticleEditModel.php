<?php

class GetArticleEditModel extends Database{

    function __construct()
    {
        parent::__construct();    
    }

    function getArticleEdit($id){

        $query = $this->connect()->prepare("SELECT * FROM article WHERE id=:id");
        $query->execute(["id"=>$id]);
        $arreglo=[];

        if($query->rowCount()){
            foreach($query as $e){
                $arreglo['id'] = $e['id'];
                $arreglo['name'] = $e['name'];
                $arreglo['price'] = $e['price'];
                $arreglo['cost'] = $e['cost'];
                $arreglo['description'] = $e['description'];
                $arreglo['category'] = $e['category'];
                $arreglo['label'] = $e['label'];
                $arreglo['image'] = $e['image'];
            }
            return $arreglo;
        }

    }
}