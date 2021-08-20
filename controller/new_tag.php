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
	$tag_title = cleardata($_POST['tag_title']);

	/*$tag_image = $_FILES['tag_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["tag_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$tag_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($tag_image, $tag_image_upload . 'tag_' . $renamefile);*/

	$statment = $connect->prepare(
		'INSERT INTO tags (tag_id,tag_title) VALUES (null, :tag_title)'
		);

	$statment->execute(array(
		':tag_title' => $tag_title,
		/*':tag_image' => 'tag_' . $renamefile*/
		));

	header('Location:' . SITE_URL . '/controller/tags.php');

}

require '../views/new.tag.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>