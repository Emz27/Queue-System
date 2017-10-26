<?php
$openedMonth = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
$openedMonth_result = $mysqli->query('select month(open_date) as month, count(*) as open, year(open_date) as year
     from center
      where year(open_date) = year(now()) and cancel_date is null
      group by month
     order by month asc');
 while($openedMonth_row = $openedMonth_result->fetch_assoc()){
   $openedMonth[$openedMonth_row['month']] = $openedMonth_row['open'];
 }
?>
<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">(Monthly) Opened Centers by Project Owner </h3>
              <div>

              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <div class="row">
            <div class="col-md-8">
              <div class="col-md-12">
                <p class="text-center">
                  <strong id="opened_center_graph_label_project_owner"></strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="openedLine_project_owner" style="height: 200px; width: 401px;" height="127" width="441"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <div class="col-md-12">
                <form id="opened_center_graph_form_project_owner">
                  <label class="col-md-1">Select</label>
                  <div class="col-md-4">
                    <select class="form-control" name="project_owner">
                      <option value="" selected>Select Project Owner</option>
                      <?php
                          $project_owner = $mysqli->query("select * from user");

                          while($row = $project_owner->fetch_assoc()){
                            echo '<option value="'.$row['id'].'">'.$row['firstname']." ".$row['lastname'].'</option>';
                          }

                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" name="year1_project_owner">
                      <option value="" selected>Select Year 1</option>
                      <?php
                        for( $i = 0 ; $i <= 3 ; $i++){
                          $date=date_create();
                          date_sub($date,date_interval_create_from_date_string($i." years"));
                          echo "<option value='".date_format($date,"Y")."'>".date_format($date,"Y")."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" name="year2_project_owner">
                      <option value= "" selected>Select Year 2</option>
                      <?php
                        for( $i = 0 ; $i <= 3 ; $i++){
                          $date=date_create();
                          date_sub($date,date_interval_create_from_date_string($i." years"));
                          echo "<option value='".date_format($date,"Y")."'>".date_format($date,"Y")."</option>";
                        }
                      ?>
                    </select>
                  </div>
                </form>
                <div class="col-md-1">
                  <button id="opened_center_graph_btn_project_owner" type="button" class="btn btn-flat"><i class="fa fa-refresh col-md-12"></i></button>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div id="opened_center_graph_table_project_owner" class="col-md-4">

            </div>
            <!-- /.col -->
          </div>


            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>

<script>

$(document).ready(function(){







  // Opened Centers Line Chart
    // Get context with jQuery - using jQuery's .get() method.
    var openedChartCanvas_project_owner = $("#openedLine_project_owner").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var openedChart_project_owner = new Chart(openedChartCanvas_project_owner);
    var openedChartData_project_owner = {
      labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
      datasets: [
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $openedMonth[1].",".$openedMonth[2].",".$openedMonth[3].",".$openedMonth[4].",".$openedMonth[5].",".
  					$openedMonth[6].",".$openedMonth[7].",".$openedMonth[8].",".$openedMonth[9].",".$openedMonth[10].",".$openedMonth[11].",".$openedMonth[12]; ?>]
        }
      ]
    };

    var openedChartOptions_project_owner = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: false,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: false,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    //openedChart_project_owner.Line(openedChartData_project_owner, openedChartOptions_project_owner);

    $(document).on("click","#opened_center_graph_btn_project_owner",function(){

      $.post("pages/dashboard/opened_centers_project_owner_load.php", $("#opened_center_graph_form_project_owner").serialize(), function(data) {

        var data = jQuery.parseJSON(data);

        $("#opened_center_graph_table_project_owner").html(data.table);
        $("#opened_center_graph_label_project_owner").html("Open Centers: "+data.year1+" and "+data.year2);

        var openedChartData_project_owner = {
          labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
          datasets: [
            {
              label: data.year1,
              fillColor: "rgba(255, 0, 0, 0.9)",
              strokeColor: "rgba(255, 0, 0, 0.8)",
              pointColor: "rgba(255, 0, 0, 1)",
              pointStrokeColor: "rgba(255, 0, 0, 1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(255, 0, 0, 1)",
              data: data.data1
            },
            {
              label: data.year2,
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: data.data2
            }
          ]
        };
        //Create the line chart
        openedChart_project_owner.Line(openedChartData_project_owner, openedChartOptions_project_owner);

      });




    });








});
</script>
