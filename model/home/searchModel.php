<?php

class SearchModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function searchArticle($search){
        $array = [];
        $query = $this->connect()->prepare('SELECT * FROM article WHERE name LIKE :name LIMIT 0, 6');
        $query->execute(['name'=>$search.'%']);

        if($query->rowCount()){
            while($e = $query->fetch()){
                array_push($array, $e['name']);
            }
            return $array;
        }    
    }
}