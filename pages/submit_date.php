<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];
$center_type = $_POST['center_type'];
$gross_capex = str_replace(array(',',' '), '', $_POST["gross_capex"]);
$landlord_capex_contribution = str_replace(array(',',' '), '', $_POST["landlord_capex_contribution"]);

$submit_date = date('Y/m/d H:i:s',strtotime($_POST['submit_date']));


$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}


	$stmt = $mysqli->prepare("update center set center_type = ?, gross_capex = ?, landlord_capex_contribution = ? , submit_date = ? where id = ?");


	$stmt->bind_param("sssss", $center_type, $gross_capex, $landlord_capex_contribution,$submit_date, $centerid);
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
