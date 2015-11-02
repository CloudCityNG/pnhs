<!DOCTYPE html>
<?php 
 @session_start();



//echo "<br><br><br><br><br>";

require "../db/db.php";

include "actions/class_functions.php";
include "actions/subject_functions.php";
require "actions/sched_functions.php";


if(isset($_GET['class_id'])){
    $class_id = $_GET['class_id'];	
	$section_id = $_GET['section_id'];
}

$msg = NULL;
if(isset($_POST['edit'])){
	//$section = $_POST['section'];
	$section = $_GET['section_id'];
	$subject = $_POST['subject'];
	
	$teacher = $_POST['teacher'];	
	
    if($section){
        if($subject){
			if(is_available_e($section, $subject, $teacher, $class_id)){
				if(!$msg =is_teacher_max_e($teacher, $subject, $class_id)){  //is_unit_maxed($lvl_id, 0, $subject_unit)
					//$subject_unit = $_POST['subject_unit'];
		
					mysql_query("UPDATE class_t SET section_id='$section',
													subject_code='$subject',
													teacher_id=$teacher
												WHERE class_id='$class_id'") or die("sala '$section', NULL, '$subject','$teacher'");
					mysql_query("COMMIT;");
					//header("location: subjects.php?curriculum_code={$get_curriculum_code}");
				    $msg = "SUCCESS!";
				}
				else{
				    //$msg = "Units for the year level is maxed out.";
			    }
			}
			else{
				$msg = "Class Already Exists.";
			}
		}
		else{
			$msg = "Please enter subject.";
		}
	}
	else{
		$msg = "Please enter section.";
	}
}
else if(isset($_GET['class_id'])){
	$query = mysql_query("SELECT * FROM class_t WHERE class_id={$_GET['class_id']}");
    $row = mysql_fetch_assoc($query);
	$section = $row['section_id'];
	$subject = $row['subject_code'];
	
	$teacher = $row['teacher_id'];	
}
else{
	$subject_title = "";
	$subject_unit = "";
	
	$curriculum = "";
	$category = "";
	$section = "";
}



$query_yr_lvl = mysql_query("SELECT * FROM section_t WHERE section_id='{$_GET['section_id']}'");
$row_yr_lvl = mysql_fetch_assoc($query_yr_lvl);
$yr_lvl = $row_yr_lvl['year_level'];
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
			<div class="subnav-collapse collapse">
			  <ul class="mainnav">
                <li> <a href="../home.php"> <i class=" icon-home"></i> <span>Home</span> </a> </li>
                <?php if($developer || $scheduling_officer || $scheduling_admin){ ?>
                <li class="active"> <a href="schedules.php"> <i class="icon-calendar"></i> <span>Schedules</span> </a> </li>
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
                <li class="dropdown" > <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> 
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

		    </div>
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
      <div class="widget stacked widget-table action-table">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          
        
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="65%"><a class="btn btn-mini" href="schedules.php" style="margin-bottom:-6px;"><i class="btn-icon-only icon-chevron-left"></i> back</a> &nbsp;<i class="icon-list-alt"></i> CLASSES</th>
                <th>EDIT CLASS</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="background-color:#F0F0F0">
                  <?php //echo $row['section_id']; 
					  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id={$_GET['section_id']}") or die(mysql_error());
					  $row_section = mysql_fetch_assoc($query_section);
					  
					  echo $row_section['section_name'];
				  ?>
                
                <div id="demo" style="min-height:300px;">
                    <table cellpadding="0" cellspacing="0" border="0" class=" " id="classes" width="100%">
                        <thead>
                                <th>Subject</th>
                                <th>Units</th>
                                <th>Hours/Week</th>
                                <th>Category</th>
                                <th>Teacher</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody >
        
                         <?php 				     
                            
							$sy_id = get_active_sy();
                            $query = mysql_query("SELECT * FROM class_t WHERE section_id={$section_id} AND sy_id={$sy_id}");
							$total_unit=0;
                            while($row = mysql_fetch_assoc($query)){
                            $class_id=$row['class_id'];  ?>
                            
                            <tr class="del<?php echo $class_id; ?>">
                              
                              <td>
                              <?php //echo $row['subject_code'];
                                  $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
                                  $row_subject = mysql_fetch_assoc($query_subject);
                                  $subject_code = $row_subject['subject_code'];
                                  echo $row_subject['subject_title'];
                              ?>
                              </td>
                              <td>
                              <center>
                              <?php //echo $row['subject_code'];
							      $total_unit += $row_subject['credit_unit'];
                                  echo $row_subject['credit_unit'];
                              ?></center>
                              </td>
                              <td>
                              <center>
                              <?php //echo $row['subject_code'];
                                  $time = unit_to_time($row_subject['credit_unit']);
								  $time = round($time*4)/4;
								  $whole1 = (int) $time;
					              $frac1 = (($time*100)%100)*.6;
								  printf("%02d:%02d", $whole1, $frac1);
                              ?>
                              </center>
                              </td>
                              <td>
                              <?php //echo $row['subject_code'];
                                  $query_category = mysql_query("SELECT * FROM subject_category_t WHERE category_id={$row_subject['category_id']}");
                                  $row_category = mysql_fetch_assoc($query_category);
                                  echo $row_category['category_name'];
                              ?>
                              </td>
                              <td>
                              <?php //echo $row['teacher_id'];
							    if($row['teacher_id']!=NULL){
                                  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$row['teacher_id']}");
                                  $row_teacher = mysql_fetch_assoc($query_teacher);
                                  echo $row_teacher['f_name'];
								}
                              ?>
                              </td>
                              
                              <td align="center">      
                                  <script type="text/javascript">
                                     jQuery(document).ready(function() {
                                        $('#p<?php echo $class_id; ?>').popover('show')
                                        $('#p<?php echo $class_id; ?>').popover('hide')
                                     });
                                  </script>
                                        
                                <a class="btn btn-mini" href='class_edit.php?class_id=<?php echo $class_id;?>&&section_id=<?php echo $_GET['section_id'];?>'> Edit</a> 
                              </td>                            
                            </tr>
                            
                        <?php }?>
                        
                        </tbody>
                    </table>
                    <?php 
					  echo "Total Units: ".$total_unit."<br />";
					  $time = unit_to_time($total_unit);
					  $time = round($time*4)/4;
					  $whole1 = (int) $time;
					  $frac1 = (($time*100)%100)*.6;
					  printf("Total Tims: %02d:%02d", $whole1, $frac1);
					?>
                </div>
                </th>
                <th >
                   <div id="error">
					<?php if(isset($msg)){?>
                    <div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>NOTICE:</strong> <?php echo "$msg";?>
                    </div>
                    <?php }?>
            
                  </div>
            <form name="add_section_form" action=""  class="form-horizontal" method="post" style="min-height:400px;">
                <table class="container" style="width:auto;margin-top:50px;" >
                    <tr>
                        <td> Section :</td>
                        <td>
                        	<!--
                            <select name='section' id="section">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM section_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php echo ($row['section_id']==$section)?"selected":"" ?> value="<?php echo $row['section_id']?>"><?php echo $row['section_name'] ?></option>
								<?php 
								}
								
							?>
                            </select>
                            -->
                            <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM section_t WHERE section_id={$_GET['section_id']}");
								$row = mysql_fetch_assoc($query);
								?>
                                <input type="text" disabled value="<?php echo $row['section_name'];?>">
                                <?php
							?>
                        </td>
                    </tr>
                    <tr>
                        <td> Subject :</td>
                        <td>
                            <select name='subject' id="subject">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM subject_t WHERE year_level='{$yr_lvl}'");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php echo ($row['subject_code']==$subject)?"selected":"" ?> value="<?php echo $row['subject_code']?>"><?php echo $row['subject_title'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> Teacher :</td>
                        <td>
                        <select  name="teacher" id="teacher">
                            <option value="NULL">None</option>
                        <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM teacher_t");
								while($row = mysql_fetch_assoc($query)){
									$emp_query = mysql_query("SELECT * FROM employee_t WHERE emp_id = {$row['emp_id']}");
									$emp_row = mysql_fetch_assoc($emp_query); ?>
									<option value='<?php echo $row['emp_id'] ?>'><?php echo $emp_row['l_name'] ?>, <?php echo $emp_row['f_name'] ?></option>
								<?php
                                }
								
						?>
                        </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td><div align="">
                        <input class="btn " type="submit" value="UPDATE" name="edit" id="edit">
                        </div></td>
                    </tr>
                    
                </table>
                <p>&nbsp;</p>
                <a class="btn pull-right span2" href="section_class.php?section_id=<?php echo $_GET['section_id'];?>"><i class="icon-plus-sign-alt"></i> ADD NEW CLASS</a>

            </form>

                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /widget-content -->
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

