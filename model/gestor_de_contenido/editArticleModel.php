<?php

class EditArticleModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function EditArticle($name, $price, $cost, $description, $category, $label, $id, $image=null){

        $category = $category==='Categoria' ? 'Ninguno' : $category;
        $label = $label==='Etiqueta' ? 'Ninguno' : $label;
        
        if($image){
            $query = $this->connect()->prepare("UPDATE article SET name=:name, price=:price, cost=:cost, description=:description, category=:category, label=:label, image=:image WHERE id=:id");
            $query->execute(['name'=> $name, 'price'=>$price, 'cost'=>$cost, 'description'=>$description, 'category'=>$category, 'label'=>$label, 'image'=>$image, 'id'=>$id]);
        }else{
            $query = $this->connect()->prepare("UPDATE article SET name=:name, price=:price, cost=:cost, description=:description, category=:category, label=:label WHERE id=:id");
            $query->execute(['name'=> $name, 'price'=>$price, 'cost'=>$cost, 'description'=>$description, 'category'=>$category, 'label'=>$label, 'id'=>$id]);
        }
    }
}