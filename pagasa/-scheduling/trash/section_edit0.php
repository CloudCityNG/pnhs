<!DOCTYPE html>
<?php 
 @session_start();
 
require_once "../db/db.php";
include "actions/section_functions.php";


if(isset($_GET['section_id'])){
$get_section_id = $_GET['section_id'];	
}

if(isset($_POST['update'])){
    $section_no = $_POST['section_no'];
	$year_level = $_POST['year_level'];
	$section_name = $_POST['section_name'];
	//$class_adviser = $_POST['class_adviser'];
	//$curriculum_code = $_POST['curriculum'];
	$curriculum_code = ($section_no==1)? "SEC":"K12";//$_POST['curriculum'];
	$class_size	 = $_POST['section_size'];
	$section_id=$year_level*100+$section_no;
	$msg = NULL;
	if(is_numeric($section_no)){
	    if($section_name){
		    if($class_size){
				$query = mysql_query("SELECT * FROM section_t WHERE section_name='$section_name' AND section_id <> $get_section_id") ;
				if(mysql_num_rows($query)==0){
					$query2 = mysql_query("SELECT * FROM section_t WHERE section_no='$section_no' AND curriculum_code='$curriculum_code' AND year_level='$year_level' AND section_id <> '$get_section_id'");
					if(mysql_num_rows($query2)==0){
						mysql_query("UPDATE section_t SET 
										section_no='$section_no',
										section_name='$section_name',
										year_level='$year_level',
										section_size='$class_size'
										WHERE section_id={$get_section_id}") or die();
						header("Location: sections.php");
					}
					else{
					    $msg = "Section number already taken.";	
					}
					
				}
				else{
				    $msg = "Name already taken.";	
				}
			}
			else{
				$msg = "Please enter a class size.";	
			}
		}
		else{
			$msg = "Please enter a section name.";	
		}
	}
	else{
		$msg = "Section number should be an integer.";	
	}
}
else if($_GET['section_id']){
	$get_section_id = $_GET['section_id'];
	$query = mysql_query("SELECT * FROM section_t WHERE section_id='{$get_section_id}'");
	$row = mysql_fetch_assoc($query);
	$section_no = $row['section_no'];
	$year_level = $row['year_level'];
	$section_name = $row['section_name'];
	//$class_adviser = $row['emp_id'];
	$class_size	 = $row['section_size'];
	$section_id = $get_section_id;
	$curriculum_code = $row['curriculum_code'];
}
else{
	$section_no = "";
	$year_level = "";
	$section_name = "";
	//$class_adviser = $_POST['class_adviser'];
	$class_size	 = "";
	$curriculum_code = "";
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
                <li class="active"> <a href="sections.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Sections</span> </a> </li>
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
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
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
    <div class="widget stacked widget-table action-table">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-ambulance"></i> EDIT SECTION</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                    <?php if(isset($msg)){?>
                    <div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Warning!</strong> <?php echo "$msg";?>
                    </div>
                    <?php }?>
            <form name="add_section_form" action=""  class="form-horizontal" method="post" style="min-height:400px;">
                <table class="container" style="width:auto;margin-top:50px;" >
                    <tr>
                        <td> Year Level :</td>
                        <td>
                            <select name='year_level' id="year_level">
						    <?php
								require_once "../db/db.php";
								$query = mysql_query("SELECT * FROM year_level_t");
								while($row = mysql_fetch_assoc($query)){ ?>
									<option <?php echo ($row['lvl_id']==$year_level)?"selected":"" ?> value="<?php echo $row['lvl_id']?>"><?php echo $row['lvl_name'] ?></option>;
								<?php 
								}
								
							?>
                            </select>
                        </td>
                    </tr>
                    <tr class="hide">
                        <td> Curriculum :</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td> Section no :</td>
                        <td><input type="text" name="section_no" id="section_no" value="<?php echo $section_no;?>"></td>
                    </tr>
                    
                    <tr>
                        <td> Section Name :</td>
                        <td><input type="text" name="section_name" id="section_name" value="<?php echo $section_name;?>"></td>
                    </tr>
                    <tr>
                        <td> Class Adviser :</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td> Section Size :</td>
                        <td><input type="text" name="section_size" id="section_size" value="30"  /></td>

                    </tr>
                    <tr></tr>
                    <tr>
                        <td></td>
                        <td><div align=""><input class="btn " type="submit" value="UPDATE" name="update" id="update"></div></td>
                    </tr>
                    
                </table>
            </form>
                </th>
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" href="sections.php"><i class=" icon-th"></i>   Vieiw Section</a>
                  <a class="btn btn-block" href="section_add.php"><i class="icon-plus"></i>   Add Section</a>
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
<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Applicaftion.js"></script>
<script src="js/section_validation.js"></script>

</html>
