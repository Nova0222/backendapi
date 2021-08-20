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
	$quote_title = cleardata($_POST['quote_title']);

	$statment = $connect->prepare(
		'INSERT INTO quotes (quote_id,quote_title) VALUES (null, :quote_title)'
		);

	$statment->execute(array(
		':quote_title' => $quote_title
		));

	header('Location:' . SITE_URL . '/controller/quotes.php');

}

require '../views/new.quote.view.php';
require '../views/footer.view.php';
    
}else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>