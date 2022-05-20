<?php

$connect = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');

$data = array();

$query = "SELECT * FROM eventos ORDER BY title";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'title' => $row["title"],
  'creador' => $row["creador"],
  'start'   => $row["fecha"],
  'asistente1' => $row["asistente1"],
  'asistente2' => $row["asistente2"],
  'asistente3' => $row["asistente3"],
  'asistente4' => $row["asistente4"]
  
 );
}

echo json_encode($data);

?>