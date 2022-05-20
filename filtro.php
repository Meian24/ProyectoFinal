<?php require("dbcon.php"); ?>
<?php 
if(isset($_POST['filtro'])){
switch($_POST['filtro']){
case "propietario":
$sql = "SELECT * FROM juegos ORDER BY propietario;";
break;
case "njugadores":
$sql = "SELECT * FROM juegos ORDER BY njugadores;";
break;
case "cortos":
$sql = "SELECT * FROM juegos ORDER BY tiempo desc;";
break;
case "largos":
$sql = "SELECT * FROM juegos ORDER BY tiempo asc;";
break;
case "facil":
$sql = "SELECT * FROM juegos ORDER BY dificultad desc;";
break;
case "dificil":
$sql = "SELECT * FROM juegos ORDER BY dificultad asc;";
break;
}
}else{
    $sql = "SELECT * FROM juegos INNER JOIN amigos WHERE mi_usuario='$mi_usuario' AND propietario=amigos.usu_amigo;";
}
header("location:plaza.php");
?>
