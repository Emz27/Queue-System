

<?php
	//session_start();
	// admin main sidebar dashboard page

	// custom function for retrieving current table rows


	function tableRow($tableName, $condition){
		include "serverDetails.php";
		$conn = new mysqli($host,$uRoot,$pRoot, $database);

		if($condition == 1){

			if($result = $conn->query("select * from ".$tableName." inner join user on user.id = ".$tableName.".id")){
			$num_rows = $result->num_rows;
			$result->close();

			return $num_rows;
			}
			return "error1";
		}
		else{
			if($result = $conn->query("select * from ".$tableName)){
			$num_rows = $result->num_rows;
			$result->close();

			return $num_rows;
			}
			return "error0";

		}


	}
?>
	<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["firstname"].' '.$_SESSION["lastname"]; ?></p>
          <!-- Status -->
          <a ><?php echo $_SESSION["user_type_description"]; ?></a>
        </div>
      </div>

      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      search form -->

      <!-- Sidebar Menu -->

      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a id="home"><i class="fa fa-home"></i> <span>Home</span></a></li>
				<li class = ""><a id="dashboard_project_owner" ><i class="fa  fa-bookmark"></i> <span>My Projects</span></a></li>
				<?php
					if($_SESSION['user_type_description'] != "Project Owner")		echo '<li class = ""><a id="dashboard_manager" ><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>';
				?>

				<?php
					//if($_SESSION['user_type_description'] == "Administrator") echo '<li class = ""><a id="dashboard_administrator" ><i class="fa fa-dashboard"></i> <span>Administrator Dashboard</span></a></li>';
				?>
				<?php
					if($_SESSION['user_type_description'] != "Project Owner"){

						echo '

							<li class = ""><a id="inquire" ><i class="fa  fa-comments"></i> <span>Customer Inquiries</span></a></li>
							<li class = ""><a id="center" ><i class="fa fa-building"></i> <span>Centers</span></a></li>
						';

					}
				?>


				<?php
					if($_SESSION['user_type_description'] != "Project Owner")		echo '<li class = ""><a id="member" ><i class="fa fa-group"></i> <span>Users</span></a></li>';
				?>
				<?php

			if($_SESSION['user_type_description'] == "Administrator"){

		?>
		<li class="header">Admin Panel</li>
		<li class="treeview">
          <a id="usercontrol" href="#"><i class="fa fa-user-plus"></i> <span>User Controls</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu active" >
			<li><a id="datatable_user"  >User Accounts<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("user",0); ?></span></span></a></li>

						<li><a id="datatable_changepassword"  >Change Account Password</a></li>
          </ul>
        </li>
        <li id="#datatable_treeview" class="treeview">
          <a id="datatable" href="#"><i class="fa fa-database"></i> <span>Data Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul id="#datatable_treeview_menu" class="treeview-menu active" >

            <!--<li><a id="datatable_user" href="#" >Users<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("user",0); ?></span></span></a></li>-->
      <li><a id="datatable_user_type">User Types<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("user_type",0); ?></span></span></a></li>
			<li><a id="datatable_center_type">Center Types<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("center_type",0); ?></span></span></a></li>
			<li><a id="datatable_agreement_type">Agreement Types<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("agreement_type",0); ?></span></span></a></li>
			<li><a id="datatable_commercial_term">Commercial Terms<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("commercial_term",0); ?></span></span></a></li>
			<li><a id="datatable_growth_type">Growth Types<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("growth_type",0); ?></span></span></a></li>
			<li><a id="datatable_region">Regions<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("region",0); ?></span></span></a></li>
			<li><a id="datatable_city">Cities<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("city",0); ?></span></span></a></li>
			<li><a id="datatable_cancel_reason">Cancel Reasons<span class="pull-right-container"><span class="label label-primary pull-right"><?php echo tableRow("cancel_reason",0); ?></span></span></a></li>
          </ul>
        </li>
				<?php
			}

				?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


	<script>



		function setActive( id ){


			$(id).parent().addClass("active");



			if($( "#dashboard" ).parent().hasClass("active") && "#dashboard" != id){
					$( "#dashboard" ).parent().removeClass("active");
			}
			if($( "#home" ).parent().hasClass("active") && "#home" != id){
					$( "#home" ).parent().removeClass("active");
			}
			if($( "#datatable" ).parent().hasClass("active")){
					//$( "#datatable" ).trigger( "click" );
			}
			if($( "#usercontrol" ).parent().hasClass("active")){
					//$( "#usercontrol" ).trigger( "click" );
			}
		}


		$( document ).ready(function () {

			// $("#home").click(function(){
			//
			// 	setActive("#home");
			// 	$( "#content" ).load( "home.php");
			//
			// });
			//
			// $("#dashboard").click(function(){
			//
			// 	setActive("#dashboard");
			// 	$( "#content" ).load( "dashboard.php");
			//
			// });

			//$( '#datatable_treeview' ).trigger( 'click' );
		});

	</script>
