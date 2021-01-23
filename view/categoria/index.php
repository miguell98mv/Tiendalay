<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/home/menu.css">
    <link rel="stylesheet" href="<?php echo URL;?>public/busqueda/busqueda.css">
    <link rel="stylesheet" href='<?php echo URL;?>public/inconos/inconos.css'>
    <title>TiendaLay</title>
</head>
<body>
<?php
    require_once __DIR__.'/../home/menu.php'; 
    ?>
    <div class="container">
        <?php
        require_once __DIR__.'/../../controller/categoria/searchCategoryController.php'; 
        ?>
    </div>
</body>
</html>