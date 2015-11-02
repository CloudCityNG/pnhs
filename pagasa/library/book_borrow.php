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
        
            <li class="dropdown "><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
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
            <li class="active" ><a href="book_borrow.php" ><i class="shortcut-icon icon-book"></i><span class="shortcut-label">Reading Material</span></a></li>
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
  
    <?php } ?> <!-- InstanceEndEditable -->
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
						<div id="page-title">
							<span class="title">Reading Materials</span>
							<span class="subtitle"><br><br> If one cannot enjoy reading the book over and over,there's no use in reading it at all.<br>~Oscar Wilde</span>
						</div>
						<!-- ENDS title -->
                        
          <?php              	
		  	if(@$_GET['vt']!='')
			{
				include('catalog.php');
			}
			if(@$_GET['author']!='')
			{
				include('view_author.php');
			}
		?>
                        	
	    					<div id="result"></div>                              
      						<!-- column (left)-->
						    <div class="three-fourth">
					<div class="widget stacked">
                           <div class="widget-header">
										<i class="icon-book"></i>
										<h3>Borrowing Form</h3>
									</div> <!-- /widget-header -->
									<div class="widget-content">
										<script type="text/javascript" src="js/form-validation.js"></script>
									<?php
	
	
				error_reporting(0);
				if($_POST['submit']){
				require "db.php";
						$account_no90=$_SESSION['account_no'];
					$access_no = $_POST['access_no'];
					$_no = $_POST['account_no'];
					$borrow_date = date('y-m-d');
					$borrow_time=gmdate(" H:i:s",time()+28800);
					mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
					$try=mysql_query("SELECT  count(account_no) as count23 from employee_account_t where emp_id='$_no'");//checking if the account is reg.
			        while ($try1 = mysql_fetch_array($try))
					{
						$account_=$try1['count23'];
					
					if($account_ == 1)
					{		$res4 = mysql_fetch_array(mysql_query("select * from employee_account_t where emp_id = '$_no'"));
					$account_no=$res4['account_no'];
					}
					else if($account_ == 0)
					{$res4 = mysql_fetch_array(mysql_query("select * from student_account_t where student_id = '$_no'"));
					$account_no=$res4['account_no'];
					}
					else
					{$account_no=$_no;
					}
					}
					
					$query=mysql_query("SELECT  account_no from account_t where account_no='$account_no'");//checking if the account is reg.
			        while ($a = mysql_fetch_array($query))
					{
						$account=$a['account_no'];
					}
					$query1=mysql_query("SELECT  access_no  from cat_copies_t where access_no='$access_no'");
					while ($b = mysql_fetch_array($query1)) 
					{
						$access=$b[access_no];
					}
					$query2=mysql_query("SELECT count(account_no) as total FROM appraisal_t WHERE return_time=0 AND account_no='$account_no'");
			        while ($r = mysql_fetch_array($query2))
					{
					$c_no = $r[total];//total borrowed book
					//echo"$c_no";
					}
					$qry=mysql_query("SELECT *, count(status) as lost FROM `cat_copies_t` WHERE access_no='$access_no' and status='borrow'");
			        while ($i = mysql_fetch_array($qry))
					{
					$c_id = $i['lost'];//determine if not yet return
					//echo"$c_id";
					}   
					$status=mysql_query("SELECT *, count(status) as lost FROM `cat_copies_t` WHERE access_no='$access_no' and status='lost'");
			        while ($status1 = mysql_fetch_array($status))
					{
					$rm=mysql_fetch_array(mysql_query("SELECT call_no FROM `cat_copies_t` WHERE access_no='$access_no'"));
					$mark = $status1['status'];//id of lost book
					$call_no=$rm['call_no'];
					}
					$s=mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$call_no'");
					while($try=mysql_fetch_array($s)){
					$section=$try['section_no'];
					$z=mysql_fetch_array(mysql_query("SELECT * FROM `cat_section_t` WHERE section_no='$section'"));
					
					$section_time=$z['time'];
					//	echo"$section_time";
					$title=$try['title'];//section_no
					//echo"section=$section<br>"; 
					}
					//$set=mysql_query("SELECT settings_id  FROM `account_t` WHERE account_no='$account_no'");
					//while($set1=mysql_fetch_array($set)){
					//$settings_id1 = $set1['settings_id'];
						//echo"setting=$settings_id1<br>";
					$book=mysql_query("SELECT * FROM `book_limit_t`");
					while($set1=mysql_fetch_array($book)){
					$no_book=$set1['no_books'];
					}
					$paid=mysql_fetch_array(mysql_query("SELECT count(a_remark) as remark FROM `appraisal_t` WHERE account_no='$account_no'  and a_remark='credit'"));
					
					$remark=$paid[remark];
						
					//echo"$c_no";
					//echo"$no_book";
					//	echo"mo=$no_book";
					
					if(($_no == NULL)&&($access_no == NULL))
					{
							echo"<p class='error-box'>Book ID and Library ID are both EMPTY.</p>";
							
					}
					else if($_no == NULL )
					{
							echo"<p class='error-box'>Library ID Empty</p>";
					}
					else if($access_no == NULL)
					{		echo"<p class='error-box'>Book ID Empty.</p>";
							
					}	
					else if(($c_no >= 2) && ($c_id >= 1))
						{
							
							echo"<p class='error-box'>You have reached the maximum number of books to be borrowed. Book is unavailable.</p>";
							
						}	
					else if($c_id >= 1)
						{
							echo"<p class='error-box'>The book has been borrowed.</p>";
						}
				
					else if($c_no >= $no_book)
						{
							echo"<p class='error-box'>You have reached the maximun number of books to be borrowed.</p>";
						}
					else if($remark >= 1)
						{
					
								echo"<p class='error-box'>Please settle your account first.</p>";
					
						}
						
					else
					{
			
						if(($account == NULL) && ($access != $access_no))
							{	
					
								echo"<p class='error-box'>Unregistered Library ID and BOOK ID.</p>";
								
							}
						else if($access != $access_no)
						{
								echo"<p class='error-box'>Unregistered Book ID.</p>";
						}
						else if($account == NULL)
						{
								echo"<p class='error-box'>Unregistered Library ID.</p>";
						
						}
						else if($mark=='lost')
						{
								echo"<p class='error-box'>Book cannot be borrowed. It was lost. </p>";
						}
						else
						{
						//echo"section=$section";
							if(($account == $account_no) && ($access == $access_no))
							{
						
								if(($section_time==0)||($section_time==NULL))
									{
										echo"<p class='error-box'>This book if for library use only. </p>";
									}
								else
								{					
								
									mysql_query("INSERT INTO appraisal_t values('','$borrow_date','$borrow_time','','','','','$access_no','$account_no','$account_no90','','not_seen')");
									mysql_query("UPDATE cat_copies_t SET status='borrow' where access_no='$access_no'");
							
									//echo"$section";	
									$time=mysql_query("SELECT * FROM `cat_section_t` WHERE section_no='$section'");
									while ($row = mysql_fetch_array($time)) {
									$time_cat=$row['time'];
									$unit=$row['section_unit'];
									if($unit==minute)
									{
									$unit1=60;
									}
									else if($unit==hour)
									{
									$unit1=3600;
									}
									else if($unit==day)
									{
									$unit1=86400;
									}
									else if($unit == week)
									{
									$unit1=604800;
									}
									$time2=$time_cat/$unit1;
									}
									$res = mysql_query($order);
									
							
											$query=mysql_fetch_array(mysql_query("select *, count(account_no) from employee_account_t where account_no='$account_no'"));
											$r=$query[0];
											$r1=$query['emp_id'];
												if($r >=1)
												{
						  							$q23=mysql_fetch_array(mysql_query("Select * from employee_t where emp_id='$r1'"));
													
														$name1= $q23[f_name] ;
														$name2=$q23[m_name];
														$name3=$q23[l_name] ;
												
													
												}
												
												else
												{
													$query2=mysql_query("select * from student_t where student_id='$_no'");
														while($q3=mysql_fetch_array($query2))
														{
															$name1= $q3[f_name] ;
															$name2=$q3[m_name];
															$name3=$q3[l_name] ;
														}
												}
									 			echo"<p class='success-box'><b>Sucess!<br>
												Title: $title <br>
												Time Allotment:&nbsp;$time2 $unit(s)<br>
												Borrowed by:<br>
												Library ID:$_no <br>
												Name:&nbsp;&nbsp;&nbsp; $name1 $name2 $name3";?>
                                                <br><a style='color:#FFFFFF' id='contactForm' href='book_borrow.php'>
												<input type="submit" value="OK" name="submit2" id="submit" required />
												</a> </b>
												</p>
									
									
                                    
									<?php 
								
									
														
						}}	
							
						
				}}
					
					
					
}
			mysql_query("Commit");
											
