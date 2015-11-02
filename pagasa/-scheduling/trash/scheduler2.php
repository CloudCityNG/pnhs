<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/sched_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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

<link rel="stylesheet" href="scheduler/style.css" type="text/css" media="screen"/>
		<script type="text/javascript">
			var redipsURL = '/javascript/drag-and-drop-example-3/';
		</script>
        <script type="text/javascript" src="scheduler/header.js"></script>
        <script type="text/javascript" src="scheduler/redips-drag-source.js"></script>
		<script type="text/javascript" src="scheduler/script.js"></script>
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
							Dick Dela Vega
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
			    <li > <a href="schedules.php"> <i class=" icon-arrow-left"></i> <span>Back</span></a></li>
				<!--
			    <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span></a></li>
			    <li> <a href="curriculums.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Curriculums</span></a></li>
			    <li> <a href="rooms.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span></a></li>
			    <li> <a href="teachers.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teachers</span></a></li>
  				-->
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
          <h3>Scheduler</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
        <!-- tables inside this DIV could have draggable content -->
			<div id="drag">
	
				<!-- left container (table with subjects) -->
				<div id="left" class="span3">
					<table id="table1">
						<colgroup>
							<col width="190"/>
						</colgroup>
						<tbody>
							<tr><td class="dark"><div id="ar" class="drag clone ar">Arts</div><input id="b_ar" class="ar" type="button" value="" onclick="report('ar')" title="Show only Arts"/></td></tr>
							<tr><td class="dark"><div id="bi" class="drag clone bi">Biology</div><input id="b_bi" class="bi" type="button" value="" onclick="report('bi')" title="Show only Biology"/></td></tr>
							<tr><td class="dark"><div id="ch" class="drag clone ch">Chemistry</div><input id="b_ch" class="ch" type="button" value="" onclick="report('ch')" title="Show only Chemistry"/></td></tr>
							<tr><td class="dark"><div id="en" class="drag clone en">English</div><input id="b_en" class="en" type="button" value="" onclick="report('en')" title="Show only English"/></td></tr>
							<tr><td class="dark"><div id="et" class="drag clone et">Ethics</div><input id="b_et" class="et" type="button" value="" onclick="report('et')" title="Show only Ethics"/></td></tr>
							<tr><td class="dark"><div id="hi" class="drag clone hi">History</div><input id="b_hi" class="hi" type="button" value="" onclick="report('hi')" title="Show only History"/></td></tr>
							<tr><td class="dark"><div id="it" class="drag clone it">IT</div><input id="b_it" class="it" type="button" value="" onclick="report('it')" title="Show only IT"/></td></tr>
							<tr><td class="dark"><div id="ma" class="drag clone ma">Mathematics</div><input id="b_ma" class="ma" type="button" value="" onclick="report('ma')" title="Show only Mathematics"/></td></tr>
							<tr><td class="dark"><div id="ph" class="drag clone ph">Physics</div><input id="b_ph" class="ph" type="button" value="" onclick="report('ph')" title="Show only Physics"/></td></tr>
							<tr><td class="trash" title="Trash">Trash</td></tr>
						</tbody>
					</table>
				</div><!-- left container -->
				
				<!-- right container -->
				<div id="right" class="">
					<table id="table2">
						<colgroup>
							<col width="50"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
						</colgroup>
						<tbody>
							<tr>
								<!-- if checkbox is checked, clone school subjects to the whole table row  -->
								<td class="mark blank">
									<input id="week" type="checkbox" title="Apply school subjects to the week" checked/>
									<input id="report" type="checkbox" title="Show subject report"/>
								</td>
								<td class="mark dark">Monday</td>
								<td class="mark dark">Tuesday</td>
								<td class="mark dark">Wednesday</td>
								<td class="mark dark">Thursday</td>
								<td class="mark dark">Friday</td>

							</tr>
							<tr>
								<td class="mark dark">8:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">9:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">10:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">11:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">12:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">13:00</td>
								<td class="mark lunch" colspan="5">Lunch</td>
							</tr>
							<tr>
								<td class="mark dark">14:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">15:00</td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div><!-- right container -->
			</div><!-- drag container -->  
          
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
