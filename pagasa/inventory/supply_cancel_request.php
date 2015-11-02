<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/inventory_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<script>
	window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload();
				}
	</script>
<?php 
include("../db/db.php");
include('../actions/user_priviledges.php');

@session_start(); 
if(!isset($_SESSION['username'])){
	header("Location: ../restrict.php");
}

$developer = is_privileged($_SESSION['account_no'], 1);
$super_admin = is_privileged($_SESSION['account_no'], 2);
$supply_admin = is_privileged($_SESSION['account_no'], 9);
$supply_officer = is_privileged($_SESSION['account_no'], 16);

if(!$developer && !$super_admin && !$supply_admin && !$supply_officer)
{
	header("Location: ../restrict.php");
}

?>

  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
    <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  <link href="../css/custom.css" rel="stylesheet" />
  
  <link href="css/social-icons.css" rel="stylesheet" />
  <link href="css/styled-elements.css" rel="stylesheet" />

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">

  </style>
  <style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
  </style>
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>



<body>

<div class="navbar navbar-inverse"  style="height:25px;">
<div id="overlay" >
</div>
    
    
    
  <div id="head" class="navbar-inner navbar-fixed-top" >
		
		<div class="container" >
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="../home.php">
				Pagasa National Highschool <sup>2.0.1</sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="../actions/logoutprocess.php">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			    <!--
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
				-->
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    

    
<div class="subnavbar">
    <div class="hide">
    <img src="../images/banner.jpg">
    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
                
                
			</a><!-- InstanceBeginEditable name="navbar" -->
			<div class="subnav-collapse collapse">
			  <ul class="mainnav">
			    <li> <a href="../inventory/inv_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
                <li> <a href="../inventory/inv_mr_records.php" > <i class="shortcut-icon icon-file-alt"></i> <span class="shortcut-label">MR Records</span></a></li>
			    <li> <a href="../inventory/equipment_list.php" > <i class="shortcut-icon icon-briefcase"></i> <span class="shortcut-label">Equipments</span></a></li>
			    <li class="active"> <a href="../inventory/supply_list.php" > <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Supplies</span></a></li>
			    <li> <a href="../inventory/inv_units.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Units</span></a></li>
                <li> <a href="../inventory/inv_supplier.php" > <i class="shortcut-icon icon-shopping-cart"></i> <span class="shortcut-label">Supplier</span></a></li>
			    <li> <a href="../inventory/inv_reports.php" > <i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span></a></li>
		      </ul>
		    </div>
			<!-- InstanceEndEditable -->
            
            
            <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse hidden">
	
  <div class="navbar-inner" style="padding:0; padding-left:100px;background-color:#0C0; color:#000;">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
				
			
		  <div class="nav-collapse collapse">
		    <ul class="nav pull-left blck">
					<li class="active">
						
						<a href="#" >
							<i class="icon-lock"></i>
							Security
						</a>
						
						
					</li>
                    <li >
						
						<a href="#">
							<i class="icon-picture"></i>View</a>
						
						
					</li>
                    
                    <li >
						
						<a href="#" style="color:#000000;">
							<i class="icon-cog"></i>
							Settings
						</a>
						
						
					</li>
			  </ul>
		    </form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div>

<!--/smaller navbar-->

<div class="main">



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
	
	
	<!-- InstanceBeginEditable name="main" -->
<?php
error_reporting(0);
include ('../db/db.php');
if ($_GET['sd_id']) {	  
$sd_id = $_GET['sd_id'];	
	  	$data = "SELECT * FROM inventory_stock_t, supply_category_t, inventory_item_t, supply_type_t, unit_t, supply_distribution_t, supply_record_t, employee_t
				WHERE inventory_stock_t.stock_no = supply_record_t.stock_no
				AND inventory_stock_t.detail_no = supply_category_t.detail_no
				AND inventory_stock_t.unit_no = unit_t.unit_no
				AND supply_category_t.item_no = inventory_item_t.item_no
				AND inventory_stock_t.type_no=supply_type_t.type_no
				AND supply_distribution_t.emp_id = employee_t.emp_id
				AND supply_distribution_t.record_id = supply_record_t.record_id
				AND supply_distribution_t.sd_id = '$sd_id'";
	  		$res = mysql_query($data);
			$row = mysql_fetch_array($res);
			$stock_no = $row["stock_no"];			
			$q = mysql_query("SELECT * FROM supply_distribution_t WHERE sd_id = '$sd_id' ");
			$row1 = mysql_fetch_array($q);
			
	
?>    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-remove-sign"></i><h3>CANCEL REQUEST</h3></div>
        <!-- /widget-header -->
        <div class="widget-content">
        
        <div id="demo" style="min-height:400px;">
        
        <?php
			echo '<h5 class="alert alert-danger">';
			echo "Employee Name: ";
			echo "".strtoupper($row['f_name'])." ".strtoupper($row['m_name'])." ".strtoupper($row['l_name'])."";
			echo "<br> <br>";
			echo "Cancel the request of ";
			echo ucfirst($row1["quantity"]); echo " ";
			//echo "<input type='text' name='quantity' placeholder='".$row['quantity']."' value='".$row['quantity']."' style='width:30px'>"." ";
			echo strtoupper($row["unit_type"]); echo " of ";
			echo strtoupper($row["description"]); echo " ";
			echo strtoupper($row["category"]); echo " ";
			echo strtoupper($row["item_name"]); echo " ";
			echo '</h5>'; 
		?>
        


	<form method="post" action="actions/supply_cancel_request_action.php?sd_id=<?php echo $row["sd_id"];?>">
    <h4>Send a Message</h4> 
    <textarea name="message" cols="500" rows="10" style="width:500px" placeholder="Reason why to cancel the request of item supply?"></textarea>
    <br>
	<input name="submit" type="submit" class="btn btn-danger" value="Send Message">
	</form>
            
          </div>
        
        </div>
        <!-- /widget-content -->
      </div>

<?php } ?>
      <!-- /span6 -->
    <!-- InstanceEndEditable -->
    
    
    
      
    <!-- /span6 -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /main --><!-- /extra -->


    
    
<div class="footer">
		
	<div class="container">
		
	  <div class="row">
			
		<div id="footer-copyright" class="span6">
				&copy; 2012-13 BSIT-3C.
		</div> <!-- /span6 --><!-- /.span6 -->
			
	  </div> 
		<!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->

<!-- InstanceBeginEditable name="extra" -->
     
<!-- InstanceEndEditable -->


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/charts/area.js"></script>
<script src="../js/charts/donut.js"></script>
<script type="text/javascript">
$(window).scroll(function() {

    //After scrolling 100px from the top...
    if ( $(window).scrollTop() >= 100 && false ) {
        //$('#head').css('display', 'none');
		//$('#small-head').css('position','fixed');

        //$('#menuheader').css('margin', '65px auto 0');

    //Otherwise remove inline styles and thereby revert to original stying
    } else {
        $('#head').attr('style', '');
		$('#small-head').attr('style', '');

    }
});

$(window).load(function(){
   
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   
   $('#overlay').fadeOut();

});
</script>

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

  </body>
<!-- InstanceEnd --></html>
