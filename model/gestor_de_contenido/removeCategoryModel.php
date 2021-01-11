<?php

class RemoveCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function removeCategory($Category){

        $query = $this->connect()->prepare("DELETE FROM category WHERE Category=:Category");
        $query->execute(['Category'=>$Category]);
    }
}