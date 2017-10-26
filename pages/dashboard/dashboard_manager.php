<style>




</style>

<?php

session_start();

	include "../../serverDetails.php";

	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

	$color= array("#4169e1","#404040","#ff4444","#000080","#6dc066","#6897bb","#8a2be2","#31698a","#191970","#3399ff",
								"#3b5998","#ffff66","#794044","#ccff00","#999999","#cc0000","#b6fcd5","#c39797","#ff7f50","#8b0000",
								"#0099cc","#a0db8e","#dddddd","#ffdab9","#ff4040","#0e2f44","#00ff7f","#c0d6e4","#daa520","#b4eeb4",
								"#66cccc","#cbbeb5","#afeeee","#808080","#81d8d0","#660066","#008000","#ff00ff","#990000","#f5f5f5",
								"#ffff00","#fff68f","#f08080","#66cdaa","#ffb6c1","#ff6666","#088da5","#800000","#468499","#20b2aa");

	$empty_date = "0000-00-00 00:00:00";
?>

<?php
	$result = $mysqli->query("select * from center");
	//$cancel_date="";
	$open_date=0;
	$commence_date=0;
	$execute_date=0;
	$approve_date=0;
	$submit_date=0;
	$sign_date=0;
	$entry_date=0;

	$empty_date = "0000-00-00 00:00:00";

	while($row = $result->fetch_assoc()){
		if($row['cancel_date']==$empty_date && $row['open_date']!=$empty_date)$open_date ++;
		else if($row['cancel_date']==$empty_date && $row['open_date']==$empty_date && $row['commence_date'] !=$empty_date) $commence_date ++;
		else if($row['cancel_date']==$empty_date && $row['commence_date']==$empty_date && $row['execute_date'] !=$empty_date) $execute_date ++;
		else if($row['cancel_date']==$empty_date && $row['execute_date']==$empty_date && $row['approve_date'] !=$empty_date) $approve_date ++;
		else if($row['cancel_date']==$empty_date && $row['approve_date']==$empty_date && $row['submit_date'] !=$empty_date) $submit_date ++;
		else if($row['cancel_date']==$empty_date && $row['submit_date']==$empty_date && $row['sign_date'] !=$empty_date) $sign_date ++;
		else if($row['cancel_date']==$empty_date && $row['sign_date']==$empty_date && $row['entry_date'] !=$empty_date) $entry_date ++;
	}







 ?>


	<section class="content-header">
      <h1>
		Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
<section class="content">


<div class="row">

		<?php include "opened_centers_line_graph.php"; ?>
</div>
<div class="row">
	 <?php include "opening_centers_line_graph.php"; ?>
</div>
<div class="row">
	<?php include "opened_centers_project_owner.php"; ?>
</div>
<div class="row">

	<?php include "center_inquiry_city.php" ?>

</div>

<!-- row -->
<!-- </div> -->
<!-- <div class="row">
	<?php //include "center_table.php"; ?>
</div> -->

