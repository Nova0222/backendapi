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

	$tag_title = cleardata($_POST['tag_title']);
	$tag_id = cleardata($_POST['tag_id']);
	/*$tag_image_save = $_POST['tag_image_save'];
	$tag_image = $_FILES['tag_image'];

	if (empty($tag_image['name'])) {
		$tag_image = $tag_image_save;
	} else{
			$imagefile = explode(".", $_FILES["tag_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$tag_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['tag_image']['tmp_name'], $tag_image_upload . 'tag_' . $renamefile);
		$tag_image = 'tag_' . $renamefile;
	}*/


$statment = $connect->prepare(
	'UPDATE tags SET tag_title = :tag_title WHERE tag_id = :tag_id'
	);

$statment->execute(array(

		':tag_title' => $tag_title,
		/*':tag_image' => $tag_image,*/
		':tag_id' => $tag_id

		));

header('Location:' . SITE_URL . '/controller/tags.php');

} else{

$id_tag = id_tag($_GET['id']);
    
if(empty($id_tag)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$tag = get_tag_per_id($connect, $id_tag);
    
    if (!$tag){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$tag = $tag['0'];

}

require '../views/edit.tag.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>