<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$exercises_lists1 = $_POST['exercise_id1'];
	$exercises_lists2 = $_POST['exercise_id2'];
	$exercises_lists3 = $_POST['exercise_id3'];
	$exercises_lists4 = $_POST['exercise_id4'];
	$exercises_lists5 = $_POST['exercise_id5'];
	$exercises_lists6 = $_POST['exercise_id6'];
	$exercises_lists7 = $_POST['exercise_id7'];

	$day1 = cleardata($_POST['day_1']);
	$day2 = cleardata($_POST['day_2']);
	$day3 = cleardata($_POST['day_3']);
	$day4 = cleardata($_POST['day_4']);
	$day5 = cleardata($_POST['day_5']);
	$day6 = cleardata($_POST['day_6']);
	$day7 = cleardata($_POST['day_7']);

	$workout_title = cleardata($_POST['workout_title']);
	$workout_description = $_POST['workout_description'];
	$workout_goal = $_POST['workout_goal'];
	$workout_level = cleardata($_POST['workout_level']);
	$workout_duration = $_POST['workout_duration'];
	$workout_status = $_POST['workout_status'];

	$workout_id = cleardata($_POST['workout_id']);
	$workout_image_save = $_POST['workout_image_save'];
	$workout_image = $_FILES['workout_image'];

	if (empty($workout_image['name'])) {
		$workout_image = $workout_image_save;
	} else{
			$imagefile = explode(".", $_FILES["workout_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$workout_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['workout_image']['tmp_name'], $workout_image_upload . 'workout_' . $renamefile);
		$workout_image = 'workout_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE workouts SET workout_title = :workout_title, workout_description = :workout_description, workout_goal = :workout_goal, workout_level = :workout_level, workout_duration = :workout_duration, workout_status = :workout_status, workout_image = :workout_image WHERE workout_id = :workout_id'
	);

$statment->execute(array(

		':workout_title' => $workout_title,
		':workout_description' => $workout_description,
		':workout_goal' => $workout_goal,
		':workout_level' => $workout_level,
		':workout_duration' => $workout_duration,
		':workout_status' => $workout_status,
		':workout_image' => $workout_image,
		':workout_id' => $workout_id

		));

$statment = $connect->prepare('DELETE FROM we_day1 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day1 (exercise_id,workout_id,day_1) VALUES (:exercise_id1, :workout_id, :day_1)' );
$statment->bindParam(':exercise_id1', $idexercise1);
$statment->bindParam(':day_1', $day_id_1);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists1 as $option_value1)
{
   $idexercise1 = $option_value1;
   $day_id_1 = $day1;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day2 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day2 (exercise_id,workout_id,day_2) VALUES (:exercise_id2, :workout_id, :day_2)' );
$statment->bindParam(':exercise_id2', $idexercise2);
$statment->bindParam(':day_2', $day_id_2);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists2 as $option_value2)
{
   $idexercise2 = $option_value2;
   $day_id_2 = $day2;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day3 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day3 (exercise_id,workout_id,day_3) VALUES (:exercise_id3, :workout_id, :day_3)' );
$statment->bindParam(':exercise_id3', $idexercise3);
$statment->bindParam(':day_3', $day_id_3);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists3 as $option_value3)
{
   $idexercise3 = $option_value3;
   $day_id_3 = $day3;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day4 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day4 (exercise_id,workout_id,day_4) VALUES (:exercise_id4, :workout_id, :day_4)' );
$statment->bindParam(':exercise_id4', $idexercise4);
$statment->bindParam(':day_4', $day_id_4);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists4 as $option_value4)
{
   $idexercise4 = $option_value4;
   $day_id_4 = $day4;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day5 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day5 (exercise_id,workout_id,day_5) VALUES (:exercise_id5, :workout_id, :day_5)' );
$statment->bindParam(':exercise_id5', $idexercise5);
$statment->bindParam(':day_5', $day_id_5);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists5 as $option_value5)
{
   $idexercise5 = $option_value5;
   $day_id_5 = $day5;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day6 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day6 (exercise_id,workout_id,day_6) VALUES (:exercise_id6, :workout_id, :day_6)' );
$statment->bindParam(':exercise_id6', $idexercise6);
$statment->bindParam(':day_6', $day_id_6);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists6 as $option_value6)
{
   $idexercise6 = $option_value6;
   $day_id_6 = $day6;
   $statment->execute();
}

$statment = $connect->prepare('DELETE FROM we_day7 WHERE workout_id = :workout_id');
$statment->bindParam(':workout_id',$workout_id);
$statment->execute();

$statment = $connect->prepare( 'INSERT INTO we_day7 (exercise_id,workout_id,day_7) VALUES (:exercise_id7, :workout_id, :day_7)' );
$statment->bindParam(':exercise_id7', $idexercise7);
$statment->bindParam(':day_7', $day_id_7);
$statment->bindParam(':workout_id', $workout_id);

foreach ($exercises_lists7 as $option_value7)
{
   $idexercise7 = $option_value7;
   $day_id_7 = $day7;
   $statment->execute();
}

header('Location:' . SITE_URL . '/controller/workouts.php');

} else{

$id_workout = id_workout($_GET['id']);
    
if(empty($id_workout)){
	header('Location: home.php');
	}

$workout = get_workout_per_id($connect, $id_workout);
    
    if (!$workout){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$workout = $workout['0'];

}

$exercises_lists1 = get_exercises_list($connect);
$exercises_selected1 = selected_exercises1($connect);
$exercises_not_selected1 = not_selected_exercises1($connect);

$exercises_lists2 = get_exercises_list($connect);
$exercises_selected2 = selected_exercises2($connect);
$exercises_not_selected2 = not_selected_exercises2($connect);

$exercises_lists3 = get_exercises_list($connect);
$exercises_selected3 = selected_exercises3($connect);
$exercises_not_selected3 = not_selected_exercises3($connect);

$exercises_lists4 = get_exercises_list($connect);
$exercises_selected4 = selected_exercises4($connect);
$exercises_not_selected4 = not_selected_exercises4($connect);

$exercises_lists5 = get_exercises_list($connect);
$exercises_selected5 = selected_exercises5($connect);
$exercises_not_selected5 = not_selected_exercises5($connect);

$exercises_lists6 = get_exercises_list($connect);
$exercises_selected6 = selected_exercises6($connect);
$exercises_not_selected6 = not_selected_exercises6($connect);

$exercises_lists7 = get_exercises_list($connect);
$exercises_selected7 = selected_exercises7($connect);
$exercises_not_selected7 = not_selected_exercises7($connect);

$levels_lists = get_all_levels($connect);
$goals_lists = get_all_goals($connect);

require '../views/edit.workout.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>