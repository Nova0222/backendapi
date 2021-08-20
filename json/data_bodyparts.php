<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM bodyparts";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$bodyparts = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$bodypart_id = $row['bodypart_id'];
    $bodypart_title = $row['bodypart_title'];
    $bodypart_image = $row['bodypart_image'];

    $bodyparts[] = array(
    	'id'=> $id++,
    	'bodypart_id'=> $bodypart_id,
    	'bodypart_title'=> $bodypart_title,
    	'bodypart_image'=> $bodypart_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($bodyparts);
print ($json_string)

?>
