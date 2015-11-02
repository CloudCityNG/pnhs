<!DOCTYPE html>
<?php 
 @session_start();

require_once "../db/db.php";
 
if(isset($_GET['curriculum_code'])){
  $get_curriculum_code = $_GET['curriculum_code'];	
}


if(isset($_POST['submit'])){
	$curr_code = $_POST['curr_code'];
    $lvl = $_POST['level'];
	$lvl_name = $_POST['level_name'];
	$max_unit = $_POST['max_unit'];
	
	if(is_numeric($lvl)){
		if($lvl_name){
			if(is_numeric($max_unit)){
				$check = mysql_query("SELECT * FROM year_level_t WHERE year_lvl = '$lvl'");
				$check2 = mysql_query("SELECT * FROM year_level_t WHERE lvl_name = '$lvl_name'");
				if(mysql_num_rows($check)<1 && mysql_num_rows($check2)<1){
					mysql_query("START TRANSACTION");
					mysql_query("INSERT INTO year_level_t VALUES('','$lvl','$lvl_name','$curr_code','$max_unit', 0)") or die("error inserting year level $lvl - - - $lvl_name  - - $curr_code");
					mysql_query("COMMIT;");
					header("location: curriculums.php?curriculum_code=$code");
			    }
				else
					$errormsg = "There is already an entry for that year level";
			}
			else
			    $errormsg = "Maximum Unit is expected to be an integer.";
		}
		else
		    $errormsg = "Please enter a name for your year level";
	}
	else
	    $errormsg = "Please enter a level for your curriculum.";
	
	
}
else{
	$curr_code = "";
    $lvl = "";
	$lvl_name = "";
	$max_unit = "";
}
	





?>

<html lang="en"><!-- InstanceBegin template="/Templates/sched_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">

  </style>
  <style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
  </style>
<!-- InstanceBeginEditable name="head" -->
  
  <title>Pagasa National Highschool:: Base Admin</title>
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
			
			<a class="brand" href="../home.php">
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
							Dick Dela Vega
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
    <div class="hide">
    <img src="../images/banner.jpg">
    </div>
	<div class="subnavbar-inner" >
	
		<div class="container" >
			
			<a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
				<i class="icon-reorder"></i>
                
                
			</a><!-- InstanceBeginEditable name="navbar" -->
			  <ul class="mainnav">
                <li> <a href="../home.php"> <i class=" icon-home"></i> <span>Home</span> </a> </li>
                <li> <a href="schedules.php"> <i class="icon-calendar"></i> <span>Schedules</span> </a> </li>
			    <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
	   	        <li> <a href="subjects.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Subjects</span> </a> </li>
		        <li> <a href="room.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span> </a> </li>
			    <li> <a href="reports_section.php" > <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> </li>
    			<li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
                    <ul class="dropdown-menu">
                        <li><a href="curriculums.php">Curriculums</a></li>
                        <li><a href="year_levels.php">Year levels</a></li>
                    </ul> 				
                </li>
		      </ul>
		    <!-- InstanceEndEditable -->
            
            
            <!-- /.subnav-collapse -->

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
	
	
	<!-- InstanceBeginEditable name="main" -->
      <!-- /wudget -->
      
      
      <div class="widget stacked widget-table action-table <?php echo isset($_GET['curriculum_code'])? "":"hide"; ?>">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-ambulance"></i> Year Levels</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                  <p><?php echo isset($errormsg)? "$errormsg":"";?></p>
                     <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" style="min-height:300px;">
                        <table class="container" style="width:auto; margin-top:50px">
                          <tr>
                            <td>LEVEL </td>
                            <td><input  type="text" name="level" id="level" value="<?php echo $lvl;?>" placeholder="Level"> </td>
                          </tr>
                          <tr>
                            <td>NAME </td>
                            <td><input  type="text" name="level_name" id="level_name" value="<?php echo $lvl_name;?>" placeholder="Level Name"> </td>
                          </tr>
                          <tr>
                            <td>MAX UNIT </td>
                            <td><input  type="text" name="max_unit" id="max_unit" value="<?php echo $max_unit;?>" placeholder="Maximum Unit"> </td>
                          </tr>
                          <tr>
                            <td>CURRICULUM </td>
                            <td> <div style="color:#06C" align="center"><?php echo $get_curriculum_code?> </td>
                          </tr>
                          <tr>
                            <td><input type="hidden" name="curr_code" id="curr_code" value="<?php echo $get_curriculum_code?>"></td>
                            <td><div align="right"><input class="btn " type="submit" value="SUBMIT" name="submit" id="submit"></div></td>
                          </tr>
                        </table>
                    </form>
                </th>
                <th style="background-color:#F0F0F0">
                  <h3><?php echo $get_curriculum_code;?></h3>
                  <?php include "actions/curriculum_functions.php";?>
                  <p><?php echo get_curr_name($get_curriculum_code);?> </p>
                  <p>No. of Subjects: <?php echo get_total_subjects($get_curriculum_code);?></p>
                  <p>Total Units: <?php echo get_total_units($get_curriculum_code);?></p>
                  <br />
                  <a class="btn btn-block" href="curriculums.php?curriculum_code=<?php echo $get_curriculum_code;?>"> Year Levels</a>
                  <a class="btn btn-block" href="subjects.php?curriculum_code=<?php echo $get_curriculum_code;?>">  Subjects</a>
                  <a class="btn btn-block" href="subject_add.php?curriculum_code=<?php echo $get_curriculum_code; ?>"><i class="icon-plus"></i>   Add Subjects</a>
                  <a href="javascript:;" class="btn btn-block msgbox-alert"> Help</a>
                  <a class="btn btn-inverse btn-block" href="curriculums.php"><i class="icon-plus"></i>   Other Curriculum</a>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
      
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

<!-- InstanceBeginEditable name="extra" -->

<!-- InstanceEndEditable -->


    

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
<!-- InstanceEnd -->

</html>
