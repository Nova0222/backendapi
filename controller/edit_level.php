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

	$level_title = cleardata($_POST['level_title']);
	$level_id = cleardata($_POST['level_id']);
	$level_image_save = $_POST['level_image_save'];
	$level_image = $_FILES['level_image'];

	if (empty($level_image['name'])) {
		$level_image = $level_image_save;
	} else{
			$imagefile = explode(".", $_FILES["level_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$level_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['level_image']['tmp_name'], $level_image_upload . 'level_' . $renamefile);
		$level_image = 'level_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE levels SET level_title = :level_title, level_image = :level_image WHERE level_id = :level_id'
	);

$statment->execute(array(

		':level_title' => $level_title,
		':level_image' => $level_image,
		':level_id' => $level_id

		));

header('Location:' . SITE_URL . '/controller/levels.php');

} else{

$id_level = id_level($_GET['id']);
    
if(empty($id_level)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$level = get_level_per_id($connect, $id_level);
    
    if (!$level){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$level = $level['0'];

}

require '../views/edit.level.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>