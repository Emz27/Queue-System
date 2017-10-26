<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from cancel_reason where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];

		$array['description']= $data['description'];



	}
	echo json_encode($array);

?>
