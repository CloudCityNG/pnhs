<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="./css/bootstrap.css" rel="stylesheet" />    
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="./css/font-awesome.min.css" rel="stylesheet" />        
    
    <link href="./css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
    
    <link href="./css/base-admin-2.css" rel="stylesheet" />
    <link href="./css/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="./css/pages/dashboard.css" rel="stylesheet" />   

    <link href="./css/custom.css" rel="stylesheet" />

		<link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
		
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

<div class="navbar navbar-inverse"  style="height:25px;">
	
	<div id="head" class="navbar-inner navbar-fixed-top" >
		
		<div class="container" >
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>			</a>
			
			<a class="brand" href="./index.html">
				Pagasa National Highschool <sup>2.0.1</sup>			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>						</a>
						
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
							<b class="caret"></b>						</a>
						
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
			</div>
			<!--/.nav-collapse -->	
	  </div> 
		<!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar" >
    <div class="">
    <img src="images/banner.jpg">
    </div>
	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse" align="center">
				<ul class="mainnav">
				
				<li>
						<a href="home.php">
							<i class="icon-home"></i>
							<span>Home</span>
                         </a>
                </li>
                        
					<li>
     
                        <a href="#" >
                            <i class="shortcut-icon icon-calendar"></i>
                            <span class="shortcut-label">Library Logs</span>                        
                            </a>                    </li>
                    <li class="active">
                        <a href="book_borrow.php" >
                            <i class="shortcut-icon icon-book"></i>
                            <span class="shortcut-label">Books</span>                        
                            </a>                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-comment"></i>
                            <span class="shortcut-label">Status</span>                       
                             </a>                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-list-alt"></i>
                            <span class="shortcut-label">Report</span>                       
                             </a>                    </li>
                    <li>
                        <a href="#" >
                            <i class="shortcut-icon icon-signal"></i>
                            <span class="shortcut-label">Statistic</span>                        
                            </a>                    </li>
                            
                            <li >
                        <a href="view.php" >
                            <i class="shortcut-icon icon-file"></i>
                            <span class="shortcut-label">View</span>                        
                            </a>                    </li>
                            
                            
                                                         <li>
                        <br>
                        <form class="navbar-search pull-right" />
					&nbsp;&nbsp;&nbsp;&nbsp;
                    <input style="background:#E1E1E1" type="text" class="search-query" placeholder="Search" />
				&nbsp;&nbsp;&nbsp;&nbsp;
                    
                </form>

				</ul>
			</div> 
			<!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
 
			<!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					<!-- content -->
					<div id="content">
						
						<div class="main">
 	
    <br><br>
      			<!-- column (left)-->
						<div class="one-column">
					
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Borrowing Form</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<script type="text/javascript" src="js/form-validation.js"></script>
							<form id="contactForm" action="#" method="post">
								<fieldset>
									<div>
										<label>Book ID</label>
										<input name="name"  id="name" type="text" class="form-poshytip" title="Enter your book ID" />
									</div>
									<div>
										<label>Library ID</label>
										<input name="email"  id="email" type="text" class="form-poshytip" title="Enter your Library ID" />
									</div>
									<div>
										
									<p><input type="button" value="SEND" name="submit" id="submit" /></p>
								</fieldset>
								</form>
							<!-- ENDS form -->

					<br />
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
     
</div>
<!-- ENDS column -->
						<!-- column (right)-->
						<div class="one-column">
							<!-- content --><!-- sidebar -->
						<ul id="sidebar">
							<!-- init sidebar -->
							<li>
										
								<ul>
									<li class="cat-item"><a  href="book_borrow.php" title="Borrow book" >Borrow Books</a></li>
									<li class="cat-item"><a href="book_return.php" title="View all posts" style="background:#F8F8F8">Return Books</a></li>
									<li class="cat-item"><a href="#" title="View all posts">Report Book Lost</a></li>
							
									<li class="cat-item"><a href="#" title="View all posts">Add Books</a></li>
							</li>
							<!-- ENDS init sidebar -->
						</ul>
						<!-- ENDS sidebar -->
		
    </div></div></div>
						</div>
						<!-- ENDS column -->							
		
					</div>
					<!-- ENDS content -->

				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
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
		<script type="text/javascript" src="js1js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="js1/js/easing.js"></script>
		<script type="text/javascript" src="js1/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="js1/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="js1/js/custom.js"></script>
		
				
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
