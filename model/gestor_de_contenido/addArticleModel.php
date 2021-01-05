<?php

class AddArticleModel extends Database{
 
    function __construct()
    {
        parent::__construct();
    }

    function addArticle($name, $price, $cost, $description, $image, $category, $labelSelection){
    
        $category = $category==='Categoria' ? 'Ninguno' : $category;
        $labelSelection = $labelSelection==='Etiqueta' ? 'Ninguno' : $labelSelection;
        $query = $this->connect()->prepare('INSERT INTO article(name, price, cost, description, image, category, label) VALUES (:name,:price,:cost,:description,:image, :category, :label)');
        $arreglo=[];

        try{
                $query->execute(['name'=>$name, 'price'=>$price, 'cost'=>$cost, 'description'=>$description, 'image'=>$image, 'category'=>$category, 'label'=>$labelSelection]);
                $arreglo['validate'] = true;
                return $arreglo;
        }catch(Exception $e){
            $arreglo['validate'] = false;
            return $arreglo;
        }
    }
}