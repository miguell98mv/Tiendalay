<?php

class newClientModel extends Database{

    function __construct(){
        parent::__construct();
    }

    function newClientUser($email, $user, $password){
        $password = password_hash($password, PASSWORD_DEFAULT, ["cost" =>10]);
        $query = $this->connect()->prepare('INSERT INTO client(email, user, password) VALUES (:email, :user, :password)');
       

        try{
            $query->execute(['email'=>$email, 'user'=>$user, 'password'=>$password]);
            return 1;
        }catch(Exception $e){
            return 0;  
        }
    }
}