<!DOCTYPE html>
        <?php
		session_start();
		//echo "<br><br><br><br><br><br><br>";
		$username = $_SESSION['username'];
		include("db/db.php");
		$sql = mysql_query("SELECT * FROM account_t, employee_account_t, employee_t
							WHERE account_t.username ='master' 
							AND account_t.account_no = employee_account_t.account_no
							AND employee_t.emp_id = employee_account_t.emp_id");
		
		if(!isset($_SESSION['username'])){
          header("Location: restrict.php");
	    }
		?>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Pagasa National Highschool:: Base Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
    <link href="csshome/bootstrap.css" rel="stylesheet" />    
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="csshome/font-awesome.min.css" rel="stylesheet" />        
    
    <link href="csshome/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
    
    <link href="csshome/base-admin-2.css" rel="stylesheet" />
    <link href="csshome/base-admin-2-responsive.css" rel="stylesheet" />
    
    <link href="csshome/pages/dashboard.css" rel="stylesheet" />   

    <link href="csshome/custom.css" rel="stylesheet" />


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
   <link rel="stylesheet" href="csshome/calendarview.css">
    <style>
      body {
        font-family: Trebuchet MS;
		background:url(library/img/bg/patterns/noise.png);
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
							<?php echo $_SESSION['username']; ?>
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
    <div class="">
    <img src="images/banner.jpg">
    </div>
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

		         <table width="100%">
         <tr>
           <td>
                
        <div class="span4">
      		
      		<div class="widget stacked" style="height:620px">
					<br>
				<div class="widget-header">
					<i class="icon-star"></i>
					<h3>Profile</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content" style="height:520px">
					
			<div class="shortcuts">
            <!-- /put profile info here-->
       	        <!-- /put profile info here-->
            <span class="shortcut-label">
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
			$gender=$student['gender'];
			$s=mysql_fetch_array(mysql_query("SELECT * FROM `student_registration_t` WHERE student_id='$call'"));
			$section=$s['section_id'];
			$level=$s['year_level'];
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
		 		 						
			$emp_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$emp_id'");
			$found_pic=mysql_fetch_assoc($emp_pic);
			$img=$found_pic['pic_name'];							
							if($img!=NULL){
							if($emp_id != NULL){
							
							?>
 								
								<a href="eis/include/dpic/<?php echo $img; ?>" class="ui-lightbox">
									<img src="eis/include/dpic/<?php echo $img; ?>"  width="150" height="100" >
                                	<img src="library/img/shadow-project.png">
           <a href="-registration/include/dpic/<?php echo $img; ?>-large" class="preview"> </a>
					

                                        		
						       <?php }
							else{	
							
							 ?>
 								
								<a href="-registration/large/<?php echo $img; ?>" class="ui-lightbox">
									<img src="-registration/include/dpic/<?php echo $img;?>"  width="150" height="100" >
                                	<img src="library/img/shadow-project.png">
           <a href="-registration/include/dpic/<?php echo $img; ?>-large" class="preview"> </a>
					

                                        		
						       <?php }  
					
							    
							   
							   
							    } else { ?>
            					            <?php if($gender == 'female' || $gender == 'Female' ){?>      
             								<img src="library/img/girl.jpg" >
                                            	<img src="library/img/shadow-project.png">
                                <?php } 
											else { ?>
												<img src="library/img/boy.jpg"> 
											<?php } ?>
							                
							                <?php }
										   		echo"<br>$fname $mname $lname";
										    
										    if($call != '0' )
											{
												echo"<br> $level - $section1";
											} else
											{
												echo"$position";
											}
											?>      
                                            
                                            
                                            
                                            <div id="embeddedExample" style=""> 
          <div id="embeddedCalendar" style="margin-left: auto; margin-right: auto"></div>
        </div> <!-- /shortcuts --> 	
				
				</div> <!-- /widget-content -->
                
                </div> <!--widget-->
                
            </div><!-- span6 -->
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
         <td>
          
              <!--<div class="span6">
    
     			 <div class="widget stacked">
					<br>
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Quick Shortcuts</h3>
				</div> <!-- /widget-header -->
				
				<!--<div class="widget-content"> -->
					
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
<span class="wsl"><a href="http://wowslider.com"></span>
	<div class="ws_shadow"></div>
        </div> <!-- /shortcuts --> 	
				
			<!--	</div> <!-- /widget-content -->
			
			<!--</div> <!-- /widget -->
      		
	   <!-- </div> <!-- /span6 -->
       <br />
        <div class="span 7">
    
     			 <div class="widget stacked">
					<br>
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Modules</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					 <div class="shortcuts">
              <a href="-registration/reg_home.php" class="shortcut">
              <i class="shortcut-icon icon-list-alt"></i>
                <span class="shortcut-label">Registration</span>
            </a>
            
            <a href="-scheduling/redirect.php" class="shortcut">
                <i class="shortcut-icon icon-bookmark"></i>
                <span class="shortcut-label">Scheduling</span>								
            </a>
            
            <a href="-grading/grading_home.php" class="shortcut">
                    <i class="shortcut-icon icon-signal"></i>
                <span class="shortcut-label">Grading</span>	
            </a>
            
            <a href="eis/eis_home.php" class="shortcut">
                <i class="shortcut-icon icon-comment"></i>
                <span class="shortcut-label">EIS</span>								
            </a>
            <br />
            <a href="-sis/sis-home.php" class="shortcut">
                <i class="shortcut-icon icon-user"></i>
                <span class="shortcut-label">SIS</span>
            </a>
            
            <a href="library/statistic.php" class="shortcut">
                <i class="shortcut-icon icon-file"></i>
                <span class="shortcut-label">Library</span>	
            </a>
            
            <a href="inventory/inv_home.php" class="shortcut">
                <i class="shortcut-icon icon-picture"></i>
                <span class="shortcut-label">Inventory</span>	
            </a>
                <a href="-amsko/account_list.php" class="shortcut">
                <i class="shortcut-icon icon-user"></i>
                <span class="shortcut-label">Accounts</span>	
            </a>

    
        </div> <!-- /shortcuts --> 	
				
				</div> <!-- /widget-content -->
			
			</div> <!-- /widget -->
      		
	    </div> <!-- /span6 -->
         </td>
         </tr>
         </table>
         
         
          
           
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


  </body>
</html>
