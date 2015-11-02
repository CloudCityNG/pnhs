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
            <li ><a href="book_borrow.php" ><i class="shortcut-icon icon-book"></i><span class="shortcut-label">Reading Material</span></a></li>
        <?php } ?>
        <?php if($developer || $super_admin || $librarian){?>
            <li class="active"><a href="report.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Report</span></a></li>
        <?php } ?>
        <?php if(!$developer && !$super_admin && !$librarian){?>
            <li class="active"><a href="account.php" ><i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Account</span></a></li>
        <?php } ?>
              <li><a href="status.php"><i class="shortcut-icon icon-pencil"></i><span class="shortcut-label">Status</font></span></a></li>
   
  <?php if($developer || $super_admin || $librarian){?>
  <li><a href="notification.php" ><i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Notification&nbsp;<?php if($count >= 1){ echo"<font color='#00FF00'> ($count)";} else{}?></font></span></a></li>
            <li ><a href="setting.php" ><i class="shortcut-icon icon-cog"></i><span class="shortcut-label">Setting</span></a></li>
  
    <?php } ?>	 <!-- InstanceEndEditable -->
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
  	<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					
					<!-- content -->
					<div id="content">
						
		
						<!-- page-content -->
          <div id="result"></div>
						<div id="page-content">                 
<?php	
					$account_no=$_SESSION['account_no'];
	  				error_reporting(0);
		
		require "db.php";
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
			$gender=$employee1['gender'];
			
			$emp_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$emp_id'");
			$found_pic=mysql_fetch_assoc($emp_pic);
			$img=$found_pic['pic_name'];							
				}
		
		 ?><br>

	  <div class="widget-content">

   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="font-size:17px" >
	<thead>
		<tr align="center" height="10px">
			                <th width="150px"> 
							<?php 
				 						
							if($img!=NULL){
							if($emp_id != NULL){ ?>
						<a href="../eis/include/dpic/<?php echo $img; ?>" class="ui-lightbox">
									<img src="../eis/include/dpic/<?php echo $img;?>"  width="150" height="100" >
                                	
							
							<?php }else{?>
 							
								<a href="../-registration/large/<?php echo $img; ?>" class="ui-lightbox">
									<img src="../-registration/include/dpic/<?php echo $img;?>" >
                         		<a href="../-registration/include/dpic/<?php echo $img; ?>-large" class="preview"></a>
					

                                         	     
						       <?php }
							   }

                  
