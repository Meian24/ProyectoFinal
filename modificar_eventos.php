
<?php
$asistente = $_POST['asistente'];
$title = $_POST['title'];

$conexion=mysqli_connect("localhost","root","","usuarios");

//Consulta para saber si el evento de usuario existe
$qEvento = "SELECT * FROM eventos where title='$title'";
$resultEvento = mysqli_query($conexion, $qEvento);

//Consultas para saber si la celda está vacía
$asis1 = "SELECT `asistente1` FROM `eventos` WHERE `asistente1` IS NULL AND `title`= '$title';";
$result1 = mysqli_query($conexion, $asis1);

//Consultas para añadir columna si la celda ya está ocupada
$asis2 = "SELECT `asistente1` FROM `eventos` WHERE `asistente1` IS NOT NULL AND `asistente2` IS NULL AND `title`= '$title' AND `asistente1`!= '$asistente' AND `creador`!= '$asistente'";
$result2 = mysqli_query($conexion, $asis2);

//Consultas para añadir columna si la celda ya está ocupada
$asis3 = "SELECT `asistente1`,`asistente2` FROM `eventos` WHERE `asistente1` IS NOT NULL AND `asistente2` IS NOT NULL AND `asistente3` IS NULL AND `title`= '$title' AND `asistente1`!= '$asistente' AND `asistente2`!= '$asistente' AND `creador`!= '$asistente';";
$result3 = mysqli_query($conexion, $asis3);

//Consultas para añadir columna si la celda ya está ocupada
$asis4 = "SELECT  `asistente1`,`asistente2`,`asistente3` FROM `eventos` WHERE `asistente1` IS NOT NULL AND `asistente2` IS NOT NULL AND `asistente3` IS NOT NULL AND `asistente4` IS NULL AND `title`= '$title' AND `asistente1`!= '$asistente' AND `asistente2`!= '$asistente' AND `asistente3`!= '$asistente' AND `creador`!= '$asistente';";
$result4 = mysqli_query($conexion, $asis4);

//Consultas para saber si todas las celdas están ocupadas y terminar
$asis5 = "SELECT `asistente1`,`asistente2`,`asistente3`,`asistente4` FROM `eventos` WHERE `asistente1` IS NOT NULL AND `asistente2` IS NOT NULL AND `asistente3` IS NOT NULL AND `asistente4` IS NOT NULL AND `title`= '$title';";
$result5 = mysqli_query($conexion, $asis5);

//Consulta para saber si eres el creador del evento
$creador = "SELECT 'creador' FROM `eventos` WHERE `title`= '$title' AND `creador` = '$asistente' ;";
$resultCreador = mysqli_query($conexion, $creador );


 if(mysqli_num_rows($resultEvento)==0){

    echo "<script>
    alert('Este evento no existe');
    window.location='eventos.php';
    </script>";

} if(mysqli_num_rows($resultCreador)>0){

    echo "<script>
    alert('Eres el creador del evento, no puedes apuntarte');
    window.location='eventos.php';
    </script>";	
 
} if(mysqli_num_rows($result1)>0){

    $conexion->query("UPDATE `eventos` SET `asistente1` = '$asistente' WHERE `eventos`.`title` = '$title';");
    echo "<script>
    alert('Eres el primero en apuntarte');
    window.location='eventos.php';
    </script>";	
 
} if(mysqli_num_rows($result2)>0){

    $conexion->query("UPDATE `eventos` SET `asistente2` = '$asistente' WHERE `eventos`.`title` = '$title';");
    echo "<script>
    alert('Eres el segundo en apuntarte');
    window.location='eventos.php';
    </script>";

}  if(mysqli_num_rows($result3)>0){

    $conexion->query("UPDATE `eventos` SET `asistente3` = '$asistente' WHERE `eventos`.`title` = '$title';");
    echo "<script>
    alert('Eres el tercero en apuntarte');
    window.location='eventos.php';
    </script>";

} if(mysqli_num_rows($result4)>0){

    $conexion->query("UPDATE `eventos` SET `asistente4` = '$asistente' WHERE `eventos`.`title` = '$title';");
    echo "<script>
    alert('Eres el último en apuntarte');
    window.location='eventos.php';
    </script>";

} if(mysqli_num_rows($result5)>0){

        echo "<script>
        alert('¡No se admiten más participantes en este evento!');
        window.location='eventos.php';
        </script>";

} else {

    echo "<script>
        alert('¡Ya estás inscrito!');
        window.location='eventos.php';
        </script>";
}


?>
