<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/grading_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
 <?php
  @session_start();
  include "../db/db.php";
  include "../actions/user_privileges.php";
  
  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $adviser = is_privileged($_SESSION['account_no'], 10);
  $teacher = is_privileged($_SESSION['account_no'], 12);
  
  if(!$developer && !$super_admin && !$adviser && !$teacher){
      header("Location: restrict.php");  
  }
  
  ?>
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
							<?php echo $dbusername=$_SESSION['username']; ?>
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
			    <li> <a href="../home.php"> <i class="icon-chevron-left"></i> <span></span></a></li>
                <li > <a href="grading_home.php"> <i class="icon-home"></i> <span>HOME</span></a></li>
			    <li class="active"> <a href="grading_class.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">MY CLASS</span></a></li>
			    <li> <a href="grading_classadvisory.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">ADVISORY CLASS</span></a></li>
			    
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
     <!-- <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Dashboard</h3>
        </div> -->
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
            <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-home"></i> <a href="grading_class.php">MY CLASS</a>&nbsp;/&nbsp;<font style="text-shadow:"><u>VIEW CLASS</u></font></th>
                <th><i class="icon-info-sign"></i>&nbsp;RESOURCES</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th style>
                  <div id="demo" style="min-height:400px;">
                    <table cellpadding="0" cellspacing="0" border="0" class=" " id="rooms" width="100%" bordercolor="">
                     		<tr>
                 		<th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                </tr>
              </thead>
              <tbody>
              <?php
              			$sec_id=$_GET['section_id'];
						echo $sec_id;
						$query=mysql_query("SELECT * FROM section_t WHERE section_id='$sec_id'");
						$row= mysql_fetch_assoc($query);
						$section_id=$row['year_level']*100+$row['section_no'];
						//$query1=mysql_query("SELECT * FROM school_year_t WHERE SY_Status=1");
						//$row1=mysql_fetch_assoc($query1);
						//$sy_id=$row1['sy_id'];
						//echo "$section_id";
		
		     		$query2=mysql_query("SELECT * FROM registration_t WHERE section_id=$section_id");
						
   					while($row2=mysql_fetch_array($query2)){ 
					$stud_id=$row2['student_id'];
					$query3=mysql_query("SELECT * FROM student_t WHERE student_id=$stud_id");
					while ($row3=mysql_fetch_array($query3)){ 
					$sec_id=$row['section_id']; ?>
                    <tr class="del<?php echo $sec_id ?>">
                       <td><?php echo $row3['l_name']; ?></td>
        			   <td><?php echo $row3['f_name']; ?></td>
                       <td><?php echo $row3['m_name']; ?></td>
                                                
                    </tr>
                    
                <?php } 
						}?>
                                
                                </tr>
                      <tbody>
                        
						
                        
                      
						
						
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
                
                    <table >
                        <tr>
                        	<br>
                            </div>
         <a   class="btn" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');">&nbsp;&nbsp;<i class="icon-wrench"></i>&nbsp;Set Criteria&nbsp;&nbsp;&nbsp;</a><br><br>
          <a   class="btn" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');">&nbsp;&nbsp;<i class="icon-tasks"></i>&nbsp;View Grades&nbsp;</a><br><br>
          <a   class="btn" onClick="window.open('sample_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');"><i class="icon-plus"></i>&nbsp;Record Grades</a></div>
                        </tr>
                    </table>
               
                </th>
                
              </tr>
            </tbody>
          </table>
            <p>&nbsp;</p>
          </div>
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
<!-- InstanceEnd --></html>
