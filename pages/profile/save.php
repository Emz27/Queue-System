<?php
include "../../../serverDetails.php";

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birth_date = date("Y-m-d", strtotime($_POST['birth_date']));;
$gender = $_POST['gender'];
$town = $_POST['town'];
$cellphone_number = $_POST['cellphone_number'];
$telephone_number = $_POST['telephone_number'];
$email = $_POST['email'];
$username = $_POST["username"];
$user_type = $_POST["user_type"];
$employee_id = $_POST["employee_id"];


$branch = $_POST["branch"];

$registration_date = date('Y/m/d H:i:s');


$crud=$_POST['crud'];


$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





if($crud=='N'){

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);


	$stmt = $mysqli->prepare("insert into user(employee_id, firstname, lastname, birth_date, gender, town, cellphone_number, telephone_number, email, username,password, user_type, branch,registration_date)
		VALUES( ? , ? ,?, ?, ?, ?, ?, ?, ?, ?, ? ,?,?,?)");

	$stmt->bind_param("ssssssssssssss",$employee_id, $firstname, $lastname, $birth_date, $gender, $town, $cellphone_number, $telephone_number, $email, $username,$password, $user_type,$branch,$registration_date);

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

	$stmt = $mysqli->prepare("update user set firstname= ?, lastname = ?, birth_date = ?, gender = ?, town = ?, cellphone_number = ?, telephone_number = ?,
			email = ?, username = ?, user_type = ?, branch =? where id = ?");


	$stmt->bind_param("sssssssssssi",$firstname, $lastname, $birth_date, $gender, $town, $cellphone_number, $telephone_number, $email, $username, $user_type, $id,$branch);


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
