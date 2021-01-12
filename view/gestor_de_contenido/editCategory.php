<link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/content.css">
<script src="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.js"></script>


<?php

require_once 'controller/gestor_de_contenido/getCatgoryEditController.php';

if(isset($url[3])){
   if($dataCategoryArticle){
      require_once 'view/gestor_de_contenido/getCategoryEdit.php';
   }else{
      echo '<p>Lo sentimos el articulo no se encuentra</p>'; 
   }
}
?>