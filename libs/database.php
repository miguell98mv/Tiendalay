<?php

class Database{

    private $db,$user,$password,$charset,$host;

    function __construct()
    {
        $this->db = DB;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = CHARSET;
        $this->host = HOST;
    }

    function connect(){

        try
        {
            $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        }
        catch(PDOException $error)
        {    
            print_r("<br> Error connection: ". $error->getMessage().'<br>');
        }
    }

}