<!DOCTYPE html>
<?php 
 session_start();
 include('../db/db.php');
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

		
?>
<?php 
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

	<link href="../css/pages/reports.css" rel="stylesheet" />

<link href="../js/plugins/cirque/cirque.css" rel="stylesheet" />
  
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
			    <li class="active"> <a href="eis_admin_dashboard.php"> <i class="icon-home"></i><span class="shortcut-label">Dashboard</span></a></li>
			    <li> <a href="eis_admin_manage_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Manage Leaves</span></a></li>
                
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
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-search"></i>
          <h3>Search Employees</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">	
	<form action="eis_admin_dashboard.php" method="post" class="mini">
				<table>
				<tr>
				<td>Search by:</td>
				<td>
				<select name="category">
				<option value="f_name">First name</option>
				<option value="l_name">Last name</option>
				<option value="teaching">Teaching staff</option>
				<option value="non-teaching">Non-teaching staff</option>

				
				<option value="address">Address</option>
				<option value="gender">Gender</option>
				<option value="civil_status">Civil status</option>

				<option value="name_of_school">School graduated</option>
				<option value="degree_course">Course taken</option>
				</select>
				</td>
				<td><input name="tofind" type="text" /></td>
				<td></i></span><input name="search" type="submit" value="Search" class="btn-info" ></input></td>
				</tr>
				</table>
				</form>
				
				<?php
