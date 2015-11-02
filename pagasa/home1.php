<!DOCTYPE html>
        <?php
		session_start();
		//echo "<br><br><br><br><br><br><br>";
		$username = $_SESSION['username'];
		include("db/db.php");
			
		if(!isset($_SESSION['username'])){
          header("Location: restrict.php");
	    }
		?>
 <?php
 require "db/db.php";
 
@session_start();	
if (!isset($_SESSION['username'])) {
	header("location: ../restrict.php"); // IMPORTANT!!!!
}
include_once "actions/user_priviledges.php";

$developer = is_privileged($_SESSION['account_no'], 1);
$super_admin = is_privileged($_SESSION['account_no'], 2);
$librarian = is_privileged($_SESSION['account_no'], 8);

?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="./css/bootstrap.css" rel="stylesheet" />    
    <link href="library/cs2/css/style.css" rel="stylesheet" />    
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="./css/font-awesome.min.css" rel="stylesheet" />        
    
    <link href="./css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
    
    <link href="./css/base-admin-2.css" rel="stylesheet" />
    <link href="./css/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="./css/pages/dashboard.css" rel="stylesheet" />   

    <link href="./css/custom.css" rel="stylesheet" />

    <link href="js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	


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

body {
	line-height: 1;
	color: #51565b;
	background: #f1f1f1  url(library/img/bg/patterns/noise.png);
}

  </style>
  
  </head>


<body>


