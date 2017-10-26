<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from town where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];

		$array['description']= $data['description'];
		$array['city']= $data['city'];



	}
	echo json_encode($array);

?>
