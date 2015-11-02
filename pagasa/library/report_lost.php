<!DOCTYPE html>

<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else
	header("location: restrict.php"); // IMPORTANT!!!!
?>

<html><!-- InstanceBegin template="/Templates/circulation.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>PNHS SYSTEM</title>
    <!-- InstanceEndEditable -->
    <script type='text/javascript' src='../js/menu.js'></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
        
      
      <style type='text/css'>
        body {
        padding-bottom: 40px;
        padding-top: 60px;
    }
    
    .sidebar-nav-fixed {
        position:absolute;
        left:20px;
        top:80px;
        width:200px;
        padding-top: 9px;
        padding-right: 0;
        padding-bottom: 9px;
        padding-left: 0;
    }
    
    .row-fluid > .span-fixed-sidebar {
        margin-left: 250px;
    }
      </style>
     
    <link rel="stylesheet" href="../css/calendarview.css">
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
            cursor: pointer;
          }
        .style1 {color: #F0F0F0}
        </style>
        
    <script src="../js/prototype.js"></script>
    <script src="../js/calendarview.js"></script>
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
    <!-- InstanceBeginEditable name="head" -->
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    
    <style type="text/css">
<!--
.style2 {font-size: 12px}
.style3 {font-size: 10px}
.style4 {color: #FFFFFF}
.style5 {
	color: #0000FF;
	font-size: 16px;
}
.style6 {
	color: #FF0000;
	font-weight: bold;
	font-size: 16px;
}
.style7 {color: #006600}
.style8 {
	color: #003333;
	font-size: 36px;
}
.style9 {font-weight: bold}
.style10 {font-weight: bold}
-->
    </style><!-- InstanceEndEditable -->
</head>
<body>
  <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">

      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>      </a>
      <a class="brand" href="../home.php">PAG-ASA NATIONAL HIGH SCHOOL</a>
      <div class="nav-collapse">
        <ul class="nav">

          <li class="active"><a href="../home.php"><img src="../icons/house.png" width="16" height="16"> Home</a></li>
          <li><a href="#about"><img src="../icons/envelope.png" width="16" height="16"> Messages</a></li>
          <li><a href="#about"><img src="../icons/note.png" width="16" height="16"> Notes</a></li>
          <li><a href="ams/ams_home.php"><img src="../icons/user.png" width="16" height="16"> Account</a></li>
        </ul>

        <p class="navbar-text pull-right"><a href="../logoutprocess.php">Log out <img src="../icons/cancel.png"> </a></p>
      </div><!--/.nav-collapse -->

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row-fluid row">
    <div class="span3">
      <div class="well sidebar-nav-fixed">
        <ul class="nav nav-list">			
          <p class="navbar-text pull-right"><img src="../icons/user_business_boss.png"> Logged in as <a href="#"> <?php echo ucfirst($username) ?> </a> </p>
        </ul>
			
<div id='cssmenu'>
<ul> 
   <?php 
   $user_type = $_SESSION['user_type']; 
   if(isset($_SESSION['teaching'])){
       if($_SESSION['teaching']==1)
	       $teacher = "teacher";   
   }
   else
       $teacher = "";
   ?>
   <?php include "actions/user_priviledges.php";?>
   
   
   <?php      if(grant_access(1, $user_type)){    ?>
       <li><a href='registration/reg_home.php'><span>Registration</span></a></li>
   <?php }    if(grant_access(2, $user_type, $teacher)){    ?>
       <li class='active has-sub'><a href='grading/grading_home.php'><span>Grading</span></a></li>
   <?php }    if(grant_access(3, $user_type)){    ?>
       <li class='active has-sub'><a href='scheduling/sched_home.php'><span>Scheduling</span></a></li>
   <?php }    if(grant_access(4, $user_type)){    ?>
       <li class='active has-sub'><a href='sis/SIS-Home.php'><span>Student Information System</span></a></li>
   <?php }    if(grant_access(5, $user_type)){    ?>
       <li class='active has-sub'><a href='eis/index.php'><span>Employee Information System</span></a></li>
   <?php }    if(grant_access(6, $user_type)){    ?>
   <li class='active has-sub'><a href=""><span>Library</span></a>
       <ul>
           <li class='has-sub'><a href='circulation/HOME.php'><span>Circulation</span></a></li>
           <li class='has-sub'><a href='cataloging/cataloging_index.php'><span>Cataloging</span></a></li>
       </ul>  
   </li>
   <?php }    if(grant_access(7, $user_type)){    ?>
   <li class='active has-sub last'><a href='inventory_home.php'><span>Inventory</span></a>
       <ul>
           <li class='has-sub'><a href='supplies/supply_home.php'><span>Supplies</span></a></li>
           <li class='has-sub'><a href='equipment/equipment1.php'><span>Equipment</span></a></li>
       </ul>  
   </li>
    <?php }   								      ?>


</ul>
</div>


<div style="clear:both; margin: 0 0 30px 0;"></div>
          
          <div id="embeddedExample" style="">
          <div id="embeddedCalendar" style="margin-left: auto; margin-right: auto"></div>
          <br />
          <div id="embeddedDateField" class="dateField">
            Select Date          
            </div>
          <br />
        </div>
      </div>
      <!--/.well -->
    </div><!--/span-->
	
    <div align="center">
      <table width="1000" border="0">
        <tr>
          <td width="1000">
            <div align="center" class="style10">
           <ul id="MenuBar1" class="MenuBarHorizontal">
                <li><a  href="HOME.php"><img src="../icons/house.png" width="14" height="26"> HOME</a>
                <li><a  href="logs.php"><img src="icons/1.jpg" width="21" height="21">LIBRARY LOGS</a>
                <li><a href="borrowing.php"><img src="../icons/book.png" width="16" height="16"> BORROW BOOKS </a>                
                <li><a href="return.php"><img src="../icons/arrow_redo.png" width="21" height="21"> RETURN </a>
                <ul>
                <li><a href="report_lost.php"><img src="../icons/book.png" width="16" height="16">REPORT BOOK LOST </a> 
                </ul>             
                <li><a  href="status.php"><img src="../icons/pencil.png" width="16" height="16">STATUS</a>  
                <li><a class="MenuBarItemSubmenu"><img src="../icons/text_signature.png" width="16" height="16"> RECORDS</a>
                <ul>
	            <li><a href="records_logs.php"><img src="icons/1.jpg" width="14" height="26"> LOGS</a>
                <li><a  href="records_book.php"><img src="../icons/book.png" width="16" height="16">BOOK TRANSACTION</a>
                <li><a  href="records_u_books.php"><img src="../icons/arrow_redo.png" width="16" height="16">UNRETURNED BOOK</a>
                <li><a href="records_fines.php"><img src="../icons/money.png" width="16" height="16"> FINES </a>                
                <li><a href="records_penalties.php"><img src="../icons/zone_money.png"> PENALTIES </a>               
                <li><a href="person.php"><img src="../icons/user.png" width="16" height="16"> PERSON</a>
                </ul>
                <li><a ><img src="../icons/chart_bar.png" width="16" height="16">STATISTIC</a>
                <ul>
                <li><a href="most_book.php"><img src="../icons/book.png" width="16" height="16"> BOOK </a>                
                <li><a href="most_user.php"><img src="../icons/user.png"> USER </a>               
                <li><a href="most_log.php"><img src="icons/1.jpg" width="16" height="16"> LOG</a>
                </ul>
                </li>
    
              </ul>

          </div></td>
        </tr>
      </table>
    
            <form method="post" class="form-inline">
     <table align="right" height="10">
    <tr align="right"> <td> <a><img="b.png" ><input name="title" type="text" title="Enter book title" placeholder="Book title" />Search &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a></td></tr>
 
      </table>
    </form>        
  <script type="text/javascript">
    <!--
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
 //-->
</script>  
<p>&nbsp;</p>
</div>  

    
	<!-- InstanceBeginEditable name="Content" -->
        <div class="span9 span-fixed-sidebar">
      <div class="hero-unit">
            
    <form action="report_lost.php" method="post">
		<table width='400px'><td>
		<div class='alert alert-success'>
		<br><a href='HOME.php'>
		<img src='icons/cross.png' width='15' height='20' align='right'  ><br> </a>	
		<img src='icons/error.png' width='25' height='25'>&nbsp;&nbsp;&nbsp;&nbsp;
         <input name="access_no" type="text" align="texttop" title="Enter book ID" placeholder="BOOK ID"/><BR>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input name="account_no" type="text"title="Enter library ID" placeholder="LIBARY ID " />
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   		<select name="payment" id="payment" style="margin-left:10px; margin-right:10px; width:200px; ">
        <option >-type of payment-</option>
        <option >cash</option><option >affidavit of lost</option>
		</select>
    	<BR>
 	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   	<input class="btn btn-primary" name="submit" type="submit" value="REPORT" />   
       	<BR><BR></div></td>			
		</form>
        <?php
		 
        error_reporting(0);
  
		if($_POST['submit']){
		require "../db/db.php";
		$account_no = $_POST['account_no'];
		$access_no = $_POST['access_no'];
		$payment= $_POST['payment'];
		$return_date =date('y-m-d');
		$return_time = gmdate('h:i:s',time()+28800);
		mysql_query("start transaction");
		mysql_query("Auto-Commit='off'");
		$query1 = mysql_query("SELECT * FROM appraisal_t WHERE return_time='0' and access_no='$access_no' and account_no='$account_no'");  
		while($q=mysql_fetch_array($query1)){
		$account = $q[account_no]; 
		$access = $q[access_no];
		$rm = mysql_fetch_array(mysql_query("SELECT * FROM cat_copies_t WHERE access_no='$access_no	'"));  
		$rm_id=$rm['rm_id'];
		$s = mysql_fetch_array(mysql_query("SELECT * FROM cat_reading_material_t WHERE rm_id='$rm_id'"));
		$section=$s[section_id];
		$title=$s[title];
		$sec = mysql_fetch_array(mysql_query("SELECT * FROM cat_section_t WHERE section_no='$section'"));
		$time1=$sec['time'];
		$unit=$sec['section_unit'];
		$unit_cost=$sec['unit_cost'];
		$amount=$sec['fine_amount'];
		$s2 = mysql_fetch_array(mysql_query("SELECT *, COUNT(account_no) as count FROM account_t "));
		$max_account=$s2[count];
		$s3 = mysql_fetch_array(mysql_query("SELECT *, COUNT(access_no) as count FROM cat_copies_t "));
		$copy = mysql_fetch_array(mysql_query("SELECT * FROM cat_supplies_t WHERE rm_id='$rm_id'"));
		
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
		$query=mysql_fetch_array(mysql_query("select count(account_no) from student_t where account_no='$account_no'"));
		$r=$query[0];
				
				
		if($r==1)
		{
											$query2=mysql_query("select * from student_t where account_no='$account_no'");
											while($q3=mysql_fetch_array($query2))
											{
											$name1= $q3[f_name] ;
											$name2=$q3[m_name];
											$name3=$q3[l_name] ;
											}
		}
		else
	  	{
						  				$q=mysql_query("select * from employee_t where account_no='$account_no'");
										while($q1=mysql_fetch_array($q))
		{
											$name1= $q1[f_name] ;
											$name2=$q1[m_name];
											$name3=$q1[l_name] ;
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
							$unit2=360;
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
		if(($access_no==NULL)&&($account_no == NULL)&&($payment=='-type of payment-'))
		{
							echo "<table width='400px'><td>";
							echo "<div class='alert alert-error'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/error.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ERROR</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>EMPTY. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
				
									
		}
		else if(($payment=='-type of payment-'))
		{
							echo "<table width='400px'><td>";
							echo "<div class='alert alert-error'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/error.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ERROR</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>Select first type of payment. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
				
									
		}
		else if($account_no== NULL)
		{
							echo "<table width='400px'><td>";
							echo "<div class='alert alert-error'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/error.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ERROR</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>Library ID EMPTY. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
				
					
									
		}
		
		else if($access_no== NULL)
		{
							echo "<table width='400px'><td>";
							echo "<div class='alert alert-error'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/error.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ERROR</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>BOOK ID EMPTY. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
				
					
									
		}
		
		else if(($account != $account_no)&&($access != $access_no)) 
		{
							echo "<table width='500px'><td>";
							echo "<div class='alert alert-error'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/error.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ERROR</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>Library ID and book ID do not match. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
				
		}
		
		
		else
		{
		if($payment=='affidavit of lost')
	{
	
		mysql_query("UPDATE appraisal_t SET a_remark='AFFIDAVIT OF lOST',return_date='$return_date', return_time='$return_time' WHERE account_no='$account_no' and access_no='$access_no'");
		
	mysql_query("UPDATE cat_copies_t SET status='lost' where access_no='$access_no'");
	
							echo "<table width='500px'><td>";
							echo "<div class='alert alert-success'>";
							echo"<a href='report_lost.php'>
							<img src='icons/cross.png' width='20' height='30' align='right' ><br> </a>";	
							echo "<img src='icons/accept.png' width='40' height='50'>";
							echo"<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUCCESS</b><br>";
							echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;
							
							<font color=black>Your account is settle.<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;You can transact again. </b></font>";
							
							echo "</div></td>";			
							echo "</table>";
							
	}
	else{
	if($final < $time1)
	{
									$amount5=0;						
									echo "<table width='600px'><td>";
									echo "<div class='alert alert-error'>";
									echo "<h3 style=color:blue> <img src='icons/exclamation.png' width='50' height='50'>
									&nbsp;&nbsp;&nbsp;Your Account Penalty!</h3>
									<h4 style=color:black>Title:&nbsp;&nbsp;&nbsp;$title
									<br>Time allotment:&nbsp;&nbsp;&nbsp;$time3 $unit(s)
									<br>Reamaining time:
									<font color='blue'>$day1</font> Day(s) 
									<font color='blue'>$hourrs1</font> Hour(s)
									<font color='blue'>$minuter1 </font>minute(s),
									<font color='blue'>$seconder1 </font>second(s)
									<h4 style=color:black>Fine Amount:&nbsp;&nbsp;&nbsp;Php $fine2
									
									<br><br><h4 style=color:blue>Returned by</h4>
									<h4 style=color:black>Library ID:&nbsp;&nbsp;&nbsp;$account_no
									<br>Name:&nbsp;&nbsp;&nbsp; $name1 $name2 $name3
									<br><br>";
									?>
									<a class="btn btn-info" title="press to pay" href='paid_lost.php?access_no=<?php echo"$access_no";?>&&account_no=<?php echo"$account_no";?>&&amount=<?php echo"$amount5"; ?>&&fine=<?php echo"$fine	";?>'>&nbsp;PAID</a> 						
									<?php 
									echo"<a class='btn btn-primary' href='cancel_lost.php?account_no=$account_no&&access_no=$access_no&&amount=$amount5&&fine=$fine'> CANCEL </a>
									<br><br>";
									
									echo "</div></td>";			
									echo "</table>";
									
	}
	else
	{				
	$total=$fine+$amount2;
	$total1=number_format($total, 2, '.', ',');
	
									echo "<table width='600px'><td>";
									echo "<div class='alert alert-error'>";
									echo "<h3 style=color:blue> You Account has overdue and penalty</h3>
									<h4 style=color:black>Title:&nbsp;&nbsp;&nbsp; $title
									<br>Time allotment:&nbsp;&nbsp;&nbsp;$time3 $unit(s)
									<br>Overdue time:
									<font color='blue'>$day</font> Day(s) 
									<font color='blue'>$hourrs</font> Hour(s)
									<font color='blue'>$minuter </font>minute(s),
									<font color='blue'>$seconder </font>second(s)
									<h4 style=color:black>Unit Cost/$unit:&nbsp;&nbsp;&nbsp;Php $amount
									<h4 style=color:black>Penalty Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php $amount2
									<h4 style=color:black>Fine Amount:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Php $fine2
									<h4 style=color:black>total:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=blue>Php $total1</font>
									<br><br><h4 style=color:blue>Returned by</h4>
									<h4 style=color:black>Library ID:&nbsp;&nbsp;&nbsp;$account_no
									<br>Name:&nbsp;&nbsp;&nbsp; $name1 $name2 $name3
									<br><br>";
									?>
									<a class="btn btn-info" title="press to pay" href='paid_lost.php?access_no=<?php echo"$access_no";?>&&account_no=<?php echo"$account_no";?>&&amount=<?php echo"$amount1"; ?>&&fine=<?php echo"$fine";?>'>&nbsp;PAID</a> 						
									<?php 
									echo"<a class='btn btn-primary' href='cancel_lost.php?account_no=$account_no&&access_no=$access_no&&amount=$amount1&&fine=$fine'> CANCEL </a>
									<br><br>";
									mysql_query("Commit");
									echo "</div></td>";			
									echo "</table>";
														}			
		}			}
		 }
		 ?>
         </table>
      <!--/span-->
      </div><!--/row-->


 
    </div>
    <!--/span-->
    <!-- InstanceEndEditable -->
    
    </div><!--/row-->

  <hr>

  <span class="style1">
  <footer>  </footer>
  </span>
  <footer><p class="style1">&copy; BU 2013 </p>
  </footer>
</div>
<!--/.fluid-container-->
  


<script type='text/javascript'>//<![CDATA[ 

(function($) {
    var showDims = $("#showDims"),
        wnd = $(window);
    
    showSize();
    wnd.resize(showSize);
    
    function showSize() {
        showDims.html(
            wnd.width() +
            "x" +
            wnd.height()
        );
    }
})(jQuery);


//]]>  

</script>
</body>


<!-- InstanceEnd --></html>

