<?php 
include('dbcon.php'); 
$usu_amigo = $_POST['usu_amigo'];
session_start();
$_SESSION['usuario'];
$mi_usuario = $_SESSION['usuario'];
$conexion=mysqli_connect("localhost","root","","usuarios");

//Consulta para saber si el nombre de usuario existe
$qUsuario = "SELECT * FROM usuario where '$usu_amigo'=usuario";
$result = mysqli_query($conexion, $qUsuario);

if (mysqli_num_rows($result)>0){
    
    $conexion ->query("INSERT into amigos (mi_usuario, usu_amigo) values('$mi_usuario','$usu_amigo')");
    echo "<script>
    alert('Amigo añadido correctamente');
    window.location='plaza.php';
    </script>";

} else {
    echo "<script>
    alert('El usuario al que intenta añadir no existe');
    window.location='plaza.php';
    </script>";
}

?>



