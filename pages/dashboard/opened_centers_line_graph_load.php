<?php

 include "../../serverDetails.php";

$year1 = $_POST['year1'];
$year2 = $_POST['year2'];

//echo date("Y-m-d",strtotime($year2));

$openedMonth1 = array(0,0,0,0,0,0,0,0,0,0,0,0);
$openedMonth2 = array(0,0,0,0,0,0,0,0,0,0,0,0);


$mysqli = new mysqli($host,$uRoot,$pRoot,$database);

$openedMonth_result = $mysqli->query('select month(open_date) as month, count(*) as open, year(open_date) as year
   from center
    where year(open_date) = year("'.$year1."-1-1".'") and cancel_date is null
    group by month
   order by month asc');
while($openedMonth_row = $openedMonth_result->fetch_assoc()){
 $openedMonth1[$openedMonth_row['month'] -1 ] = $openedMonth_row['open'];
}

$openedMonth_result = $mysqli->query('select month(open_date) as month, count(*) as open, year(open_date) as year
    from center
     where year(open_date) = year("'.$year2."-1-1".'") and cancel_date is null
     group by month
    order by month asc');
while($openedMonth_row = $openedMonth_result->fetch_assoc()){
  $openedMonth2[$openedMonth_row['month'] -1 ] = $openedMonth_row['open'];
}


  $data = array();

  $data['year1'] = $year1;
  $data['year2'] = $year2;

  $data['data1'] = $openedMonth1;
  $data['data2'] = $openedMonth2;


  $data['table'] = '
    <table class="table-bordered col-md-12">
      <thead>
        <tr><th rowspan=2 class="text-center">Month</th><th colspan=2 class="text-center">Center</th></tr>
        <tr><th class="text-center">'.$year1.'</th><th class="text-center">'.$year2.'</th></tr>
      </thead>
      <tbody>

      <tr><td>January</td><td class="text-center">'.$openedMonth1[0].'</td><td class="text-center">'.$openedMonth2[0].'</td></tr>
      <tr><td>February</td><td class="text-center">'.$openedMonth1[1].'</td><td class="text-center">'.$openedMonth2[1].'</td></tr>
      <tr><td>March</td><td class="text-center">'.$openedMonth1[2].'</td><td class="text-center">'.$openedMonth2[2].'</td></tr>
      <tr><td>April</td><td class="text-center">'.$openedMonth1[3].'</td><td class="text-center">'.$openedMonth2[3].'</td></tr>
      <tr><td>May</td><td class="text-center">'.$openedMonth1[4].'</td><td class="text-center">'.$openedMonth2[4].'</td></tr>
      <tr><td>June</td><td class="text-center">'.$openedMonth1[5].'</td><td class="text-center">'.$openedMonth2[5].'</td></tr>
      <tr><td>July</td><td class="text-center">'.$openedMonth1[6].'</td><td class="text-center">'.$openedMonth2[6].'</td></tr>
      <tr><td>August</td><td class="text-center">'.$openedMonth1[7].'</td><td class="text-center">'.$openedMonth2[7].'</td></tr>
      <tr><td>September</td><td class="text-center">'.$openedMonth1[8].'</td><td class="text-center">'.$openedMonth2[8].'</td></tr>
      <tr><td>October</td><td class="text-center">'.$openedMonth1[9].'</td><td class="text-center">'.$openedMonth2[9].'</td></tr>
      <tr><td>November</td><td class="text-center">'.$openedMonth1[10].'</td><td class="text-center">'.$openedMonth2[10].'</td></tr>
      <tr><td>December</td><td class="text-center">'.$openedMonth1[11].'</td><td class="text-center">'.$openedMonth2[11].'</td></tr>
      </tbody>
    </table>

    ';

$mysqli->close();
// $datax = array('data' => $data);
echo json_encode($data);

 ?>
