<?php

class SetCartArticuloModel extends Database{

    function __construct(){
        parent::__construct();
    }

    function getArticulo($client, $idArticle){
    
        $query = $this->connect()->prepare('INSERT INTO buyclient (idArticle, client) VALUES (:idArticle, :client)');
        $query->execute(['idArticle'=> $idArticle, 'client'=> $client]);
    
    }
}