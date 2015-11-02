<!DOCTYPE html>


<html lang="en"><!-- InstanceBegin template="/Templates/grading_template_pop.dwt.php" codeOutsideHTMLIsLocked="false" -->
<?php 
 @session_start();
	$dbusername=$_SESSION['username'];
			$user_id=$_SESSION['user_id'];

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
  <style type="text/css"></style>
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

	
		
                
			</a><!-- InstanceBeginEditable name="navbar" -->
			
			<!-- InstanceEndEditable -->
            
            
            <!-- /.subnav-collapse -->

	
	

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
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Grade</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
          <div style="border:0px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<?php 
					include('../db/db.php');
					$section_id=$_GET['section_id'];
					$query_section=mysql_query("SELECT * FROM section_t WHERE section_id=$section_id");
					$row_section=mysql_fetch_assoc($query_section);
					$sec_name=$row_section['section_name'];
					
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sch_yr=$row_sy['sy_id']; 
					
					?>

                 		 
                 		 
                 			<br> <br>
                            
                            
                            </p>

               		  
<table class="table table-striped table-bordered" id="example">
						
                 		<th class="accordion">
                 		  Student_ID</th>
                        <th class="accordion">Name</th>				
						<th class="accordion">1st Grading</th>
						<th class="accordion">2nd Grading</th>
						<th class="accordion">3rd Grading</th>
						<th class="accordion">4th Grading</th>
						<th class="accordion">Final Grade</th>

             <?php 
					include('../db/db.php');
						$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr");
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	
							
						$subject_code = $_GET['subject_code'];	

						$query_reg2=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$stud_id' AND section_id=$section_id AND school_yr=$sch_yr");
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];
								
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$id'");
								while($row_stud=mysql_fetch_assoc($query_stud)){
								
						$query_reg1=mysql_query("SELECT AVG(assign_avg) as average_assign FROM grading_assignments WHERE student_id='$id' and grading_period='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg1);
							$avg_assign = $fetch['average_assign'];
						$query_reg2=mysql_query("SELECT AVG(chapter_test_avg) as average_chapter FROM grading_chapter_test WHERE student_id='$id' and grading_period='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg2);
							$avg_chapter = $fetch['average_chapter'];
						$query_reg3=mysql_query("SELECT * FROM grading_participation WHERE student_id='$id' and grading_period='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg3);
							$avg_participation = $fetch['participation_grade'];
						$query_reg4=mysql_query("SELECT * FROM grading_projects WHERE student_id='$id' and grading_period='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg4);
							$avg_proj = $fetch['proj_grade'];
						$query_reg5=mysql_query("SELECT AVG(quiz_avg) as average_quiz FROM grading_quizzes WHERE student_id='$id' and grading_period='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg5);
							$avg_quiz = $fetch['average_quiz'];
						$query_reg5=mysql_query("SELECT * FROM grading_periodical_exam WHERE student_id='$id' and periodical_exam_num='1' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg5);
							$avg_pe = $fetch['periodical_exam_avg'];
						$subj_grade=(($avg_assign+$avg_chapter+$avg_participation+$avg_proj+$avg_quiz+$avg_pe)/6);
						
						$query_reg11=mysql_query("SELECT AVG(assign_avg) as average_assign FROM grading_assignments WHERE student_id='$id' and grading_period='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg11);
							$avg_assign2 = $fetch['average_assign'];
						$query_reg12=mysql_query("SELECT AVG(chapter_test_avg) as average_chapter FROM grading_chapter_test WHERE student_id='$id' and grading_period='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg12);
							$avg_chapter2 = $fetch['average_chapter'];
						$query_reg13=mysql_query("SELECT * FROM grading_participation WHERE student_id='$id' and grading_period='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg13);
							$avg_participation2 = $fetch['participation_grade'];
						$query_reg14=mysql_query("SELECT * FROM grading_projects WHERE student_id='$id' and grading_period='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg14);
							$avg_proj2 = $fetch['proj_grade'];
						$query_reg15=mysql_query("SELECT AVG(quiz_avg) as average_quiz FROM grading_quizzes WHERE student_id='$id' and grading_period='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg15);
							$avg_quiz2 = $fetch['average_quiz'];
						$query_reg15=mysql_query("SELECT * FROM grading_periodical_exam WHERE student_id='$id' and periodical_exam_num='2' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg15);
							$avg_pe2 = $fetch['periodical_exam_avg'];
						$subj_grade2=(($avg_assign2+$avg_chapter2+$avg_participation2+$avg_proj2+$avg_quiz2+$avg_pe2)/6);
							
						$query_reg21=mysql_query("SELECT AVG(assign_avg) as average_assign FROM grading_assignments WHERE student_id='$id' and grading_period='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg21);
							$avg_assign3 = $fetch['average_assign'];
						$query_reg22=mysql_query("SELECT AVG(chapter_test_avg) as average_chapter FROM grading_chapter_test WHERE student_id='$id' and grading_period='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg22);
							$avg_chapter3 = $fetch['average_chapter'];
						$query_reg23=mysql_query("SELECT * FROM grading_participation WHERE student_id='$id' and grading_period='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg23);
							$avg_participation3 = $fetch['participation_grade'];
						$query_reg24=mysql_query("SELECT * FROM grading_projects WHERE student_id='$id' and grading_period='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg24);
							$avg_proj3 = $fetch['proj_grade'];
						$query_reg25=mysql_query("SELECT AVG(quiz_avg) as average_quiz FROM grading_quizzes WHERE student_id='$id' and grading_period='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg25);
							$avg_quiz3 = $fetch['average_quiz'];
						$query_reg25=mysql_query("SELECT * FROM grading_periodical_exam WHERE student_id='$id' and periodical_exam_num='3' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg25);
							$avg_pe3 = $fetch['periodical_exam_avg'];
						$subj_grade3=(($avg_assign3+$avg_chapter3+$avg_participation3+$avg_proj3+$avg_quiz3+$avg_pe3)/6);	
						
						$query_reg31=mysql_query("SELECT AVG(assign_avg) as average_assign FROM grading_assignments WHERE student_id='$id' and grading_period='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg31);
							$avg_assign4 = $fetch['average_assign'];
						$query_reg32=mysql_query("SELECT AVG(chapter_test_avg) as average_chapter FROM grading_chapter_test WHERE student_id='$id' and grading_period='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg32);
							$avg_chapter4 = $fetch['average_chapter'];
						$query_reg33=mysql_query("SELECT * FROM grading_participation WHERE student_id='$id' and grading_period='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg33);
							$avg_participation4 = $fetch['participation_grade'];
						$query_reg34=mysql_query("SELECT * FROM grading_projects WHERE student_id='$id' and grading_period='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg34);
							$avg_proj4 = $fetch['proj_grade'];
						$query_reg35=mysql_query("SELECT AVG(quiz_avg) as average_quiz FROM grading_quizzes WHERE student_id='$id' and grading_period='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg35);
							$avg_quiz4 = $fetch['average_quiz'];
						$query_reg35=mysql_query("SELECT * FROM grading_periodical_exam WHERE student_id='$id' and periodical_exam_num='4' and subject_code='$subject_code'");
						$fetch=mysql_fetch_array($query_reg35);
							$avg_pe4 = $fetch['periodical_exam_avg'];
						$subj_grade4=(($avg_assign4+$avg_chapter4+$avg_participation4+$avg_proj4+$avg_quiz4+$avg_pe4)/6);
						
						mysql_query("INSERT INTO grading_subject_grade (subject_code,periodical_exam_avg,quizzes_avg,assign_avg,proj_avg,chapter_test_avg,participation_avg) values('$subject_code', '$avg_pe', '$avg_quiz','$avg_assign','$avg_chapter','$avg_participation')");
							?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
							<td><?php echo number_format((float)$subj_grade, 2, '.', ''); ?></td>
							<td><?php echo number_format((float)$subj_grade2, 2, '.', ''); ?></td>
							<td><?php echo number_format((float)$subj_grade3, 2, '.', ''); ?></td>
							<td><?php echo number_format((float)$subj_grade4, 2, '.', ''); ?></td>
							<td><?php echo number_format((float)(($subj_grade+$subj_grade2+$subj_grade3+$subj_grade4)/4), 2, '.', ''); ?></td>
							 
                        </tr>
						
					
				<?php	}
					}
				}?>
                                
                                
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<tr>
   
    
    
    </tr>
  </div>					   

				
					
         </table>           
         
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
