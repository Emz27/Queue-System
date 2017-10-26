<?php

    $string ='<select class = "form-control" id="workstation" name = "workstation">
      <option value="">Select Workstation</option>';
    if(isset($_POST['center_id'])){

      include "serverDetails.php";


      $mysqli = new mysqli($host, $uRoot, $pRoot, $database);
      if($mysqli->connect_error){
          die("Connect Error: ". $mysqli->connect_error);
      }
      $result = $mysqli->query("select * from workstation where center ='".$_POST['center_id']."'" );


      //echo $_POST['center_id'] ."hello";

      //echo $mysqli->error;
      $i = 0;

      while($row = $result->fetch_assoc()){
        //echo "<option value='".$row["cityid"]."'>".$row["citydescription"].", ".$row["regiondescription"]."</option>";

        $i ++;
        if($row['isOccupied'] == "1") continue;
        $string .= "<option value='".$row["id"]."'>Workstation ".$i."</option>";
      }
      $mysqli->close();




      //echo $string;
    }
    $string .= "</select>";

    echo $string ;
?>
<!-- <select class = "form-control" id="numberCity" name = "city">
  <option value="">Select Workstation</option>


</select> -->
