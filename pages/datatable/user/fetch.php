<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from user where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];
		$array['employee_id'] = $data['employee_id'];
		$array['firstname']= $data['firstname'];
		$array['lastname']= $data['lastname'];
		$array['birth_date']= $data['birth_date'];
		$array['gender']= $data['gender'];
		$array['street_address'] = $data['street_address'];
		$array['city']= $data['city'];
		$array['cellphone_number']= $data['cellphone_number'];
		$array['telephone_number']= $data['telephone_number'];
		$array['email']= $data['email'];
		$array['username']= $data['username'];
		$array['user_type']= $data['user_type'];
		$array['status'] = $data['status'];


	}
	echo json_encode($array);

?>
