<?php 

session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$errors = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$bodyparts_lists = $_POST['bodypart_id'];
	$exercise_title = cleardata($_POST['exercise_title']);
	$exercise_equipment = $_POST['exercise_equipment'];
	$exercise_level = $_POST['exercise_level'];
	$exercise_reps = cleardata($_POST['exercise_reps']);
	$exercise_sets = $_POST['exercise_sets'];
	$exercise_rest = cleardata($_POST['exercise_rest']);
	$exercise_video = cleardata($_POST['exercise_video']);
	$exercise_tips = $_POST['exercise_tips'];
	$exercise_instructions = $_POST['exercise_instructions'];
	$exercise_image = $_FILES['exercise_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["exercise_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$exercise_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($exercise_image, $exercise_image_upload . 'exercise_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO exercises (exercise_id,exercise_title,exercise_equipment,exercise_level,exercise_reps,exercise_sets,exercise_rest,exercise_video,exercise_tips,exercise_instructions,exercise_image) VALUES (null, :exercise_title, :exercise_equipment, :exercise_level, :exercise_reps, :exercise_sets, :exercise_rest, :exercise_video, :exercise_tips, :exercise_instructions, :exercise_image)'
		);

	$statment->execute(array(
		':exercise_title' => $exercise_title,
		':exercise_equipment' => $exercise_equipment,
		':exercise_level' => $exercise_level,
		':exercise_reps' => $exercise_reps,
		':exercise_sets' => $exercise_sets,
		':exercise_rest' => $exercise_rest,
		':exercise_video' => $exercise_video,
		':exercise_tips' => $exercise_tips,
		':exercise_instructions' => $exercise_instructions,
		':exercise_image' => 'exercise_' . $renamefile
		));

$statment = $connect->prepare("SELECT @@identity AS id");
$statment->execute();
$resultado = $statment->fetchAll();
$id = 0;
foreach ($resultado as $row) {
        $id = $row["id"];
    }

$statment = $connect->prepare( 'INSERT INTO exercises_bodyparts (bodypart_id,exercise_id) VALUES (:bodypart_id, :exercise_id)' );
$statment->bindParam(':bodypart_id', $idbodypart);
$statment->bindParam(':exercise_id', $id);

foreach ($bodyparts_lists as $option_value)
{
   $idbodypart = $option_value;
   $statment->execute();
}

	header('Location:' . SITE_URL . '/controller/exercises.php');

}

$equipments_lists = get_all_equipments($connect);
$levels_lists = get_all_levels($connect);
$bodyparts_lists = get_all_bodyparts($connect);

require '../views/new.exercise.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>