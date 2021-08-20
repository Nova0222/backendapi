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
	$diet_servings = cleardata($_POST['diet_servings']);
	$diet_featured = cleardata($_POST['diet_featured']);
	$diet_status = cleardata($_POST['diet_status']);
	$diet_image = $_FILES['diet_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["diet_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$diet_image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($diet_image, $diet_image_upload . 'recipe_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO diets (diet_id,diet_title,diet_description,diet_ingredients,diet_category,diet_directions,diet_calories,diet_carbs,diet_protein,diet_fat,diet_time,diet_servings,diet_featured,diet_status,diet_image) VALUES (null, :diet_title, :diet_description, :diet_ingredients, :diet_category, :diet_directions, :diet_calories, :diet_carbs, :diet_protein, :diet_fat, :diet_time, :diet_servings, :diet_featured, :diet_status, :diet_image)'
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
		':diet_image' => 'recipe_' . $renamefile
		));

	header('Location:' . SITE_URL . '/controller/recipes.php');

}

$categories_lists = get_all_categories($connect);

require '../views/new.recipe.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>