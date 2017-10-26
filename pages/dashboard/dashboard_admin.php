<?php session_start(); ?>
	<section class="content-header">
      <h1>
		Dashboard
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
			<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION['user_type_description']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Center Established</b> <a class="pull-right">1,322</a>
                </li>
								<li class="list-group-item">
                  <b>Center Handled</b> <a class="pull-right">1,322</a>
                </li>

              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!-- /.box -->
        </div>

<div class="col-md-9">
	<div class="box">
		<div class="box-header">
			<button type="submit" class="btn btn-primary " id="btnadd" name="btnadd"><i class="fa fa-plus"></i> Add Center</button>
			<!-- <h3 class="box-title">Branch Center</h3> -->

			<!-- <div class="box-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<select name="table_search" class="form-control pull-right" placeholder="Search">
						<option value="">Select Branch<option>

					</select>

					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i></button>
					</div>
				</div>
			</div> -->
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="table_center" class="table table-hover ">

				<thead>
					<tr>
						<th class="dt-center">row</th>
						<th class="dt-center">Description</th>
						<th class="dt-center">Location</th>
						<th class="dt-center">Status</th>
					</tr>
				</thead>
				<tbody>
			</tbody></table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>

			<div id="modal_dashboard" class="modal">
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
									<label class="col-sm-3  control-label">Center Description</label>
									<div class="col-sm-9">
											<input type="text" class="form-control" id="description" placeholder="Center Description" name="description">
										</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3  control-label">City</label>
										<div class="col-sm-9">

												<select class="form-control" id="city" name="city">
													<option value="" selected>Select City</option>

													<?php
														include("../serverDetails.php");

														$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

														$result = $mysqli->query("SELECT city.id as cityid, city.description as citydescription, region.description as regiondescription from city
																						inner join region on city.region = region.id");
														while($row = $result->fetch_assoc()){

															echo "<option value='".$row["cityid"]."'>".$row["citydescription"].",".$row["regiondescription"]."</option>";
														}

														$result->close();
													 ?>
												</select>

									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3  control-label">Search Inquiry Date</label>
									<div class="col-sm-9">
											<input type="text" class="form-control" id="search_inquiry_date"  name="search_inquiry_date">
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






</section>
