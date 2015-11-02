<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" />
    
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
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck .active a{
	color: #FFF;
	background-color: #063;
}
  .navbar.navbar-inverse .navbar-inner .container .nav-collapse.collapse .blck a{
	color: #000;
}
  </style>
  </head>

<body>

<div class="navbar navbar-inverse"  style="height:38px;">
	
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
    



    
<div class="subnavbar no-margin-bottom">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
				<ul class="mainnav">
				
					<li>
						<a href="admin_home.php">
							<i class="icon-home"></i>
							<span>Home</span>
						</a>	    				
					</li>
					<li class="active">
                        <a href="admin_sched_home.php" >
                            <i class="shortcut-icon icon-calendar"></i>
                            <span class="shortcut-label">Scheduling</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_reg_home.php" >
                            <i class="shortcut-icon icon-list-alt"></i>
                            <span class="shortcut-label">Registration</span>								
                        </a>
                    </li>
                    <li>
                        <a href="admin_grad_home.php" >
                            <i class="shortcut-icon icon-pencil"></i>
                            <span class="shortcut-label">Grading</span>	
                        </a>
                    </li>
                    <li>
                        <a href="admin_sis_home.php" >
                            <i class="shortcut-icon icon-user"></i>
                            <span class="shortcut-label">SIS</span>								
                        </a>
                    </li>
                    <li>
                        <a href="admin_eis_home.php" >
                            <i class="shortcut-icon icon-bookmark"></i>
                            <span class="shortcut-label">EIS</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_lib_home.php" >
                            <i class="shortcut-icon icon-book"></i>
                            <span class="shortcut-label">Library</span>	
                        </a>
                    </li>
                    <li>
                        <a href="admin_supp_home.php" >
                            <i class="shortcut-icon icon-shopping-cart"></i>
                            <span class="shortcut-label">Supplies</span>	
                        </a>
                    </li>
                    <li>
                        <a href="admin_equip_home.php" >
                            <i class="shortcut-icon icon-briefcase"></i>
                            <span class="shortcut-label">Equipment</span>
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

<!--/smaller navbar-->
    
    
    
    
<div class="main">

  <div class="container" style="width:1000px;">
    <div class="">
     
      <div class="widget stacked">
      			
      			<div class="widget-header">
      				<i class="icon-pencil"></i>
      				<h3>Dashboard</h3>
		  </div> <!-- /widget-header -->
				
		<div class="widget-content">
                  <img class="img-rounded" style="width:100%" src="images/banner_scheduling.jpg" />
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
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
</script>

  </body>
</html>
