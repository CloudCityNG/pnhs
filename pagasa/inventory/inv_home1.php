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
.style8 {color: #000000}
.style9 {color: #FF0000}
.style10 {font-size: 14px}
.style11 {color: #000000; font-size: 14px; }
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
			    <li class="active"> <a href="../inventory/inv_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
                <li> <a href="../inventory/inv_mr_records.php" > <i class="shortcut-icon icon-file-alt"></i> <span class="shortcut-label">MR Records</span></a></li>
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
<div class="main">
   <div class="container">
      <div class="row">
                
        <div class="span6">
      		<div class="widget stacked"><br>
				<div class="widget-header"><i class="icon-home"></i><h3>HOME</h3></div> <!-- /widget-header -->
				<div class="widget-content">
					
				<div class="shortcuts">
                <h4 align="center"><strong>WELCOME TO INVENTORY SYSTEM</strong></h4>
                <p>&nbsp;</p>

            <table class="table table-bordered" width="100%">
 
            <tbody>
                <thead>
                    <tr>
                        <th colspan="4"><div align="center">EQUIPMENT</div></th>
                    </tr>
                </thead>
                <tbody>
                
                  <tr>
				    <td><h6 align="center"><br><a href="equipment_logs.php"><img src="img/cart_out.png"><br>
                    Borrowed Items:</a>
              		<?php
					include "../db/db.php";
					$co = mysql_query("SELECT property_no FROM equipment_property_t WHERE status='borrowed'");
					$c = mysql_num_rows($co);
					echo $c; 
					?></h6>                    
                    </td>
                    <td><h6 align="center"><br><a href="inv_mr_returned.php"><img src="img/cart_in.png"><br>
                    Returned Items: </a>
              		<?php
					include "../db/db.php";
					$co = mysql_query("SELECT property_no FROM equipment_property_t WHERE status='returned'");
					$c = mysql_num_rows($co);
					echo $c; 
					?></h6>                   
                    </td>
                    <td><h6 align="center"><br><a href="equipment_list.php"><img src="img/cargo.png"><br>
                    Stocks: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT stock_no FROM equipment_record_t");
						$c = mysql_num_rows($co);
						echo $c; 
					?></h6>                    
                    </td>
				    <td><h6 align="center"><br><a href="equipment_items.php"><img src="img/lightbulb.png"><br>
                    Items: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT category_id FROM equipment_category_t");
						$c = mysql_num_rows($co);
						echo $c; 
					?></h6>                    
                    </td>
				  </tr>

                </tbody>

            </tbody>
          </table>
          
           <table class="table table-bordered" width="100%">
 
            <tbody>
                <thead>
                    <tr>
                        <th colspan="4"><div align="center">SUPPLIES</div></th>
                    </tr>
                </thead>
                <tbody>
                
                  <tr>
				    <td><h6 align="center"><br><a href="supply_requests.php"><img src="img/globe.png"><br>
                    Item Requests: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT sd_id FROM supply_distribution_t WHERE type='pending'");
						$r = mysql_num_rows($co);
						echo $r; 
					?></h6>                     
                    </td>
				    <td><h6 align="center"><br><a href="supply_logs.php"><img src="img/group.png"><br>
                    Supply Logs: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT sd_id FROM supply_distribution_t WHERE type='delivered'");
						$c = mysql_num_rows($co);
						echo $c; 
					?></h6>                    
                    </td>
                    <td><h6 align="center"><br><a href="supply_list.php"><img src="img/cargo.png"><br>
                    Stocks: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT stock_no FROM inventory_stock_t");
						$c = mysql_num_rows($co);
						echo $c; 
					?></h6>                    
                    </td>
				    <td><h6 align="center"><br><a href="supply_items.php"><img src="img/lightbulb.png"><br>
                    Items: </a>
					<?php
						include "../db/db.php";
						$co = mysql_query("SELECT item_no FROM inventory_item_t");
						$c = mysql_num_rows($co);
						echo $c; 
					?></h6>                    
                    </td>
				  </tr>

                </tbody>

            </tbody>
          </table>
         
       			</div> <!-- /shortcuts --> <br>
				
				</div> <!-- /widget-content -->
         	</div> <!--widget-->            
         </div><!-- span6 -->
                
        <div class="span6">
      		<div class="widget stacked"><br>
				<div class="widget-header"><i class="icon-globe"></i><h3>NOTIFICATIONS</h3></div> <!-- /widget-header -->
				<div class="widget-content">
					
				<div class="shortcuts">

         <div id="demo">

          <section id="accordions">
						
			<div class="accordion" id="basic-accordion">
	            <div class="accordion-group">
					<div class="accordion-heading">
                    <?php
						include "../db/db.php";
						$requests = mysql_query("SELECT sd_id FROM supply_distribution_t WHERE type='pending'");
						$req = mysql_num_rows($requests);
					?>
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne"><i class="shortcut-icon icon-exclamation-sign"></i>&nbsp;&nbsp;Requests <span class="style9">(<?php echo $req; ?>)</span> </a>				    </div>
				    
                    <div id="collapseOne" class="accordion-body collapse">
				    	<div class="accordion-inner" align="left">
				        	<!--<p><a href="supply_requests.php">(VIEW ALL)</a> </p>-->
				        	<p><br></p>
     <?php
	 if ($r == 0){
	 	echo "<h4 align='center'>"."NO REQUESTS"."</h4><br>";
	 }
	 else {
	  	error_reporting(0);
		include('../db/db.php');
		$msg = mysql_query("SELECT * FROM supply_distribution_t, employee_t, inventory_stock_t, supply_category_t, inventory_item_t, supply_type_t, unit_t, supply_record_t
							WHERE employee_t.emp_id = supply_distribution_t.emp_id
							AND supply_distribution_t.record_id = supply_record_t.record_id
							AND inventory_stock_t.stock_no = supply_record_t.stock_no
							AND inventory_stock_t.detail_no = supply_category_t.detail_no
							AND inventory_stock_t.unit_no = unit_t.unit_no
							AND supply_category_t.item_no = inventory_item_t.item_no
							AND inventory_stock_t.type_no = supply_type_t.type_no");
				while ($row=mysql_fetch_array($msg)){
				if ($row['type'] == 'pending') {
							$sd_id = $row['sd_id'];
							$quantity = mysql_query("SELECT quantity FROM supply_distribution_t WHERE sd_id = '$sd_id'");
									
	 ?>
	<a href="supply_requests.php">View All</a><br><br>			        	                         
	<div class="alert alert-info"> 
      <span class="style11 style10">Employee: 
	  <strong><?php echo strtoupper($row["f_name"]." ".$row["m_name"]." ".$row["l_name"]); ?></strong> </span> <span class="style10 style10">&nbsp;
      <br>
&nbsp; &nbsp; <br>
      Requests: 
      <strong>
      <?php $row1=mysql_fetch_array($quantity); echo strtoupper($row1["quantity"]." ".$row["unit_type"]); ?> 
      of <?php echo strtoupper($row["description"]." ".$row["category"]." ".$row["item_name"]); ?> </strong></span><span class="style8"> <br>
      </span>    </div>
      <?php } } }?>
				        </div>
				    </div>
				</div> 
                
                
                
                <div class="accordion-group">
					<div class="accordion-heading">
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo"><i class="shortcut-icon icon-warning-sign"></i>&nbsp;&nbsp;Alert </a>
				    </div>
				    
                    <div id="collapseTwo" class="accordion-body in collapse">
				    	<div class="accordion-inner">
		<table class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Stock Item</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th><div align="center">Add</div></th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
							include('../db/db.php');
							$query=mysql_query("SELECT *
											FROM inventory_stock_t, supply_category_t, inventory_item_t, unit_t
											WHERE inventory_stock_t.unit_no=unit_t.unit_no
											AND inventory_stock_t.detail_no=supply_category_t.detail_no
											AND supply_category_t.item_no=inventory_item_t.item_no
											AND qoh <= 5");
							if (mysql_num_rows($query)> 0) {			
							while($row=mysql_fetch_array($query)){ 
							$id=$row['item_no']; ?>
                            
       		            <tr class="del<?php echo $id ?> style3" bgcolor="#FFEAEF" >
                          <td align="center" width="30"><div align="center" class="style10"><?php echo ucfirst($row['stock_no']); ?></div></td>
                          <td align="center"><span class="style10"><?php echo ucfirst($row['description'])." ".ucfirst($row['category'])." ".ucfirst($row['item_name']);  ?></span></td>
                       	  <td align="center" width="80">
							<span class="style10">
							<?php 
								if (($row['qoh']) == 0){
									echo ucfirst("Out of Stock!");
								} 
								else if (($row['qoh']) == 1){
									echo "Last ".$row['qoh']." Stock";
								}	
								else {
									echo "Last ".$row['qoh']." Stocks";
								}
							?>
							</span>							</td>
                            <td align="center" width="50"><span class="style10"><?php echo ucfirst($row['unit_type']); ?></span></td>
                            <td align="center" width="30"><div align="center">
                            <a class="btn btn-success" onClick="window.open('supply_add_stock.php?stock_no=<?php echo $row["stock_no"];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=600,position=center');"><i class="icon-plus-sign-alt"><span class="style10"><span class="style10"></span></span></i> </a>
                            </div></td>
                        </tr>
                        <?php }
						} 
						else { ?>
						<td colspan="4" align="center" bgcolor="#FFF0F4"><h4> NO ITEM </h4></td>
						<?php }
						?>
                </tbody>
          </table>
				        </div>
				    </div>
				</div>     
                            
                
	        </div>
							      
			</section>
            
          </div>
       			</div> <!-- /shortcuts --> 	
				
				</div> <!-- /widget-content -->
         	</div> <!--widget-->            
         </div><!-- span6 -->
         
         <div class="span6">
      		<div class="widget stacked"><br>
				<div class="widget-content">
				
				<div align="center"> <strong>
		                 <?php 
							include ("../db/db.php");
							$so = mysql_query("SELECT * FROM employee_t, account_t, employee_account_t, account_permission_t, account_privilege_t
								WHERE employee_t.emp_id = employee_account_t.emp_id
								AND employee_account_t.account_no = account_t.account_no
								AND account_t.account_no = account_permission_t.account_no
								AND account_privilege_t.privilege_id = account_permission_t.privilege_id
								AND account_privilege_t.privilege_name = 'supply_officer'");
								$res = mysql_fetch_assoc($so);
								echo "<h4>".strtoupper($res['f_name']." ".$res['m_name']." ".$res['l_name'])."</h4>";
						?>
			            </strong><h5>Supply Officer</h5>
				  </div>
                  
				</div> <!-- /widget-content -->
         	</div> <!--widget-->            
         </div><!-- span6 -->
          
	</div>
      <!-- /row -->
  </div> 
    <!-- /container -->
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
