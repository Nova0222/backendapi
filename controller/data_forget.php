<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET["username"])){

		include 'data_config.php';
		include "class.phpmailer.php";
		include "class.smtp.php";

		//Get settings
    	$settingResult = $conn->query("SELECT * FROM settings");
    	$settingRow = $settingResult->fetch_assoc();
   	 	$site_name = $settingRow['site_name'];
   	 	$email_address = $settingRow['email_address'];
    	$email_password = $settingRow['email_password'];
    	$email_name = $settingRow['email_name'];
    	$smtp_host = $settingRow['smtp_host'];
    	$smtp_port = $settingRow['smtp_port'];
    	$smtp_encrypt = $settingRow['smtp_encrypt'];

    	//Get strings
    	$stringResult = $conn->query("SELECT * FROM strings");
    	$stringRow = $stringResult->fetch_assoc();
    	$st_hellonewaccount = $stringRow['st_hellonewaccount'];
      $st_yourpasswordforget = $stringRow['st_yourpasswordforget'];
      $st_subjectforget = $stringRow['st_subjectforget'];

		$username = $_GET["username"];

		$query="SELECT * FROM users WHERE user_email='".$_GET["username"]."'";
		$result = $conn->query($query);

  		if ($result->num_rows > 0) {
    
    	while($row = $result->fetch_assoc()) {

        try {

$email_user = $email_address;
$email_pass = $email_password;
$host = $smtp_host;
$port = $smtp_port;
$encrypt = $smtp_encrypt;
$the_subject = $st_subjectforget;
$address_to = $email_user;
$from_name = $email_name;
$phpmailer = new PHPMailer();

$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 

$phpmailer->SMTPSecure = $encrypt;
$phpmailer->Host = $host;
$phpmailer->Port = $port;
$phpmailer->IsSMTP();
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h3 style='color:#333333;'>".$st_hellonewaccount."</h3>"; 
$phpmailer->Body .= "<p style='color:#333333;'><b>".$st_yourpasswordforget." </b>".$row["user_password"]."</p>";
$phpmailer->Body .="<h3 style='color:#333333;'>".$site_name."</h3>";
$phpmailer->IsHTML(true);
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Send();

  //echo "Message Sent OK\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
    	}
		}
		else {
    	echo "No registred";
		}

$conn->close();


}

?>
