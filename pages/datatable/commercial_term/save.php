<?php
include "../../../serverDetails.php";

$id = $_POST['id'];

$description = $_POST['description'];




$crud=$_POST['crud'];


$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





if($crud=='N'){

	$stmt = $mysqli->prepare("insert into commercial_term( description)
		VALUES( ? )");

	$stmt->bind_param("s", $description);

	$stmt->execute();

	if($stmt->error){
		$result['error']= $stmt->error;
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}

}else if($crud == 'E'){


	//mysqli_query($link,"update customer set name='$name',gender='$gender',country='$country',phone='$phone' where id_cust=$id_cust");
	/*mysqli_query($link,'update user set employee_id = '.$employee_id.'firstname = '.$firstname.', lastname = '.$lastname.', birth_date = '.$birth_date.', gender = '.$gender.', town = '.$town.',
		cellphone_number = '.$cellphone_number.', telephone_number = '.$telephone_number.', email = '.$email.', username = '.$username.', user_type = '.$user_type.', branch = '.$branch.' where id = '.$id);*/

	$stmt = $mysqli->prepare("update commercial_term set description = ? where id = ?");


	$stmt->bind_param("ss", $description,  $id);


	$stmt->execute();


	if($stmt->error){
		$result['error']=$stmt->error;
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else{

	$result['error']='Invalid Order';
	$result['result']=0;
}

$stmt->close();
$mysqli->close();
$result['crud']=$crud;
echo json_encode($result);

?>
