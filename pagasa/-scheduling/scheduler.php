<!DOCTYPE html>
<?php 
 @session_start();
 
//echo "<br><br><br><br><br>";

require_once "../db/db.php";
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
include "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/load_schedule.php"; //to pre-load schedule on the time table.

if(!isset($_POST['add_load']) && !isset($_POST['edit_load'])){
    load_sched($_GET['section_id'], get_active_sy());  // to load/reload schedule and mount it to a temporary database
}

if(isset($_POST['add_load'])){
    $load_id = '';
	$class_id = isset($_POST['class_menu'])? $_POST['class_menu']:NULL;
	$s_time_index = $_POST['s_time_menu'];
	$e_time_index = $_POST['e_time_menu'];
	$days_check = isset($_POST['day_menu'])? $_POST['day_menu']:NULL;
	//$subject_code = $_POST['subject_menu'];
	//$room_no = $_POST['room_menu'];
	//$emp_id = $_POST['teacher_menu'];
	if($class_id){
		if(isset($_POST['day_menu'])){
			//$days = array($_POST['day_menu']);
			
			$start_time = $times[$s_time_index];
			$end_time = $times[$e_time_index];
			if(strtotime($start_time)<strtotime($end_time)){ //$start_time<$end_time
				if(!$msg = is_faculty_loaded($class_id, $start_time, $end_time, $_POST['day_menu'])){ //!$msg = is_loaded()
					if(true){ //!$msg = is_teacher_max($emp_id, $subject_code)
						$total_hours = get_duration($start_time, $end_time) * count($_POST['day_menu']);
						if(!$msg = is_subj_max($class_id, $total_hours)){ //!$msg = is_subj_max($section_id, $subject_code)
							foreach($_POST['day_menu'] as $day){
								$sy_id = get_active_sy();
								mysql_query("START TRANSACTION;");
								mysql_query("INSERT INTO class_schedule_temp_t 
												 VALUES ('', 
														 '$class_id', 
														 '$day', 
														 '$start_time', 
														 '$end_time', 
														 '101');" 
														 )or die ("error po $start_time   ");
								mysql_query("COMMIT;");
							}
							$msg = "Successfuly added Load";
						}
						//else
						//  $msg = "hello";
					}
					//else
					//    $msg = "Teacher has reached maximum loads available";
				} 
				//else{
				//    $msg = "There is already a load for that particular time.";
				//}
			}
			else{
				$msg = "Invalid combination for start and end time.".$start_time." - ".$end_time;	
			}
		}
		else{
			$msg = "No day selected. Please select one or more.";
			
		}
	}else{//if !class_id
		$msg = "There are no classes set for this section";
	}
}
else{
$s_time_index =0;
$e_time_index =0;
$days_check= array("", "");
	
}
if($days_check==NULL){
	$days_check= array("", "");
}

