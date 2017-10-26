<?php
	include "../../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/



		$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,center.id as id,center.description as description,center.street_address + ',' + city.description as location, project_owner.firstname + ' ' + project_owner.lastname as project_owner from center
			inner join project_owner on center.project_owner = project_owner.id
			inner join city on city.id = center.city,
    (SELECT @rownum := 0) r");


	echo mysqli_error($link);

	$data = array();
	while($r = mysqli_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
			// add new button
		$data[$i]['button'] = '<button type="submit" id="'.$data[$i]['id'].'" description="'.$data[$i]['description'].'" class="btn btn-primary center_view" ><i class="fa fa-view"></i></button>';
		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
