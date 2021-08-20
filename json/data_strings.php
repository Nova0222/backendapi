<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT * FROM strings";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$strings = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$st_privacypolicy = $row['st_privacypolicy'];
	$st_termsofservice = $row['st_termsofservice'];
	$st_aboutus = $row['st_aboutus'];

    $strings[] = array(
    	/*'id'=> $id++,*/
    	'st_privacypolicy'=> $st_privacypolicy,
    	'st_termsofservice'=> $st_termsofservice,
    	'st_aboutus'=> $st_aboutus,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($strings);
print ($json_string)

?>
