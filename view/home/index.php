<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URL?>public/home/home.css">
    <link rel="stylesheet" href="<?php echo URL?>public/home/menu.css">
    <link rel="stylesheet" href='<?php echo URL;?>public/inconos/inconos.css'>
    <script src="<?php echo URL?>public/jquery/jquery-3.4.1.min.js"></script>
    <title>TiendaLay</title>
</head>
<body>
    <?php require_once 'menu.php'; ?>

    <div id="fondoTienda">
        <div id="fondoSlider">
            <div alt="fondo tiendalay" class='fondos' id="fondo1"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo2"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo3"></div>
            <div alt="fondo tiendalay" class='fondos' id="fondo4"></div>
        </div>
    </div>

    <div class='container'>
        <?php 
        require_once 'controller/home/getCategoryController.php'; 
        $GetCategory->model->getCategoryCaja();
        ?>
    </div>
    <script src="<?php echo URL?>public/home/slider.js"></script>
    <script src="<?php echo URL?>public/home/buttonScroll.js"></script>
</body>
</html>