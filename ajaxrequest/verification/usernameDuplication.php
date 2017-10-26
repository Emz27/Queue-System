<?php

	include "../../serverDetails.php";

	$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}




	$stmt = $mysqli->prepare("SELECT * FROM user where username = ? and id != ?");

	$stmt->bind_param("ss", $_POST['username'], $_POST['id']);

	$stmt->execute();

	$stmt->store_result();

	if( $stmt->num_rows > 0){

		echo "false";

	}
	else echo "true";

	$stmt->close();
	$mysqli->close();

?>
