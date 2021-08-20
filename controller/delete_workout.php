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

$id_workout = cleardata($_GET['id']);

if(!$id_workout){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM we_day1 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day2 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day3 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day4 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day5 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day6 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM we_day7 WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

$statement = $connect->prepare('DELETE FROM workouts WHERE workout_id = :workout_id;');
$statement->execute(array('workout_id' => $id_workout));

header('Location: ' . $_SERVER['HTTP_REFERER']);


}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>