<?php

if(isset($_GET["equipment"])){
    if(!empty($_GET["equipment"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,bodyparts.bodypart_title, equipments.equipment_title AS equipment_title, levels.level_title AS level_title, exercises_bodyparts.bodypart_id AS exercises_bodyparts_bodypart_id FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON exercises_bodyparts.bodypart_id = bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN levels ON exercises.exercise_level = levels.level_id AND exercises.exercise_equipment='".$_GET["equipment"]."' GROUP BY exercises.exercise_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();

while($row = mysqli_fetch_array($result)) 
{   
    $exercise_id = $row['exercise_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_rest = $row['exercise_rest'];
    $exercise_level = $row['exercise_level'];
    $exercise_equipment = $row['exercise_equipment'];
    $exercise_image = $row['exercise_image'];
    $exercise_video = $row['exercise_video'];
    $exercise_tips = $row['exercise_tips'];
    $exercise_instructions = $row['exercise_instructions'];
    $level_title = $row['level_title'];
    $equipment_title = $row['equipment_title'];
    $bodypart_title = $row['bodypart_title'];
    $exercises_bodyparts_bodypart_id = $row['exercises_bodyparts_bodypart_id'];

    $exercises[] = array('exercise_id'=> $exercise_id, 'exercise_title'=> html_entity_decode($exercise_title), 'exercise_reps'=> $exercise_reps,'exercise_sets'=> $exercise_sets, 'exercise_rest'=> $exercise_rest, 'exercise_level'=> $exercise_level, 'exercise_equipment'=> $exercise_equipment, 'exercise_image'=> $exercise_image,'exercise_video'=> $exercise_video, 'exercise_tips'=> $exercise_tips, 'exercise_instructions'=> $exercise_instructions, 'level_title'=> $level_title, 'equipment_title'=> html_entity_decode($equipment_title), 'bodypart_title'=> $bodypart_title , 'exercises_bodyparts_bodypart_id'=> $exercises_bodyparts_bodypart_id);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($exercises);
print ($json_string)

?>

<?php

}}

?>

<?php

    if(empty($_GET["equipment"])){

?>

<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,bodyparts.bodypart_title, equipments.equipment_title AS equipment_title, levels.level_title AS level_title, exercises_bodyparts.bodypart_id AS exercises_bodyparts_bodypart_id FROM exercises JOIN exercises_bodyparts ON exercises_bodyparts.exercise_id = exercises.exercise_id JOIN bodyparts ON exercises_bodyparts.bodypart_id = bodyparts.bodypart_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN levels ON exercises.exercise_level = levels.level_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_rest = $row['exercise_rest'];
    $exercise_level = $row['exercise_level'];
    $exercise_equipment = $row['exercise_equipment'];
    $exercise_image = $row['exercise_image'];
    $exercise_video = $row['exercise_video'];
    $exercise_tips = $row['exercise_tips'];
    $exercise_instructions = $row['exercise_instructions'];
    $level_title = $row['level_title'];
    $equipment_title = $row['equipment_title'];
    $bodypart_title = $row['bodypart_title'];
    $exercises_bodyparts_bodypart_id = $row['exercises_bodyparts_bodypart_id'];

    $exercises[] = array('id'=> $id++,'exercise_title'=> html_entity_decode($exercise_title), 'exercise_reps'=> $exercise_reps,'exercise_sets'=> $exercise_sets, 'exercise_rest'=> $exercise_rest, 'exercise_level'=> $exercise_level, 'exercise_equipment'=> $exercise_equipment, 'exercise_image'=> $exercise_image,'exercise_video'=> $exercise_video, 'exercise_tips'=> $exercise_tips, 'exercise_instructions'=> $exercise_instructions, 'level_title'=> $level_title, 'equipment_title'=> html_entity_decode($equipment_title), 'bodypart_title'=> $bodypart_title , 'exercises_bodyparts_bodypart_id'=> $exercises_bodyparts_bodypart_id);

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($exercises);
print ($json_string)

?>

<?php

}

?>
