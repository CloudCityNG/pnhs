<!DOCTYPE html>

<?php
include "../db/db.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location: ../restrict.php");
}
?> 
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
$registrar= is_privileged($_SESSION['account_no'], 13);
$reg_admin= is_privileged($_SESSION['account_no'], 5);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$reg_admin)
{
	header("Location: ../restrict.php");
	}

 ?>


<?php 
require ('../db/db.php');
$num=1;
$next_yr= date('Y')+$num;
$current_yr=date('Y');

?>
<?php 
require "../db/db.php";
						
						if(isset($_POST['delete'])){
							$name1=$_POST['name1'];
							for($i=0; $i<sizeof($name1); $i++){
								$query_delete=mysql_query("DELETE FROM scholarship_t WHERE scholarship_id={$name1[$i]}");
								echo "{$name1[$i]}";
									}
								header ("Location: ../-registration/reg_scholarship.php");
						}
								 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/reg_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>



  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
   	<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

    
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
<link href="js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <title>Pagasa National Highschool:: Base Admin</title>
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
	
</div> <!-- /navbar --><!-- InstanceBeginEditable name="nav" -->
<div class="subnavbar">
  <div class="hide"> <img src="../images/banner.jpg"> </div>
  <div class="subnavbar-inner" >
    <div class="container" > <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse"> <i class="icon-reorder"></i> </a>
      <ul class="mainnav">
        <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
        <?php if($developer || $registrar){?>
        <li> <a href="reg_listofenrolledstudents.php"> <i class="icon-calendar"></i> <span>Enrollment</span></a></li>
        <?php } ?>
        <?php if($developer || $registrar){?> 
        <li> <a href="reg_classify.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Classification</span></a></li>
        <?php } ?>
        <?php if($developer || $reg_admin || $super_admin){?> 		
        <li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-file"></i> <span>
							Reports
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                        <li><a href="../-registration/reg_section.php">Masterlist</a></li>
                         <li><a href="../-registration/reg_list_of_alumni.php">List of Alumni</a></li>

                            <li class="dropdown-submenu">
			                  <a tabindex="-1" href="#">Statistical Report</a>
			                  <ul class="dropdown-menu">
			                    <li><a tabindex="-1" href="../-registration/reg_no_of_student_schyr.php">Students Enroll in a School Year</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_student_municipalities.php">Students in a Municipality</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_scholars.php">Scholars</a></li>

			                  </ul>
			            	</li>
                            
						<li class="divider"></li>
						<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li> 
       <?php } ?>   
        <?php if($developer || $reg_admin){?> 
    
						<li class="dropdown active">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i> <span>
							Settings
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                            <li><a data-toggle="modal" href="#open_schoolyr">School Year</a></li>
							<li><a href="../-registration/reg_scholarship.php">Scholarship</a></li>
							<li><a href="../-registration/reg_municipality.php">Municipalities</a></li>

							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
        <?php } ?>
      </ul>
      <!-- /.subnav-collapse -->
    </div>
<!-- InstanceEndEditable --><!-- /subnavbar -->
    
    
 
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

<!--/smaller navbar--><!-- InstanceBeginEditable name="content" --><div class="main">



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
	<div class="widget stacked">
        <!-- /widget-header -->
        <div class="widget-content">
       <form action="reg_sship_delete.php" name="scholarship_delete" method="post">

           <table class="table table-striped table-bordered"> 
            <thead>
              <tr>
                <th width="80%"><i class="icon-list"></i> SCHOLARSHIPS</th>              
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
            <br />
            <br />
           <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example2" width="100%">
              <thead>
                <tr>
               	 	<th></th>
                  	<th>Scholarship</th>
                  	<th>Grantor</th>
                  	<th>Financial Grant</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php 
					include('../db/db.php');
					$query_scholarship=mysql_query("SELECT * FROM scholarship_t WHERE scholarship_name<>'NONE'");
					
					while ($row_scholarship=mysql_fetch_assoc($query_scholarship)){ 
							$id=$row_scholarship['scholarship_id'];
							$name=$row_scholarship['scholarship_name'];
							$grantor=$row_scholarship['grantor'];
							$f_grant=$row_scholarship['financial grant'];?>
                            
					    <tr class="del<?php echo $id ?>">
                        	<td align="center"><input type="checkbox" name="name1[]" value="<?php echo $id; ?>"> </td>
                            <td><?php echo ucfirst("$name"); ?></td>
                            <td><?php echo ucfirst("$grantor"); ?></td>
                  			<td align="center"><?php echo ucfirst("$f_grant") ?></td>

                            
                        </tr>

					
				<?php	} ?>
 					</tbody>
            </table>
            <br />
            <br />

					<p align="center"><input type="submit" name="delete" value="DELETE SCHOLARSHIP" class="btn btn-success btn-large" onClick="return confirm('Are you sure you want to delete this?')"></p>
            </div>
                </tr>
            </tbody>
          </table>
    </form>

         
     

	
			</div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
      <!-- /span6 -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- InstanceEndEditable --><!-- /main --><!-- /extra -->

<div class="modal fade hide" id="open_schoolyr">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>SCHOOL YEAR  <?php 
						echo $current_yr;
						echo "-";
						echo $next_yr; ?> </h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="open_school_year" id="validation-form" action="reg_home.php" method="post">
                              <fieldset>
						 <table class="table" width="816" >
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">NO. OF DAYS</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="days" id="days" />
						      </div>
						    </div> </td>
                            </tr>
                           
                      
                          
                             </table>                       
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="Open" value="OPEN" >

                              </fieldset>
                            </form>

  </div>
 </div>

    
    
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

<div class="modal fade hide" id="addSection">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <form>
      <input type="text">
  
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <a href="javascript:;" class="btn btn-primary">Save changes</a>
  </div>
    </form>
</div>
           

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
		    "bJQueryUI": true
				});
	} );
</script>

  </body>
 <?php 
 error_reporting(0);
 foreach($year_level_tabs as $lvl){ ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tab<?php echo $lvl;?>').dataTable({
		    "bJQueryUI": true,
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": true,
			'iDisplayLength': 5,		});
	} );
</script>
<?php } ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example1').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 5,		});
	} );
</script>

<!-- InstanceEnd -->

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example2').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 10,		});
	} );
</script>

<script src="./js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="./js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="./js/plugins/msgbox/jquery.msgbox.min.js"></script>


<script src="./js/demo/notifications.js"></script>
</html>
