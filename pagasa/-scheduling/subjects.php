<!DOCTYPE html>
<?php 
 @session_start();





require "actions/sched_functions.php";
include "actions/subject_functions.php";

$errormsg = NULL;
if(isset($_POST['subject_title'])){
	$subject_title = $_POST['subject_title'];
	$subject_unit = $_POST['subject_unit'];
	
	$category = $_POST['category'];
	$lvl_id = $_POST['subject_yr'];
	
	$q_curr = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$lvl_id}'") or die("$lvl_id");
	$r_curr = mysql_fetch_assoc($q_curr);
	$curriculum = $r_curr['curriculum_code'];
	
    if($subject_title){
        if($subject_unit){
			if(is_category_unique($category, $lvl_id, NULL)){
				if(true){  //is_unit_maxed($lvl_id, 0, $subject_unit)
					//$subject_unit = $_POST['subject_unit'];
		
					mysql_query("INSERT INTO subject_t VALUES('','$subject_title','$subject_unit','$lvl_id','$category','1','$curriculum')") or die("sala");
					mysql_query("COMMIT;");
					//header("location: subjects.php?curriculum_code={$get_curriculum_code}");
				    $errormsg = "SUCCESS!";
				}
				else{
				    $errormsg = "Units for the year level is maxed out.";
			    }
			}
			else{
				$errormsg = "There is only one available subject for each category per yearl level";
			}
		}
		else{
			$errormsg = "Please enter the subject's credit unit.";
		}
	}
	else{
		$errormsg = "Please enter a title for the subject.";
	}
}
else{
	$subject_title = "";
	$subject_unit = "";
	
	$curriculum = "";
	$category = "";
	$yr_lvl = "";
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
                <li> <a href="schedules.php"> <i class="icon-calendar"></i> <span>Schedules</span> </a> </li>
			    <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
	   	        <?php } ?>
				<?php if($developer || $scheduling_admin){ ?>
                <li class="active"> <a href="subjects.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Subjects</span> </a> </li>
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
                <th width="80%"><i class="icon-ambulance"></i> Subjects</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="background-color:#FFF; font-weight: normal;">
                    <div class="tabbable">
                    <ul class="nav nav-tabs">
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
                              <?php
								$total_units = get_total_units($lvl);
								$total_time = print_time($total_units);
								//echo "Total Units: ".$total_units." / ".$total_time." hrs";
						      ?>
                              <div id="demo" style="min-height:300px;">
                                <table cellpadding="0" cellspacing="0" border="0" class=" " id="tab<?php echo $lvl;?>" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Subject Title</th>
                                            <th>Units</th>
                                            <th>Time</th>
                                            <th>Category</th>
                                            <th>Curriculum</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    
                                     <?php 				     
                                        include_once "../db/db.php";
                                        $query = mysql_query("SELECT * FROM subject_t WHERE year_level='$lvl'");
                                        $total_unit=0;
                                        while($row = mysql_fetch_assoc($query)){
                                        $code=$row['subject_code'];  ?>
                                        
                                        <tr class="del<?php echo $code; ?>">
                                          <td><?php echo $row['subject_code']; ?></td>
                                          <td><?php echo $row['subject_title'];?></td>
                                          <td><?php echo $row['credit_unit'];?></td>
                                          <td>
                                          <?php
										      $total_unit += $row['credit_unit'];
											  $time = unit_to_time($row['credit_unit']);
											  $time = round($time*4)/4;
											  $whole1 = (int) $time;
											  $frac1 = (($time*100)%100)*.6;
											  printf("%02d:%02d", $whole1, $frac1);
									      ?>
                                          </td>
                                          <td>
										    <?php $category_id=$row['category_id'];
										      $query2 = mysql_query("SELECT * FROM subject_category_t WHERE category_id={$category_id}"); 
										      $row2 = mysql_fetch_assoc($query2);
										      echo $row2['category_name'];
											?>
                                          </td>
                                          <td><?php echo $row['curriculum_code'];?></td>
                                          <td align="center">      
                                              <script type="text/javascript">
                                                 jQuery(document).ready(function() {
                                                    $('#p<?php echo $code; ?>').popover('show')
                                                    $('#p<?php echo $code; ?>').popover('hide')
                                                 });
                                              </script>
                                                    
                                            <!--<a class="btn btn-mini" href='subject_edit.php?subject_code=<?php echo $code;?>'> Edit</a> -->
                                            <a class="btn btn-mini" onClick="fillEditForm(<?php echo $code;?>)" data-toggle="modal" href="#editSubject"><i class="icon-cog"></i>   EDIT</a>

                                          </td>                            
                                        </tr>
                                        
                                    <?php }?>
                                        <tfoot>
                                        <tr class="even">
                                          <td colspan="2">
                                            <div class="pull-right">Total: </div>
                                          </td>
                                          <td><?php echo $total_units;?></td>
                                          <td><?php echo $total_time;?></td>
                                          <td colspan="3">
                                          </td>
                                        </tr>
                                        </tfoot>
                                    </tbody>
                                </table>
                                
                                <?php 
								  //echo "Total Units: ".$total_unit."<br />";
								  $time = unit_to_time($total_unit);
								  $time = round($time*4)/4;
								  $whole1 = (int) $time;
								  $frac1 = (($time*100)%100)*.6;
								 // printf("Total Tims: %02d:%02d", $whole1, $frac1);
								?>
                              </div>
                            </div>
                        <?php }?>
                            
                            
                        </div>
                      
                      
                    </div>
                    <!-- /tabbable -->
                </th>
                <th style="background-color:#F0F0F0">
                  
                  <a class="btn btn-block" href="subjects.php?view=all"><i class=" icon-th"></i> View Subjects</a>
                  <!--<a class="btn btn-block" href="subject_add.php"><i class="icon-plus"></i>   Add Subjects</a>-->
                  <a class="btn btn-block" href="report_list_subject.php"><i class=" icon-book"></i>  View Reports</a>
                  <a class="btn btn-block" data-toggle="modal" href="#add_subject"><i class="icon-plus"></i>   Add Subjects</a>

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
    <h3>Add Subject</h3>
  </div>
  <div class="modal-body">
                            <form class="form-horizontal" name="add_subject-form" id="add_subject_form" action="subject_add.php" method="post" style="max-height:400px;">
                              <fieldset>
                                
                              <table class="" style="margin-top:50px; width:auto" border="0" bordercolor="#000" >
                    
                                <tr >
                                  <td>
                                  <div class="control-group">
                                      <label class="control-label" for="subject_title">SUBJECT TITLE </label>
						    		  <div class="controls">
                                      <input type="text" name="subject_title" id="subject_title" value="<?php echo "$subject_title";?>" placeholder="Subject Title">
                                      </div>
                                      <!--
                                      <span for="subject_title" generated="false" class="error" style="display: inline;">Please enter at least 4 characters.</span>
                                      -->
                                  </div>
                                  </td>
                                  
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
                                      <label class="control-label" for="subject_unit">CREDIT UNIT </label>
						    		  <div class="controls" >
                                      <input type="text" name="subject_unit" id="subject_unit" value="<?php echo "$subject_unit";?>" placeholder="Credit Units">
                                      </div>
                                  </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="subject_yr">YEAR ASSIGNMENT </label>
						    		  <div class="controls" >
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "<select name='subject_yr' id='subject_yr' >";
                                        $query = mysql_query("SELECT * FROM year_level_t");
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['lvl_id']."'>".$row['curriculum_code']." : ".$row['lvl_name']."</option>";
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
						    		  <label class="control-label" for="curriculum">CURRICULUM </label>
						    		  <div class="controls" >
                                    <select name='curriculum' id="curriculum" >
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "";
                                        $query = mysql_query("SELECT * FROM curriculum_t ORDER BY curriculum_code");
                                        while($row = mysql_fetch_assoc($query)){ ?>
                                           <option value='<?php echo $row['curriculum_code']?>'><?php echo  $row['title']?></option>
                                        
                                     <?php    
                                        }
                                        echo "";
                                    
                                    ?>
                                    </select>
                                      </div>
                                  </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="subject_category_t">SUJECT CATEGORY </label>
						    		  <div class="controls" >
                                    <select name="category" id="category">
                                    <?php
                                        require_once "../db/db.php";
                                        $query = mysql_query("SELECT * FROM subject_category_t");
                                        while($row = mysql_fetch_assoc($query)){ ?>
                                            <option <?php echo ($row['category_id']==$category)?"selected":"";?> value='<?php echo $row['category_id'];?>'><?php echo $row['category_name']?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
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






<div class="modal fade hide" id="editSubject">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Esir Subject</h3>
  </div>
  <div class="modal-body">
<form class="form-horizontal" name="edit_subject_form" id="edit_subject_form" action="subject_edit.php" method="post" style="max-height:400px;">
                              <fieldset>
                              <input type="hidden" value="" name="subject_code" id="subject_code" />
                              <table class="" style="margin-top:50px; width:auto" border="0" bordercolor="#000" >
                    
                                <tr >
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="e_subject_title">SUBJECT TITLE </label>
						    		  <div class="controls" >
                                      <input type="text" name="e_subject_title" id="e_subject_title" value="<?php echo "$subject_title";?>" placeholder="Subject Title">
                                      </div>
                                  </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="e_subject_unit">CREDIT UNITS </label>
						    		  <div class="controls" >
                                      <input type="text" name="e_subject_unit" id="e_subject_unit" value="<?php echo "$subject_unit";?>" placeholder="Credit Units">
                                      </div>
                                  </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="e_subject_yr">YEAR ASSIGNMENT </label>
						    		  <div class="controls" >
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "<select name='e_subject_yr' id='e_subject_yr' >";
                                        $query = mysql_query("SELECT * FROM year_level_t");
                                        while($row = mysql_fetch_assoc($query)){
                                            echo    "<option value='".$row['lvl_id']."'>".$row['curriculum_code']." : ".$row['lvl_name']."</option>";
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
						    		  <label class="control-label" for="e_curriculum">CURRICULUM </label>
						    		  <div class="controls" >
                                    <select name='e_curriculum' id='e_curriculum' >
                                    <?php
                                        require_once "../db/db.php";
                                        
                                        echo "";
                                        $query = mysql_query("SELECT * FROM curriculum_t ORDER BY curriculum_code");
                                        while($row = mysql_fetch_assoc($query)){ ?>
                                           <option value='<?php echo $row['curriculum_code']?>'><?php echo  $row['title']?></option>
                                        
                                     <?php    
                                        }
                                        echo "";
                                    
                                    ?>
                                    </select>
                                      </div>
                                  </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                  <div class="control-group" >
						    		  <label class="control-label" for="e_category">SUBJECT CATEGORY </label>
						    		  <div class="controls" >
                                      <select name="e_category" id="e_category">
                                    <?php
                                        require_once "../db/db.php";
                                        $query = mysql_query("SELECT * FROM subject_category_t GROUP BY category_name");
                                        while($row = mysql_fetch_assoc($query)){ ?>
                                            <option <?php echo ($row['category_id']==$category)?"selected":"";?> value='<?php echo $row['category_id'];?>'><?php echo $row['category_name']?></option>
                                        <?php
                                        }
                                    ?>
                                      </select>
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
                                <input class="btn btn-success" type="submit" name="update" id="update" value="UPDATE" >

                              </fieldset>
                            </form>

  </div>
</div>



<script type="text/javascript">
    
    function fillEditForm(code){
		var array
		$.ajax({
			type: "GET",
		    url: "ajax/load_subject.php",
			data: {subject_code: code},
			async: false,
			success: function(data){
				//alert(data);
				array = jQuery.parseJSON(data);
				
			}
		});
		//alert(array['section_name']);
		$("#subject_code").val(code);
		$("#e_subject_title").val(array['subject_title']);
		$("#e_subject_unit").val(array['credit_unit']);
		$("#e_subject_yr").val(array['year_level']);
		$("#e_curriculum").val(array['curriculum_code']);
		$("#e_category").val(array['category_id']);
		
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

<script src="js/subject_validation.js"></script>
<script src="js/subject_validation_e.js"></script>


<?php foreach($year_level_tabs as $lvl){ ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tab<?php echo $lvl;?>').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': -1,		});
	} );
</script>
<?php } ?>



</html>
