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
	$post_title = cleardata($_POST['post_title']);
	$post_description = $_POST['post_description'];
	$post_tag = cleardata($_POST['post_tag']);
	$post_featured = cleardata($_POST['post_featured']);
	$post_status = cleardata($_POST['post_status']);
	$post_image = $_FILES['post_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["post_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$post_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($post_image, $post_image_upload . 'post_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO posts (post_id,post_title,post_description,post_tag,post_featured,post_status,post_date,post_image) VALUES (null, :post_title, :post_description, :post_tag, :post_featured, :post_status, CURRENT_TIME, :post_image)'
		);

	$statment->execute(array(
		':post_title' => $post_title,
		':post_description' => $post_description,
		':post_tag' => $post_tag,
		':post_featured' => $post_featured,
		':post_status' => $post_status,
		':post_image' => 'post_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/posts.php');

}

$tags_lists = get_all_tags($connect);

require '../views/new.post.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>