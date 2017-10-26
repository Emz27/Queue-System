
<?php

	session_start();


	include "serverDetails.php";

	if(isset($_POST['userId'])){

		$id  = $_POST['userId'];

		echo $id;

		$mysqli = new mysqli($host,$uRoot,$pRoot,$database);




		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		if ($stmt = $mysqli->prepare("SELECT user.firstname,user.lastname,user_type.num,user_type.description from user inner join user_type on user.user_type = user_type.id where user.id = ?")){



			$stmt->bind_param("i",$id);

			$stmt->execute();

			$stmt->bind_result($firstname, $lastname, $user_type_num ,$user_type_description);

			$stmt->fetch();

			$_SESSION['id'] = $id;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['user_type'] = $user_type_num;
			$_SESSION['user_type_description'] = $user_type_description;
			$_SESSION['center_id'] = "";
			/*
			if($user_type_num == "1"){
				header('Location: admin/main.php');
			}
			else if($user_type_num == "2"){
				header('Location: manager/main.php');
			}
			else if($user_type_num == "3"){
				header('Location : branch_manager/main.php');
			}
			else if($user_type_num == "4"){
				header('Location: project_owner/main.php');

			}
			else echo "error!";
			*/
			$stmt->close();

			header('Location: ../index.php');
		}
		else printf("Errormessage: %s\n", $mysqli->error);
		$mysqli->close();

	}

?>
