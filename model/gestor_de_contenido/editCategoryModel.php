<?php

class EditCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function editCategory($Category, $Description){
        
            $query = $this->connect()->prepare("UPDATE category SET Description=:Description WHERE Category=:CategoryID");
            $query->execute(['CategoryID'=>$Category, 'Description'=>$Description]);
    }
}