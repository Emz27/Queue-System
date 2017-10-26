<?php
	include "../../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/



		$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,id,description from cancel_reason,
    (SELECT @rownum := 0) r");


	echo mysqli_error($link);

	$data = array();
	while($r = mysqli_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
			// add new button
		$data[$i]['button'] = '<div class="btn-group"><button type="submit" id="'.$data[$i]['id'].'" class="btn btn-primary cancel_reason_btnedit" ><i class="fa fa-edit"></i></button>
								   <button type="submit" id="'.$data[$i]['id'].'" description="'.$data[$i]['description'].'" class="btn btn-primary cancel_reason_btnhapus" ><i class="fa fa-remove"></i></button></div>';
		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
