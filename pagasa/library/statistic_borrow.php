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

						<ul class="mainnav" >
                    <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
        
            <li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
			<i class="shortcut-icon icon-signal"></i><span class="shortcut-label">Statistics</span></a>
           
						<ul class="dropdown-menu">
							<li><a href="statistic.php">Book</a></li>
							<li><a href="statistic_borrow.php">Borrower</a></li>
							<li><a href="statistic_logs.php">Logs</a></li>
						</ul> 
            </li>
  
         <?php if($developer || $super_admin || $librarian){?>
               <li class=""><a href="logs.php" ><i class="shortcut-icon icon-calendar"></i><span class="shortcut-label">Library Logs</span></a></li>
        <?php } ?>
        <?php if($developer || $super_admin || $librarian){?>
            <li ><a href="book_borrow.php" ><i class="shortcut-icon icon-book"></i><span class="shortcut-label">Reading Material</span></a></li>
        <?php } ?>
        <?php if($developer || $super_admin || $librarian){?>
            <li><a href="report.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Report</span></a></li>
        <?php } ?>
        <?php if(!$developer && !$super_admin && !$librarian){?>
            <li><a href="account.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Account</span></a></li>
        <?php } ?>
              <li><a href="status.php"><i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Status</font></span></a></li>
   
  <?php if($developer || $super_admin || $librarian){?>
  <li><a href="notification.php" ><i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Notification&nbsp;<?php if($count >= 1){ echo"<font color='#00FF00'> ($count)";} else{}?></font></span></a></li>
            <li ><a href="setting.php" ><i class="shortcut-icon icon-cog"></i><span class="shortcut-label">Setting</span></a></li>
  
    <?php } ?>
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
  

	<!-- MAIN -->
	
    		<div id="main">
				<!-- wrapper-main -->
	
    			<div class="wrapper">
					
					<!-- content -->
					<div id="content">
						
						<div class="main">
 	
