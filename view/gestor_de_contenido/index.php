<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.css">
    <link rel="stylesheet" href='<?php echo URL?>public/inconos/inconos.css'>
    <script src="<?php echo URL?>public/jquery/jquery-3.4.1.min.js"></script>
    <title>TiendaLay</title>
</head>
<body>
<div class="container">
    <nav id="menuResponsi"><span class='icon-menu' id="spanMenuBoton"></span></nav>
    <nav class="menu_horizontal">
    <a  onclick="window.location.href = MYURL"><span class="icon-home spanMenu"></span>Escritorio</a>
    <a id="contenido" href="<?php echo URL?>administrador/contenido"><span class="icon-mail2 spanMenu"></span>Contenido</a>
    <a id="categorias" href="<?php echo URL?>administrador/categorias"><span class="icon-pushpin spanMenu"></span>Categorias</a>
    <a id="ventas" href="<?php echo URL?>administrador/ventas"><span class="icon-cart spanMenu"></span>Ventas</a>
    <a id="salir"><span class="icon-exit spanMenu"></span>Salir</a>
    </nav>
    <input type="hidden" id="url" value="<?php if(isset($url[1])){echo $url[1];} ?>">
    <div class="content ">

        <?php 

    if(isset($url[2]) && $url[1].$url[2]==='contenidoedit'){
        if(isset($url[3])){
        require 'view/gestor_de_contenido/edit.php';
        return false;
        }
    }

    if(isset($url[2]) && $url[1].$url[2]==='categoriasedit'){
        if(isset($url[3])){
        require 'view/gestor_de_contenido/editCategory.php';
        return false;
        }
    }

    if(isset($url[2]) && $url[1]==='contenido'){
         
        if(is_numeric($url[2])){
            require 'view/gestor_de_contenido/contenido.php';
            return false;
        }
    }

        if(isset($url[2]) && $url[1]==='contenido'){
         
        if(is_numeric($url[2])){
            require 'view/gestor_de_contenido/contenido.php';
            return false;
        }
    }
    
        if(!isset($url[1]) && $url[0]==='administrador' || $_SERVER['REQUEST_URI']==='/Almacen/administrador/contenido'){
            require 'view/gestor_de_contenido/contenido.php';
            return false;
        }

        if(isset($url[1]) && $url[1]==='categorias'){
            require 'view/gestor_de_contenido/categorias.php';
            return false;
        }
        
        ?>

    </div>
</div>
</body>
</html>