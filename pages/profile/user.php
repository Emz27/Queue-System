

	        <section class="content-header">
              <h1>
                Users
                <small>Crud Application</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
              </ol>
            </section>

            <!-- ========================================================================================================== -->
            <!-- Main content -->
            <section class="content">
              <!-- Default box -->
              <div class="box">
                <div class="box-body">
                 <button type="submit" class="btn btn-primary " id="btnadd" name="btnadd"><i class="fa fa-plus"></i> Add User</button>
                 <br>
                 <br>
                 <div class="box-body" >
					<table id="table_user" class="table table-hover">
						<thead>
						<tr class="tableheader">
						<th>#</th>
						<th class="col-md-1">Employee Id</th>
						<th class="col-md-1">Firstname</th>
						<th class="col-md-1">Lastname</th>
						<th class="col-md-1">Birth Date</th>
						<th class="col-md-1">Gender</th>
						<th class="col-md-1">Town</th>
						<th class="col-md-1">Cellphone Number</th>
						<th class="col-md-1">Telephone Number</th>
						<th class="col-md-1">Email</th>
						<th class="col-md-1">Username</th>
						<th class="col-md-1">User Type</th>
						<th class="col-md-1">Branch</th>
						<th class="col-md-1"></th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
              <div id="modalcust" class="modal">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Form</h4>
                    </div>
                    <!--modal header-->
                    <div class="modal-body">

											<form id="inputForm">
                      <div class="pad" id="infopanel"></div>
                      <div class="form-horizontal">
												<div class="form-group">
                          <label class="col-sm-3  control-label">Employee Id</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtEmployeeId" placeholder="Employee Id" name="employee_id">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3  control-label">Firstname</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtFirstname" placeholder="Firstname" name="firstname">
                              <input type="hidden" id="crudMethod" name="crud" value="N">
                              <input type="hidden" id="txtId" name="id" value="0">
                            </div>
                        </div>
						<div class="form-group">
                          <label class="col-sm-3  control-label">Lastname</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtLastname" name="lastname" placeholder="Lastname">
                            </div>
                        </div>
						<div class="form-group">
                          <label class="col-sm-3  control-label">Birth Date</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtBirth_date" name="birth_date" placeholder="mm/dd/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3  control-label">Gender</label>
                          <div class="col-sm-9">
                              <select class="form-control" id="cboGender" name="gender" title="Please select gender">
																<option value="">Select Gender</option>
                                  <option value="m">Male</option>
                                  <option value="f">Female</option>
                              </select>
                          </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Town</label>
                          <div class="col-sm-9">


															<select class = "form-control" id="numberTown" name = "town">
																<option value="">Select Town</option>

															<?php
																	include "../../../serverDetails.php";

																	$mysqli = new mysqli($host, $uRoot, $pRoot, $database);

																	if($mysqli->connect_error){

																			die("Connect Error: ". $mysqli->connect_error);

																	}

																	$result = $mysqli->query("SELECT town.id as townid, town.description as towndescription, city.description as citydescription from town inner join city");


																	while($row = $result->fetch_assoc()){

																		echo "<option value='".$row["townid"]."'>".$row["towndescription"].", ".$row["citydescription"]."</option>";

																	}

																	$mysqli->close();
															?>
														</select>

                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3  control-label">Cellphone Number</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="numberCellphone_number" name ="cellphone_number" placeholder="Cellphone Number">
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3  control-label">Telephone Number</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="numberTelephone_number" name = "telephone_number"  placeholder="Telephone Number">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Email</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtEmail" name="email" placeholder="Email">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Username</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="txtUsername" name="username" placeholder="Username">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Password</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Confirm Password</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">User Type</label>
                          <div class="col-sm-9">
                              <!--<input type="txt" class="form-control" id="txtUser_type" name="user_type">-->



															<select id="numberUser_type" class="form-control" name="user_type">
																<option value="">Select User Type</option>
																<?php

																include "../../../serverDetails.php";

																$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

																if($result = $mysqli->query("SELECT * FROM user_type")){

																	while($row= $result->fetch_assoc()){
																			echo "<option value=".$row["id"]." selected>".$row["description"]."</option>";

																	}
																}





																$mysqli->close();


																?>
															</select>
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Branch</label>
                          <div class="col-sm-9">
												<select id="txtBranch" class="form-control" name="branch">
													<option value="" selected>Select Branch</option>
													<?php

													include "../../../serverDetails.php";

													$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

													if($result = $mysqli->query("SELECT * FROM branch")){

														while($row= $result->fetch_assoc()){
																echo "<option value=".$row["id"].">". $row['num']." ".$row["description"]."</option>";

														}
													}





													$mysqli->close();


													?>
												</select>
											</div>
										</div>
                        <div class="form-group">
                          <label class="col-sm-3  control-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-primary " id="btnsave"><i class="fa fa-save"></i> Save</button></div>
                        </div>
                      </div>
                      <!--modal footer-->

											</form>
                    </div>
                    <!--modal-content-->
                  </div>
                  <!--modal-dialog modal-lg-->
                </div>
                <!--form-kantor-modal-->
              </div>


            </section><!-- /.content -->
