<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=poolcar3', 'root', '');

$data = array();

$query = "SELECT * FROM booking";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $res)
{
 $data[] = array(
  'id'   => $res["id"],
  'title'   => $res["title"],
  'status'   => $res["status"], 
  'start'   => $res["start_event"],
  'end'   => $res["end_event"]
 );
}

echo json_encode($data);

?>