?>                           
                            
                            
                            <th>
                            <div id="page-title">
                           <span class="subtitle"style="font-size:18px; color:#0000FF">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <?php echo" &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fname $mname $lname";?></span><br>
						   <?php  if($call != 0){echo"<br> <br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   Section:  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$section1 
							<br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Address:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$street,&nbsp;$barangay,&nbsp;$city ";}
							else{
							echo"<br><br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Position:";
							echo" <br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$add";
							}	
                           ?>
                           </div>
                          
                            <span class="title"></span>
		    </th>
                           </span>
          
            
              </tr>
              
                            	
	</table>
    
   	<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-user"></i>
      				<h3><?php echo"$fname's";?> Account 
                         </h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
					<div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="<?php if($_POST['submit1']){echo"active";}else{}?>">
					    <a href="#profile" data-toggle="tab">Logs</a>
					  </li>
					  <li class="<?php if($_POST['submit2']){echo"active";}else{}?>">
                      <a href="#settings" data-toggle="tab">Book Transactions</a></li>
					 <li class="<?php if($_POST['submit3']){echo"active";}else{}?>">
                     <a href="#UB" data-toggle="tab">Unreturned Book</a></li>
					 <li class="<?php if($_POST['submit4']){echo"active";}else{}?>">
                     <a href="#fines" data-toggle="tab">Fines</a></li>
					 <li class="<?php if($_POST['submit5']){echo"active";}else{}?>">
                     <a href="#penalties" data-toggle="tab">Penalties</a></li>
					 <li class="<?php if($_POST['submit6']){echo"active";}else{}?>">
                     <a href="#credits" data-toggle="tab">Credits</a></li>
					</ul>
					<br />
					
			<div class="tab-content">
			            
				<div class="tab-content">
							<div class="tab-pane <?php if($_POST['submit1']){echo"active";}else{}?>" id="profile">
                            <form action="" method="post">
						  <input type="date" name="from1" style="height:auto" >
			                <input type="date" name="to1" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit1"  />
            	            </form>
                                           
   
			<table class="table table-bordered table-striped" align="center" >
			<thead align="center">
             <tr align="center">
		                <th align="center"><div align='center'>Start Time</div></th>
                        <th align="center"><div align='center'>Log out Time</div></th>
                         <th align="center"><div align='center'>Date</div></th>
             </tr>              	
			</thead>
             <tbody align="center">
			<?php
	  		error_reporting(0);
			require "db.php";
			if($_POST['submit1']){
			$from1=$_POST['from1'];
			$to1=$_POST['to1'];
			$action="Book Records";
			if($from1 > $to1 ){
				echo"<p class='error-box'>Date Range Error.</p>";}
			else{	
				$log=mysql_query("SELECT * FROM `library_logs` WHERE account_no='$id1' AND log_date >= '$from1' AND log_date <= '$to1'");
				while($b=mysql_fetch_array($log))
				{	
				$temp=$b['log_in_time'];
				$temp1=$b['log_out_time'];
				$log_otime=date('h:i a', strtotime($temp1));
				$start_time=date('h:i a', strtotime($temp));
				$date1=$b['log_date'];
				$date=date('M. d, Y', strtotime($date1));
		
				echo"<tr align='center'>
				<td><div align='center'>$start_time</div></td>";
				  if($temp1 != 0){
                  echo"<td><div align='center'>$log_otime</div></td>";}
				  else{
				   echo"<td> <div align='center'>Currently on the Library</div></td>";}
             echo"  <td><div align='center'>$date</div></td></tr>";
			}}}
			else{
    		$log=mysql_query("SELECT * FROM `library_logs` WHERE account_no='$id1'");
			while($b=mysql_fetch_array($log))
			{	
			$temp=$b['log_in_time'];
			$temp1=$b['log_out_time'];
			$log_otime=date('h:i a', strtotime($temp1));
			$start_time=date('h:i a', strtotime($temp));
			$date1=$b['log_date'];
			$date=date('M. d, Y', strtotime($date1));
		
			echo"<tr align='center'>
			<td><div align='center'>$start_time</div></td>";
				  if($temp1 != 0){
                  echo"<td><div align='center'>$log_otime</div></td>";}
				  else{
				   echo"<td> <div align='center'>Currently on the Library</div></td>";
				   }
             echo"  <td><div align='center'>$date</div></td></tr>";
			}}?>
    		</tbody>
            </table>
           <p align="right"><a  class="btn btn-mini" href="print_acoount.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to1"; ?>&&from=<?php echo"$from1"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>
		    </div>
							
			<div class="tab-pane <?php if($_POST['submit2']){echo"active";}else{}?>" id="settings">
            
                            <form action="" method="post">
						  <input type="date" name="from2" style="height:auto" >
			                <input type="date" name="to2" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit2" id="submit" />
            	            </form>
			<table class="table table-bordered table-striped" >
			<thead align="center">
             <tr>
		     <th><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th><div align='center'>Retured Time & date</div></th>
             <th><div align='center'>Person In Charge</div></th>
             </tr>              	
			</thead>
             <tbody>
			<?php
	  		error_reporting(0);
			require "db.php";
    		
			if($_POST['submit2']){
			$from2=$_POST['from2'];
			$to2=$_POST['to2'];
			$action="Book Records";
			if($from2 > $to2 ){
				echo"<p class='error-box'>Date Range Error.</p>";}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_date >= '$from2' AND return_date <= '$to2'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$access_no=$a['access_no'];
			$btime1=date('h:i a', strtotime($btime));
			$rtime1=date('h:i a', strtotime($rtime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
		?><tr>
        <?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"<td><div align='center'>$bdate1 $btime1</div</td>";
			if($rtime == 0 ){echo"<td><div align='center'>Not Yet Returned</div</td>";}
			else{echo"<td><div align='center'>$rdate1 $rtime1</div</td>";}
			echo"<td><div align='center'>$fname $mname $lname</div></td>";
              ?> </tr> 
			 <?php }}}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$access_no=$a['access_no'];
			$btime1=date('h:i a', strtotime($btime));
			$rtime1=date('h:i a', strtotime($rtime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			?>
            <tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>";
			if($rtime == 0 ){echo"<td><div align='center'>Not Yet Returned</div</td>";}
			else{echo"<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>";}
			echo"<td><div align='center'>$fname $mname $lname</div></td>";
             ?>
             </tr>
             <?php }}?>
            </tbody>
            </table>
            <p align="right"><a  class="btn btn-mini" href="print_account1.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to2"; ?>&&from=<?php echo"$from2"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>
		    </div>
			
		
        
           <div class="tab-pane  <?php if($_POST['submit3']){echo"active";}else{}?>" id="UB">
			            
                            <form action="" method="post">
						  <input type="date" name="from3" style="height:auto" >
			                <input type="date" name="to3" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit3" id="submit" />
            	            </form>
			<table class="table table-bordered table-striped" >
			<thead align="center">
             <tr>
		     <th><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th><div align='center'>Person In Charge</div></th>
             </tr>              	
			</thead>
             <tbody>
			<?php
	  		error_reporting(0);
			require "db.php";
    		
			if($_POST['submit3']){
			$from3=$_POST['from3'];
			$to3=$_POST['to3'];
			$action="Book Records";
			if($from3 > $to3 ){
			echo"<p class='error-box'>Date Range Error.</p>";}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND borrow_date >= '$from3' AND borrow_date <= '$to3' AND return_time ='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl=mysql_query("SELECT * FROM `cat_copies_t` WHERE call_no='$title'");
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			
			?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>	  
			<td><div align='center'>$fname $mname $lname</div></td>";
              }}}	
				
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_time ='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$access_no=$a['access_no'];
			$btime1=date('h:i a', strtotime($btime));
			$rtime1=date('h:i a', strtotime($rtime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			
			?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>	  
			<td><div align='center'>$fname $mname $lname</div></td>";
              }}?>
            </tbody>
            </table>
            <p align="right"><a  class="btn btn-mini" 
            href="print_account2.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to3"; ?>&&from=<?php echo"$from3"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>
			</div>
			
            
            <div class="tab-pane <?php if($_POST['submit4']){echo"active";}else{}?>" id="fines">
			                  <form action="" method="post">
						  <input type="date" name="from4" style="height:auto" >
			                <input type="date" name="to4" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit4" id="submit" />
            	            </form>
			<table class="table table-bordered table-striped" >
			<thead align="center">
             <tr>
		     <th><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th align="center"><div align='center'>Returned Time & date</div></th>
             <th align="center"><div align='center'>Fine Amount</div></th>
             <th><div align='center'>Person In Charge</div></th>
             <th><div align='center'>Remark</div></th>
             </tr>              	
			</thead>
             <tbody>
			<?php
	  		error_reporting(0);
			require "db.php";
    		
			if($_POST['submit4']){
			$from4=$_POST['from4'];
			$to4=$_POST['to4'];
			$action="Book Records";
			if($from > $to ){
			echo"<p class='error-box'>Date Range Error.</p>";}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_date >= '$from4' AND return_date <= '$to4' AND fine !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['fine'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE account_no='$id1' AND return_date >= '$from4' AND return_date <= '$to4' AND fine != '0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			
?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>	  
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	
			<td><div align='center'>$remark1</div></td></tr>  
			";
              }}
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }	
				
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND fine !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['fine'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE account_no='$id1' AND fine !='0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>	  
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	  
			<td><div align='center'> $remark1 </div</td>	  
			</tr>";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }?>
            </tbody>
            </table>
            <p align="right"><a  class="btn btn-mini" href="print_account3.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to4"; ?>&&from=<?php echo"$from4"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>

            </div>
			
            
            
            
            <div class="tab-pane <?php if($_POST['submit5']){echo"active";}else{}?>" id="penalties">
			             <form action="" method="post">
						  <input type="date" name="from5" style="height:auto" >
			                <input type="date" name="to5" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit5" id="submit" />
            	            </form>
			<table class="table table-bordered table-striped" >
			<thead align="center">
             <tr>
		     <th><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th align="center"><div align='center'>Returned Time & date</div></th>
             <th align="center"><div align='center'>Penalty Amount</div></th>
             <th><div align='center'>Person In Charge</div></th>
             <th><div align='center'>Remark</div></th>
             </tr>              	
			</thead>
             <tbody>
			<?php
	  		error_reporting(0);
			require "db.php";
    		
			if($_POST['submit5']){
			$from5=$_POST['from5'];
			$to5=$_POST['to5'];
			$action="Book Records";
			if($from > $to ){
			echo"<p class='error-box'>Date Range Error.</p>";}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_date >= '$from5' AND return_date <= '$to5' AND penalties !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['penalties'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sum FROM `appraisal_t`WHERE return_date >= '$from5' AND return_date <= '$to5' AND penalties != '0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			
?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>	  
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	
			<td><div align='center'>$remark1</div></td></tr>  
			";
              }}
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }	
				
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND penalties !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];

			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['penalties'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sum FROM `appraisal_t`WHERE account_no='$id1' AND penalties !='0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>	  
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	  
			<td><div align='center'> $remark1 </div</td>	  
			</tr>";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }?>
            </tbody>
            </table>
            <p align="right"><a  class="btn btn-mini" href="print_account4.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to5"; ?>&&from=<?php echo"$from5"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>
			</div>
		 	
            
            <div class="tab-pane <?php if($_POST['submit6']){echo"active";}else{}?>" id="credits">
				             <form action="" method="post">
						  <input type="date" name="from6" style="height:auto" >
			                <input type="date" name="to6" style="height:auto"><br>
                            <input class="btn btn-mini" type="submit" value="SUBMIT" name="submit6" id="submit" />
            	            </form>
			<table class="table table-bordered table-striped" >
			<thead align="center">
             <tr>
		     <th><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th align="center"><div align='center'>Returned Time & date</div></th>
             <th align="center"><div align='center'>Fine Amount</div></th>
             <th align="center"><div align='center'>Penalty Amount</div></th>
             <th><div align='center'>Person In Charge</div></th>
             </tr>              	
			 </thead>
             <tbody>
			<?php
	  		error_reporting(0);
			require "db.php";
    		
			if($_POST['submit6']){
			$from6=$_POST['from6'];
			$to6=$_POST['to6'];
			$action="Book Records";
			if($from > $to ){
			echo"<p class='error-box'>Date Range Error.</p>";}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_date >= '$from6' AND return_date <= '$to6' AND a_remark='credit'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$penalties=$a['penalties'];
			$fine=$a['fine'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$penaltiess=number_format($penalties, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sumf FROM `appraisal_t`WHERE return_date >= '$from6' AND return_date <= '$to6' AND penalties != '0' AND a_remark='credit'"));
			$s=mysql_fetch_array(mysql_query("SELECT sum(fine) as sump FROM `appraisal_t`WHERE return_date >= '$from6' AND return_date <= '$to6' AND fine != '0'  AND a_remark='credit'"));
			$sump=$s['sump'];
			$sumf=$sum['sumf'];
			$totalf=number_format($sump, 2, '.', ',');
			$totalp=number_format($sumf, 2, '.', ',');
			
?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>";
			if($fines == 0){echo"<td><div align='center'> -------------- </div></td>";}
			else{echo"<td><div align='center'>Php. $fines</div</td>";}	  
			if($penalties == 0){echo"<td><div align='center'> -------------- </div></td>";}
			else{echo"<td><div align='center'>Php. $penalties</div</td>";}	
             echo"
			<td><div align='center'>$fname $mname $lname </div</td>	  
			</tr>";
            
              }}
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $totalf </div></td>
			  <td><div align='center'> Php. $totalp </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }	
				
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND a_remark='credit'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];

			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$penalties=$a['penalties'];
			$fine=$a['fine'];
			$fines=number_format($fine, 2, '.', ',');
			$penaltiess=number_format($penalties, 2, '.', ',');
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sump FROM `appraisal_t`WHERE account_no='$id1'  AND a_remark='credit'"));
			$sump=$sum['sump'];
			$totalp=number_format($sump, 2, '.', ',');
			$sumf=mysql_fetch_array(mysql_query("SELECT sum(fine) as sumf FROM `appraisal_t`WHERE account_no='$id1' AND a_remark='credit'"));
			$sumf1=$sumf['sumf'];
			$totalf=number_format($sumf1, 2, '.', ',');
			?><tr>
		<?php if($book1 == NULL){ ?>
			<td><div align='center'>  <a   class="submit" onClick="window.open('periodicalinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }else{?>
            <td><div align='center'>  <a   class="submit" onClick="window.open('bookinfo.php?call_no=<?php 
							echo "$title";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo $title2; ?> </a></div></td>
			<?php }?>
			<?php echo"
			<td><div align='center'>$bdate1&nbsp;&nbsp;&nbsp;&nbsp;$btime1</div</td>
			<td><div align='center'>$rdate1&nbsp;&nbsp;&nbsp;&nbsp;$rtime1</div</td>";
			if($fines == 0){echo"<td><div align='center'> -------------- </div></td>";}
			else{echo"<td><div align='center'>Php. $fines</div</td>";}	  
			if($penalties == 0){echo"<td><div align='center'> -------------- </div></td>";}
			else{echo"<td><div align='center'>Php. $penaltiess</div</td>";}	
             echo"
			<td><div align='center'>$fname $mname $lname </div</td>	  
			</tr>";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $totalf </div></td>
			  <td><div align='center'> Php. $totalp </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }?>
            </tbody>
            </table>
            <p align="right"><a  class="btn btn-mini" href="print_account5.php?id=<?php echo"$id1"; ?>&&name=<?php echo"$fname $mname $lname";?>&&to=<?php echo"$to6"; ?>&&from=<?php echo"$from6"; ?>"
 			type="submit" style="background: #CCCCCC;"> 
        	<img src="img/mono-icons/printer32.png" width="15" height="5">&nbsp;Print&nbsp;&nbsp;&nbsp;	</a>&nbsp;</p>
			</div>
			
			 </div>
			</div> <!-- /widget -->
      		
	    </div> <!-- /span8 -->
      	</div>	</div>	</div>	</div>
 <br><br><br>
</div></div></div>
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