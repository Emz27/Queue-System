


<div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 id="city_header" class="box-title">Center Inquiries by City</h3>

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
                    <canvas id="city_pie_inquiry" height="89" width="157" style="width: 314px; height: 178px;"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <ul class="chart-legend clearfix">
                    <table id="city_table" class="col-md-12">
                          <!--  CONTENT HERE -->
                          <tr ><th class="text-center">City Name<br/><sub>(click City Name for Inquiry Breakdown)</sub></th><th class="text-center">Inquiries</th></tr>
                          <?php
                               $i=0;
                                $total = $mysqli->query("select count(inquire.id) as count, city.id as city_id, city.description as description from city
                                      inner join center on center.city  = city.id
                                      inner join workstation on workstation.center = center.id
                                      left join inquire on inquire.workstation = workstation.id
                                      group by city.id");

                                      echo $mysqli->error;
                                while($row = $total->fetch_assoc()){
                                  $i++;
                                  echo '<tr class="city_click_inquiry" city="'.$row['city_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i><a> '.$row['description'].'</li></td><td class="text-center">'.$row['count'].'</a></td></tr>';
                                }


                          ?>
                    </table>
                  </ul>
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->

            <!-- /.footer -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
       </div>
<div id="center_inquiry_container" class="col-md-6">


</div>


<script>
$(document).ready(function(){



  var pieChartCanvas_inquiry = $("#city_pie_inquiry").get(0).getContext("2d");
  var pieChart_inquiry = new Chart(pieChartCanvas_inquiry);
  var PieData_inquiry = [

    <?php
         $i=0;
          $total = $mysqli->query("select count(inquire.id) as count, city.id as city_id, city.description as description from city
                inner join center on center.city  = city.id
                inner join workstation on workstation.center = center.id
                left join inquire on inquire.workstation = workstation.id
                group by city.id");
          while($row = $total->fetch_assoc()){
            $i++;
            //echo '<tr class="city_click" city="'.$row['city_id'].'"><td><li><i class="fa fa-circle-o" style="color:'.$color[$i].'"></i> '.$row['description'].'</li></td><td class="text-city">'.$row['count'].'</td></tr>';

            echo 	'{
                  value: '.$row['count'].' ,
                  color: "'.$color[$i].'",
                  highlight: "'.$color[$i].'",
                  label: "'.$row['description'].'"
                }';
            if($i <= $total->num_rows) echo ",";
          }
    ?>
  ];

  var pieOptions_inquiry = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 2,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 0, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart_inquiry.Doughnut(PieData_inquiry, pieOptions_inquiry);


  $(document).on("click",".city_click_inquiry",function(){
    var city_id = $(this).attr("city");
    //alert(city_id);

    var value = {
      city:city_id
    }

    $.post("pages/dashboard/center_inquiry_city_load.php",{"city":city_id},function(data){

        var data = jQuery.parseJSON(data);
        var pie = jQuery.parseJSON(data.pie);


        $('#center_inquiry_container').html(data.container);

        var pieChartCanvas_inquiry = $("#center_pie_inquiry").get(0).getContext("2d");
        var pieChart_inquiry = new Chart(pieChartCanvas_inquiry);
        var PieData_inquiry = pie;

        pieChart_inquiry.Doughnut(PieData_inquiry, pieOptions_inquiry);


    });

  });








});


</script>
