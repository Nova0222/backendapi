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

	$quote_title = $_POST['quote_title'];
	$quote_id = cleardata($_POST['quote_id']);

$statment = $connect->prepare(
	'UPDATE quotes SET quote_title = :quote_title WHERE quote_id = :quote_id'
	);

$statment->execute(array(

		':quote_title' => $quote_title,
		':quote_id' => $quote_id

		));

header('Location:' . SITE_URL . '/controller/quotes.php');

} else{

$id_quote = id_quote($_GET['id']);
    
if(empty($id_quote)){
	header('Location: ' . SITE_URL . '/controller/home.php');
	}

$quote = get_quote_per_id($connect, $id_quote);
    
    if (!$quote){
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$quote = $quote['0'];

}

require '../views/edit.quote.view.php';
require '../views/footer.view.php';
    
} else {
		header('Location: ' . SITE_URL . '/controller/login.php');		
		}


?>