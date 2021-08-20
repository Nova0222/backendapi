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

$levels = get_all_levels($connect);
 if (empty($levels)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$levels_total = number_levels($connect);

require '../views/levels.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>