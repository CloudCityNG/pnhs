<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
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
			    <li class="active"> <a href="sis-admin-offense-chart.php" > <i class="shortcut-icon icon-list"></i> <span class="shortcut-label">Reports</span> </a> </li>
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


<table>
<tr>
<td>
          <div class="span6" >
      		
      		<div class="widget stacked" >
					
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Archives</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:50px">
					<form action="sis-admin-offense-chart-archive.php" method="post">
                    <table>
                    <tr>
                    <td>
                    <select name="school_year">
                    <?php
					
					$querysy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status != '1'");
					while($getsy = mysql_fetch_assoc($querysy)){
						$toshow = $getsy['sy_id'];
						echo '<option value="'. $getsy['sy_id'] .'">'.$getsy['sy_start'].'-'.$getsy['sy_end'].'</option>';
					}
					
                    ?>
                    </select>
                    </td>
                    <td>

                    <input type="submit" name="go" value="View Report" class="btn btn-success" />
					</td>
                    </tr>
                    </table>
                    </form>
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->

</td>
<td>
          <div class="span6" >
      		
      		<div class="widget stacked" >
					
				<div class="widget-header">
					<i class="icon-table"></i>
					<h3>Statistics</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:50px">
			<p align="center"><a class="btn btn-large btn-success" href="sis-admin-offense-stat.php" style="text-decoration:none; color:#FFF">View Statistics</a>	</p>			
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->

</td>
</tr>
</table>

<table>
<tr>
<td>
<div class="span6" >
      		
      		<div class="widget stacked" >
					
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Chart Representation</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:500px">
					
					<div id="pie-chart" class="chart-holder"></div>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->


<div class="span6">
  				
  				<div class="widget stacked widget-table"  style="height:450px">
					
					<div class="widget-header" style="width:450px">
						<span class="icon-external-link"></span>
						<h3>Number of Students</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content" style="width:450px">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th>Offenses</th>
								<th>No. of Students</th>								
							</tr></thead>
					
						<tbody><tr>
							<?php 
							include("../db/db.php");
							$query_currsy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
							$row_currsy = mysql_fetch_assoc($query_currsy);
							$currsy = $row_currsy['sy_id'];
							
							$query_municipality=mysql_query("SELECT * FROM discipline_offense_t");
							while($row_municipality=mysql_fetch_assoc($query_municipality)){
								$name=$row_municipality['offense_description'];
								$offcode=$row_municipality['offense_code'];
								
							$count_name=0;
							$query_name=mysql_query("SELECT * from student_offense_list_t WHERE offense_code = '$offcode' AND school_year = '$currsy'");
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
					
				</div> <!-- widget -->
                </div>
  				
		   <!-- /span4 -->
</td>
</tr>
</table>
<br />
<hr color="#666666" size="10">
<br />
<br />
<table width="100%">
<tr>
<td align="center">


				
			
			 <a onClick="window.open('../-sis/sis-admin-offense-chart-print.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center')" class="btn btn-large btn-default"><i class="icon-print"></i> Print</a>
					
</td>
</tr>
</table>


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

	
		$query_currsy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
		$get_currsy = mysql_fetch_assoc($query_currsy);
		$currsy = $get_currsy['sy_id'];
							
		$query_offense=mysql_query("SELECT * FROM discipline_offense_t");
			while($row_offense=mysql_fetch_assoc($query_offense)){
					$off=$row_offense['offense_code'];
					$offname=$row_offense['offense_description'];
								
					$count_off=0;
					$query_off=mysql_query("SELECT * from student_offense_list_t WHERE offense_code = '$off' AND school_year = '$currsy'");
						while($row_off=mysql_fetch_assoc($query_off)){ 
							$count_off=mysql_num_rows($query_off);
		}?>
		<?php
		if($count_off>=1){
		?>
		data[i] = { label: "<?php echo $offname;?>", data: <?php echo $count_off;?> }
		i++;
		
		<?php 
		}
			}
			
		?>
	
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
				position: "bottom", // position of default legend container within plot
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
