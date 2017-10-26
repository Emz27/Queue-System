<?php
	include "../../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/



		$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,u.id,u.employee_id,concat(u.street_address,',',c.description,',',+r.description) as address , type.description as user_type, firstname,lastname,gender,birth_date,email,username,cellphone_number,telephone_number
    FROM user AS u inner join city as c on u.city = c.id inner join region as r on c.region = r.id inner join user_type as type on u.user_type = type.id  ,
    (SELECT @rownum := 0) r");


	echo mysqli_error($link);

	$data = array();
	while($r = mysqli_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	foreach ($data as $key) {
			// add new button
		$data[$i]['button'] = '<div class="btn-group"><button type="submit" id="'.$data[$i]['id'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button></div>';
		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
