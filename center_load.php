

<?php
  setlocale(LC_MONETARY,"en_US");
    include "serverDetails.php";
    $mysqli = new mysqli($host,$uRoot,$pRoot,$database);



    $result = $mysqli->query("select * from center");

    while($row = $result->fetch_assoc()){

      if(strtotime($row['open_date'])<1)continue;


          $result1 = $mysqli->query("select * from files where center_id = '".$row['id']."' and name not in('center.*','layout.*')");

          //echo $mysqli->error;

      ?>


      <div class="col-md-12">
        <div class="box box-success">
          <!-- /.box-header -->
          <div class="box-body">
            <?php echo'<div id="mapDiv'.$row['id'].'" class="col-sm-3" style="height:300px">';  ?>

            </div>
              <?php

                $dir = glob("server/php/files/center/".$row['id']."/center.*");

                $dir = (isset($dir[0]))?$dir[0]:"no data";
                $contentString = "<img src='".$dir."' class='img-responsive pad' style='width:100%' alt='Image'>";



              ?>
              <div class="col-md-6">
                <div class="box-body">
                  <?php echo'<div class="box-group" id="accordion'.$row['id'].'">'; ?>
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <?php echo'<a data-toggle="collapse" data-parent="#accordion'.$row['id'].'" href="#collapse1'.$row['id'].'">'; ?>
                            Images
                          </a>
                        </h4>
                      </div>
                      <?php echo '<div id="collapse1'.$row['id'].'" class="panel-collapse collapse in">'; ?>
                        <div class="box-body">
                          <?php echo '<div id="myCarousel'.$row['id'].'" class="carousel slide" data-ride="carousel">'; ?>
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <?php
                                for($i=0;$i<$result1->num_rows;$i++){
                                  echo '<li data-target="#myCarousel'.$row['id'].'" data-slide-to="'.$i.'" class="active"></li>';
                                }
                                ?>
                              </ol>
                              <!-- Wrapper for slides -->
                              <div class="carousel-inner" role="listbox">

                                <?php
                                  $active  = "active";
                                  while($row1 = $result1->fetch_assoc()){
                                    echo '

                                    <div class="item '.$active.'">
                                      <img src="server/php/files/center/'.$row['id'].'/'.$row1['name'].'" alt="Image">
                                    </div>

                                    ';
                                    $active = "";
                                  }
                                ?>
                              </div>
                              <!-- Left and right controls -->
                              <?php
                                echo '
                                  <a class="left carousel-control" href="#myCarousel'.$row['id'].'" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel'.$row['id'].'" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>

                                  ';
                               ?>
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
          </div>




            <div class="col-sm-3">
              <div class="">
                <div class="box-body box-profile">

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <!-- <b>Followers</b> <a class="pull-right">1,322</a> -->
                      <?php echo '<b>'.$row['name'].'</b>';  ?>
                    </li>
                    <li class="list-group-item">

                        <?php
                            $result1 = $mysqli->query("select * from workstation where center = ".$row['id']." order by square_meter asc LIMIT 1");

                            $min = $result1->fetch_assoc();


                            $result1 = $mysqli->query("select * from workstation where center = ".$row['id']." order by square_meter desc LIMIT 1");

                            $max = $result1->fetch_assoc();
                            echo "P ".money_format("%!n", $min['square_meter'] * $row['rate'] )." - P ".money_format("%!n", $max['square_meter'] * $row['rate'] );

                        ?>



                    </li>
                    <li class="list-group-item">
                      <?php
                          $result1 = $mysqli->query("select * from workstation where center = ".$row['id']);



                          echo $result1->num_rows." Total Workstation";



                      ?>
                    </li>
                    <li class="list-group-item">
                      <?php
                          $result1 = $mysqli->query("select * from workstation where center = ".$row['id']." and isOccupied != '1'");



                          echo $result1->num_rows." Available  Workstation";



                      ?>
                    </li>
                  </ul>

                  <?php echo '<a id="'.$row['id'].'" class="btn btn-primary btn-block btnInquire"><b>Inquire</b></a>'; ?>
                </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>

      <script>
        <?php echo 'googleMap("mapDiv'.$row['id'].'",'.$row['latitude'].','.$row['longitude'].',"'.$contentString.'");'  ?>


      </script>



      <?php

    }


    $mysqli->close();



?>
<div id="modal_inquire" class="modal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Inquiry Form</h4>
      </div>
      <!--modal header-->
      <div class="modal-body">

        <form id="inquireForm">
                                                      <input type=text id ="modal_center_id" name ="modal_center_id" hidden>
        <div class="pad" id="infopanel"></div>
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3  control-label">Workstation</label>

              <div id="workstation_select" class="col-sm-6">



              </div>

          </div>
          <div class="form-group">
            <label class="col-sm-3  control-label">Firstname</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="firstname" placeholder="Firstname" name="firstname">
              </div>
          </div>
<div class="form-group">
            <label class="col-sm-3  control-label">Lastname</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-3  control-label">Company Name</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="company" name="company" placeholder="Company Name">
                </div>
            </div>
          <div class="form-group">
            <label class="col-sm-3  control-label">City</label>

              <div class="col-sm-3">

                <select class = "form-control" id="city" name = "city">
                  <option value="">Select City</option>

                <?php
                    include "serverDetails.php";

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
            <label class="col-sm-3  control-label">Message/Concerns</label>
            <div class="col-sm-9">
                <textarea class="form-control" rows="3" id="message" name="message" placeholder="Write Here"></textarea>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3  control-label"></label>
            <div class="col-sm-9">
              <button type="submit" name="submit" class="btn btn-primary " id="btnSend"><i class="fa fa-send"></i> Send</button></div>
          </div>
        </div>
        <!--modal footer-->


      </div>
      <!--modal-content-->
    </div>
    <!--modal-dialog modal-lg-->
  </div>
  <!--form-kantor-modal-->
</div>
