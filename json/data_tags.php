<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM tags";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$tags = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$tag_id = $row['tag_id'];
    $tag_title = $row['tag_title'];

    $tags[] = array(
    	'id'=> $id++,
    	'tag_id'=> $tag_id,
    	'tag_title'=> $tag_title,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($tags);
print ($json_string)

?>
