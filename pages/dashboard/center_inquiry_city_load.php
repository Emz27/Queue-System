<?php

 include "../../serverDetails.php";
 $color= array("#4169e1","#404040","#ff4444","#000080","#6dc066","#6897bb","#8a2be2","#31698a","#191970","#3399ff",
               "#3b5998","#ffff66","#794044","#ccff00","#999999","#cc0000","#b6fcd5","#c39797","#ff7f50","#8b0000",
               "#0099cc","#a0db8e","#dddddd","#ffdab9","#ff4040","#0e2f44","#00ff7f","#c0d6e4","#daa520","#b4eeb4",
               "#66cccc","#cbbeb5","#afeeee","#808080","#81d8d0","#660066","#008000","#ff00ff","#990000","#f5f5f5",
               "#ffff00","#fff68f","#f08080","#66cdaa","#ffb6c1","#ff6666","#088da5","#800000","#468499","#20b2aa");
$city = $_POST['city'];


$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

  $data = array();

  $table ="";
  $data['city_name'] = "";
  $i=0;
   $total = $mysqli->query("select count(inquire.id) as count, city.id as city_id,center.id as center_id, city.description as city_name , center.name as center_name from city
         inner join center on center.city  = city.id
         inner join workstation on workstation.center = center.id
         left join inquire on inquire.workstation = workstation.id
         where city.id = '".$city."'
         group by center.id");

         echo $mysqli->error;
   while($row = $total->fetch_assoc()){
     $i++;
     $data['city_name'] = $row['city_name'];
     $table .= '<tr class="center_click_inquiry" city="'.$row['center_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i> '.$row['center_name'].'</li></td><td class="text-center">'.$row['count'].'</td></tr>';
   }



    $string = '<div class="box box-default">
      <div class="box-header with-border">
        <h3 id="city_header" class="box-title">Center Inquiries by City : '.$data['city_name'].'</h3>

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
              <canvas id="center_pie_inquiry" height="89" width="157" style="width: 314px; height: 178px;"></canvas>
            </div>
            <!-- ./chart-responsive -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="chart-legend clearfix">
              <table id="city_table" class="col-md-12">
                    <!--  CONTENT HERE -->
                    <tr ><th class="text-center">Center Name</th><th class="text-center">Inquiries</th></tr>';



    $string .=$table;



    $string .= '</table>
            </ul>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->

      <!-- /.footer -->
    </div>';

    $data['container'] = $string;

    $data['pie'] = '[';

           $i=0;
            $total = $mysqli->query("select count(inquire.id) as count, city.id as city_id,center.id as center_id, city.description as city_name , center.name as center_name from city
                  inner join center on center.city  = city.id
                  inner join workstation on workstation.center = center.id
                  left join inquire on inquire.workstation = workstation.id
                  where city.id = '".$city."'
                  group by center.id");
            while($row = $total->fetch_assoc()){
              $i++;
              //echo '<tr class="city_click" city="'.$row['city_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i> '.$row['description'].'</li></td><td class="text-city">'.$row['count'].'</td></tr>';

              $data['pie']	.='{
                    "value": '.$row['count'].' ,
                    "color": "'.$color[$i].'",
                    "highlight": "'.$color[$i].'",
                    "label": "'.$row['center_name'].'"
                  }';
              if($i < $total->num_rows) $data['pie']	.= ",";
            }

    $data['pie'] .= ']';

$mysqli->close();
// $datax = array('data' => $data);
echo json_encode($data);

 ?>
