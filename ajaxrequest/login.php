<?php
	include "../serverDetails.php";

	$mysqli = new mysqli($host, $uRoot,"pamoda@12345",$database);



	if (mysqli_connect_errno()) {
		echo "Connection Timeout! : ".mysqli_connect_errno()."hello";
	}



	$username = isset($_POST['inputUsername']) ? $_POST['inputUsername'] : "";
	$password = isset($_POST["inputPassword"]) ? $_POST['inputPassword'] : "";



	$stmt = $mysqli->prepare("SELECT id,password from user where username = ? and status = 'enabled'");

	$stmt->bind_param("s", $username);

	$stmt->execute();

	$stmt->bind_result($colId,$colPassword);


	if($stmt->fetch()){

		if(password_verify($password,$colPassword)){

			echo $colId;

		}
		else echo "failed";

	}
	else echo "failed";


	$stmt->close();
	$mysqli->close();

?>
