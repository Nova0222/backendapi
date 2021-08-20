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
	$category_title = cleardata($_POST['category_title']);

	$category_image = $_FILES['category_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["category_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$category_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($category_image, $category_image_upload . 'catdiet_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO categories (category_id,category_title,category_image) VALUES (null, :category_title, :category_image)'
		);

	$statment->execute(array(
		':category_title' => $category_title,
		':category_image' => 'catdiet_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/categories.php');

}

require '../views/new.category.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>