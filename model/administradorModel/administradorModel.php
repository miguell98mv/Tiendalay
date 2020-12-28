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

class NewUserModel extends Database{
    function __construct()
    {
        parent::__construct();
    }

    function newUser($user, $email, $password)
    {
        $query = $this->connect()->prepare("INSERT INTO admin(user,email,password) VALUES (:user,:email,:password)");
        $primaryKey = $this->connect()->prepare("SELECT * FROM admin WHERE email=:email");
        $primaryKey->execute(['email'=>$email]);

        if(!$primaryKey->rowCount()){
            $query->execute(["user"=>$user, "email"=>$email, "password"=>$password]);
        }
        
    }

}

class LoginAdminModel extends Database
{
    function __construct()
    {
      parent::__construct();  
    }

    function loginAdmin($email, $password){
        
        $primaryKey = $this->connect()->prepare("SELECT * FROM admin WHERE email=:email");
        $primaryKey->execute(['email'=>$email]);
        $arreglo = [];

        
        if($primaryKey->rowCount()){
            foreach($primaryKey as $e){
              
                if(password_verify($password, $e['password'])){
                    $arreglo['user'] = $e['user'];
                    $arreglo['email'] = $e['email'];
                    $arreglo['password'] = $e['password'];
                    $arreglo['validate'] = true;
                }else{
                    $arreglo['validate'] = false;
                }
                    
            }
        }else{
            $arreglo['validate'] = false;
        }

        return $arreglo;
    }
}