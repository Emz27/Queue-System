<?php



	$conn = new mysqli("localhost","root","","prs");
	
	if (mysqli_connect_errno()) {
		echo "Connection Timeout!";
	}
	
	
	
	$firstname = isset($_POST["inputFirstname"]) ? $_POST["inputFirstname"] : "";
	$lastname = isset($_POST["inputLastname"]) ? $_POST["inputLastname"] : "";
	$birth_date = isset($_POST["inputBirthdate"]) ? date("Y-m-d", strtotime($_POST["inputBirthdate"])) : "" ;
	$gender = isset($_POST["inputGender"]) ? $_POST["inputGender"] : "" ;
	$cellphone_number = isset($_POST["inputCellphone"]) ? $_POST["inputCellphone"] : "";
	$telephone_number = isset($_POST["inputTelephone"]) ? $_POST["inputTelephone"] : "";
	$email = isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : "";
	$username = isset($_POST["inputUsername"]) ? $_POST["inputUsername"] : "";
	$password = isset($_POST["inputPassword"]) ? password_hash($_POST["inputPassword"], PASSWORD_DEFAULT) : "";
	$user_type = 1;
	$town = 1;
	

	$conn->autocommit(FALSE);
	
	$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, birth_date, gender, cellphone_number, telephone_number, email, username ,password,  user_type ,town)
								values( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? ,?)");
	$stmt->bind_param("sssssssssii", $firstname, $lastname, $birth_date, $gender, $cellphone_number, $telephone_number, $email, $username, $password, $user_type ,$town);
	
	$stmt->execute();
	
	$id = $stmt->insert_id;
	
	$stmt =  $conn->prepare("INSERT INTO client(id) values(?)");
	
	$stmt-> bind_param("i", $id);
	
	$stmt->execute();
	
	
	
	

	if( $conn->commit() ){

		echo "success";

	}
	else{
		echo "failed";
	}
	
	
	$stmt->close();
	$conn->close();
	
?>