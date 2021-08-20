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

	$post_title = cleardata($_POST['post_title']);
	$post_description = $_POST['post_description'];
	$post_tag = cleardata($_POST['post_tag']);
	$post_id = cleardata($_POST['post_id']);
	$post_featured = cleardata($_POST['post_featured']);
	$post_status = cleardata($_POST['post_status']);
	$post_image_save = $_POST['post_image_save'];
	$post_image = $_FILES['post_image'];

	if (empty($post_image['name'])) {
		$post_image = $post_image_save;
	} else{
			$imagefile = explode(".", $_FILES["post_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$post_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['post_image']['tmp_name'], $post_image_upload . 'post_' . $renamefile);
		$post_image = 'post_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE posts SET post_title = :post_title, post_description = :post_description, post_tag = :post_tag, post_featured = :post_featured, post_status = :post_status, post_image = :post_image WHERE post_id = :post_id'
	);

$statment->execute(array(

		':post_title' => $post_title,
		':post_description' => $post_description,
		':post_tag' => $post_tag,
		':post_featured' => $post_featured,
		':post_status' => $post_status,
		':post_image' => $post_image,
		':post_id' => $post_id

		));

header('Location:' . SITE_URL . '/controller/posts.php');

} else{

$id_post = id_post($_GET['id']);
    
if(empty($id_post)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$post = get_post_per_id($connect, $id_post);
    
    if (!$post){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$post = $post['0'];

}

$tags_lists = get_all_tags($connect);

require '../views/edit.post.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>