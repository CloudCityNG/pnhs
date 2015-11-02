<!DOCTYPE html>


<html lang="en">
<head>
  <meta charset="utf-8" />
  <!-- TemplateBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- TemplateEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
 	<link href="./js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="./js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="./js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	
     
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
    <link href="./js/plugins/cirque/cirque.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

      <link href="../css/pages/reports.css" rel="stylesheet" />


  <link href="../css/custom.css" rel="stylesheet" />
  <link href="../js/charts/pie.js" rel="stylesheet">

 <style>
    .chart-holder {
		height: 325px;
	}
	
	.cirque-stats {
		text-align: center;
	}
	
	.cirque-stats .cirque-container {	
		margin-top: 1.5em;
		margin-bottom: 1.5em;	
		margin-right: 2em;
		margin-left: 2em;
	}
	
	</style>


  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

  </style>
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		</style>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
			
			<a class="brand" href="../index.html">
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
							sis admin
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
	
		</div> 
		<!-- /container -->
		
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
			</a>

			<div class="subnav-collapse collapse">
			
			<!-- TemplateBeginEditable name="navbar" -->
			  <ul class="mainnav">
                <li class="active"> <a href="sis-admin-home.php"> <i class="icon-calendar"></i> <span>Home</span> </a> </li>
			    <li> <a href="sis-admin-students.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Students</span> </a> </li>
	   	        <li> <a href="sis-admin-alumni.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Alumni</span> </a> </li>
		        <li> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Clubs</span> </a> </li>
			    <li> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Offenses</span> </a> </li>
		      </ul>
		    <!-- TemplateEndEditable -->
            
            </div> <!-- /.subnav-collapse -->

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
	
	<!-- TemplateBeginEditable name="content" -->
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Dashboard</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Year Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT * FROM student_t WHERE student_type!='Alumni' OR student_type!='alumni' ORDER BY student_id");
					
                    
					while($row=mysql_fetch_assoc($query)){ 
					$id=$row['student_id'];
					
					$query2=mysql_query("SELECT * FROM registration_t WHERE student_id='$id'");
					$row2=mysql_fetch_assoc($query2);
					$yl=$row2['year_level'];
					
					$query3=mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$yl'");
					$row3=mysql_fetch_assoc($query3);
					
					 ?>
                    <tr class="del<?php echo $id ?>">
                      <td  align="center" width="100"><?php echo $row['student_id']; ?></td>
                      <td align="center"><?php echo ucfirst($row['f_name']); ?></td>
                      <td align="center"><?php echo ucfirst($row['l_name']); ?></td>
                      <td align="center"><?php echo ucfirst($row3['lvl_name']); ?></td>
                      
                      <td align="center" width="400">      
                          <script type="text/javascript">
                             jQuery(document).ready(function() {
                             	$('#p<?php echo $id; ?>').popover('show')
                                $('#p<?php echo $id; ?>').popover('hide')
                             });
                          </script>
                                
                        <a class="btn btn-info" href="SIS-update_profile.php?student_id=<?php echo $row['student_id'] ;?>"><img src="icons/application_edit.png">&nbsp;Details/Update</a> 
                        <a class="btn btn-success" href="SIS-view_student_club.php?student_id=<?php echo $row['student_id'] ;?>"><img src="icons/application_view_list.png">&nbsp;Club/s</a>
                        <a class="btn btn-primary" href="SIS-view_student_sched.php?student_id=<?php echo $row['student_id'] ;?>"><img src="icons/application_view_tile.png">&nbsp;Schedule</a>
                         
						
                      </td>                            
                    </tr>
                    
                <?php }?>
                </tbody>
                
		</table>
       </td>
       <tr>
       
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
</table> 
       
       
       
      </div>
      <!-- /span6 -->
      
    <!-- TemplateEndEditable -->
    
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


<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/cirque/cirque.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/charts/bar.js"></script>
<script src="../js/charts/donut.js"></script>
<script src="../js/charts/line.js"></script>
<script src="../js/charts/pie.js"></script>
<script src="../js/charts/area.js"></script>
<script src="../js/demo/validation.js"></script>
<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>


<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>
  </body>
</html>
