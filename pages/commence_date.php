<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];

//$opening_date = date('Y/m/d H:i:s',strtotime($_POST['opening_date']));

$target_date = date('Y/m/d H:i:s',strtotime($_POST['target_date']));

$commence_date = date('Y/m/d H:i:s',strtotime($_POST['commence_date']));


$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





	$stmt = $mysqli->prepare("update center set commence_date = ?, target_date = ?  where id = ?");


	$stmt->bind_param("sss", $commence_date, $target_date, $centerid);
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
