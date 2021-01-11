<link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/content.css">
<?php

require_once 'controller/gestor_de_contenido/getArticleEditController.php';

if(isset($url[3])){
   if($dataEditArticle){
      require_once 'view/gestor_de_contenido/getArticleEdit.php';
   }else{
      echo '<p>Lo sentimos el articulo no se encuentra</p>'; 
   }
}
?>
<script src="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.js"></script>