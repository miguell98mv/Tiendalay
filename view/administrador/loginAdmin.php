<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" href='public/administrador/newUser.css'>
    <link rel="stylesheet" href='public/inconos/inconos.css'>
    <script src="public/jquery/jquery-3.4.1.min.js"></script>
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

        <form action="<?php echo URL ?>administrador" method="post" name="formulario">
            <h1>Iniciar Sesion</h1>
            <div id="error"></div>
            <div><span class="icon-mail2"></span><input type="text" id='email' name='email' placeholder="Email"></div>
            <div><span class="icon-lock"></span><input type="password" id="password" name='password' placeholder="Contraseña"></div>
            <input type="hidden" name="emailLogin">
            <input type="hidden" name="userLogin">
            <input type="hidden" name="passwordLogin">
            <input type="button" name="botom" value="Iniciar sesion">
        </form>  
    </div>
    <script src="public/administrador/loginAdmin.js"></script>
</body>
</html>