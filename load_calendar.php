<?php

$connect = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');

$data = array();

$query = "SELECT * FROM calendario ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'title' => $row["usuario"],
  'start'   => $row["start_event"]
  
 );
}

echo json_encode($data);

?>

