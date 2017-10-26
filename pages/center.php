

<?php
	include "../serverDetails.php";
	session_start();

	setlocale(LC_MONETARY,"en_US");

	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

	echo $mysqli->connect_error;

	$stmt = $mysqli->prepare("select * from center where id = ?");
	// if(isset($_GET['center'])){
	// 	echo "center exist!";
	// }else echo "center does not exist!";


	$stmt->bind_param("s",$_GET['center']);

	$stmt->execute();


	$stmt->bind_result($id, $name, $project_owner, $city, $status, $search_inquiry_date,
	 			$entry_date, $growth_type, $agreement_type, $commercial_term, $rentable_area,
				$local_corporate_guarantee, $corporate_plc_guarantee, $bank_guarantee, $cash_security_deposit,
				$sign_date, $center_type, $gross_capex, $landlord_capex_contribution, $net_corporate_capex,
				$submit_date, $opening_date, $approve_date, $ws_num, $usable_area, $lead_broker, $execute_date,
				$center_num, $commence_date,$target_date, $street_address, $latitude, $longitude, $comment,$rate, $open_date,
				$cancel_reason, $cancel_date
			);



	$stmt->fetch();

	$stmt->close();



	$result_query = $mysqli->query("SELECT CONCAT(center.street_address ,',' ,city.description,',',region.description) as location from center
		 	inner join city on center.city = city.id inner join region on city.region = region.id where center.id=".$_GET['center']);

	//echo $mysqli->error;
	$row = $result_query->fetch_assoc();


	$location = $row['location'];




	$result_query = $mysqli->query("SELECT concat(user.firstname ,' ' ,user.lastname )as project_owner_name from user
			where user.id = ".$project_owner);
	$row = $result_query->fetch_assoc();
	$project_owner_name = $row['project_owner_name'];

	$result_query = $mysqli->query("SELECT description from growth_type where id =".$growth_type );
	$row = $result_query->fetch_assoc();
	$growth_type = $row['description'];

	$result_query = $mysqli->query("SELECT description from agreement_type where id =".$agreement_type );
	$row = $result_query->fetch_assoc();
	$agreement_type = $row['description'];

	$result_query = $mysqli->query("SELECT description from commercial_term where id =".$commercial_term );
	$row = $result_query->fetch_assoc();
	$commercial_term = $row['description'];

	$result_query = $mysqli->query("SELECT description from center_type where id =".$center_type );
	$row = $result_query->fetch_assoc();
	$center_type = $row['description'];

	$result_query = $mysqli->query("SELECT description from cancel_reason where id =".$cancel_reason );
	$row = $result_query->fetch_assoc();
	$cancel_reason = $row['description'];

	$mysqli->close();

	function getStatus(){

		if(strtotime($GLOBALS['cancel_date'])>=1){
			return "cancelled";
		}
		else if(strtotime($GLOBALS['open_date'])>=1){
			return "opened";
		}
		else if(strtotime($GLOBALS['commence_date'])>=1){
			return "construction";
		}
		else if(strtotime($GLOBALS['execute_date'])>=1){
			return "lease executed";
		}
		else if(strtotime($GLOBALS['approve_date'])>=1){
			return "IC approved";
		}
		else if(strtotime($GLOBALS['submit_date'])>=1){
			return "IC submitted";
		}
		else if(strtotime($GLOBALS['sign_date'])>=1){
			return "intent signed";
		}
		else if(strtotime($GLOBALS['entry_date'])>=1){
			return "new entry";
		}
		else{
			return "error";
		}
	}

	function getProgress(){


		if(strtotime($GLOBALS['cancel_date'])>=1){
			return "0";
		}
		else if(strtotime($GLOBALS['open_date'])>=1){
			return "100";
		}
		else if(strtotime($GLOBALS['commence_date'])>=1){
			return "80";
		}
		else if(strtotime($GLOBALS['execute_date'])>=1){
			return "50";
		}
		else if(strtotime($GLOBALS['approve_date'])>=1){
			return "35";
		}
		else if(strtotime($GLOBALS['submit_date'])>=1){
			return "25";
		}
		else if(strtotime($GLOBALS['sign_date'])>=1){
			return "15";
		}
		else if(strtotime($GLOBALS['entry_date'])>=1){
			return "5";
		}
		else{
			return "error";
		}
	}

	function accordionColor($last, $current){

		$GLOBALS['toggle_collapse'] = "";
		$GLOBALS['box_color'] = "";
		$GLOBALS['toggle_tooltip'] = "";

		//data-toggle="tooltip" title="Hooray!"
		if(strtotime($GLOBALS['cancel_date'])>=1 ){
			$GLOBALS['toggle_collapse'] = "";
			$GLOBALS['box_color'] = "class='panel box box-danger'";
			$GLOBALS['toggle_tooltip'] = "data-toggle='tooltip' data-placement='right' title='Form Restricted: Project has been cancelled'";
			$GLOBALS['logo'] = "<i class='fa fa-lock'></i>";
		}
		else if( strtotime($last)>=1 && strtotime($current) < 1  ){
			$GLOBALS['toggle_collapse'] = " data-toggle='collapse'   ";
			$GLOBALS['box_color'] = "class='panel box box-warning'";
			$GLOBALS['toggle_tooltip'] = "data-toggle='tooltip' data-placement='right' title='Fill up the Form'";
			$GLOBALS['logo'] = "<i class='fa fa-chevron-right'></i><i class='fa fa-chevron-right'></i><i class='fa fa-chevron-right'></i><i class='fa fa-chevron-right'></i>";
		}
		else if(strtotime($last)>=1 && strtotime($current)>=1){
			$GLOBALS['toggle_collapse'] = "data-toggle='collapse'";
			$GLOBALS['box_color'] = "class='panel box box-success'";
			$GLOBALS['toggle_tooltip'] = "data-toggle='tooltip' data-placement='right' title='Edit the Form'";
			$GLOBALS['logo'] = "<i class='fa fa-check'></i>";
		}

		else{
			$GLOBALS['toggle_collapse'] = "";
			$GLOBALS['box_color'] = "class='panel box box-danger'";
			$GLOBALS['toggle_tooltip'] = "data-toggle='tooltip' data-placement='right' title='Form Restricted: please fill up prerequisite forms'";
			$GLOBALS['logo'] = "<i class='fa fa-lock'></i>";
		}



	}



?>
<!--<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD_pyjvO_Hv0XPZNmVksKNK2N7tZLvLLRE&callback=myMap'> </script>-->

		<section class="content-header">
		      <h1>
		        Center
		      </h1>
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		        <li><a href="#">Examples</a></li>
		        <li class="active">Center</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">

		      <div class="row">
		        <div class="col-md-3">

		          <!-- Profile Image -->
		          <div class="box box-primary">
		            <div class="box-body box-profile">

		              <h3 class="profile-username text-center"><i class="fa fa-building"></i>  Center</h3>


		              <ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Center Id</b> <a class="pull-right"><?php echo ($id)?$id:"N/A";?></a>
		                </li>
										<li class="list-group-item">
		                  <b>Center Name</b> <a class="pull-right"><?php echo ($name)?$name:"N/A";?></a>
		                </li>
		                <li class="list-group-item">
		                  <b>Status</b> <a class="pull-right"><span class="label label-success"><?php echo getStatus(); ?></span></a>
		                </li>
		                <li class="list-group-item">
		                  <b>Progress</b><br/><br/> <div class="progress progress-striped active">

                <div class="progress-bar progress-bar-green " role="progressbar" <?php echo "aria-valuenow= '".getProgress()."' style='width: ".getProgress()."%'"; ?> aria-valuemin="0" aria-valuemax="100" >
                  <span class="sr-only"></span>
                </div>
              </div>
		                </li>
		              </ul>

		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->

		          <!-- About Me Box -->
		          <div class="box box-primary">
		            <div class="box-header with-border">
		              <h3 class="box-title">Basic Info</h3>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              <hr>

		              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

		              <p class="text-muted"><?php echo ($location)?$location:"N/A";?></p>

		              <hr>

		              <strong><i class="fa fa-user margin-r-5"></i> Project Owner</strong>

		              <p>
		                <a><?php echo ($project_owner_name)?$project_owner_name:"N/A";?></a>
		              </p>

		              <hr>
									<?php
											if($_SESSION['user_type_description'] != "Project Owner" && strtotime($cancel_date) >=1){
									 ?>
									<button <?php echo "center='".$id."'" ?> id="center_delete" class="btn btn-primary">Delete Center</button>

									<?php
										}
									?>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        <!-- /.col -->
		        <div class="col-md-9">
		          <div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#activity" data-toggle="tab">Info</a></li>
		              <!-- <li ><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
									<li ><a id="update_status" href="#settings"
									<?php

										if($_SESSION['user_type'] == "4" || $_SESSION['user_type_description'] == "Project Owner"){

											if($_SESSION['id'] != $project_owner){
												echo "data-toggle='tooltip' title = 'Tab Restricted: You are not the Project Owner of this Center'";
											}
											else echo "data-toggle='tab'";

										}
										else echo "data-toggle='tab'";
									?>
									>Update Status</a></li>


		            </ul>
		            <div class="tab-content">
		              <div class="active tab-pane" id="activity">
		                <!-- Post -->
											<ul class="list-group list-group-unbordered">
												<li class="list-group-item">
				                  <b>Search Inquiry Date</b> <span class="pull-right"><?php echo (strtotime($search_inquiry_date)>=1)?date("F j, Y",strtotime($search_inquiry_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Letter of Intent Signed Date</b> <span class="pull-right"><?php echo (strtotime($sign_date)>=1)?date("F j, Y",strtotime($sign_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>IC Submitted Date</b> <span class="pull-right"><?php echo (strtotime($submit_date)>=1)?date("F j, Y",strtotime($submit_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>IC Approved Date</b> <span class="pull-right"><?php echo (strtotime($approve_date)>=1)?date("F j, Y",strtotime($approve_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Lease Executed Date</b> <span class="pull-right"><?php echo (strtotime($execute_date)>=1)?date("F j, Y",strtotime($execute_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Construction Date</b> <span class="pull-right"><?php echo (strtotime($commence_date)>=1)?date("F j, Y",strtotime($commence_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Target Open Date</b> <span class="pull-right"><?php echo (strtotime($target_date)>=1)?date("F j, Y",strtotime($target_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Open Date</b> <span class="pull-right"><?php echo (strtotime($open_date)>=1)?date("F j, Y",strtotime($open_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Growth Type</b> <span class="pull-right"><?php echo ($growth_type)?$growth_type:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Legal - Agreement Type</b> <span class="pull-right"><?php echo ($agreement_type)?$agreement_type:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Financial - Commercial Terms</b> <span class="pull-right"><?php echo ($commercial_term)?$commercial_term:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Gross Rentable Area (m<sup>2</sup>)</b> <span class="pull-right"><?php echo ($rentable_area)?$rentable_area." sqm":"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Local Corporate Guarantee (Pesos)</b> <span class="pull-right"><?php echo ($local_corporate_guarantee)?"P ".money_format("%!n", $local_corporate_guarantee):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Corporate PLC Guarantee (Pesos)</b> <span class="pull-right"><?php echo ($corporate_plc_guarantee)?"P ".money_format("%!n", $corporate_plc_guarantee):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Bank Guarantee (Pesos)</b> <span class="pull-right"><?php echo ($bank_guarantee)?"P ".money_format("%!n", $bank_guarantee):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Cash Security Deposit (Pesos)</b> <span class="pull-right"><?php echo ($cash_security_deposit)?"P ".money_format("%!n", $cash_security_deposit):"N/A";?></span>
				                </li>

				                <li class="list-group-item">
				                  <b>Type of Center</b> <span class="pull-right"><?php echo ($center_type)?$center_type:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Gross Capex (Pesos)</b> <span class="pull-right"><?php echo ($gross_capex)?"P ".money_format("%!n", $gross_capex):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Landlord Capex Contribution (Pesos)</b> <span class="pull-right"><?php echo ($landlord_capex_contribution)?"P ".money_format("%!n", $landlord_capex_contribution):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Net Corporate Capex (Pesos)</b> <span class="pull-right"><?php echo ($gross_capex || $landlord_capex_contribution)?"P ".money_format("%!n", $gross_capex - $landlord_capex_contribution):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Estimated Opening Date</b> <span class="pull-right"><?php echo (strtotime($opening_date)>=1)?date("F j, Y",strtotime($opening_date)):"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Estimated # of Workstation</b> <span class="pull-right"><?php echo ($ws_num)?$ws_num:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Net Internal / Usable Area (m<sup>2</sup>)</b> <span class="pull-right"><?php echo ($usable_area)?$usable_area." sqm":"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Lead Broker</b> <span class="pull-right"><?php echo ($lead_broker)?$lead_broker:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Street Address</b> <span class="pull-right"><?php echo ($street_address)?$street_address:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Latitude</b> <span class="pull-right"><?php echo ($latitude)?$latitude:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Longitude</b> <span class="pull-right"><?php echo ($longitude)?$longitude:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Comments</b> <span class="pull-right"><?php echo ($comment)?$comment:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Reason for Cancellation</b> <span class="pull-right"><?php echo ($cancel_reason && !empty(strtotime($cancel_date)))?$cancel_reason:"N/A";?></span>
				                </li>
												<li class="list-group-item">
				                  <b>Cancel Date</b> <span class="pull-right"><?php echo (strtotime($cancel_date)>=1)?date("F j, Y",strtotime($cancel_date)):"N/A";?></span>
				                </li>


				              </ul>
		                <!-- /.post -->
		              </div>

		              <div class="tab-pane" id="settings">
										<div class="box box-solid">
            <div class="box-header with-border">
              <h1 class="box-title">Fillup accordingly and chronologically</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

								<?php
									accordionColor("2007-11-11", $search_inquiry_date);
								?>

								<div <?php echo $box_color;  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php  echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_search_inquiry_date" class="collapsed" aria-expanded="false">
												<span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> Search Inquiry</span>

                      </a>
                    </h4>
                  </div>
                  <div id="collapse_search_inquiry_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="search_inquiry_form_container">
											<form id="search_inquiry_form" class="form-horizontal">

												<div class="form-group">
													<label class="col-sm-2  control-label">Center Name</label>
													<div class="col-sm-10">
															<input type="text" class="form-control" id="name" placeholder="Center Name" name="name">
														</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2  control-label">Address</label>
													<div class="col-sm-7">


															<input class="form-control" type="text" id ="street_address" name="street_address">


														</div>
														<div class="col-sm-3">

															<select class = "form-control" id="city" name = "city">
																<option value="">Select City</option>

															<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	if($mysqli->connect_error){

																			die("Connect Error: ". $mysqli->connect_error);

																	}

																	$result = $mysqli->query("SELECT city.id as cityid, city.description as citydescription, region.description as regiondescription from city inner join region");


																	while($row = $result->fetch_assoc()){

																		echo "<option value='".$row["cityid"]."'>".$row["citydescription"].", ".$row["regiondescription"]."</option>";

																	}

																	$mysqli->close();
															?>
														</select>

														</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2  control-label">Search Inquiry Date</label>
													<div class="col-sm-10">
															<input type="text" class="form-control" id="search_inquiry_date"  name="search_inquiry_date">
														</div>
												</div>
												<div class="form-group">
			                    <div class="col-sm-offset-2 col-sm-10">
			                      <button type="submit" class="btn btn-danger">Save</button>
			                    </div>
			                  </div>
											</form>
										</div>

                    </div>
                  </div>
                </div>


								<?php
									accordionColor($search_inquiry_date, $sign_date );
								?>
                <div <?php echo $box_color;  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_sign_date" aria-expanded="false" class="collapsed">
                        <span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> Head of Terms/Letter of Intent Signed</span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_sign_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
											<div id="letter_of_intent_signed_form_container">
			                <form id="letter_of_intent_signed_form" class="form-horizontal">
			                  <div class="form-group">
			                    <label for="growth_type" class="col-sm-2 control-label">Growth Type</label>
			                    <div class="col-sm-10">
														<select class="form-control" id="growth_type" name = "growth_type">
															<option value="">Select Growth Type</option>
																<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	$result = $mysqli->query("SELECT * from growth_type");
																	while($row = $result->fetch_assoc()){
																		echo "<option value='".$row['id']."'>".$row["description"]."</option>";
																	}
																 ?>
														</select>
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="agreement_type" class="col-sm-2 control-label">Agreement Type</label>
			                    <div class="col-sm-10">
														<select class="form-control" id="agreement_type" name="agreement_type">
															<option value="">Select Agreement Type</option>
																<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	$result = $mysqli->query("SELECT * from agreement_type");
																	while($row = $result->fetch_assoc()){
																		echo "<option value='".$row['id']."'>".$row["description"]."</option>";
																	}
																 ?>
														</select>
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="commercial_term" class="col-sm-2 control-label">Commercial Terms</label>
			                    <div class="col-sm-10">
														<select class="form-control" id="commercial_term" name="commercial_term">
															<option value="">Select Commercial Term</option>
																<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	$result = $mysqli->query("SELECT * from commercial_term");
																	while($row = $result->fetch_assoc()){
																		echo "<option value='".$row['id']."'>".$row["description"]."</option>";
																	}
																 ?>
														</select>
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="rentable_area" class="col-sm-2 control-label">Gross/Rentable Area (m<sup>2</sup>)</label>
			                    <div class="col-sm-10">
														<input id="rentable_area" name="rentable_area" class="form-control" type="text">
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="local_corporate_guarantee" class="col-sm-2 control-label">Local Corporate Guarantee (Pesos)</label>
			                    <div class="col-sm-10">
														<input id="local_corporate_guarantee" name="local_corporate_guarantee" class="form-control" type="text">
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="corporate_plc_guarantee" class="col-sm-2 control-label">Corporate PLC Guarantee (Pesos)</label>
			                    <div class="col-sm-10">
														<input id="corporate_plc_guarantee" name="corporate_plc_guarantee" class="form-control" type="text">
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="bank_guarantee" class="col-sm-2 control-label">Bank Guarantee (Pesos)</label>
			                    <div class="col-sm-10">
														<input id="bank_guarantee" name="bank_guarantee" class="form-control" type="text">
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="cash_security_deposit" class="col-sm-2 control-label">Cash Security Deposit (Pesos)</label>
			                    <div class="col-sm-10">
														<input id="cash_security_deposit" name="cash_security_deposit" class="form-control" type="text">
			                    </div>
			                  </div>
												<div class="form-group">
			                    <label for="sign_date" class="col-sm-2 control-label">Date Signed</label>
			                    <div class="col-sm-10">
														<input id="sign_date" name="sign_date" class="form-control" type="text">
			                    </div>
			                  </div>


			                  <div class="form-group">
			                    <div class="col-sm-offset-2 col-sm-10">
			                      <button type="submit" class="btn btn-danger">Save</button>
			                    </div>
			                  </div>
			                </form>
										</div>
                    </div>
                  </div>
                </div>

								<?php
									accordionColor($sign_date, $submit_date);
								?>

                <div <?php echo $box_color;  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_submit_date" class="collapsed" aria-expanded="false">
                        <span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> IC Submitted </span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_submit_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="ic_submitted_form_container">
											<form id="ic_submitted_form" class="form-horizontal">
												<div class="form-group">
													<label for="center_type" class="col-sm-2 control-label">Center Type</label>
													<div class="col-sm-10">
														<select class="form-control" id="center_type" name = "center_type">
															<option value="">Select Center Type</option>
																<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	$result = $mysqli->query("SELECT * from center_type");
																	while($row = $result->fetch_assoc()){
																		echo "<option value='".$row['id']."'>".$row["description"]."</option>";
																	}
																 ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="gross_capex" class="col-sm-2 control-label">Gross Capex (Pesos)</label>
													<div class="col-sm-10">
														<input id="gross_capex" name="gross_capex" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="landlord_capex_contribution" class="col-sm-2 control-label">Landlord Capex Contribution (Pesos)</label>
													<div class="col-sm-10">
														<input id="landlord_capex_contribution" name="landlord_capex_contribution" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="submit_date" class="col-sm-2 control-label">Date Submitted</label>
													<div class="col-sm-10">
														<input id="submit_date" name="submit_date" class="form-control" type="text">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger">Save</button>
													</div>
												</div>
											</form>
										</div>

                    </div>
                  </div>
                </div>


								<?php
									accordionColor($submit_date, $approve_date);
								?>

                <div <?php echo $box_color;  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_approve_date" class="collapsed" aria-expanded="false">
                        <span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> IC Approved</span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_approve_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="ic_approved_form_container">
											<form id="ic_approved_form" class="form-horizontal">

												<div class="form-group">
													<label for="opening_date" class="col-sm-2 control-label">Estimated Opening Date</label>
													<div class="col-sm-10">
														<input id="opening_date" name="opening_date" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="approve_date" class="col-sm-2 control-label">Date Approved</label>
													<div class="col-sm-10">
														<input id="approve_date" name="approve_date" class="form-control" type="text">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger">Save</button>
													</div>
												</div>
											</form>
										</div>

                    </div>
                  </div>
                </div>
								<?php
									accordionColor($approve_date, $execute_date);
								?>

								<div <?php echo $box_color  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_execute_date" class="collapsed" aria-expanded="false">
												<span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> Lease Executed</span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_execute_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="lease_executed_form_container">
											<form id="lease_executed_form" class="form-horizontal">

												<div class="form-group">
													<label for="ws_num" class="col-sm-2 control-label">Estimated # of Workstation</label>
													<div class="col-sm-10">
														<input id="ws_num" name="ws_num" class="form-control" type="number">
													</div>
												</div>
												<div class="form-group">
													<label for="usable_area" class="col-sm-2 control-label">Net Internal/Usable Area (m<sup>2</sup>)</label>
													<div class="col-sm-10">
														<input id="usable_area" name="usable_area" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="lead_broker" class="col-sm-2 control-label">Lead Broker</label>
													<div class="col-sm-10">
														<input id="lead_broker" name="lead_broker" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="execute_date" class="col-sm-2 control-label">Date Executed</label>
													<div class="col-sm-10">
														<input id="execute_date" name="execute_date" class="form-control" type="text">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger">Save</button>
													</div>
												</div>
											</form>
										</div>

                    </div>
                  </div>
                </div>

								<?php
									accordionColor($execute_date, $commence_date);
								?>

								<div <?php echo $box_color;  ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a <?php  echo $toggle_collapse;  ?> data-parent="#accordion" href="#collapse_commence_date" class="collapsed" aria-expanded="false">
												<span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> Construction / Fit Out Commenced</span>

                      </a>
                    </h4>
                  </div>
                  <div id="collapse_commence_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="construction_form_container">
											<form id="construction_form" class="form-horizontal">
												<div class="form-group">
													<label for="commence_date" class="col-sm-2 control-label">Date Commenced</label>
													<div class="col-sm-10">
														<input id="commence_date" name="commence_date" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="target_date" class="col-sm-2 control-label">Target Date</label>
													<div class="col-sm-10">
														<input id="target_date" name="target_date" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger"><?php //echo (!empty(strtotime($commence_date)))?"Construction Stopped":"Construction Started";  ?>Save </button>
													</div>
												</div>
											</form>
										</div>

                    </div>
                  </div>
                </div>

								<?php
									accordionColor($commence_date, $open_date);
								?>

								<div <?php echo $box_color; ?> >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a id="collapse_open" <?php echo $toggle_collapse; ?>	data-parent="#accordion" href="#collapse_open_date" class="collapsed" aria-expanded="false">
												<span <?php echo $toggle_tooltip; ?> ><?php echo $GLOBALS['logo']; ?> Open</span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_open_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="open_form_container">

												<div class="form-group">
													<div class="box box-default box-solid collapsed-box">
								            <div class="box-header with-border">
								              <h3 class="box-title">Images</h3>

								              <div class="box-tools pull-right">
								                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								                </button>
								              </div>
								              <!-- /.box-tools -->
								            </div>
								            <!-- /.box-header -->
								            <div class="box-body" style="display: none;">
															<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">


													        <!-- Redirect browsers with JavaScript disabled to the origin page -->
													        <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
													        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->

													        <div class="row fileupload-buttonbar">
																		<div class="form-group">
																			<label for="" class="col-sm-2 control-label">Center Images</label></br>
																			<sub ><span class="form-group">* <b>center</b> image name is intended for center building image. e.g. <b>center.jpg/center.png</b></span></sub>
																		</br>
																		<sub ><span class="form-group">* <b>layout</b> image name is intended for center layout image. e.g. <b>layout.jpg/layout.jpg</b></span></sub>
																			</br></br>
													            <div class="col-lg-12 form-group">
													                <!-- The fileinput-button span is used to style the file input field as button -->
																					<label class="center_id">
																				    <?php echo '<input name="center_id[]" class="form-control hidden" value ="'.$_GET['center'].'">';   ?>
																					</label>
													                <span class="btn btn-success fileinput-button">
													                    <i class="glyphicon glyphicon-plus"></i>
													                    <span>Add files...</span>
													                    <input type="file" name="files[]" accept="image/*" multiple>

													                </span>
													                <button type="submit" class="btn btn-primary start">
													                    <i class="glyphicon glyphicon-upload"></i>
													                    <span>Start upload</span>
													                </button>
													                <button type="reset" class="btn btn-warning cancel">
													                    <i class="glyphicon glyphicon-ban-circle"></i>
													                    <span>Cancel upload</span>
													                </button>
													                <button type="button" class="btn btn-danger delete">
													                    <i class="glyphicon glyphicon-trash"></i>
													                    <span>Delete</span>
													                </button>
													                <input type="checkbox" class="toggle">
													                <!-- The global file processing state -->
													                <span class="fileupload-process"></span>
													            </div>
																		</div>
													            <!-- The global progress state -->
													            <div class="col-lg-5 fileupload-progress fade">
													                <!-- The global progress bar -->
													                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
													                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
													                </div>
													                <!-- The extended global progress state -->
													                <div class="progress-extended">&nbsp;</div>
													            </div>
													        </div>
													        <!-- The table listing the files available for upload/download -->
													        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
													    </form>
															<!-- <sub ><span class="form-group">*click the map surface to get coordinates</span></sub> -->
								            </div>
								            <!-- /.box-body -->
								          </div>
												</div>



												<!-- The blueimp Gallery widget -->

											<form id="open_form" class="form-horizontal">


												<div class="">
													<div class="box box-default box-solid collapsed-box">
								            <div class="box-header with-border">
								              <h3 class="box-title">Workstation</h3>

								              <div class="box-tools pull-right">
								                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
								                </button>
								              </div>
								              <!-- /.box-tools -->
								            </div>
								            <!-- /.box-header -->
								            <div class="box-body" style="display: none;">
															<!-- <div class="form-group"> -->
															<div class="form-group">
																<label for="rate" class="col-sm-2 control-label">Rate (Pesos)/meter<sup>2</sup></label>
																<div class="col-sm-10">
																	<input id="rate" name="rate" class="form-control" type="text">
																</div>
															</div>
																<label  class="col-sm-12 text-center">Workstation</label>
																<label  class="col-sm-2 text-center"></label>
																<label  class="col-sm-8 text-center">Workstation Area</label>
																<button id="addWorkstation" class="btn btn-primary pull-right col-sm-2" type="button"><i class="fa fa-plus"></i> Add WS</button>
																<div class="row"></br></div>
																<div class="row"></br></div>

																<div id = "wsContainer" class = "col-sm-12">
																	<?php

																		$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																		$result = $mysqli->query("SELECT * from workstation where center =".$id);

																		if($result->num_rows < 1 ){
																			// <div class="input-group">
										                  //       <span class="input-group-addon">
										                  //         <input type="checkbox">
										                  //       </span>
										                  //   <input type="text" class="form-control">
										                  // </div>


																			echo '<div class="form-group col-sm-12 ws">
																				<button class="btn btn-primary col-sm-1 removeWorkstation" type="button"><i class="fa fa-remove"></i></button>

																				<div class="col-sm-6">
																						<input name="ws_id[]" class="form-control col-sm-8 hidden ws_id" type="text">
																						<input name="ws_size[]" class="form-control col-sm-6 ws_size" type="text">
																						<input name="ws_status[]" class="form-control col-sm-12 hidden ws_status" type="text" value="Available">
																				</div>
																				<input class="btn btn-info btn-flat id="ws_status" name="test" col-sm-2" type="button" value="Available">
																				<span id="ws_total" class="col-sm-3 ws_total"></span>
																			</div>';

																		}else{
																				while($row = $result->fetch_assoc()){
																					$ws_status = ($row['isOccupied'] == "1")?"Occupied":"Available";
																					echo '<div class="form-group col-sm-12 ws">
																						<button class="btn btn-primary col-sm-1 removeWorkstation" type="button"><i class="fa fa-remove"></i></button>

																						<div class="col-sm-6">
																								<input name="ws_id[]" class="form-control col-sm-8 hidden ws_id" type="text" value="'.$row['id'].'">
																								<input name="ws_size[]" class="form-control col-sm-12 ws_size" type="text" value="'.$row['square_meter'].'">
																								<input name="ws_status[]" class="form-control col-sm-12 hidden ws_status" type="text" value="'.$ws_status.'">
																						</div>
																						<input class="btn btn-info btn-flat col-sm-2" type="button" id="ws_status" name="test" value="'.$ws_status.'">
																						<span id="ws_total" class="col-sm-3 ws_total"></span>
																					</div>';

																				}
																		}
																	 ?>
																</div>
																<div class="col-sm-4">
																	<input class="form-control" id ="wsNum" disabled>
																</div>
																<div class="col-sm-4">
																	<input class="form-control" id ="meterNum" disabled>
																</div>
																<div class="col-sm-4">
																	<input class="form-control" id ="priceTotal" disabled>
																</div>
															<!-- </div> -->
															<!-- <sub ><span class="form-group">*click the map surface to get coordinates</span></sub> -->
								            </div>
								            <!-- /.box-body -->
								          </div>
												</div>

												<div class="box box-default box-solid">
							            <div id="map_collapse" class="box-header with-border">
							              <h3 class="box-title">Map</h3>

							              <div class="box-tools pull-right">
							                <button  type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							                </button>
							              </div>
							              <!-- /.box-tools -->
							            </div>
							            <!-- /.box-header -->
							            <div id="map_container"  class="box-body" style="display: block;">
														<div id="mapDiv" class="form-control col-sm-12" style="height: 500px">


														</div>
														<sub ><span class="form-group">*click the map surface to get coordinates</span></sub>
														<div class="form-group">
															<label for="latitude" class="col-sm-2 control-label">Latitude</label>
															<div class="col-sm-4">
																<input id="latitude" name="latitude" class="form-control" type="text">
															</div>
															<label for="longitude" class="col-sm-2 control-label">Longitude</label>
															<div class="col-sm-4">
																<input id="longitude" name="longitude" class="form-control" type="text">
															</div>
														</div>

							            </div>
							            <!-- /.box-body -->
							          </div>

												<div class="form-group">
													<label for="comment" class="col-sm-2 control-label">Comment</label>
													<div class="col-sm-10">
														<input id="comment" name="comment" class="form-control" type="text">
													</div>
												</div>
												<div class="form-group">
													<label for="open_date" class="col-sm-2 control-label">Date Opened</label>
													<div class="col-sm-10">
														<input id="open_date" name="open_date" class="form-control" type="text">
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger"><?php //echo (!empty(strtotime($open_date)))?"Opening Cancelled":"Opening Started";  ?>Save</button>
													</div>
												</div>

												</div>
											</form>



                    </div>
                  </div>
                </div>

								<div class="panel box box-gray" >
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse_cancel_date" class="collapsed" aria-expanded="false">
												<span data-toggle='tooltip' data-placement='right' title='Fill up the Form' ><i class='fa fa-ban'></i> Cancel</span>

                      </a>
                    </h4>
                  </div>
                  <div id="collapse_cancel_date" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">

											<div id="cancel_form_container">
											<form id="cancel_form" class="form-horizontal">

												<div class="form-group">
													<label for="cancel_reason" class="col-sm-2 control-label">Cancel Reason</label>
													<div class="col-sm-10">

														<select  id="cancel_reason" name = "cancel_reason"  class="form-control" <?php echo (strtotime($GLOBALS['cancel_date'])>=1)?'disabled':'' ?> >
															<option value="">Select Reason</option>
																<?php
																	include "../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	$result = $mysqli->query("SELECT * from cancel_reason");
																	while($row = $result->fetch_assoc()){
																		echo "<option value='".$row['id']."'>".$row["description"]."</option>";
																	}
																 ?>
														</select>

													</div>
												</div>
												<div class="form-group">
													<label for="cancel_date" class="col-sm-2 control-label">Date Cancelled</label>
													<div class="col-sm-10">
														<input id="cancel_date" name="cancel_date" class="form-control" <?php echo (strtotime($GLOBALS['cancel_date'])>=1)?'disabled':'' ?> type="text" >
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-offset-2 col-sm-10">
														<button type="submit" class="btn btn-danger"><?php echo (strtotime($cancel_date)>=1)?"Revert":"Project Cancelled";  ?></button>
													</div>
												</div>
											</form>
										</div>

                    </div>
                  </div>
                </div>




              </div>
            </div>
            <!-- /.box-body -->
          </div>







		              </div>
		              <!-- /.tab-pane -->
		            </div>
		            <!-- /.tab-content -->
		          </div>
		          <!-- /.nav-tabs-custom -->
		        </div>
		        <!-- /.col -->
		      </div>
		      <!-- /.row -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
							<div class="slides"></div>
							<h3 class="title"></h3>
							<a class="prev">‹</a>
							<a class="next">›</a>
							<a class="close">×</a>
							<a class="play-pause"></a>
							<ol class="indicator"></ol>
					</div>
		    </section>
