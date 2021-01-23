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
                echo '<a class="categorias" href="'.URL.'categoria/'.strtolower($e).'">'.$e.'</a>';
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
                $query = $this->connect()->prepare('SELECT * FROM article WHERE category=:Category LIMIT 0, 15');
                $query->execute(['Category'=>$e]);

                if($query->rowCount()){

                    foreach($query as $a){
                        array_push($articles, $a);
                    }
                    
                    echo
                    '<div class="sessionCategory" data-category="$e">
                        <div class="tituloCategory">
                            <p>'.$e.'</p>
                        </div>
                        <div class="cajaCategoria">
                        <input type="button" class="buttonScroll" value=">" onclick="botonScrollLeft(this)">
                        <input type="button" class="buttonScrollLeft" value="<" onclick="botonScrollRight(this)">';
                    foreach($articles as $data){
                                echo
                                '<div class="articleView">
                                    <img src="assets/imagen_article/'.$data['image'].'" alt="">
                                    <p class="priceView">$'.$data['price'].'</p>
                                    <p class="nameView">'.$data['name'].'</p>
                                    <p class="descripcionView">'.$data['description'].'</p>
                                </div>';
                    }

                    echo
                        '   </div>
                        </div>';
                   
                }else{
                    echo 
                    '<div class="sessionCategory" data-category="$e">
                        <div class="tituloCategory">
                            <p>'.$e.'</p>
                        </div>
                        <div class="vacio">
                            No Hay articulos en esta categoria
                        </div>
                    </div>';
                }
            }
        }
    }
}