
<?php

$conexion=mysqli_connect("localhost","root","","usuarios");
$title = $_POST['title'];
$creador = $_POST['creador'];
$fecha = $_POST['fecha'];

$conexion->query("INSERT INTO eventos (title,creador,fecha) VALUES ('$title','$creador','$fecha')");	

echo "<script>
    alert('Evento registrado correctamente');
    window.location='eventos.php';
    </script>";

?>
