<!DOCTYPE html>
<?php 
 @session_start();
 
 if (!isset($_SESSION['username'])) {
	
		echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
}
else{
	$username = $_SESSION['username'];

?>
<?php 
include("../db/db.php");
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
//$registrar= is_privileged($_SESSION['account_no'], 13);
$eis_admin= is_privileged($_SESSION['account_no'], 3);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$eis_admin)
{
	header("Location: ../restrict.php");
	}

 ?>
<html lang="en"><!-- InstanceBegin template="/Templates/eis_admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
                
                
			</a><!-- InstanceBeginEditable name="navbar" -->
			<div class="subnav-collapse collapse">
			  <ul class="mainnav">
			    <li> <a href="eis_admin_dashboard.php"> <i class="icon-home"></i><span class="shortcut-label">Dashboard</span></a></li>
			    <li> <a href="eis_admin_manage_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Manage Leaves</span></a></li>
                
                <li><a href="eis_admin_manage_users.php"><i class="shortcut-icon icon-barcode"></i></i><span class="shortcut-label">Manage Users</span></a>
                </li>
                
			    <li class="dropdown active"><a href="eis_admin_manage_employees.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Manage Employees</span></a>
                
                	<ul class="dropdown-menu">
                	<li><a href="eis_admin_manage_employees.php">Employees</a></li>
                    <li><a onClick="window.open('add2.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');">Add New Employee</a></li>
                	</ul>
                </li>
		      <li> <a href="eis_admin_manage_dept.php" > <i class="shortcut-icon icon-group"></i> <span class="shortcut-label">Manage Department</span></a></li>
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
      <div class="widget stacked widget-table action-table">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-user"></i> Manage Employees</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
           <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%" style="font-size:14px">
							<thead>
								<tr>
                                <th>Position ID</th>
								<th>Position Title</th>
								<th>Position Type</th>
								<th>Action</th>
								
								 
								  
								</tr>
							</thead>
							<tbody>
						 <?php
							include('../db/db.php');
							 $show_personnel="SELECT * FROM employee_position_t";
							 $show_p=mysql_query($show_personnel);
							 while($found=mysql_fetch_assoc($show_p)){					
							 
								  ?>
							<tr>
                            	<td class="center"><?php echo $found['position_id']; ?></td>
								<td class="center"><?php echo $found['position_title']; ?></td>
								<td class="center"><?php echo $found['position_type']; ?></td>
								<td class="center"><a class="btn btn-success btn-mini" href="eis_admin_update_position.php?pos_id=<?php echo $found['position_id'] ?>"><i class="icon-edit"></i>Update</a></td>
								
							</tr>
							
						<?php 
							 }
							   ?>		
						</tbody>
						</table>
            
          </div>
                </th>
                <th style="background-color:#F0F0F0">
                
                   
                  <a   class="btn btn-block" onClick="window.open('add2.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');"><i class="icon-plus"></i>Add New Personnel</a>
                  <a   class="btn btn-block" href="eis_admin_manage_employees.php"><span><i class="icon-user"></i></span>Manage Employees</a>
                  <a class="btn btn-block" href="eis_admin_manage_position.php"><i class=" icon-briefcase"></i>Manage Positions</a>
                  <hr/>
                  <a class="btn btn-block" href="#manageRole" data-toggle="modal"><i class=" icon-briefcase"></i>Add Role/Position</a>
				
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        
        
      
      <div class="modal fade hide" id="manageRole">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Add Role/Position</h3>
  </div>
  <div class="modal-body">
  
    <form action="actions/add_pos.php" method="post">
		<table class=" ">
			
			<tr>
				<td colspan="2"><b>Position Title/Name:</b></td>
				<td colspan="2"><input type="text" name="pos_name" /></td>
			</tr>
			<tr>
				<td colspan="2"><b>Position Type:</b></td>
				<td colspan="2">
				<select name="pos_type">
					<option value="teaching">Teaching</option>
					<option value="non-teaching">Non-Teaching</option>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td colspan="2" align="center"><input type="submit" class="btn-primary" name="add_pos" value="Add"></td>
				
			</tr>
		</table>
	</form>
	<a class="btn btn-grey" href="#viewRole" data-toggle="modal"><i class=" icon-briefcase"></i>View Added Roles/Positions</a>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    
  </div>
</div>

<div class="modal fade hide" id="viewRole">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Available Roles/Positions</h3>
  </div>
  <div class="modal-body">
	<table cellpadding="0" cellspacing="0" border="1" class=" table-condensed table-striped" id="example2" width="100%">
		<thead>
			<th align="center">Position ID</th>
			<th align="center">Position Title</th>
			<th align="center">Position Type</th>
		</thead>
		<tbody>
	<?php 
		$find_positions=mysql_query("SELECT * FROM employee_position_t");
		while($found_positions=mysql_fetch_assoc($find_positions)){
	?>
		
			<tr>
				<td align="center"><b><?php echo $found_positions['position_id']; ?></b></td>
				<td align="center"><b><?php echo $found_positions['position_title']; ?></b></td>
				<td align="center"><b><?php echo $found_positions['position_type']; ?></b></td>
			</tr>
			
		
	<?php 
		}
	?>
		</tbody>
	</table>
	<!--<a class="button block grey" href="#manageRole" data-toggle="modal"><i class=" icon-briefcase"></i>Add Role/Position</a>-->
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    
  </div>
</div>

<?php
include('../db/db.php');

$getid=mysql_query("SELECT * FROM employee_t");
while($found_id=mysql_fetch_assoc($getid)){
?>
 
 <div class='modal fade hide' id="employee<?php echo $found_id['emp_id'];?>">
  <div class='modal-header'>
    <button type='button' class='close' data-dismiss='modal'>&times;</button>
    <h3>Manage<?php echo "&nbsp;".$found_id['f_name'].'&nbsp;'.$found_id['l_name'];?></h3>
  </div>
  <div class='modal-body'>
    <p><a href='#' class='button block grey'><i class=" icon-file"></i>View PDS</a>
    	<a href='#' class='button block grey'><i class="icon-edit"></i>Edit Position</a>
   </p>
 </div>
  <div class='modal-footer'>
    <a href='javascript:;' class='btn' data-dismiss='modal'>Close</a>
    <a href='javascript:;' class='btn btn-primary'>Save changes</a>
  </div>
  
  
<?php	
}

  ?>
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

<?php } ?>
