<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

  setlocale(LC_MONETARY,"en_US");
?>


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



  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
    }
  }
  </style>
<div style="background-color:#E8E8E8 ">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">

        <?php

						if(!isset($_SESSION['id'])){
								echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}



				?>

      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/office1.jpg" alt="Image">

      </div>

      <div class="item">
        <img src="images/office2.jpg?text=test" alt="Image">

      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
  <br>

	<div class="col-md-12">
          <div class="box box-solid">
          </br></br></br></br>
            <h3>Opened Centers</h3>
            </br></br></br></br>
          </div>
          <!-- /.box -->
        </div>

				<div id="center_container">






				</div>

	</div><br>

<script>

	$("#center_container").load("center_load.php",function(){


    $(document).on("click",".btnInquire",function(){
      var id=$(this).attr("id");
      // $("#crudMethod").val("E");
      // $("#txtId").val(data.id);
      // $("#num").val(data.num);
      // $("#description").val(data.description);
      // $("#street_address").val(data.street_address);
      // $("#town").val(data.town);

      $("#modal_inquire").modal('show');

      $("#modal_center_id").val(id);





      //$("#numberCellphone_number").mask("+639999999999");
      $("#numberCellphone_number").inputmask({"mask": "+639999999999"});
    	//$("#numberTelephone_number").mask("(999)999-9999");
      $("#numberTelephone_number").inputmask({"mask": "(999) 999-9999"});
    	$("#txtEmail").inputmask({ alias: "email", "clearIncomplete": true });

      $.post("workstation_select.php",{center_id:id},function(data){

          $("#workstation_select").html(data);
      });



      // $("#inputForm").validate({
      //
      //
      //   submitHandler:function(form){
      //     alert("hello");
      //       $.ajax(
      //       {
      //         url : "pages/datatable/user/save.php",
      //         type: "POST",
      //         data : $(form).serialize(),
      //         success: function(data, textStatus, jqXHR)
      //         {
      //           var data = jQuery.parseJSON(data);
      //           if(data.crud == 'N'){
      //             if(data.result == 1){
      //               $.notify('Save Data Successfull');
      //               var table = $('#table_user').DataTable();
      //               table.ajax.reload( null, false );
      //
      //             }else{
      //               swal("Error","Can't save customer data, error : "+data.error,"error");
      //             }
      //           }else if(data.crud == 'E'){
      //             if(data.result == 1){
      //               $.notify('Edit data Successfull');
      //               var table = $('#table_user').DataTable();
      //               table.ajax.reload( null, false );
      //               $("#txtFirstname").focus();
      //             }else{
      //              swal("Error","Can't update customer data, error : "+data.error,"error");
      //             }
      //           }else{
      //             swal("Error","invalid order","error");
      //           }
      //           $("#modalcust").modal("hide");
      //         },
      //         error: function(jqXHR, textStatus, errorThrown)
      //         {
      //            swal("Error!", textStatus, "error");
      //            alert("error");
      //
      //         }
      //       });
      //
      //
      //   },
      //   rules: {
      //     firstname : {
      //        required : true,
      //        minlength: 2,
      //        maxlength: 32
      //     },
      //     lastname : {
      //       required : true,
      //       minlength :2,
      //       maxlength : 32
      //     },
      //     birth_date:{
      //       required : true,
      //
      //     },
      //     gender:{
      //       required: true
      //     },
      //     city:{
      //       required: true
      //     },
      //     street_address:{
      //       required: true
      //     },
      //     email:{
      //       required: true,
      //       remote:{
      //         url:"../ajaxrequest/verification/emailDuplication.php",
    	// 				type : "post",
    	// 				data : {
    	// 					email : function(){
    	// 						return $("#txtEmail").val();
    	// 					},
      //           id : function(){
      //             return $("#txtId").val();
      //           }
      //
    	// 				}
      //       }
      //     },
      //     username:{
      //       required:true,
      //       remote:{
    	// 				url: "../ajaxrequest/verification/usernameDuplication.php",
    	// 				type : "post",
    	// 				data : {
    	// 					username: function(){
    	// 						return $("#txtUsername").val();
    	// 					},
      //           id : function(){
      //             return $("#txtId").val();
      //           }
    	// 				}
      //
    	// 			}
      //     },
      //     password : "required",
      //     confirm_password:{
      //       equalTo: "#password"
      //
      //     },
      //     user_type:"required"
      //
      //
      //   },
      //
      //   messages:{
      //     email:{
      //       remote:"Email not available"
      //     },
      //     username:{
      //       remote:"Username not available"
      //     }
      //
      //
      //   },
      //
      //   errorElement: "em",
      //   errorPlacement: function ( error, element ) {
      //     // Add the `help-block` class to the error element
      //     error.addClass( "help-block" );
      //
      //     if ( element.prop( "type" ) === "checkbox" ) {
      //       error.insertAfter( element.parent( "label" ) );
      //     } else {
      //       error.insertAfter( element );
      //     }
      //   },
      //   highlight: function ( element, errorClass, validClass ) {
      //     $( element ).parents( ".col-sm-9" ).addClass( "has-error" ).removeClass( "has-success" );
      //
      //
      //   },
      //   unhighlight: function (element, errorClass, validClass) {
      //     $( element ).parents( ".col-sm-9" ).addClass( "has-success" ).removeClass( "has-error" );
      //   }
      //
      //
      // });

    });


    //google.maps.event.addDomListener(window, 'load', googleMap(,,,));

  });




</script>
</div>
