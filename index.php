<?php


			session_start();

			include("serverDetails.php");

			date_default_timezone_set("Asia/Manila");



?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>PRS</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

		<!-- Theme style -->
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
				 folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

		<link rel="stylesheet" href="css/pace.min.css">

		<link rel="stylesheet" href="css/dataTables.responsive.css">


		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.dataTables.min.css">

		<!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.min.css">-->
		<link rel="stylesheet" type="text/css" href="css/sweetalert.css">


		<link rel="stylesheet" href="css/datepicker3.css">



		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Generic page styles -->
		<!-- <link rel="stylesheet" href="css/style.css"> -->
		<!-- blueimp Gallery styles -->
		<link rel="stylesheet" href="css/blueimp-gallery.min.css">
		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" href="css/jquery.fileupload.css">
		<link rel="stylesheet" href="css/jquery.fileupload-ui.css">

		<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

		<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->




		<style>
		th.dt-center, td.dt-center { text-align: center; }


		 a:hover {
		  cursor:pointer;
		 }


		</style>




	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

	<!-- Bootstrap 3.3.6 -->
	<script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- AdminLTE App -->
	<script src="dist/js/app.min.js"></script>

	<script src="js/pace.min.js"></script>

	<script src="js/sweetalert.min.js"></script>

	<script src="js/bootstrap-notify.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

	<script src="js/dataTables.bootstrap.min.js"></script>

	<script src="js/dataTables.responsive.min.js"></script>

	<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script> -->


	<script src="js/jquery.validate.js"></script>


	<script src="js/bootstrap-datepicker.js"></script>


	<script src = "js/jquery.inputmask.bundle.js" ></script>



	<script src ="js/jquery.maskedinput.js"></script>


	<!-- ChartJS 1.0.1 -->
	<script src="js/Chart.min.js"></script>

		<?php
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				if(isset($_POST['center'])){

					if($_POST['center']!="list"){


			?>


						<script src="js/vendor/jquery.ui.widget.js"></script>
						<!-- The Templates plugin is included to render the upload/download listings -->
						<script src="js/tmpl.min.js"></script>
						<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
						<script src="js/load-image.all.min.js"></script>
						<!-- The Canvas to Blob plugin is included for image resizing functionality -->
						<script src="js/canvas-to-blob.min.js"></script>
						<!-- blueimp Gallery script -->
						<script src="js/jquery.blueimp-gallery.min.js"></script>
						<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
						<script src="js/jquery.iframe-transport.js"></script>
						<!-- The basic File Upload plugin -->
						<script src="js/jquery.fileupload.js"></script>
						<!-- The File Upload processing plugin -->
						<script src="js/jquery.fileupload-process.js"></script>
						<!-- The File Upload image preview & resize plugin -->
						<script src="js/jquery.fileupload-image.js"></script>
						<!-- The File Upload audio preview plugin -->
						<script src="js/jquery.fileupload-audio.js"></script>
						<!-- The File Upload video preview plugin -->
						<script src="js/jquery.fileupload-video.js"></script>
						<!-- The File Upload validation plugin -->
						<script src="js/jquery.fileupload-validate.js"></script>
						<!-- The File Upload user interface plugin -->
						<script src="js/jquery.fileupload-ui.js"></script>
						<!-- The main application script -->
						<!-- <script src="js/upload-main.js"></script> -->

						<!-- The template to display files available for upload -->
						<script id="template-upload" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
								<tr class="template-upload fade">
										<td>
												<span class="preview"></span>
										</td>
										<td>
												<p class="name">{%=file.name%}</p>
												<strong class="error text-danger"></strong>
										</td>
										<td>
												<p class="size">Processing...</p>
												<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
										</td>
										<td>
												{% if (!i && !o.options.autoUpload) { %}
														<button class="btn btn-primary start" disabled>
																<i class="glyphicon glyphicon-upload"></i>
																<span>Start</span>
														</button>
												{% } %}
												{% if (!i) { %}
														<button class="btn btn-warning cancel">
																<i class="glyphicon glyphicon-ban-circle"></i>
																<span>Cancel</span>
														</button>
												{% } %}
										</td>
								</tr>
						{% } %}
						</script>
						<!-- The template to display files available for download -->
						<script id="template-download" type="text/x-tmpl">
						{% for (var i=0, file; file=o.files[i]; i++) { %}
								<tr class="template-download fade">
										<td>
												<span class="preview">
														{% if (file.thumbnailUrl) { %}
																<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
														{% } %}
												</span>
										</td>
										<td>
												<p class="name">
														{% if (file.url) { %}
																<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
														{% } else { %}
																<span>{%=file.name%}</span>
														{% } %}
												</p>
												{% if (file.error) { %}
														<div><span class="label label-danger">Error</span> {%=file.error%}</div>
												{% } %}
										</td>
										<td>
												<span class="size">{%=o.formatFileSize(file.size)%}</span>
										</td>
										<td>
												{% if (file.deleteUrl) { %}
														<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
																<i class="glyphicon glyphicon-trash"></i>
																<span>Delete</span>
														</button>
														<input type="checkbox" name="delete" value="1" class="toggle">
												{% } else { %}
														<button class="btn btn-warning cancel">
																<i class="glyphicon glyphicon-ban-circle"></i>
																<span>Cancel</span>
														</button>
												{% } %}
										</td>
								</tr>
						{% } %}
						</script>
			<?php
					}
				}
			}

			?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_pyjvO_Hv0XPZNmVksKNK2N7tZLvLLRE"></script>

	<script>

	  var map;
	  function googleMap(div,latitude,longitude,contentString)
	  {
	    var opts = {'center': new google.maps.LatLng(latitude, longitude),
	    'zoom':15, 'mapTypeId': google.maps.MapTypeId.ROADMAP,disableDefaultUI: true }

	     map = new google.maps.Map(document.getElementById(div),opts);


			 var infowindow = new google.maps.InfoWindow({
          "content": contentString
        });

	    var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

	    var marker = new google.maps.Marker({
	      position: myLatLng,
	      map: map,
	      title: 'test'
	    });
			//infowindow.open(map, marker);
			marker.addListener('click', function() {
          infowindow.open(map, marker);
      });

	  }
		var markersArray = [];
		function myMap(div,latitude,longitude)
		{
			var opts = {'center': new google.maps.LatLng(latitude, longitude),
			'zoom':20, 'mapTypeId': google.maps.MapTypeId.ROADMAP }
			map = new google.maps.Map(document.getElementById('mapDiv'),opts);

			var myLatLng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};

			marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'test'
			});

			markersArray.push(marker);

			google.maps.event.addListener(map,'click',function(event) {
				//document.getElementById('latlongclicked').value = event.latLng.lat() + ', ' + event.latLng.lng();
				$("#latitude").val(event.latLng.lat());
				$("#longitude").val(event.latLng.lng());

				for (var i = 0; i < markersArray.length; i++ ) {
			    markersArray[i].setMap(null);
			  }
			  markersArray.length = 0;

				var myLatLng = {lat: parseFloat(event.latLng.lat()), lng: parseFloat(event.latLng.lng())};

				var marker = new google.maps.Marker({
		      position: myLatLng,
		      map: map,
		      title: 'test'
		    });

				markersArray.push(marker);
			})

		}


		function post(path, params, method) {
		    method = method || "post"; // Set method to post by default if not specified.

		    // The rest of this code assumes you are not using a library.
		    // It can be made less wordy if you use one.
		    var form = document.createElement("form");
		    form.setAttribute("method", method);
		    form.setAttribute("action", path);

		    for(var key in params) {
		        if(params.hasOwnProperty(key)) {
		            var hiddenField = document.createElement("input");
		            hiddenField.setAttribute("type", "hidden");
		            hiddenField.setAttribute("name", key);
		            hiddenField.setAttribute("value", params[key]);

		            form.appendChild(hiddenField);
		         }
		    }

		    document.body.appendChild(form);
		    form.submit();
		}


	</script>




	</head>

	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php
				if(isset($_SESSION['id'])){
				    include "pages/mainheader.php";
				    include "pages/mainsidebar.php";
				    include "pages/controlsidebar.php";

						echo '<!-- Content Wrapper. Contains page content --><div id="content" class="content-wrapper">';
				}

			?>



			<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {

					if(isset($_POST['error'])){



					}
					else if(  isset($_POST['datatable']) || isset($_POST['center']) || isset($_POST['member']) || isset($_POST['home']) || isset($_POST['dashboard']) || isset($_POST['inquire'])  ){
						include("pages/main.php");
					}
				}
				else{
					include "home.php";
				}
			?>
			<?php
				if(isset($_SESSION['id'])){

						echo '</div>
						  <!-- /.content-wrapper -->';
							include "pages/mainfooter.php";
				}

			?>


		<!-- /.wrapper -->
	</body>

