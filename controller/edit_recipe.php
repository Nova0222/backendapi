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

	$diet_title = cleardata($_POST['diet_title']);
	$diet_description = $_POST['diet_description'];
	$diet_ingredients = $_POST['diet_ingredients'];
	$diet_category = cleardata($_POST['diet_category']);
	$diet_directions = $_POST['diet_directions'];
	$diet_calories = cleardata($_POST['diet_calories']);
	$diet_carbs = cleardata($_POST['diet_carbs']);
	$diet_protein = cleardata($_POST['diet_protein']);
	$diet_fat = cleardata($_POST['diet_fat']);
	$diet_time = cleardata($_POST['diet_time']);
	$diet_featured = cleardata($_POST['diet_featured']);
	$diet_status = cleardata($_POST['diet_status']);
	$diet_servings = cleardata($_POST['diet_servings']);
	$diet_id = cleardata($_POST['diet_id']);
	$diet_image_save = $_POST['diet_image_save'];
	$diet_image = $_FILES['diet_image'];

	if (empty($diet_image['name'])) {
		$diet_image = $diet_image_save;
	} else{
			$imagefile = explode(".", $_FILES["diet_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$diet_image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['diet_image']['tmp_name'], $diet_image_upload . 'recipe_' . $renamefile);
		$diet_image = 'recipe_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE diets SET diet_title = :diet_title, diet_description = :diet_description, diet_ingredients = :diet_ingredients, diet_category = :diet_category, diet_directions = :diet_directions, diet_calories = :diet_calories, diet_carbs = :diet_carbs, diet_protein = :diet_protein, diet_fat = :diet_fat, diet_time = :diet_time, diet_servings = :diet_servings, diet_featured = :diet_featured, diet_status = :diet_status, diet_image = :diet_image WHERE diet_id = :diet_id'
	);

$statment->execute(array(

		':diet_title' => $diet_title,
		':diet_description' => $diet_description,
		':diet_ingredients' => $diet_ingredients,
		':diet_category' => $diet_category,
		':diet_directions' => $diet_directions,
		':diet_calories' => $diet_calories,
		':diet_carbs' => $diet_carbs,
		':diet_protein' => $diet_protein,
		':diet_fat' => $diet_fat,
		':diet_time' => $diet_time,
		':diet_servings' => $diet_servings,
		':diet_featured' => $diet_featured,
		':diet_status' => $diet_status,
		':diet_image' => $diet_image,
		':diet_id' => $diet_id

		));

header('Location:' . SITE_URL . '/controller/recipes.php');

} else{

$id_diet = id_diet($_GET['id']);
    
if(empty($id_diet)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$diet = get_diet_per_id($connect, $id_diet);
    
    if (!$diet){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$diet = $diet['0'];

}

$categories_lists = get_all_categories($connect);

require '../views/edit.recipe.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>