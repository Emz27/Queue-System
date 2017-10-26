<?php
	include "../../../config.php";

	$id=$_POST['id'];
	$query=mysqli_query($link,"select * from branch where id=$id");
	$array = array();
	while($data = mysqli_fetch_array($query)){
		$array['id']= $data['id'];
		$array['num'] = $data['num'];
		$array['description']= $data['description'];
		$array['street_address']= $data['street_address'];
		$array['town']= $data['town'];



	}
	echo json_encode($array);

?>
