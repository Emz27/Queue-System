<?php
	include "../../config.php";
	/*$query=mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,t.*
    FROM user t,
    (SELECT @rownum := 0) r");*/

		session_start();


		$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,center.id as center_id, center.name as center_description,
			center.open_date as open_date, center.cancel_date as cancel_date, center.commence_date as commence_date, center.execute_date as execute_date,
			center.approve_date as approve_date, center.submit_date as submit_date, center.sign_date as sign_date, center.entry_date as entry_date,
			user.id as user_id, concat(user.firstname,' ',user.lastname) as user_name, concat(center.street_address,',',city.description,',',region.description) as location
			from center inner join user on center.project_owner = user.id inner join city on city.id = center.city inner join region on city.region = region.id,
			(SELECT @rownum := 0) r ");

		if(isset($_GET['dashboard'])){
			$query= mysqli_query($link,"SELECT @rownum := @rownum + 1 AS urutan,center.id as center_id, center.name as center_description,
				center.open_date as open_date, center.cancel_date as cancel_date, center.commence_date as commence_date, center.execute_date as execute_date,
				center.approve_date as approve_date, center.submit_date as submit_date, center.sign_date as sign_date, center.entry_date as entry_date,
				user.id as user_id, concat(user.firstname,' ',user.lastname) as user_name, concat(center.street_address,',',city.description,',',region.description) as location
				from center inner join user on center.project_owner = user.id inner join city on city.id = center.city inner join region on city.region = region.id,
				(SELECT @rownum := 0) r where project_owner = ".$_SESSION['id']);
		}




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
		$data[$i]['description'] = '<a class="center">'.$row[$i]['center_description'].'</a>';
		$data[$i]['location'] = $row[$i]['location'];
		$data[$i]['project_owner'] = $row[$i]['user_name'];
		$data[$i]['center_id']=$row[$i]['center_id'];
		$data[$i]['status']="";

		if(strtotime($row[$i]['cancel_date'])>=1){
			$data[$i]['status'] = "<span class='label label-danger'>Cancelled</span>";
		}
		else if(strtotime($row[$i]['open_date'])>=1){
			$data[$i]['status'] = "<span class='label label-success'>Opened</span>";
		}
		else if(strtotime($row[$i]['commence_date'])>=1){
			$data[$i]['status'] = "<span class='label label-warning'>Construction</span>";
		}
		else if(strtotime($row[$i]['execute_date'])>=1){
			$data[$i]['status'] = "<span class='label label-primary'>Lease Executed</span>";
		}
		else if(strtotime($row[$i]['approve_date'])>=1){
			$data[$i]['status'] = "<span class='label label-primary'>IC Approved</span>";
		}
		else if(strtotime($row[$i]['submit_date'])>=1){
			$data[$i]['status'] = "<span class='label label-primary'>IC Submitted</span>";
		}
		else if(strtotime($row[$i]['sign_date'])>=1){
			$data[$i]['status'] = "<span class='label label-primary'>Intent Signed</span>";
		}
		else if(strtotime($row[$i]['entry_date'])>=1){
			$data[$i]['status'] = "<span class='label label-primary'>new entry</span>";
		}
		else{
			$data[$i]['status'] = "<span class='label label-danger'>error</span>";
		}

		$i++;
	}

	mysqli_close($link);
	$datax = array('data' => $data);
	echo json_encode($datax);
?>
