<!DOCTYPE html>

<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: restrict.php"); // IMPORTANT!!!!
?>
<html lang="en"><!-- InstanceBegin template="/Templates/sisadmin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
      <link href="./css/pages/reports.css" rel="stylesheet" />
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
							<i class="icon-user"></i>			<?php
							include('../db/db.php');
							
							$queryid = mysql_query("SELECT * FROM employee_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['emp_id'];
							$queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$id'");
							$getemp = mysql_fetch_assoc($queryemp);
							$fname = $getemp['f_name'];
							$lname = $getemp['l_name'];
							echo $fname.'&nbsp;'.$lname;
							?>
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
			  <ul class="mainnav">
                <li> <a href="sis-admin-home.php"> <i class="icon-calendar"></i> <span>Home</span> </a> </li>
			    <li class="active"> <a href="sis-admin-students.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Students</span> </a> </li>
	   	        <li> <a href="sis-admin-alumni.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Alumni</span> </a> </li>
		        <li> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Clubs</span> </a> </li>
			    <li> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Offenses</span> </a> </li>
		      </ul>
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
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>View Schedule</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
 
       <?php 
				 
				 if(isset($_GET['student_id']));
				 $student_id=$_GET['student_id'];
			require('../db/db.php');
				 
			$toquery4 = "select * from student_t where student_id = '$student_id'";
				$querystud4 = mysql_query($toquery4);
				$findstud4 = mysql_fetch_assoc($querystud4);
				$student_id1 = $findstud4['student_id'];
				
				$querystud = mysql_query("SELECT * FROM student_registration_t WHERE student_id = '$student_id1'");
				$getstud = mysql_fetch_assoc($querystud);
				$section = $getstud['section_id'];
		
			$toquery5 = "select * from section_t where section_id = '$section'";
				$querystud5 = mysql_query($toquery5);
				$findstud5 = mysql_fetch_assoc($querystud5);
				$section_id = $findstud5['section_id'];
				 
		?>

        <h2>Schedule of <?php echo $findstud4['f_name']." ".$findstud4['l_name'] ?></h2>
        <br />
        <h2>
        <?php
      //  $query = mysql_query("SELECT * FROM section_t WHERE section_id = '$section_id'");
		//$row = mysql_fetch_assoc($query);
		echo $findstud5['year_level']." - ".$findstud5['section_name'];
		
		$start_times = array('07:15', '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45');
		$end_times = array( '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45','16:45');
		$day_array = array('monday','tuesday','wednesday','thursday','friday');
		?>
        </h2>
	    <p>&nbsp;</p>
	    <table width="auto" border="1" bordercolor="#FFFFFF">
            <thead><tr bgcolor="#006666" style="color:white">
                <th width='100'>TIME</td>
                <?php
				$day_count = count($day_array);
                for($i=0;$i<$day_count;$i++){
					echo "<th width='200' >".$day_array[$i]."</td>";
				}
				?>
            </tr></thead>
        
          <?php
		  // $i === time interval
		  // $j === sections
		  for($i=0;$i<10;$i++){
			  echo "<tr bgcolor='#CEFFCE'>
					    <td bgcolor='#EDEEFE'><h6>$start_times[$i] - $end_times[$i]</h6></td>";
			  for($j=0;$j<$day_count;$j++){
				  $loaded_day_ID = $day_array[$j];
				  $start = $start_times[$i].":00";
				  $end = $end_times[$i].":00";
			      $q = mysql_query("SELECT * FROM class_schedule_t WHERE day='$loaded_day_ID' AND time_start<='$start' AND time_end>='$end' AND class_id='$section_id'");
			      if(mysql_num_rows($q)!=0){
					  $row = mysql_fetch_assoc($q);
					  $loaded_id = $row['load_id'];
					  
					  //Apply to function
					  $prof_query = mysql_query("SELECT * FROM employee_t WHERE emp_id='{$row['emp_id']}'");
					  $prof = mysql_fetch_assoc($prof_query);
					  $prof_name = $prof['l_name'].", ".$prof['f_name'];
					  
					  //Apply to function
					  $subj_query = mysql_query("SELECT * FROM subject_t WHERE subject_code='{$row['subject_code']}'");
					  $subj = mysql_fetch_assoc($subj_query);
					  $subj_name = $subj['subject_title'];
				      echo "<td bgcolor='#E24549'>$subj_name<p style='font-size:12px;'>{$row['room_no']}</p><p style='font-size:10px;'> $prof_name</p></td>";
				  }
				  else
				      echo "<td>&nbsp;</td>";
			  }
		      echo "</tr>";
		  }
		  ?>
          
        </table>
        
       
      </div>
      <!-- /span6 -->
      
    <!-- InstanceEndEditable -->
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
