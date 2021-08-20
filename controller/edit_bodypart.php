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

	$bodypart_title = cleardata($_POST['bodypart_title']);
	$bodypart_id = cleardata($_POST['bodypart_id']);
	$bodypart_image_save = $_POST['bodypart_image_save'];
	$bodypart_image = $_FILES['bodypart_image'];

	if (empty($bodypart_image['name'])) {
		$bodypart_image = $bodypart_image_save;
	} else{
			$imagefile = explode(".", $_FILES["bodypart_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$bodypart_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['bodypart_image']['tmp_name'], $bodypart_image_upload . 'bodypart_' . $renamefile);
		$bodypart_image = 'bodypart_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE bodyparts SET bodypart_title = :bodypart_title, bodypart_image = :bodypart_image WHERE bodypart_id = :bodypart_id'
	);

$statment->execute(array(

		':bodypart_title' => $bodypart_title,
		':bodypart_image' => $bodypart_image,
		':bodypart_id' => $bodypart_id

		));

header('Location:' . SITE_URL . '/controller/bodyparts.php');

} else{

$id_bodypart = id_bodypart($_GET['id']);
    
if(empty($id_bodypart)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$bodypart = get_bodypart_per_id($connect, $id_bodypart);
    
    if (!$bodypart){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$bodypart = $bodypart['0'];

}

require '../views/edit.bodypart.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>