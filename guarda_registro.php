<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Guardar Registro</title>
</head>
<body>
<?php
require_once('dbcon.php');

$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$conexion=mysqli_connect("localhost","root","","usuarios");

 //Consulta para saber si el nombre de usuario existe
$qUsuario = "SELECT * FROM usuario where usuario='$usuario'";

//Consulta para saber si el email ya fue registrado
$qEmail = "SELECT * FROM usuario where email='$email'";

$result1 = mysqli_query($conexion, $qUsuario);
$result2 = mysqli_query($conexion, $qEmail);

if(mysqli_num_rows($result1)>0){

    echo "<script>
    alert('Este usuario ya existe, elija otro nombre');
    window.location='registro.php';
    </script>";

} else {
    if(mysqli_num_rows($result2)>0) {
    
    echo "<script>
    alert('Este email ya fue registrado, acceda al login');
    window.location='login.php';
    </script>";

} else {

$conexion->query("INSERT into usuario (usuario,nombre,apellidos,email,pass) values ('$usuario','$nombre','$apellidos','$email','$pass')");	

    echo "<script>
    alert('Usuario registrado correctamente');
    window.location='login.php';
    </script>";
    
}}
?>

</body>
</html>