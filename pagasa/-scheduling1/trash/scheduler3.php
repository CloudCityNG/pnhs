<!DOCTYPE html>
<?php 
 @session_start();
 





if(isset($_POST['add_load'])){
    $load_id = '';
	//$section_id = $_POST['section_menu'];
	$subject_code = $_POST['subject_menu'];
	$room_no = $_POST['room_menu'];
	$emp_id = $_POST['teacher_menu'];
	if(isset($_POST['day_menu'])){
	    //$days = array($_POST['day_menu']);
	
		$time_index = $_POST['time_menu'];
		$start_time = $start_times[$time_index].":00";
		$end_time = $end_times[$time_index].":00";
		
		if($start_time<$end_time){
			if(!$msg = is_loaded()){
				if(!$msg = is_teacher_max($emp_id, $subject_code)){
					if(!$msg = is_subj_max($section_id, $subject_code)){
						foreach($_POST['day_menu'] as $day){
							$sy_id = get_school_yr();
							mysql_query("START TRANSACTION;");
							mysql_query("INSERT INTO class_schedule_temp_t 
											 VALUES ('', 
													 '$section_id', 
													 '$subject_code', 
													 '$room_no', 
													 '$emp_id', 
													 '$day', 
													 '$start_time', 
													 '$end_time',
													 '$sy_id');" 
													 )or die ("error po $start_time   ");
							mysql_query("COMMIT;");
						}
						$msg = "Successfuly added Load";
					}
					//else
					  //$msg = "hello";
				}
				//else
				    //$msg = "Teacher has reached maximum loads available";
			} 
			else{
		        //$msg = "There is already a load for that particular time.";
			}
		}
		else{
		    $msg = "Invalid combination for start and end time.";	
		}
	}
	else{
	    $msg = "No day selected. Please select one or more.";
		
	}
	
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

<link rel="stylesheet" href="scheduler/style.css" type="text/css" media="screen"/>

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
      <div class="span4">
      <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Scheduler</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo" style="min-height:100px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" display" id="this" width="100%">
                <thead>
                    <tr>
                        <th>subject</th>
                        <th>teacher</th>
                        <th>Units</th>

                    </tr>
                </thead>
                <tbody>

                 <?php 				     
                    include('../db/db.php');
                    $query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']}");
                    
                    
                    while($row = mysql_fetch_assoc($query)){
                      $subject_code=$row['subject_code'];
					  $teacher_id=$row['teacher_id'];
					  $units=$row['subject_code']; 
					  
					  $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$subject_code}");
					  $row_subject = mysql_fetch_assoc($query_subject);
					  $subject = $row_subject['subject_title'];
					  $units = $row_subject['credit_unit'];
					  
					  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$teacher_id}");
					  $row_teacher = mysql_fetch_assoc($query_teacher);
					  $teacher = $row_teacher['f_name'];
					  
					  ?>
                    
    
                      <tr class=" odd del<?php echo $row['class_id']; ?>">
                        <td ><?php echo $subject; ?></td>
                        <td><?php echo $teacher ?></td>
                        <td><?php echo $units?></td>
                      
                      </tr>
                    
                    <?php 
					}
				  ?>
                </tbody>
            </table>
            
          </div>
        </div>
          
        <!-- /widget-content -->
      </div>
      
      
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Scheduler</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content" style="padding:5px">
        
        <form class="form-horizontal">
        <table>
          <tr>
            <td>
              SUBJECT
            </td>
            <td>
              <select name="subject_menu" id="subject_menu" >
                  <?php
                      
                      $query = mysql_query("SELECT * FROM subject_t WHERE year_level = '$year_level'");
                      
                      while($row = mysql_fetch_assoc($query)){
                          echo "<option value='".$row['subject_code']."' > ".$row['subject_title'];
                      }
                  ?>
              </select>
            </td>
            
          </tr>
          <tr>
            <td>
              Teacher
            </td>
            <td>
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
            </td>
          </tr>
          <tr>
            <td>
              Room
            </td>
            <td>
                <select name="room_menu" id="room_menu" >
                  <?php
                      
                      $query = mysql_query("SELECT * FROM room_t");
                      
                      while($row = mysql_fetch_assoc($query)){
                          echo "<option value='".$row['room_no']."' > ".$row['room_no'];
                      }
                  ?>
                </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
                <div align="center">
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="monday" id="day_menu_0">
                    Mon</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="tuesday" id="day_menu_1">
                    Tue</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="wednesday" id="day_menu_2">
                    Wed</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="wednesday" id="day_menu_3">
                    Thu</label>
                  <label class="checkbox inline">
                    <input type="checkbox" name="day_menu[]" value="friday" id="day_menu_4">
                    Fri</label>
                </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <select name="time_menu" id="time_menu" style="width:40%;">
                  <?php
                      $limit = count($start_times);
                      for($i=0;$i<100;$i++){
                          if($i!=0 && $i!=3 && $i!=6 ) ?>
                              <option value="<?php echo $i;?>"><?php echo $i;?></option>
                      <?php
                      }
                      
                  ?>
              </select>
            
              <select name="time_menu" id="time_menu" style="width:40%;">
                  <?php
                      $limit = count($start_times);
                      for($i=0;$i<100;$i++){
                          if($i!=0 && $i!=3 && $i!=6 ) ?>
                              <option value="<?php echo $i;?>"><?php echo $i;?></option>
                      <?php
                      }
                      
                  ?>
              </select>
            
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input class="btn"type="submit" id="submit" name="submit" value="ADD" />
            </td>
          </tr>
        </table>
        </form>
        </div>
          
        <!-- /widget-content -->
      </div>
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
				<div id="" class="">
					<table id="table">
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
                    
                    
                    <table width="100%" border="1" bordercolor="#FFFFFF" style="border-radius:20px;">
                        <colgroup>
							<col width="50"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
						</colgroup>
                        <thead><tr bgcolor="#006666" style="color:white">
                            <th width="100">TIME</th>
                            <?php
                            $day_count = count($day_array);
                            for($i=0;$i<$day_count;$i++){
                                echo "<th>".$day_array[$i]."</th>";
                            }
                            ?>
                        </tr></thead>
                    
                      <?php
                      // $i === time interval
                      // $j === sections
					  
                      for($i=0;$i<11;$i++){
                          echo "<tr bgcolor='#CEFFCE''>
                                    <td bgcolor='#EDEEFE'><h6>$start_times[$i]</h6></td>";
                          if($i==0){
                              echo "<td colspan='$day_count' bgcolor='#B0DAA9' align='center'> <h4 style='color:#2B6A2D'>FLAG CEREMONY</h4></td>";
                              continue;
                          } 
                           if($i==3){
                              echo "<td colspan='$day_count' bgcolor='#B0DAA9' align='center'> <h4 style='color:#2B6A2D;'>RECESS</h4></td>";
                              continue;
                          } 
                           if($i==6){
                              echo "<td colspan='$day_count' bgcolor='#B0DAA9' align='center'> <h4 style='color:#2B6A2D;'>LUNCH BREAK</h4></td>";
                              continue;
                          } 
                          for($j=0;$j<$day_count;$j++){
                              $loaded_day_ID = $day_array[$j];
                              $start = $start_times[$i].":00";
                              $end = $end_times[$i].":00";
                              //$q = mysql_query("SELECT * FROM load_t WHERE day='$loaded_day_ID' AND start_time<='$start' AND end_time>='$end' AND section_id='$section_id'");
                              if($j==3){
                                  //echo "<td bgcolor='".$cell_color."'>$subj_name<p style='font-size:10px;'>{$row['room_no']}<br>$prof_name</p>".$del_link.$update_link."</td>";
                                   echo "<td></td>";
							  }
                              else
                                  echo "<td>&nbsp;</td>";
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
		$('#this').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 10		});
	} );
</script>
</html>
