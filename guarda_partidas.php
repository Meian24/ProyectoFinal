<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Guardar partidas</title>
</head>
<body>
<?php
include('dbcon.php');
$creador = $_POST['creador'];
$juego = $_POST['juego'];
$fecha = $_POST['fecha'];
$duracion = $_POST['duracion'];
$ganador= $_POST['ganador'];

$conexion->query("insert into partidas (creador,juego,fecha,duracion,ganador) values ('$creador','$juego','$fecha','$duracion','$ganador')");	
?>
<script>
	alert('Partida registrada correctamente');	
</script>
<?php
    header("location:partidas.php");
?>

</body>
</html>