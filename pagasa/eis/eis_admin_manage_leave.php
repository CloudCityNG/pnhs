<!DOCTYPE html>
<?php 
 @session_start();
 include('../db/db.php');

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
	<div class="widget stacked">
        <div class="widget-header"> <i class="icon-search"></i>
          <h3>Search Employees</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">	
	<form action="eis_admin_manage_leave.php" method="post" class="mini">
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
	
      <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-barcode"></i> Manage Employee Leaves and Leave Maintenance</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
           		<div id="demo">

					
                    <section id="accordions">
                      <div class="accordion" id="basic-accordion">
					  
					  
					<div class="content">
					
					
						
                        	<div class="accordion-group">
                            <div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne">
								<i class="icon-search"></i> View Employee Leave Credits</a>	
                            </div>
							
                            
                            <div id="collapseOne" class="accordion-body in collapse">
				                <div class="accordion-inner">
                                
                                <!--  -->

		
		
		<h3 class="grid_12 margin-top no-margin-top-phone">Employee Leave Credits Reports</h3>
				
					
					<div class="content">
					
						
							<!--<div class="left">
							<section id="modals">
								<a  href="#add_lc_dialog" id="add_lc" class="btn"data-toggle="modal" ><i class="icon-plus"></i>Add Leave Credits</a>
							</section><br/>
							</div>-->
							<div class="right"  ></div>
						
                        <br/>
						<table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
							<thead>
								<tr>
								  <th>Name</th>
								  <th>Sick Leave Balance</th>
								  <th>Vacation leave Balance</th>
								  <th>Total leave Balance</th>
								  
								</tr>
							</thead>
							<tbody>
						 <?php 
							 	$query=mysql_query("SELECT * FROM eis_leave_credits_t")or die(mysql_error());
								while($leave = mysql_fetch_assoc($query)){
								$id = $leave['emp_id'];
								$query2=mysql_query("SELECT * FROM employee_t WHERE emp_id='$id'")or die(mysql_error());
								$info = mysql_fetch_array($query2);
								
								
								$data = array(
								'name' => $info['l_name'].", ".$info['f_name'],
								'sick_bal' => $leave['sick_bal'],
								'vaca_bal' => $leave['vacation_bal'],
								'total_bal' => $leave['leave_balance'],
								
								);
								
								  ?>
							<tr>
								<td><a href="eis_admin_view_emp.php?emp_id=<?php echo $id;?>"><?php echo strtoupper($data['name']); ?></a></td>
								<td class="center"><div align="center"><?php echo $data['sick_bal']; ?></div></td>
								<td class="center"><div align="center"><?php echo $data['vaca_bal']; ?></div></td>
								<td class="center"><div align="center"><?php echo $data['total_bal']; ?></div></td>
							</tr>
							
						<?php 
										
									
							   }
							   ?>		
						</tbody>
						</table>
						
					</div><!-- End of .content -->
					

		
	
		
		
                              </div>  
				                </div>
				              </div>
                            
						
                        </div>
						
						
						<div class="content">
						
						<div class="accordion-group">
						<div class="accordion-heading">
				                <a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo">
								<i class="icon-shortcut icon-file"></i>
				                  Leave Application Status
				                </a>
				        </div>
						
						<div id="collapseTwo" class="accordion-body in collapse">
				        <div class="accordion-inner">
                        
						<table class="table-striped" id="example1" width="100%">
							<thead>
								<tr>
								  <th><div align="center">ID</div></th>
                                  <th><div align="center">Name</div></th>
								  <th><div align="center">Type Of Leave</div></th>
								  <th><div align="center">Date Applied</div></th>
								  <th><div align="center">Start Date</div></th>
								  <th><div align="center">End Date</div></th>
								  <th>Status</th>
                                  <th>Action</th>
							  </tr>
							</thead>
							<tbody>
						 <?php 
							 	$query=mysql_query("SELECT * FROM eis_leave_t WHERE leave_status = 'pending'")or die(mysql_error());
								while($leave = mysql_fetch_assoc($query)){
								$id = $leave['emp_id'];
								$query2=mysql_query("SELECT * FROM employee_t WHERE emp_id='$id'")or die(mysql_error());
								$info = mysql_fetch_array($query2);
								
								
								$data = array(
								'name' => $info['f_name']." ".$info['l_name'],
								'type_of_leave' => $leave['type_of_leave'],
								'date_applied' => $leave['date_of_filling'],
								'sdate' => $leave['start_of_leave'],
								'edate' => $leave['end_of_leave'],
								'status' => $leave['leave_status'],
								'id' => $leave['leave_id'],
								);
								
								  ?>
							<tr>
								<td class="center"><?php echo $id; ?></td>
                                <td class="center"><a href="eis_admin_view_emp.php?emp_id=<?php echo $id;?>" data-gravity=n title="Click to view this Leave"><?php echo strtoupper($data['name']); ?></a></td>
								<td class="center"><?php echo $data['type_of_leave']; ?></td>
								<td class="center"><?php echo $data['date_applied']; ?></td>
								<td class="center"><?php echo $data['sdate']; ?></td>
								<td class="center"><?php echo $data['edate']; ?></td>
								<td class="center"><div align="center"><span class="label label-success"><?php echo $data['status']; ?></span></div></td>
                                
								<td class="center">
                                  <div align="center">
                                	<a href="eis_admin_view_leave.php?leave_id=<?php echo $leave['leave_id'] ?>" class="btn-small btn-info"><i class="icon-file-alt"></i> View Details</a>                                  
                                  </div>
                                </td>
							</tr>
							
						<?php 
										
									
							   }
							   ?>		
						</tbody>
						</table>
						
                       
                        
					</div>
					</div>
					</div>
					
					</div><!-- End of .content -->
		
	
		
			 </div>
		</section>
            
            <br/>
            <br/>
          </div>
                </th>
                <th style="background-color:#F0F0F0">
                <a  href="eis_admin_manage_leave.php" class="btn btn-block" ><span><i class=" icon-file"></i></span>Manage Leave</a>
               <a  href="eis_admin_holidays.php" class="btn btn-block" ><span><i class=" icon-calendar"></i></span>Manage Holidays</a>
                <a  href="eis_admin_manage_credits.php" class="btn btn-block" ><span><i class=" icon-credit-card"></i></span>Manage Leave Credits</a>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
	  
