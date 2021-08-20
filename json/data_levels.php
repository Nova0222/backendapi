<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM levels";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$levels = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$level_id = $row['level_id'];
    $level_title = $row['level_title'];
    $level_image = $row['level_image'];

    $levels[] = array(
    	'id'=> $id++,
    	'level_id'=> $level_id,
    	'level_title'=> $level_title,
    	'level_image'=> $level_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($levels);
print ($json_string)

?>
