<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
{
header("location: ../restrict.php");
}
?> 
<html lang="en"><!-- InstanceBegin template="/Templates/sisstudent_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    
    <!-- The Scripts -->
	<!-- ----------- -->
	<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">
	
	<link rel="stylesheet" href="../include/css/elements.css">
	
		<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">

	<link rel="stylesheet" href="../include/css/icons.css">
	<script src="../include/js/main.js"></script>
	<!-- JavaScript at the top (will be cached by browser) -->
	

	<script src="../include/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="../include/js/mylibs/number-functions.js"></script>
	<script src="../include/js/libs/jquery-1.7.2.min.js"></script>
		<!-- Do the same with jQuery UI -->
	<script src="../include/js/libs/jquery-ui-1.8.21.min.js"></script>
	<script src="../include/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>

	<!-- VALIDATION ENGINE --> 
	
	<script src="../include/js/validationEngine/jquery.validationEngine.js"></script>
	<script src="../include/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
	<!-- end scripts -->
		<!-- VALIDATION ENGINE CSS-->
	<link rel="stylesheet" href="../include/css/validationEngine.jquery.css">
    
    
      <link href="base/css/pages/reports.css" rel="stylesheet" />
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="base/css/custom.css" rel="stylesheet" />

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
						  <i class="icon-user"></i> 
						  <?php
							include('../db/db.php');
							
							$queryid = mysql_query("SELECT * FROM student_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['student_id'];
							$queryname = mysql_query("SELECT * FROM student_t WHERE student_id = '$id'");
							$getname = mysql_fetch_assoc($queryname);
							$fname = $getname['f_name'];
							$lname = $getname['l_name'];
							echo $fname.'&nbsp;'.$lname;
							?>
						  <b class="caret"></b>
					  </a>
						
					  <ul class="dropdown-menu">
						  <li><a href="student-profile.php">My Profile</a></li>
						  <li><a href="student-club.php">My Groups</a></li>
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
                <li> <a href="..home.php"> <i class="icon-home"></i> <span>Home</span> </a> </li>
			    <li> <a href="student-home.php" > <i class="shortcut-icon icon-heart"></i> <span class="shortcut-label">My Home</span> </a> </li>
                            <?php
							


							$querystudent= mysql_query("SELECT * FROM student_account_t WHERE account_no = '$account_no'");
							$row=mysql_fetch_assoc($querystudent);
						$sid = $row['student_id'];
						$querysec = mysql_query("SELECT * FROM student_registration_t WHERE student_id = '$sid'");
						$getsec = mysql_fetch_assoc($querysec);
						$sec = $getsec['section_id']; ?>
		        <li> <a href="student-previous-grades.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">My Previous Grades</span> </a> </li>
			    <li> <a href="student-club.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">My Clubs</span> </a> </li>
                <li class="active"> <a href="student-offenses.php" > <i class="shortcut-icon icon-medkit"></i> <span class="shortcut-label">My Offenses</span> </a> </li>
		      </ul>
		    <!-- InstanceEndEditable -->
            
            </div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
 
<!-- smaller navbar-->



<!--/smaller navbar-->

<div class="main">



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
	
	<!-- InstanceBeginEditable name="content" -->
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Your Offenses</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
 
 
       <div id="demo">
       <table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
                <thead>
                    <tr>
                        
                        <th>Offense Description</th>
                        <th>Date Filed</th>
                        <th>Remarks</th>
                        
                    </tr>
                </thead>
                <tbody>

                 <?php 

					$querysid = mysql_query("SELECT * FROM student_account_t WHERE account_no = '$account_no'");
					$findsid = mysql_fetch_assoc($querysid);
					$sid = $findsid['student_id'];
					
					$queryoff = mysql_query("SELECT * FROM student_offense_list_t WHERE student_id = '$sid'");
					while($findoff = mysql_fetch_assoc($queryoff)){
					?>
                    <tr class="del<?php echo $sid ?>">
                     <?php $code = $findoff['offense_code']; ?>
		<?php 
        $queryoffname = mysql_query("SELECT * FROM discipline_offense_t WHERE offense_code = '$code'");
		$findoffname = mysql_fetch_assoc($queryoffname);
		$offname = $findoffname['offense_description'];
        ?>
                              
                      <td align="center"><?php echo ucfirst($offname); ?></td>
                      <td align="center"><?php echo $findoff['offense_date']; ?></td>
                      <td align="center"><?php echo ucfirst($findoff['Remarks']); ?></td>
                      
                      
                    </tr>
                    
                <?php }?>
                </tbody>
                
		</table>
 
       
      </div>
      <!-- /span6 -->
      
    <!-- InstanceEndEditable -->
    
      <!-- /span6 -->
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
