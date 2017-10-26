<?php
include "../../../serverDetails.php";

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birth_date = date("Y-m-d", strtotime($_POST['birth_date']));;
$gender = $_POST['gender'];
$city = $_POST['city'];
$street_address= $_POST['street_address'];
$cellphone_number = $_POST['cellphone_number'];
$telephone_number = $_POST['telephone_number'];
$email = $_POST['email'];
$username = $_POST["username"];
$user_type = $_POST["user_type"];
$employee_id = $_POST["employee_id"];
$status = $_POST['status'];


$registration_date = date('Y/m/d H:i:s');


$crud=$_POST['crud'];


$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}





if($crud=='N'){

	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);


	$stmt = $mysqli->prepare("insert into user(employee_id, firstname, lastname, birth_date, gender, city, street_address, cellphone_number, telephone_number, email, username,password, user_type,registration_date)
		VALUES( ? , ? ,?, ?, ?, ?, ?,?, ?, ?, ?, ? ,?,?)");

	$stmt->bind_param("ssssssssssssss",$employee_id, $firstname, $lastname, $birth_date, $gender, $city, $street_address, $cellphone_number, $telephone_number, $email, $username,$password, $user_type,$registration_date);

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

	$stmt = $mysqli->prepare("update user set firstname= ?, lastname = ?, birth_date = ?, gender = ?, city = ?,street_address = ?, cellphone_number = ?, telephone_number = ?,
			email = ?, username = ?, user_type = ? ,status = ? where id = ?");


	$stmt->bind_param("ssssssssssssi",$firstname, $lastname, $birth_date, $gender, $city, $street_address, $cellphone_number, $telephone_number, $email, $username, $user_type,$status, $id);


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
