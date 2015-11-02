<!DOCTYPE html>
<?php 
 @session_start();
  $_SESSION['username']; 
$username = $_SESSION['username'];


?>

<html lang="en"><!-- InstanceBegin template="/Templates/grading_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
 <?php
  @session_start();
  include "../db/db.php";
  include "../actions/user_privileges.php";
  
  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $adviser = is_privileged($_SESSION['account_no'], 10);
  $teacher = is_privileged($_SESSION['account_no'], 12);
  
  if(!$developer && !$super_admin && !$adviser && !$teacher){
      header("Location: restrict.php");  
  }
  
  ?>
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
							<?php echo $dbusername=$_SESSION['username']; ?>
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
			    <li> <a href="../home.php"> <i class="icon-chevron-left"></i> <span></span></a></li>
			    <li> <a href="grading_home.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">HOME</span></a></li>
                <li class="active"> <a href="grading_class.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">CLASS RECORD</span></a></li>
			    <li> <a href="grading_classadvisory.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">ADVISORY CLASS</span></a></li>
			    
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
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Dashboard</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
        
           <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Section name</th>
                        <th>Year Level</th>
                        <th>Subject Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 				     
					include('../db/db.php');
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sy_id=$row_sy['sy_id'];
					
					$act_q=mysql_query("SELECT * FROM account_t WHERE username='$username'");
					$act_data=mysql_fetch_assoc($act_q);
					$account_id=$act_data['account_no'];
					
					$empid_q=mysql_query("SELECT * FROM employee_account_t WHERE account_no='$account_id'");
					$empid_data=mysql_fetch_assoc($empid_q);
					$emp_id=$empid_data['emp_id'];
					
					$empid_q=mysql_query("SELECT * FROM employee_account_t WHERE account_no='$account_id'");
					$empid_data=mysql_fetch_assoc($empid_q);
					$emp_id=$empid_data['emp_id'];
					
					$sectionid_q=mysql_query("SELECT * FROM class_t WHERE teacher_id='$emp_id'");
					$sectionid_data=mysql_fetch_assoc($sectionid_q);
					$section_id=$sectionid_data['section_id'];
					
					
					$query_sec = mysql_query("SELECT * FROM class_t, section_t, subject_t WHERE class_t.section_id=section_t.section_id AND class_t.sy_id=$sy_id AND class_t.subject_code=subject_t.subject_code");
						while($row_sec=mysql_fetch_assoc($query_sec)){
							$subj_id=$row_sec['subject_code'];
							$subj_title=$row_sec['subject_title'];
							$sec_id=$row_sec['section_id'];
							$sec_name = $row_sec['section_name'];
                
                    $section_q = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id' ");
					$section_row=mysql_fetch_assoc($section_q);
					$section_row['year_level'];
					
					$sectionname_q = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id'");
					$sectionname_row=mysql_fetch_assoc($sectionname_q);
					$sectionname_row['section_name'];
					
					$sdata = $sectionid_data['subject_code'];
					$subjectT_q = mysql_query("SELECT * FROM subject_t WHERE subject_code='$sdata'");
					$subjectT_row=mysql_fetch_assoc($subjectT_q);
                    
                    $yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row_sec['year_level']}'");
					$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);
					?>
                    
                    <tr class=" odd del<?php echo $section_id; ?>">
                     
                      <td ><?php echo $section_id; ?></td>
                      <td><?php echo $sec_name; ?></td>
                      <td><?php echo $yr_lvl_data['lvl_name'];?></td>
                      <td><?php echo $subj_title; ?></td>
                      <td align="center">
                          <a class='btn btn-mini' href='grading_class_viewclass.php?section_id=<?php echo $sec_id;?>&&subject_code=<?php echo $subj_id; ?>'> VIEW </a>
                          
                      </td>
                    </tr>
                    
                <?php }?> 
                </tbody>
		</table>
            
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
