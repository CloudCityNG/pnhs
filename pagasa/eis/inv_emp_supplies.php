<!DOCTYPE html>


<html lang="en">
<?php 
 @session_start();
 
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else
	header("location: restrict.php"); // IMPORTANT!!!!

?>
<!-- InstanceBegin template="/Templates/modular_template.dwt.php" codeOutsideHTMLIsLocked="true" -->
<head>
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

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"></style>
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
			
			<a class="brand" href="../index.html">
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
							<?php echo $_SESSION['username'];?>
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
			</a>

			<div class="subnav-collapse collapse">
			
			<!-- InstanceBeginEditable name="navbar" -->
			 <div class="subnav-collapse collapse">
			  <ul class="mainnav">
			    <li > <a href="eis_emp_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li> <a href="eis_emp_view_pds.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">View PDS</span></a></li>
			    <li> <a href="eis_emp_view_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Apply Leave</span></a></li>
                <li class="active"> <a href="inv_my_inventory.php" > <i class="shortcut-icon icon-briefcase"></i> <span class="shortcut-label">My Inventory</span></a></li>
		      </ul>
		    </div>
		    <!-- InstanceEndEditable -->
            
            </div> <!-- /.subnav-collapse -->

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
	
	<!-- InstanceBeginEditable name="content" -->
    
        <div class="widget-content">
                    <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-dashboard"></i> My Inventory</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                <p><h3>&nbsp;My Supply Logs</h3></p>
           <div id="demo" style="min-height:400px;">
           
      <?php
	  	error_reporting(0);
		include('db/db.php');
		$msg = mysql_query("SELECT * FROM supply_message_t, supply_distribution_t, employee_t, account_t, employee_account_t
							WHERE account_t.username ='$username'
							AND account_t.account_no = employee_account_t.account_no
                            AND employee_t.emp_id=employee_account_t.emp_id
							AND employee_t.emp_id = supply_distribution_t.emp_id");
									
	  ?>
           
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT *
										FROM inventory_stock_t, supply_category_t, inventory_item_t, unit_t, supply_distribution_t, employee_t, supply_record_t, account_t, employee_account_t
										WHERE inventory_stock_t.unit_no=unit_t.unit_no
										AND inventory_stock_t.detail_no=supply_category_t.detail_no
										AND supply_category_t.item_no=inventory_item_t.item_no
										AND supply_distribution_t.emp_id = employee_t.emp_id
										AND inventory_stock_t.stock_no = supply_record_t.stock_no
										AND supply_record_t.record_id = supply_distribution_t.record_id
										AND employee_account_t.account_no = account_t.account_no
										AND employee_t.emp_id = employee_account_t.emp_id
										AND account_t.username = '$username'
										AND supply_distribution_t.type='delivered'");
										
                        while($row=mysql_fetch_array($query)){
						$id=$row['sd_id']; 
						$quantity = mysql_query("SELECT quantity FROM supply_distribution_t WHERE sd_id = '$id'"); 
						?>
                        <tr class="del<?php echo $id ?>">
                            <td  align="center" width="100"><?php echo $row['date_recieved']; ?></td>
                            <td><?php echo ucfirst($row['description'])." ".ucfirst($row['category'])." ".ucfirst($row['item_name']); ?></td>
                            <td align="center"><?php $row1=mysql_fetch_array($quantity); echo $row1['quantity']; ?></td>
                      		<td  align="center" width="200"><?php echo $row['unit_type']; ?></td>
                            
                        </tr>
                  <?php }?>
                </tbody>
		</table>
            
          </div>
                </th>
                <th style="background-color:#F0F0F0">
 
                  <a class="btn btn-block" href="../eis/inv_my_inventory.php"><i class=" icon-folder-open"></i>   Available Supplies</a>
                  <a class="btn btn-block" href="../eis/inv_request_items.php"><i class="icon-envelope-alt"></i>   Requested Items</a>         
                  <a class="btn btn-block" href="../eis/inv_emp_supplies.php"><i class=" icon-list-alt"></i>  Supply Logs</a>
                  <a class="btn btn-block" href="../eis/inv_emp_mr.php"><i class=" icon-briefcase"></i>   My M.R.</a>  
                  <?php
				  include('../db/db.php');
					$head=mysql_query("SELECT * FROM account_t, employee_t, department_t, employee_account_t
		  				WHERE account_t.username = '$username'
						AND employee_t.emp_id = employee_account_t.emp_id
						AND account_t.account_no  = employee_account_t.account_no
						AND employee_t.emp_id = department_t.dept_head");
                        while($row=mysql_fetch_array($head)){ 
				  ?>
                  <p>&nbsp;  </p>
                  <a class="btn btn-block" href="../eis/inv_request_list.php"><i class=" icon-shopping-cart"></i> Employee Requests</a> 
                  <?php } ?>
                  
                </th>
              </tr>
            </tbody>
          </table>
        <!-- /widget-content -->
      </div>
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