if(isset($_POST['edit_load'])){
	$schedule_id = $_POST['hidden_sched_id'];
	$class_id = $_POST['e_class_menu'];
	//$subject_code = $_POST['subject_menu'];
	//$room_no = $_POST['room_menu'];
	//$emp_id = $_POST['teacher_menu'];
	if(isset($_POST['e_day_menu'])){
	    //$days = array($_POST['day_menu']);
		$s_time_index = $_POST['e_s_time_menu'];
		$e_time_index = $_POST['e_e_time_menu'];
		$start_time = $times[$s_time_index];
		$end_time = $times[$e_time_index];
		
		if(strtotime($start_time)<strtotime($end_time)){ //$start_time<$end_time
			if(!$msg = is_faculty_loaded_e($class_id, $start_time, $end_time, $_POST['e_day_menu'], $schedule_id) ){ //!$msg = is_loaded()
				if(!$msg = is_section_loaded_e($_GET['section_id'], $start_time, $end_time, $_POST['e_day_menu'], $schedule_id)){ //!$msg = is_teacher_max($emp_id, $subject_code)
					$total_hours = get_duration($start_time, $end_time) * count($_POST['e_day_menu']);
					if(!$msg = is_subj_max_e($class_id, $total_hours, $schedule_id )){ //!$msg = is_subj_max($section_id, $subject_code)
						foreach($_POST['e_day_menu'] as $day){
							$sy_id = get_active_sy();
							mysql_query("START TRANSACTION;");
							mysql_query("UPDATE class_schedule_temp_t 
											     SET class_id='$class_id', 
													 day='$day', 
													 time_start='$start_time', 
													 time_end='$end_time', 
													 room='102'
											   WHERE schedule_id='$schedule_id'
											        ")or die (mysql_error());
							mysql_query("COMMIT;");
						}
						$msg = "Successfuly Edited Load";
					}
					//else
					//  $msg = "hello";
				}
				//else
				//    $msg = "Teacher has reached maximum loads available";
			} 
			//else{
		    //    $msg = "There is already a load for that particular time.";
			//}
		}
		else{
		    $msg = "Invalid combination for start and end time.";	
		}
	}
	else{
	    $msg = "No day selected. Please select one or more.";
		
	}
}


if($days_check==NULL || $days_check==""){
	$days_check= array("", "");
}

?>
<script type="text/javascript">
  
</script>
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


<link rel="stylesheet" href="css/tables.css" type="text/css" media="screen"/>
<link href="notification/styled-elements.css" rel="stylesheet" />

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
			    <li > <a href="schedules.php"> <i class=" icon-arrow-left"></i> <span>Back</span></a></li>
				<!--
			    <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span></a></li>
			    <li> <a href="curriculums.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Curriculums</span></a></li>
			    <li> <a href="rooms.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span></a></li>
			    <li> <a href="teachers.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teachers</span></a></li>
  				-->
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
      <div id="error" class="hide">
        <?php if(isset($msg)){?>
      	<div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Notice!</strong> <?php echo "$msg";?>
        </div>
        <?php }?>

      </div>
      <div id="error">
		<?php if(isset($msg)){?>
        <?php if($msg=="Successfuly added Load" || $msg=="Successfuly Edited Load"){?>
        <div class="alert alert-error success-box">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>NOTICE:</strong> <?php echo "$msg";?>
        </div>
        <?php }else{?>
        <div class="alert alert-error error-box">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>NOTICE:</strong> <?php echo "$msg";?>
        </div>
        <?php }?>
        <?php }?>

      </div>
      <div class="span4">
      <div class="widget stacked widget-table action-table">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Classes</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="" style="min-height:100px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" table table-striped table-bordered" id="" width="100%">
                <thead>
                    <tr>
                        <th>subject</th>
                        <th>teacher</th>
                        <th>Hours</th>

                    </tr>
                </thead>
                <tbody>

                 <?php 				     
                    include('../db/db.php');
					$sy_id=get_active_sy();
                    $query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']} AND sy_id={$sy_id}");
                    $class = array();
					echo (mysql_num_rows($query)<1)? "<tr><td colspan='3'>There are no classes assigned for this section.</td></tr>":"";
                    $i=0;
					$total_time = 0; //total amount of time scheduled for all classes
                    $total_units = 0;//total amount of units for all classes
					$whole1 = $frac1 = $whole2 = $frac2 = 0;
					while($row = mysql_fetch_assoc($query)){
					  $class_id = $row['class_id'];	
						
                      $subject_code=$row['subject_code'];
					  $teacher_id=$row['teacher_id'];
					  $units=$row['subject_code']; 
					  				  					  
					  $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$subject_code}");
					  $row_subject = mysql_fetch_assoc($query_subject);
					  $subject = $row_subject['subject_title'];
					  $units = $row_subject['credit_unit'];
					  
					  if($teacher_id!=NULL){
					  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$teacher_id}");
					  $row_teacher = mysql_fetch_assoc($query_teacher);
					  $teacher = $row_teacher['f_name'];
					  }
					  else{
					  $teacher = "";
					  }
					  $query_room = mysql_query("SELECT * FROM class_room_t WHERE section_assigned='{$_GET['section_id']}'");
					  $row_room = mysql_fetch_assoc($query_room);
					  $room_no = $row_room['room_no'];
					  
					  
					  $class[$i]['subject'] = $subject;
					  $class[$i]['teacher'] = $teacher;
					  $class[$i]['units'] = $units;
					  $class[$i]['room'] = $room_no;
					  
					  $class_time = total_hours($class_id);
					  $class_units = unit_to_time($units);
					  
					  $class_units = round($class_units*4)/4;
					  
					  $total_time+=$class_time;
					  $total_units += $class_units;
					  
					  //==============================fractionalizing
					  $whole2 = (int) $class_units;
					  $frac2 = (($class_units*100)%100)*.6;
					  
					  $whole1 = (int) $class_time;
					  $frac1 = (($class_time*100)%100)*.6;
					  
					  $class_color[$class_id] = $i%7+1;
					  
					  ?>
                      <script type="text/javascript">
					     var classes = <?php echo json_encode($class);?>;
                         var number = (Math.round(number * 4) / 4).toFixed(2);

                      </script>
    
                      <tr class="color<?php echo $i%7+1; ?>">
                        <td ><?php echo $subject; ?></td>
                        <td><?php echo $teacher; ?></td>
                        <td><?php printf("%02d:%02d / %02d:%02d", $whole1, $frac1, $whole2, $frac2 );// $class_time, $class_units,?>
                          <!--<input value="#FFFFFF" style="padding:0; width:20px; height:20px; line-height:100%; " type="color"> -->
                        </td>
                      
                      </tr>
                    
                    <?php 
					$i++;
					}
					$whole2 = (int) $total_units;
				    $frac2 = (($total_units*100)%100)*.6;
				  
				    $whole1 = (int) $total_time;
				    $frac1 = (($total_time*100)%100)*.6;
				  ?>
                  <tr class="color0">
                    <td colspan='2'>TOTAL UNITS</td>
                    <td><?php printf("%02d:%02d / %02d:%02d", $whole1, $frac1, $whole2, $frac2 );?>
                    </td>
                    <script type="text/javascript">
					    var total_time = <?php echo $total_time;?>;
						var total_units = <?php echo $total_units;?>;
                    
                    </script>
                  </tr>
                </tbody>
            </table>
            
          </div>
        </div>

        <!-- /widget-content -->
      </div>
      
      
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>ADD SCHEDULE</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding:5px">
        
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['REQUEST_URI']?>">
        <table>
          <tr>
            <td>
              ClASS
            </td>
            <td>
              <select name="class_menu" id="class_menu" >
                  <?php
                      
                      $query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']} AND sy_id={$sy_id}");
                      
                      while($row = mysql_fetch_assoc($query)){
						  $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
                          $row_subject = mysql_fetch_assoc($query_subject);
						  echo "<option value='".$row['class_id']."' > ".$row_subject['subject_title'];
                      }
                  ?>
              </select>
            </td>
            
          </tr>                  
          <tr>
            <td>
              SUBJECT
            </td>
            <td>
              <!--
              <select name="subject_menu" id="subject_menu" >
                  <?php
                      
                      $query = mysql_query("SELECT * FROM subject_t WHERE year_level = '$year_level'");
                      
                      while($row = mysql_fetch_assoc($query)){
                          echo "<option value='".$row['subject_code']."' > ".$row['subject_title'];
                      }
                  ?>
              </select>
              -->
              <input type="text" disabled id="subject_area" value="<?php echo (isset($class[0]['subject']))? $class[0]['subject']:"";?>"/>
            </td>
            
          </tr>
          <tr>
            <td>
              TEACHER
            </td>
            <td>
              <!--
              <select name="teacher_menu" id="teacher_menu" >
                <?php
				  $query = mysql_query("SELECT * FROM teaching_staff_t");
				  
				  while($row = mysql_fetch_assoc($query)){
					  $emp_id = $row['emp_id'];
					  $teacher_query = mysql_query("SELECT f_name, l_name FROM employee_t WHERE emp_id = '$emp_id'");
					  $teacher_row = mysql_fetch_assoc($teacher_query);
					  echo "<option value='".$emp_id."' > ".$teacher_row['f_name'];
				  }
                ?>
              </select>
              -->
              <input type="text"  disabled id="teacher_area" value="<?php echo isset($class[0]['teacher'])? $class[0]['teacher']:"";?>" />
            </td>
          </tr>
          <tr>
            <td>
              Room
            </td>
            <td>
              <!--
                <select name="room_menu" id="room_menu" >
                  <?php
                      
                      $query = mysql_query("SELECT * FROM room_t");
                      
                      while($row = mysql_fetch_assoc($query)){
                          echo "<option value='".$row['room_no']."' > ".$row['room_no'];
                      }
                  ?>
                </select>
                -->
              <input type="text"  disabled id="room_area" value="<?php echo isset($class[0]['room'])? $class[0]['room']:"";?>" />
            </td>
          </tr>
          <tr>
            <td colspan="2">
                <div align="center">
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="monday" id="day_menu_0" <?php echo (in_array("monday",$days_check))? "checked":""; ?>>
                    Mon</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="tuesday" id="day_menu_1" <?php echo (in_array("tuesday",$days_check))? "checked":""; ?>>
                    Tue</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="wednesday" id="day_menu_2" <?php echo (in_array("wednesday",$days_check))? "checked":""; ?>>
                    Wed</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="thursday" id="day_menu_3" <?php echo (in_array("thursday",$days_check))? "checked":""; ?>>
                    Thu</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="friday" id="day_menu_4" <?php echo (in_array("friday",$days_check))? "checked":""; ?>>
                    Fri</label>
                </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <select name="s_time_menu" id="s_time_menu" style="width:40%;">
                  <?php
				      
                      $limit = count($times);
                      for($i=0;$i<$limit;$i++){
                          if($i!=0 && $i!=3 && $i!=6 ) ?>
                              <option <?php echo ($i==$s_time_index)? "selected":"";?> value="<?php echo $i;?>"><?php echo date('h:i A', strtotime($times[$i]));?></option>
                      <?php
                      }
                      
                  ?>
              </select>
            
              <select name="e_time_menu" id="e_time_menu" style="width:40%;">
                  <?php
                      include "actions/time_intervals.php";
                      $limit = count($times);
                      for($i=0;$i<$limit;$i++){
                          if($i!=0 && $i!=3 && $i!=6 ) ?>
                              <option <?php echo ($i==$e_time_index)? "selected":"";?> value="<?php echo $i;?>"><?php echo date('h:i A', strtotime($times[$i]));?></option>
                      <?php
                      }
                      
                  ?>
              </select>
            
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input class="btn"type="submit" id="add_load" name="add_load" value="ADD" />
            </td>
          </tr>
        </table>
        </form>
        </div>
          
        <!-- /widget-content -->
      </div>
      
      <!--
      <a href="javascript:;" class="btn btn-large btn-info msgbox-error">Alert Message</a>
      -->
      <button id="saver" class="btn btn-large" type="button" onClick="" >SAVE</button>
      
      </div>
      
      
      <div class="span8">
      <div class="widget stacked ">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Scheduler</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
        <!-- tables inside this DIV could have draggable content -->
			<div id="drag">
	
				
				
				<!-- right container -->
				<div id="" class="  ">
					<table id="table" class=" hide">
						<colgroup>
							<col width="50"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
						</colgroup>
						<tbody>
							<tr>
								<!-- if checkbox is checked, clone school subjects to the whole table row  -->
								<td class="mark blank">
								</td>
								<td class="mark dark">Monday</td>
								<td class="mark dark">Tuesday</td>
								<td class="mark dark">Wednesday</td>
								<td class="mark dark">Thursday</td>
								<td class="mark dark">Friday</td>

							</tr>
							<tr>
								<td class="mark dark">8:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">9:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">10:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">11:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">12:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">13:00</td>
								<td class="mark lunch" colspan="5">Lunch</td>
							</tr>
							<tr>
								<td class="mark dark">14:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">15:00</td>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="mark dark">16:00</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
                    
                    <?php
                    ##################################################################################################################	
					$start_times = array('07:15', '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45');  #
					$end_times = array( '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45','16:45');    #
					$day_array = array('monday','tuesday','wednesday','thursday','friday');                                          #
					##################################################################################################################

					?>
                    
                    
                    <table  width="100%" border="0" bordercolor="#FFFFFF" class="timetable" style="">
                        <colgroup>
							<col width="50"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
						</colgroup>
                        <thead><tr bgcolor="#006699" style="color:white">
                            <th width="50">TIME</th>
                            <?php
                            $day_count = count($day_array);
                            for($i=0;$i<$day_count;$i++){ ?>
                                <th class="timetable_header" style=''><?php echo $day_array[$i]?></th>
                            <?php
                            }
                            ?>
                        </tr></thead>
                    
                      <?php
                      // $i === time interval
                      // $j === sections
					  
                      for($i=0;$i<count($times)-1;$i++){ ?>
                          <tr bgcolor='#F2F2F2'>
                                    <th bgcolor='#EDEEFE'><?php echo date('h:i A',strtotime($times[$i]))?></th>
                          <?php
						  
                          if($i>=0 && $i<=1){
                              echo ($i==0)? "<th colspan='$day_count' rowspan='2' class='restricted end'> FLAG CEREMONY</th>":"";
                              continue;
                          } 
                           if($i>=10 && $i<=11){
                              echo ($i==10)? "<th colspan='$day_count' rowspan='2' class='restricted end'> RECESS</th>":"";
                              continue;
                          } 
                           if($i>=20 && $i<=23){
                              echo ($i==20)?"<th colspan='$day_count' rowspan='4' class='restricted end'> LUNCH BREAK</th>":"";
                              continue;
                          } 
                          for($j=0;$j<$day_count;$j++){
                              $loaded_day_ID = $day_array[$j];
                              $start = $times[$i];
                              $end = $times[$i+1];
							  $schedule_id = is_loaded($_GET['section_id'], $start, $end, $loaded_day_ID);
							  $loaded_class_id = get_class_id($schedule_id, 0);
                              if($loaded_class_id!=""){
							      $slots = get_slots($schedule_id);
								  if(is_first($schedule_id, $start)){
									  ?> <th class="color<?php echo $class_color[$loaded_class_id];?> loaded" rowspan="<?php echo $slots;?>"> <?php
								      $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
										                                                           WHERE subject_t.subject_code=class_t.subject_code
																								   AND class_t.class_id=$loaded_class_id") or die(mysql_error());
								      $row_subject = mysql_fetch_assoc($query_subject);
									  echo $row_subject['subject_title']."";//     $slots?> 
                                      <a  data-toggle="modal" href="#edit_modal" onClick="toggle_edit('<?php echo $schedule_id."-".get_class_id($schedule_id, 0);?>')" ><i style="padding:0;margin:0" class="icon-cog"></i></a>
									  </th><?php
								   }
								   ?> 
							  <?php
                              }
                              else {?>
                                  <th></th>
                              <?php
					          }
                          }
                          echo "</tr>";
                      }
                      ?>
                      
                    </table>
				</div><!-- right container -->
			</div><!-- drag container -->  
          
        </div>
          
      <!-- /widget-content -->
      </div>
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

