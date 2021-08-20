<?php

if(isset($_GET["workout"])){
    if(!empty($_GET["workout"])){

?>
<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,workouts.workout_id, equipments.equipment_title AS equipment_title, levels.level_title AS level_title, we_day4.workout_id AS workout_id FROM exercises JOIN levels ON exercises.exercise_level = levels.level_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN we_day4 ON we_day4.exercise_id = exercises.exercise_id JOIN workouts ON we_day4.workout_id = workouts.workout_id WHERE we_day4.workout_id='".$_GET["workout"]."'";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $workout_id = $row['workout_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_level = $row['exercise_level'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_rest = $row['exercise_rest'];
    $exercise_image = $row['exercise_image'];
    $exercise_video = $row['exercise_video'];
    $exercise_id = $row['exercise_id'];
    $exercise_tips = $row['exercise_tips'];
    $exercise_instructions = $row['exercise_instructions'];
    $equipment_title = $row['equipment_title'];
    $level_title = $row['level_title'];
    

    $exercises[] = array(
        'id'=> $id++,
        'workout_id'=> $workout_id,
        'day'=> '1',
        'exercise_title'=> html_entity_decode($exercise_title),
        'exercise_reps'=> $exercise_reps,
        'exercise_level'=> $exercise_level,
        'exercise_sets'=> $exercise_sets,
        'exercise_rest'=> $exercise_rest,
        'exercise_image'=> $exercise_image,
        'exercise_video'=> $exercise_video,
        'exercise_id'=> $exercise_id,
        'exercise_tips'=> $exercise_tips,
        'exercise_instructions'=> $exercise_instructions,
        'equipment_title'=> html_entity_decode($equipment_title),
        'level_title'=> $level_title,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($exercises);
print ($json_string);

?>

<?php

}}

?>

<?php

    if(empty($_GET["workout"])){

?>

<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$sql = "SELECT exercises.*,workouts.workout_id, equipments.equipment_title AS equipment_title, levels.level_title AS level_title, we_day4.workout_id AS workout_id FROM exercises JOIN levels ON exercises.exercise_level = levels.level_id JOIN equipments ON exercises.exercise_equipment = equipments.equipment_id JOIN we_day4 ON we_day4.exercise_id = exercises.exercise_id JOIN workouts ON we_day4.workout_id = workouts.workout_id";

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$exercises = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{   
    $workout_id = $row['workout_id'];
    $exercise_title = $row['exercise_title'];
    $exercise_reps = $row['exercise_reps'];
    $exercise_level = $row['exercise_level'];
    $exercise_sets = $row['exercise_sets'];
    $exercise_rest = $row['exercise_rest'];
    $exercise_image = $row['exercise_image'];
    $exercise_video = $row['exercise_video'];
    $exercise_id = $row['exercise_id'];
    $exercise_tips = $row['exercise_tips'];
    $exercise_instructions = $row['exercise_instructions'];
    $equipment_title = $row['equipment_title'];
    $level_title = $row['level_title'];
    

    $exercises[] = array(
        'id'=> $id++,
        'workout_id'=> $workout_id,
        'day'=> '1',
        'exercise_title'=> html_entity_decode($exercise_title),
        'exercise_reps'=> $exercise_reps,
        'exercise_level'=> $exercise_level,
        'exercise_sets'=> $exercise_sets,
        'exercise_rest'=> $exercise_rest,
        'exercise_image'=> $exercise_image,
        'exercise_video'=> $exercise_video,
        'exercise_id'=> $exercise_id,
        'exercise_tips'=> $exercise_tips,
        'exercise_instructions'=> $exercise_instructions,
        'equipment_title'=> html_entity_decode($equipment_title),
        'level_title'=> $level_title,
        );

}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($exercises);
print ($json_string);


?>

<?php

}

?>