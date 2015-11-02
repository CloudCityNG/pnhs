<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>Print Report</title>
  

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

  <div id="container" align="center">
      <div id="header">
		<img src="../images/banner.jpg" width="100%" />
      </div>
	  <br />
	  <?php
	  include("../db/db.php");
	  $querycur = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
	  $getcur = mysql_fetch_assoc($querycur);
	  $cur = $getcur['sy_start'];
	  $cur2 = $getcur['sy_end'];
	  ?>
	  <h4 align="center" >GRAPHICAL REPRESENTATION OF STUDENTS WITH OFFENSES</h4>
	  <h4 align="center" >FOR SCHOOL YEAR<?php echo $cur ?>-<?php echo $cur2?></h4>
	  
<div class="span6" style="width:300px">
      		
      		<div class="widget stacked" style="width:300px" >
					
				<div class="widget-header" style="width:330px" >
					<i class="icon-star"></i>
					<h3>Chart Representation</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:500px; width:300px">
					
					<div id="pie-chart" class="chart-holder"></div>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
								
        </div> <!-- /span6 -->


 <div class="span6" style="width:300px">
      		
      		<div class="widget stacked" style="width:300px">
					
				<div class="widget-header"  style="width:330px">
						<span class="icon-external-link"></span>
						<h3>Number of Students</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content" style="width:300px">
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


</body>
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