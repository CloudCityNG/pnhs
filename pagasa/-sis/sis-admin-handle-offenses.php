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
			    <li class="active"> <a href="sis-admin-handle-offenses.php" > <i class="shortcut-icon icon-plus-sign"></i> <span class="shortcut-label">Add</span> </a> </li>
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
          <h3>Offenses and its Categroies</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">

         <br>
		 <table width="100%">
		 <tr>
  <td>       
 <h3> &nbsp;Add Offenses in list </h3>
 <div style="background-color:#DAFEC5; border-radius:20px; margin: 10px 20px 20px 50px; box-shadow:0 0 30px #000000; height:200px; width:350px;">
 <?php
 include('../db/db.php');
 $queryoff = mysql_query("SELECT * FROM discipline_category_t");
 //$findoff = mysql_fetch_assoc($queryoff);
 
 ?>

 <form action="sis-admin-handle-offenses.php" method="post">
 <br>
 <table align="center">
 <tr align="center">
 <td>Offense Name: </td>
 <td><input name="offense_name" type="text" required></td>
 </tr>
 <tr align="center">
 <td>Offense Category: </td>
 <td><select name="category" required>
 <?php
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
 <td align="right"><input name="offense" type="submit" value="Add" class="btn btn-success"></td>
 </tr>
 </table>
 </form>
  <?php
if(isset($_POST['offense'])){
	$o_name = $_POST['offense_name'];
	$o_category = $_POST['category'];
	$count = 0;
	$querycheck = mysql_query("SELECT * FROM discipline_offense_t");
	while($findcheck = mysql_fetch_assoc($querycheck)){
		if($findcheck['offense_description'] == $o_name){
			$count = $count+1;
		}
	}
		if($count>0){
		 ?><script>alert('This type of offense already exists!');
                                      </script><?php
		}
		else{
			mysql_query("INSERT INTO discipline_offense_t(offense_description, offense_cat) VALUES ('$o_name','$o_category')");
			?> <script>alert('New type of offense successfully added!');
											  window.close();
                                      </script> <?php
		
		
	}
	}
 ?> 
 </div>
 </td>
 <td>
 <br>
 <h3> &nbsp;Add Offense Category in list </h3>

  <div style="background-color:#DAFEC5; border-radius:20px; margin: 10px 20px 20px 50px; box-shadow:0 0 30px #000000; height:200px; width:350px;">

 <?php
 include('../db/db.php');
 
 ?>
 <form action="sis-admin-handle-offenses.php" method="post">
 <br>
 <table align="center">
 <tr align="center">
 <td>Category Name: </td>
 <td><input name="cat_name" type="text" required></td>
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
 <td align="right"><input name="cat" type="submit" value="Add" class="btn btn-success"></td>
 </tr>
 </table>
 </form>
  <?php
if(isset($_POST['cat'])){
	$c_name = $_POST['cat_name'];
	$count2 = 0;
	$querycheck2 = mysql_query("SELECT * FROM discipline_category_t");
	while($findcheck2 = mysql_fetch_assoc($querycheck2)){
		if($findcheck2['cat_name'] == $c_name){
			$count2 = $count2+1;
		}
	}
		if($count2 > 0){
		 ?> <script>alert('This category type already exists!');
                                      </script> <?php
		}
		else{
			mysql_query("INSERT INTO discipline_category_t VALUES ('','$c_name')");
			?> <script>alert('New category type successfully added!');
											  window.close();
                                      </script> <?php
		
		
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
