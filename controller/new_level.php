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
	$level_title = cleardata($_POST['level_title']);

	$level_image = $_FILES['level_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["level_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$level_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($level_image, $level_image_upload . 'level_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO levels (level_id,level_title,level_image) VALUES (null, :level_title, :level_image)'
		);

	$statment->execute(array(
		':level_title' => $level_title,
		':level_image' => 'level_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/levels.php');

}

require '../views/new.level.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>