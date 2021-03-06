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


<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
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
                <li class="active"> <a href="../inventory/inv_mr_records.php" > <i class="shortcut-icon icon-file-alt"></i> <span class="shortcut-label">MR Records</span></a></li>
			    <li> <a href="../inventory/equipment_list.php" > <i class="shortcut-icon icon-briefcase"></i> <span class="shortcut-label">Equipments</span></a></li>
			    <li> <a href="../inventory/supply_list.php" > <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Supplies</span></a></li>
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
        <div class="widget-content">
                    <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th width="80%"><i class="icon-file-alt"></i> MEMORANDOM OF RECEIPT</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                <table width="100%" align="center">

        </table>
           <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>Property No.</th>
		         		<th>Item</th>
            	 		<th>Name of Employee</th>
             	 		<th>Date Borrowed</th>
                 		<th>Status</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					
					include('../db/db.php');
					mysql_query("START Transaction");
					mysql_query("Auto-Commit = 'OFF'");
					$qry = mysql_query("SELECT * FROM equipment_property_t");
				    while($row = mysql_fetch_array($qry)){
						$property_no = $row['property_no'];
						$stock_no = $row['stock_no'];
						$date_acquired = $row['date_acquired'];
						$status = $row['status'];
					   
					 $query =mysql_fetch_array( mysql_query("SELECT * FROM equipment_item_t, equipment_color_t WHERE equipment_item_t.stock_no='$stock_no' 
																AND equipment_item_t.color_id = equipment_color_t.color_id"));
				        $em_id = $query['item_id'];
						$category_id = $query['category_id'];
						$specs=$query['specs'];
						$color1=$query['color_name'];
					      
						$query1 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_category_t WHERE category_id='$category_id'"));
				  		$item_name=$query1['item_name'];
						
						$query2 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_category_detail WHERE category_id='$category_id'"));
				  		$category=$query2['category'];
						
					
						
                      
						$emp_id= $row ['emp_id'];
						$id=$row['property_no']; 
						$row4 = mysql_query("SELECT * from employee_t WHERE emp_id = '$emp_id'");
						$row5 = mysql_fetch_array($row4);
						 mysql_query("Commit");
                       
						?>
                            <td width="100" height="31"  align="center"><div align="center" class="style3"><?php echo $row["property_no"]; ?></div></td>
							<td align="center">
							<a class="style3" onClick="window.open('inv_view_item.php?stock_no=<?php echo $row["stock_no"]; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=600,position=center');">
							<?php echo $specs." ".ucfirst($color1)." ".ucfirst($category)." ".ucfirst($item_name); ?></a></td>
                            <td align="center"><span class="style3"><?php echo ucfirst($row5["f_name"]." ".$row5["m_name"]." ".$row5["l_name"]); ?></span></td>	
                            <td align="center"><span class="style3"><?php echo "$date_acquired" ; ?></span></td>
                            <td align="center"><span class="style3"><?php echo ucfirst("$status"); ?></span></td>
                      

                           
                            </td>
                            
                        </tr>
                  <?php } ?>
                </tbody>
		</table>
            
          </div>
                </th>
                <th style="background-color:#F0F0F0">
                
                  <a class="btn btn-block" href="../inventory/inv_make_mr.php"><i class="icon-pencil"></i>   Create MR</a>
                  <a class="btn btn-block" href="../inventory/inv_mr_records.php"><i class=" icon-file-alt"></i>   M.R. Records</a>
                  <a class="btn btn-block" href="../inventory/equipment_logs.php"><i class="icon-user"></i>  Transaction Logs</a>
                  
                  <form method="post" action="inv_mr_records.php" class="form-horizontal">
                        <div align="center">
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <h4> <i class="icon-search"> </i>Serial Tracker</h4>
                        
                        <p>
			      		    <input name="serial_no" type="text" placeholder="Enter Serial Number" style="width:160px">
			      		  </p>
			      		  <p>&nbsp; </p>
			      		  <p>
			      		    <input class="btn btn" name="submit" type="submit" value="SEARCH">
	      		          </p>
			      		</div>
                   </form> 
                   <?php
				   error_reporting(0);
					require "../db/db.php";
					if($_POST['submit']){
					$serial_no = mysql_real_escape_string($_POST['serial_no']);	
					$query = mysql_query("SELECT * FROM equipment_serial_t WHERE serial_no='$serial_no'");
					$row = mysql_fetch_array($query);
					$id = $row['id'];
					
					if(mysql_num_rows($query)==0){
							echo "<div class='alert alert-warning'>";	
							echo "No serial number!";	
							echo "</div>";
						}	
						else if($serial_no) {
							echo "<script>window.location='equipment_serial.php?id=$id';</script>";
						} 
						else {
							echo "<div class='alert alert-warning'>";	
							echo "Serial field is empty!";	
							echo "</div>";
						}
				}
				   ?>

                </th>
              </tr>
            </tbody>
          </table>
        <!-- /widget-content -->
      </div>
    
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
