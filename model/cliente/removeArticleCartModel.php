<?php

class RemoveArticleCartModel extends Database{

function __construct(){
    parent::__construct();
}

function removeArticleCart($id){

    $query = $this->connect()->prepare('DELETE FROM buyclient WHERE id=:id');
    $query->execute(['id'=>$id]);
   
    }
}