<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM equipments";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$equipments = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$equipment_id = $row['equipment_id'];
    $equipment_title = $row['equipment_title'];
    $equipment_image = $row['equipment_image'];

    $equipments[] = array(
    	'id'=> $id++,
    	'equipment_id'=> $equipment_id,
    	'equipment_title'=> html_entity_decode($equipment_title),
    	'equipment_image'=> $equipment_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($equipments);
print ($json_string)

?>
