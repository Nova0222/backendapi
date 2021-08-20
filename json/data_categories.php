<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM categories";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$categories = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$category_id = $row['category_id'];
    $category_title = $row['category_title'];
    $category_image = $row['category_image'];

    $categories[] = array(
    	'id'=> $id++,
    	'category_id'=> $category_id,
    	'category_title'=> $category_title,
    	'category_image'=> $category_image,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($categories);
print ($json_string)

?>
