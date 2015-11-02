<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/sched_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <?php
  @session_start();
  include "../db/db.php";
  include "../actions/user_privileges.php";
  
  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $scheduling_admin = is_privileged($_SESSION['account_no'], 6);
  $scheduling_officer = is_privileged($_SESSION['account_no'], 14);
  
  if(!$developer && !$super_admin && !$scheduling_admin && !$scheduling_officer){
      header("Location: restrict.php");  
  }
  
  ?>
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
    <link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	
  
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
				Pagasa National Highschool <sup>1.0.3</sup>
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
                <?php if($developer || $scheduling_officer || $scheduling_admin){ ?>
                <li> <a href="schedules.php"> <i class="icon-calendar"></i> <span>Schedules</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
	   	        <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="subjects.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Subjects</span> </a> </li>
		        <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="room.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_officer || $scheduling_admin || $super_admin){ ?>
                <li> <a href="reports_section.php" > <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> </li>
    			<?php } ?>
				<?php if($developer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
                    <ul class="dropdown-menu">
                        <li><a href="curriculums.php">Curriculums</a></li>
                        <li><a href="year_levels.php">Year levels</a></li>
                    </ul> 				
                </li>
                <?php } ?>
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
      <div class="widget stacked widget-table action-table <?php echo isset($_GET['curriculum_code'])? "hide":""; ?>">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-ambulance"></i> Curriculums</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
            <div >
                <div class="widget stacked widget-table action-table">
                <div class="widget-header"> <i class="icon-pencil"></i>
                  <h3>Table</h3>
                </div>
                <div class="widget-content">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Curriculum</th>
                        <th>Name</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					  include "../db/db.php";
					  
					  $query = mysql_query("SELECT * FROM curriculum_t");
					  while($row = mysql_fetch_assoc($query)){ ?>
                      <tr>
                        <td><?php echo $row['curriculum_code'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <th><a href="?curriculum_code=<?php echo $row['curriculum_code'];?>" class="btn btn-mini">VIEW</a></th>
                      </tr>
					<?php  } ?>
                    </tbody>
                  </table>
                </div>
                </div>
                <p><a   class="btn" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');"><i class="icon-plus"></i>Add New Student</a></p>

            </div>
                </th>
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" href="curriculums.php"><i class=" icon-th"></i>  Curriculum Info</a>
                  <a class="btn btn-block" href="curriculums.php"><i class="icon-plus"></i>   Year Levels</a>
                  <a   class="btn btn-block" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');"> Help</a>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /widget-content -->
      </div>
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
           <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Level Name</th>
                        <th>Total Units</th>
                        <th>Status</th>
                        <th>Subjects</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody >

                 <?php 				     
				    include_once "../db/db.php";
					$get_curriculum_code = $_GET['curriculum_code'];
					$query = mysql_query("SELECT * FROM year_level_t WHERE curriculum_code='$get_curriculum_code'");
					
				    while($row = mysql_fetch_assoc($query)){
					$lvl_id=$row['lvl_id'];  ?>
                    
                    <tr class="del<?php echo $lvl_id; ?>">
                      <td><?php echo $row['year_lvl']; ?></td>
                      <td><?php echo $row['lvl_name'];?></td>
                      <td><?php echo $row['total_unit'];?></td>
                      <td>
					  <?php $status = $row['yl_status'];
					      if($status)
						      echo "<a class='btn btn-mini btn-info btn-block' href='actions/activate_year_level.php?lvl_id=$lvl_id&active=$status' >Deactivate</a>";
					    else
							 echo "<a class='btn btn-mini btn-block' href='actions/activate_year_level.php?lvl_id=$lvl_id&active=$status' >Ativate</a>";
				      ?>
                      </td>
                      <td align="center"><a href="sched_lvl-subj_view.php?lvl_id=<?php echo $lvl_id;?>" class="btn btn-mini" > View Subjects</a></td>
                      <td align="center">      
                          <script type="text/javascript">
                             jQuery(document).ready(function() {
                             	$('#p<?php echo $code; ?>').popover('show')
                                $('#p<?php echo $code; ?>').popover('hide')
                             });
                          </script>
                                
                        <a class="btn btn-mini" href='year_level_edit.php?lvl_id=<?php echo $lvl_id;?>&curriculum_code=<?php echo $get_curriculum_code;?>'> Edit</a> 
						<a class="btn btn-mini" href="JavaScript:if(confirm('Are you sure you want to delete this subject?')==true)
							{window.location='actions/delete_year_level.php?id=<?php echo $lvl_id;?>';}"> Delete</a>
                      </td>                            
                    </tr>
                    
                <?php }?>
                
                </tbody>
		    </table>
            
          </div>
                <a href="year_level_add.php?curriculum_code=<?php echo $get_curriculum_code;?>" class="btn">ADD YEAR LEVEL</a>
                </th>
                <th style="background-color:#F0F0F0">
                  <h3><?php echo $get_curriculum_code;?></h3>
                  <?php include "actions/curriculum_functions.php";?>
                  <p><?php echo get_curr_name($get_curriculum_code);?> </p>
                  <p>No. of Subjects: <?php echo get_total_subjects($get_curriculum_code);?></p>
                  <p>Total Units: <?php echo get_total_subjects($get_curriculum_code);?></p>
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
<!-- InstanceEnd --></html>