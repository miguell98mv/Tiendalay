<?php

class RemoveArticleModel extends Database{
    function __construct()
    {
        parent::__construct();
    }

    function removeArticle($id){
        $query = $this->connect()->prepare('DELETE FROM article WHERE id=:id');
        $query->execute(['id'=>$id]);
    }
}