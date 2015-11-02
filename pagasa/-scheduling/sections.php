<!DOCTYPE html>
<?php 
 @session_start();

require "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/section_functions.php";
include "actions/class_functions.php";
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
                <li class="active"> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
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
                <th width="80%"><i class="icon-ambulance"></i> Sections</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="background-color:#FFF; font-weight: normal;" >
                    <div class="tabbable" style=" min-height:400px;">
                    <ul class="nav nav-tabs ">
                      <?php
					  include_once "../db/db.php";
					  $query = mysql_query("SELECT * FROM year_level_t")or die(mysql_error()) ;
                      $i=0;
					  $j=0;
					  while($row = mysql_fetch_assoc($query)){
						  $year_level_tabs[] = $row['lvl_id'];
					  ?>
					  <li class="<?php echo ($i==0)? "active":""; $i=1; ?>">
                        <a href="#<?php echo $row['lvl_id'];?>" data-toggle="tab"><?php echo $row['lvl_name'];?></a>
                      </li>
                      <?php } ?>
					</ul>
                    
                    <br />
                    
                        <div class="tab-content">
                        <?php foreach($year_level_tabs as $lvl){?>
                            <div class="tab-pane <?php echo ($j==0)? "active":""; $j=1; ?>" id="<?php echo $lvl;?>">
                              <div id="demo" style="min-height:100px;">
                                
                                
                                <table cellpadding="0" cellspacing="0" border="0" class=" table-bordered table-striped" id="tab<?php echo $lvl;?>" width="100%">
                                    <thead>
                                        <tr>
                                            <th align="center">Sectino no</th>
                                            <th>Section name</th>
                                            <th>Section Size</th>
                                            <th style=" font-size:10px">Current # of Students</th>
                                            <th>Curriculum</th>
                                            <th>Edit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody >
                    
                                     <?php 				     
										include('../db/db.php');
										$query = mysql_query("SELECT * FROM section_t WHERE year_level='{$lvl}'");
										
										
										while($row = mysql_fetch_assoc($query)){
										$section_id=$row['section_id']; ?>
										
										<?php
										$yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row['year_level']}'");
										$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);
										?>
										
										<tr class=" odd del<?php echo $section_id; ?>">
										  <td><?php echo $row['section_no'];?></td>
										  <td><?php echo $row['section_name']; ?></td>
										  <td><?php echo $row['section_size'];?></td>
                                          <td><?php echo section_students($section_id, get_active_sy()) ;?></td>
										  <td><?php echo $row['curriculum_code'];?></td>
										  <td align="center">
                                             <!--<a class='btn btn-mini' href='section_edit.php?section_id=<?php echo $section_id;?>'> EDIT </a>-->
                                             <a class='btn btn-mini' onClick="fillEditForm(<?php echo $section_id?>)" data-toggle="modal" href='#editSection'> <i class="icon-cog" ></i> EDIT </a>
                                          </td>

										</tr>
										
									<?php }?>
                                    	
                                    </tbody>
                                    
                                </table>

                                
                                <p>&nbsp;</p>
                              </div>
                            </div>
                        <?php }?>
                            
                            
                        </div>
                      
                      
                    </div>
                    <!-- /tabbable -->
                
           <div id="demo" style="min-height:400px;" class="hide">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                        <th>Section name</th>
                        <th align="center">Sectino no</th>
                        <th>year Level</th>
                        <th>Curriculum</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 				     
					include('../db/db.php');
					$query = mysql_query("SELECT * FROM section_t ");
					
					
					while($row = mysql_fetch_assoc($query)){
					$section_id=$row['section_id']; ?>
                    
                    <?php
                    $yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row['year_level']}'");
					$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);
					?>
                    
                    <tr class=" odd del<?php echo $section_id; ?>">
                      <td><?php echo $row['section_name']; ?></td>
                      <td><?php echo $row['section_no'];?></td>
                      <td><?php echo $yr_lvl_data['lvl_name'];?></td>
                      <td><?php echo $row['curriculum_code'];?></td>
                      <td align="center">
                         <!--<a class='btn btn-mini' href='section_edit.php?section_id=<?php echo $section_id;?>'> EDIT </a>-->
                         <a class='btn btn-mini' onClick="fillEditForm(<?php echo $section_id?>)" data-toggle="modal" href='#editSection'> <i class="icon-cog" ></i> EDIT </a>
                      </td>
                      
                    </tr>
                    
                <?php }?>
                </tbody>
		</table>
            
          </div>
          <!--/demo-->
                </th>
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" href="sections.php"><i class=" icon-th"></i>   Vieiw Section</a>
                  <a class="btn btn-block"  href="report_list_section.php"><i class=" icon-columns"></i>   View Reports</a>
                  <a class="btn btn-block" data-toggle="modal" href="#addSection"><i class=" icon-plus-sign-alt"></i>   Add Section</a>

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
     
