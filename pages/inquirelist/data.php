<?php
	include "../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/

		session_start();
		date_default_timezone_set("Asia/Manila");

			$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,center.id as center_id,center.name as center_name,workstation.id as workstation_id,concat(i.firstname , ' ' , i.lastname) as name, concat(city.description,',',region.description) as location, i.email, i.cellphone_number, i.telephone_number,
					i.message, i.date_time from inquire as i inner join workstation on workstation.id = i.workstation inner join city on city.id = i.city inner join region on city.region = region.id inner join center on center.id = workstation.center,
				(SELECT @rownum := 0) r ");



	echo mysqli_error($link);

	$data = array();
	$row = array();
	while($r = mysqli_fetch_assoc($query)) {
		$row[] = $r;
	}
	$i=0;
	foreach ($row as $key) {
		$ws_num = -1;
		$ws = mysqli_query($link,"SELECT @rownum := @rownum + 1 AS row, id from workstation,
		(SELECT @rownum := 0) r where center =".$row[$i]['center_id']." order by id");

		echo mysqli_error($link);
		while($ws_row = mysqli_fetch_assoc($ws)){

			if($ws_row['id'] == $row[$i]['workstation_id']){
				$ws_num = $ws_row['row'];
				break;
			}
		}

		$data[$i]['urutan'] = $row[$i]['urutan'];
		$data[$i]['center'] = $row[$i]['center_name'];
		$data[$i]['workstation'] = $ws_num;
		$data[$i]['name'] = $row[$i]['name'];
		$data[$i]['location'] = $row[$i]['location'];
		$data[$i]['email'] = $row[$i]['email'];
		$data[$i]['cellphone_number']=$row[$i]['cellphone_number'];
		$data[$i]['telephone_number']=$row[$i]['telephone_number'];
		$data[$i]['message'] = $row[$i]['message'];
		$data[$i]['date_time'] = date("d/m/Y h:i A",strtotime($row[$i]['date_time']));

		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
