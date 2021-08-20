<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET["username"]) && isset($_GET["password"]) ){
	if( !empty($_GET["username"])  && !empty($_GET["password"])  ){

		include 'data_config.php';

		$username=$_GET["username"];
		$password=$_GET["password"];

		$query="SELECT * FROM users
				WHERE user_status = '1' AND user_email='".$_GET["username"]."' AND user_password='".$_GET["password"]."'  ";
		$result = $conn->query($query);

    $outp = "";
		if( $rs=$result->fetch_array()) {
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"user_id":"'  . $rs["user_id"] . '",';
			$outp .= '"user_email":"'   . $rs["user_email"]        . '",';
			$outp .= '"user_password":"'. $rs["user_password"]     . '"}';
		}
		$outp ='{"records":'.$outp.'}';
		$conn->close();

		echo($outp);
	}
}
?>
