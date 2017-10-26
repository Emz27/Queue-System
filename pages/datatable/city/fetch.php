<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from city where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];

		$array['description']= $data['description'];
		$array['region']= $data['region'];



	}
	echo json_encode($array);

?>
