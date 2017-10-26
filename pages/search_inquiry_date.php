<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];
$name = $_POST['name'];
$street_address = $_POST['street_address'];
$city = $_POST['city'];

$search_inquiry_date = date('Y/m/d H:i:s',strtotime($_POST['search_inquiry_date']));

$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}


	$stmt = $mysqli->prepare("update center set name= ?, street_address = ?, city = ?, search_inquiry_date = ? where id = ?");


	$stmt->bind_param("sssss", $name, $street_address, $city, $search_inquiry_date, $centerid);
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
