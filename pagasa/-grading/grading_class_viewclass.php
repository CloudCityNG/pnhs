<!DOCTYPE html>
<?php 
 @session_start();
  $_SESSION['username']; 
$username = $_SESSION['username'];


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
			    <li class="active"> <a href="grading_class.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">CLASS RECORD</span></a></li>
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
        <span class="accordion">
          <div class="widget-content">
          <div id="demo">
    </span>
    <?php 
					include('../db/db.php');
					$sec_id=$_GET['section_id'];
					$query_section=mysql_query("SELECT * FROM section_t WHERE section_id=$sec_id");
					$row_section=mysql_fetch_assoc($query_section);
					$sec_name=$row_section['section_name'];
					
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sch_yr=$row_sy['sy_id']; 
					
					?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th width="80%"> <span class="accordion"><a href="grading_class.php">CLASS RECORD</a>&nbsp;/&nbsp;<font style="text-shadow:"><u>VIEW CLASS</u></font></span></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <span class="accordion">
              <tr >
              </span>
              
              <th style>
                <div id="demo" style="min-height:400px;">
                  <table cellpadding="0" cellspacing="0" border="0" class=" " id="rooms" width="100%" bordercolor="">
                   		  <tr>
                 		<th class="accordion">Student_ID</th>
                        <th class="accordion">Name</th>
                  
                </tr>
                <span class="accordion">
                </thead>
                </span>
              
              <tbody>
             <?php 
					include('../db/db.php');
						$subj_code=$_GET['subject_code'];
						$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr") or die("katabang!");
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	
							
							

						$query_reg2=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$stud_id' AND section_id=$sec_id AND school_yr=$sch_yr");
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$id'");
								while($row_stud=mysql_fetch_assoc($query_stud)){

								?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
                            
                        </tr>

					
				<?php	} 
					}
				}?>
                                
                                <span class="accordion">
                                </tr>
                                </span>
                                
                    <tbody>
                        
						
                        
                      
						
						
                    <tfoot class="hide">
                      <tr>
                        <th class="accordion">Rendering engine</th>
                        <th class="accordion">Browser</th>
                      </tr>
                    </tfoot>
                  </table>
                    
                </div>
                   
              </th>
                
            <th  >
                
                <table >
                    <tr>
                       	<br>
                          <span class="accordion">
                          </div>
                          </span>
                            
         
            <span class="accordion">
             <a class="btn" data-toggle="modal" href="#myModal2">&nbsp;<i class="icon-forward"></i>&nbsp;View Grades&nbsp;&nbsp;</span></a><br><br>
 
          <a class="btn" data-toggle="modal" href="#myModal"><i class="icon-book"></i>Record Grades</a><br><br>
         
          
            <span class="accordion">
            </div>
            <div class="modal fade hide" id="myModal" style="display: none;" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Choose what to record</h3>
  </div>
  <div class="modal-body">
    <p>
    <?php $subject_code=$_GET['subject_code'];
	$query_subj=mysql_query("SELECT * FROM subject_t WHERE subject_code=$subject_code");
	$row_subj=mysql_fetch_assoc($query_subj);
	$subj_title=$row_subj['subject_title'];
	?>
    
          <a  class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_quiz.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Quizzes</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_assignment.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Assignment</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_project.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Project</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_participation.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Participation</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_longexam.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Long Exam</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_periodical.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&&subject_title=<?php echo $subj_title; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Periodical Exam</a>
         
        <br>
          
      </p>
    
    <p></p>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">CANCEL</a>
  </div>
</div>

<div class="modal fade hide" id="myModal2" style="display: none;" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Choose</h3>
  </div>
  <div class="modal-body">
    <p>
		  <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_quiz_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Quizzes</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_assignment_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Assignment</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_project_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Project</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_participation_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Participation</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_longexam_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Long Exam</a><br><br>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_periodical_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Periodical Exam</a><br><br>
		  <a class="btn btn-small btn-primary"  data-dismiss="modal" onClick="window.open('grading_subject_final_grade.php?section_id=<?php echo $sec_id=$_GET['section_id'];?>&subject_code=<?php echo $_GET['subject_code']; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center'); ">Final Grade</a>
         
          
          
        <br>
      </p>
    
    <p></p>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">CANCEL</a>
  </div>
</div>
<div class="modal fade hide" id="myModal3" style="display: none;" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Choose Quiz Number</h3>
  </div>
  <div class="modal-body">
    <p>
          <a class="btn btn-small btn-primary"  data-dismiss="modal" href="#myModal3">Quizzes</a><br><br>
          
          
        <br>
      </p>
    
    <p></p>
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">CANCEL</a>
  </div>
</div>
            </span>
          
                      <span class="accordion">
                      </tr>
                      </span>
                                        </table>
               
              </th>
                
              </tr>
            <span class="accordion">
            </tbody>
            </span>
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
