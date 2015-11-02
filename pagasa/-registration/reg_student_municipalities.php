<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location: ../restrict.php");
}
?> 
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
$registrar= is_privileged($_SESSION['account_no'], 13);
$reg_admin= is_privileged($_SESSION['account_no'], 5);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$reg_admin && !$super_admin)
{
	header("Location: ../restrict.php");
	}

 ?>
<?php 
require ('../db/db.php');
$num=1;
$next_yr= date('Y')+$num;
$current_yr=date('Y');
?>

<html lang="en"><!-- InstanceBegin template="/Templates/reg_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    
   	<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

    
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
<link href="js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <title>Pagasa National Highschool:: Base Admin</title>
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
	
</div> <!-- /navbar --><!-- InstanceBeginEditable name="nav" --><div class="subnavbar">
  <div class="hide"> <img src="../images/banner.jpg"> </div>
  <div class="subnavbar-inner" >
    <div class="container" > <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse"> <i class="icon-reorder"></i> </a>
      <ul class="mainnav">
        <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
        <?php if($developer || $registrar){?>
        <li> <a href="reg_listofenrolledstudents.php"> <i class="icon-calendar"></i> <span>Enrollment</span></a></li>
        <?php } ?>
        <?php if($developer || $registrar){?> 
        <li> <a href="reg_classify.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Classification</span></a></li>
        <?php } ?>
        <?php if($developer || $reg_admin || $super_admin){?> 		
        <li class="dropdown active">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-file"></i> <span>
							Reports
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                        <li><a href="../-registration/reg_section.php">Masterlist</a></li>
                         <li><a href="../-registration/reg_list_of_alumni.php">List of Alumni</a></li>

                            <li class="dropdown-submenu">
			                  <a tabindex="-1" href="#">Statistical Report</a>
			                  <ul class="dropdown-menu">
			                    <li><a tabindex="-1" href="../-registration/reg_no_of_student_schyr.php">Students Enroll in a School Year</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_student_municipalities.php">Students in a Municipality</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_scholars.php">Scholars</a></li>

			                  </ul>
			            	</li>
                            
						<li class="divider"></li>
						<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li> 
       <?php } ?>   
        <?php if($developer || $reg_admin){?> 
    
						<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i> <span>
							Settings
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                            <li><a data-toggle="modal" href="#open_schoolyr">School Year</a></li>
							<li><a href="../-registration/reg_scholarship.php">Scholarship</a></li>
							<li><a href="../-registration/reg_municipality.php">Municipalities</a></li>

							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
        <?php } ?>
      </ul>
      <!-- /.subnav-collapse -->
    </div>

<!-- InstanceEndEditable --><!-- /subnavbar -->
    
    
 
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

<!--/smaller navbar--><!-- InstanceBeginEditable name="content" -->
<br />
<br />


<div class="main">

    <div class="container">
 	 <div class="">
      	<div class="span6">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Quick Stats</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<div id="pie-chart" class="chart-holder"></div>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->
      	
   
	
  			<div class="span4">
  				
  				<div class="widget stacked widget-table">
					
					<div class="widget-header">
						<span class="icon-external-link"></span>
						<h3>Number of Students</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th>Municipalities</th>
								<th>No. of Students</th>								
							</tr></thead>
					
						<tbody><tr>
							<?php 
							include("../db/db.php");
							$query_municipality=mysql_query("SELECT * FROM municipality_t");
							while($row_municipality=mysql_fetch_assoc($query_municipality)){
								$name=$row_municipality['municipality_name'];
								
							$count_name=0;
							$query_name=mysql_query("SELECT * from student_t WHERE city_municipality like '%$name%'");
										while($row_name=mysql_fetch_assoc($query_name)){ 
											$count_name=mysql_num_rows($query_name);
										}?>
                            			<td><?php echo $name; ?></td>
                                        
										<td><?php echo $count_name; ?> - 
                                        <?php 
											$query_student=mysql_query("SELECT * FROM student_t");
											$count_student=mysql_num_rows($query_student);
											$percent=($count_name/$count_student)*100;
											printf("%.2f%%", $percent);
										?></td>                           			
						</tr>
                        <?php } ?>
						
						
					</tbody></table>
						

					</div> <!-- .widget-content -->
					
				</div>
  				
		  </div> <!-- /span4 -->
      
	  </div> <!-- /row -->

   </div>
            <p align="center"><a class="btn btn-success" href="fpdf/reg_municipality_pdf.php">Save as PDF</a>       
  			<a class="btn btn-success" href="reg_student_municipality_report.php">PRINT</a> </p>

</div>

<!-- InstanceEndEditable --><!-- /main --><!-- /extra -->

<div class="modal fade hide" id="open_schoolyr">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>SCHOOL YEAR  <?php 
						echo $current_yr;
						echo "-";
						echo $next_yr; ?> </h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="open_school_year" id="validation-form" action="reg_home.php" method="post">
                              <fieldset>
						 <table class="table" width="816" >
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">NO. OF DAYS</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="days" id="days" />
						      </div>
						    </div> </td>
                            </tr>
                           
                      
                          
                             </table>                       
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="Open" value="OPEN" >

                              </fieldset>
                            </form>

  </div>
 </div>

    
    
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
		    "bJQueryUI": true
				});
	} );
</script>

  </body>
 <?php 
 error_reporting(0);
 foreach($year_level_tabs as $lvl){ ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tab<?php echo $lvl;?>').dataTable({
		    "bJQueryUI": true,
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": true,
			'iDisplayLength': 5,		});
	} );
</script>
<?php } ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example1').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 5,		});
	} );
</script>

<!-- InstanceEnd -->

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>



<script type="text/javascript">
$(function () {
	
		var data = [];
		var i=0;
		<?php
		$query_municipality=mysql_query("SELECT * FROM municipality_t");
			while($row_municipality=mysql_fetch_assoc($query_municipality)){
					$name=$row_municipality['municipality_name'];
								
					$count_name=0;
					$query_name=mysql_query("SELECT * from student_t WHERE city_municipality like '%$name%'");
						while($row_name=mysql_fetch_assoc($query_name)){ 
							$count_name=mysql_num_rows($query_name);
		}?>
		<?php
		if($count_name>=1){
		?>
		data[i] = { label: "<?php echo $name;?>", data: <?php echo $count_name;?> }
		i++;
		
		<?php 
		}
		 
			}?>
	
	$.plot($("#pie-chart"), data, 
	{
			colors: [],
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
				position: "ne", // position of default legend container within plot
				margin: [5, 10], // distance from grid edge to default legend container within plot
				backgroundOpacity: 0 // set to 0 to avoid background
			},
			grid: {
				hoverable: false,
				clickable: false
			},
	});
	
	});

</script>


</html>
