<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];

$cancel_reason = (isset($_POST['cancel_reason']))?$_POST['cancel_reason']:"";
$cancel_date = (isset($_POST['cancel_date']))?$_POST['cancel_date']:"";






$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}


	$stmt = $mysqli->prepare("select cancel_date from center where id = ?");

	$stmt->bind_param("s",$centerid);

	$stmt->execute();

	$stmt->bind_result($date);

	$stmt->fetch();
	$stmt->close();



	$cancel_date = ($cancel_date != "")?date('Y/m/d H:i:s',strtotime($cancel_date)):"0000-00-00 00:00:00";

	$stmt = $mysqli->prepare("update center set cancel_reason = ?, cancel_date = ? where id = ?");


	$stmt->bind_param("sss", $cancel_reason, $cancel_date, $centerid);
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
