<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BOARD GAME MEETING POINT</title>
    <link rel="stylesheet" href="css/estilosWeb.css"/>
    <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
    
</head>
<body>
<?php  
    $conexion=mysqli_connect("localhost","root","","usuarios");
	session_start();
    $_SESSION['usuario'];

	if(!isset ($_SESSION['usuario'])){
		header("location:login.php");
	}

	?>
   
    <div class="header">
        <img class="logo" src="imagenes/logo.jpg" alt="logo BGMP">
        <h1>BOARD GAME MEETING POINT</h1> 
        
        <p>¡BIENVENIDO 
        <?php 
        echo $_SESSION['usuario'];
        ?>! <a href="cierre_sesion.php">Cerrar sesion</a>  </p>
        <a href="plaza.php">Plaza</a>
        
    </div>

    

    <h2>ESTE ES TU PERFIL</h2>
    
    <table class="tabla">
        
        <tr>
        <th colspan="5">Mis juegos</th>
        </tr>
    
        <tr>
            <th>Título</th>
            <th>Nº Jugadores</th>
            <th>Duración</th>
            <th>Edad mínima</th>
            <th>Dificultad</th>
        </tr>

        <?php
        $propietario = $_SESSION['usuario'];
        $query = "SELECT * FROM juegos where propietario='$propietario'";
        $result = mysqli_query($conexion, $query);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
              <th><?php echo $mostrar['titulo'] ?></th>
              <th><?php echo $mostrar['njugadores'] ?></th>
              <th><?php echo $mostrar['tiempo'] ?></th>
              <th><?php echo $mostrar['edad'] ?></th>
              <th><?php echo $mostrar['dificultad'] ?></th>
        </tr>
        <?php
        }
        ?>
    </table>      
    <div>
    
        <form class="form" method="post" action="guarda_juegos.php">
        <label>Registra tus juegos:</label><br>

            <label>Titulo</label>
            <input type="text" name="titulo" placeholder="Titulo..." required>

            <label>Propietario</label>
            <input type="text" name="propietario" value = <?php echo $_SESSION['usuario'];?>>

            <label>Número de jugadores</label>
            <input type="text" name="njugadores" placeholder="Número de jugadores..." required>

            <label>Duración</label>
            <input type="text" name="tiempo" placeholder="Duración..." required>

            <label>Edad mínima</label>
            <input type="text" name="edad" placeholder="Edad mínima..." required>

            <label>Dificultad</label>
            <input type="text" name="dificultad" placeholder="Dificultad..." required>

            <input type="hidden" name="accion" value="registro" required>

            <input type="submit" class="boton" value="Registrar" required>
            
        </form>
    </div> 
   
</body>
</html>