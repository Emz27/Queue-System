

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
						<th class="col-md-1">Address</th>
						<th class="col-md-1">Cellphone Number</th>
						<th class="col-md-1">Telephone Number</th>
						<th class="col-md-1">Email</th>
						<th class="col-md-1">Username</th>
						<th class="col-md-1">User Type</th>
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

											<form id="inputForm" >
                      <div class="pad" id="infopanel"></div>
                      <div class="form-horizontal">

												<div class="form-group">
                          <label class="col-sm-3  control-label">Password</label>
                          <div class="col-sm-9">
															<input type="hidden" id="crudMethod" name="crud" value="N">
															<input type="hidden" id="txtId" name="id" value="0">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
												<div class="form-group">
                          <label class="col-sm-3  control-label">Confirm Password</label>
                          <div class="col-sm-9">
                              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
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
