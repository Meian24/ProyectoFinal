<?php

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","usuarios");

$consulta="SELECT*FROM usuario where usuario='$usuario' and pass='$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:perfil.php");

}else{
    
    header("location:registro.php");
  
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>