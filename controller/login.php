<?php 




session_start();

require '../admin/config.php';
require '../admin/functions.php';

if (isset($_SESSION['username'])){
    
    header('Location: ' . SITE_URL . '/controller/home.php');
}

$connect = connect($database);
if(!$connect){
	header('Location: ' . SITE_URL . '/controller/error.php');
	}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	//$password = hash('sha512', $password);
	
	$errors = '';
	
	try{        
            $connect;
            
        }catch (PDOException $e){
            
            echo "Error: ." . $e->getMessage();   
       }
	   	  $statement = $connect->prepare('SELECT * FROM managers WHERE username = :username AND password = :password');
		  $statement->execute(array(
		  ':username' => $username,
		  ':password' => $password
		  
		  ));
		  
		  
		  $result_login = $statement->fetch();
		  
		 if ($result_login !== false){
			 $_SESSION['username'] = $username;
			 header('Location: ' . SITE_URL . '/controller/home.php');
			 
			 }else{
				 
				 $errors .='Incorrect login data';
				 
				 }

	  }
	  

$title_page = 'Sign In';
require '../views/header.view.php';
require '../views/login.view.php';
require '../views/footer.view.php';

?>