<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>

<html lang="en"><!-- InstanceBegin template="/Templates/sisadmin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
      <link href="./css/pages/reports.css" rel="stylesheet" />
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

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
						  <i class="icon-user"></i>			<?php
							include('../db/db.php');
							
							$queryid = mysql_query("SELECT * FROM employee_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['emp_id'];
							$queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$id'");
							$getemp = mysql_fetch_assoc($queryemp);
							$fname = $getemp['f_name'];
							$lname = $getemp['l_name'];
							echo $fname.'&nbsp;'.$lname;
							?>
						  <b class="caret"></b>
					  </a>
						
					  <ul class="dropdown-menu">
						 
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
    <div class="hide">
    <img src="../images/banner.jpg">
    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
			</a>

			<div class="subnav-collapse collapse">
			
			<!-- InstanceBeginEditable name="navbar" -->
			  <ul class="mainnav">
			    <li class="active"> <a href="sis-admin-delete-offenses.php" > <i class="shortcut-icon icon-trash"></i> <span class="shortcut-label">Delete</span> </a> </li>
		      </ul>
		    <!-- InstanceEndEditable -->
            
            </div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->

<div id="small-head" class="navbar navbar-inverse hidden">
	
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



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
	
	<!-- InstanceBeginEditable name="content" -->
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Offenses and its Categories</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">

         <br>
   <table width="100%">
<tr>
<td>   
 <h3> &nbsp;Update Offenses from list </h3>
 <div style="background-color:#DAFEC5; border-radius:20px; margin: 10px 20px 20px 50px; box-shadow:0 0 30px #000000; height:200px; width:350px;">
 <?php
 include('../db/db.php');
 $queryoff = mysql_query("SELECT * FROM discipline_offense_t");
 
 ?>

 <form action="sis-admin-delete-offenses.php" method="post">
 <br>
 <table align="center">
 <tr align="center">
 <td>Offense Name: </td>
 <td><select name="offense">
 <?php
 while($findoff = mysql_fetch_assoc($queryoff)){
	 ?>
     <option value="<?php echo $findoff['offense_code'];?>"><?php echo $findoff['offense_description'];?>
	 </option>
     <?php
 }
 ?>
 </select></td>
 </tr>
  <tr>
 <td>Change into:&nbsp;&nbsp;</td>
 <td><input name="change" type="text" required /></td>
 </tr>
 <tr>
 <td>
 Category:&nbsp;&nbsp;
 </td>
 <td><select name="category" required>
 <?php
 include('../db/db.php');
 $queryoff = mysql_query("SELECT * FROM discipline_category_t");
 //$findoff = mysql_fetch_assoc($queryoff);
 
 ?><?php
 while($findoff = mysql_fetch_assoc($queryoff)){
	 ?>
     <option value="<?php echo $findoff['cat_code'];?>"><?php echo $findoff['cat_name'];?></option>
     <?php
 }
 ?>
 </select></td>
 </tr>

 <tr>
 <td></td>
 <td align="right"><input name="offense_submit" type="submit" value="Update" class="btn btn-success"></td>
 </tr>
 </table>
 </form>
  <?php
if(isset($_POST['offense_submit'])){
	$o_name = $_POST['offense'];	
	$cat = $_POST['category'];
	$change = $_POST['change'];
	$count = 0;
	$countcat = 0;
	$querycheck = mysql_query("SELECT * FROM discipline_offense_t");
	while($findcheck = mysql_fetch_assoc($querycheck)){
		if($findcheck['offense_description'] == $o_name){
			$count = $count+1;
		}
	}
	$querycheckcat = mysql_query("SELECT * FROM discipline_category_t");
	while($findcheckcat = mysql_fetch_assoc($querycheckcat)){
		if($findcheckcat['cat_name'] == $change){
			$countcat = $countcat+1;
		}
	}
		if($count > 0){
		?><script>alert("This type of offense already exists!");</script><?php
		}
		else{
			
			mysql_query("UPDATE discipline_offense_t SET offense_description = '$change', offense_cat = '$cat' WHERE offense_code = '$o_name'");
			?><script>alert("This type of offense successfully updated.");
			window.close();</script>
				
				<?php
		
		
	}
	if($countcat > 0){
		?><script>alert("This type of category does not exist!");</script><?php
		}
	}
 ?> 
 </div>
</td>
<td>
 <br>
 <h3> &nbsp;Update Offense Category from list </h3>

  <div style="background-color:#DAFEC5; border-radius:20px; margin: 10px 20px 20px 50px; box-shadow:0 0 30px #000000; height:200px; width:350px;">

 <?php
 include('../db/db.php');
 $querycat = mysql_query("SELECT * FROM discipline_category_t");
 
 ?>
 <form action="sis-admin-delete-offenses.php" method="post">
 <br>
 <table align="center">
 <td>Category Name: </td>

 <td><select name="cat_name">
 <?php 
 while($findcat = mysql_fetch_assoc($querycat)){

	 ?>
     <option value="<?php echo $findcat['cat_code'];?>"><?php echo $findcat['cat_name'];?></option>
	 
	 <?php
 }?>
 </select></td>
 </tr>
  <tr>
 <td>Change into:&nbsp;&nbsp;</td>
 <td><input name="change2" type="text" required /></td>
 </tr>
 <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 </tr>
  <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 </tr>
   <tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 </tr>
 <tr>
 <td></td>
 <td align="right"><input name="cat" type="submit" value="Update" class="btn btn-success"></td>
 </tr>
 </table>
 </form>
  <?php
if(isset($_POST['cat'])){
	$c_name = $_POST['cat_name'];
	$change2 = $_POST['change2'];
	$count2 = 0;
	$querycheck2 = mysql_query("SELECT * FROM discipline_category_t");
	while($findcheck2 = mysql_fetch_assoc($querycheck2)){
		if($findcheck2['cat_name'] == $c_name){
			$count2 = $count2+1;
		}
	}
		if($count2 > 0){
		 ?><script>alert("This type of category does not exist!");</script><?php
		}
		else{
			
			mysql_query("UPDATE discipline_category_t SET cat_name = '$change2' WHERE cat_code = '$c_name'");
			?><script>alert("Type of offense category successfully updated.");
			window.close();</script>
				
				<?php
		
		
	}
	}
 ?> 

  
  </div>
   <br>
</td>
</tr>
</table>
      </div>
      <!-- /span6 -->
      
    <!-- InstanceEndEditable -->
          </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /main --><!-- /extra -->


    
    
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
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/charts/area.js"></script>
<script src="../js/charts/donut.js"></script>
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

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

  </body>
<!-- InstanceEnd --></html>
