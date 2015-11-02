<!DOCTYPE html>
<?php 
 @session_start();

require_once "../db/db.php";
 
if(isset($_GET['curriculum_code'])){
  $get_curriculum_code = $_GET['curriculum_code'];	
}


if(isset($_POST['submit'])){
    $category_name = $_POST['category_name'];
	
	if(true){
		if($category_name){
			if(true){
				$check = mysql_query("SELECT * FROM subject_category_t WHERE category_name = '$category_name'");
				//$check2 = mysql_query("SELECT * FROM year_level_t WHERE lvl_name = '$lvl_name'");
				if(mysql_num_rows($check)<1 ){
					$id = get_last_id();
					
					mysql_query("START TRANSACTION");
					mysql_query("INSERT INTO subject_category_t VALUES('$id','$category_name')") or die(mysql_error());
					mysql_query("COMMIT;");
					//header("location: curriculums.php");
					$errormsg = "Successfully added Category.";
			    }
				else
					$errormsg = "There is already an entry for that category name";
			}
			else
			    $errormsg = "Maximum Unit is expected to be an integer.";
		}
		else
		    $errormsg = "Please enter a category name.";
	}
	else
	    $errormsg = "Please enter a level for your curriculum.";
	
	
}
else{
	$category_name = "";
    
}
	

function get_last_id(){
    $query = mysql_query("SELECT * FROM subject_category_t ")or die(mysql_error());
	$num = 0;
	while($row = mysql_fetch_assoc($query)){
	   	$num = $row['category_id'];
	}
	return $num+1;
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
<link href="notification/styled-elements.css" rel="stylesheet" />
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
                <li> <a href="reports_section.php" > <i class="shortcut-icon icon-folder-open"></i> <span class="shortcut-label">Reports</span> </a> </li>
    			<?php } ?>
				<?php if($developer || $scheduling_admin || $super_admin){ ?>
                <li class="dropdown active"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span> Settings </span> <b class="caret"></b> </a>				
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
      <!-- /wudget -->
      
      
      <div class="widget stacked widget-table action-table ">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="65%"><i class="icon-ambulance"></i> Subject Category</th>
                <th> ADD CATEGORY</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="background-color:#F0F0F0">
                  
          <div id="demo" style="min-height:400px;">
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="category" width="100%">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody >

                 <?php 				     
				    include_once "../db/db.php";
					$query = mysql_query("SELECT * FROM subject_category_t");
					
				    while($row = mysql_fetch_assoc($query)){
					$category_id=$row['category_id'];  ?>
                    
                    <tr class="del<?php echo $category_id; ?>">
                      <td><?php echo $row['category_name']; ?></td>
                      <td align="center">      
                          <script type="text/javascript">
                             jQuery(document).ready(function() {
                             	$('#p<?php echo $code; ?>').popover('show')
                                $('#p<?php echo $code; ?>').popover('hide')
                             });
                          </script>
                                
                        <a class="btn btn-mini" onClick="fillEditForm(<?php echo $category_id;?>)" href="#editCategory" data-toggle="modal" > Edit</a> 
                      </td>                            
                    </tr>
                    
                <?php }?>
                
                </tbody>
		    </table>
            
          </div>
                </th>
                <th >
                  <div id="error" class="hide">
					<?php if(isset($errormsg)){?>
                    <div class="alert alert-error">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>NOTICE:</strong> <?php echo "$errormsg";?>
                    </div>
                    <?php }?>
            
                  </div>
                  <div id="error">
					<?php if(isset($errormsg)){?>
                    <?php if($errormsg=="Successfully added Category."){?>
                    <div class="alert alert-error success-box">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>NOTICE:</strong> <?php echo "$errormsg";?>
                    </div>
                    <?php }else{?>
                    <div class="alert alert-error error-box">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>NOTICE:</strong> <?php echo "$errormsg";?>
                    </div>
                    <?php }?>
                    <?php }?>
            
                  </div>
                  
                     <form class="form-horizontal" name="add_category_form" id="add_category_form"  action="" method="post" style="min-height:300px;">
                        <table class="container" style="width:auto; margin-top:20px">
                          <tr>
                            <td>NAME </td>
                            <td><input  type="text" name="category_name" id="category_name" value="<?php echo $category_name;?>" placeholder="Name"> </td>
                          </tr>                          
                          <tr>
                            <td></td>
                            <td><div align="right"><input class="btn " type="submit" value="ADD" name="submit" id="submit"></div></td>
                          </tr>
                        </table>
                    </form>
                
                
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


<div class="modal fade hide" id="editCategory">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Add Category</h3>
  </div>
  <div class="modal-body">
                            <form class="form-horizontal" name="edit_category_form" id="edit_category_form" action="category_edit.php" method="post" style="max-height:400px;">
                              <fieldset>
                              <input type="hidden" name="category_id" id="category_id" value="">
                              <table class="container-" style="margin-top:10px; width:auto" border="0" bordercolor="#000" >
                    
                                
                                
                                  <td >
                                  <div class="control-group" >
						              <label class="control-label" for="e_category_name">CATEGORY NAME</label>
						    		  <div class="controls" >
                                        <input type="text" name="e_category_name" id="e_category_name" />
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
    
    function fillEditForm(id){
		var array;
		$.ajax({
			type: "GET",
		    url: "ajax/load_category.php",
			data: {category_id: id},
			async: false,
			success: function(data){
				//alert(data);
				array = jQuery.parseJSON(data);
				
			}
		});
		//alert(id);
		$("#category_id").val(id);
		$("#e_category_name").val(array['category_name']);
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
		$('#category').dataTable({
		    "bJQueryUI": true,
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": false,
			'iDisplayLength': 10,		});
	} );
</script>
<script src="js/jquery.validate.js"></script>

<script src="js/category_validation_e.js"></script>


</html>
