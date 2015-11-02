    <!DOCTYPE html>
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
    

<html lang="en">
<head>
  <meta charset="utf-8" />
<title>Pagasa National Highschool:: Base Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  <link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />

  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    <link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>

body {
	line-height: 1;
	color: #51565b;
	background: #f1f1f1 url(img/bg/patterns/noise.png);
}


#page-title{
	overflow: hidden;
	height: 103px;
	margin-bottom: 30px;
	background: url(img/tabs-divider.png) repeat-x bottom center;
	text-shadow: 1px 1px rgba(255, 255, 255, 1);
}

#page-title .title{
	display: block;
	float: left;
	font-family: 'Ubuntu', arial, serif;
	font-size: 40px;
	line-height: 100px;
	margin-left: 30px;
}

#page-title .subtitle{
	display: block;
	float: left;
	margin-left: 30px;
	font-size: 14px;
	margin-top: 4px;
	line-height: 50px;
	color: #929191;
	font-style: italic;	
}

</style>

<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />
<link rel="stylesheet" href="cs2/css/tabs.css" type="text/css" media="screen" />
		
</head>



<body>
  <?php	
	  				error_reporting(0);
		require "db.php";
		  $account_no = $_GET['call_no'];
			$s=mysql_query("SELECT * FROM `student_account_t` WHERE student_id='$account_no'");
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
			$empl=mysql_query("SELECT * FROM `employee_account_t` WHERE emp_id='$account_no'");
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
			
		 ?><br>

	
        <div  class="container">
	      <div class="row">
      	

                     
    <div class="widget stacked" >
					
	<div class="widget-content" >
   <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="500%" style="font-size:17px" >
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
							   else{?>
                                            <?php if($gender == 'Female' || $gender == 'female'){?>      
             								<img src="img/girl.jpg"><?php } 
											else{ ?><img src="img/boy.jpg"> <? }?>
							                 <img src="img/shadow-1-3.png">
											 										<?php }?>
                        </div><!-- / modal -->
                  
                           
                            
                            
                            <th>
                            <div id="page-title">
                           <span class="subtitle"style="font-size:18px; color:#0000FF">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <?php echo" &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$fname $mname $lname";?></span><br>
						   <?php  if($call != 0){echo"<br> <br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						   Section:  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;$level&nbsp;$section1 
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
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>

<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>


<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="validation.js"></script>
<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="../js/demo/notifications.js"></script>

	</body>
</html>