if(isset($_POST['search'])){
	$category = $_POST['category'];
	$tofind = $_POST['tofind'];
	?>
	<tr>
	<td><i class="icon-search"></i>&nbsp;<strong>Search Results For Category:&nbsp; </strong><?php echo ucfirst($category); ?></td>
	</tr>
	<br/>
	<tr>
	<td><i class="icon-search"></i>&nbsp;<strong>To Find:&nbsp; </strong><?php echo $tofind; ?></td>
	</tr>
	<tr>
	<td><hr /></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
	
    <table width="100%" class="table table-bordered table-striped">
	<tr>	
		<th align="left">Full Name</th>
		<th align="right">Picture</th>
	</tr>
	
    <?php
	
	if($category == 'f_name'){
		$queryfname = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		while($getfname = mysql_fetch_assoc($queryfname)){
			$empid1 = $getfname['emp_id'];
			?>
            <tr>
            <td align="left">
            <a href="eis_admin_view_emp.php?emp_id=<?php echo $empid1; ?>"><?php echo $getfname['f_name'].'&nbsp;'.$getfname['m_name'].'&nbsp;'.$getfname['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname1= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid1'");
	  $getpicname1 = mysql_fetch_assoc($querypicname1);
	  $picname1 = $getpicname1['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname1 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
			
		}
	}
	?>
  <?php
	
	if($category == 'l_name'){
		$querylname = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		while($getlname = mysql_fetch_assoc($querylname)){
			$empid2 = $getlname['emp_id'];
			?>
            <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $empid2; ?>"><?php echo $getlname['f_name'].'&nbsp;'.$getlname['m_name'].'&nbsp;'.$getlname['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname2= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid2'");
	  $getpicname2 = mysql_fetch_assoc($querypicname2);
	  $picname2 = $getpicname2['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname2 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'address'){
		$queryadd = mysql_query("SELECT * FROM employee_t WHERE address like \"%$tofind%\"");
		while($getadd = mysql_fetch_assoc($queryadd)){
			$empid3 = $getadd['emp_id'];
			?>
            <tr>
            <td align="left">
            <a   href="eis_admin_view_emp.php?emp_id=<?php echo $empid3; ?>"><?php echo $getadd['f_name'].'&nbsp;'.$getadd['m_name'].'&nbsp;'.$getadd['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname3= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid3'");
	  $getpicname3 = mysql_fetch_assoc($querypicname3);
	  $picname3 = $getpicname3['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname3 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'gender'){
		$querygender = mysql_query("SELECT * FROM employee_t WHERE gender like \"%$tofind%\"");
		while($getgender = mysql_fetch_assoc($querygender)){
			$empid4 = $getgender['emp_id'];
			?>
            <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $empid4; ?>"><?php echo $getgender['f_name'].'&nbsp;'.$getgender['m_name'].'&nbsp;'.$getgender['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname4= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid4'");
	  $getpicname4 = mysql_fetch_assoc($querypicname4);
	  $picname4 = $getpicname4['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname4 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'civil_status'){
		$querycs = mysql_query("SELECT * FROM employee_t WHERE civil_status like \"%$tofind%\"");
		while($getcs = mysql_fetch_assoc($querycs)){
			$empid5 = $getcs['emp_id'];
			?>
            <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $empid5; ?>"><?php echo $getcs['f_name'].'&nbsp;'.$getcs['m_name'].'&nbsp;'.$getcs['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname5= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid5'");
	  $getpicname5 = mysql_fetch_assoc($querypicname5);
	  $picname5 = $getpicname5['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname5 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'name_of_school'){
		$querynamesch = mysql_query("SELECT * FROM eis_educ_bg_t WHERE name_of_school like \"%$tofind%\"");
		while($getnamesch = mysql_fetch_assoc($querynamesch)){
			$empid6 = $getnamesch['emp_id'];
			$querynameschool = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$empid6'");
			$getnameschool = mysql_fetch_assoc($querynameschool);
			?>
            <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $empid6; ?>"><?php echo $getnameschool['f_name'].'&nbsp;'.$getnameschool['m_name'].'&nbsp;'.$getnameschool['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname6= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid6'");
	  $getpicname6 = mysql_fetch_assoc($querypicname6);
	  $picname6 = $getpicname6['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname6 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'degree_course'){
		$querydegree = mysql_query("SELECT * FROM eis_educ_bg_t WHERE degree_course like \"%$tofind%\"");
		while($getdegree = mysql_fetch_assoc($querydegree)){
			$empid7 = $getdegree['emp_id'];
			$querydeg = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$empid7'");
			$getdeg = mysql_fetch_assoc($querydeg);
			?>
            <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $empid7; ?>"><?php echo $getdeg['f_name'].'&nbsp;'.$getdeg['m_name'].'&nbsp;'.$getdeg['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname7= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid7'");
	  $getpicname7 = mysql_fetch_assoc($querypicname7);
	  $picname7 = $getpicname7['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname7 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'teaching'){
		$queryfirst = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		$count4first = mysql_num_rows($queryfirst);
		if($count4first > 0){
		while($getfirst = mysql_fetch_assoc($queryfirst)){
			$emp = $getfirst['emp_id'];
		$queryrole = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp'");
		$getrole = mysql_fetch_assoc($queryrole);
		$role = $getrole['role_id'];
		
		$querypos = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role'");
		$getpos = mysql_fetch_assoc($querypos);
		$pos = $getpos['position_type'];
		
		if($pos == $category){
			?>
			 <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $emp; ?>"><?php echo $getfirst['f_name'].'&nbsp;'.$getfirst['m_name'].'&nbsp;'.$getfirst['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname8= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp'");
	  $getpicname8 = mysql_fetch_assoc($querypicname8);
	  $picname8 = $getpicname8['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname8 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}else{
		
		$querylast = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		$count4last = mysql_num_rows($querylast);
		if($count4last > 0){
		while($getlast = mysql_fetch_assoc($querylast)){
			$emp2 = $getlast['emp_id'];
		$queryrole2 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp2'");
		$getrole2 = mysql_fetch_assoc($queryrole2);
		$role2 = $getrole2['role_id'];
		
		$querypos2 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role2'");
		$getpos2 = mysql_fetch_assoc($querypos2);
		$pos2 = $getpos2['position_type'];
		
		if($pos2 == $category){
			?>
			 <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $emp2; ?>"><?php echo $getlast['f_name'].'&nbsp;'.$getlast['m_name'].'&nbsp;'.$getlast['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname9= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp2'");
	  $getpicname9 = mysql_fetch_assoc($querypicname9);
	  $picname9 = $getpicname9['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname9 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}
		}
		
	}
?>
  <?php
	
	if($category == 'non-teaching'){
		$queryfirst2 = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		$count4first2 = mysql_num_rows($queryfirst2);
		if($count4first2 > 0){
		while($getfirst2 = mysql_fetch_assoc($queryfirst2)){
			$emp3 = $getfirst2['emp_id'];
		$queryrole3 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp3'");
		$getrole3 = mysql_fetch_assoc($queryrole3);
		$role3 = $getrole3['role_id'];
		
		$querypos3 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role3'");
		$getpos3 = mysql_fetch_assoc($querypos3);
		$pos3 = $getpos3['position_type'];
		
		if($pos3 == $category){
			?>
			 <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $emp; ?>"><?php echo $getfirst2['f_name'].'&nbsp;'.$getfirst2['m_name'].'&nbsp;'.$getfirst2['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname10= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp3'");
	  $getpicname10 = mysql_fetch_assoc($querypicname10);
	  $picname10 = $getpicname10['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname10 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}else{
		
		$querylast2 = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		$count4last2 = mysql_num_rows($querylast2);
		if($count4last2 > 0){
		while($getlast2 = mysql_fetch_assoc($querylast2)){
			$emp4 = $getlast2['emp_id'];
		$queryrole4 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp4'");
		$getrole4 = mysql_fetch_assoc($queryrole4);
		$role2 = $getrole2['role_id'];
		
		$querypos4 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role4'");
		$getpos4 = mysql_fetch_assoc($querypos4);
		$pos4 = $getpos4['position_type'];
		
		if($pos4 == $category){
			?>
			 <tr>
            <td align="left">
            <a  href="eis_admin_view_emp.php?emp_id=<?php echo $emp4; ?>"><?php echo $getlast2['f_name'].'&nbsp;'.$getlast2['m_name'].'&nbsp;'.$getlast2['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname11= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp4'");
	  $getpicname11 = mysql_fetch_assoc($querypicname11);
	  $picname11 = $getpicname11['pic_name'];
	  
			?>
        <img style="height:50px;width:50px" src="../eis/include/dpic/<?php echo $picname11 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}
		}
		
	}
?>

</table>
<?php
}
?>
				
				</div>
				</div>
			
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-dashboard"></i>
          <h3>Dashboard Reports</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
          
          
          <div class="widget widget-nopad stacked">
				<div class="widget-content">
				
				<?php
				include("../db/db.php");
				$query = mysql_query("SELECT * FROM employee_t");
				$pcount = 0;
				while($res = mysql_fetch_assoc($query)){
				$pcount++;
				}
				?>
					<a href="?view=Employees" class="stat simple" data-value=<?php echo $pcount; ?> data-title="Employees" data-format="+0"></a> <!-- clickable! -->
				<?php echo '<h3 align="center">The System has <b>"'.$pcount.'"</b> Employees recorded.</h3>'; ?>
				
				</div>
				</div>
          
          <section id="accordions">
						
						<div class="accordion" id="basic-accordion">
						
						
							
				            
				            <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne"><i class="shortcut-icon icon-user"></i>&nbsp;&nbsp;
				                  Employees
				                </a>
				              </div>
				              <div id="collapseOne" class="accordion-body in collapse">
				                <div class="accordion-inner">
				                  <div class="grid_12 center-elements">
			
				
				
				<!--<div class="full-stats">-->
				<?php
				include("../db/db.php");
				$query = mysql_query("SELECT * 
							FROM employee_t, employee_role_t, employee_position_t
							WHERE employee_t.emp_id = employee_role_t.emp_id
							AND employee_role_t.role_id = employee_position_t.position_id
							AND employee_position_t.position_type =  'teaching'");
				$cp_count = 0;
				while($res = mysql_fetch_assoc($query)){
				$cp_count++;
				}
				?>
					<a href="?view=Employees" class="stat simple" data-value=<?php echo $cp_count; ?> data-title="Teaching" data-format="+0"></a> <!-- clickable! -->
				<?php //echo $cp_count; ?>
				<!--</div>-->
				
				
				<!--<div class="full-stats">-->
				<?php
				$query = mysql_query("SELECT * 
						FROM employee_t, employee_role_t, employee_position_t
						WHERE employee_t.emp_id = employee_role_t.emp_id
						AND employee_role_t.role_id = employee_position_t.position_id
						AND employee_position_t.position_type =  'non-teaching'");
				$rp_count = 0;
				while($res = mysql_fetch_array($query)){
				$rp_count++;
				}
				?>
					<a href="?view=Employees" class="stat simple" data-value=<?php echo $rp_count; ?> data-title="Non-Teaching" data-format="+0"></a>
					<?php //echo $rp_count; ?>				<!-- clickable! -->
				<!--</div>-->
	
			
				<!--<div class="full-stats">-->
				<?php
				$query = mysql_query("SELECT * FROM account_t WHERE type='employee'");
				$user_count = 0;
				while($res = mysql_fetch_array($query)){
				$user_count++;
				}
				?>
					<a href="?view=Users" class="stat simple" data-value=<?php echo $user_count; ?> data-title="Users" data-format="+0"></a> <!-- clickable! -->
					<?php //echo $user_count; ?>
				<!--</div>-->
				
				
		
			<!--	<div class="widget big-stats-container stacked">
      			
      			<div class="widget-content">
      				
		      		<div id="big_stats" class="cf">
						<div class="stat">								
							<h4>Teaching Employees</h4>
							<span class="value"><?php //echo $cp_count; ?></span>								
						</div> 
						
						<div class="stat">								
							<h4>Non-Teaching Employees</h4>
							<span class="value"><?php //echo $rp_count; ?></span>								
						</div> 
						
						<div class="stat">								
							<h4>User Accounts</h4>
							<span class="value"><?php //echo $user_count; ?></span>								
						</div> 
						
					</div>
				
				</div>
				
			</div> -->
				
				
				
				
			</div>
			
		<div class="container">
		<div class="row">
			<div class="span6" >
      		
      		<div class="widget stacked" >
					
				<div class="widget-header">
					<i class="icon-group"></i>
					<h3>Employee Statistical Report</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:350px" colspan="6">
					
					<div class="cirque-stats">
					
						
						<?php 
							$count_roles=mysql_query("SELECT * FROM employee_role_t");
							$total_role=mysql_num_rows($count_roles);
						?>
						<table class="table table-striped table-bordered " align="center">
						<tr align="center">
						<td align="center"><h5>TEACHING</h5></td>
						<td align="center">
						<div align="center" class="ui-cirque" data-value="<?php echo $cp_count; ?>" data-total="<?php echo $total_role ?>" data-arc-color="#FF9900" data-label="ratio" ></div>
						</td>
						<td><a class="btn btn-mini" onClick="window.open('print_teaching_list.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1000, height=900,position=center');">View Employees</a></td>
						</tr>
						<tr align="center">
						<td align="center"><h5>NON-TEACHING</h5></td>
						<td align="center">
						<div align="center" class="ui-cirque" data-value="<?php echo $rp_count; ?>" data-total="<?php echo $total_role ?>" data-arc-color="#BB7700" data-label="ratio" ></div>
						</td>
						<td><a class="btn btn-mini" onClick="window.open('print_non_teaching_list.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1000, height=900,position=center');">View Employees</a></td>
						</tr>
						</table>
					        
					        
					    </div> 
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->
				
				<div class="span6">	
			
				<div class="widget stacked">
					
					<div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h3>Employee Gender Report</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content" style="height:350px">
					
					<table class="table table-bordered " align="center">
						<tr align="center">
						<td align="center"><div id="gender-chart" class="chart-holder"></div></td> <!-- /pie-chart -->
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td align="center"><a class="btn btn-mini" onClick="window.open('print_male_list.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1000, height=900,position=center');">View Male Employees</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="btn btn-mini" onClick="window.open('print_female_list.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1000, height=900,position=center');">View Female Employees</a></td>
						
						</tr>
					</table>	
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->			
			
			</div> <!-- /span6 -->
			
		</div>
		</div>
				
	
			
				                  
				                </div>
				              </div>
				            </div>
							
				            <div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo"><i class="shortcut-icon icon-file"></i>&nbsp;&nbsp;
				                  Leaves
				                </a>
				              </div>
				              <div id="collapseTwo" class="accordion-body in collapse">
				                <div class="accordion-inner">
				                  <div class="grid_12 center-elements">
			
				<div class="full-stats">
				<?php 
				
				
				$query = mysql_query("SELECT * FROM eis_leave_t WHERE leave_status='PENDING'");
				$lp_count = 0;
				while($res = mysql_fetch_array($query)){
				$lp_count++;
				}
				
				$query = mysql_query("SELECT * FROM eis_leave_t WHERE leave_status='APPROVED'");
				$laprv_count = 0;
				while($res = mysql_fetch_array($query)){
				$laprv_count++;
				}
				
				$query = mysql_query("SELECT * FROM eis_leave_t WHERE leave_status='DISAPPROVED'");
				$ldsaprv_count = 0;
				while($res = mysql_fetch_array($query)){
				$ldsaprv_count++;
				} 
				?>
					
                    
				</div>
				
				<div class="widget big-stats-container stacked">
      			
      			<div class="widget-content">
      				
		      		<div id="big_stats" class="cf">
						<div class="stat alert-success">								
							<h4>Pending</h4>
							<span class="value"><a href="eis_admin_manage_leave.php"><?php echo $lp_count; ?></a></span>								
						</div> <!-- .stat -->
						
						<div class="stat alert-info">								
							<h4>Approved</h4>
							<span class="value"><?php echo $laprv_count; ?></span>								
						</div> <!-- .stat -->
						
						<div class="stat alert-danger">								
							<h4>Disapproved</h4>
							<span class="value"><?php echo $ldsaprv_count; ?></span>								
						</div> <!-- .stat -->
						
					</div>
				
				</div> <!-- /widget-content -->
				
			</div>
				
				
				
			</div>
				                </div>
				              </div>
				            </div>
							
							
							
							<div class="accordion-group">
				              <div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo"><i class="shortcut-icon icon-file"></i>&nbsp;&nbsp;
				                  Departments
				                </a>
				              </div>
				              <div id="collapseTwo" class="accordion-body in collapse">
				                <div class="accordion-inner">
				                  <div class="row" >	
		
											<div class="span6" align="center">
											
												<div class="widget stacked">
													
													<div class="widget-header">
														<i class="icon-bar-chart"></i>
														<h3>Department Report Chart</h3>
													</div> <!-- /widget-header -->
													
													<div class="widget-content">
													
														<div id="donut-chart" class="chart-holder"></div> <!-- /bar-chart -->
													
													</div> <!-- /widget-content -->
												
												</div> <!-- /widget -->			
											
											</div> <!-- /span6 -->
												
												
										
										
										</div> <!-- /row -->
				                </div>
				              </div>
				            </div>
							
				          </div>
							      
							</section>
          
          
            <p>&nbsp;</p>
          </div>
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
<!-- InstanceEnd -->
<script src="../js/plugins/cirque/cirque.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script type="text/javascript">
				$(function () {
					
						var data_g = [2];
						var i=0;
						<?php
							include("../db/db.php");					
							$count_offMale=0;
							$query_offMale=mysql_query("SELECT * from employee_t WHERE gender='Male'");
								while($row_off=mysql_fetch_assoc($query_offMale)){
								//$genname=$row_off['gender'];
								$count_offMale=mysql_num_rows($query_offMale);
						}?>
						<?php
						if($count_offMale>=1){
						?>
						data_g[0] = { label: "Male - <?php echo $count_offMale;?>", data: <?php echo $count_offMale;?> }
						<?php 
						}
						?>
						
						<?php
							include("../db/db.php");						
							$count_offFemale=0;
							$query_offFemale=mysql_query("SELECT * from employee_t WHERE gender='Female'");
								while($row_off=mysql_fetch_assoc($query_offFemale)){
								//$genname=$row_off['gender'];
								$count_offFemale=mysql_num_rows($query_offFemale);
						}?>
						<?php
						if($count_offFemale>=1){
						?>
						data_g[1] = { label: "Female - <?php echo $count_offFemale;?>", data: <?php echo $count_offFemale;?> }
						<?php 
						}
							
						?>
					
					$.plot($("#gender-chart"), data_g, 
					{
							colors: ["#F90", "#222"],
							series: {
								pie: { 
									show: true,
									label: {
										show: false,
										formatter: function(label, series){
											return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
										},
										threshold: 0.1
									}
								}
							},
							legend: {
								show: true,
								noColumns: 1, // number of colums in legend table
								labelFormatter: null, // fn: string -> string
								labelBoxBorderColor: "#888", // border color for the little label boxes
								container: null, // container (as jQuery object) to put legend in, null means default on top of graph
								position: "bottom", // position of default legend container within plot
								margin: [5, 10], // distance from grid edge to default legend container within plot
								backgroundOpacity: 0 // set to 0 to avoid background
							},
							grid: {
								hoverable: false,
								clickable: false
							},
					});
					
					
					
					var data = [];
					//var series = 3;
					
					<?php		
					$query_dept=mysql_query("SELECT * FROM department_t");
						while($row_dept=mysql_fetch_assoc($query_dept)){
								$dept=$row_dept['dept_name'];
								$dept_id=$row_dept['dept_id'];
											
								$count_off=0;
								$query_emp=mysql_query("SELECT * from employee_t WHERE dept_id = '$dept_id'");
									while($row_off=mysql_fetch_assoc($query_emp)){ 
										$count_off=mysql_num_rows($query_emp);
					}?>
					<?php
					if($count_off>=1){
					?>
					
					data[i] = { label:"<a href='eis_admin_view_deptList.php?dept_id=<?php echo $dept_id; ?>'><?php echo $dept; ?> </a> = <?php echo $count_off;?>", data: <?php echo $count_off;?> }
					i++;
					
					<?php 
					}
					}
					?>

					$.plot($("#donut-chart"), data,
					{
						colors: [],
							series: {
								pie: { 
									innerRadius: 0.5,
									show: true
								}
							}
					});
					
					});

					</script>
</html>
<?php 

}
?>
