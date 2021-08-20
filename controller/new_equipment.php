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
	$equipment_title = cleardata($_POST['equipment_title']);

	$equipment_image = $_FILES['equipment_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["equipment_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$equipment_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($equipment_image, $equipment_image_upload . 'equipment_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO equipments (equipment_id,equipment_title,equipment_image) VALUES (null, :equipment_title, :equipment_image)'
		);

	$statment->execute(array(
		':equipment_title' => $equipment_title,
		':equipment_image' => 'equipment_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/equipments.php');

}

require '../views/new.equipment.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>