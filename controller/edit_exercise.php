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

	$bodyparts_lists = $_POST['bodypart_id'];

	$exercise_title = cleardata($_POST['exercise_title']);
	$exercise_reps = cleardata($_POST['exercise_reps']);
	$exercise_sets = cleardata($_POST['exercise_sets']);
	$exercise_rest = cleardata($_POST['exercise_rest']);
	$exercise_equipment = $_POST['exercise_equipment'];
	$exercise_level = cleardata($_POST['exercise_level']);
	$exercise_video = cleardata($_POST['exercise_video']);
	$exercise_tips = $_POST['exercise_tips'];
	$exercise_instructions = $_POST['exercise_instructions'];
	$exercise_id = cleardata($_POST['exercise_id']);
	$exercise_image_save = $_POST['exercise_image_save'];
	$exercise_image = $_FILES['exercise_image'];

	if (empty($exercise_image['name'])) {
		$exercise_image = $exercise_image_save;
	} else{
			$imagefile = explode(".", $_FILES["exercise_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$exercise_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['exercise_image']['tmp_name'], $exercise_image_upload . 'exercise_' . $renamefile);
		$exercise_image = 'exercise_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE exercises SET exercise_title = :exercise_title, exercise_reps = :exercise_reps, exercise_sets = :exercise_sets, exercise_rest = :exercise_rest, exercise_equipment = :exercise_equipment, exercise_level = :exercise_level, exercise_video = :exercise_video, exercise_tips = :exercise_tips, exercise_instructions = :exercise_instructions, exercise_image = :exercise_image WHERE exercise_id = :exercise_id'
	);

$statment->execute(array(

		':exercise_title' => $exercise_title,
		':exercise_reps' => $exercise_reps,
		':exercise_sets' => $exercise_sets,
		':exercise_rest' => $exercise_rest,
		':exercise_equipment' => $exercise_equipment,
		':exercise_level' => $exercise_level,
		':exercise_video' => $exercise_video,
		':exercise_tips' => $exercise_tips,
		':exercise_instructions' => $exercise_instructions,
		':exercise_image' => $exercise_image,
		':exercise_id' => $exercise_id

		));


$statment = $connect->prepare('DELETE FROM exercises_bodyparts WHERE exercise_id = :exercise_id');
  $statment->bindParam(':exercise_id',$exercise_id);
  $statment->execute();

  $statment = $connect->prepare( 'INSERT INTO exercises_bodyparts (bodypart_id,exercise_id) VALUES (:bodypart_id, :exercise_id)' );
  $statment->bindParam(':bodypart_id', $idbodypart);
  $statment->bindParam(':exercise_id', $exercise_id);

  $statment->execute();

foreach ($bodyparts_lists as $option_value)
{
   $idbodypart = $option_value;
   $statment->execute();
}

header('Location:' . SITE_URL . '/controller/exercises.php');

} else{

$id_exercise = id_exercise($_GET['id']);
    
if(empty($id_exercise)){
	header('Location: home.php');
	}

$exercise = get_exercise_per_id($connect, $id_exercise);
    
    if (!$exercise){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$exercise = $exercise['0'];

}

$equipments_lists = get_all_equipments($connect);
$levels_lists = get_all_levels($connect);
$bodyparts_lists = get_all_bodyparts($connect);
$bodyparts_selected = selected_bodyparts($connect);
$bodyparts_not_selected = not_selected_bodyparts($connect);

require '../views/edit.exercise.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>