<?php

class GetSearchModel extends Database{

    function __construct()
    {
        parent::__construct();
    }

    function getSearch($search, $paginaActual){

        $resultadosMostrados = 15;
        $inicioArticle = ($paginaActual-1) * $resultadosMostrados;

        $query = $this->connect()->prepare("SELECT COUNT(*) AS total FROM article WHERE name LIKE :name");
        $query->execute(['name'=>$search.'%']);
        $totalPaginas =  ceil($query->fetch(PDO::FETCH_OBJ)->total / $resultadosMostrados);


        $query = $this->connect()->prepare('SELECT * FROM article WHERE name LIKE :name LIMIT :inicioArticle, :finDeArticle');
        $query->execute(['name'=>$search.'%', 'inicioArticle'=>$inicioArticle, 'finDeArticle'=>$resultadosMostrados]);


        if($query->rowCount()){
            echo 
            '<div id="resultCategory">Resultados de "'.$search.'"</div>
            <div class="sessionCategory" data-category="$e">
                <div id="represion">';
            
            while($e = $query->fetch()){
                echo
                '<div class="articleView" onclick='.'location.href='.'"'.URL.'articulo/'.$e['id'].'"'.'>
                    <img src="'.URL.'assets/imagen_article/'.$e['image'].'" alt="">
                        <p class="priceView">$'.$e['price'].'</p>
                        <p class="nameView">'.$e['name'].'</p>
                        <p class="descripcionView">'.$e['description'].'</p>
                    </div>';
            }
            echo 
            '   </div>
            </div>
            <div id="paginacion">';
            
            switch($paginaActual){

                case 1:case 2:case 3:
                    $inicioPagination = 1;
                    $finPagination = 5;
                break;
    
                case $totalPaginas:case $totalPaginas-1:
                    $inicioPagination = $totalPaginas-4;
                    $finPagination = $totalPaginas;
                break;
    
                default:
                    $inicioPagination = $paginaActual-2;
                    $finPagination = $paginaActual+2;
                break;
    
            }

            for($e=$inicioPagination; $e<=$finPagination; $e++){

                if($e>0 && $e<$totalPaginas+1){

                    if($e==$paginaActual){
                        echo '<a href="'.URL.'busqueda/'.$search.'/'.$e.'" class="paginaSeleccion">'.$e.'</a>';
                    }else{
                        echo '<a href="'.URL.'busqueda/'.$search.'/'.$e.'">'.$e.'</a>'; 
                    }
                }
            }

           echo '</div>';
        }else{
            echo '<div id="resultCategory">No se encontro articulos con en nombre de "'.$search.'"</div>';
        }
    }
}