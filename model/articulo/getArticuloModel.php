<?php

class GetArticuloModel extends Database{

    function __construct(){
        parent::__construct();
    }

    function getArticulo($id){
        $arreglo = [];
        
        if($id){
            $query = $this->connect()->prepare('SELECT * FROM article WHERE id=:id');
            $query->execute(['id'=> $id]);
        
            while($e = $query->fetch()){
                array_push($arreglo, $e);
            }
        }
        return $arreglo;
    }
}