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
			    <li class="active"> <a href="eis_admin_manage_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Manage Leaves</span></a></li>
                
                <li><a href="eis_admin_manage_users.php"><i class="shortcut-icon icon-barcode"></i></i><span class="shortcut-label">Manage Users</span></a>
                </li>
                
			    <li class="dropdown"><a href="eis_admin_manage_employees.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Manage Employees</span></a>
                
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
    <?php
	error_reporting(0); 
		include("../db/db.php");
		$leave_id = $_GET['leave_id'];
		$sql = mysql_query("SELECT * FROM employee_t, eis_leave_t WHERE eis_leave_t.emp_id = employee_t.emp_id AND eis_leave_t.leave_id='$leave_id'");

while($pis_info=mysql_fetch_assoc($sql)){
$p_id= $pis_info['emp_id'];
$fname = $pis_info['f_name'];
$lname = $pis_info['l_name'];
$mname = $pis_info['m_name'];
$position =$pis_info['position'];
	?>
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Manage Leaves</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">

		  <div class="header"> <h3><?php echo strtoupper($lname).", ".ucfirst($fname)." ".ucfirst($m_name); ?> Leave Request</h> </div>
                
                <div align="center">
                  <table width="750" style="border:3px #dce9f9 solid;font-family:calibri" >
                    <tr>
                      <td height="62" colspan="6"><div align="center"><font size="+3"><u>APPLICATION FOR LEAVE</u></font></div></td>
    </tr>
                    <tr>
                      <td colspan="3" style="text-align:center;background-color:#dce9f9;"><strong>DISTRICT/SCHOOL: </strong></td>
      <td colspan="3" style="background-color:#dce9f9;"><strong>Name (LAST)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(FIRST)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(MIDDLE)</strong></td>
      </tr>
                    <tr>
                      <td colspan="3" style="text-align:center;border:3px #dce9f9 solid;border-top:none;">Leg.Port Dist.I/ Pag-asa National HS</td>
      <td colspan="3" style="border:3px #dce9f9 solid;border-top:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($lname);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($fname);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($mname);?></td>
      </tr>
                    <tr>
                      <td colspan="3" style="text-align:center;background-color:#dce9f9;"> <strong>DATE OF FILING </strong></td>
      <td width="137" style="text-align:center;background-color:#dce9f9;"><strong>POSITION </strong></td>
      <td width="181">&nbsp;</td>
      <td width="66" ></td>
    </tr>
                    <tr>
                      <td colspan="3" align="center" style="border:3px #dce9f9 solid;border-top:none;"><?php echo $pis_info['date_of_filling']; ?> </td>
      <td style="text-align:center;border:3px #dce9f9 solid;border-top:none;"><?php echo $position; ?></td>
      <td>&nbsp;</td>
      <td><input type="hidden" value="<?php echo $p_id;?>" name="p_id" /></td>
    </tr>
                    <tr>
                      <td width="64">&nbsp;</td>
      <td colspan="2" style="text-align:center;background-color:#dce9f9;"><strong>TYPE OF LEAVE&nbsp;</strong></td>
      <td colspan="2" style="text-align:center;background-color:#dce9f9;"> <strong>WHERE LEAVE WILL BE SENT </strong></td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td colspan="2" rowspan="3" style="border:3px #dce9f9 solid;border-top:none;"><center>
        
        <?php 
		$tol = $pis_info['type_of_leave'];
		echo $tol;
		echo "<br>";
		echo $pis_info['reason'];
		echo $pis_info['other_reason'];
	?>
        </center></td>
      
    <td colspan="2" rowspan="3" style="border:3px #dce9f9 solid;border-top:none;"><center>
      <?php
		echo $pis_info['incase_of_vacation'];
		echo $pis_info['incase_v_specify'];
		echo $pis_info['incase_of_sick']."<br>";
		echo $pis_info['incase_s1_specify'];
		echo $pis_info['incase_s2_specify'];
	
	?>
      </center></td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td >&nbsp;</td>
      <td colspan="3" style="text-align:center;background-color:#dce9f9;"><strong>NUMBER OF WORKING DAYS APPLIED FOR </strong></td>
      <td style="text-align:center;background-color:#dce9f9;"><strong>COMMUTATION</strong></td>
      <td style="text-align:center;">&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td width="147"  style="text-align:right;background-color:#dce9f9;"><strong>INCLUSIVE DATE:</strong></td>
      <td width="123">&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2" style="border:3px #dce9f9 solid;border-top:none;" ><center><?php echo $pis_info['commutation']; ?></center></td>
      <td style="text-align:center;">&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td style="text-align:right;background-color:#dce9f9;"><strong>Start Date:&nbsp;</strong></td>
      <td style="border:3px #dce9f9 solid;border-left:none;">
        <span class="error" style="display:none;" id="SdateEmpty">Start Date is Required</span>&nbsp;<?php echo $pis_info['start_of_leave']; ?>        </td>
      <td style="text-align:center;background-color:#dce9f9;"><strong>Leave Balance: </strong></td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td style="text-align:right;background-color:#dce9f9;"><strong>End Date:&nbsp;</strong></td>
      <td style="border:3px #dce9f9 solid;border-left:none;">&nbsp;<?php echo $pis_info['end_of_leave']; ?>        </td>
      <td style="border:3px #dce9f9 solid;border-top:none;" align="center">
    <?php
	$bal = mysql_query("SELECT * FROM eis_leave_credits_t WHERE emp_id = '$p_id'");
	$lb = mysql_fetch_array($bal);
	echo $lb['leave_balance'];
	?>        </td>
      <td style="text-align:left;">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td style="text-align:right;background-color:#dce9f9;" ><strong>Duration:</strong></td>
      <td style="border:3px #dce9f9 solid;border-left:none;">&nbsp; <?php echo $pis_info['duration']; ?>      Day(s)	  </td>
      <td >&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td>&nbsp;</td>
      <td >&nbsp;</td>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
                    <tr>
                      <td colspan="6" align="center">
                      <a class="btn btn-success" href="JavaScript:if(confirm('Approve Leave?')==true)
							{window.location='actions/approve_leave.php?leave_id=<?php echo $leave_id; ?>';}"><i class="icon-share"></i>&nbsp;APPROVE</a> &nbsp; 
                      <a class="btn btn-danger" href="JavaScript:if(confirm('Dispprove Leave?')==true)
							{window.location='eis_admin_cancel_leave.php?leave_id=<?php echo $leave_id; ?>';}"><i class="icon-remove"></i>&nbsp;DISAPPROVE</a> &nbsp;
                      
                      <a href="eis_admin_manage_leave.php" class="btn btn"><i class="icon-remove"></i> CANCEL</a> 
                      </td>
    </tr>
                  </table>
                </div>
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

<?php } ?>
