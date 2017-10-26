<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];

$opening_date = date('Y/m/d H:i:s',strtotime($_POST['opening_date']));


$approve_date = date('Y/m/d H:i:s',strtotime($_POST['approve_date']));

$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





	$stmt = $mysqli->prepare("update center set opening_date = ?, approve_date = ? where id = ?");


	$stmt->bind_param("sss", $opening_date, $approve_date, $centerid);
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