<div class="modal fade hide" id="addSection">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Add Section</h3>
  </div>
  <div class="modal-body">
      
        <form name="add_form" id="add-form" action="section_add.php"  class="form-horizontal" method="post" style=" max-height:400px;" />
                <fieldset>
                <table class="" style="width:auto;margin-top:20px;" >
                    
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="year_level">YEAR LEVEL </label>
						    <div class="controls">
                            <select name='year_level' id="year_level">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM year_level_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php //echo ($row['lvl_id']==$year_level)?"selected":"" ?> value="<?php echo $row['lvl_id']?>"><?php echo $row['lvl_name'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr class="hide">
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="curriulum">CURRICULUM </label>
						    <div class="controls">
                            <select name='curriculum' id="curriculum">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM curriculum_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php echo ($row['curriculum_code']==$curriculum_code)?"selected":"" ?> value="<?php echo $row['curriculum_code']?>"><?php echo $row['curriculum_code'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="section_no">SECTION NO. </label>
                            <div class="controls">
                                <input type="text" name="section_no" id="section_no" value="<?php //echo $section_no;?>" />
                            </div>
                        </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="section_name">SECTION NAME </label>
						    <div class="controls">
                                <input type="text" name="section_name" id="section_name" value="<?php //echo $section_name;?>">
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="class_adviser">CLASS ADVISER </label>
						    <div class="controls">
                        <select  name="class_adviser" id="class_adviser">
                        <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM teacher_t");
								while($row = mysql_fetch_assoc($query)){
									$emp_query = mysql_query("SELECT * FROM employee_t WHERE emp_id = {$row['emp_id']}");
									$emp_row = mysql_fetch_assoc($emp_query);
									echo    "<option value='".$row['emp_id']."'>".$emp_row['l_name'].", ".$emp_row['f_name']."</option>";
								}
								
							?>
                        </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                        <div class="control-group">
                              <label class="control-label" for="section_size">SECTION SIZE </label>
						      <div class="controls">
                              <input type="text" name="section_size" id="section_size" value="30"  />
                              </div>
                        </div>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </table>
                
      
      
      
   
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <input class="btn btn-success " type="submit" value="ADD" name="add" id="add">
  </div>
    </fieldset>
    </form>
</div>





<div class="modal fade hide" id="editSection">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Edit Section</h3>
  </div>
  <div class="modal-body">
      
            <form name="edit_form" id="edit_form" action="section_edit.php"  class=" form-horizontal" method="post" style="max-height:400px;">
                <input type="hidden" name="section_id" id="section_id" value="" />
                <table class="" style="width:auto;margin-top:20px;" >
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_year_level">YEAR LEVEL </label>
                            <div class="controls">
                            <select name='e_year_level' id="e_year_level">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM year_level_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option  value="<?php echo $row['lvl_id']?>"><?php echo $row['lvl_name'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr class="hide">
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_curriculum">CURRICULUM </label>
                            <div class="controls">
                            <select name='e_curriculum' id="e_curriculum">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM curriculum_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php echo ($row['curriculum_code']==$curriculum_code)?"selected":"" ?> value="<?php echo $row['curriculum_code']?>"><?php echo $row['curriculum_code'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_section_no">SECTION NO. </label>
                            <div class="controls">
                            <input type="text" name="e_section_no" id="e_section_no" value="<?php echo $section_no;?>">
                            </div>
                        </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_section_name">SECTION NAME </label>
                            <div class="controls">
                            <input type="text" name="e_section_name" id="e_section_name" value="<?php echo $section_name;?>">
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_class_adviser">CLASS ADVISER </label>
                            <div class="controls">
                        <select  name="e_class_adviser" id="e_class_adviser">
                        <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM teacher_t");
								while($row = mysql_fetch_assoc($query)){
									$emp_query = mysql_query("SELECT * FROM employee_t WHERE emp_id = {$row['emp_id']}");
									$emp_row = mysql_fetch_assoc($emp_query);
									echo    "<option value='".$row['emp_id']."'>".$emp_row['l_name'].", ".$emp_row['f_name']."</option>";
								}
								
							?>
                        </select>
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class="control-group">
                            <label class="control-label" for="e_section_size">SECTION SIZE </label>
                            <div class="controls">
                            <input type="text" name="e_section_size" id="e_section_size" value="30"  />
                            </div>
                        </div>
                        </td>

                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    
                </table>
                                  
   
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <input class="btn " type="submit" value="UPDATE" name="update" id="update">
  </div>
    </form>
</div>

<script type="text/javascript">
    
    function fillEditForm(id){
		var array
		$.ajax({
			type: "GET",
		    url: "ajax/load_section.php",
			data: {section_id: id},
			async: false,
			success: function(data){
				//alert(data);
				array = jQuery.parseJSON(data);
				
			}
		});
		//alert(array['section_name']);
		$("#section_id").val(id);
		$("#e_class_adviser").val(array['class_adviser']);
		$("#e_section_name").val(array['section_name']);
		$("#e_section_no").val(array['section_no']);
		$("#e_section_size").val(array['section_size']);
		$("#e_year_level").val(array['year_level']);

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
<script src="js/jquery.validate.js"></script>
<script src="js/section_validation.js"></script>

<script src="js/section_validation_e.js"></script>

<?php foreach($year_level_tabs as $lvl){ ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tab<?php echo $lvl;?>').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 10,		});
	} );
</script>
<?php } ?>
</html>
