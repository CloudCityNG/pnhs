<!DOCTYPE html>
<?php 
 @session_start();
 


include "../db/db.php";


$msg = NULL;
if(isset($_POST['add'])){
	$room_no = $_POST['room_no'];
    $section_assigned = $_POST['section_assigned'];

    if(is_numeric($room_no)){
		$query = mysql_query("SELECT * FROM class_room_t WHERE room_no='$room_no' ");
		if(mysql_num_rows($query)<1){
			$query2 = mysql_query("SELECT * FROM class_room_t WHERE section_assigned={$section_assigned}");
			if(mysql_fetch_assoc($query2)<1){
				mysql_query("START TRANSACTION");
				//mysql_query("UPDATE room_t SET room_no='$room_no', section_assigned='$section_assigned' WHERE room_no='$old_room_no'") or die("error in updating room. ");
				mysql_query("INSERT INTO class_room_t VALUES('$room_no', '$section_assigned')") or die("error in updating room. $room_no', '$section_assigned'");
	
				mysql_query("COMMIT;");
				$msg = "successfully inserted room.";
				//header("Location: rooms.php");
			}
			else
			    $msg = "Section is already assigned.";
		}
		else
			$msg = "Room number already exists.";
	}
	else
	    $msg = "Room number should be an integer.";
}
else if(isset($_GET['room_no'])){
	$old_room_no = $_GET['room_no'];
	$query = mysql_query("SELECT * FROM room_t WHERE room_no='$room_no'");
	$row = mysql_fetch_assoc($query);
	$section_assigned = $row['section_assigned'];

}
else{
	$room_no ="";
	$section_assigned="";
	
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
                <li class="active"> <a href="room.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Rooms</span> </a> </li>
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
                <th width="60%"><i class="icon-ambulance"></i> Rooms</th>
                <th> ADD ROOM</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style="background-color:#F0F0F0">
                  <div id="demo" style="min-height:400px;">
                    <table cellpadding="0" cellspacing="0" border="0" class=" " id="rooms" width="100%">
                      <thead>
                        <tr>
                          <th>Room No</th>
                          <th>Section</th>
   						  <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
						$query = mysql_query("SELECT * FROM class_room_t");
						while($row = mysql_fetch_assoc($query)){ ?>
                        <tr>
                          <td><?php echo $row['room_no'];?> </td>
                          <td>
                          <?php
                            $section_query = mysql_query("SELECT * FROM section_t WHERE section_id = {$row['section_assigned']}") or die("ype");
							$section_row = mysql_fetch_assoc($section_query);
							echo $section_row['section_name'];
						  ?>
                          </td>
                          <td><a class="btn btn-mini" href="room_edit.php?room_no=<?php echo $row['room_no'];?>">EDIT</a></td>
                        </tr>
                        <?php
						}
						?>
                      <tfoot class="hide">
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                        </tr>
                      </tfoot>
                    </table>
                    
                  </div>
                   
                </th>
                
                <th  >
                  <div id="error">
					<?php if(isset($msg)){?>
                    <?php if($msg=="successfully inserted room."){?>
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
        		<?php $query = mysql_query("SELECT * FROM section_t ") or die("error in section");?>
                <form name="update_room_form" class="form-horizontal" action="" method="post" style="min-height:400px;">
                    <table >
                        <tr>
                            <td> Room no :</td>
                            <td><input type="text" name="room_no" id="room_no" value="<?php echo $room_no;?>"></td>
                        </tr>
                        <tr>
                            <td> Section :</td>
                            <td><select  name="section_assigned" id="section_assigned">
                            		<option value="NULL">None</option>
                                    <?php while($row = mysql_fetch_assoc($query)){?>
                                    <option value="<?php echo $row['section_id']; ?>" <?php if($section_assigned==$row['section_id']) echo "selected"; ?>><?php echo $row['section_name'];?>
                                    <?php } ?>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td></td>
                            <td><div align=""><input class="btn " type="submit" value="ADD" name="add" id="add"></div></td>
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
		$('#rooms').dataTable({
		    "bJQueryUI": true,
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": false,
			'iDisplayLength': 10,		});
	} );
</script>

</html>
