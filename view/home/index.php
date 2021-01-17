<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL?>public/home/home.css">
    <link rel="stylesheet" href='<?php echo URL;?>public/inconos/inconos.css'>
    <title>TiendaLay</title>
</head>
<body>
    <div class='menuContainer'>
        <nav id="menuPrincipal">
            <div id="menu1"><img src="<?php echo URL?>assets/logo.png" alt="TiendaLay"></div>
            <div id="menu2"><input type="search" name="search" id="search" placeholder="Buscar Articulo"><span class="icon-search" id="spanSearch"></span></div>
            <div id="menu3"><img src="<?php echo URL?>assets/miCuneta2.png" alt="Mi cuenta"><a href="">Mi cuenta</a><span class="icon-cart" id="spanCart"></span></div>
        </nav>
    </div>
    <div class='menuContainer2'>
        <nav id="menuSecundario">
            <?php require_once 'controller/home/getCategoryController.php'; ?>
        </nav>
    </div>

    <div id="fondoTienda">
        <div id="fondoSlider">
            <div alt="fondo tiendalay" class='fondos' id="fondo1"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo2"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo3"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo4"></div>
        </div>
    </div>

    <div class='container'>

    </div>
    <script src="public/home/slider.js"></script>
</body>
</html>