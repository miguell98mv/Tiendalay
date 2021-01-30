<?php

class GetCartClientModel extends Database{

    function __construct(){
        parent::__construct();
    }

    function getArticuloCart($client){
        $ids = [];
        $arreglo = [];
        
        $query = $this->connect()->prepare('SELECT * FROM buyClient WHERE client=:client');
        $query->execute(['client'=> $client]);
        
        while($e = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($ids, $e);
        }
        
        
        foreach($ids as $e){
            $query2 = $this->connect()->prepare('SELECT * FROM article WHERE id=:id');
            $query2->execute(['id'=> $e['idArticle']]);

            while($a = $query2->fetch(PDO::FETCH_ASSOC)){
                $a['idBuy'] = $e['id'];
                array_push($arreglo, $a);
            }
            
        }

        return $arreglo;
    }
}