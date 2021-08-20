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

	$goal_title = cleardata($_POST['goal_title']);
	$goal_id = cleardata($_POST['goal_id']);
	$goal_image_save = $_POST['goal_image_save'];
	$goal_image = $_FILES['goal_image'];

	if (empty($goal_image['name'])) {
		$goal_image = $goal_image_save;
	} else{
			$imagefile = explode(".", $_FILES["goal_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$goal_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['goal_image']['tmp_name'], $goal_image_upload . 'goal_' . $renamefile);
		$goal_image = 'goal_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE goals SET goal_title = :goal_title, goal_image = :goal_image WHERE goal_id = :goal_id'
	);

$statment->execute(array(

		':goal_title' => $goal_title,
		':goal_image' => $goal_image,
		':goal_id' => $goal_id

		));

header('Location:' . SITE_URL . '/controller/goals.php');

} else{

$id_goal = id_goal($_GET['id']);
    
if(empty($id_goal)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$goal = get_goal_per_id($connect, $id_goal);
    
    if (!$goal){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$goal = $goal['0'];

}

require '../views/edit.goal.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>