<div class="navbar navbar-inverse"  style="height:22px;">
	
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
							<?php echo $_SESSION['username'];?>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">My Profile</a></li>
							<li><a href="javascript:;">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="actions/logoutprocess.php">Logout</a></li>
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
                        <a href="-scheduling/redirect.php" >
                            <i class="shortcut-icon icon-calendar"></i>
                            <span class="shortcut-label">Scheduling</span>
                        </a>
                    </li>
                    <li>
                        <a href="-registration/reg_homepage.php" >
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
                        <a href="-sis/sis-admin-home.php" >
                            <i class="shortcut-icon icon-user"></i>
                            <span class="shortcut-label">SIS</span>								
                        </a>
                    </li>
                    <li>
                        <a href="eis/eis_home.php" >
                            <i class="shortcut-icon icon-bookmark"></i>
                            <span class="shortcut-label">EIS</span>
                        </a>
                    </li>
                    <li>
                        <a href="library/statistic.php" >
                            <i class="shortcut-icon icon-book"></i>
                            <span class="shortcut-label">Library</span>	
                        </a>
                    </li>
                    <li>
                        <a href="inventory/inv_home.php" >
                            <i class="shortcut-icon icon-picture"></i>
                            <span class="shortcut-label">Inventory</span>	
                        </a>
                    </li>
                    <li>
                        <a href="-ams/ams_home.php" >
                            <i class="shortcut-icon icon-user"></i>
                            <span class="shortcut-label">Accounts</span>
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

   <div class="container">

      <div class="row">

		
        </div> <!-- /shortcuts --> 	
				
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
      		
	    </div> <!-- /span6 -->
    	<?php	
	  		error_reporting(0);
			require "db/db.php";
			$account_no=$_SESSION['account_no'];
		  	$s=mysql_query("SELECT * FROM `student_account_t` WHERE account_no='$account_no'");
			while($student1=mysql_fetch_array($s))
			{	
			$call=$student1['student_id'];
			$id1=$student1['account_no'];
			$id=$call;
			$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_t` WHERE student_id='$call'"));
			$fname=$student['f_name'];
			$mname=$student['m_name'];
			$lname=$student['l_name'];
			$type=$student['student_type'];
			$city=$student['city_municipality'];
			$barangay=$student['barangay'];
			$street=$student['street'];
			$img=$student['photo'];
			$s=mysql_fetch_array(mysql_query("SELECT * FROM `student_registration_t` WHERE student_id='$call'"));
			$section=$s['section_id'];
			$level=$s['year_level'];
			$gender=$s['gender'];
			$s1=mysql_fetch_array(mysql_query("SELECT * FROM `section_t` WHERE section_id='$section'"));
			$section1=$s1['section_name'];
			}
			$empl=mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$account_no'");
			while($employee=mysql_fetch_array($empl)){
			$emp_id=$employee['emp_id'];
			$id=$emp_id;
			$id1=$employee['account_no'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$add=$employee1['address'];
			$gender=$employee1['gender'];}
		 
				 						
							if($img!=NULL){ ?>
 							
								<a href="-registration/large/<?php echo $img; ?>" class="ui-lightbox">
									<img src="-registration/include/dpic/<?php echo $img;?>"  width="100" height="100" style="position:absolute; top:50px;right:1130px;">
                                	<a href="-registration/include/dpic/<?php echo $img; ?>-large" class="preview"></a>
					

                                         	     <a class='btn btn-mini' id="printButton" data-toggle="modal" style="position:absolute;top:32px;right:783px; background: #CCCCCC"
                                                href="#add_image<?php echo $id;?>"> 
                                                <img src="img/mono-icons/cameraplus32.png" width="20" height="20" > </a>
                                                
                                                <div class="modal fade hide" id="add_image<?php echo $id?>">
                          						<div class="modal-header">
                            					<button type="button" class="close" data-dismiss="modal">&times;</button>
                            					<h3>ADD IMAGE for <?php echo $fname;?></h3>
                         						 </div> 
                  						        <div class="modal-body">
                                                <form style="text-align:center" action="dp.php<?php echo "?id=$id"; ?>"  method="post"   enctype="multipart/form-data">
												<center><input  type="file" name="image" id="image" /></center>
												<br /> <center><input type="submit" name="upload" value ="Upload Now"> </center>      
                                				</form>
                                				</div><!-- /modal-body-->
    							
						       <?php } else {?>
            					            <?php if($gender == 'male'){?>      
             								<img src="img/boy.jpg"><?php } 
											else{ ?><img src="img/girl.jpg"> <? }?>
							                 <img src="img/shadow-1-3.png">
											<a class='btn btn-mini' id="printButton" data-toggle="modal"
                                            style="position:absolute;top:32px;right:783px; background: #CCCCCC"
                                            href="#add_image<?php echo $id;?>"> 
                                            <img src="img/mono-icons/cameraplus32.png" width="20" height="20" > </a>
                                           <div class="modal fade hide" id="add_image<?php echo $id?>">
                          					<div class="modal-header">
                            				<button type="button" class="close" data-dismiss="modal">&times;</button>
                            				<h3>ADD IMAGE for <?php echo $fname;?></h3>
                         					</div> 
                          					<div class="modal-body">
                                            <form style="text-align:center" action="dp.php<?php echo "?id=$id"; ?>"  method="post"   enctype="multipart/form-data">
											<center><input  type="file" name="image" id="image" /></center><br />
                                            <center><input type="submit" name="upload" value ="Upload Now"> </center>      
                                			</form>
                                			</div><!-- /modal-body-->
    										<?php }
											echo"$fname $mname $lname #account_no";
											?>
                        </div><!-- / modal -->
                  
                           </div>
                            
                       
        </div> <!-- /shortcuts --> 	
				</div>
				</div> <!-- /widget-content -->
                
                </div> <!--widget-->
                
               </div><!-- span6 -->
                
           
	</div>
      <!-- /row -->

  </div> 
    <!-- /container -->
    
</div> <!-- /main --><!-- /extra -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    

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

</script>

<script src="js/libs/jquery-1.8.3.min.js"></script>
<script src="js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>


<script src="js/plugins/validate/jquery.validate.js"></script>

<script src="js/Application.js"></script>
<script src="validation.js"></script>
<script src="js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="js/demo/notifications.js"></script>



  </body>
</html>
