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
	$goal_title = cleardata($_POST['goal_title']);

	$goal_image = $_FILES['goal_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["goal_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$goal_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($goal_image, $goal_image_upload . 'goal_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO goals (goal_id,goal_title,goal_image) VALUES (null, :goal_title, :goal_image)'
		);

	$statment->execute(array(
		':goal_title' => $goal_title,
		':goal_image' => 'goal_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/goals.php');

}

require '../views/new.goal.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>