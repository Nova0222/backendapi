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

$quotes = get_all_quotes($connect);
 if (empty($quotes)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$quotes_total = number_quotes($connect);

require '../views/quotes.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>