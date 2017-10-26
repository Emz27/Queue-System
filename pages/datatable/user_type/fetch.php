<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from user_type where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];
		$array['num'] = $data['num'];
		$array['description']= $data['description'];
		$array['level']= $data['level'];



	}
	echo json_encode($array);

?>
