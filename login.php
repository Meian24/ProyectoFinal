<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilosWeb.css">
    <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
</head>
<body>
<div class="header">
    <img class="logo" href="index.html" src="imagenes/logo.jpg" alt="logo BGMP">
    <h1>BOARD GAME MEETING POINT</h1>  
</div>
<div>
    <h2 id="frm">Accede a tu perfil</h2>
    <form class="form" method="post" action="prueba_login.php">
            
        <label for="user">Usuario</label>
        <input type="text" id="user" name="usuario" placeholder="Tu usuario..." required>

        <label for="pass">Contraseña</label>
        <input type="password" id="pass" name="pass" placeholder="Contraseña..." required>

        <input type="hidden" name="accion" value="login">

        <input type="submit" class="boton" value="Entrar">
            
    </form>
</div>
</body>
</html>



