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
              <h3 class="box-title">Opened Centers (Monthly)</h3>
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
                  <strong id="opened_center_graph_label"><?php echo "Open Centers: ".date("Y"); ?></strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="openedLine" style="height: 200px; width: 401px;" height="127" width="441"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <div class="col-md-12">
                <form id="opened_center_graph_form">
                  <label class="col-md-1">Year</label>
                  <div class="col-md-5">
                    <select class="form-control" name="year1">
                      <?php
                        for( $i = 0 ; $i <= 3 ; $i++){
                          $date=date_create();
                          date_sub($date,date_interval_create_from_date_string($i." years"));
                          echo "<option value='".date_format($date,"Y")."'>".date_format($date,"Y")."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-5">
                    <select class="form-control" name="year2">
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
                  <button id="opened_center_graph_btn" type="button" class="btn btn-flat"><i class="fa fa-refresh col-md-12"></i></button>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div id="opened_center_graph_table" class="col-md-4">
              <table class="table-bordered col-md-12">
                <thead>
                  <tr><th  class="text-center">Month</th><th class="text-center">Center</th></tr>
                </thead>
                <tbody>

                <tr><td>January</td><td class="text-center"><?php echo $openedMonth[1] ?></td></tr>
                <tr><td>February</td><td class="text-center"><?php echo $openedMonth[2] ?></td></tr>
                <tr><td>March</td><td class="text-center"><?php echo $openedMonth[3] ?></td></tr>
                <tr><td>April</td><td class="text-center"><?php echo $openedMonth[4] ?></td></tr>
                <tr><td>May</td><td class="text-center"><?php echo $openedMonth[5] ?></td></tr>
                <tr><td>June</td><td class="text-center"><?php echo $openedMonth[6] ?></td></tr>
                <tr><td>July</td><td class="text-center"><?php echo $openedMonth[7] ?></td></tr>
                <tr><td>August</td><td class="text-center"><?php echo $openedMonth[8] ?></td></tr>
                <tr><td>September</td><td class="text-center"><?php echo $openedMonth[9] ?></td></tr>
                <tr><td>October</td><td class="text-center"><?php echo $openedMonth[10] ?></td></tr>
                <tr><td>November</td><td class="text-center"><?php echo $openedMonth[11] ?></td></tr>
                <tr><td>December</td><td class="text-center"><?php echo $openedMonth[12] ?></td></tr>
                </tbody>
              </table>



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
    var openedChartCanvas = $("#openedLine").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var openedChart = new Chart(openedChartCanvas);
    var openedChartData = {
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

    var openedChartOptions = {
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
    openedChart.Line(openedChartData, openedChartOptions);

    $(document).on("click","#opened_center_graph_btn",function(){

      $.post("pages/dashboard/opened_centers_line_graph_load.php", $("#opened_center_graph_form").serialize(), function(data) {

        var data = jQuery.parseJSON(data);

        $("#opened_center_graph_table").html(data.table);
        $("#opened_center_graph_label").html("Open Centers: "+data.year1+" and "+data.year2);

        var openedChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
          datasets: [
            {
              label: data.year1,
              fillColor: "rgba(255, 0, 0, 0.9)",
              strokeColor: "rgba(255, 0, 0, 0.8)",
              pointColor: "rgba(255, 0, 0, 0.9)",
              pointStrokeColor: "rgba(255, 0, 0, 0.9)",
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
        openedChart.Line(openedChartData, openedChartOptions);

      });




    });








});
</script>
