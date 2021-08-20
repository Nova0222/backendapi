<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM goals";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$goals = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$goal_id = $row['goal_id'];
    $goal_title = $row['goal_title'];
    $goal_image = $row['goal_image'];

    $goals[] = array(
    	'id'=> $id++,
    	'goal_id'=> $goal_id,
    	'goal_title'=> $goal_title,
    	'goal_image'=> $goal_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($goals);
print ($json_string)

?>