<div class="modal fade hide" style="width:350px;;" id="edit_modal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>EDIT SCHEDULE</h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="edit_schedule" action="" method="post">
                              <fieldset>
                              <table>
                                <tr>
                                  <td>SCHEDULE</td>
                                  <td>
                                    <input type="text" id="e_schedule_id" name="e_schedule_id" value"0" disabled />
                                    <input type="hidden" id="hidden_sched_id" name="hidden_sched_id" value="0">
                                  </td>
                                <table>
                              <tr>
                                <td>
                                  ClASS
                                </td>
                                <td>
                                  <select name="e_class_menu" id="e_class_menu" >
                                      <?php
                                          
                                          $query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']} AND sy_id={$sy_id}");
                                          
                                          while($row = mysql_fetch_assoc($query)){
                                              $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
                                              $row_subject = mysql_fetch_assoc($query_subject);
                                              echo "<option value='".$row['class_id']."' > ".$row_subject['subject_title'];
                                          }
                                      ?>
                                  </select>
                                </td>
                                
                              </tr>                  
                              <tr>
                                <td>
                                  SUBJECT
                                </td>
                                <td>
                                  <!--
                                  <select name="subject_menu" id="subject_menu" >
                                      <?php
                                          
                                          $query = mysql_query("SELECT * FROM subject_t WHERE year_level = '$year_level'");
                                          
                                          while($row = mysql_fetch_assoc($query)){
                                              echo "<option value='".$row['subject_code']."' > ".$row['subject_title'];
                                          }
                                      ?>
                                  </select>
                                  -->
                                  <input type="text" disabled id="e_subject_area" value="<?php echo $class[0]['subject']?>"/>
                                </td>
                                
                              </tr>
                              <tr>
                                <td>
                                  TEACHER
                                </td>
                                <td>
                                  <!--
                                  <select name="teacher_menu" id="teacher_menu" >
                                    <?php
                                      $query = mysql_query("SELECT * FROM teaching_staff_t");
                                      
                                      while($row = mysql_fetch_assoc($query)){
                                          $emp_id = $row['emp_id'];
                                          $teacher_query = mysql_query("SELECT f_name, l_name FROM employee_t WHERE emp_id = '$emp_id'");
                                          $teacher_row = mysql_fetch_assoc($teacher_query);
                                          echo "<option value='".$emp_id."' > ".$teacher_row['f_name'];
                                      }
                                    ?>
                                  </select>
                                  -->
                                  <input type="text"  disabled id="e_teacher_area" value="<?php echo $class[0]['teacher']?>" />
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Room
                                </td>
                                <td>
                                    <!--
                                    <select name="e_room_menu" id="e_room_menu" >
                                      <?php
                                          
                                          $query = mysql_query("SELECT * FROM room_t");
                                          
                                          while($row = mysql_fetch_assoc($query)){
                                              echo "<option value='".$row['room_no']."' > ".$row['room_no'];
                                          }
                                      ?>
                                    </select>
                                    -->
                                     <input type="text"  disabled id="e_room_area" value="<?php echo $class[0]['room']?>" />
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                    <div align="center" id="edit_day_menu">
                                      <label class=" radio inline">
                                        <input type="radio" name="e_day_menu[]" value="monday" id="e_day_menu_0">
                                        Mon</label>
                                      <label class="radio inline">
                                        <input type="radio" name="e_day_menu[]" value="tuesday" id="e_day_menu_1">
                                        Tue</label>
                                      <label class="radio inline">
                                        <input type="radio" name="e_day_menu[]" value="wednesday" id="e_day_menu_2">
                                        Wed</label>
                                      <label class="radio inline">
                                        <input type="radio" name="e_day_menu[]" value="thursday" id="e_day_menu_3">
                                        Thu</label>
                                      <label class="radio inline">
                                        <input type="radio" name="e_day_menu[]" value="friday" id="e_day_menu_4">
                                        Fri</label>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="2">
                                  <select name="e_s_time_menu" id="e_s_time_menu" style="width:40%;">
                                      <?php
                                          
                                          $limit = count($times);
                                          for($i=0;$i<$limit;$i++){
                                              if($i!=0 && $i!=3 && $i!=6 ) ?>
                                                  <option value="<?php echo $i;?>"><?php echo date('h:i A', strtotime($times[$i]));?></option>
                                          <?php
                                          }
                                          
                                      ?>
                                  </select>
                                
                                  <select name="e_e_time_menu" id="e_e_time_menu" style="width:40%;">
                                      <?php
                                          include "actions/time_intervals.php";
                                          $limit = count($times);
                                          for($i=0;$i<$limit;$i++){
                                              if($i!=0 && $i!=3 && $i!=6 ) ?>
                                                  <option value="<?php echo $i;?>"><?php echo date('h:i A', strtotime($times[$i]));?></option>
                                          <?php
                                          }
                                          
                                      ?>
                                  </select>
                                
                                </td>
                              </tr>
                              
                               
                              </table>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" id="edit_load" name="edit_load" value="EDIT" >

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
<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>