<!-- InstanceBeginEditable name="extra" -->
     
<div class="modal fade hide" id="add_subject">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="add_subj_form" action="subject_add.php?curriculum_code=<?php echo $get_curriculum_code;?>" method="post">
                              <fieldset>
                              <table width="386" border="0" bordercolor="#000" >
                    
                                <tr >
                                  <td>SUBJECT TITLE </td>
                                  <td><input type="text" name="subject_title" id="subject_title" value="<?php echo "$subject_title";?>" placeholder="Subject Title"></td>
                                </tr>
                                <tr>
                                  <td>CREDIT UNITS</td>
                                  <td><input type="text" name="subject_unit" id="subject_unit" value="<?php echo "$subject_unit";?>" placeholder="Credit Units"></td>
                                </tr>
                                <tr>
                                  <td>YEAR ASSIGNMENTS</th>
                                  <td>
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "<select name='subject_yr' >";
                                        $query = mysql_query("SELECT * FROM year_level_t");
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['lvl_id']."'>".$row['curriculum_code']." : ".$row['lvl_name']."</option>";
                                        }
                                        echo "</select>";
                                        
                                        
                                        
                                        //echo $lvl_name;
                                        
                                    ?>
                                    
                                  </td>
                                </tr>
                                <!--<tr>
                                  <th scope="col">Curriculum</th>
                                  <th scope="col">
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        if(isset($_GET['code'])){
                                                $code = $_GET['code'];
                                                $query2 = mysql_query("SELECT * FROM curriculum_t WHERE curriculum_code = '$code'");
                                                $row2 = mysql_fetch_assoc($query2);
                                                echo $row2['title'];
                                                echo "<input type='hidden' name='curriculum' value='{$row2['curriculum_code']}'>";
                                        }
                                        else {
                                        echo "<select name='curriculum' >";
                                        $query = mysql_query("SELECT * FROM curriculum_t ORDER BY curriculum_code");
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['curriculum_code']."'>".$row['title']."</option>";
                                            
                                        }
                                        echo "</select>";
                                        }
                                    ?>
                                             
                                  </th>
                                </tr> -->
                                <tr>
                                  <td>SUBJECT CATEGORY</td>
                                  <td><select name="category">
                                    <?php
                                        require_once "../db/db.php";
                                        $query = mysql_query("SELECT * FROM subject_category_t GROUP BY category_name");
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                                        }
                                    ?>
                                                  </select>
                                  </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                              </table>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="submit" value="SUBMIT" >

                              </fieldset>
                            </form>

  </div>
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
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#classes').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength':12,		});
	} );
</script>
<script type="text/javascript">
    $(window).load(function(){
        $('#add_subject').modal('show');
    });
</script>

</html>
