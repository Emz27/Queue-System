
  <!-- footer -->





	<?php
			 		if($_SERVER["REQUEST_METHOD"] == "POST"){


							if(isset($_POST['datatable'])){
								$index = filter_var($_POST['datatable'], FILTER_SANITIZE_STRING);

									include "pages/datatable/".$index."/".$index.".php";



								// 	echo "<script>
								//
								// 		$( '#content' ).load('pages/datatable/".$index."/".$index.".php',function() {
			 				// 				jQuery.getScript('pages/datatable/".$index."/".$index.".js');
								// 			});
								// 		</script>";
							}
							else if(isset($_POST['inquire'])){
								if($_POST['inquire'] == "list"){


									include "pages/inquirelist/inquirelist.php";


								}


							}
							else if(isset($_POST['center'])){

								$_SESSION['center_id'] = $_POST['center'];

								$index = filter_var($_POST['center'], FILTER_SANITIZE_STRING);

									if($_POST['center'] == "list"){
										include 'pages/centerlist/centerlist.php';

									}
									else{
								?>
			 					<script>

									var index = <?php  echo $index; ?> ;

									var centerid = <?php echo $_POST['center']; ?> ;

			 						$( '#content' ).load('pages/center.php?center=' + centerid, function(){


										//console.log(<?php //echo $_POST['center']; ?>);

										$("#local_corporate_guarantee").inputmask({ alias: "currency", "prefix": "" });
										$("#corporate_plc_guarantee").inputmask({ alias: "currency", "prefix": ""});
										$("#bank_guarantee").inputmask({ alias: "currency", "prefix": ""});
										$("#cash_security_deposit").inputmask({ alias: "currency", "prefix": ""});
										$("#gross_capex").inputmask({ alias: "currency", "prefix": ""});
										$("#landlord_capex_contribution").inputmask({ alias: "currency", "prefix": ""});
										$("#net_corporate_capex").inputmask({ alias: "currency", "prefix": ""});
										$("#usable_area").inputmask({ alias: "decimal", "prefix": ""});
										$("#rate").inputmask({ alias: "currency", "prefix": ""});
										$(".ws_size").inputmask({ alias: "decimal", "prefix": ""});
										$("#longitude").inputmask({ alias: "decimal", "prefix": ""});
										$("#latitude").inputmask({ alias: "decimal", "prefix": ""});


										$('#opening_date').datepicker({
									      //autoclose: true
									  });
										$('#sign_date').datepicker({
									      //autoclose: true
									  });
										$('#submit_date').datepicker({
									      //autoclose: true
									  });
										$('#approve_date').datepicker({
									      //autoclose: true
									  });
										$('#execute_date').datepicker({
									      //autoclose: true
									  });
										$('#commence_date').datepicker({
									      //autoclose: true
									  });
										$('#open_date').datepicker({
									      //autoclose: true
									  });
										$('#target_date').datepicker({
									      //autoclose: true
									  });

										$('#cancel_date').datepicker({
									      //autoclose: true
									  });

										$('#search_inquiry_date').datepicker({
									      //autoclose: true
									  });



										var value = {
							        id: centerid
							      };
										var data="";
										var open_date ="";
							      $.ajax(
							      {
							        url : "pages/center_fetch.php",
							        type: "POST",
							        data : value,
							        success: function(data, textStatus, jqXHR)
							        {
							          data = jQuery.parseJSON(data);

												$("#id").val(data.id);
												$("#name").val(data.name);
												$("#project_owner").val(data.project_owner);
												$("#city").val(data.city);
												$("#status").val(data.status);
												$("#search_inquiry_date").val(data.search_inquiry_date);
												$("#entry_date").val(data.entry_date);
												$("#growth_type").val(data.growth_type);
												$("#agreement_type").val(data.agreement_type);
												$("#commercial_term").val(data.commercial_term);
												$("#rentable_area").val(data.rentable_area);
												$("#local_corporate_guarantee").val(data.local_corporate_guarantee);
												$("#corporate_plc_guarantee").val(data.corporate_plc_guarantee);
												$("#bank_guarantee").val(data.bank_guarantee);
												$("#cash_security_deposit").val(data.cash_security_deposit);
												$("#sign_date").val(data. sign_date);
												$("#center_type").val(data.center_type);
												$("#gross_capex").val(data.gross_capex);
												$("#landlord_capex_contribution").val(data.landlord_capex_contribution);
												$("#net_corporate_capex").val(data.net_corporate_capex);
												$("#submit_date").val(data.submit_date);
												$("#opening_date").val(data.opening_date);
												$("#approve_date").val(data.approve_date);
												$("#ws_num").val(data.ws_num);
												$("#usable_area").val(data.usable_area);
												$("#lead_broker").val(data.lead_broker);
												$("#execute_date").val(data.execute_date);
												$("#center_num").val(data.center_num);
												$("#commence_date").val(data.commence_date);
												$("#target_date").val(data.target_date);
												$("#street_address").val(data.street_address);
												$("#latitude").val((data.latitude)?data.latitude:14.608985706313922);
												$("#longitude").val((data.longitude)?data.longitude:121.07672978192568);
												$("#comment").val(data.comment);
												$("#open_date").val(data.open_date);
												$("#layout_path").val(data.layout_path);
												$("#cancel_reason").val(data.cancel_reason);
												$("#cancel_date").val(data.cancel_date);
												$("#rate").val(data.rate);
												open_date = data.open_date;
							        }

							      });


										jQuery.validator.setDefaults({
										  debug: true,
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
												$( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );


								      },
								      unhighlight: function (element, errorClass, validClass) {
								        $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
												$( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
								      }
										});
										jQuery.validator.addMethod("greaterThan",
										function(value, element, params) {

												if(!$("#"+params).val()) return true;

										    if (!/Invalid|NaN/.test(new Date(value))) {
										        return new Date(value) >= new Date($("#"+params).val());
										    }

										    return isNaN(value) && isNaN($("#"+params).val())
										        || (Number(value) >= Number($("#"+params).val()));
										},'Must be equal or greater than {0}.');

										jQuery.validator.addMethod("lessThan",
										function(value, element, params) {

												if(!$("#"+params).val()) return true;

										    if (!/Invalid|NaN/.test(new Date(value))) {
										        return new Date(value) <= new Date($("#"+params).val());
										    }

										    return isNaN(value) && isNaN($("#"+params).val())
										        || (Number(value) <= Number($("#"+params).val()));
										},'Must be equal or less than {0}.');

										jQuery.validator.addMethod("wsArea",
										function(value, element, params) {

											var wsNum = $(".removeWorkstation").length;
											var meterNum = 0;

											val = $("#usable_area").val().replace(/,/g, '').valueOf()*1;

											$(".ws_size").each(function(){
													meterNum += ($(this).val().replace(/,/g, '').valueOf() * 1);
											});

											params = val;
											value = val;
											element = val;

											return meterNum <= val;

										    // if (priceTotal ) {
										    //     return new Date(value) < new Date($("#"+params).val());
										    // }
												//
										    // return isNaN(value) && isNaN($("#"+params).val())
										    //     || (Number(value) < Number($("#"+params).val()));
										},'Workstation total Area must be equal or less than Net Internal/Usable Area.');


										$('#search_inquiry_form').validate({
											submitHandler:function(form){


								          $.ajax(
								          {
								            url : 'pages/search_inquiry_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }

								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												name:"required",
												street_address:"required",
												city:"required",
												search_inquiry_date:{
													required:"true",
													lessThan:"sign_date",
												}
											}
										});

										$('#letter_of_intent_signed_form').validate({
											submitHandler:function(form){


								          $.ajax(
								          {
								            url : 'pages/sign_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }

								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												growth_type:"required",
												agreement_type:"required",
												commercial_term:"required",
												rentable_area:{
													required:true,
													number: true,
													min:0
												},
												local_corporate_guarantee:{
													required:"true",

												},
												corporate_plc_guarantee:{
													required:"true",

												},
												bank_guarantee:{
													required:"true",

												},
												cash_security_deposit:{
													required:"true",

												},
												sign_date:{
													required:"true",
													lessThan:"submit_date",
													greaterThan:"search_inquiry_date"
												}
											}
										});

										$('#ic_submitted_form').validate({
											submitHandler:function(form){
								          $.ajax(
								          {
								            url : 'pages/submit_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }
								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												center_type:"required",
												gross_capex:{
													required:"true",

												},
												landlord_capex_contribution:{
													required:"true",

												},
												submit_date:{
													required:"true",
													greaterThan:"sign_date",
													lessThan:"approve_date"
												}
											}
										});

										$('#ic_approved_form').validate({
											submitHandler:function(form){
								          $.ajax(
								          {
								            url : 'pages/approve_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }
								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												opening_date:"required",
												approve_date:{
													required:"true",
													greaterThan:"submit_date",
													lessThan:"execute_date"
												}

											}
										});

										$('#lease_executed_form').validate({
											submitHandler:function(form){
								          $.ajax(
								          {
								            url : 'pages/execute_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }
								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												ws_num:{
													required:true,
													number:true,
													min:0
												},
												usable_area:{
													required:true,
													min:0
												},
												lead_broker:"required",
												execute_date:{
													required:"true",
													greaterThan:"approve_date",
													lessThan:"commence_date"
												}
											}
										});

										$('#construction_form').validate({
											submitHandler:function(form){
													if(open_date = false){

														alert(open_date);
														swal('Error','Project already opened!','error');
													}
													else{
														$.ajax(
									          {
									            url : 'pages/commence_date.php',
									            type: 'POST',
									            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
									            success: function(data, textStatus, jqXHR)
									            {
																	var data1 = jQuery.parseJSON(data);
									                if(data1.result == 1){
									                  $.notify('Data Saved, Please refresh your Browser');
																		location.reload();
									                }else{
									                  swal('Error','Cant save input data, error : '+data1.error,'error');
									                }
									            },
									            error: function(jqXHR, textStatus, errorThrown)
									            {
									               swal('Error!', textStatus, 'error');
									            },
															rules:{
																commence_date:{
																	required:"true",
																	greaterThan:"execute_date",
																	lessThan:"target_date"
																},
																target_date:{
																	required:"true",
																	greaterThan:"commence_date",
																	lessThan:"open_date"
																}
															}
									          });
													}

								      }
										});

										$('#open_form').validate({
											submitHandler:function(form){
								          $.ajax(
								          {
								            url : 'pages/open_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }
								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											ignore: [],
											rules:{

												street_address:"required",
												latitude:{
													required:true,
													number:true,
												},
												longitude:{
													required:true,
													number:true
												},
												comment:"required",
												open_date:{
													greaterThan:"commence_date",
												},
												rate:"required",
												"ws_size[]":{
													required:true,
													"wsArea":$('#usable_area').val().valueOf()*1
												}

											}
										});


										$('#cancel_form').validate({
											submitHandler:function(form){
								          $.ajax(
								          {
								            url : 'pages/cancel_date.php',
								            type: 'POST',
								            data : $(form).serialize() +"&centerid=" + encodeURIComponent(centerid),
								            success: function(data, textStatus, jqXHR)
								            {
																var data1 = jQuery.parseJSON(data);
								                if(data1.result == 1){
								                  $.notify('Data Saved, Please refresh your Browser');
																	location.reload();
								                }else{
								                  swal('Error','Cant save input data, error : '+data1.error,'error');
								                }
								            },
								            error: function(jqXHR, textStatus, errorThrown)
								            {
								               swal('Error!', textStatus, 'error');
								            }
								          });
								      },
											rules:{
												cancel_reason:"required"

											}
										});

										$("#wsContainer").on("click",".removeWorkstation",function(){

											if($(".removeWorkstation").length > 1){
												$(this).parents(".ws").remove();
												$.notify('Workstation Removed');
											}
											else{
												$.notify("Workstation cannot be removed");

											}


										});

										$("#wsContainer,#rate").on("keyup keypress blur change",".ws_size",function(){
											var wsNum = $(".removeWorkstation").length;
											var meterNum = 0;
											var priceTotal =0;

											//var currentInputPrice = ($(this).val().replace(/,/g, '').valueOf()) * ($("#rate").val().replace(/,/g, '').valueOf());

											$(".ws_size").each(function(){
													var currentInputPrice1 = ($(this).val().replace(/,/g, '').valueOf()) * ($("#rate").val().replace(/,/g, '').valueOf());
													meterNum += ($(this).val().replace(/,/g, '').valueOf() * 1);
													priceTotal += ($(this).val().replace(/,/g, '').valueOf()) * ($("#rate").val().replace(/,/g, '').valueOf());
													$(this).parent().siblings(".ws_total").html("P "+currentInputPrice1.toLocaleString("en"));
											});

											$("#wsNum").val(wsNum + " Workstations");
											$("#meterNum").val(meterNum + " sqm");
											$("#priceTotal").val("P "+priceTotal.toLocaleString("en"));



										});
										$(document).on("click","#ws_status",function(){
								      // var status=$(this).attr("status");
											//alert("hrllo");

											var value = $(this).val();

											if(value == "Available"){
												$(this).val("Occupied");
												$(this).text("Occupied");
												$(this).siblings(".col-sm-6").children(".ws_status").val("Occupied");

											}
											else{
													$(this).val("Available");
													$(this).text("Available");
													$(this).siblings(".col-sm-6").children(".ws_status").val("Available");
											}


										});

										$("#addWorkstation").click(function(){

												var element = '<div class="form-group col-sm-12 ws"><button class="btn btn-primary col-sm-1 removeWorkstation" type="button"><i class="fa fa-remove"></i></button><div class="col-sm-6"><input name="ws_id[]" class="form-control col-sm-8 hidden ws_id" type="text"><input name="ws_size[]" class="form-control col-sm-6 ws_size" type="text"><input name="ws_status[]" class="form-control col-sm-12 hidden ws_status" type="text" value="Available"></div><input class="btn btn-info btn-flat id="ws_status" name="test" col-sm-2" type="button" value="Available"><span id="ws_total" class="col-sm-3 ws_total"></span></div>';



												$("#wsContainer").append(element);


										});




									});



			 						</script>



								<?php

								}
							}
							else if(isset($_POST['member'])){
								$index = filter_var($_POST['member'], FILTER_SANITIZE_STRING);

									if($_POST['member'] == "list"){

									?>
									<script>
										$( "#content" ).load('pages/member/member.php', function(){


											$('#table_member').DataTable({
								        "paging": true,
								        "lengthChange": true,
								        "searching": true,
								        "ordering": true,
								        "info": false,
								        "responsive": true,
								        "autoWidth": false,
								        "pageLength": 10,
								        "ajax": {
								          "url": "pages/member/data.php",
								          "type": "POST"
								        },
								        "columns": [
								        { "data": "urutan" },

								        { "data": "name" },
								        { "data": "position" },
								        { "data": "location" },
								        ]
								      });

								    });





									</script>
									<?php
									}
									else{






									}

							}
							else if(isset($_POST['home'])){




                echo "<script>$( '#content' ).load('home.php'); </script>";



							}
							else if(isset($_POST['dashboard'])){


								if($_POST['dashboard'] == "project_owner"){
								$index = $_POST['dashboard'];
								?>
								<script>
									var index = <?php echo "'".$index."'"; ?> ;
			 						$( '#content' ).load('pages/dashboard/dashboard_'+index+'.php',{dashboard:index},function(){
												$('#search_inquiry_date').datepicker({
														autoclose: true
												});
												$("#btnadd").click(function(){
													$('#modal_dashboard').modal('show');
												})

												$('#inputForm').validate({
													submitHandler:function(form){
										          $.ajax(
										          {
										            url : 'pages/center_save.php',
										            type: 'POST',
										            data : $(form).serialize(),
										            success: function(data, textStatus, jqXHR)
										            {
																	  //console.log(data);
																		var data1 = jQuery.parseJSON(data);
										                if(data1.result == 1){
																			//console.log('sucess');
										                  $.notify('Save Data Successful');

										                }else{
										                  swal('Error','Cant save center data, error : '+data1.error,'error');
										                }

										              $('#modal_dashboard').modal('hide');
										            },
										            error: function(jqXHR, textStatus, errorThrown)
										            {
										               swal('Error!', textStatus, 'error');
										            }
										          });


										      },
													rules:{
														description:'required',
														town:"required",
														search_inquiry_date:"required"
													}


												});

                        var table = $('#table_center').DataTable({
                          "paging": true,
                          "lengthChange": false,
                          "searching": true,
                          "ordering": true,
                          "info": false,
                          "responsive": true,
                          "autoWidth": false,
                          "pageLength": 5,
                          "ajax": {
                            "url": "pages/centerlist/data.php?dashboard=project_owner",
                            "type": "GET",

                          },
                          "columns": [
                          { "data": "urutan" },
                          { "data": "description"},
                          { "data": "location" },
                          { "data": "status" }
                          ]
                        });
                        $('#table_center tbody').on('click', 'tr', function () {
                            var data = table.row( this ).data();
                            //alert( 'You clicked on '+data['center_id']+'\'s row' );
                            post("index.php",{center:data['center_id']});
                        } );

										});
			 						</script>
									<?php

								}
								else if($_POST['dashboard'] == "manager"){
									$index = $_POST['dashboard'];
									?>
									<script>
									var index = <?php echo "'".$index."'"; ?> ;
									$( '#content' ).load('pages/dashboard/dashboard_'+index+'.php',{dashboard:index},function(){
















									});
									</script>
									<?php

								}






							}
							// if(isset(dashboard))


			 		}

			 ?>
