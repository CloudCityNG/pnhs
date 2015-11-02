
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
            <li  class="active" ><a href="setting.php" ><i class="shortcut-icon icon-cog"></i><span class="shortcut-label">Setting</span></a></li>
  
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
						<div id="result"></div>
						<!-- title -->
						<div id="page-title">
							<span class="title">Settings</span>
							<span class="subtitle"><br>“To build up a library is to create a life. It's never just a random collection of books.” 
<br>― Carlos María Domínguez, The House of Paper
</span>
						</div>
						<!-- ENDS title -->
							
							
						<!-- page-content -->
						<h6 class="toggle-trigger"><a href="#">Book Limit</a></h6>
						<div class="toggle-container">
						 <div class="block">
						<script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="setting.php" method="post">
						
                        <fieldset><div><label>Number of Books</label>
						<input name="book" style="height:inherit"  id="name" type="text" class="form-poshytip" title="Enter new number of book" />
						</div>
                        <p><input type="submit" value="CHANGE" name="submit1" id="submit" /></p>
						</fieldset>
                        </form>
                        <!-- ENDS form --></div></div>
                         
						 <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
		
		
		$query=mysql_query("SELECT * FROM book_limit_t");
				while ($a = mysql_fetch_array($query))
				{
				$book1=$a[no_books	];
				}	
		if($_POST['submit1']){
		$book = $_POST['book'];
		
		
		if($book==NULL){
		echo"<p class='error-box' >Number of books are empty. </p>";
		}
				
		else if(!is_numeric($book)){
		echo"<p class='error-box'>Field is not numeric.</p>";
		}
		
		else{		
		echo"<p class='warning-box'>Are you sure you want to change number of books from $book1 to $book?";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_book.php?book=$book"?>">Yes </a>
        </p>
        <?php 
        	}	}
        ?>  
						 
						<h6 class="toggle-trigger"><a href="#">Change the Section Cost</a></h6>
						<div class="toggle-container">
						<div class="block">
						<p><script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="setting.php" method="post">
						<fieldset><div style="height:auto"><label>Edit the Section Cost</label>
						<tr>
                        <select style="font-size:larger; height:auto; " id="name" type="text" class="form-poshytip" title="Select section" name="section"required/>
						
						<?php
						 
        				error_reporting(0);
  	    				include_once('db.php');
			   			echo $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec))
					   {
					 echo "<option value='" . $row['section_name'] ."'>" . $row['section_name'] ."</option>";		  }?>
                        
						}                        
                        </select>
                       
                        <select style="font-size:larger; height:auto; "  name="unit" class="form-poshytip"  id="name" style="height:" title="Enter new section" type="text" required/ >
            			<option >-unit-</option>
             			<option >minute</option>
                        <option >hour</option>
                        <option >day</option>
						</select>
						<tr><input name="amount"  id="name" type="text" class="form-poshytip" title="Enter new amount" placeholder='Php 0.00' required/></tr></div>
						
						<p><input type="submit" value="CHANGE" name="submit2" id="submit" required /></p>
						</fieldset>
						</form>
						<!-- ENDS form --></div></div>
                        
          	
          
                         <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
		if($_POST['submit2']){
	
		$section = $_POST['section'];
		$amount = $_POST['amount'];
		$unit = $_POST['unit'];
		$fine1 = str_replace( ',', '', $amount );
		$fine=number_format($fine1, 2, '.', ',');
		$amount3 = str_replace( ',', '', $fine );
		if($section=='-section-'){
		echo"<p class='error-box'>Unrecognized Currency</p>";
		}
		else if($amount==NULL){
		echo"<p class='error-box'>Currency Field Empty</p>";
		}
		else if(($unit=='-unit-')&&($amount!= 0)){
		echo"<p class='error-box'>Unit Field Empty</p>";
		}
		else{
		echo"<p class='warning-box'>Are you sure you want to change unit amount of $section to Php $fine per $unit ?";
		?><br> 
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_cost.php?section=$section&&fine=$amount3&&unit=$unit"?>">Yes </a>
        </p>
        <?php 
        		}}
        ?>
                        
                        <h6 class="toggle-trigger"><a href="#">Change Alloted Time per Book</a></h6>
						<div class="toggle-container">
							    <div class="block">
							<p><script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="setting.php" method="post">
						<fieldset><div style="height:auto"><label>Edit Alloted Time</label>
						<select style="font-size:larger; height:auto; " id="name" type="text" class="form-poshytip" title="Select section" name="section"required/>
						<option>-Select-</option>
						<?php
						 
        				error_reporting(0);
  	    				include_once('db.php');
			   			echo $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec))
					   {
					 echo "<option value='" . $row['section_name'] ."'>" . $row['section_name'] ."</option>";		  }?>
                        
						}                        
                        </select>
                    	
                        <input name="num" type="text" class="form-poshytip" title="Enter time" /></tr></div>
                      <select style="font-size:larger; height:auto; "  name="unit" class="form-poshytip"  id="name" style="height:" title="Enter new section" type="text" required >
                       <option >-unit-</option>
             			<option >minute</option>
                        <option >hour</option>
                        <option >day</option>
						</select>
						
                      
						<p><input type="submit" value="CHANGE" name="submit3" id="submit" /></p>
						</fieldset>
					                        </form><!-- ENDS form --></div></div>
                        
           	 <?php
 		  
        
		if($_POST['submit3']){
		include_once('db.php');
		$section = $_POST['section'];
		$unit = $_POST['unit'];
		$number = $_POST['num'];
		
		if($section=='-Select-'){
		echo"<p class='error-box'>Select First Section</p>";
		}
		else if(($unit=='-unit-')&&($number != 0)){
		echo"<p class='error-box'>Select Unit for your Section</p>";
		}
		else if(($number==NULL)){
		echo"<p class='error-box'>Select Number for the Unit</p>";
		}
		
		else{
	
		if($unit=='-unit-'){
		echo"<p class='warning-box'>Are you sure you want to change the alloted time of $section to $number?
		<br> This will make all $section book not available for borrowing.";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_unit.php?section=$section&&number=$number&&unit=$unit"?>">Yes </a>
        </p>
        <?php }
        else{
			echo"<p class='warning-box'>Are you sure you want to change the alloted time of borrowers for $section into $number $unit(s)?";
		?><br>
		&nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_unit.php?section=$section&&number=$number&&unit=$unit"?>">Yes </a>
        </p>
        <?php 
        	}	}}
        ?>  
	
	
		
                        <h6 class="toggle-trigger"><a href="#">Add Book Section</a></h6>
						<div class="toggle-container">
						<div class="block">
						<script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="#" method="post">
						<fieldset><div><label>Add Book Section</label>
						<input name="section" style="height:inherit"  id="name" type="text" class="form-poshytip" title="Enter new section" />
						</div>
                        <p><input type="submit" value="ADD" name="submit4" id="submit" /></p>
						</fieldset>
                        </form>
                        <!-- ENDS form --></div></div>
                       
                                        <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
			
		if($_POST['submit4']){
		$section = $_POST['section'];
		$search=mysql_query("Select * from cat_section_t where section_name='$section'");
		while($search1= mysql_fetch_array($search)) 
		{$search3=$search1['section_name'];}
		if($section==NULL){
		echo"<p class='error-box'>Section Field Empty </p>";
		}
		else if($section==$search3){
		echo"<p class='error-box'>Section allready exist </p>";
		}
		else{		
		echo"<p class='warning-box'>Are you sure you want to add $section?";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_section.php?section=$section"?>">Yes </a>
        </p>
        <?php 
        	}	}
        ?>  
        
       					 <h6 class="toggle-trigger"><a href="#">Edit Section Name</a></h6>
						<div class="toggle-container">
						<div class="block">
						<script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="setting.php" method="post">
						<fieldset><div><label>Edit Book Section</label>
						 <select style="font-size:larger; height:auto; " id="name" type="text" class="form-poshytip" title="Select section" name="section"required/>
						<option>-Select-</option>
						<?php
						error_reporting(0);
  	    				include_once('db.php');
			   			echo $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec))
					   {
					 	echo "<option value='" . $row['section_name'] ."'>" . $row['section_name'] ."</option>";}?>
                       }                        
                        </select>
                       <input name="new_section"  placeholder="New Section name"  id="name" type="text" class="form-poshytip" title="Enter new section name" />
						</div>
                        <p><input type="submit" value="CHANGE" name="submit6" id="submit" /></p>
						</fieldset>
                        </form>
                        <!-- ENDS form --></div></div>
                       
                                        <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
			
		if($_POST['submit6']){
		$section = $_POST['section'];
		$newsection = $_POST['new_section'];
		
		if($section=='-Select-'){
		echo"<p class='error-box'>Select First Section.</p>";
		}
		else if($newsection==NULL){
		echo"<p class='error-box'>New Section Name Empty.</p>";
		}
		else{		
		echo"<p class='warning-box'>Are you sure you want to change $section name to $newsection?";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_new_section.php?section=$section&&newsection=$newsection"?>">Yes </a>
        </p>
        <?php 
        	}	}
        ?>  
		
                       
                        <h6 class="toggle-trigger"><a href="#">Add New Publisher</a></h6>
						<div class="toggle-container">
						<div class="block">
						<script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="#" method="post">
						<fieldset><div>
                        <label>Publisher Name</label>
						<input name="name" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="Name" title="Enter Pulisher Name" />
						<label>Publisher Address</label>
						<input name="street" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="Street" title="Enter Street" />
						<br><input name="city" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="City" title="Enter City" />
						<br><input name="country" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="Country" title="Enter Country" />
						</div>
                        <p><input type="submit" value="ADD" name="submit5" id="submit" /></p>
						</fieldset>
                        </form>
                        <!-- ENDS form --></div></div>
                       
                            <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
			
		if($_POST['submit5']){
		$name = $_POST['name'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		
		if($name==NULL){
		echo"<p class='error-box'>Name Field Empty </p>";
		}
		else if($city==NULL){
		echo"<p class='error-box'>City Field Empty </p>";
		}
		else if($country==NULL){
		echo"<p class='error-box'>Country Field Empty </p>";
		}
		else{		
		echo"<p class='warning-box'>Are you sure you want to add new publisher $name from $street, $city $country?";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_publisher.php?name=$name&&street=$street&&city=$city&&country=$country"?>">Yes </a>
        </p>
        <?php 
        	}	}
        ?>  
        
        
        
                        <h6 class="toggle-trigger"><a href="#">Edit Publisher Information</a></h6>
						<div class="toggle-container">
						<div class="block">
						<script type="text/javascript" src="js/form-validation.js"></script>
						<form id="contactForm" action="#" method="post">
						<fieldset><div>
                        <label>Publisher Name</label>
						<select style="font-size:larger; height:auto; " id="name" type="text" class="form-poshytip" title="Select section" name="section"required/>
						<option>-Select-</option>
						<?php
						error_reporting(0);
  	    				include_once('db.php');
			   			echo $sec=mysql_query("SELECT pub_name FROM cat_publisher_t");
			   			while($row=mysql_fetch_array($sec))
					   {
					 	echo "<option value='" . $row['pub_name'] ."'>" . $row['pub_name'] ."</option>";}?>
                       }                        
                        </select>
                        <input name="name1" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="New Name" title="Enter Street" />
						<label>Publisher Address</label>
						<input name="street1" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="New Street" title="Enter Street" />
						<br><input name="city1" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="New City" title="Enter City" />
						<br><input name="country1" style="height:inherit"  id="name" type="text" class="form-poshytip" placeholder="New Country" title="Enter Country" />
						</div>
                        <p><input type="submit" value="CHANGE" name="submit7" id="submit" /></p>
						</fieldset>
                        </form>
                        <!-- ENDS form --></div></div>
                       
                            <?php
 		  //!is_numeric
        error_reporting(0);
  	     include_once('db.php');
		if($_POST['submit7']){
		$section = $_POST['section'];
		$name = $_POST['name1'];
		$street = $_POST['street1'];
		$city = $_POST['city1'];
		$country = $_POST['country1'];
		$sec=mysql_query("SELECT * FROM cat_publisher_t where pub_name='$section'");
		while($row=mysql_fetch_array($sec))
			{
			$id=$row['publisher_id'];
			$name1=$row['pub_name'];
			$street1=$row['street'];
			$city1=$row['city'];
			$country1=$row['country'];
		}	
			if($section=='-Select-'){
		echo"<p class='error-box'>Name Field Empty </p>";
		}			
		else if($name==NULL){
		echo"<p class='error-box'>Select First Publisher Name</p>";
		}
		else if($city==NULL){
		echo"<p class='error-box'>City Field Empty </p>";
		}
		else if($country==NULL){
		echo"<p class='error-box'>Country Field Empty </p>";
		}
		else{		
		echo"<p class='warning-box'>Are you sure you want change $name1 $street1, $city1, $country1 to <font color='blue'>$name $street, $city $country?</font>";
		?><br>
        &nbsp;&nbsp;<a id="contactForm" href="setting.php">No</a> or
        <a id="contactForm" href="<?php echo"save_publisher1.php?name=$name&&street=$street&&city=$city&&country=$country&&id=$id"?>">Yes </a>
        </p>
        <?php 
        	}	}
        ?>  
                        </div></div>
						</div>
			
                        <!-- ENDS page-content -->
		
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

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script><script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->