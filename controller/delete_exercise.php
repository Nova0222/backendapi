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

$id_exercise = cleardata($_GET['id']);

if(!$id_exercise){
	header('Location: ' . SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM exercises_bodyparts WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day1 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day2 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day3 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day4 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day5 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day6 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM we_day7 WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

$statement = $connect->prepare('DELETE FROM exercises WHERE exercise_id = :exercise_id;');
$statement->execute(array('exercise_id' => $id_exercise));

header('Location: ' . $_SERVER['HTTP_REFERER']);


}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>