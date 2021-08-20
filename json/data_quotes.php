<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM quotes";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$quotes = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$quote_id = $row['quote_id'];
    $quote_title = $row['quote_title'];

    $quotes[] = array(
    	'id'=> $id++,
    	'quote_id'=> $quote_id,
    	'quote_title'=> html_entity_decode($quote_title),
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($quotes);
print ($json_string)

?>
