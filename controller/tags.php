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

$tags = get_all_tags($connect);
 if (empty($tags)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$tags_total = number_tags($connect);

require '../views/tags.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>