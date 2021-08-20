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

	$equipment_title = cleardata($_POST['equipment_title']);
	$equipment_id = cleardata($_POST['equipment_id']);
	$equipment_image_save = $_POST['equipment_image_save'];
	$equipment_image = $_FILES['equipment_image'];

	if (empty($equipment_image['name'])) {
		$equipment_image = $equipment_image_save;
	} else{
			$imagefile = explode(".", $_FILES["equipment_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$equipment_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['equipment_image']['tmp_name'], $equipment_image_upload . 'equipment_' . $renamefile);
		$equipment_image = 'equipment_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE equipments SET equipment_title = :equipment_title, equipment_image = :equipment_image WHERE equipment_id = :equipment_id'
	);

$statment->execute(array(

		':equipment_title' => $equipment_title,
		':equipment_image' => $equipment_image,
		':equipment_id' => $equipment_id

		));

header('Location:' . SITE_URL . '/controller/equipments.php');

} else{

$id_equipment = id_equipment($_GET['id']);
    
if(empty($id_equipment)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$equipment = get_equipment_per_id($connect, $id_equipment);
    
    if (!$equipment){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$equipment = $equipment['0'];

}

require '../views/edit.equipment.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>