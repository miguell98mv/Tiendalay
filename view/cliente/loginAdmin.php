<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" href='<?php echo URL;?>public/administrador/newUser.css'>
    <link rel="stylesheet" href='<?php echo URL;?>public/inconos/inconos.css'>
    <script src="<?php echo URL;?>public/jquery/jquery-3.4.1.min.js"></script>
    <title>Tiendalay</title>
</head>
<body>
    <div class="container">
        <section>
        <div class="container-circle"><figure class='circle'>
            
        </figure></div>
        <div class="textLogin">
            <h1>Iniciar Sesion!</h1>
            <p>Inicia sesion como administrador y gestiona el contenido para este sitio de ventas online
            </p>
             <img class="imgLogin" src="<?php echo URL;?>assets/imgLogin.png" alt="Imagen Tienda Animada">
        </div>
        </section>

        <form action="<?php echo URL ?>cliente/iniciarSession" method="post" name="formulario" id="formulario">
            <h1>Iniciar Sesion</h1>
            <div id="error"></div>
            <div><span class="icon-mail2"></span><input type="text" id='email' name='client' placeholder="Email"></div>
            <div><span class="icon-lock"></span><input type="password" id="password" name='password' placeholder="Contraseña"></div>
            <input type="hidden" name="userLogin">
            <input type="button" name="botom" value="Iniciar sesion">
            <input type="hidden" name="emailClient" value='<?php if(isset($_SESSION['client'])){echo $_SESSION['client'];} ?>'>
            <input type="reset" id="reset" value="" hidden>
        </form>  
    </div>
    <script src="<?php echo URL;?>public/cliente/loginAdmin.js"></script>
</body>
</html>