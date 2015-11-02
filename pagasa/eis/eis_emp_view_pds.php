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
$emp_id= $pis_info['emp_id'];
		
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
			    <li > <a href="eis_emp_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li class="active"> <a href="eis_emp_view_pds.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">View PDS</span></a></li>
			    <li> <a href="eis_emp_view_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Apply Leave</span></a></li>
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
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-file"></i>
          <h3>Personal Data Sheet</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
            <section id="content" class="container_12 clearfix" data-sort=true>
				<h3 style="color:#0099FF">Your Personal Data Sheet</h3>
                <div style="width:auto;margin-left:auto;margin-right:auto;">
					<a id="Back" onClick="window.history.back();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<a id="printButton" onClick="window.open('eis_emp_PDS.php?emp_id=<?php echo $emp_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1050, height=900,position=center').printpage()" class="button grey block left"><span class="icon-print"></span>Open PDS on Optimized Window and Print</a>
					
					</div>
                <hr/>
	
    		<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">
			<link rel="stylesheet" href="../include/css/elements.css">
			<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">
			<link rel="stylesheet" href="../include/css/icons.css">
            
            
            <?php 
	
	$find=mysql_query("SELECT * FROM employee_t WHERE emp_id='$p_id'");
	while($found=mysql_fetch_assoc($find)){

?>

<form id="AddPersonnel" action="#"  method="post" enctype="multipart/form-data" >

<div style="border:1px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<table class="table bordered" width="816" >
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>PERSONAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<?php
								$find_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$p_id'");
								$found_pic=mysql_fetch_assoc($find_pic);
							?>
							<td><div id="dpic"><center><img style="width:137px;height:175px" src="include/dpic/<?php echo $found_pic['pic_name']; ?>" id="chng_dpic" onBlur="chk_img()" id="d_pic"/><center><br />
							</div></td>
						  </tr>
                          <tr>
                          	<td colspan="2" style="background-color:#EAEAEA;">EMPLOYEE ID</td>
                            <td colspan="2"><b><input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>" /><input type="text" disabled value="<?php echo $emp_id; ?>"></b></td>
                            <td colspan="2" style="background-color:#EAEAEA;">DEPARTMENT</td>
							<td colspan="2">
									<?php 
									$dept_id=$found['dept_id'];
                                    $dept =mysql_query("SELECT * FROM department_t WHERE dept_id='$dept_id'");
                                    while($print_dept=mysql_fetch_assoc($dept)){
                                     ?>
                                    <b><?php echo $print_dept['dept_name']; ?> </b>
                                    <?php } ?>
                             </td>
                          </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2"><b><?php echo $found['l_name']; ?></b></td>
							<td width="91" style="background-color:#EAEAEA;" colspan="2">POSITION</td>
							<td width="109"><b>
								<?php 
								$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id ='$emp_id'");
								$found_role=mysql_fetch_assoc($find_role);
								$role_id=$found_role['role_id'];
								$role =mysql_query("SELECT * FROM employee_position_t WHERE position_id='$role_id'");
								while($print_pos=mysql_fetch_assoc($role)){
								 ?>
								<?php echo $print_pos['position_title']; ?>																			
								<?php 
								}
								?>
								</b>
							</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><b><?php echo $found['f_name']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" ><b><?php echo $found['m_name']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">NAME EXTENSION(e.g. Jr., Sr.,)</td>
							<td width="203" colspan="2"><b><?php echo $found['name_extension']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">DATE OF BIRTH(yyyy/mm/dd)</td>
							<td colspan="2"><b><?php echo $found['b_date']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">RESIDENTIAL ADDRESS</td>
							<td colspan="2"><b><?php echo $found['address']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PLACE OF BIRTH</td>
							<td colspan="2"><b><?php echo $found['place_of_birth']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP </td>
							<td colspan="2"><b><?php echo $found['zip_code']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SEX</td>
							<td colspan="2"><b><?php echo $found['gender']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">CONTACT NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no1']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CIVIL STATUS</td>
							<td colspan="2"><b><?php echo $found['civil_status']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">PERMANENT ADDRESS</td>
							<td colspan="2"><b><?php echo $found['p_address']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CITIZENSHIP</td>
							<td colspan="2"><b><?php echo $found['citizenship']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP</td>
							<td colspan="2"><b><?php echo $found['p_zipcode']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">HEIGHT</td>
							<td colspan="2"><b><?php echo $found['height']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no2']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">WEIGHT</td>
							<td colspan="2"><b><?php echo $found['weight']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">EMAIL ADDRESS(if any)</td>
							<td colspan="2"><b><?php echo $found['e_add1']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">BLOOD TYPE</td>
							<td colspan="2"><b><?php echo $found['blood_type']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">CELLPHONE NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no3']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">GSIS ID NO.</td>
							<td colspan="2"><b><?php echo $found['gsis_id_no']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">AGENCY EMPLOYEE NO.</td>
							<td colspan="2"><b><?php echo $found['agency_emp_no']; ?></b/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PAG-IBIG ID NO.</td>
							<td colspan="2"><b><?php echo $found['pag_ibig_id_no']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">TIN</td>
							<td colspan="2"><b><?php echo $found['tin']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PHILHEALTH NO.</td>
							<td colspan="2"><b><?php echo $found['philhealth_id_no']; ?></b></td>
							<td colspan="4" rowspan="2" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SSS NO.</td>
							<td colspan="2"><b><?php echo $found['sss_id_no']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>FAMILY BACKGROUND</strong></td>
						  </tr>
						  </tr>
						  
</table>
<table class="table" width="816">
					<tr align="center">
					<td align="center" width="408">
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S LAST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['sl_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
						  
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S FIRST NAME</td>
							<td colspan="2"  align="left"><b><?php echo $found['sf_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['sm_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">OCCUPATION</td>
							<td colspan="2" align="left"><b><?php echo $found['s_occupation']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">EMPLOYER/BUS. NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">BUSINNESS ADDRESS</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_add']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_telno']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FATHER'S SURNAME</td>
							<td colspan="2" align="left"><b><?php echo $found['fl_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['ff_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['fm_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MOTHER'S MAIDEN NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mmaiden_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2" align="left"><b><?php echo $found['ml_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mf_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mm_name']; ?></b></td>
							
						  </tr>
						</td>
						
						<td align="center" width="408">
							<tr align="center">
  							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">COUNT(#)&nbsp;&nbsp;NAME OF CHILD</td>
							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">DATE OF BIRTH(mm/dd/yyyy)</td>
						  </tr>
						  
						  <tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  </tr>
						  <?php 
							$find_child=mysql_query("SELECT * FROM eis_child_t WHERE emp_id='$emp_id' ORDER BY `eis_child_t`.`count` ASC ");
							while($found_child=mysql_fetch_assoc($find_child)){
						  ?>
						  
						  <tr align="center">
							<td colspan="2" align="center"><b><?php echo $found_child['count'].'&nbsp;-&nbsp;'.$found_child['child_name']; ?></b></td>
							<td colspan="2" align="center"><b><?php echo $found_child['child_bdate']; ?></b></td>
						  </tr>
						  
						  <?php 
							}
						  ?>
						  
						</td>
					</tr>	  
                          </table>
                          <table class="table" width="816">
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>EDUCATIONAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<td width="100" rowspan="2" style="background-color:#EAEAEA;"><div align="center">LEVEL</div></td>
							<td width="120" rowspan="2" style="background-color:#EAEAEA;"><div align="center">NAME OF SCHOOL<br />(Write in full)</div></td>
							<td width="130" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEGREE COURSE<br  />
							(Write in full)</div></td>
							<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">YEAR <br  />
							  GRADUATED<br  />
							(If Graduated)</span></div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">HIGHEST GRADE/<br />
							  LEVEL/ <br  />
							  UNITS EARNED<br  />
							(If not graduated)</span></div></td>
							<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATE OF ATTENDANCE</div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">SCHOLARSHIP/<br />
							ACADEMIC HONORS RECEIVED</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><div align="center">From</div></td>
							<td style="background-color:#EAEAEA;"><div align="center">To</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"> ELEMENTARY</td>
							<?php 
								$find_elem=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Elementary'");
								while($found_elem=mysql_fetch_assoc($find_elem)){
							
							?>
							<tr>
							<td>&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_elem['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_elem['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_elem['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_elem['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">SECONDARY</td>
							<?php 
								$find_secon=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Secondary'");
								while($found_secon=mysql_fetch_assoc($find_secon)){
							
							?>
							<tr>
							<td>&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_secon['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_secon['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_secon['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_secon['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
						<?php 
								$find_voc=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Vocational'");
								while($found_voc=mysql_fetch_assoc($find_voc)){
							
							?>
							<tr>
							<td>&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_voc['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_voc['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_voc['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_voc['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">COLLEGE</td>
							<tr>
							<td>&nbsp;</td>
						  </tr>
							<?php 
								$find_col1=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='College1'");
								while($found_col1=mysql_fetch_assoc($find_col1)){
							
							?>
							
							<tr>
							<td>&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_col1['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_col1['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_col1['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_col1['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_col1['inclusive_date_att_from']; ?></b>
							</div></td>

							<td>  <div align="center">
							  <b><?php echo $found_col1['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_col1['scholarship']; ?></b>
							</div></td>
							</td>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">GRADUATE STUDIES</td>
							<tr>
							<td>&nbsp;</td>
						  </tr>
							<?php 
								$find_gs1=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='GS1'");
								while($found_gs1=mysql_fetch_assoc($find_gs1)){
							
							?>
							
							<tr>
							<td>&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_gs1['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_gs1['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_gs1['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_gs1['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="8" style="display:none;">&nbsp;</td>
						  </tr>
						</table>



						
							 <table class="table" width="816">
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>CIVIL SERVICE ELIGIBILITY</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">CAREER SERVICE/ RA 1080 (BAORD/BAR)<BR  />
								UNDER SPECIAL LAW/CES/CSEE</div></td>
								<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center">RATING</div></td>
								<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">DATE OF<BR />
								  EXAMINATION/<BR />
								CONFERMENT</div></td>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">PLACE OF EXAMINATION/<br />CONFERMENT</div></td>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">LICENSE(if applicable)</div></td>
							  </tr>
							  <tr>
								<td width="88" style="background-color:#EAEAEA;"><div align="center">NUMBER</div></td>
								<td width="105" style="background-color:#EAEAEA;"><div align="center">DATE OF RELEASE</div></td>
							  </tr>
								<?php  
								$find_civ=mysql_query("SELECT * FROM eis_civ_service_t WHERE emp_id='$emp_id'");
								while($found_civ=mysql_fetch_assoc($find_civ)){ ?>
							  <tr>
								<td colspan="2"><div align="center">
								  <b><?php echo $found_civ['career_service']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['rating']; ?></b>
								</div></td>
								<td width="120"><div align="center">
								  <b><?php echo $found_civ['date_of_exam']; ?></b>
								</div></td>
								<td colspan="2"><div align="center">
								  <b><?php echo $found_civ['place_of_exam']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['license_no']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['license_date_release']; ?></b>
								</div></td>
							  </tr>
								<?php } ?>
							  </table>
							  
							<table class="table" width="816">  
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>WORK EXPERIENCE</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATES<br />
								(mm/dd/yy)</div></td>
								<td width="105" rowspan="2" style="background-color:#EAEAEA;"><div align="center">POSITION TITLE<br />
								(Write in full)</div></td>
								<td width="200" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEPARTMENT/<br />AGENCY/OFFICE/<br />COMPANY<br />
								(Write in full)</div></td>
								<td width="82" rowspan="2" style="background-color:#EAEAEA;"><div align="center">MONTHLY<br />
								SALARY</div></td>
								<td width="75" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px;">SALARY GRADE<br  />
							  &amp; STEP <br />
								  INCREMENT<br />
								(format &quot;00-0&quot;)</span></div></td>
								<td width="145" rowspan="2" style="background-color:#EAEAEA;"><div align="center">STATUS OF <br />
								APPOINTMENT</div></td>
								<td width="62" rowspan="2" style="background-color:#EAEAEA;"><div align="center">GOV'T<br />
								  SERVICE<br />
								(Yes/No)</div></td>
							  </tr>
							  <tr>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">FROM</div></td>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">TO</div></td>
							  </tr>
							   <?php  
									$find_work=mysql_query("SELECT * FROM eis_work_experience_t WHERE emp_id='$emp_id'");
									while($found_work=mysql_fetch_assoc($find_work)){ 
									$i_date_f=strtotime($found_work['inclusive_date_from']);
									$if_date_f=date('m-d-Y',$i_date_f);
									$i_date_t=strtotime($found_work['inclusive_date_to']);
									$if_date_t=date('m-d-Y',$i_date_t);
																													 
								 ?> 
							  <tr>
								<td><div align="center">
								  <b><?php echo $if_date_f; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $if_date_t; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['position_title']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['dept_agency_office_company']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['monthly_salary']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['salary_grade_and_step_inc']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['status_of_appointment']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['govt_service']; ?></b>
								</div></td>
							  </tr>
								<?php } ?>
							</table>

							<table class="table" width="816">
							 <tbody>
							  <tr>
								<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</strong></td>
								</tr>
							 
							  <tr>
								<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5;">NAME & ADDRESS OF ORGANIZATION<br />
								(Write in full)</td>
								<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATES<br />(yyyy/mm/dd)</td>
								<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
								<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">POSITION/NATURE OF WORK<br />(Write in full)</td>
							  </tr>
							  <tr>
								<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
								<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
								</tr>
									<?php  
										$find_vol=mysql_query("SELECT * FROM eis_voluntary_work_t WHERE emp_id='$emp_id'");
										while($found_vol=mysql_fetch_assoc($find_vol)){
													
									?> 
								<tr>
								<td align="center"><b><?php echo $found_vol['name_of_org']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['inclusive_date_from']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['inclusive_date_to']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['no_of_hrs']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['nature_of_work']; ?></b></td>
							  </tr>
							 
							  <?php } ?> 
							   </tbody>
								</table>
								
								 <table class="table" width="816">
								 <tbody>
								  <tr>
									<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>TRAINING PROGRAMS</strong></td>
									</tr>
								 
								  <tr>
									<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5px;">TITLE OF SEMINARS/CONFERENCE/WORKSHOP/SHORT COURSE<br />
									(Write in full)</td>
									<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATE OF ATTENDANCE<br />(yyyy/mm/dd)</td>
									<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
									<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">CONDUCTED/SPONSORED BY<br />(Write in full)</td>
								  </tr>
								  <tr>
									<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
									<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
									</tr>
								   <?php  
									$find_train=mysql_query("SELECT * FROM eis_training_program_t WHERE emp_id='$emp_id'");
									while($found_train=mysql_fetch_assoc($find_train)){
									
									?>  
								 <tr>
									<td align="center"><b><?php echo $found_train['title_of_seminar']; ?></b></td>
									<td align="center"><b><?php echo $found_train['inclusive_date_att_from']; ?></b></td>
									<td align="center"><b><?php echo $found_train['inclusive_date_att_to']; ?></b></td> 
									<td align="center"><b><?php echo $found_train['no_of_hrs']; ?></b></td>
									<td align="center"><b><?php echo $found_train['conducted_sponsor_by']; ?></b></td>
								  </tr>
								  <?php } ?> 
								</tbody>
								  </table>
								  
								  <table class="table" width="816">
								<tbody>
								  <tr>
									<td colspan="3"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>OTHER INFORMATION</strong></td>
									</tr>
								  <TR>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">SPECIAL SKILLS/HOBBIES</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">NON-ACEDEMIC DISTICTIONS/RECOGNITION
								<br>(Write in full)</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">MEMBERS IN ASSOCIATION/ORGANIZATION
								<br>(Write in full)</td>
								  </tr>
									<?php  
									$find_o1=mysql_query("SELECT * FROM eis_other_info1_t WHERE emp_id='$emp_id'");
									while($found_o1=mysql_fetch_assoc($find_o1)){
									?>  
								   <tr>
									<td align="center"><b><?php echo $found_o1['special_skills']; ?></b></td>
									<td align="center"><b><?php echo $found_o1['recognition']; ?></b></td>
									<td align="center"><b><?php echo $found_o1['organization']; ?></b></td>
									</tr>
									<?php } ?> 
									</tbody>
								  </table>
	
						
							<table class="table" width="816">
						  <tr>
							<td width="616" style="border:none" style="background-color:#EAEAEA;">36.Are you related by consanguinity or affinity to any of the following : </td>
							<td width="200" style="border:none" >&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none"></td>
							<td style="border:none">&nbsp; </td>
						  </tr>
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">a. Within the third degree (for National Government Employees):                                                      appointing authority, recommending authority, chief of office/bureau/department or person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</td>
							
							<?php 
							$find_oi1=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q36_a'");
							$found_oi1=mysql_fetch_assoc($find_oi1)
							?>
							
							<td style="border:none">
							
							<b>&raquo;<?php echo $found_oi1['answer']; ?></b>
											
						  </tr>
							</td>
						  
						  <tr>
                          
							<td style="border:none">&raquo;Details:
							
						</td>
						  </tr>
						  <tr>
                          	
							<td style="border:none"><b>&raquo; <?php echo $found_oi1['details']; ?></b></td>
							
						  </tr>
                          
                          <tr>
                          	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
						  
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?</td>
							
							<?php 
							$find_oi2=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q36_b'");
							$found_oi2=mysql_fetch_assoc($find_oi2)
							?>
							
							<td style="border:none"><b>&raquo; <?php echo $found_oi2['answer'] ?></b></td>
						  </tr>
						  <tr>
                          	
							<td style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td style="border:none"><b>&raquo; <?php echo $found_oi2['details'] ?></b></td>
							
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
						</table><!--close q36 -->

						<table class="table" width="816">
						  <tr>
							<td width="600" style="border:none" style="background-color:#EAEAEA;">37. a. Have you ever been formally charged?</td>
							 <?php 
							$find_oi3=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q37_a'");
							$found_oi3=mysql_fetch_assoc($find_oi3);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi3['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi3['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
							<td  style="border:none" style="background-color:#EAEAEA;">b. Have you ever been guilty of any administrative offense?</td>
							<?php 
							$find_oi4=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q37_b'");
							$found_oi4=mysql_fetch_assoc($find_oi4);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi4['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi4['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  
						</table><!--close q37 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                            
                            
							<?php 
							$find_oi5=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q38'");
							$found_oi5=mysql_fetch_assoc($find_oi5);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi5['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi5['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  
						</table><!--close q38 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</td>
							<?php 
							$find_oi6=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q39'");
							$found_oi6=mysql_fetch_assoc($find_oi6);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi6['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi6['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						</table><!--close q39 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">40. Have you ever been a candidate in a national or local election (except Barangay election)?</td>
							<?php 
							$find_oi7=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q40'");
							$found_oi7=mysql_fetch_assoc($find_oi7);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi7['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi7['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						</table><!--close q40 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
							<td width="200" style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">a. Are you a member of any indigenous group?</td>
							<?php 
							$find_oi8=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_a'");
							$found_oi8=mysql_fetch_assoc($find_oi8);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi8['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi8['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">b. Are you differently abled?</td>
							<?php 
							$find_oi9=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_b'");
							$found_oi9=mysql_fetch_assoc($find_oi9);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi9['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi9['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">c. Are you a solo parent?</td>
							<?php 
							$find_oi10=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_c'");
							$found_oi10=mysql_fetch_assoc($find_oi10);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi10['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi10['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						</table><!--close q41 -->
						
						<br/>
						<table class="table" width="816">
                        	
                        
						  <tr>
							<td colspan="4" style="border:none" style="background-color:#EAEAEA;">42. REFERENCES</td>
						  </tr>

						  <tr>
							<td style="text-align:center;" style="background-color:#EAEAEA;">NAME</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">ADDRESS</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">TEL NO.</td>
							
						
						 </tr>
						  <?php  
							$find_ref=mysql_query("SELECT * FROM eis_reference_t WHERE emp_id='$emp_id'");
							while($found_ref=mysql_fetch_assoc($find_ref)){
						  ?>  
						  <tr>
							<td align="center" ><b><?php echo $found_ref['name']; ?></b></td>
							<td align="center"><b><?php echo $found_ref['address']; ?></b></td>
							<td align="center"><b><?php echo $found_ref['tel_no']; ?></b></td>
						  </tr>
						<?php } ?> 
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						  <tr>
							<td colspan="3" style="border:none" style="background-color:#EAEAEA;">43. I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.</td>
						  </tr>
						  <tr>
							<td colspan="3" rowspan="2" style="border:none" style="background-color:#EAEAEA;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.</td>
						  </tr>
						  <tr>
							<td style="border:none" align="center"></td>

						  </tr>
						</table>
						
						<br />
						
					   
              </div>   
					
					
           </form>  
           <div style="width:auto;margin-left:auto;margin-right:auto;">
					<a id="Back" onClick="window.history.back();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<a id="printButton" onClick="window.open('eis_emp_PDS.php?emp_id=<?php echo $emp_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1050, height=900,position=center').printpage()" class="button grey block left"><span class="icon-print"></span>Open PDS on Optimized Window and Print</a>
					
			</div>
<?php 


	
} 


?>           
	
		
		
		</section>
            
          </div>
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
<?php 
}
}
}
?>