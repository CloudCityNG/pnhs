<!DOCTYPE html>

<html lang="en"><!-- InstanceBegin template="/Templates/library_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
  <head>
 <?php
 require "db.php";
 
@session_start();	
if (!isset($_SESSION['username'])) {
	header("location: ../restrict.php"); // IMPORTANT!!!!
}
include_once "../actions/user_priviledges.php";

$developer = is_privileged($_SESSION['account_no'], 1);
$super_admin = is_privileged($_SESSION['account_no'], 2);
$librarian = is_privileged($_SESSION['account_no'], 8);

?>
    <meta charset="utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Pagasa National Highschool:: Base Admin</title>
    <!-- InstanceEndEditable -->
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
<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	


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
<!-- InstanceBeginEditable name="head" -->
<link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  
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
			
			<a class="brand" href="../index.html">
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

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
			  
			 	<?php 
					require "db.php";
					
					$return_date =strtotime(date('Y-m-d'));
					$return_time = strtotime(gmdate('h:i:s',time()+28800));
					mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");

					$qry=mysql_query("SELECT * FROM `appraisal_t` WHERE return_time='0' and notification='not_seen'");
					$count=0;
					while($a=mysql_fetch_array($qry)){
					$b_time=strtotime($a['borrow_time']);
					$b_date=strtotime($a['borrow_date']);
					$access_no=$a['access_no'];
					$b=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
					$call_no=$b['call_no'];
					$c=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$call_no'"));
					$section_no=$c['section_no'];
					$d=mysql_fetch_array(mysql_query("SELECT * FROM `cat_section_t` WHERE section_no='$section_no'"));
					
					$time3=$d['time'];
					
					$time= $b_time+$b_date+$time3;
					$time2= $return_time+$return_date;
				
					if($time2 >= $time )
					{
					$count=$count+1; 
					}
					
				}
				
				

?>		
			<!-- InstanceBeginEditable name="navbar" -->
			 <!-- InstanceEndEditable -->
  	        			 <?php include("livesearch.php");?>
   
   	<form class="navbar-search pull-right" method="post" name="form1" id="searchform" action="#"/>
	  <select style="width:auto; height:auto; background-color:#CCCCCC; border-color:#666666" id="text" type="select" name="category"   onBlur="clearInput(this)" >
                <option value="all"><center>ALL</center></option>
                <option value="title"><center>TITLE</center></option>
                <option value="author"><center>AUTHOR</center></option>
                <option value="subject">SUBJECT</option>
	        </select>
            	<input type="text" class="search-query" placeholder="Search"  name="s" id="s"  onBlur="clearInput(this)" onKeyUp="showHint(this.value)" />
								<input type="submit" id="searchsubmit" value=" " />
							
	</form>
   
    
				  
 	
            	 </div> 
            <!-- /.subnav-collapse -->

		</div> <!-- /cont	ainer -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse">
	
  <div class="navbar-inner" style="padding:0; padding-left:100px;background-color:#0C0; color:#000;">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<i class="icon-cog"></i>			</a>
			
				
		  <!--/.nav-collapse -->	
		</div> 
		<!-- /container -->
  </div> <!-- /navbar-inner -->
</div>		
 	<!--/smaller navbar-->