<script src="js/notifications.js"></script>



<script type="text/javascript" charset="utf-8">
	var $navigation_confirm = 1;
	$(document).ready(function() {
		
		$('#this').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 10		});
		//saves the current session
		$("#saver").click(function(){
			//alert(total_time);
			//alert(total_units);
			if(total_time == total_units && total_time!=0){
				$.ajax({
					url: "actions/save_schedule.php",
					type: "GET",
					data:{section_id:<?php echo $_GET['section_id'];?>},
					async: true
				});
				alert("SUCCEFULLY SAVED SCHEDULE.");
				$navigation_confirm=0;
			}
			else{
			    alert("NOT ALL CLASSES ARE FULLY SCHEDULED!\nPlease make sure to schedule all classes with the correct amount of time.");	
			}

		});
		//automatically changes values on the form based on selected class
		$("#class_menu").change(function(){
			var i = $("#class_menu")[0].selectedIndex;
			$("#subject_area").val(classes[i]['subject']);
			$("#teacher_area").val(classes[i]['teacher']);
			$("#room_area").val(classes[i]['room']);
		});
		$("#e_class_menu").change(function(){
			var i = $("#e_class_menu")[0].selectedIndex;
			$("#e_subject_area").val(classes[i]['subject']);
			$("#e_teacher_area").val(classes[i]['teacher']);
			$("#e_room_area").val(classes[i]['room']);
		});
		

		
		//flags that it is safe to navigate away from page ::just reloading :)
		$("#add_load").click(function(){
		    $navigation_confirm = 0;
		});
		$("#edit_load").click(function(){
		    $navigation_confirm = 0;
		});
		
		
		
		//listen for event change on s_time_menu and updates e_time_menu with values equal or greater than the selected value
		$("#s_time_menu").change(function(){
		    var times_index = $(this).val();
		    if(times_index != '')  
		 		{
		  		$.ajax
		  		({
			 		type: "POST",
			 		url: "actions/dropdown_time.php",
			 		data: "times_index="+ times_index,
			 		success: function(option){
				   		$("#e_time_menu").html(option);
			 		}
		  		});
		 	}
		 	else{
		   		$("#e_time_menu").html("<option value=''>-- No category selected --</option>");
		 	}
			return false;
	  	});
		$("#e_s_time_menu").change(function(){
		    var times_index = $(this).val();
		    if(times_index != '')  
		 		{
		  		$.ajax
		  		({
			 		type: "POST",
			 		url: "actions/dropdown_time.php",
			 		data: "times_index="+ times_index,
			 		success: function(option){
				   		$("#e_e_time_menu").html(option);
			 		}
		  		});
		 	}
		 	else{
		   		$("#e_e_time_menu").html("<option value=''>-- No category selected --</option>");
		 	}
			return false;
	  	});


		
	});
	//function to change value of the schedule_id being edited in the edit_form
	function toggle_edit(str){
		var array = str.split("-");
		var schedule_id = array[0];
		var class_id = array[1];
		
	    $("#e_schedule_id").val(schedule_id);
		$("#hidden_sched_id").val(schedule_id);
		$("#e_class_menu").val(class_id)
		
		
		$.get("actions/test.php",
			   function(data){
		    //alert(data+" is it");   
		}); 
		
		var s_time=0;
		var e_time=0;
		var day=0;
		$.get( "actions/test.php", { sched_id: schedule_id }  ,
  		    function( data ) {
    		//alert( "Data Loaded: " + jQuery.parseJSON(data).day );
  		    s_time = jQuery.parseJSON(data).start;
			e_time = jQuery.parseJSON(data).end;
			day = jQuery.parseJSON(data).day;
			
			if(day=='monday'){
				$("#e_day_menu_0").prop('checked', true);
			}
			else{
				$("#e_day_menu_0").prop('checked', false);
			}
			if(day=='tuesday'){
				$("#e_day_menu_1").prop('checked', true);
			}
			else{
				$("#e_day_menu_1").prop('checked', false);
			}
			if(day=='wednesday'){
				$("#e_day_menu_2").prop('checked', true);
			}
			else{
				$("#e_day_menu_2").prop('checked', false);
			}
			if(day=='thursday'){
				$("#e_day_menu_3").prop('checked', true);
			}
			else{
				$("#e_day_menu_3").prop('checked', false);
			}
			if(day=='friday'){
				$("#e_day_menu_4").prop('checked', true);
			}
			else{
				$("#e_day_menu_4").prop('checked', false);
			}
			var times = <?php echo json_encode($times);?>;
			
			//$("#e_e_time_menu").val(s_time);
	        //$("#e_s_time_menu").val(e_time);
		});
		
		var i = $("#e_class_menu")[0].selectedIndex;
		$("#e_subject_area").val(classes[i]['subject']);
		$("#e_teacher_area").val(classes[i]['teacher']);
		
		//$("#edit_day_menu input[value='"+day+"']").prop('checked', true);
		
		//$("#e_e_time_menu")
		//$("#e_s_time_menu")
	}
	//truncates temporary databse
    window.onbeforeunload=function() {
        
		if($navigation_confirm==1){
			
			$.ajax({
			url: "actions/truncate.php",
			type: "GET",
			data: {section_id:<?php echo $_GET['section_id'];?>},
			async : false
			});
	        return "SCHEDULES ARE NOT YET SAVED!!!";
			
	    }
    }
	window.unload=function () { 
	    
		$.ajax({
			url: "actions/truncate.php",
			async : false

		});	
	}

	// MASTER PAULO
</script>

</html>
