<!DOCTYPE html>
<?php 
 @session_start();
 
 
 if(isset($_GET['section_id'])){
  $section_id = $_GET['section_id'];  
}

include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
include "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/load_schedule.php"; //to pre-load schedule on the time table.

if(!isset($_GET['sy_id'])){
    load_sched($_GET['section_id'], get_active_sy());
	$school_yr = get_active_sy();
}
else{
	
    load_sched($_GET['section_id'], $_GET['sy_id']);
	$school_yr = $_GET['sy_id'];
}



?>

<html lang="en"><!-- InstanceBegin template="/Templates/sched_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <?php
  @session_start();
  include "../db/db.php";
  include "../actions/user_privileges.php";
  
  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $scheduling_admin = is_privileged($_SESSION['account_no'], 6);
  $scheduling_officer = is_privileged($_SESSION['account_no'], 14);
  
  if(!$developer && !$super_admin && !$scheduling_admin && !$scheduling_officer){
      header("Location: restrict.php");  
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

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">

  </style>
  <style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
  </style>
<!-- InstanceBeginEditable name="head" -->
  	<link href="./js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="./js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="./js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <title>Pagasa National Highschool:: Base Admin</title>
  <link rel="stylesheet" href="css/tables.css" type="text/css" media="screen"/>

<?php 	


			     
$color = array(
	"#C6D9F0",
	"#DBE5F1",
	"#F2DCDB",
	"#EBF1DD",
	"#E5E0EC",
	"#DBEEF3",
	"#FDEADA",
	"#FBD5B5");
	include('../db/db.php');
	$sy_id=get_active_sy();
	$query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']} AND sy_id={$school_yr}");
	$class = array();
	$i=0;
	while($row = mysql_fetch_assoc($query)){
	  $class_id = $row['class_id'];	
	  
	  $class_color[$class_id] = $color[$i%8];
	  $i++;
	
	}
?>
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
				Pagasa National Highschool <sup>1.0.3</sup>
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
			  <ul class="mainnav">
                <li> <a href="../home.php"> <i class=" icon-home"></i> <span>Home</span> </a> </li>
                <?php if($developer || $scheduling_officer || $scheduling_admin){ ?>
                <li> <a href="schedules.php"> <i class="icon-calendar"></i> <span>Schedules</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
	   	        <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="subjects.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Subjects</span> </a> </li>
		        <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="room.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="teachers.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teachers</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_officer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown active" > <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> 
                    <ul class="dropdown-menu">
                        <li><a href="reports_section.php">Schedules</a></li>
                        <li><a href="report_list_subject.php">List of Subjects</a></li>
                        <li><a href="report_list_section.php">List of Sections</a></li>
                    </ul> 
                </li>
    			<?php } ?>
				<?php if($developer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
                    <ul class="dropdown-menu">
                        <li><a href="curriculums.php">Curriculums</a></li>
                        <li><a href="year_levels.php">Year levels</a></li>
                        <li><a href="category.php">Subject Categories</a></li>
                    </ul> 				
                </li>
                <?php } ?>
		      </ul>
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
    <div class="span8">
    <div class="widget stacked widget-table action-table">
        <div class="widget-header"> 
          <a class="btn btn-mini" href="reports_section.php" style="margin-bottom:-6px;"><i class="btn-icon-only icon-chevron-left"></i> back</a> 
          <i class="icon-pencil"></i>
          <?php
          $query = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'") or die(mysql_error());
		  $row = mysql_fetch_assoc($query);
		  $sy_start = $row['sy_start'];
		  $sy_end = $row['sy_end'];
		  ?>
          <h3>Schedule :: S.Y. <?php echo $sy_start." - ".$sy_end?></h3>
        </div>
        
        <!-- /widget-header -->
        <div class="widget-content" style=" ">
            <table style="width:100%; " class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Subject Title</th>
              <th>Subject Category</th>
              <th>Credit Unit</th>
              <th>Hours/Week</th>
              <th>Teacher</th>
            </tr>
            </thead>
            <?php
              require_once "../db/db.php";
              //include "actions/class_functions.php";
              //$sy_id = get_active_sy();
              $total_unit=0;
              $query = mysql_query("SELECT * FROM class_t WHERE sy_id={$school_yr} AND section_id={$section_id}");
              while($row = mysql_fetch_assoc($query)){?>
                  <tr>
               
                  <td><center>
                  <?php // echo $row['subject_code'];
                      $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
                      $row_subject = mysql_fetch_assoc($query_subject);
                      echo $row_subject['subject_title']; 
                  ?></center>
                  </td>
                     <td>
                     <center> 
                    <?php
                           $query_subj=mysql_query("SELECT * FROM subject_category_t WHERE category_id='{$row_subject['category_id']}'"); 
                           $row_subj=mysql_fetch_assoc($query_subj);
                           echo $row_subj['category_name'];
                        ?></center>
                     </td>
                  <td>
                  <center>
				  <?php 
				      $total_unit += $row_subject['credit_unit'];
				      echo $row_subject['credit_unit'];
				  ?>
                  </center>
                  </td>
                  <td>
                  <center>
				  <?php 
				      $time = unit_to_time($row_subject['credit_unit']);
				      $time = round($time*4)/4;
				      $whole1 = (int) $time;
				      $frac1 = (($time*100)%100)*.6;
				      printf(" %d:%02d", $whole1, $frac1);
				  ?>
                  </center>
                  </td>
                  <td class="">
                  <center>
                  <?php //echo $row['teacher_id'];
				      if($row['teacher_id']!=NULL){
						  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$row['teacher_id']}");
						  $row_teacher = mysql_fetch_assoc($query_teacher);
						  echo $row_teacher['f_name']." ".$row_teacher['l_name'];
					  }
                  ?>
                  </center>
                  </td>
                 
                  </tr>
            <?php
              }
            ?>
            	  <tfoot>
                    <tr>
                      <td colspan="2"><div align="right">TOTAL: </div></td>
                      <td><center><?php echo $total_unit;?></center></td>
                      <td>
                      <center>
                      <?php 
						  $time = unit_to_time($total_unit);
						  $time = round($time*4)/4;
						  $whole1 = (int) $time;
						  $frac1 = (($time*100)%100)*.6;
						  printf(" %02d:%02d", $whole1, $frac1);
					  ?>       
                      </center>                
                      </td>
                      <td></td>
                    </tr>
                  </tfoot>
            </table>

        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
      </div>
      
      
      <div class="span4">
      <div class="widget stacked widget-table action-table">
        <div class="widget-header"> 
          <i class=" icon-wrench"></i>
          <h3>Info</h3>
        </div>
        
        <div class="widget-content">
          <form name="settings" action="<?php echo $_SERVER['REQUEST_URI']?>" method="GET">
          <table style="width:100%" class="table table-bordered table-striped">
            
                <?php 
				  require_once "../db/db.php";
				  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id'");
				  $row_section = mysql_fetch_assoc($query_section);
				  
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
				  $row_sy = mysql_fetch_assoc($query_sy);
				?>
            <tr >
              <td>Section Name: </td>
			  <td><?php echo $row_section['section_name'];?> <br /></td>
            </tr>
            <tr >
              <td>Year Level: </td>
			  <td>
			  <?php $year_level = $row_section['year_level'];
			      $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id={$year_level}") or die(mysql_error());
				  $row_lvl = mysql_fetch_assoc($query_lvl);
				  echo ucfirst($row_lvl['lvl_name']);
			  ?> 
              </td>
            </tr>
            <tr >
              <td>Curriculum: </td>
			  <td><?php echo $row_section['curriculum_code'];?> <br /></td>
            </tr>
            <tr >
              <td>Total Units: </td>
			  <td><?php echo $total_unit;?> <br /></td>
            </tr>
            <tr >
              <td>Hours/Week: </td>
			  <td>
			  <?php 
				  $time = unit_to_time($total_unit);
				  $time = round($time*4)/4;
				  $whole1 = (int) $time;
				  $frac1 = (($time*100)%100)*.6;
				  printf(" %02d:%02d", $whole1, $frac1);
			  ?> 
              </td>
            </tr>
            <tr >
              <td>School Year: </td>
              <td> <?php //echo $row_sy['sy_start']." - ".$row_sy['sy_end'];?>
                  <select name="sy_id" id="sy_id" style="width:auto;">
                  <?php
                      $query = mysql_query("SELECT * FROM school_year_t ") or die(mysql_error());
					  while($row = mysql_fetch_assoc($query)){ ?>
						  <option  <?php echo ($row['sy_id']==$school_yr)? "selected":"";?> value="<?php echo $row['sy_id'];?>"><?php echo $row['sy_start']." - ".$row['sy_end'];?></option>
                      <?php    
					  }
				  ?>
                  </select>
              </td>
            </tr>
            <tr>
              <td  colspan="2">
              <input type="hidden" name="section_id" value="<?php echo $_GET['section_id'];?>" >
              <input type="submit" class="btn btn-mini pull-right span1" value="VIEW"   />
              </td>
            </tr>
          </table>
          </form>
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
      </div>
      <!--</span>-->
      <div class="span4">
      <a class="btn btn-large btn-success" href="report_section.php?section_id=<?php echo $_GET['section_id']?>&sy_id=<?php echo isset($_GET['sy_id'])? $_GET['sy_id']:get_active_sy();?>"><i class="icon-print"></i> PRINT </a>
      <a class="btn btn-large btn" target="_blank" href="pdf_section.php?section_id=<?php echo $_GET['section_id']?>&sy_id=<?php echo isset($_GET['sy_id'])? $_GET['sy_id']:get_active_sy();?>"><i class="icon-print"></i> PDF </a>

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
     
<div class="modal fade hide" id="addSection">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <form>
      <input type="text">
  
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <a href="javascript:;" class="btn btn-primary">Save changes</a>
  </div>
    </form>
</div>
           
<script type="text/javascript" >

function goBack(){
	window.history.go(-1);
}

    window.onbeforeunload=function() {
		    
			$.ajax({
			url: "actions/truncate.php",
			type: "GET",
			data: {section_id:<?php echo $_GET['section_id'];?>},
			async : false
			});
    }
	
</script>
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
