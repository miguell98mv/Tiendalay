<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" href='public/administrador/newUser.css'>
    <link rel="stylesheet" href='public/inconos/inconos.css'>
    <title>Tiendalay</title>
</head>
<body>
    <div class="container">
        <section>
            <div class="container-circle">
                <figure class='circle'></figure>
            </div>
            <div class="textLogin">
                <h1>Registrate aqui!</h1>
                <p>Registrate aqui para poder gestionar este sitio de ventas online como
                administrador y publiques el contenido que guste para sus ventas</p>
                <img class="imgLogin" src="<?php echo URL;?>assets/imgLogin.png" alt="Imagen Tienda Animada">
            </div>
        </section>

        <form  action="" method="post" name="formulario">
            <h1>Resgistrate</h1>
            <div><span class="icon-user"></span><input type="text" name='userName' placeholder="Nombre de usuario"></div>
            <div><span class="icon-mail2"></span><input type="text" name='email' placeholder="Email"></div>
            <div><span class="icon-lock"></span><input type="password" name='password' placeholder="Contraseña"></div>
            <div><span class="icon-lock"></span><input type="password" name='confirm' placeholder="Confirmacion"></div>
            <input type="button" name="botom" value="Registrarse">
        </form>  
    </div>
    <script src="public/administrador/postData.js"></script>
</body>
</html>