<!-- InstanceBeginEditable name="content" -->
  		</div></ul>		
  <div id="result"></div>
         <!-- MAIN -->
            <div id="main">
				<!-- wrapper-main -->
			      <div class="wrapper">
                  
					<!-- content -->
					<div id="content">
					        <!-- title -->
						<div id="page-title">
 <?php	
	  				error_reporting(0);
		require "db.php";
		  $account_no = $_GET['call_no'];
		$s=mysql_query("SELECT * FROM `student_account_t` WHERE student_id='$account_no'");
		while($student1=mysql_fetch_array($s))
		{	$call=$student1['student_id'];
			$id=$student1['account_no'];
			$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_t` WHERE student_id='$call'"));
			$fname=$student['f_name'];
			$mname=$student['m_name'];
			$lname=$student['l_name'];
			$type=$student['student_type'];
			$city=$student['city_municipality'];
			$barangay=$student['barangay'];
			$street=$student['street'];
			
			echo"<span class='title'>
  	$fname $mname $lname
				 </span>
			<span class='subtitle'><br>$type Student &nbsp;<br>$street $barangay $city<br></span>";
			
		}
			$empl=mysql_query("SELECT * FROM `employee_account_t` WHERE emp_id='$account_no'");
			while($employee=mysql_fetch_array($empl)){
			$emp_id=$employee['emp_id'];
			$id=$employee['account_no'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$add=$employee1['address'];
			
			echo"<span class='title'>
  	$fname&nbsp;$mname&nbsp;$lname&nbsp;
			</span> 
			<span class='subtitle'><br>Employee &nbsp;<br>$street $add</span>";
		
			}
		
		
		
		 ?>
						 
         </div>
					
                    	<!-- ENDS title -->
   <!-- page-content -->

						<!-- page-content -->
						<div id="page-content">
						
                        <h6 class="toggle-trigger"><a href="#">Log Rescords</a></h6>
						<div class="toggle-container">
						 <div class="block">
						   <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                		<tr  bgcolor='#CCFFFF' align="center" >
                
                        <th>Log Date</th>
                        <th>Log In Time</th>
                        <th>Log Out Time</th>
                        </tr>
                        <?php 
							error_reporting(0);
		  					$account_no = $_GET['call_no'];
							require "db.php";
							$s=mysql_query("SELECT * FROM `library_logs` WHERE account_no='$id'");
							while($log=mysql_fetch_array($s))
							{	
							$date=$log['log_date'];
							$in=$log['log_in_time'];
							$out=$log['log_out_time'];
						echo"<tr  bgcolor='#CCFFFF' align='center' >
                		     <td>$date</td>
                        <td>$in</td>
                        <td>$out</td>
                        </tr>
               ";
						}?>
                        </table>
                        <!-- ENDS form --></div></div>
            			<h6 class="toggle-trigger"><a href="#">Book Transaction Records</a></h6>
						<div class="toggle-container">
						<div class="block">
					     <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                		<tr  bgcolor='#CCFFFF' align="center" >
                
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Title</th>
                        <th>Fine</th>
                        <th>Penalties</th>
                        <th>&nbsp;</th>
                        </tr>
                        <?php 
							error_reporting(0);
		  $account_no = $_GET['call_no'];
							require "db.php";
							$s1=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id'");
							while($log1=mysql_fetch_array($s1))
							{	
							$bdate=$log1['borrow_date'];
					
							$btime=$log1['borrow_time'];
							$rdate=$log1['return_date'];
							$rtime=$log1['return_time'];
							$access_no=$log1['access_no'];
							$fine=$log1['fine'];
							$remark=$log1['a_remark'];
							$penalties=$log1['penalties'];
							$amount=number_format($fine, 2, '.', ',');
							$amount1=number_format($penalties, 2, '.', ',');
		
						$book=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
						$book1=$book['call_no'];
						$title=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$book1'"));
						$title1=$title['title'];
						echo"<tr  bgcolor='#CCFFFF' align='center' >
                		 <td>$bdate $btime</td>
                         <td>$rdate $rtime</td>
                        <td>$title1</td>
                        <td>Php. $amount</td>
                        <td>Php. $amount1</td>
                        <td>$remark</td>
                        </tr> ";
						}?>
                    	</table>
                        
		<!-- ENDS form --></div></div>
        
   
     
<!-- ENDS column -->							
		
					</div>
					<!-- ENDS content -->

				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->
	
  <!-- InstanceEndEditable -->
    
    
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
<!-- InstanceBeginEditable name="tail" -->
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script><script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->