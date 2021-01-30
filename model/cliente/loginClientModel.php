<?php

class LoginClientModel extends Database{

    function __construct(){
        parent::__construct();
    }

    function loginClient($email, $password){

        $arreglo = [];
        $query = $this->connect()->prepare('SELECT password AS contraseña FROM client WHERE email=:email');
        $query->execute(['email'=>$email]);
        
        if($query->rowCount()){

            if(password_verify($password, $query->fetch(PDO::FETCH_OBJ)->contraseña)){
            
                $query = $this->connect()->prepare('SELECT * FROM client WHERE email=:email');
                $query->execute(['email'=>$email]);
    
                while($e = $query->fetch()){
                  $arreglo['email'] = $e['email'];
                  $arreglo['user'] = $e['user'];
                  $arreglo['validate'] = true;
                }
    
            }else{
                 $arreglo['validate'] = false;
            }
        }else{
            $arreglo['validate'] = false;
       }
       
        return $arreglo;
    }
}