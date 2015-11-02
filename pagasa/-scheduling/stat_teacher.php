<!DOCTYPE html>
<?php 
 @session_start();
 
include "actions/class_functions.php";
include "actions/sched_functions.php";
include "actions/subject_functions.php";


if(!isset($_GET['sy_id'])){
	$school_yr = get_active_sy();
}
else{
	
	$school_yr = $_GET['sy_id'];
}

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
  	<link href="./js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="./js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="./js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

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
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="teachers.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teachers</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_officer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown active" > <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> 
                    <ul class="dropdown-menu">
                        <li><a href="reports_section.php">Schedules</a></li>
                        <li><a href="report_list_subject.php">List of Subjects</a></li>
                        <li><a href="report_list_section.php">List of Sections</a></li>
                    </ul> 
                </li>
    			<?php } ?>
				<?php if($developer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
                    <ul class="dropdown-menu">
                        <li><a href="curriculums.php">Curriculums</a></li>
                        <li><a href="year_levels.php">Year levels</a></li>
                        <li><a href="category.php">Subject Categories</a></li>
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
    <div class="span4" >
      <div class="widget stacked widget-table action-table">
        <div class="widget-header">
             <a class="btn btn-mini" href="reports_teacher.php" style="margin-bottom:-6px;"><i class="btn-icon-only icon-chevron-left"></i> back</a> 
             <i class="icon icon-user"></i> 
             <h3>
                Teacher Information
             </h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <form name="settings" action="<?php echo $_SERVER['REQUEST_URI']?>" method="GET">
          <table style="width:100%" class="table table-bordered table-striped">
            <?php 
			  $emp_id = $_GET['emp_id'];
			  require_once "../db/db.php";
			  $query_emp = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
			  $row_emp = mysql_fetch_assoc($query_emp);
			  
			  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'");
			  $row_sy = mysql_fetch_assoc($query_sy);
			  
			  $query_load = mysql_query("SELECT * FROM teacher_t WHERE emp_id='{$emp_id}'");
			  $row_load = mysql_fetch_assoc($query_load);

			?>
            
            <tr >
              <td>Name: </td>
			  <td> <?php echo $row_emp['l_name'].", ".$row_emp['f_name'];?> <br /></td>
            </tr>
            <tr >
              <td>ID number: </td>
			  <td><?php echo $row_emp['emp_id'];?> <br /></td>
            </tr>
            <tr >
              <td>Max Load: </td>
			  <td><?php echo $row_load['max_load'];?> <br /></td>
            </tr>
            <tr >
              <td>No. of Classes: </td>
			  <td><?php echo classes_teacher($emp_id, $school_yr);?> <br /></td>
            </tr>
            <tr >
              <td>School Year: </td>
              <td> <?php //echo $row_sy['sy_start']." - ".$row_sy['sy_end'];?>
                  <select name="sy_id" id="sy_id" style="width:auto;">
                  <?php
                      $query = mysql_query("SELECT * FROM school_year_t ") or die(mysql_error());
					  while($row = mysql_fetch_assoc($query)){ ?>
						  <option  <?php echo ($row['sy_id']==$school_yr)? "selected":"";?> value="<?php echo $row['sy_id'];?>"><?php echo $row['sy_start']." - ".$row['sy_end'];?></option>
                      <?php    
					  }
				  ?>
                  </select>
              </td>
            </tr>
            <tr>
              <td  colspan="2">
              <input type="hidden" name="emp_id" value="<?php echo $_GET['emp_id'];?>" >
              <input type="submit" class="btn btn-mini pull-right span1" value="VIEW"   />
              </td>
            </tr>
          </table>
          </form>
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
    
    </div>
    
    
    <div class="span8">
    
          <section id="accordions">
                        
             <div class="accordion" id="basic-accordion">
	            <div class="accordion-group">
					<div class="accordion-heading">
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseOne"><i class="shortcut-icon icon-bookmark"></i>&nbsp;&nbsp;CLASSES PER SUBJECT CATEGORY </a>
				    </div>
				    
                    <div id="collapseOne" class="accordion-body collapse"  style="background-color:white" >
				    	<div class="accordion-inner">
				        	<div class="span4" style="width:50%">
                              <div class="widget widget-table action-table">
                                
                                <!-- /widget-header -->
                                <div class="widget-content" >
                                  
                                  <div id="cat-chart" class="chart-holder"></div>
                                </div>
                                <!-- /widget-content -->
                              </div>
                              <!--</widget>-->
                            </div>
                            <div class="span4" style="width:40%">
                              <div class="widget stacked widget-table action-table">
                                
                                <!-- /widget-header -->
                                <div class="widget-content" >
                                  <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Category Name</th>
                                            <th>#</th>
                                            <th>%</th>
                                          </tr>
                                        </thead>
                                  		<?php
										$sy_id =$school_yr;
										$query_cat=mysql_query("SELECT * FROM subject_category_t");
										$total=classes_teacher($emp_id, $school_yr);
										
										$query_cat=mysql_query("SELECT * FROM subject_category_t");
											while($row_cat=mysql_fetch_assoc($query_cat)){
													$cat=$row_cat['category_id'];
													$cat_name = $row_cat['category_name'];
													$count_cat=0;
													$query_class=mysql_query("SELECT * from class_t WHERE teacher_id={$_GET['emp_id']} AND sy_id={$sy_id} AND subject_code IN (SELECT subject_code FROM subject_t WHERE category_id={$cat}) ");
													$row_class=mysql_fetch_assoc($query_class);
													$count_cat=mysql_num_rows($query_class);
													?>

													<tr>
													  <td><?php echo $cat_name;?></td>
													  <td><center><?php echo $count_cat;?></center></td>
                                                      <td><center><?php  printf("%g %%", ($total==0)? 0:($count_cat/$total)*100);?></center></td>
													</tr>
                                                    	
													<?php		
											}
										?>
                                        <tfoot>
                                            <tr>
                                              <td></td>
                                              <td><center><?php echo $total;?></center></td>
                                              <td><center><?php echo ($total==0)? "0 %":"100 %";?></center></td>
                                            </tr>
                                        </tfoot>
                                  </table>
                                </div>
                                <!-- /widget-content -->
                              </div>
                              <!--</widget>-->
                            </div>
				        </div>
				    </div>
				</div> 

            
            
            
	            <div class="accordion-group">
					<div class="accordion-heading">
				    	<a class="accordion-toggle" data-toggle="collapse" data-parent="#basic-accordion" href="#collapseTwo"><i class="shortcut-icon icon-signal"></i>&nbsp;&nbsp;CLASSES PER YEAR LEVEL </a>
				    </div>
				    
                    <div id="collapseTwo" class="accordion-body collapse" style="background-color:white;">
				    	<div class="accordion-inner">
    
                            <div class="span4" style="width:50%">
                              <div class="widget stacked widget-table action-table">
                                
                                <!-- /widget-header -->
                                <div class="widget-content" >
                                  
                                  <div id="lvl-chart" class="chart-holder"></div>
                                </div>
                                <!-- /widget-content -->
                              </div>
                              <!--</widget>-->
                            </div>
                            
                            <div class="span4" style="width:40%">
                              <div class="widget stacked widget-table action-table">
                                
                                <!-- /widget-header -->
                                <div class="widget-content" >
                                  <table class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Year Level</th>
                                            <th>#</th>
                                            <th>%</th>
                                          </tr>
                                        </thead>
                                  		
                                        <?php
										$sy_id = $school_yr;
										$query_lvl=mysql_query("SELECT * FROM year_level_t");
										$total=classes_teacher($emp_id, $school_yr);
										$query_lvl=mysql_query("SELECT * FROM year_level_t");
											while($row_lvl=mysql_fetch_assoc($query_lvl)){
													$lvl=$row_lvl['lvl_id'];
													$lvl_name = $row_lvl['lvl_name'];
													$count_cat=0;
													$query_class=mysql_query("SELECT * from class_t WHERE teacher_id={$_GET['emp_id']} AND sy_id={$sy_id} AND subject_code IN (SELECT subject_code FROM subject_t WHERE year_level={$lvl}) ");
													$row_class=mysql_fetch_assoc($query_class);
													$count_lvl=mysql_num_rows($query_class);
													?>
													<tr>
													  <td><?php echo ucfirst($lvl_name);?></td>
													  <td><center><?php echo $count_lvl;?></center></td>
                                                      <td><center><?php  printf("%g %%", ($total==0)? 0:($count_cat/$total)*100);?></center></td>
													</tr>
													<?php 
											}
										?>
                                        <tfoot>
                                            <tr>
                                              <td></td>
                                              <td><center><?php echo $total;?></center></td>
                                              <td><center><?php echo ($total==0)? "0 %":"100 %";?></center></td>
                                            </tr>
                                        </tfoot>
                                  </table>
                                </div>
                                <!-- /widget-content -->
                              </div>
                              <!--</widget>-->
                            </div>
				        </div>
				    </div>
				</div> 
            </div>
          </section>
    </div>    
    
    
    
    
    
    

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


<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>



<script type="text/javascript">
$(function () {
	
		var data = [];
		var i=0;
		<?php
		$sy_id = $school_yr;
		$query_cat=mysql_query("SELECT * FROM subject_category_t");
			while($row_cat=mysql_fetch_assoc($query_cat)){
					$cat=$row_cat['category_id'];
					$cat_name = $row_cat['category_name'];
					$count_cat=0;
					$query_class=mysql_query("SELECT * from class_t WHERE teacher_id={$_GET['emp_id']} AND sy_id={$sy_id} AND subject_code IN (SELECT subject_code FROM subject_t WHERE category_id={$cat}) ");
						$row_class=mysql_fetch_assoc($query_class);
							$count_cat=mysql_num_rows($query_class);
						?>
						<?php
						if($count_cat>=1){
						?>
						data[i] = { label: "<?php echo $cat_name;?>", data: <?php echo $count_cat;?> }
						i++;
						
						<?php 
						}
						
			}?>
	$.plot($("#cat-chart"), data, 
	{
			colors: ["#006e2e", "#8fc800",  //2
					 "#299a0b", "#b4e391",  //4
					 "#66CC66", "#07B707",  //6
					 "#00CC00", "#99CC66",  //8
					 "#669933", "#336633",  //10
					 "#66FF33", "#00CC66",  //12
					 "#99CC99", "#00CC99",  //14
					 "#367F47", "#99FF66"], //16
			series: {
				pie: { 
					show: true,
                    radius: 100,
					label: {
						show: false,
						formatter: function(label, series){
							return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
						},
						threshold: 0.1
					}
				}
			},
			legend: {
				show: true,
				noColumns: 1, // number of colums in legend table
				labelFormatter: null, // fn: string -> string
				labelBoxBorderColor: "#888", // border color for the little label boxes
				container: null, // container (as jQuery object) to put legend in, null means default on top of graph
				position: "ne", // position of default legend container within plot
				margin: [5, 10], // distance from grid edge to default legend container within plot
				backgroundOpacity: 0 // set to 0 to avoid background
			},
			grid: {
				hoverable: false,
				clickable: false
			},
	});
	
	});


$(function () {
	
		var data2 = [];
		var i=0;
		<?php
		$sy_id = $school_yr;
		$query_lvl=mysql_query("SELECT * FROM year_level_t");
			while($row_lvl=mysql_fetch_assoc($query_lvl)){
					$lvl=$row_lvl['lvl_id'];
					$lvl_name = $row_lvl['lvl_name'];
					$count_lvl=0;
					$query_class=mysql_query("SELECT * from class_t WHERE teacher_id={$_GET['emp_id']} AND sy_id={$sy_id} AND subject_code IN (SELECT subject_code FROM subject_t WHERE year_level={$lvl}) ");
						$row_class=mysql_fetch_assoc($query_class);
							$count_lvl=mysql_num_rows($query_class);
						?>
						<?php
						if($count_lvl>=1){
						?>
						data2[i] = { label: "<?php echo $lvl_name;?>", data: <?php echo $count_lvl;?> }
						i++;
						
						<?php 
						}
						 
			}?>
	$.plot($("#lvl-chart"), data2, 
	{
			colors: ["#006e2e", "#8fc800",  //2
					 "#299a0b", "#b4e391",  //4
					 "#66CC66", "#07B707",  //6
					 "#00CC00", "#99CC66",  //8
					 "#669933", "#336633",  //10
					 "#66FF33", "#00CC66",  //12
					 "#99CC99", "#00CC99",  //14
					 "#367F47", "#99FF66"], //16
			series: {
				pie: { 
					show: true,
					radius: 100,
					label: {
						show: false,
						formatter: function(label, series){
							return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
						},
						threshold: 0.1
					}
				}
			},
			legend: {
				show: true,
				noColumns: 1, // number of colums in legend table
				labelFormatter: null, // fn: string -> string
				labelBoxBorderColor: "#888", // border color for the little label boxes
				container: null, // container (as jQuery object) to put legend in, null means default on top of graph
				position: "ne", // position of default legend container within plot
				margin: [5, 10], // distance from grid edge to default legend container within plot
				backgroundOpacity: 0 // set to 0 to avoid background
			},
			grid: {
				hoverable: false,
				clickable: false
			},
	});
	
	});

</script>


</html>
