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
	$bodypart_title = cleardata($_POST['bodypart_title']);

	$bodypart_image = $_FILES['bodypart_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["bodypart_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$bodypart_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($bodypart_image, $bodypart_image_upload . 'bodypart_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO bodyparts (bodypart_id,bodypart_title,bodypart_image) VALUES (null, :bodypart_title, :bodypart_image)'
		);

	$statment->execute(array(
		':bodypart_title' => $bodypart_title,
		':bodypart_image' => 'bodypart_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/bodyparts.php');

}

require '../views/new.bodypart.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>