?>
                                        
                                        
 
            							<form id="contactForm" action="#" method="post">
										<fieldset>
											<div>
												<label>Book ID</label>
													<input name="access_no" style="height:inherit"  id="name" type="text" class="form-poshytip" title="Enter your book ID" />
											</div>
											<div>
												<label>Library ID</label>
												<input name="account_no" style="height:inherit"  id="email" type="text" class="form-poshytip" title="Enter your Library ID" />
											</div>
                                            
                                            <p><input type="submit" value="BORROW" name="submit" id="submit" /></p>
										</fieldset>
										</form>

                                        
										<!-- ENDS form -->
							</div>
							<!-- ENDS column -->
					<br />
								</div> <!-- /widget-content -->
			            </div> 
					      <!-- /widget -->					
			
	                 </div> <!-- /span12 -->     	
      	
      	
     
						<!-- column (right)-->
					<div class="one-fourth last">
								<!-- content --><!-- sidebar -->
						<ul id="sidebar">
							<!-- init sidebar -->
							<li>
										
								<ul>
									<li class="cat-item"><a  href="book_borrow.php" title="Click to Borrow book"style="background:#f1f1f1" >Borrow Books</a></li>
									<li class="cat-item"><a href="book_return.php" title="Click to Return book">Return Books</a></li>
									<li class="cat-item"><a href="book_lost.php" title="Click to Report Book Lost">Report Book Lost</a></li>
									<li class="cat-item"><a  class="submit" onClick="window.open('bago.php?','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center');"title="Click to add book">Add Books</a></li>
                             		<li class="cat-item"><a  class="submit" onClick="window.open('periodical_add.php?','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center');"title="Click to add book" >Add Periodical</a></li>
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
	

  <title>Pagasa National Highschool:: Base Admin</title>
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
<script src="validation.js"></script>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->