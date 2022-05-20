<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilosWeb.css"/>
    <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
    <title>Partidas</title>
</head>
<body>
<div class="header">
        <img class="logo" src="imagenes/logo.jpg" alt="logo BGMP">
        <h1>BOARD GAME MEETING POINT</h1>
        <h2>PARTIDAS</h2>
        <a href="perfil.php">Mi perfil</a>
        <a href="plaza.php">Plaza</a>  
        <a href="calendar.php">Calendario</a>
        <a href="cierre_sesion.php">Cerrar sesion</a>    
          
        
</div>
    <h1>Aquí veras tus partidas</h1>
    <?php
    $conexion=mysqli_connect("localhost","root","","usuarios");
    session_start();
    $_SESSION['usuario'];
    $creador = $_SESSION['usuario'];
    ?>

    <div>
    
        <form class="form" method="post" action="guarda_partidas.php">
        <label>Registra tus partidas:</label><br>

        <label>Creador</label>
        <input type="text" name="creador" value = <?php echo $_SESSION['usuario'];?>>

        <label>Juego</label>
        <input type="text" name="juego" placeholder="Juego..." required>
        
        <label>Fecha</label>
        <input type="date" name="fecha" placeholder="Fecha..." required>

        <label>Duración</label>
        <input type="text" name="duracion" placeholder="Duración..." required>

        <label>Ganador</label>
        <input type="text" name="ganador" placeholder="Ganador..." required>

        <input type="submit" class="boton" value="Registrar" required>
            
        </form>
    </div>

    <table class="tabla">
        
        <tr>
        <th colspan="5">Mis partidas</th>
        </tr>
    
        <tr>
            <th>Creador</th>
            <th>Juego</th>
            <th>Fecha</th>
            <th>Duración</th>
            <th>Ganador</th>
        </tr>

        <?php       
        
        $sql = "SELECT * FROM partidas;";
        $result = mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
              <th><?php echo $mostrar['creador'] ?></th>
              <th><?php echo $mostrar['juego'] ?></th>
              <th><?php echo $mostrar['fecha'] ?></th>
              <th><?php echo $mostrar['duracion'] ?></th>
              <th><?php echo $mostrar['ganador'] ?></th>
        </tr>
        
        <?php
        }
        ?>

    </table>

    <table class="tabla">
        
        <tr>
        <th colspan="5">Mejores jugadores</th>
        </tr>
    

    <?php       
        
        $sql = "select ganador, count(ganador) "
        . "from "
        . "`partidas` "
        . "group by "
        . "ganador having count(ganador);";
        
       $result = mysqli_query($conexion, $sql);

       $array = array();
       foreach($result as $results){
           $array[] = $results;
        } 
        for($i=0; $i < count($array); $i++){
        ?>

        <tr>
        <th> Primer lugar </th>
        
        <th><?php 
            echo ($array[$i=0]['ganador']);?></th>
        </tr>

        <tr>
        <th> Segundo lugar </th>
        <th><?php
            echo ($array[$i=1]['ganador']);?></th>
        </tr>
        
        <tr>
        <th> Tercer lugar </th>
        <th><?php 
            echo ($array[$i=2]['ganador']);?></th>
        </tr>
        
        <?php
       }
        ?>

</table>   
</body>
</html>