<!-- Dialog with Form Elements START-->
							
							<div class="modal fade hide" style="display: none;" id="add_lc_dialog" title="Add Leave Credits">
							     <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h3>Add Credit</h3>
								 </div>
								<div class="modal-body">
								<form action="processLC.php" class="full validate" method="post">
									
										<label for="d1_textfield">
											<strong>Personnel Name</strong>
										</label>
										<div>
									
											<select name="emp_name" id="emp_name" class="search required" data-placeholder="Choose a Name">
												<option value=""></option>
													<?php 
													include ('../db/db.php');
										$query = mysql_query("SELECT * FROM employee_t") or die(mysql_error());
										while($row= mysql_fetch_array($query)){ 
											$data = array(
												'p_id' => $row['emp_id'],
												'fname' => $row['f_name'],
												'lname' => $row['l_name']
											);
											?>
												<option value="<?php echo $data['p_id']; ?>"><?php echo $data['fname']." ".$data['lname']; ?></option> 
												<?php } ?>
											</select>
											</div>
									
									
										<label for="d1_textarea_grow">
											<strong>Type Of Leave</strong>
										</label>
										<div>
											<select name="type_leave" id="type_of_leave" class="required" data-placeholder="Choose Type of Leave">
												<option value=""></option>
												<option value="Sick Leave">Sick Leave</option> 
												<option value="Vacation Leave">Vacation Leave</option> 
												<option value="Both">Both</option> 
											</select>	
											</div>
									
									
										<label for="d1_select">
											<strong>Leave Amount</strong>
										</label>
										<div>
											<select name="leave_amount" id="leave_amount"  class="required" data-placeholder="Choose an amount">
												<option value=""></option>
												<option value="5">5</option> 
												<option value="10">10</option> 
												<option value="15">15</option> 
											</select>
										</div>
									
								</form>
								</div>
								<div class="modal-footer">
								<div class="actions">
									<a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
									<div>
									<a href="javascript:;" class="btn btn-primary"><button class="submit">Submit</button></a>
									</div>
								</div>
								</div>
							</div>
			<script>
			$$.ready(function() {
// Dialog with Form Elements
				
				$( "#add_lc_dialog" ).dialog({
					autoOpen: false,
					modal: true,
					width: 400,
					open: function(){ $(this).parent().css('overflow', 'visible'); $$.utils.forms.resize() }
				}).find('button.submit').click(function(){
					var $el = $(this).parents('.ui-dialog-content');
					if ($el.validate().form()) {
						$el.find('form')[0].submit();
					}
				}).end().find('button.cancel').click(function(){
					var $el = $(this).parents('.ui-dialog-content');
					$el.find('form')[0].reset();
					$el.dialog('close');;
				});
				
				$( "#add_lc" ).click(function() {
					$( "#add_lc_dialog" ).dialog( "open" );
					return false;
				});
			});
			</script>
<!-- Dialog with Form Elements  END-->
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
