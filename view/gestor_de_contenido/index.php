<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.css">
    <script src="<?php echo URL?>public/jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href='<?php echo URL?>public/inconos/inconos.css'>
    <title>Document</title>
</head>
<body>
<div id="backgrounPause"></div>
<div id="validatePause">
    <h1>Se añadio un nuevo articulo con exito</h1>
    <span class="icon-checkmark" id="checkPausa"></span>
</div>
<div class="container">
<nav class="menu_horizontal">
<a href=""><span class="icon-home" style="margin-right: 10px;"></span>Escritorio</a>
<a id="contenido" href="<?php echo URL?>administrador/contenido"><span class="icon-mail2" style="margin-right: 10px;"></span>Contenido</a>
<a id="categorias" href="<?php echo URL?>administrador/categorias"><span class="icon-pushpin" style="margin-right: 10px;"></span>Categorias</a>
<a id="ventas" href="<?php echo URL?>administrador/ventas"><span class="icon-cart" style="margin-right: 10px;"></span>Ventas</a>
<a id="salir"><span class="icon-exit" style="margin-right: 10px;"></span>Salir</a>
</nav>
<input type="hidden" id="url" value="<?php if(isset($url[1])){echo $url[1];} ?>">
<div class="content">
<?php 

if($_SERVER['REQUEST_URI']==='/Almacen/administrador' || $_SERVER['REQUEST_URI']==='/Almacen/administrador/contenido'){
    require 'view/gestor_de_contenido/contenido.php';  
}

?>
</div>
</div>
<script src="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.js"></script>
</body>
</html>