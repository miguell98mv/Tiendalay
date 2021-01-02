<?php

class AddArticleModel extends Database{
 
    function __construct()
    {
        parent::__construct();
    }

    function addArticle($name, $price, $cost, $description, $image, $category = '', $label = ''){
    
        $query = $this->connect()->prepare('INSERT INTO article(name, price, cost, description,image) VALUES (:name,:price,:cost,:description,:image)');
        $arreglo=[];

        try{
            if($query->execute(['name'=>$name, 'price'=>$price, 'cost'=>$cost, 'description'=>$description, 'image'=>$image]));
                $arreglo['validate'] = true;
                return $arreglo;
        }catch(Exception $e){
            $arreglo['validate'] = false;
            return $arreglo;
        }
    }
}