<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/home/menu.css">
    <link rel="stylesheet" href="<?php echo URL;?>public/articulo/articulo.css">
    <link rel="stylesheet" href='<?php echo URL;?>public/inconos/inconos.css'>
    <title>TiendaLay</title>
</head>
<body>
    <?php
    require_once __DIR__.'/../home/menu.php'; 
    ?>
    <input type="hidden" id="url" value="<?php echo $url[1]?>">
    <div class="container">
    <a id="categoria" href=""></a>
        <div id="cajaArticulo">
            <div id="cajaImagen"></div>
            <div id="cajaTituloYDescripcion">
                <p id="precio"></p>
                <h1 id="tituloArticulo"></h1>
                <p id="descripcion"></p>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/articulo/articulo.js"></script>
</body>
</html>