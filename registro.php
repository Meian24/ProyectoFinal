<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="estilosWeb.css">
    <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
</head>
<body>
    <div class="header">
    <img class="logo" src="imagenes/logo.jpg" alt="logo BGMP">
    <h1>BOARD GAME MEETING POINT</h1>  
    </div>

    <div>
        <h2 id="frm">Formulario de registro</h2>
    
        <form class="form" method="post" action="guarda_registro.php">
            
            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario" placeholder="Tu usuario..." required>
            
            <label for="fname">Nombre</label>
            <input type="text" id="fname" name="nombre" placeholder="Tu nombre..." required>

            <label for="lname">Apellidos</label>
            <input type="text" id="lname" name="apellidos" placeholder="Tus apellidos..." required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Tu email..." required>

            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña..." required>

            <label for="pass">Repite Contraseña</label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña..." required>

            <input type="hidden" name="accion" value="registro">

            <input type="submit" class="boton" value="Registrar">
            
        </form>
    </div>   
</body>
</html>


