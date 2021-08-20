<?php 



session_start();

if (isset($_SESSION['username'])){
    
    header('Location: ./controller/home.php');
} else {
    
    header('Location: ./controller/login.php');
}



?>