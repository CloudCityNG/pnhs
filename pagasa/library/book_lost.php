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
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

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
  
    <?php } ?><!-- InstanceEndEditable -->
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
							<span class="title">Reading Materials</span>
							<span class="subtitle"><br>“Every reader his or her book.
Every book its reader.” </br>
― S.R. Ranganathan

</span>
						</div>
						<!-- ENDS title -->	
					            
      						<!-- column (left)-->
						    <div class="three-fourth">
					<div class="widget stacked">
                           <div class="widget-header">
										<i class="icon-book"></i>
										<h3> Lost Form</h3>
									</div> <!-- /widget-header -->
			
       	<div class="widget-content">
										<script type="text/javascript" src="js/form-validation.js"></script>
	       					        
                                         <?php
		 
        error_reporting(0);
  
		if($_POST['submit']){
		require "db.php";
		$_no = $_POST['account_no'];
		$access__no = $_POST['access_no'];
		$payment= $_POST['payment'];
		$return_date =date('y-m-d');
		$return_time = gmdate('h:i:s',time()+28800);
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
					
		$query1 = mysql_query("SELECT * FROM appraisal_t WHERE return_time='0' and access_no='$access_no' and account_no='$account_no'");  
		while($q=mysql_fetch_array($query1)){
		$account = $q[account_no]; 
		$access = $q[access_no];
		$rm = mysql_fetch_array(mysql_query("SELECT * FROM cat_copies_t WHERE access_no='$access_no'"));  
		$call_no=$rm['call_no'];
		$s = mysql_fetch_array(mysql_query("SELECT * FROM cat_reading_material_t WHERE call_no='$call_no'"));
		$section=$s['section_no'];
		$title=$s['title'];
		$sec = mysql_fetch_array(mysql_query("SELECT * FROM cat_section_t WHERE section_no='$section'"));
		$time1=$sec['time'];
		$unit=$sec['section_unit'];
		$unit_cost=$sec['unit_cost'];
		$amount=$sec['fine_amount'];
		$s2 = mysql_fetch_array(mysql_query("SELECT *, COUNT(account_no) as count FROM account_t "));
		$max_account=$s2[count];
		$s3 = mysql_fetch_array(mysql_query("SELECT *, COUNT(access_no) as count FROM cat_copies_t "));
		$copy = mysql_fetch_array(mysql_query("SELECT * FROM cat_supplies_t WHERE call_no='$call_no'"));
	
		$fine=$copy['unit_price'];
		$max_access=$s3[count];	
					
		$b_time  =strtotime($q[borrow_time]);
		$r_time=strtotime ($return_time);
		$interval_time = ($r_time - $b_time);
		$in_time=intval($interval_time);
					//echo"interval time=$in_time<br>";
					
		$b_date=strtotime($q[borrow_date]);
		$r_date=strtotime($return_date);
		$interval_date = ($r_date - $b_date);
		$in_date=intval($interval_date);
					//echo"interval date=$in_date<br>$r_date<br>";
					
		$final=$in_time+$in_date;
		$mark="On Shelf";
					//echo"final=$final";
				
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
						//time allotment
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
						else if($unit==week)
						{
							$unit1=604800;
						}
						//overdue
						if($unit_cost==minute)
						{
							$unit2=60;
						}
						else if($unit_cost==hour)
						{
							$unit2=3600;
						}
						else if($unit_cost==day)
						{
							$unit2=86400;
						}
						else if($unit_cost==week)
						{
							$unit2=604800;
						}
					//echo"unit=$unit";
						$time2 = $final-$time1;//sobrang oras
						$time3=($time1/$unit1);	//	allotment time
						$seconds = $time2;//sobrang oras
						$remaining=($time1-$final);//remaining time
						$amount1=(($seconds/$unit2)*$amount);
						//echo"unit$time2<br>$unit1<br>$amount1";
						$fine2=number_format($fine, 2, '.', ',');
						$amount2=number_format($amount1, 2, '.', ',');
						$amount3 = str_replace( ',', '', $amount2 );
							
						//remaining
						$days1 = $remaining / 86400;
						$day_explode1 = explode(".", $days1);
						$day1 = $day_explode1[0];

						$hours1 = '.'.$day_explode1[1].'';
						$hour1 = $hours1 * 24;
						$hourr1 = explode(".", $hour1);
						$hourrs1 = $hourr1[0];

						$minute1 = '.'.$hourr1[1].'';
						$minutes1 = $minute1 * 60;
						$minute1 = explode(".", $minutes1);
						$minuter1 = $minute1[0];

						$seconds1 = '.'.$minute1[1].'';
						$second1 = $seconds1 * 60;
						$seconder1 = round($second1);
					
						
					//overdue
						$days = $seconds / 86400;
						$day_explode = explode(".", $days);
						$day = $day_explode[0];

						$hours = '.'.$day_explode[1].'';
						$hour = $hours * 24;
						$hourr = explode(".", $hour);
						$hourrs = $hourr[0];

						$minute = '.'.$hourr[1].'';
						$minutes = $minute * 60;
						$minute = explode(".", $minutes);
						$minuter = $minute[0];

						$seconds = '.'.$minute[1].'';
						$second = $seconds * 60;
						$seconder = round($second);
					
		}
		if(($access_no==NULL)&&($_no == NULL)&&($payment=='-type of payment-'))
		{
			echo"<p class='error-box'>EMPTY.</p>";
		}
		else if(($payment=='-type of payment-'))
		{
			echo"<p class='error-box'>Select first type of payment.</p>";
			}
		else if($_no== NULL)
		{
			echo"<p class='error-box'>Library ID EMPTY. </p>";
		}
		
		else if($access_no== NULL)
		{
			echo"<p class='error-box'>Book ID EMPTY. </p>";
		}
		
		else if(($account != $account_no)&&($access != $access_no)) 
		{	echo"<p class='error-box'>Library ID and Book ID do not match. </p>";
		}
		else
		{
			if($payment=='affidavit of loss')
			{
	    mysql_query("UPDATE cat_copies_t SET status='lost' where access_no='$access_no'");
		require "db.php";
		mysql_query("UPDATE appraisal_t SET return_date='$return_date', return_time='$return_time', a_remark='$payment' WHERE account_no='$account_no' and access_no='$access_no' and return_time='0'");
	
	echo"<p class='success-box'><b>SUCCESS<br>
	Your account is settle.<br>You can now transact again.<br>
	<a id='contactForm' style='color:red' href='a_lost.php?account_no=$account_no&&access_no=$access_no'> <input type='submit' value='OK' name='submit2' id='submit'  /></a>
									 </p>";
	
			}
			else{
				if($final < $time1)
			{$amount5=0;						
	echo"<p class='success-box'><b>Your Account Penalty!<br>
	Title:&nbsp;&nbsp;&nbsp;$title
	<br>Time Allotment:&nbsp;&nbsp;&nbsp;$time3 $unit(s)
	<br>Remaining time:
	$day1</font> Day(s) 
	$hourrs1</font> Hour(s)
	$minuter1 </font>Minute(s),
	$seconder1 </font>Second(s)
	<br>Penalty Amount:&nbsp;&nbsp;&nbsp;Php $fine2
	<br><br>Returned by: 
	Library ID:&nbsp;&nbsp;&nbsp;$_no
	<br>Name:&nbsp;&nbsp;&nbsp; $name1 $name2 $name3
	<br><br>	";					
	;?>
		<a style="color:red" id="contactForm" title="press to pay" href='paid_lost.php?access_no=<?php echo"$access_no";?>&&account_no=<?php echo"$account_no";?>&&amount=<?php echo"$amount5"; ?>&&fine=<?php echo"$fine3	";?>'><br><input type="submit" value="PAID" name="submit2" id="submit" required /></a>
		<?php 
									echo"<a id='contactForm' style='color:red' href='cancel.php?account_no=$account_no&&access_no=$access_no&&amount=$amount2'> <input type='submit' value='CANCEL' name='submit2' id='submit'  /> </a>
									</p>";
							
							
														
	}
	else
	{				
	$total=$fine3+$amount3;
	$total1=number_format($total, 2, '.', ',');
			echo"<p class='error-box'><b>Your account has overdue and penalty. </b><br>
			Title:&nbsp;&nbsp;&nbsp; $title<br>Time Allotment:&nbsp;&nbsp;&nbsp; $time3 $unit(s)
			<br>Time Overdue: $day Day(s),$hourrs Hour(s),$minuter Minute(s),$seconder Second(s)
			<br>Unit Cost: $unit_cost:&nbsp;&nbsp;&nbsp;Php $amount<br>Penalty Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php $amount2
			<br>Fine Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php $fine2
			<br>Total: Php $total1
			<br><br>Returned by:
			<br>Library ID:&nbsp;&nbsp;&nbsp;$_no
			<br>Name:&nbsp;&nbsp;&nbsp; $name1 $name2 $name3";
?>									
		<a style="color:#FFFFFF" id="contactForm" title="press to pay" href='paid_lost.php?access_no=<?php echo"$access_no";?>&&account_no=<?php echo"$account_no";?>&&amount=<?php echo"$amount3"; ?>&&fine=<?php echo"$fine3";?>'><br> <input type='submit' value='PAID' name='submit2' id='submit'  /></a>
		<?php 
		echo"<a id='contactForm' style='color:#FFFFFF' href='cancel_lost.php?account_no=$account_no&&access_no=$access_no&&amount=$amount1&&fine=$fine'>
		 <input type='submit' value='CANCEL' name='submit2' id='submit'  /> </a>
									</p>";
									
														}			
		}			}
		 }
		 ?>
     									<form id="contactForm" action="book_lost.php" method="post">
										<fieldset>
											<div>
												<label>Book ID</label>
													<input name="access_no"   id="name" type="text" class="form-poshytip" title="Enter your book ID" />
											</div>
											<div>
												<label>Library ID</label>
												<input name="account_no"   id="email" type="text" class="form-poshytip" title="Enter your Library ID" />
											</div>
                                           <div>
                                            <select name="payment" id="payment" style="font-size:larger; height:auto; width:auto"  class="form-poshytip" title="Enter Your Section">
       										 <option >-type of payment-</option>
        										<option >cash</option><option >affidavit of loss</option>
											</select>
                                           </div>
                                            
											<p><input type="submit" value="REPORT" name="submit" id="submit" /></p>
										</fieldset>
										</form>
                                
										<!-- ENDS form -->
							</div>
							<!-- ENDS column -->
					<br />
								</div> <!-- /widget-content -->
					
			            </div> <!-- /widget -->					
			
	                 </div> <!-- /span12 -->     	
      	
      	
     
						<!-- column (right)-->
					<div class="one-fourth last">
								<!-- content --><!-- sidebar -->
						<ul id="sidebar">
							<!-- init sidebar -->
							<li>
										
								<ul>
									<li class="cat-item"><a  href="book_borrow.php" title="Click to Borrow book" >Borrow Books</a></li>
									<li class="cat-item"><a href="book_return.php" title="Click to Return book">Return Books</a></li>
									<li class="cat-item"><a href="book_lost.php" title="Click to Report Book Lost" style="background:#f1f1f1">Report Book Lost</a></li>
									<li class="cat-item"><a  class="submit" onClick="window.open('bago.php?','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center');"title="Click to add book" >Add Books</a></li>
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


<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->