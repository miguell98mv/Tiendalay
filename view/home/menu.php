<div class='menuContainer'>
    <nav id="menuPrincipal">
        <div id="menu1"><img  onclick="location.href='<?php echo URL?>'" src="<?php echo URL?>assets/logo.png" alt="TiendaLay tienda"></div>
        <div id="menu2">
            <input type="search" name="search" id="search" autocomplete="off" placeholder="Buscar Articulo"><span class="icon-search" id="spanSearch"></span>
            <div id="searchMenu"></div>
        </div>
        <div id="menu3">
            <img id="imgUsuario" src="<?php echo URL;?>assets/miCuneta2.png" alt="Mi cuenta">
            <p id="pUsuario">
            <?php
                if(isset($_SESSION['client'])){
                    echo '<input type="hidden" id="getClientImput" value="'.$_SESSION['user'].'">';
                    echo $_SESSION['user'];
                }else{
                    echo 'Mi cuenta';
                }
            ?>
            </p>
            <div id="interfazUsuario">
                <?php 
                if(!isset($_SESSION['client'])){
                    echo '<a href="'.URL.'cliente/iniciarSession">Iniciar Session</a>';
                    echo '<a href="'.URL.'cliente/registrarse">Registrarse</a>';
                }else{
                    echo '<a id="cerrarSession">Cerrar Session</a>';
                }
                ?>
            </div>
            <span class="icon-cart" id="spanCart"></span>
            <div id="interfazCart"></div>
        </div>
    </nav>
</div>
<div class='menuContainer2'>
    <nav id="menuSecundario">
        <?php 
        require_once 'controller/home/getCategoryController.php'; 
        $GetCategory->model->getCategory();
        ?>
    </nav>
</div>
<script src="<?php echo URL?>public/home/searchArticle.js"></script>
<script src="<?php echo URL?>public/home/fideInterfazAndCarrito.js"></script>