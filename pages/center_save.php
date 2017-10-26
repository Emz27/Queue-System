<?php
session_start();

include "../serverDetails.php";



$description = $_POST['description'];

$street_address = $_POST['street_address'];

$city = $_POST['city'];

$search_inquiry_date = date('Y/m/d H:i:s',strtotime($_POST['search_inquiry_date']));

$entry_date = date('Y/m/d H:i:s');

$project_owner = $_SESSION['id'];



$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}

	$stmt = $mysqli->prepare("insert into center ( name, project_owner, city,street_address, search_inquiry_date, entry_date)
		VALUES( ?, ? , ? ,?, ? , ?)");


	$stmt->bind_param("ssssss", $description, $project_owner, $city,$street_address, $search_inquiry_date, $entry_date);

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
