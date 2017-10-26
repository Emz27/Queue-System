<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="css/datepicker3.css">






  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <style>
  html {
		position: relative;
		min-height: 100%;
	}
	.carousel-fade .carousel-inner .item {
		opacity: 0;
		transition-property: opacity;
	}
	.carousel-fade .carousel-inner .active {
		opacity: 1;
	}
	.carousel-fade .carousel-inner .active.left,
	.carousel-fade .carousel-inner .active.right {
		left: 0;
		opacity: 0;
		z-index: 1;
	}
	.carousel-fade .carousel-inner .next.left,
	.carousel-fade .carousel-inner .prev.right {
		opacity: 1;
	}
	.carousel-fade .carousel-control {
		z-index: 2;
	}
	@media all and (transform-3d),
	(-webkit-transform-3d) {
		.carousel-fade .carousel-inner > .item.next,
		.carousel-fade .carousel-inner > .item.active.right {
			opacity: 0;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
		.carousel-fade .carousel-inner > .item.prev,
		.carousel-fade .carousel-inner > .item.active.left {
			opacity: 0;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
		.carousel-fade .carousel-inner > .item.next.left,
		.carousel-fade .carousel-inner > .item.prev.right,
		.carousel-fade .carousel-inner > .item.active {
			opacity: 1;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}
	}
	.item:nth-child(1) {
		background: url(images/office1.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.item:nth-child(2) {
		background: url(images/office2.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.item:nth-child(3) {
		background: url(images/office3.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.item:nth-child(4) {
		background: url(images/office4.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.item:nth-child(5) {
		background: url(images/office5.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	.carousel {
		z-index: -99;
	}
	.carousel .item {
		position: fixed;
		width: 100%;
		height: 100%;
	}
	.title {
	  text-align: center;
	  margin-top: 20px;
	  padding: 10px;
	  text-shadow: 2px 2px #000;
	  color: #FFF;
	}

	.box {
		-webkit-transition: width 2s; /* Safari */
		transition: width 2s;
	}



</style>



</head>
<body class="hold-transition login-page">

<!-- Inspired by http://codepen.io/transportedman/pen/NPWRGq -->

<div class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        </div>
        <div class="item">
        </div>
        <div class="item">
        </div>
		<div class="item">
        </div>
		<div class="item">
        </div>
    </div>
</div>

<!-- Remeber to put all the content you want on top of the slider below the slider code -->

<div class="login-box">

  <!-- /.login-logo -->


	<div class="container">

			<div class="col-md-7" >

				<div class="box box-info" style="box-shadow: 0 15px 20px rgba(0, 0, 0, 0.7); ">

					<div class="login-logo box-header with-border">
						<b>RegusCorp.</b>Phil.
					</div>
					<div class="box-header with-border">
					  <h3 class="box-title">Register</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form id="registerForm" class="form-horizontal">

						<div class="box-body">

							<div class="form-group has-feedback">

									<label for="inputFirstname" class="col-sm-2 control-label" style="color:black;">Firstname</label>
										<div class="col-sm-10">

										<input id="inputFirstname" name="inputFirstname" type="text" class="form-control" placeholder="Firstname">

										</div>
									<div id="helpFirstnameContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputFirstname"><i id="helpFirstnameIcon" class="fa "></i> <span id="helpFirstname"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group has-feedback">

									<label for="inputLastname" class="col-sm-2 control-label" style="color:black;">Lastname</label>
									<div class="col-sm-10">

										<input id="inputLastname" name="inputLastname" type="text" class="form-control" placeholder="Lastname" maxlength="32">

									</div>
									<div id="helpLastnameContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputLastname"><i id="helpLastnameIcon" class="fa "></i> <span id="helpLastname"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group">



								<label for="inputLastname" class="col-sm-2 control-label" style="color:black;">Gender</label>



								<div class = "col-sm-10">
									<div class="row">

											<label class="col-sm-2">Male</label>
											<div class="col-sm-10">

											<!--<div class="iradio_minimal-blue checked" aria-checked="true" aria-disabled="false" style="position: relative;"><input type="radio" name="gender" id="male" value="m" class="minimal" style="position: absolute; opacity: 0;" checked><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
											<input type="radio" name="inputGender" id="male" value="m" class="minimal">


											</div>





									</div>
									<div class="row">
										<label class="col-sm-2">Female</label>
											<div class="col-sm-10">

											<!--<div class="iradio_minimal-blue checked" aria-checked="true" aria-disabled="false" style="position: relative;"><input type="radio" name="gender" id="male" value="m" class="minimal" style="position: absolute; opacity: 0;" checked><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>-->
											<input type="radio" name="inputGender" id="female" value="m" class="minimal">
											<em class="error"></em>

											</div>
									</div>
									<em for="gender" class="error"></em>

								</div>
							 </div>
							<div class="form-group has-feedback">

									<label for="inputBirthdate" class="col-sm-2 control-label" style="color:black;">Birthdate</label>
									<div class="col-sm-10">

										<!--<div class="input-group date">
										  <div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										  </div>-->
										  <input type="text" class="form-control pull-right" id="inputBirthdate" name="inputBirthdate" placeholder="mm/dd/yyyy">
										<!--</div>-->

									</div>
									<div id="helpBirthdateContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputBirthdate"><i id="helpBirthdateIcon" class="fa "></i> <span id="helpBirthdate"></span></span>
										</div>
									</div>

							</div>

							<div class="form-group has-feedback">

									<label for="inputUsername" class="col-sm-2 control-label" style="color:black;">Username</label>
									<div  class="col-sm-10">

										<input id="inputUsername" name = "inputUsername" type="text" class="form-control" placeholder="Username" maxlength="32">
										<!--<span class="glyphicon glyphicon-user form-control-feedback"></span>-->

									</div>
									<!--
									<label for="inputUsername" class="col-sm-2 control-label" style="color:black;">Username</label>
									<div class="col-sm-10">

										<input id="inputUsername" name = "inputUsername" type="text" class="form-control" placeholder="Username" maxlength="32">
										<!--<span class="glyphicon glyphicon-user form-control-feedback"></span>-->
									<!--
									</div>
									<div id="helpUsernameContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputUsername"><i id="helpUsernameIcon" class="fa "></i> <span id="helpUsername"></span></span>
										</div>
									</div>-->

							</div>
							<div class="form-group has-feedback">

									<label for="inputPassword" class="col-sm-2 control-label" style="color:black;">Password</label>
									<div class="col-sm-10">

										<input id="inputPassword" name = "inputPassword" type="password" class="form-control" placeholder="Password" maxlength="32">
										<!--<span class="glyphicon glyphicon-lock form-control-feedback"></span>-->

									</div>
									<div id="helpPasswordContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputPassword"><i id="helpPasswordIcon" class="fa "></i> <span id="helpPassword"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group has-feedback">

									<label for="inputConfirmPassword" class="col-sm-2 control-label" style="color:black;">ConfirmPass</label>
									<div class="col-sm-10">

										<input id="inputConfirmPassword" name = "inputConfirmPassword" type="password" class="form-control" placeholder="ConfirmPassword" maxlength="32">
										<!--<span class="glyphicon glyphicon-lock form-control-feedback"></span>-->

									</div>
									<div id="helpConfirmPasswordContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputConfirmPassword"><i id="helpConfirmPasswordIcon" class="fa "></i> <span id="helpConfirmPassword"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group has-feedback">

									<label for="inputEmail" class="col-sm-2 control-label" style="color:black;">Email</label>
									<div class="col-sm-10">

										<!--<div class="input-group">-->
											<!--
										  <div class="input-group-addon">
											<i class="fa fa-envelope"></i>
										  </div>
											-->
										   <input id = "inputEmail" name = "inputEmail" type="text" class="form-control" >
										<!--</div>-->
									</div>
									<div id="helpEmailContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputEmail"><i id="helpEmailIcon" class="fa "></i> <span id="helpEmail"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group has-feedback">

									<label for="inputCompanyName" class="col-sm-2 control-label" style="color:black;">Company Name</label>
									<div class="col-sm-10">

										<input id="inputCompanyName" name = "inputCompanyName" type="CompanyName" class="form-control" placeholder="CompanyName" maxlength="32">
										<!--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>-->
									</div>
									<div id="helpCompanyNameContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputCompanyName"><i id="helpCompanyNameIcon" class="fa "></i> <span id="helpCompanyName"></span></span>
										</div>
									</div>

							</div>

							<div class="form-group has-feedback">

									<label for="inputTelephone" class="col-sm-2 control-label" style="color:black;">Telephone</label>
									<div class="col-sm-10">

										<!--<div class="input-group">-->
										<!--
										  <div class="input-group-addon">
											<i class="fa fa-phone"></i>
										  </div>-->
										  <input id = "inputTelephone" name = "inputTelephone" type="text" class="form-control">
										<!--</div>-->

									</div>
									<div id="helpTelephoneContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputTelephone"><i id="helpTelephoneIcon" class="fa "></i> <span id="helpTelephone"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group has-feedback">

									<label for="inputCellphone" class="col-sm-2 control-label" style="color:black;">Cellphone</label>
									<div class="col-sm-10">
										<!--
										<div class="input-group">
										  <div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										  </div>-->
										  <input id = "inputCellphone" name = "inputCellphone" type="text" class="form-control"></input>
										<!--</div>-->

									</div>
									<div id="helpCellphoneContainer" class="hidden">
										<div class= "col-sm-2">
										</div>
										<div class= "col-sm-10">
											<span class="help-block" for="inputCellphone"><i id="helpCellphoneIcon" class="fa "></i> <span id="helpCellphone"></span></span>
										</div>
									</div>

							</div>
							<div class="form-group">

								<div class= "row">
									<div class = "col-xs-2"></div>
									<div class="col-xs-6">
									 <!--class="checkbox icheck" -->

											I agree to the <a href="#">terms</a>
										  <input id="inputAgree" name = "inputAgree" type="checkbox">



									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">

									</div>
									<div class="col-xs-5">
									  <button type="submit" id="submit" name ="submit" class="btn btn-primary btn-block btn-flat">Register</button>
									</div>
									<!-- /.col -->
									<div class="col-xs-1">

									</div>

								</div>



							</div>
							<a href="login.php" class="text-center">I already have a membership</a>
					  </div>

					  <!-- /.box-footer -->
					</form>
				  </div>


				  <!-- /.login-box-body -->
			</div>


	</div>


	  <div class="modal fade" id="myModal">
		<div class="modal-dialog">

		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Registration Successful</h4>
			</div>
			<div class="modal-body">
			  <p>Go Back to login page</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>

		</div>
	  </div>


	  <script>

	  </script>



</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--- jquery validation --->
<script src="js/jquery.validate.js"></script>

<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.js"></script>

<!-- mask input plugin for emails -->
<script src = "js/jquery.inputmask.bundle.js" ></script>


<!--- easier mask input plugin ---->
<script src ="js/jquery.maskedinput.js"></script>





<!-- Page script -->



<script>
  $( document ).ready(function () {



	  /*
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      //increaseArea: '20%' // optional
    });*/



	$('#inputBirthdate').datepicker({
      autoclose: true
    });




	jQuery.validator.addMethod("letterswithbasicpunc", function(value, element) {
		return this.optional(element) || /^[a-z-.,()\"\s]+$/i.test(value);
	}, "Letters or punctuation only please");



	$("#inputCellphone").mask(" + 6 3 9 9 9 9 9 9 9 9 9 9");
	$("#inputTelephone").mask("( 9 9 9 ) 9 9 9 - 9 9 9 9");
	$("#inputEmail").inputmask({ alias: "email", "clearIncomplete": true });



	$(".selector").validate({
	  submitHandler: function(form) {
		// do other things for a valid form
		//form.submit();
	  }
	});

	$("#registerForm").validate({

		submitHandler:function(form){
			$.ajax({
				type: "POST",
				url: "ajaxrequest/registerClient.php",
				data: $(form).serialize(),
				success: function(data) {
					//var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
					// do what ever you want with the server response

					// alert("hello");

					if(data == "success"){

						$('#myModal').on('show.bs.modal', function (event) {
						  var modal = $(this);
						  modal.find('.modal-body').text("Registration Successful<br/><a href='prs/login.php'>login page</a>");
						});
						$(form)[0].reset();
						$("#myModal").modal();
					}
					else if(data == "failed") {

						$('#myModal').on('show.bs.modal', function (event) {
						  var modal = $(this);
						  modal.find('.modal-body').text("Theres an error processing your request");
						});

						$("#myModal").modal();
					}

				},
				error: function() {
					alert('error handing here');
				}
			});
		},




		rules: {
			inputFirstname : {
				 required : true
			},
			inputLastname : {
				required: true
			},
			inputGender : {

					required: true
			},
			inputBirthdate : {
				required: true
			},
			inputUsername : {
				required: true,
				remote:{
					url: "ajaxrequest/verification/usernameDuplication.php",
					type : "post",
					data : {
						username: function(){
							return $("#inputUsername").val();
						}
					}

				}
			},
			inputPassword : {
				required: true
			},
			inputConfirmPassword : {
				equalTo: "#inputPassword"
			},
			inputEmail : {
				required : true,
				remote:{
					url:"ajaxrequest/verification/emailDuplication.php",
					type : "post",
					data : {
						email : function(){
							return $("#inputEmail").val();
						}

					}

				}
			},
			inputCompanyName : {
				required: true
			},

			inputTelephone : {
				required: true
			},
			inputCellphone : {
				required: true
			},
			inputAgree : {
				required: true
			}



		},
		messages:{
			inputUsername:{

				remote:"Username already taken!"

			},
			inputEmail:{
				remote:"Email already taken"
			},
			inputAgree:{
				required: "Please accept our terms"
			}

		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );


		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
		}


	});
  });


</script>
</body>
</html>