</html>




<script>
$(document).ready(function(){

	setTimeout(function(){



	$("#datatable_user").click(function(){
		post("index.php",{datatable:"user"});
	});

	$("#datatable_user_type").click(function(){
		post("index.php",{datatable:"user_type"});
	});

	$("#datatable_changepassword").click(function(){
		post("index.php",{datatable:"changepassword"});
	});
	$("#datatable_center_type").click(function(){
		post("index.php",{datatable:"center_type"});
	});
	$("#datatable_agreement_type").click(function(){
		post("index.php",{datatable:"agreement_type"});
	});
	$("#datatable_commercial_term").click(function(){
		post("index.php",{datatable:"commercial_term"});
	});
	$("#datatable_growth_type").click(function(){
		post("index.php",{datatable:"growth_type"});
	});
	$("#datatable_region").click(function(){
		post("index.php",{datatable:"region"});
	});
	$("#datatable_city").click(function(){
		post("index.php",{datatable:"city"});
	});
	$("#datatable_cancel_reason").click(function(){
		post("index.php",{datatable:"cancel_reason"});
	});

	$(document).on( "click","#center_delete", function() {
		var center = $(this).attr("center");
		swal({
			title: "Delete Center?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Delete",
			closeOnConfirm: true },
			function(){
				var value = {
					center : center
				};
				$.ajax(
				{
					url : "pages/center_delete.php",
					type: "POST",
					data : value,
					success: function(data, textStatus, jqXHR)
					{
						var data = jQuery.parseJSON(data);
						if(data.result ==1){
							$.notify('Center Deleted successfully');

						}else{
							swal("Error","Can't delete Center, error : "+data.error,"error");
						}

						setTimeout(function(){
							post("index.php",{dashboard:"project_owner"});
						},2000);

					},
					error: function(jqXHR, textStatus, errorThrown)
					{
					 swal("Error!", textStatus, "error");
					}
				});
			});
	});



	$("#member").click(function(){
		post("index.php",{member:"list"});
	});
	$("#center").click(function(){
		post("index.php",{center:"list"});
	});
	$("#dashboard_project_owner").click(function(){
		post("index.php",{dashboard:"project_owner"});
	});
	$("#dashboard_manager").click(function(){
		post("index.php",{dashboard:"manager"});
	});
	$("#home").click(function(){
		post("index.php",{home:"me"});
	});
	$("#inquire").click(function(){
		post("index.php",{inquire:"list"});
	});

	$('#inquireForm').validate({
		submitHandler:function(form){
				$.ajax(
				{
					url : 'inquire_save.php',
					type: 'POST',
					data : $(form).serialize(),
					success: function(data, textStatus, jqXHR)
					{
							//console.log(data);
							var data1 = jQuery.parseJSON(data);
							if(data1.result == 1){
								//console.log('sucess');
								$.notify('Inquiry Sent');
								$('#modal_inquire').modal('hide');

							}else{
								swal('Error','Cant send inquiry, error : '+data1.error,'error');
							}


					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						 swal('Error!', textStatus, 'error');
					}
				});


		},
		rules:{
			workstation:"required",
			firstname:"required",
			lastname:"required",
			company:"required",
			city:"required",
			cellphone_number:"required",
			telephone_number:"required",
			email:"required",
			message:"required"
		}


	});

	setTimeout(function(){
		$('#collapse_open_date').on('shown.bs.collapse', function (e) {

			var latitude = $("#latitude").val();
			var longitude = $("#longitude").val();

			if(!latitude || !longitude){
					latitude = "14.608994141663393";
					longitude = "121.07672022655606";
			}

			myMap("mapDiv",latitude,longitude);


		});
	},1000);




	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			if(isset($_POST['center'])){

				if($_POST['center']!="list"){

					echo "

					setTimeout(function(){

						$.getScript('js/upload-main.js');
					}, 1000);

					";



				}
			}
			if(isset($_POST['datatable'])){

					include "pages/datatable/".$_POST['datatable']."/".$_POST['datatable'].".js";

			}
			if(isset($_POST['center'])){

				if($_POST['center'] == "list"){
					?>

							var table = $('#table_center').DataTable({
								"paging": true,
								"lengthChange": true,
								"searching": true,
								"ordering": true,
								"info": false,
								"responsive": true,
								"autoWidth": true,
								"pageLength": 10,
								"ajax": {
									"url": "pages/centerlist/data.php",
									"type": "POST"
								},
								"columns": [
								{ "data": "urutan" },
								{ "data": "description"},
								{ "data": "location" },
								{ "data": "project_owner" },
								{ "data": "status" }
								]
							});

							$('#table_center tbody').on('click', 'tr', function () {
									var data = table.row( this ).data();
									//alert( 'You clicked on '+data['center_id']+'\'s row' );

									post("index.php",{center:data['center_id']});


							} );

					<?php
				}
			}
			if(isset($_POST['inquire'])){

				if($_POST['inquire'] == "list"){
					?>

							var table = $('#table_inquire').DataTable({
								"paging": true,
								"lengthChange": true,
								"searching": true,
								"ordering": true,
								"info": false,
								"responsive": true,
								"autoWidth": true,
								"pageLength": 10,
								"ajax": {
									"url": "pages/inquirelist/data.php",
									"type": "POST"
								},
								"columns": [
								{ "data": "urutan"},
								{"data":"center"},
								{ "data": "workstation"},
								{ "data": "name"},
								{ "data": "location" },
								{ "data": "email" },
								{ "data": "cellphone_number" },
								{ "data": "telephone_number" },
								{ "data": "message"},
								{ "data": "date_time"}

								]
							});

							$('#table_center tbody').on('click', 'tr', function () {
									var data = table.row( this ).data();
									//alert( 'You clicked on '+data['center_id']+'\'s row' );

									post("index.php",{center:data['center_id']});


							} );

					<?php
				}
			}
			if(isset($_POST['dashboard'])){

				if($_POST['dashboard'] == "manager"){

				}
			}
		}

	?>
},1000);

});
</script>