<div class="row">

	<div class="col-md-4">
						<div class="box box-default">
							<div class="box-header with-border">
								<h3 id="city_header" class="box-title">City Pie Chart</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
								</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="row">
									<div class="col-md-12">
										<div class="chart-responsive" id="city_canvas_container">
											<canvas id="city_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>
										</div>
										<!-- ./chart-responsive -->
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<ul class="chart-legend clearfix">
											<table id="city_table" class="col-md-12">
														<!--  CONTENT HERE -->
														<tr ><th class="text-center">City Name</th><th class="text-center"> Center</th></tr>
														<?php
																 $i=0;
																	$total = $mysqli->query("select count(center.id) as count, city.id as city_id, city.description as description from city
																				inner join center on center.city  = city.id group by city.id");
																	while($row = $total->fetch_assoc()){
																		$i++;
																		echo '<tr class="city_click" city="'.$row['city_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i><span> '.$row['description'].'</li></td><td class="text-city">'.$row['count'].'</span></td></tr>';
																	}
														?>
											</table>
										</ul>
									</div>
								</div>
								<!-- /.row -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer no-padding">
								<div>


								</div>
							</div>
							<!-- /.footer -->
						</div>
						<!-- /.box -->
						<!-- /.box -->
				 </div>
	<div class="col-md-4">
	          <div class="box box-default">
	            <div class="box-header with-border">
	              <h3 class="box-title">Status Pie Chart</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <div class="row">
	                <div class="col-md-12">
	                  <div class="chart-responsive">
	                    <canvas id="pieChart" height="89" width="157" style="width: 314px; height: 178px;"></canvas>
	                  </div>
	                  <!-- ./chart-responsive -->
	                </div>
	                <!-- /.col -->

	                <!-- /.col -->
	              </div>
								<div class="row">
									<div class="col-md-12">
	                  <ul class="chart-legend clearfix">
											<table class="col-md-12">
												<tr ><th class="text-center">Milestone</th><th class="text-center"> Center</th></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-red"></i> Project Query</li></td><td class="text-center"><?php echo $entry_date ?></td></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-green"></i> Head of Terms/Letter of Intent Signed</li></td><td class="text-center"><?php echo $sign_date ?></td></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-yellow"></i> IC Submitted</li></td><td class="text-center"><?php echo $submit_date ?></td></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-aqua"></i> IC Approved</li></td><td class="text-center"><?php echo $approve_date ?></td></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-light-blue"></i> Lease Executed</li></td><td class="text-center"><?php echo $execute_date ?></td></tr>
		                    <tr><td><li><i class="fa fa-circle-o text-gray"></i> Construction/Fit Out Commenced</li></td><td class="text-center"><?php echo $commence_date ?></td></tr>
												<tr><td><li><i class="fa fa-circle-o text-light-green"></i> Opened</li></td><td class="text-center"><?php echo $open_date ?></td></tr>
											</table>
	                  </ul>
	                </div>
								</div>
	              <!-- /.row -->
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer no-padding">
	              <div>


								</div>
	            </div>
	            <!-- /.footer -->
	          </div>
	          <!-- /.box -->
	          <!-- /.box -->
	        </div>
					<div class="col-md-4">
										<div class="box box-default">
											<div class="box-header with-border">
												<h3 class="box-title">Center Inquiries Pie Chart</h3>

												<div class="box-tools pull-right">
													<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
													</button>
												</div>
											</div>
											<!-- /.box-header -->
											<div class="box-body">
												<div class="row">
													<div class="col-md-12">
														<div class="chart-responsive">
															<canvas id="center_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>
														</div>
														<!-- ./chart-responsive -->
													</div>
													<!-- /.col -->

													<!-- /.col -->
												</div>
												<div class="row">
													<div class="col-md-12">
														<ul class="chart-legend clearfix">
															<table class="col-md-12">

																<tr ><th class="text-center">Center Name</th><th class="text-center"> Inquiries</th></tr>
																<?php
																		$center = $mysqli->query("select count(*) as count, center.name as name, center.id as id from center inner join workstation on workstation.center = center.id group by center.id order by center.id");
																		$center_count = $center->num_rows;
																		$i=0;
																		while($row = $center->fetch_assoc()){
																			$i++;
																			$total = $mysqli->query("select count(inquire.id) as count, workstation.id as workstation_id from inquire
																						right join workstation on workstation.id  = inquire.workstation right join center on workstation.center = center.id
																						where center.id =".$row['id']."");
																			$total = $total->fetch_assoc();
																			echo '<tr><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i> '.$row['name'].'</li></td><td class="text-center">'.$total['count'].'</td></tr>';
																		}
																?>
															</table>
														</ul>
													</div>
												</div>
												<!-- /.row -->
											</div>
											<!-- /.box-body -->
											<div class="box-footer no-padding">
												<div>


												</div>
											</div>
											<!-- /.footer -->
										</div>
										<!-- /.box -->
										<!-- /.box -->
									</div>





</div>

<div class="row">



</div>

<div class="row">






</div>







</section>

								<script>
								//-------------
							//- PIE CHART -
							//-------------
							// Get context with jQuery - using jQuery's .get() method.


	$(document).ready(function(){


		// $("#city_table").on("click",".city_click",function(){
		// 	$("#city_status_header").val(data.city_name + " > Status Pie Chart");
		// 	$("#city_status_center_header").val("City > Status > Center Pie Chart");
		//
		//
		// 	$("#city_status_canvas_container").html('<canvas id="city_status_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>');
		// 	$("#city_status_center_canvas_container").html('<canvas id="city_status_city_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>');
		//
		// 	$("#city_status_table").html('<canvas id="city_status_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>');
		// 	$("#city_status_center_table").html('<canvas id="city_status_city_pie" height="89" width="157" style="width: 314px; height: 178px;"></canvas>');
		//
		//
		// 	var city=$(this).attr("city");
    //   var value = {
    //     city: city
    //   };
    //   $.ajax(
    //   {
    //     url : "datatable/branch/fetch.php",
    //     type: "POST",
    //     data : value,
    //     success: function(data, textStatus, jqXHR)
    //     {
    //       var data = jQuery.parseJSON(data);
		//
		// 			$("#city_status_header").val(data.city_name + " > Status Pie Chart");
		//
		// 			var pieChartCanvas = $("#center_pie").get(0).getContext("2d");
		// 			var pieChart = new Chart(pieChartCanvas);
		// 			var PieData = [
		// 				<?php
		// 					$result = $mysqli->query("select * from center");
		// 					//$cancel_date="";
		// 					$open_date=0;
		// 					$commence_date=0;
		// 					$execute_date=0;
		// 					$approve_date=0;
		// 					$submit_date=0;
		// 					$sign_date=0;
		// 					$entry_date=0;
		//
		// 					$empty_date = "0000-00-00 00:00:00";
		//
		// 					while($row = $result->fetch_assoc()){
		// 						if($row['cancel_date']==$empty_date && $row['open_date']!=$empty_date)$open_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['open_date']==$empty_date && $row['commence_date'] !=$empty_date) $commence_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['commence_date']==$empty_date && $row['execute_date'] !=$empty_date) $execute_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['execute_date']==$empty_date && $row['approve_date'] !=$empty_date) $approve_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['approve_date']==$empty_date && $row['submit_date'] !=$empty_date) $submit_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['submit_date']==$empty_date && $row['sign_date'] !=$empty_date) $sign_date ++;
		// 						else if($row['cancel_date']==$empty_date && $row['sign_date']==$empty_date && $row['entry_date'] !=$empty_date) $entry_date ++;
		// 					}
		// 				 ?>
		//
		//
		//
		//
		//
		// 				<?php
		//
		// 						$center = $mysqli->query("select count(*) as count, center.name as name, center.id as id from center inner join workstation on workstation.center = center.id group by center.id order by center.id");
		//
		//
		// 						$center_count = $center->num_rows;
		// 						$i=0;
		// 						while($row = $center->fetch_assoc()){
		//
		// 							$total = $mysqli->query("select count(inquire.id) as count, workstation.id as workstation_id from inquire
		// 										right join workstation on workstation.id  = inquire.workstation right join center on workstation.center = center.id
		// 										where center.id =".$row['id']."");
		//
		// 							$total = $total->fetch_assoc();
		// 							$i++;
		// 							echo 	'{
		// 										value: '.$total['count'].' ,
		// 										color: "'.$color[$i].'",
		// 										highlight: "'.$color[$i].'",
		// 										label: "'.$row['name'].'"
		// 									}';
		// 							if($i <= $center_count) echo ",";
		//
		//
		// 						}
		//
		// 				?>
		// 			];
		//
		// 			var pieOptions = {
		// 				//Boolean - Whether we should show a stroke on each segment
		// 				segmentShowStroke: true,
		// 				//String - The colour of each segment stroke
		// 				segmentStrokeColor: "#fff",
		// 				//Number - The width of each segment stroke
		// 				segmentStrokeWidth: 2,
		// 				//Number - The percentage of the chart that we cut out of the middle
		// 				percentageInnerCutout: 50, // This is 0 for Pie charts
		// 				//Number - Amount of animation steps
		// 				animationSteps: 100,
		// 				//String - Animation easing effect
		// 				animationEasing: "easeOutBounce",
		// 				//Boolean - Whether we animate the rotation of the Doughnut
		// 				animateRotate: true,
		// 				//Boolean - Whether we animate scaling the Doughnut from the centre
		// 				animateScale: false,
		// 				//Boolean - whether to make the chart responsive to window resizing
		// 				responsive: true,
		// 				// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		// 				maintainAspectRatio: true,
		// 				//String - A legend template
		// 				legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
		// 			};
		// 			//Create pie or douhnut chart
		// 			// You can switch between pie and douhnut using the method below.
		// 			pieChart.Doughnut(PieData, pieOptions);
		//
		//
		//
		//
		//
		//
		//
    //       $("#modalcust").modal('show');
    //     },
    //     error: function(jqXHR, textStatus, errorThrown)
    //     {
    //       swal("Error!", textStatus, "error");
    //     }
    //   });
		//
		// });









									var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
									var pieChart = new Chart(pieChartCanvas);
									var PieData = [
										{
											value: <?php echo $entry_date ?>,
											color: "#f56954",
											highlight: "#f56954",
											label: "Project Query"
										},
										{
											value: <?php echo $sign_date ?>,
											color: "#00a65a",
											highlight: "#00a65a",
											label: "Head of Terms/Letter of Intent Signed"
										},
										{
											value: <?php echo $submit_date ?>,
											color: "#f39c12",
											highlight: "#f39c12",
											label: "IC Submitted"
										},
										{
											value: <?php echo $approve_date ?>,
											color: "#00c0ef",
											highlight: "#00c0ef",
											label: "IC Approved"
										},
										{
											value: <?php echo $execute_date ?>,
											color: "#3c8dbc",
											highlight: "#3c8dbc",
											label: "Lease Executed"
										},
										{
											value: <?php echo $commence_date ?>,
											color: "#d2d6de",
											highlight: "#d2d6de",
											label: "Construction/Fit Out Commenced"
										}
										,
										{
											value: <?php echo $open_date ?>,
											color: "#98fb98",
											highlight: "#98fb98",
											label: "Opened"
										}

									];

									var pieOptions = {
										//Boolean - Whether we should show a stroke on each segment
										segmentShowStroke: true,
										//String - The colour of each segment stroke
										segmentStrokeColor: "#fff",
										//Number - The width of each segment stroke
										segmentStrokeWidth: 2,
										//Number - The percentage of the chart that we cut out of the middle
										percentageInnerCutout: 0, // This is 0 for Pie charts
										//Number - Amount of animation steps
										animationSteps: 100,
										//String - Animation easing effect
										animationEasing: "easeOutBounce",
										//Boolean - Whether we animate the rotation of the Doughnut
										animateRotate: true,
										//Boolean - Whether we animate scaling the Doughnut from the centre
										animateScale: false,
										//Boolean - whether to make the chart responsive to window resizing
										responsive: true,
										// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
										maintainAspectRatio: true,
										//String - A legend template
										legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
									};
									//Create pie or douhnut chart
									// You can switch between pie and douhnut using the method below.
									pieChart.Doughnut(PieData, pieOptions);




									var pieChartCanvas = $("#center_pie").get(0).getContext("2d");
									var pieChart = new Chart(pieChartCanvas);
									var PieData = [

										<?php

												$center = $mysqli->query("select count(*) as count, center.name as name, center.id as id from center inner join workstation on workstation.center = center.id group by center.id order by center.id");


												$center_count = $center->num_rows;
												$i=0;
												while($row = $center->fetch_assoc()){
													$total = $mysqli->query("select count(inquire.id) as count, workstation.id as workstation_id from inquire
																right join workstation on workstation.id  = inquire.workstation right join center on workstation.center = center.id
																where center.id =".$row['id']."");

													$total = $total->fetch_assoc();
													$i++;
													echo 	'{
																value: '.$total['count'].' ,
																color: "'.$color[$i].'",
																highlight: "'.$color[$i].'",
																label: "'.$row['name'].'"
															}';
													if($i <= $center_count) echo ",";


												}

										?>



									];

									var pieOptions = {
										//Boolean - Whether we should show a stroke on each segment
										segmentShowStroke: true,
										//String - The colour of each segment stroke
										segmentStrokeColor: "#fff",
										//Number - The width of each segment stroke
										segmentStrokeWidth: 2,
										//Number - The percentage of the chart that we cut out of the middle
										percentageInnerCutout: 0, // This is 0 for Pie charts
										//Number - Amount of animation steps
										animationSteps: 100,
										//String - Animation easing effect
										animationEasing: "easeOutBounce",
										//Boolean - Whether we animate the rotation of the Doughnut
										animateRotate: true,
										//Boolean - Whether we animate scaling the Doughnut from the centre
										animateScale: false,
										//Boolean - whether to make the chart responsive to window resizing
										responsive: true,
										// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
										maintainAspectRatio: true,
										//String - A legend template
										legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
									};
									//Create pie or douhnut chart
									// You can switch between pie and douhnut using the method below.
									pieChart.Doughnut(PieData, pieOptions);



									var pieChartCanvas = $("#city_pie").get(0).getContext("2d");
									var pieChart = new Chart(pieChartCanvas);
									var PieData = [

										<?php
												 $i=0;
													$total = $mysqli->query("select count(center.id) as count, city.id as city_id, city.description as description from city
																inner join center on center.city  = city.id group by city.id");
													while($row = $total->fetch_assoc()){
														$i++;
														//echo '<tr class="city_click" city="'.$row['city_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i> '.$row['description'].'</li></td><td class="text-city">'.$row['count'].'</td></tr>';

														echo 	'{
																	value: '.$row['count'].' ,
																	color: "'.$color[$i].'",
																	highlight: "'.$color[$i].'",
																	label: "'.$row['description'].'"
																}';
														if($i <= $total->num_rows) echo ",";
													}
										?>
									];

									var pieOptions = {
										//Boolean - Whether we should show a stroke on each segment
										segmentShowStroke: true,
										//String - The colour of each segment stroke
										segmentStrokeColor: "#fff",
										//Number - The width of each segment stroke
										segmentStrokeWidth: 2,
										//Number - The percentage of the chart that we cut out of the middle
										percentageInnerCutout: 0, // This is 0 for Pie charts
										//Number - Amount of animation steps
										animationSteps: 100,
										//String - Animation easing effect
										animationEasing: "easeOutBounce",
										//Boolean - Whether we animate the rotation of the Doughnut
										animateRotate: true,
										//Boolean - Whether we animate scaling the Doughnut from the centre
										animateScale: false,
										//Boolean - whether to make the chart responsive to window resizing
										responsive: true,
										// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
										maintainAspectRatio: true,
										//String - A legend template
										legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
									};
									//Create pie or douhnut chart
									// You can switch between pie and douhnut using the method below.
									pieChart.Doughnut(PieData, pieOptions);


								});
			</script>

	<?php
			$mysqli->close();
	?>
