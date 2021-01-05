<?php

class GetArticleModel extends Database{
    function __construct()
    {
        parent::__construct();
    }

    function getArticle(){
        $query = $this->connect()->query("SELECT * FROM article");
        $arreglo = [];

        foreach($query as $e){
           array_push($arreglo, $e);
        }
        
        return $arreglo;
    }
}