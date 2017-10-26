<?php
session_start();

include "../serverDetails.php";



$centerid = $_POST['centerid'];
$growth_type = $_POST['growth_type'];
$agreement_type = $_POST['agreement_type'];
$commercial_term = $_POST['commercial_term'];
$rentable_area = str_replace(array(',',' '), '', $_POST["rentable_area"]);
$local_corporate_guarantee = str_replace(array(',',' '), '', $_POST["local_corporate_guarantee"]);
$corporate_plc_guarantee = str_replace(array(',',' '), '', $_POST["corporate_plc_guarantee"]);
$bank_guarantee = str_replace(array(',',' '), '', $_POST["bank_guarantee"]);
$cash_security_deposit = str_replace(array(',',' '), '', $_POST["cash_security_deposit"]);

$sign_date = date('Y/m/d H:i:s',strtotime($_POST['sign_date']));

$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}







	$stmt = $mysqli->prepare("update center set growth_type = ?, agreement_type = ?, commercial_term = ? , rentable_area = ?,
	 		local_corporate_guarantee = ?,corporate_plc_guarantee = ?, bank_guarantee = ?, cash_security_deposit = ?, sign_date = ? where id = ?");


	$stmt->bind_param("ssssssssss", $growth_type, $agreement_type, $commercial_term, $rentable_area, $local_corporate_guarantee, $corporate_plc_guarantee,
					$bank_guarantee, $cash_security_deposit, $sign_date, $centerid);
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
