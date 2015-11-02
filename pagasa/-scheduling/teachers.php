<!DOCTYPE html>
<?php 
 @session_start();
 
include "actions/subject_functions.php";

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
                <li class="active"> <a href="teachers.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teachers</span> </a> </li>
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
      
      
      <div class="widget stacked widget-table action-table ">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="40%"><i class="icon-ambulance"></i> Availble Employees</th>
                <th> Teachers</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="font-weight:normal" >
              <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="" id="unloaded" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>ADD</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					require_once "../db/db.php";
					$query = mysql_query("SELECT * FROM employee_t") or die(mysql_error());
					$i=0;
					while($row = mysql_fetch_assoc($query)){
					?>
                    <tr class="<?php echo ($i%2==0)? "even":"odd";?>">
                      <td><?php echo $row['emp_id'];?></td>
                      <td><?php echo $row['f_name']." ".$row['l_name'];?></td>
                      <td class="center">
                      <?php
					      $query_check = mysql_query("SELECT * FROM teacher_t WHERE emp_id='{$row['emp_id']}' AND teacher_status<>0") or die(mysql_error());
						  if(mysql_num_rows($query_check)==0){
					  ?>
                      <a class="btn btn-mini" href="#addTeacher" data-toggle="modal" onClick="fillAddForm(<?php echo $row['emp_id'];?>)" ><i class="icon-plus-sign"></i> ADD</a>
                      <?php
						  }
						  else{
                      ?>
                      <a disabled=disabled class="btn btn-mini disabled"> <i class="icon-check"></i> ADD</a>
                      <?php
						  }
						  
                      ?>
					  </td>
                    </tr>
                    <?php 
					} 
					?>
                    
                  </tbody>
                  
                </table>
              </div>
                </th>
                <th style="background-color:#F0F0F0; font-weight:normal">
              <div id="demo">
                <table cellpadding="0" cellspacing="0" border="0" class="" id="loaded" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <!--<th>Position</th>-->
                      <th>Max Load</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
					include "actions/teacher_functions.php";
                    require_once "../db/db.php";
				    $query = mysql_query("SELECT * FROM teacher_t WHERE teacher_status=1") or die(mysql_error());
					while($row = mysql_fetch_assoc($query)){
					    $emp_query = mysql_query("SELECT * FROM employee_t WHERE emp_id='{$row['emp_id']}'") or die(mysql_error());
					    $emp_row = mysql_fetch_assoc($emp_query);
					?>
                    <tr class="odd">
                      <td><?php echo $row['emp_id'];?></td>
                      <td><?php echo $emp_row['f_name']." ".$emp_row['l_name']; ?></td>
                      <!--<td><?php ?></td>-->
                      <td class="center"> <?php echo $row['max_load'];?></td>
                      <td class="center">
					  <?php //echo $row['max_load'];
						  $time = unit_to_time($row['max_load']);
						  $time = round($time*4)/4;
						  $whole1 = (int) $time;
						  $frac1 = (($time*100)%100)*.6;
						  printf("%02d:%02d", $whole1, $frac1);
	
					  ?>
                      </td>
                      <td class="center">
                        <a class="btn btn-mini" href="actions/teacher_del.php?emp_id=<?php echo $row['emp_id'];?>"><i class=" icon-remove"></i> DELETE</a>
                        <a class="btn btn-mini" href="#editTeacher" onClick="fillEditForm(<?php echo $row['emp_id']?>)" data-toggle="modal"><i class="icon-cog"></i> EDIT</a>
                      </td>
                    </tr>
                    <?php
					}
					?>
                  </tbody>
                  
                </table>
                <p>&nbsp;</p>
              </div>
                   
                </th>
              </tr>
              <tr>
                <th colspan="2">
                  <a class="btn pull-right" href="#addTeacher" data-toggle="modal" onClick="enableTeacher()"><i class="icon-plus-sign-alt"></i>  ADD TEACHER</a>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /widget-content -->
      </div>
      <!-- /wudget -->
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

