<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,equipments.equipment_image,equipments.equipment_title AS equipment_title, levels.level_title AS level_title, GROUP_CONCAT(bodyparts.bodypart_title) AS bodypart_title FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON bodyparts.bodypart_id = exercises_bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN levels ON exercises.exercise_level = levels.level_id GROUP BY exercises.exercise_id ORDER BY exercises.exercise_id DESC";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$exercise_id = $row['exercise_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_equipment = $row['exercise_equipment'];
    $exercise_level = $row['exercise_level'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_rest = $row['exercise_rest'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_video = $row['exercise_video'];
    $exercise_image = $row['exercise_image'];
    $exercise_tips = $row['exercise_tips'];
    $exercise_instructions = $row['exercise_instructions'];
    $bodypart_title = $row['bodypart_title'];
    $equipment_title = $row['equipment_title'];
    $level_title = $row['level_title'];

    $exercises[] = array(
    	'id'=> $id++,
    	'exercise_id'=> $exercise_id,
    	'exercise_title'=> html_entity_decode($exercise_title),
    	'exercise_equipment'=> $exercise_equipment,
    	'exercise_level'=> $exercise_level,
    	'exercise_reps'=> $exercise_reps,
        'exercise_rest'=> $exercise_rest,
        'exercise_sets'=> $exercise_sets,
        'exercise_video'=> $exercise_video,
    	'exercise_image'=> $exercise_image,
        'exercise_tips'=> $exercise_tips,
        'exercise_instructions'=> $exercise_instructions,
        'bodypart_title'=> $bodypart_title,
        'equipment_title'=> html_entity_decode($equipment_title),
    	'level_title'=> $level_title,
    	);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = '{"exercises":' . json_encode($exercises) . '}';
print ($json_string)

?>
