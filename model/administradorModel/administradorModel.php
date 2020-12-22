<?php

class AdministradorModel extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function getAdmin()
    {
        $query = $this->connect()->query("SELECT * FROM admin LIMIT 1");
        $arreglo = [];

        foreach($query as $r){
            array_push($arreglo, $r);
        }
        return $arreglo;
    }
}