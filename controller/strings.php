<?php

 session_start();
if (isset($_SESSION['username'])){
    
    
require '../admin/config.php';
require '../admin/functions.php';	
$title_page = 'Strings';
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';
$success = '';

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	} 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$st_privacypolicy = $_POST['st_privacypolicy'];
	$st_termsofservice = $_POST['st_termsofservice'];
	$st_aboutus = $_POST['st_aboutus'];

$statment = $connect->prepare(
	'UPDATE strings SET
	st_privacypolicy = :st_privacypolicy,
	st_termsofservice = :st_termsofservice,
	st_aboutus = :st_aboutus
	');

	$statment->execute(array(
		':st_privacypolicy' => $st_privacypolicy,
		':st_termsofservice' => $st_termsofservice,
		':st_aboutus' => $st_aboutus
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$strings = get_all_strings($connect);

$strings = $strings['0'];

}

require '../views/strings.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>