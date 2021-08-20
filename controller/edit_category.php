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

	$category_title = cleardata($_POST['category_title']);
	$category_id = cleardata($_POST['category_id']);
	$category_image_save = $_POST['category_image_save'];
	$category_image = $_FILES['category_image'];

	if (empty($category_image['name'])) {
		$category_image = $category_image_save;
	} else{
			$imagefile = explode(".", $_FILES["category_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$category_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['category_image']['tmp_name'], $category_image_upload . 'catdiet_' . $renamefile);
		$category_image = 'catdiet_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE categories SET category_title = :category_title, category_image = :category_image WHERE category_id = :category_id'
	);

$statment->execute(array(

		':category_title' => $category_title,
		':category_image' => $category_image,
		':category_id' => $category_id

		));

header('Location:' . SITE_URL . '/controller/categories.php');

} else{

$id_category = id_category($_GET['id']);
    
if(empty($id_category)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$category = get_category_per_id($connect, $id_category);
    
    if (!$category){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$category = $category['0'];

}

require '../views/edit.category.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>