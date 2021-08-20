<?php

if(isset($_GET["exercise"])){
    if(!empty($_GET["exercise"])){

?>
<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*, GROUP_CONCAT(bodyparts.bodypart_title) AS bodypart_title FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id AND exercises.exercise_id = '".$_GET["exercise"]."' JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id GROUP BY exercises.exercise_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$bodypart = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $exercise_id = $row['exercise_id'];
    $bodypart_title = $row['bodypart_title'];

    $bodypart[] = array(
        'id'=> $id++,
        'exercise_id'=> $exercise_id,
        'bodypart_title'=> $bodypart_title,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($bodypart, JSON_NUMERIC_CHECK);
print ($json_string);

?>

<?php

}}

?>