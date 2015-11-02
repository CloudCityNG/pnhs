<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: restrict.php"); // IMPORTANT!!!!
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

<title>Print Certification of Good Moral Character</title>
</head>

<body>

<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

  <div id="container" align="center">
      <div id="header">
		<img src="../images/banner.jpg" width="100%" />
      </div>

<br />
<br />

<h4 align="center">STATISTICAL CHART FOR STUDENTS WITH RECORDED OFFENSES</h4>
<br />
     	<div class="span6">
      		
      		<div class="widget stacked">
						
						<div class="widget-header">
							<i class="icon-bar-chart"></i>
							<h3>Bar Chart</h3>
						</div> <!-- /widget-header -->
						
						<div class="widget-content">
						
							<div id="bar-chart" class="chart-holder"></div> <!-- /bar-chart -->
						
						</div> <!-- /widget-content -->
					
					</div>
								
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
								<th>Year</th>
								<th>No. of Students</th>								
							</tr></thead>
					
						<tbody>
			 <?php 
			include("../db/db.php");
			$query_schoolyear=mysql_query("SELECT * FROM school_year_t");
			while($row_schoolyr=mysql_fetch_assoc($query_schoolyear)){
			$sy_id=$row_schoolyr['sy_id'];
			$sy_start=$row_schoolyr['sy_start'];
			$sy_end=$row_schoolyr['sy_end'];
			
			$query_yr=mysql_query("SELECT * FROM student_offense_list_t WHERE school_year='$sy_id'");
			$count_yr=mysql_num_rows($query_yr);
			
			
						?>       
                        <tr class="del<?php echo $id ?>">
						 <td align="center"><?php echo "".$sy_start."-".$sy_end.""; ?></td>
						 <td align="center"><!--<a href="reg_listofstudents.php<?php //echo "?sy=$sy_id&&start=$sy_start&&end=$sy_end"; ?>"> --><?php echo $count_yr; ?><!--</a>--></td>
            			</tr>
			<?php } ?>		
					</tbody></table>
						

					</div> <!-- .widget-content -->
					
				</div>
  				
		  </div> <!-- /span4 -->




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
<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars1.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/charts/bar.js-"></script>

<script type="text/javascript">
$(function () {
	var data = new Array ();
    var ds = new Array();
	
	
	<?php
	        $query_schoolyear=mysql_query("SELECT * FROM school_year_t");
			while($row_schoolyr=mysql_fetch_assoc($query_schoolyear)){
			$sy_id=$row_schoolyr['sy_id'];
			$sy_start=$row_schoolyr['sy_start'];
			$sy_end=$row_schoolyr['sy_end'];
			
			$query_yr=mysql_query("SELECT * FROM student_offense_list_t WHERE school_year=$sy_id");
			$count_yr=mysql_num_rows($query_yr);
			
			$query_reg = mysql_query("SELECT * FROM student_registration_t ");
			$total_stud = mysql_num_rows($query_reg);
			
	?>
	data.push ([[<?php echo $sy_start?>,<?php echo ($count_yr/$total_stud)*100?>]]);

    <?php } ?>
    for (var i=0, j=data.length; i<j; i++) {
    	
	     ds.push({
	        data:data[i],
	        grid:{
            hoverable:true
        },
	        bars: {
	            show: true, 
	            barWidth: 1, 
	            order: 1,
	            lineWidth: 0, 
				fillColor: { colors: [ { opacity: 0.65 }, { opacity: 1 } ] }
	        },
			
	    });
	}
	    
    $.plot($("#bar-chart"), ds, {
    	colors: ["#F90", "#222", "#666", "#BBB"]
                

    });
                

    
});   
</script>




</html>