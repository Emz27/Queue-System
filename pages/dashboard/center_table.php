<?php






function getStatus(){
  if(strtotime($GLOBALS['cancel_datetime'])>=1){
    return "Cancelled";
  }
  else if(strtotime($GLOBALS['open_datetime'])>=1){
    return "Opened";
  }
  else if(strtotime($GLOBALS['commence_datetime'])>=1){
    return "Construction";
  }
  else if(strtotime($GLOBALS['execute_datetime'])>=1){
    return "Lease Executed";
  }
  else if(strtotime($GLOBALS['approve_datetime'])>=1){
    return "IC Approved";
  }
  else if(strtotime($GLOBALS['submit_datetime'])>=1){
    return "IC Submitted";
  }
  else if(strtotime($GLOBALS['sign_datetime'])>=1){
    return "Intent Signed";
  }
  else if(strtotime($GLOBALS['entry_datetime'])>=1){
    return "New Entry";
  }
  else{
    return "error";
  }
}

 ?>




<div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 id="city_header" class="box-title">Center Table</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Center Name</th>
                      <th>Status</th>
                      <th>Project Owner</th>
                      <th>City</th>
                      <th>Growth Type</th>
                      <th>Legal Agreement Type</th>
                      <th>Commercial Term</th>
                      <th>Center Type</th>
                      <th>Search Inquiry</th>
                      <th>Letter of Intent Signed</th>
                      <th>Date IC Submitted</th>
                      <th>Date Lease Signed</th>
                      <th>Construction Started</th>
                      <th>Target Opening Date</th>
                      <th>Opened Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = $mysqli->query("SELECT center.id as id,center.name as name, concat(user.firstname+' '+user.lastname) as project_owner ,
                                  city.description as city, growth_type.description as growth_type, agreement_type.description as agreement_type,
                                  commercial_term.description as commercial_term, center_type.description as center_type, center.search_inquiry_date as search_inquiry_date,
                                  center.sign_date as sign_date, center.submit_date as submit_date, center.approve_date as approve_date, center.commence_date as commence_date,
                                  center.target_date as target_date, center.open_date as open_date from center inner join user on user.id = center.project_owner
                                  inner join city on city.id = center.city inner join growth_type on growth_type.id = center.growth_type inner join agreement_type on agreement_type.id = center.agreement_type
                                  inner join commercial_term on commercial_term.id = center.commercial_term inner join center_type on center_type.id = center.center_type
                                  where center.cancel_date is null");




                    while($query_row = $query->fetch_assoc()){

                      echo '
                      <tr>
                        <td>'.$query_row['id'].'</td>
                        <td>'.$query_row['name'].'</td>
                        <td>Status</td>
                        <td>'.$query_row['project_owner'].'</td>
                        <td>'.$query_row['city'].'</td>
                        <td>'.$query_row['growth_type'].'</td>
                        <td>'.$query_row['agreement_type'].'</td>
                        <td>'.$query_row['commercial_term'].'</td>
                        <td>'.$query_row['center_type'].'</td>
                        <td>'.$query_row['search_inquiry_date'].'</td>
                        <td>'.$query_row['sign_date'].'</td>
                        <td>'.$query_row['submit_date'].'</td>
                        <td>'.$query_row['execute_date'].'</td>
                        <td>'.$query_row['commence_date'].'</td>
                        <td>'.$query_row['target_date'].'</td>
                        <td>'.$query_row['open_date'].'</td>
                      </tr>
                      ';
                    }










                  ?>
                </tbody>
              </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div>


              </div>
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
       </div>



<script>
$(document).ready(function(){
  $('#example').DataTable( {
          "scrollY": 200,
          "scrollX": true
      } );
});
</script>
