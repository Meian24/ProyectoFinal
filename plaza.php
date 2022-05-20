<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilosWeb.css"/>
    <link rel="icon" href="imagenes/logo.jpg" type="image/jpg" sizes="192x192" />
    <title>Mi Plaza</title>
</head>
<body>
<div class="header">
        <img class="logo" src="imagenes/logo.jpg" alt="logo BGMP">
        <h1>BOARD GAME MEETING POINT</h1>
        <h2>PLAZA</h2>
        <a href="perfil.php">Mi perfil</a>
        <a href="partidas.php">Partidas</a>
        <a href="calendar.php">Calendario</a>  
        <a href="cierre_sesion.php">Cerrar sesion</a>    
        
</div>

<table class="tabla">
        
        <tr>
        <th>Mis amigos:</th>
        </tr>
    
        <?php
        $conexion=mysqli_connect("localhost","root","","usuarios");
        session_start();
        $_SESSION['usuario'];
        $mi_usuario = $_SESSION['usuario'];
        $query = "SELECT * FROM amigos where mi_usuario='$mi_usuario'";
        $result = mysqli_query($conexion, $query);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
              <th><?php echo $mostrar['usu_amigo'] ?></th>
        </tr>
        
        <?php
        }
        ?>

</table>

<table class="tabla">
        <tr>
        <th colspan="6">Juegos de mis amigos:</th>
        </tr>
        <div id="filtros">
        <h2>Filtra los juegos:</h2>
        <form method="post">
        <select name="filtro">
        <option value="todos">Todos</option>
        <option value="propietario">Propietario</option>
        <option value="njugadores">Nº de jugadores</option>
        <option value="cortos">Cortos</option>
        <option value="largos">Largos</option>
        <option value="facil">Fáciles</option>
        <option value="dificil">Difíciles</option>
        </select> 
        <button type="submit">Filtrar</button></form>
        </div>
        <tr>
            <th>Título</th>
            <th>Propietario</th>
            <th>Nº Jugadores</th>
            <th>Duración</th>
            <th>Edad mínima</th>
            <th>Dificultad</th>
        </tr>
        <?php
        if(isset($_POST['filtro'])){
        switch($_POST['filtro']){
        case "todos":
        $sql = "SELECT * FROM juegos INNER JOIN amigos WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo;";
        break;
        case "propietario":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`propietario` ASC;";
        break;
        case "njugadores":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`njugadores` ASC;";
        break;
        case "cortos":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`tiempo` ASC;";
        break;
        case "largos":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`tiempo` DESC;";
        break;
        case "facil":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`dificultad` ASC;";
        break;
        case "dificil":
        $sql = "SELECT * FROM `juegos` INNER JOIN `amigos` WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo " . "ORDER BY `juegos`.`dificultad` DESC;";
        break;
        }
        }else {
        $sql = "SELECT * FROM juegos INNER JOIN amigos WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo;";
        }
        
        $result = mysqli_query($conexion, $sql);
        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
              <th><?php echo $mostrar['titulo'] ?></th>
              <th><?php echo $mostrar['propietario'] ?></th>
              <th><?php echo $mostrar['njugadores'] ?></th>
              <th><?php echo $mostrar['tiempo'] ?></th>
              <th><?php echo $mostrar['edad'] ?></th>
              <th><?php echo $mostrar['dificultad'] ?></th>
        </tr>
        
        <?php
        }
        ?>

        </table>
        
    <form class="form" method="post" action="add_amigo.php">
    <label>Añade a tus amigos:</label><br>
        <label>Usuario</label>
        <input type="text" name="usu_amigo" placeholder="Usuario de tu amigo..." required>
        <input type="submit" class="boton" value="Añadir" required>
    </form>
    
</body>
</html>