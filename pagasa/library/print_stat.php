<!DOCTYPE html>

<html lang="en">
  <head>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>

    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    <!-- TemplateEndEditable -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
    
    <link href="../css/base-admin-2.css" rel="stylesheet" />
    <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="../css/pages/dashboard.css" rel="stylesheet" />   

    <link href="../css/custom.css" rel="stylesheet" />


<link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
		
  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck .active a{
	color: #FFF;
	background-color: #063;
}
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck a{
	color: #000;
}
  </style> 
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		
        
        </style>
<link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  
</head>
<body>
<img src="img/pnhs_logo.png" style="position:absolute;top:10px;right:800px">
<br><br><h5 align="center"> 	 
  PAG-ASA NATIONAL HIGH SCHOOL<br />Rawis, Legazpi, Albay</h5><br<br>
 	<!-- MAIN -->
	
    		<div id="main">
				<!-- wrapper-main -->
	
    			<div class="wrapper">
					
					<!-- content -->
					<div id="content">
						
						<div class="main">
 	
<!-- title -->
          <div id="result"></div>
	         <a type="submit" value="Print" id="printButton" onClick="printpage()"> <img src="img/mono-icons/printer32.png" /><br>Print</a>

					
    <div class="container">
 	 <div class="">
      	<div class="span6">	
			
				<div class="widget stacked">
					
					<div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h3>Most Borrowed Book	</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<div id="pie-chart" class="chart-holder"></div> <!-- /pie-chart -->
	 
    	</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->			
			
			</div> <!-- /span6 -->
		
   
	
  			<div class="span4">
  				
  				<div class="widget stacked widget-table">
					
					<div class="widget-header">
						<span class="icon-external-link"></span>
						<h3>Legends</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th>Call No.</th>
								<th>Reading Materials</th>								
							</tr></thead>
					
						<tbody><tr>
						<?php 
							error_reporting(0);
							require "db.php";
    						$year=$_GET['year'];
							if($year != NULL){
							$year1=mysql_query("SELECT * FROM school_year_t WHERE sy_id='$year'");
							while($y2=mysql_fetch_array($year1))
							{
							$start1=$y2['sy_start'];
							$end1=$y2['sy_end'];
							}
							if($year != NULL)
							{
$query=mysql_query("SELECT *,count(*) as total FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no WHERE return_date >='$start1-01-15' and return_date <='$end1-03-01'  group by call_no order by total desc limit 10");
							while($c=mysql_fetch_array($query))
							{
							$call_no=$c['call_no'];
							$qry1=mysql_fetch_array(mysql_query("select * from cat_reading_material_t where call_no='$call_no'"));
							$title=$qry1['title'];
							echo"<tr>								
							<th>$call_no</th>
							<th>"; ?>
							<?php echo $title; ?>                             <th>								
							</tr>
					<?php }
						}
							}
							else
							{
							echo"$year $level $section";
$qry=mysql_query("SELECT *,count(*) as total FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no group by call_no order by total desc limit 10");
							while($a=mysql_fetch_array($qry))
							{
							$call_no=$a['call_no'];
							$qry1=mysql_fetch_array(mysql_query("select  *  from cat_reading_material_t where call_no='$call_no' "));
							$title=$qry1['title'];
							 echo"<tr>								
								<th>$call_no</th>
								<th>"; ?>
								 <a target="_blank" href="cataloging1.php?callno=<?php echo"$call_no"; ?>"><?php echo $title; ?> </a>                            <th>								
							</tr>
					<?php }} ?>
						
						
					</tbody></table>
						

					</div> <!-- .widget-content -->
					
				</div>
	
		  </div> <!-- /span4 -->
      
	  </div> <!-- /row -->

   </div>
         
</div>
						<!-- ENDS page-content -->
					</div>
					<!-- ENDS content -->
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
			
  <div id="result"></div>
    
    
    				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p><br />
	      </p>
      </div> 
				<!-- /widget-content -->
					
	  </div><!-- /span6 --><!-- /span6 -->
    </div> 
      <!-- /row -->

  </div> 
    <!-- /container -->
    
</div> <!-- /main --><!-- /extra -->


    
    

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

<br><br>
    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JS -->
<script type="text/javascript" src="js1/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js1/js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="js1/js/easing.js"></script>
<script type="text/javascript" src="js1/js/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript" src="js1/js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js1/js/custom.js"></script>
		
		<!-- Isotope -->
<script src="js1/js/jquery.isotope.min.js"></script>
		
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!-- ENDS JS -->
		
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="cs2/css/nivo-slider.css" type="text/css" media="screen" />
<script src="js1/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="cs2/css/tabs.css" type="text/css" media="screen" />
<script type="text/javascript" src="js1/js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
<script type="text/javascript" src="js1/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js1/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="cs2/css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="cs2/css/superfish-left.css" /> 
<script type="text/javascript" src="js1/js/superfish-1.4.8/js/hoverIntent.js"></script>
<script type="text/javascript" src="js1/js/superfish-1.4.8/js/superfish.js"></script>
<script type="text/javascript" src="js1/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js1/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="js1/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
<script type="text/javascript" src="js1/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="cs2/css/jquery.tweet.css" media="all"  type="text/css"/> 
<script src="js1/js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="js1/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="js1/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

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
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>



<script type="text/javascript">
$(function () {
	
		var data = [];
		var i=0;<?php
		error_reporting(0);
			require "db.php";
    				if($year!=NULL){
							$year1=mysql_query("SELECT * FROM school_year_t WHERE sy_id='$year'");
							while($y2=mysql_fetch_array($year1))
							{
							$start1=$y2['sy_start'];
							$end1=$y2['sy_end'];
							}
							if($year != NULL)
							{
$query=mysql_query("SELECT *,count(*) as total FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no WHERE return_date >='$start1-01-15' and return_date <='$end1-03-01'  group by call_no order by total desc limit 10");
							while($c=mysql_fetch_array($query))
							{
							$call_no=$c['call_no'];
							$total=$c['total'];
							?>
		data[i] = { label: "<?php echo $call_no;?>", data: <?php echo $total;?> }
		i++;
				
		<?php 
		}
						}
							}
							else
							{
							
$qry=mysql_query("SELECT *,count(*) as total FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no group by call_no order by total desc limit 10;");
while($a=mysql_fetch_array($qry))
		{	
		$call_no=$a['call_no']; 
		$count=$a['total']; 
		?>
		data[i] = { label: "<?php echo $call_no;?>", data: <?php echo $count;?> }
		i++;
				
		<?php 
		}}
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
</body>
