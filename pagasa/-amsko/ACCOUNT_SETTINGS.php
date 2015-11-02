<!DOCTYPE html>
<?php 
session_start();
		//echo "<br><br><br><br><br><br><br>";
		if(!isset($_SESSION['username'])){
          header("Location: restrict.php");
	    }
		else {		
		$username = $_SESSION['username'];
		include("../db/db.php");
		$sql = mysql_query("SELECT * FROM account_t, account_permission_t, account_privilege_t
							WHERE account_t.username ='$username' 
							AND account_t.account_no = account_permission_t.account_no
							AND account_permission_t.privilege_id = account_privilege_t.privilege_id");
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  
  <title>Pagasa National Highschool:: Base Admin</title>

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
							<li><a href="../-amsko/ACCOUNT_SETTINGS.php">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?php echo $_SESSION['username']; ?>
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
    <img src="../images/banner.jpg">    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>			</a>
		  <div class="subnav-collapse collapse">
		    <ul class="mainnav">
		      <li> <a href="JavaScript:window.history.back();"> <i class="icon-repeat"></i> <span>Back</span></a></li>
	        </ul>
	      </div>
            
            
            <!-- /.subnav-collapse -->
		</div> <!-- /container -->
	</div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse hidden">
	
  <div class="navbar-inner" style="padding:0; padding-left:100px;background-color:#0C0; color:#000;">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>			</a>
			
				
			
		  <div class="nav-collapse collapse">
		    <ul class="nav pull-left blck">
					<li class="active">
						
						<a href="#" >
							<i class="icon-lock"></i>
							Security						</a>					</li>
                    <li >
						
						<a href="#">
							<i class="icon-picture"></i>View</a>					</li>
                    
                    <li >
						
						<a href="#" style="color:#000000;">
							<i class="icon-cog"></i>
							Settings						</a>					</li>
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

<?php 
							$username = $_SESSION['username'];
		include("../db/db.php");
		$us = mysql_query("SELECT * FROM account_t, account_permission_t, account_privilege_t
							WHERE account_t.username ='$username' 
							AND account_t.account_no = account_permission_t.account_no
							AND account_permission_t.privilege_id = account_privilege_t.privilege_id");
							while($row = mysql_fetch_assoc($us)){ ?>
    							
<div class="main">
  
  <div class="container">
    
    <div class="row">
      
      <div class="span12">
        
        <div class="widget stacked">
          <br>
          <div class="widget-header">
            <i class="icon-star"></i>
            <h3>Account Settings</h3>
			    </div> <!-- /widget-header -->
          
          <div class="widget-content">
            
            <div class="shortcuts">
              <!-- /put profile info here-->
              <a href="#" class="shortcut">
                <i class="shortcut-icon icon-user"></i>
                <span class="shortcut-label">Profile Picture</span>                </a>   <br> 		
              <?php 
				$row = mysql_fetch_assoc($sql);	
				//echo strtoupper($row['l_name'].", ".$row['f_name']." ".$row['m_name'] );
			?>
              </div> <!-- /shortcuts --> 
              
              <div id="demo">

          <section id="accordions">
						
			<div class="accordion" id="basic-accordion">
	            <div class="accordion-group">
					<div class="accordion-heading">
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne"><i class="shortcut-icon icon-user"></i>&nbsp;&nbsp;DETAILS </a>
				    </div>
				    
                    <div id="collapseOne" class="accordion-body in collapse">
				    	<div class="accordion-inner">
				        	<div class="alert alert-info"><br>
                            
                            <form action="#" method="post" class="form-horizontal" />	
    							<div class="control-group">											
										<label class="control-label" for="username">Account No.</label>
										<div class="controls">
                                        	<input type="text" class="input-medium disabled" value="<?php echo strtoupper($row['account_no']); ?>" disabled="" />
											
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Account Type</label>
										<div class="controls">
                                        	<input type="text" class="input-medium disabled" value="<?php echo strtoupper($row['type']); ?>" disabled="" />
											
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
										<label class="control-label" for="firstname">Role</label>
										<div class="controls">
											<?php 
						$sql1 = mysql_query("SELECT * FROM account_t, account_permission_t, account_privilege_t
						WHERE account_privilege_t.privilege_id = account_permission_t.privilege_id
						AND account_t.account_no = account_permission_t.account_no 
						AND account_t.username='$username'");
						$row1 = mysql_fetch_assoc($sql1);
						 ?>
                                        	<input type="text" class="input-medium disabled" value="<?php echo strtoupper($row1['privilege_name']); ?>" disabled="" />
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
                                </form>
                                <br>
        					</div>
				        </div>
				    </div>
				</div> 
                
                
                
                <div class="accordion-group">
					<div class="accordion-heading">
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo"><i class="shortcut-icon icon-pencil"></i>&nbsp;&nbsp;EDIT ACCOUNT </a>
				    </div>
				    
                    <div id="collapseTwo" class="accordion-body collapse">
				    	<div class="accordion-inner">
                            
                            <form action="ACCOUNT_SETTINGS_ACTION.php" method="post" class="form-horizontal" />					

                    		<input type="hidden" name="account_no" value="<?php echo $row['account_no']; ?>">
                            	<fieldset>
									
									
									<div class="control-group">											
										<label class="control-label" for="lastname">Username</label>
										<div class="controls">
											<input type="text" name="username" value="<?php echo ($row['username']); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
								<div class="control-group">											
										<label class="control-label" for="password1">Current Password</label>
										<div class="controls">
											<input type="password" name="cpassword">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
                                
                                
									<div class="control-group">											
										<label class="control-label" for="password1">New Password</label>
										<div class="controls">
											<input type="password" name="password">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
                                    
                                    <div class="control-group">											
										<label class="control-label" for="repassword1">Confirm New Password</label>
										<div class="controls">
											<input type="password" name="repassword" value="<?php //echo ($row['password']); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
								
										
										<br />
									
										
									<div class="form-actions">
                                    	
                              			 <a class="btn btn" title="CANCEL" href="JavaScript:window.history.back();">CANCEL</i></a>
                              			&nbsp;
                                		<input type="submit" class="btn btn-success" name="submit" value="EDIT">
									</div> <!-- /form-actions -->
								</fieldset>
                                
							</form>
                            
                               <br>
				        </div>
				    </div>
				</div>     
                            
                      
                
	        </div>
							      
			</section>
            
          </div>	
            </div> <!-- /widget-content -->
          </div> <!--widget-->
        </div><!-- span6 -->
      </div>
        <!-- /row -->
    </div> 
      <!-- /container -->
</div>

<!-- /main -->
<!-- /extra -->
 <?php } ?> 
    
    
    
    
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
				&copy; 2012-13 BSIT-3C.		</div> <!-- /span6 --><!-- /.span6 -->
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
</html>

<?php }  ?>