<!-- title -->
          <div id="result"></div>
						<div id="page-title">
							<span class="title">Statistic</span>
							<span class="subtitle"><br>"A book is like a garden carried in the pocket."<br>  ~Chinese Proverb </span>						</div>
						<!-- ENDS title -->	
		
					
    <div class="container">
 	 <div class="">
      	<div class="span6">	
			
				<div class="widget stacked">
					
					<div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h3>Borrower's Logs</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<div id="pie-chart" class="chart-holder"></div> <!-- /pie-chart -->
	  </div> <!-- /widget-content -->
				</div> <!-- /widget -->			
			</div> <!-- /span6 -->
		
   				<form action="" method="post">
        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select style="width:90px;font-size:12px" name="year">
        		<option>School year</option>
              	<?php echo $try=mysql_query("SELECT * FROM school_year_t");
				while($ro=mysql_fetch_array($try)){
				$start=$ro['sy_start'];
				$end=$ro['sy_end'];
				$id=$ro['sy_id'];
				?><option value="<?php echo"$id";?> "><?php echo"$start - $end"; ?></option>	<?php }?>	</select>
            
				<select style="width:80px;font-size:12px" name="level">
                <option>Year</option>
              	<?php echo $try1=mysql_query("SELECT * FROM year_level_t ");
				while($ro1	=mysql_fetch_array($try1)){
				$lvl_id=$ro1['lvl_id'];
				$lvl_name=$ro1['lvl_name'];
				?><option value="<?php echo"$lvl_id";?> "><?php echo"$lvl_name"; ?></option>	<?php }?>	</select>
                
                <select style="width:100px;font-size:12px" name="section">
                <option>Section</option>
				<?php echo $try3=mysql_query("SELECT * FROM section_t ");
				while($ro3=mysql_fetch_array($try3)){
				$section_name=$ro3['section_name'];
				$s_id=$ro3['section_id'];
				?>
                <option value="<?php echo"$s_id";?> "><?php echo"$section_name"; ?></option>	<?php }?>	</select>
                                 <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit" id="submit" />
            	</form>
    

  			<div class="span4">
  				
  				<div class="widget stacked widget-table">
					
					<div class="widget-header">
						<span class="icon-external-link"></span>
						<h3>Legends</h3>
					</div> <!-- .widget-header -->
					
					<div class="widget-content">
						<table class="table table-bordered table-striped">
							
							<thead><tr>								
								<th width="100">Library Id</th>
								<th>Name</th>								
							</tr></thead>
					
						<tbody><tr>
					<?php 
							error_reporting(0);
							require "db.php";
    						if($_POST['submit']){
							$year=$_POST['year'];
							$level=$_POST['level'];
							$section=$_POST['section'];
							$year1=mysql_query("SELECT * FROM school_year_t WHERE sy_id='$year'");
							while($y2=mysql_fetch_array($year1))
							{$start1=$y2['sy_start'];
							$end1=$y2['sy_end'];}
							
							$level1=mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$level'");
							while($l2=mysql_fetch_array($level1))
							{$level1=$l2['year_lvl'];}
							
							if($year == 'School year' && $level == 'Year' && $section == 'Section')
							{
							echo"<p class='error-box'>Error all field are empty </p>";
							}
							
							else if($year == 'School year')
							{
							echo"<p class='error-box'>Please select school year</p>";
							}
							else if($year != '0' && $level == 'Year' && $section != 0)
							{
							echo"<p class='error-box'>Please select year level</p>";
							}
							
							else if(($year != NULL  && $level == 'Year') && ($section=='Section'))
							{
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='$end1-03-30'
							GROUP BY student_id ORDER BY total LIMIT 10");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$account_no=$c['account_no'];
							$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
							$fname=$qry1['f_name'];
							$mname=$qry1['m_name'];
							$lname=$qry1['l_name'];
							
							echo"<tr><td>$student_id</td><td>";
						?>
                            <?php if($developer || $super_admin || $librarian){?>
       						<a target="_blank" href="account2.php?call_no=<?php echo"$student_id";?>">
							<?php echo"$fname $mname $lname  </a></td></tr>";
							}else{echo"$fname $mname $lname";}
								}}
							
							if($year != 0  && $level != 0 && $section=='Section')
							{
							$i=0;
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='$end1-03-30'
							GROUP BY student_id ORDER BY total");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$account_no=$c['account_no'];
							$lol=mysql_fetch_array(mysql_query("select * from student_registration_t where student_id='$student_id'"));
							$year_level=$lol['year_level'] + 1;
							$year_level1=$lol['year_level']-1;
							if(($year_level1 < $level)&&($year_level > $level))
							{
									if($i<=10){
									$i=$i+1;
									$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
									$fname=$qry1['f_name'];
									$mname=$qry1['m_name'];
									$lname=$qry1['l_name'];
									echo"<tr><td>$student_id</td><td>";
							?>
                            <?php if($developer || $super_admin || $librarian){?>
       						<a target="_blank" href="account2.php?call_no=<?php echo"$student_id";?>">
							<?php echo"$fname $mname $lname  </a></td></tr>";
							}else{echo"$fname $mname $lname";}
							 }		}
							}
							}
							
							if($year != 0  && $level != 0 && $section != 0)
							{
							$i=0;
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='$end1-03-30'
							GROUP BY student_id ORDER BY total");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$account_no=$c['account_no'];
							
							$lol=mysql_fetch_array(mysql_query("select * from student_registration_t where student_id='$student_id'"));
							$year_level=$lol['year_level'] + 1;
							$year_level1=$lol['year_level']-1;
							$section_id=$lol['section_id']-1;
							$section_id1=$lol['section_id']+1;
							if((($year_level1 < $level)&&($year_level > $level)) && (($section < $section_id1)&&($section > $section_id)))
							{
									if($i<=1){
									$i=$i+1;
									$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
									$fname=$qry1['f_name'];
									$mname=$qry1['m_name'];
									$lname=$qry1['l_name'];
									echo"<tr><td>$student_id ire</td><td>";
							?>
                            <?php if($developer || $super_admin || $librarian){?>
       						<a target="_blank" href="account2.php?call_no=<?php echo"$student_id";?>">
							<?php echo"$fname $mname $lname  </a></td></tr>";
							}else{echo"$fname $mname $lname";}
							 }		}
							
							
							}}
							
							}
							else{
							
							$query=mysql_query("SELECT *, count(*) as total FROM appraisal_t  JOIN student_account_t ON 
							appraisal_t.account_no = student_account_t.account_no GROUP BY student_id ORDER BY total desc limit 10");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$account_no=$c['account_no'];
							$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
							$fname=$qry1['f_name'];
							$mname=$qry1['m_name'];
							$lname=$qry1['l_name'];
							echo"<tr><td>$student_id</td><td>";
							?>
                            <?php if($developer || $super_admin || $librarian){?>
       						<a target="_blank" href="account2.php?call_no=<?php echo"$student_id";?>">
							<?php echo"$fname $mname $lname  </a></td></tr>";
							}else{echo"$fname $mname $lname";}
							}
							$query1=mysql_query("SELECT *, count(*) FROM appraisal_t  JOIN employee_account_t ON 
							appraisal_t.account_no = employee_account_t.account_no GROUP BY emp_id desc limit 10");
							while($c1=mysql_fetch_array($query1))
							{
							$emp_id=$c1['emp_id'];
							$qry2=mysql_fetch_array(mysql_query("select * from employee_t where emp_id='$emp_id'"));
							$fname1=$qry2['f_name'];
							$mname1=$qry2['m_name'];
							$lname1=$qry2['l_name'];
							$xname1=$qry2['name_extension'];
							echo"<tr><td>$emp_id</td><td>";
							?>
                            <?php if($developer || $super_admin || $librarian){?>
       						<a target="_blank" href="account2.php?call_no=<?php echo"$student_id";?>">
							<?php echo"$fname1 $mname1 $lname1  </a></td></tr>";
							}else{echo"$fname1 $mname1 $lname1";}
							}
							
							}	
							?>
					</tbody></table>
		
        
</div> <!-- .widget-content -->
				</div>
		  </div> <!-- /span4 -->
	  </div> <!-- /row -->
   </div>
</div></div>
<a class="btn btn-mini" target="_blank" href="print_stat2.php?year=<?php echo"$year";?>&&level=<?php echo"$level";?>&&section=<?php echo"$section";?>">
       <img src="img/mono-icons/printer32.png" title="PRINT" width="25s" height="22"><br>Print</a>				
       						<!-- ENDS page-content -->
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
		var i=0;
			<?php 
							
							error_reporting(0);
							require "db.php";
    						
							if($_POST['submit']){
							$year=$_POST['year'];
							$level=$_POST['level'];
							$section=$_POST['section'];
							$year1=mysql_query("SELECT * FROM school_year_t WHERE sy_id='$year'");
							while($y2=mysql_fetch_array($year1))
							{$start1=$y2['sy_start'];
							$end1=$y2['sy_end'];}
							
							$level1=mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$level'");
							while($l2=mysql_fetch_array($level1))
							{$level1=$l2['year_lvl'];}
							
							if($year != NULL  && $level == 'Year' && $section=='Section')
							{
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='$end1-03-30'
							GROUP BY student_id ORDER BY total limit 10");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
							$fname=$qry1['f_name'];
							$mname=$qry1['m_name'];
							$lname=$qry1['l_name'];
							?>
							data[i] = { label: "<?php echo $student_id;?>", data: <?php echo $total;?> }
							i++;
							<?php 
							}}
							
							if($year != 0  && $level != 0 && $section=='Section')
							{
							$e=0;
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='$end1-03-30'
							GROUP BY student_id ORDER BY total");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$account_no=$c['account_no'];
							$e=$e+1;
							$lol=mysql_fetch_array(mysql_query("select * from student_registration_t where student_id='$student_id'"));
							$year_level=$lol['year_level'] + 1;
							$year_level1=$lol['year_level']-1;
							if(($year_level1 < $level)&&($year_level > $level))
							{
									if($i<=10){
									$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
									$fname=$qry1['f_name'];
									$mname=$qry1['m_name'];
									$lname=$qry1['l_name'];
									?>
									data[i] = { label: "<?php echo $student_id;?>", data: <?php echo $total;?> }
									i++;
									<?php 
									}
							}
							}
							}
							if($year != 0  && $level != 0 && $section != 0)
							{
							$e=0;
							$query=mysql_query("SELECT * , COUNT( * ) AS total
							FROM appraisal_t
							JOIN student_account_t ON appraisal_t.account_no = student_account_t.account_no
							WHERE return_date >='$start1-06-01' and return_date <='
							$end1-03-30'
							GROUP BY student_id ORDER BY total");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$account_no=$c['account_no'];
							$e=$e+1;
							$lol=mysql_fetch_array(mysql_query("select * from student_registration_t where student_id='$student_id'"));
							$year_level=$lol['year_level'] + 1;
							$year_level1=$lol['year_level']-1;
							$section_id=$lol['section_id']-1;
							$section_id1=$lol['section_id']+1;
							if((($year_level1 < $level)&&($year_level > $level)) && (($section < $section_id1)&&($section > $section_id)))
							{
									if($e<=10){
									$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
									$fname=$qry1['f_name'];
									$mname=$qry1['m_name'];
									$lname=$qry1['l_name'];
									?>
									data[i] = { label: "<?php echo $student_id;?>", data: <?php echo $total;?> }
									i++;
									<?php 
									}	
							
							
							}
							}}
							
							}
							else{
							
							$query=mysql_query("SELECT *, count(*)as total FROM appraisal_t  JOIN student_account_t ON 
							appraisal_t.account_no = student_account_t.account_no GROUP BY student_id desc limit 10");
							while($c=mysql_fetch_array($query))
							{
							$student_id=$c['student_id'];
							$total=$c['total'];
							$qry1=mysql_fetch_array(mysql_query("select * from student_t where student_id='$student_id'"));
							$fname=$qry1['f_name'];
							$mname=$qry1['m_name'];
							$lname=$qry1['l_name'];
							
							?>
							data[i] = { label: "<?php echo $student_id;?>", data: <?php echo $total;?> }
							i++;
							<?php 
							}
							$query1=mysql_query("SELECT *, count(*) as total FROM appraisal_t  JOIN employee_account_t ON 
							appraisal_t.account_no = employee_account_t.account_no GROUP BY emp_id ORDER BY total desc limit 10");
							while($c1=mysql_fetch_array($query1))
							{
							$emp_id=$c1['emp_id'];
							$total=$c1['total'];
							$qry2=mysql_fetch_array(mysql_query("select * from employee_t where emp_id='$emp_id'"));
							$fname1=$qry2['f_name'];
							$mname1=$qry2['m_name'];
							$lname1=$qry2['l_name'];
							$xname1=$qry2['name_extension'];
							?>
							data[i] = { label: "<?php echo $emp_id;?>", data: <?php echo $total;?> }
							i++;
							<?php 
							}
							}	
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

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->