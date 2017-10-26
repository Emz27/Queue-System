<!DOCTYPE html>

<?php

  session_start();
	//session_destroy();
session_destroy();


?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PRS | Login</title>
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

  <style>
      /* Remove the navbar's default margin-bottom and rounded borders */
      .navbar {
        margin-bottom: 0;
        border-radius: 0;
      }

      /* Add a gray background color and some padding to the footer */
      footer {
        background-color: #f2f2f2;
        padding: 25px;
      }

    .carousel-inner img {
        width: 100%; /* Set width to 100% */
        margin: auto;
        min-height:200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none;
      }
    }
    </style>


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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">

        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>






      </ul>
    </div>
  </div>
</nav>

<!-- Remeber to put all the content you want on top of the slider below the slider code -->

<div class="login-box">

  <!-- /.login-logo -->


	<div class="container">

		<div class="row">


			<div class="col-md-4">





			</div>

			<div class="col-md-4">

				<div class="login-box-body" style="box-shadow: 0 15px 20px rgba(0, 0, 0, 0.7); ">
					<div class="login-logo">
						<b>PRS</b>realstate
					</div>

					<p class="login-box-msg">Sign in to start your session</p>

					<form id="loginForm">
					  <div class="form-group has-feedback">
						<input id="inputUsername" name="inputUsername" type="text" class="form-control" placeholder="Username">

					  </div>
					  <div class="form-group has-feedback">
						<input id="inputPassword" name="inputPassword" type="password" class="form-control" placeholder="Password">
					  </div>
					  <div class="row">

						<!-- /.col -->
						<div class="col-xs-4 col-xs-offset-8">
						  <button id = "submit" name = "submit" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
						<!-- /.col -->
					  </div>
					</form>

					<!-- /.social-auth-links -->
<!--
					<a href="#">I forgot my password</a><br>
					<a href="register.php" class="text-center">Register a new membership</a>
-->
				  </div>
				  <!-- /.login-box-body -->
			</div>

		</div>
	</div>
	<div class="modal fade" id="loginModal">
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

</div>
<!-- /.login-box -->


<!-- jQuery 2.2.3 -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--- jquery validation --->
<script src="js/jquery.validate.js"></script>


<script>

	// Post to the provided URL with the specified parameters.
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






  $( document ).ready(function () {



	jQuery.validator.addMethod("letterswithbasicpunc", function(value, element) {
		return this.optional(element) || /^[a-z-.,()\"\s]+$/i.test(value);
	}, "Letters or punctuation only please");



	$("#loginForm").validate({

		submitHandler:function(form){






			$validator = this;


			$.ajax({
				type: "POST",
				url: "ajaxrequest/login.php",
				data: $(form).serialize(),
				success: function(data) {
					//var obj = jQuery.parseJSON(data); if the dataType is not specified as json uncomment this
					// do what ever you want with the server response

					if(data == "failed") {

						/*
						$('#loginModal').on('show.bs.modal', function (event) {
						  var modal = $(this);
						  modal.find('.modal-body').text("Theres an error processing your request");
						});

						$("#loginModal").modal();
						*/
						$validator.showErrors({inputUsername:"Invalid Username"});
						$validator.showErrors({inputPassword:"Invalid Password"});

					}
					else{

						post("redirect.php",{userId:data});


					}

				},
				error: function() {
					alert('error handing here');
				}
			});

		},




		rules: {
			inputUsername : {
				required: true/*,
				remote:{
					url: "ajaxrequest/verification/usernameDuplication.php",
					type : "post",
					data : {
						username: function(){
							return $("#inputUsername").val();
						}
					}

				}*/
			},
			inputPassword : {
				required: true/*,
				remote:{
					url: "ajaxrequest/verification/usernameDuplication.php",
					type : "post",
					data : {
						username: function(){
							return $("#inputUsername").val();
						}
					}

				}*/
			},
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
			$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );


		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
		}


	});












  });


</script>



</body>
</html>
