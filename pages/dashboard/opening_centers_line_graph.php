<?php
$openingMonth = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
$openingMonth_result = $mysqli->query('select month(target_date) as month, count(*) as open, year(target_date) as year
     from center
      where year(target_date) = year(now()) and open_date is null and cancel_date is null
      group by month
     order by month asc');
 while($openingMonth_row = $openingMonth_result->fetch_assoc()){
   $openingMonth[$openingMonth_row['month']] = $openingMonth_row['open'];
 }
?>
<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Opening Centers (Monthly)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <div class="row">
            <div class="col-md-9">
              <p class="text-center">
                <strong><?php echo "Opening Centers: Jan,".date("Y")." - Dec,".date("Y"); ?></strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="openingLine" style="height: 116px; width: 401px;" height="127" width="441"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
              <table class="col-md-12">
                <thead>
                  <tr><th class="text-center">Month</th><th class="text-center">Center</th></tr>
                </thead>
                <tbody>

                <tr><td>January</td><td class="text-center"><?php echo $openingMonth[1] ?></td></tr>
                <tr><td>February</td><td class="text-center"><?php echo $openingMonth[2] ?></td></tr>
                <tr><td>March</td><td class="text-center"><?php echo $openingMonth[3] ?></td></tr>
                <tr><td>April</td><td class="text-center"><?php echo $openingMonth[4] ?></td></tr>
                <tr><td>May</td><td class="text-center"><?php echo $openingMonth[5] ?></td></tr>
                <tr><td>June</td><td class="text-center"><?php echo $openingMonth[6] ?></td></tr>
                <tr><td>July</td><td class="text-center"><?php echo $openingMonth[7] ?></td></tr>
                <tr><td>August</td><td class="text-center"><?php echo $openingMonth[8] ?></td></tr>
                <tr><td>September</td><td class="text-center"><?php echo $openingMonth[9] ?></td></tr>
                <tr><td>October</td><td class="text-center"><?php echo $openingMonth[10] ?></td></tr>
                <tr><td>November</td><td class="text-center"><?php echo $openingMonth[11] ?></td></tr>
                <tr><td>December</td><td class="text-center"><?php echo $openingMonth[12] ?></td></tr>
                <tbody>
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
  	  var openingChartCanvas = $("#openingLine").get(0).getContext("2d");
  	  // This will get the first returned node in the jQuery collection.
  	  var openingChart = new Chart(openingChartCanvas);
  	  var openingChartData = {
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
  	        data: [<?php echo $openingMonth[1].",".$openingMonth[2].",".$openingMonth[3].",".$openingMonth[4].",".$openingMonth[5].",".
  						$openingMonth[6].",".$openingMonth[7].",".$openingMonth[8].",".$openingMonth[9].",".$openingMonth[10].",".$openingMonth[11].",".$openingMonth[12]; ?>]
  	      }
  	    ]
  	  };

  	  var openingChartOptions = {
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
  	  openingChart.Line(openingChartData, openingChartOptions);






});



</script>
