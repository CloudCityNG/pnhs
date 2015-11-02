<!DOCTYPE html>
        <?php
		session_start();
		error_reporting(0);
		if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else
	header("location: restrict.php"); // IMPORTANT!!!!
	
		include("db/db.php");
		$sql = mysql_query("SELECT * FROM account_t, employee_account_t, employee_t
							WHERE account_t.username ='master' 
							AND account_t.account_no = employee_account_t.account_no
							AND employee_t.emp_id = employee_account_t.emp_id");
		
		?>
 <?php
		session_start();
		error_reporting(0);
		if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else
	header("location: restrict.php"); // IMPORTANT!!!!
	
		include("db/db.php");
		$sql = mysql_query("SELECT * FROM account_t, employee_account_t, employee_t
							WHERE account_t.username ='master' 
							AND account_t.account_no = employee_account_t.account_no
							AND employee_t.emp_id = employee_account_t.emp_id");
		
		?>


<html lang="en">
  <head>
  
  
  
  
  
  
    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
  
 <!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

 <link href="try.css" rel="stylesheet" type="text/css" media="screen" />
  
  
    
    <link href="./css/bootstrap.css" rel="stylesheet" />    
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="./css/font-awesome.min.css" rel="stylesheet" />        
    
    <link href="./css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
    
    <link href="./css/base-admin-2.css" rel="stylesheet" />
    <link href="./css/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="./css/pages/dashboard.css" rel="stylesheet" />   

    <link href="./css/custom.css" rel="stylesheet" />


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">

  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck a{
	color: #000;
}
  </style>
  <link rel="stylesheet" href="css/calendarview.css">
    <style>
      body {
        font-family: Trebuchet MS;
      }
      div.calendar {
        max-width: 200px;
        margin-left: auto;
        margin-right: auto;
      }
      div.calendar table {
        width: 100%;
      }
      div.dateField {
        width: 140px;
        padding: 6px;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        color: #555;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }
      div#popupDateField:hover {
	background-color: #cde;
	/* [disabled]cursor: pointer; */
      }
    .style1 {color: #F0F0F0}
    </style>

  </head>


<body>


<div class="navbar navbar-inverse"  style="height:25px;">
	
	<div id="head" class="navbar-inner navbar-fixed-top" >
		
		<div class="container" >
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>
			</a>
			
			<a class="brand" href="./index.html">
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
							<li><a href="javascript:;">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar" >

    <img src="images/banner.jpg">
    
	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li class="active">
						<a href="home.php">
							<i class="icon-home icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					<li>
                        <a href="#" >
                            <i class="shortcut-icon icon-user"></i>
                            <span class="shortcut-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-briefcase"></i>
                            <span class="shortcut-label">Modules</span>								
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-heart"></i>
                            <span class="shortcut-label">Developers</span>	
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-picture"></i>
                            <span class="shortcut-label">Gallery</span>								
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-phone"></i>
                            <span class="shortcut-label">Contacts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-info-sign"></i>
                            <span class="shortcut-label">About US</span>	
                        </a>
                    </li>
                   
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse">
	
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

<div id="page">
	<p>
	<br>
  
  </p><!-- start sidebar -->
	<div id="sidebar">
		<ul>
			<li>
				<h2>Profile</h2>
				<ul>
					<div class="shortcuts">
            <!-- /put profile info here-->
            <a href="#" class="shortcut">
            <i class="shortcut-icon icon-user"></i>
            <span class="shortcut-label">Profile Picture</span>
            </a>   <br> 		
			<?php 
			$row = mysql_fetch_assoc($sql);	
			echo strtoupper($row['l_name'].", ".$row['f_name']." ".$row['m_name'] );
			 ?>
				</ul>
			</li>
			<li>
				<h2>Calendar</h2>
				<ul>
					<div id="embeddedExample" style="">
          <div id="embeddedCalendar" style="margin-left: auto; margin-right: auto"></div>
				</ul>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div id="content">
		<div class="post greenbox">
			<div class="title">
				<h1>Welcome to pnhs</h1>
			</div>
				<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/banner4.jpg" alt="banner4" title="banner4" id="wows1_0"/></li>
<li><img src="data1/images/banner_eis.jpg" alt="banner_eis" title="banner_eis" id="wows1_1"/></li>
<li><img src="data1/images/banner_sis.jpg" alt="banner_sis" title="banner_sis" id="wows1_2"/></li>
<li><img src="data1/images/banner_supplies.jpg" alt="banner_supplies" title="banner_supplies" id="wows1_3"/></li>
<li><img src="data1/images/banner_equipment.jpg" alt="banner_equipment" title="banner_equipment" id="wows1_4"/></li>
<li><img src="data1/images/banner_grading.jpg" alt="banner_grading" title="banner_grading" id="wows1_5"/></li>
<li><img src="data1/images/banner_library.jpg" alt="banner_library" title="banner_library" id="wows1_6"/></li>
<li><img src="data1/images/banner_registration.jpg" alt="banner_registration" title="banner_registration" id="wows1_7"/></li>
<li><img src="data1/images/banner_scheduling.jpg" alt="banner_scheduling" title="banner_scheduling" id="wows1_8"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="banner4"><img src="data1/tooltips/banner4.jpg" alt="banner4"/>1</a>
<a href="#" title="banner_eis"><img src="data1/tooltips/banner_eis.jpg" alt="banner_eis"/>2</a>
<a href="#" title="banner_sis"><img src="data1/tooltips/banner_sis.jpg" alt="banner_sis"/>3</a>
<a href="#" title="banner_supplies"><img src="data1/tooltips/banner_supplies.jpg" alt="banner_supplies"/>4</a>
<a href="#" title="banner_equipment"><img src="data1/tooltips/banner_equipment.jpg" alt="banner_equipment"/>5</a>
<a href="#" title="banner_grading"><img src="data1/tooltips/banner_grading.jpg" alt="banner_grading"/>6</a>
<a href="#" title="banner_library"><img src="data1/tooltips/banner_library.jpg" alt="banner_library"/>7</a>
<a href="#" title="banner_registration"><img src="data1/tooltips/banner_registration.jpg" alt="banner_registration"/>8</a>
<a href="#" title="banner_scheduling"><img src="data1/tooltips/banner_scheduling.jpg" alt="banner_scheduling"/>9</a>
</div></div>
<audio src="engine1/jamich_x_davey_langit__selfie_song.mp3"></audio>
<script type="text/javascript" src="engine1/swfobject.js"></script>
<span class="wsl"><a href="http://wowslider.com">Web Slide Show</a> by WOWSlider.com v4.8</span>
	<div class="ws_shadow"></div>
	</div>
	  </div>
		<div class="post greenbox">
			<div class="title">
				<h1>SYSTEM/MODULES</h1>
			</div>
			 <div class="shortcuts">
            <a href="-registration/reg_home.php" class="shortcut">
                <i class="shortcut-icon icon-list-alt"></i>
                <span class="shortcut-label">Registration</span>
            </a>
            
            <a href="-scheduling/schedules.php" class="shortcut">
                <i class="shortcut-icon icon-calendar"></i>
                <span class="shortcut-label">Scheduling</span>								
            </a>
            
            <a href="javascript:;" class="shortcut">
                <i class="shortcut-icon icon-signal"></i>
                <span class="shortcut-label">Grading</span>	
            </a>
            
            <a href="javascript:;" class="shortcut">
                <i class="shortcut-icon icon-barcode"></i>
                <span class="shortcut-label">EIS</span>								
            </a>
            <br />
            <a href="javascript:;" class="shortcut">
                <i class="shortcut-icon icon-star"></i>
                <span class="shortcut-label">SIS</span>
            </a>
            
            <a href="library/logs.php" class="shortcut">
                <i class="shortcut-icon icon-book"></i>
                <span class="shortcut-label">Library</span>	
            </a>
            
            <a href="inventory/inv_home.php" class="shortcut">
                <i class="shortcut-icon icon-building"></i>
                <span class="shortcut-label">Inventory</span>	
            </a>
                <a href="inventory/inv_home.php" class="shortcut">
                <i class="shortcut-icon icon-user"></i>
                <span class="shortcut-label">Accounts</span>	
            </a>

    
        </div> <!-- /shortcuts --> 
			
			
	  </div>
  </div>
	<!-- end content -->
	
</div>
<!-- end page -->
    
    
    
    
    
    

             
   
                
				
			
           

    

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
<script src="./js/libs/jquery-1.8.3.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/plugins/flot/jquery.flot.js"></script>
<script src="./js/plugins/flot/jquery.flot.pie.js"></script>
<script src="./js/plugins/flot/jquery.flot.resize.js"></script>

<script src="./js/Application.js"></script>

<script src="./js/charts/area.js"></script>
<script src="./js/charts/donut.js"></script>
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

$('.carousel').carousel();
</script>
<script src="js/prototype.js"></script>
<script src="js/calendarview.js"></script>
<script>
      function setupCalendars() {
        // Embedded Calendar
        Calendar.setup(
          {
            dateField: 'embeddedDateField',
            parentElement: 'embeddedCalendar'
          }
        )

        // Popup Calendar
        Calendar.setup(
          {
            dateField: 'popupDateField',
            triggerElement: 'popupDateField'
          }
        )
      }

      Event.observe(window, 'load', function() { setupCalendars() })
    


</script>
<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
</body>
</html>
