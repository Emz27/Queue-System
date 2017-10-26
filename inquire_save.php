<?php
session_start();

include "serverDetails.php";



$workstation = $_POST['workstation'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];

$city = $_POST['city'];
$cellphone_number = $_POST['cellphone_number'];
$telephone_number = $_POST['telephone_number'];
$email = $_POST['email'];
$message = $_POST['message'];


$date_time = date('Y/m/d H:i:s');





$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}

	$stmt = $mysqli->prepare("insert into inquire(workstation, firstname, lastname, company, city, cellphone_number, telephone_number, email, message, date_time)
			values(?,?,?,?,?,?,?,?,?,?)");

	echo $mysqli->error;


	$stmt->bind_param("ssssssssss", $workstation, $firstname, $lastname, $company, $city, $cellphone_number, $telephone_number, $email, $message, $date_time);

	$stmt->execute();

	if($stmt->error){
		$result['error']= $stmt->error;
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}


$stmt->close();
$mysqli->close();
echo json_encode($result);

?>
