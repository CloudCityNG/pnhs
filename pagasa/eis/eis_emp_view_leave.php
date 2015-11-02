<!DOCTYPE html>
<?php
include '../db/db.php';
error_reporting(0);
session_start();
?>
<?php

if (!isset($_SESSION['username'])) {

echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
 
 }
 
else{

$username = $_SESSION['username'];
$query = mysql_query("SELECT * FROM account_t WHERE username='$username'")or die(mysql_error());
while ($leave = mysql_fetch_assoc($query)){
		$accno = $leave['account_no'];
	
$query=mysql_query("SELECT * FROM employee_t, employee_account_t, account_t
					WHERE account_t.account_no='$accno'
					AND account_t.account_no=employee_account_t.account_no
					AND employee_account_t.emp_id=employee_t.emp_id") or die(mysql_error());
while($pis_info=mysql_fetch_assoc($query)){
$p_id= $pis_info['emp_id'];
$fname = $pis_info['f_name'];
$lname = $pis_info['l_name'];
$mname = $pis_info['m_name'];
$position =$pis_info['position'];
		
?>

<html lang="en"><!-- InstanceBegin template="/Templates/eis_employee_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
			    <li > <a href="eis_emp_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li> <a href="eis_emp_view_pds.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">View PDS</span></a></li>
			    <li class="active"> <a href="eis_emp_view_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Apply Leave</span></a></li>
                <li> <a href="inv_my_inventory.php" > <i class="shortcut-icon icon-briefcase"></i> <span class="shortcut-label">My Inventory</span></a></li>
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
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-list"></i>&nbsp;Leave Status</th>
                <th><i class="icon-globe"></i>&nbsp;NOTIFICATION</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >

      <p><h3 align="left"> Manage Leave</h3></p>
      
      <div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#pending" data-toggle="tab"><i class="icon-bookmark"></i> Pending</a></li>
					  <li><a href="#approved" data-toggle="tab"><i class="icon-check"></i> Approved</a></li>
                      <li><a href="#disapproved" data-toggle="tab"><i class="icon-remove"></i> Disapproved</a></li>
					</ul>
					
						<div class="tab-content">
							<div class="tab-pane active" id="pending">
 
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>Leave ID</th>
						  <th>Type Of Leave</th>
						  <th>Date Applied</th>
						  <th>Start Date</th>
						  <th>End Date</th>
						  <th>Status</th>
                          <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                 <?php
						 include("../db/db.php");
							$emp_id = $pis_info['emp_id'];
							$query=mysql_query("SELECT * FROM eis_leave_t WHERE emp_id='$emp_id' AND leave_status='PENDING'")or die(mysql_error());
							while($leave = mysql_fetch_assoc($query)){

								$data = array(
								'type_of_leave' => $leave['type_of_leave'],
								'date_applied' => $leave['date_of_filling'],
								'sdate' => $leave['start_of_leave'],
								'edate' => $leave['end_of_leave'],
								'status' => $leave['leave_status'],
								'id' => $leave['leave_id'],
								);
								  
								  ?>
							<tr>
								<td><div align="center"><a href="eis_emp_leave.php?leave_id=<?php echo $leave['leave_id'] ?>" data-gravity=n title="Click to view this Leave"><?php echo $data['id']; ?></a></div></td>
								<td class="center"><?php echo $data['type_of_leave']; ?></td>
								<td class="center"><?php echo $data['date_applied']; ?></td>
								<td class="center"><?php echo $data['sdate']; ?></td>
								<td class="center"><?php echo $data['edate']; ?></td>
								<td class="center"><div align="center"><span class="label label-success"><?php echo $data['status']; ?></span></div></td>
								<td class="center"><div align="center">
                                <a class="btn-small btn-danger" href="JavaScript:if(confirm('Cancel Leave?')==true)
							{window.location='actions/eis_emp_cancel_leave.php?leave_id=<?php echo $data['id']; ?>';}"><i class="icon-remove"></i> CANCEL</a>
                                </div></td>
							</tr>
							
						<?php 						
							   }
							   ?>	
                </tbody>
		</table>
							</div>
							
							<div class="tab-pane" id="approved">
		<table cellpadding="0" cellspacing="0" border="0" class="styled" id="example2" width="100%">
                <thead>
                    <tr>
                        <th>Leave ID</th>
						  <th>Type Of Leave</th>
						  <th>Date Applied</th>
						  <th>Start Date</th>
						  <th>End Date</th>
						  <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                 <?php
						 include("../db/db.php");
							$emp_id = $pis_info['emp_id'];
							$query=mysql_query("SELECT * FROM eis_leave_t WHERE emp_id='$emp_id' AND leave_status='APPROVED'")or die(mysql_error());
							while($leave = mysql_fetch_assoc($query)){

								$data = array(
								'type_of_leave' => $leave['type_of_leave'],
								'date_applied' => $leave['date_of_filling'],
								'sdate' => $leave['start_of_leave'],
								'edate' => $leave['end_of_leave'],
								'status' => $leave['leave_status'],
								'id' => $leave['leave_id'],
								);
								  
								  ?>
							<tr>
								<td><div align="center"><a href="eis_emp_leave.php?leave_id=<?php echo $leave['leave_id'] ?>" data-gravity=n title="Click to view this Leave"><?php echo $data['id']; ?></a></div></td>
								<td class="center"><?php echo $data['type_of_leave']; ?></td>
								<td class="center"><?php echo $data['date_applied']; ?></td>
								<td class="center"><?php echo $data['sdate']; ?></td>
								<td class="center"><?php echo $data['edate']; ?></td>
								<td class="center"><div align="center"><span class="label label-success"><?php echo $data['status']; ?></span></div></td>
								
							</tr>
							
						<?php 						
							   }
							   ?>	
                </tbody>
		</table>
							</div>
                            
                            <div class="tab-pane" id="disapproved">
		<table cellpadding="0" cellspacing="0" border="0" class="styled" id="example3" width="100%">
                <thead>
                    <tr>
                        <th>Leave ID</th>
						  <th>Type Of Leave</th>
						  <th>Date Applied</th>
						  <th>Start Date</th>
						  <th>End Date</th>
						  <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                 <?php
						 include("../db/db.php");
							$emp_id = $pis_info['emp_id'];
							$query=mysql_query("SELECT * FROM eis_leave_t WHERE emp_id='$emp_id' AND leave_status='DISAPPROVED'")or die(mysql_error());
							while($leave = mysql_fetch_assoc($query)){

								$data = array(
								'type_of_leave' => $leave['type_of_leave'],
								'date_applied' => $leave['date_of_filling'],
								'sdate' => $leave['start_of_leave'],
								'edate' => $leave['end_of_leave'],
								'status' => $leave['leave_status'],
								'id' => $leave['leave_id'],
								);
								  
								  ?>
							<tr>
								<td><div align="center"><a href="eis_emp_leave.php?leave_id=<?php echo $leave['leave_id'] ?>" data-gravity=n title="Click to view this Leave"><?php echo $data['id']; ?></a></div></td>
								<td class="center"><?php echo $data['type_of_leave']; ?></td>
								<td class="center"><?php echo $data['date_applied']; ?></td>
								<td class="center"><?php echo $data['sdate']; ?></td>
								<td class="center"><?php echo $data['edate']; ?></td>
								<td class="center"><div align="center"><span class="label label-success"><?php echo $data['status']; ?></span></div></td>
								
							</tr>
							
						<?php 						
							   }
							   ?>	
                </tbody>
		</table>
							</div>
							
						</div>

				        <p>&nbsp;</p>
      </div>
      
                </th>
                <th style="background-color:#F0F0F0">
 
                  <a class="btn btn-block" onClick="window.open('eis_apply_leave.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width=750, height=500,position=center');"><i class="icon-plus"></i> Apply Leave</a>
		<p>&nbsp; </p>
            <?php
											include("../db/db.php");
											$emp_id = $pis_info['emp_id'];
												$sql=mysql_query("SELECT * FROM eis_leave_t, eis_leave_response_t
																	WHERE eis_leave_t.emp_id = '$emp_id'
																	AND eis_leave_t.leave_status = 'disapproved'
																	AND eis_leave_t.leave_id = eis_leave_response_t.leave_id")or die(mysql_error());
												while($response = mysql_fetch_assoc($sql)){
												$id=$response['leave_res_id'];
												 echo "<div class='alert alert-danger'><i class='icon-exclamation-sign'></i> "." Your ".$response['reason']." ".$response['other_reason']." leave request was denied because '".$response['response']."'. "." <a href='actions/remove_response.php?leave_res_id=$id'><i class=icon-remove></i></a>"."</div>";
												 
												}
										?>
                </th>
              </tr>
            </tbody>
          </table>
        <!-- /widget-content -->
      </div>
      
<?php
}
}
}		
?>

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
