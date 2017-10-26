<?php
	include "../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/



		$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,user.id as id,concat(user.firstname,' ',user.lastname) as name, user_type.description as position,
			concat(user.street_address,',',city.description) as location from user
			inner join user_type on user_type.id = user.user_type
			inner join city on city.id = user.city ,
    (SELECT @rownum := 0) r where user.status = 'enabled'");


	echo mysqli_error($link);

	$data = array();
	$row = array();
	while($r = mysqli_fetch_assoc($query)) {
		$row[] = $r;
	}
	$i=0;
	foreach ($row as $key) {
			// add new button

		$data[$i]['urutan'] = $row[$i]['urutan'];
		$data[$i]['name'] = $row[$i]['name'];
		$data[$i]['position'] = $row[$i]['position'];
		$data[$i]['location'] = $row[$i]['location'];

		//href=main.php?member='.$row[$i]['id'].'
		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