<div class="modal fade hide" id="addTeacher">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Add Teacher</h3>
  </div>
  <div class="modal-body">
                            <form class="form-horizontal" name="add_teacher_form" id="add_teacher_form" action="teacher_add.php" method="post" style="max-height:400px;">
                              <fieldset>
                              <input type="hidden" id="emp_id" name="emp_id" value="" /> 
                              <table class="container-" style="margin-top:10px; width:auto" border="0" bordercolor="#000" >
                    
                                
                                <tr>
                                  <td>
                                  <div class="control-group" >
						              <label class="control-label" for="employee">EMPLOYEE </label>
						    		  <div class="controls" >
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "<select name='employee' id='employee' >";
                                        $query = mysql_query("SELECT * FROM employee_t WHERE emp_id NOT IN (SELECT emp_id FROM teacher_t WHERE teacher_status<>0)") or die(mysql_error());
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['emp_id']."'>".$row['f_name']." ".$row['l_name']."</option>";
                                        }
                                        echo "</select>";
                                        
                                        
                                        
                                        //echo $lvl_name;
                                        
                                    ?>
                                      </div>
                                  </div>  
                                  </td>
                                </tr>
                                <tr>
                                  <td >
                                  <div class="control-group" >
						              <label class="control-label" for="max_load">MAX LOAD </label>
						    		  <div class="controls" >
                                        <input type="text" name="max_load" id="max_load" />
                                      </div>
                                  </div>
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




<div class="modal fade hide" id="editTeacher">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Edit Teacher</h3>
  </div>
  <div class="modal-body">
                            <form class="form-horizontal" name="edit_teacher_form" id="edit_teacher_form" action="teacher_edit.php" method="post" style="max-height:400px;">
                              <fieldset>
                              <input type="hidden" id="e_emp_id" name="e_emp_id" value="" />  
                              <table class="" style="margin-top:10px; width:auto" border="0" bordercolor="#000" >
                    
                                
                                <tr>
                                  <td>
                                  <div class="control-group" >
                                  	  <label class="control-label" for="e_employee">EMPLOYEE </label>
						    		  <div class="controls" >
                                    <?php
									
                                        require_once "../db/db.php";
                                        
                                        echo "<select name='e_employee' id='e_employee' disabled=disabled>";
                                        $query = mysql_query("SELECT * FROM employee_t WHERE emp_id ") or die(mysql_error());
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['emp_id']."'>".$row['f_name']." ".$row['l_name']."</option>";
                                        }
                                        echo "</select>";
                                        
                                        
                                        
                                        //echo $lvl_name;
                                    
                                    ?>
                                      </div>
                                  </div>  
                                  </td>
                                </tr>
                                <tr>
                                  <td >
                                  <div class="control-group" >
                                  	  <label class="control-label" for="e_max_load" >MAX LOAD </label>
						    		  <div class="controls" >
                                        <input type="text" name="e_max_load" id="e_max_load" value="" />
                                      </div>
                                  </div>
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

<script type="text/javascript">
    function fillEditForm(id){
	    var array
		$.ajax({
			type: "GET",
		    url: "ajax/load_teacher.php",
			data: {emp_id: id},
			async: false,
			success: function(data){
				//alert(data);
				array = jQuery.parseJSON(data);
				
			}
		});
		//alert(array['section_name']);
		$("#e_emp_id").val(id);
		$("#e_employee").val(id);
		$("#e_max_load").val(array['max_load']);

    }
	function fillAddForm(id){
	    var array
		$.ajax({
			type: "GET",
		    url: "ajax/load_teacher.php",
			data: {emp_id: id},
			async: false,
			success: function(data){
				//alert(data);
				array = jQuery.parseJSON(data);
				
			}
		});
		//alert(array['section_name']);
		$("#emp_id").val(id);
		$("#employee").val(id);
		$("#employee").attr("disabled", "disabled");
		$("#max_load").val(array['max_load']);

    }
	function enableTeacher(id){
	   
		$("#employee").removeAttr("disabled");
		

    }

</script>


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
		$('#unloaded').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			"sScrollY": "200px",		});
	} );
</script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#loaded').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			"sScrollY": "200px",
					});
	} );
</script>

<script src="js/jquery.validate.js"></script>
<script src="js/teacher_validation.js"></script>

<script src="js/teacher_validation_e.js"></script>

</html>
