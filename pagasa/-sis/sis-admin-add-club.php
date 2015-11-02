<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: restrict.php"); // IMPORTANT!!!!
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
			    <li class="active"> <a href="sis-admin-add-club.php" > <i class="shortcut-icon icon-plus-sign"></i> <span class="shortcut-label">Add</span> </a> </li>
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
          <h3>Add Club</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          
                         <form style="text-align:center" action="sis-admin-add-club.php"  method="post"   enctype="multipart/form-data" id="validation-form">
						<table>
                        <tr>
                        <td>Club name:&nbsp;&nbsp;</td>
                        <td><input name="clubname" /></td>
                        </tr>
                        <tr>
                        <td>Club adviser:&nbsp;&nbsp;</td>
                        <td>
                        <select name="clubadvi">
                        <?php
						
						
						$queryemployee = mysql_query("SELECT * FROM employee_t");
						while($getemployee=mysql_fetch_assoc($queryemployee)){
							$check=0;
							$employee=$getemployee['emp_id'];
							
							$queryrole = mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$employee'");
							//if(mysql_num_rows($queryrole) != 0){
							$getrole=mysql_fetch_assoc($queryrole);
							$role=$getrole['role_id'];
							
							$querypostype=mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role'");
							$getpostype=mysql_fetch_assoc($querypostype);
							$postype=$getpostype['position_type'];
							
							if($postype == 'teaching'){
							
							$queryadviser=mysql_query("SELECT * FROM club_t");
							while($getadviser=mysql_fetch_assoc($queryadviser)){
								$adviser=$getadviser['club_adviser'];
								if($employee == $adviser){
									$check=$check+1;
								}
							}
								if($check == 0){
									$dep=$getemployee['dept_id'];
									$qdep=mysql_query("SELECT * FROM department_t WHERE dept_id = '$dep'"); 
									$gdep=mysql_fetch_assoc($qdep);
									$depname=$gdep['dept_name'];
									echo '<option value="'.$employee.'">'.$getemployee['l_name'].',&nbsp;'.$getemployee['f_name'].'&nbsp;-&nbsp;'.$depname.'</option>';
									
								}
							}
							//}
						}
						?>
                        </select>
                        </td>
                        <tr>
                        <td>Status:&nbsp;&nbsp;</td>
                        <td>
                        <select name="clubstatus">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>
                        <input type="submit" name="addclub" class="btn btn-success" />
                        </td>
                        </tr>
                        </table>

                                </form>
                         
      <?php
	  if(isset($_POST['addclub'])){
		  $clubname=$_POST['clubname'];
		  $clubadviser=$_POST['clubadvi'];
		  $clubstatus=$_POST['clubstatus'];
		  $check2=0;
		  $querydup=mysql_query("SELECT * FROM club_t");
							while($getdup=mysql_fetch_assoc($querydup)){
								$adviser2=$getdup['club_adviser'];
								$name=$getdup['club_name'];
								if($clubadviser != $adviser2)
									if($clubname == $name){
									$check2=$check2+1;
								}
								}
							
								if($check2>0){
									?><script>alert('Club already exists!');</script>'<?php
								}
								else{
									mysql_query("INSERT INTO club_t (club_name, club_adviser, club_status) VALUES ('$clubname','$clubadviser','$clubstatus')");
									?><script>alert('Club successfully added!');
											  window.close();
                                      </script><?php
								}
							
							
	  }
	  
	  ?>
       
       
      </div>
      <!-- /span6 -->
      
  
    
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
