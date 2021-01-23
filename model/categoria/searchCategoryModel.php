<?php

class SearchCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function getSearch($search){

        $query = $this->connect()->prepare('SELECT * FROM article WHERE category LIKE :name LIMIT 0, 6');
        $query->execute(['name'=>$search]);


        if($query->rowCount()){
            echo 
            '<div class="sessionCategory" data-category="$e">
            <div id="resultCategory2">'. ucfirst($search).'</div>';
            
            while($e = $query->fetch()){
                echo
                '<div class="articleView">
                    <img src="'.URL.'assets/imagen_article/'.$e['image'].'" alt="">
                        <p class="priceView">$'.$e['price'].'</p>
                        <p class="nameView">'.$e['name'].'</p>
                        <p class="descripcionView">'.$e['description'].'</p>
                    </div>';
            }
            echo '</div>';
        }else{
            echo '<div id="resultCategory">No hay articulos en esta categoria</div>';
        }
    }
}