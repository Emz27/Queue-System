<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];

$ws_num = $_POST['ws_num'];
$usable_area = $_POST["usable_area"];
$lead_broker = $_POST['lead_broker'];

$execute_date = date('Y/m/d H:i:s',strtotime($_POST['execute_date']));




$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





	$stmt = $mysqli->prepare("update center set ws_num = ?,usable_area = ?,lead_broker = ?, execute_date = ? where id = ?");


	$stmt->bind_param("sssss", $ws_num, $usable_area, $lead_broker,$execute_date, $centerid);
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
