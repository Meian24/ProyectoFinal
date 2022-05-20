<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Guardar Juegos</title>
</head>
<body>
<?php
include('dbcon.php');
$titulo = $_POST['titulo'];
$propietario = $_POST['propietario'];
$njugadores = $_POST['njugadores'];
$tiempo = $_POST['tiempo'];
$edad= $_POST['edad'];
$dificultad = $_POST['dificultad'];

$conexion->query("insert into juegos (titulo,propietario,njugadores,tiempo,edad,dificultad) values ('$titulo','$propietario','$njugadores','$tiempo','$edad','$dificultad')");	
?>
<script>
	alert('Juego registrado correctamente');	
</script>
<?php
    header("location:perfil.php");
?>

</body>
</html>