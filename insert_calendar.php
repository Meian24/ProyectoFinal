<?php

$connect = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');


session_start();
$_SESSION['usuario'];


if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO calendario 
 (title, usuario, start_event) 
 VALUES (:title, :usuario, :start_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':usuario'  => $_SESSION['usuario'],
   ':start_event' => $_POST['start']
  )
 );
}


?>