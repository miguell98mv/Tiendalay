<?php

class GetCategoryModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function getCategory(){

        $arreglo = [];
        
        $query = $this->connect()->query('SELECT Category FROM category');
        
        if($query->rowCount()){
            
            foreach($query as $e){
                array_push($arreglo, $e['Category']);
            }

            foreach($arreglo as $e){
                echo '<p class="categorias">'.$e.'</p>';
            }
        }
    }


    function getCategoryCaja(){

        $arreglo = [];
        
        $query = $this->connect()->query('SELECT Category FROM category');
        
        if($query->rowCount()){
            
            foreach($query as $e){
                array_push($arreglo, $e['Category']);
            }

            foreach($arreglo as $e){
                $articles = [];
                $query = $this->connect()->prepare('SELECT * FROM article WHERE category=:Category');
                $query->execute(['Category'=>$e]);

                if($query->rowCount()){
                    foreach($query as $a){
                        array_push($articles, $a);
                    }

                    echo 
                    '<div class="sessionCategory" data-category="$e">
                        <div>
                            <p>'.$e.'</p>
                        </div>
                        <div>
                        '.$articles[0]['Description'].'
                        </div>
                    </div>';
                }else{
                    echo 
                    '<div class="sessionCategory" data-category="$e">
                        <div>
                            <p>'.$e.'</p>
                        </div>
                        <div>
                            No Hay articulos en esta categoria
                        </div>
                    </div>';
                }
            }
        }
    }
}