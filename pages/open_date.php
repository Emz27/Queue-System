<?php
session_start();

include "../serverDetails.php";



$centerid = $_SESSION['center_id'];
$rate = str_replace(array(',',' '), '', $_POST["rate"]);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$comment = $_POST['comment'];

$ws_size = $_POST['ws_size'];
$ws_id = $_POST['ws_id'];
$ws_occupied = $_POST['ws_status'];

$open_date = date('Y/m/d H:i:s',strtotime($_POST['open_date']));

$items = array();

$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

if($mysqli->connect_error){

	die('Connect Error: ' . $mysqli->connect_error);

}
	//echo $ws_size[0] . " ".sizeof($ws_size);


	//$mysqli->query("delete from workstation where center=".$centerid);

	for( $i=0 ; $i <  sizeof($ws_size) ; $i++ ){
			// echo "</br>ws_id: ".$ws_id[$i];
			// echo "</br>ws_occupied: ".$ws_occupied[$i];



			$isOccupied = ($ws_occupied[$i] != "Occupied")?"0":"1";


			$result1 = $mysqli->query("select from workstation where id =".$ws_id[$i]);

			if(!$result1->num_rows){
				$stmt = $mysqli->prepare("insert into workstation (center,square_meter,isOccupied) values(?,?,?)");
				$stmt->bind_param("sss", $centerid, $ws_size[$i] ,$isOccupied);
				$stmt->execute();
				array_push($items,$mysqli->insert_id);

			}
			else{
				$stmt = $mysqli->prepare("update workstation set center =?, square_meter=?, isOccupied =?");
				$stmt->bind_param("sss", $centerid, $ws_size[$i], $isOccupied);
				$stmt->execute();
				array_push($items,$mysqli->insert_id);
			}
	}


	$result1 = $mysqli->query("select * from workstation where center = ".$centerid);

	echo $mysqli->error;

	while($row = $result1->fetch_assoc()){
		if(!in_array($row["id"],$items,false)){
			$mysqli->query("delete from workstation where id = ".$row['id']);
		}
	}

	$stmt = $mysqli->prepare("update center set  latitude = ?, longitude = ?, comment = ?, rate = ?, open_date = ?  where id = ?");


	$stmt->bind_param("ssssss", $latitude, $longitude, $comment , $rate , $open_date, $centerid);
	$stmt->execute();

	if($stmt->error){
		$result['error']= $stmt->error;
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}


$stmt->close();
$mysqli->close();
echo json_encode($result);

?>
