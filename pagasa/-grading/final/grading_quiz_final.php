<?php
include('../../db/db.php');
	$quiz_item_num = $_POST['QuizItem'];
	$quiz_date = $_POST['Date'];
	$grading_period = $_POST['RadioGroup1'];
	$b = $_POST['subject_code'];

	if(empty($quiz_item_num) || empty($quiz_date) || empty($grading_period)){
	echo "<script>alert('Some fields does not have a value!')</script><body onload='history.go(-1);'>"; 
	}
?>

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
    
  
  <link href="../../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../../css/base-admin-2.css" rel="stylesheet" />
  <link href="../../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../../css/custom.css" rel="stylesheet" />

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css"></style>
  <style type="text/css" title="currentStyle">
			@import "../../DataTable/media/css/demo_page.css";
			@import "../../DataTable/media/css/demo_table.css";
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
			
			<a class="brand" href="../../home.php">
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
							<li><a href="../../actions/logoutprocess.php">Logout</a></li>
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
    <img src="../../images/banner.jpg">
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
          <h3>Quiz</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
          <div style="border:0px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<?php 
					/*include('../../db/db.php');
					$section_id=$_GET['section_id'];
					$query_section=mysql_query("SELECT * FROM section_t WHERE section_id=$section_id");
					$row_section=mysql_fetch_assoc($query_section);
					$sec_name=$row_section['section_name'];
					
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sch_yr=$row_sy['sy_id']; 
					*/
					?>
<form><p>
                 		 
                 		    <?php echo $grading_period; ?> Grading
                 			<br> <br>
                            <?php echo $b; ?>
                            </p>
           					No. of Items: <?php echo $quiz_item_num; ?>  </label>
                            <br><br>
                           <label>Date: <?php echo $quiz_date; ?>
               		  
<table class="table table-striped table-bordered" id="example">
						
                 		<th class="accordion">
                 		  Student_ID</th>
                        <th class="accordion">Name</th>
                  
                		<th class="accordion">Score</th>
             <?php 
					foreach ($_POST['grade'] as $key => $value) {
								
								$student_id = $_POST['student_id'][$key];
								$quiz_score = $_POST['grade'][$key];
						
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$student_id'");
								while($row_stud=mysql_fetch_array($query_stud)){
								
								if($quiz_score > 0){
							//	$sql = mysql_query("SELECT quiz_num FROM grading_quizzes WHERE student_id='$student_id'");
							//	$count = mysql_num_rows($sql);
								?>
                           
					    <tr class="del<?php echo $student_id ?>">
                            <td><?php echo $student_id; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
                             <td><?php echo $quiz_score;
							
							//if($count > 0){
							$quiznn=mysql_query("SELECT * FROM grading_quizzes WHERE student_id='$student_id' ORDER BY quiz_num DESC LIMIT 1");
							$fetchh = mysql_fetch_assoc($quiznn);
							$quiz_num = $fetchh['quiz_num'] + 1;
							$qd = $_POST['Date'];
							$quiz_avg = $quiz_score / $quiz_item_num * 100;
							mysql_query("INSERT INTO grading_quizzes (student_id, quiz_num, quiz_item_num, quiz_score, quiz_avg, quiz_date, grading_period, subject_code) 
							VALUES ('$student_id', '$quiz_num', '$quiz_item_num', '$quiz_score', '$quiz_avg', '$qd', '$grading_period', '$b')") or die("Error in data insertion.".mysql_error());
							$select = mysql_query("SELECT quizzes FROM grading_criteria");
							$fetch = mysql_fetch_array($select);
							$qui = ".".$fetch['quizzes'];
							$q_avg= $quiz_avg * $qui;							
							$sql = mysql_query("INSERT INTO grading_subject_grade_quizzes (quiz_id, quizzes_avg) 
							VALUES (LAST_INSERT_ID(),'$q_avg')") or die("Error in data insertion.".mysql_error());
							
							 ?></td>
                        </tr>
						<?php }
						else if( $quiz_score > $quiz_item_num ){
							echo "<script>alert('You entered a score higher than the quiz item')</script><body onload='history.go(-1);'>"; 
								}else {
								echo "<script>alert('Some field does not have a value!')</script><body onload='history.go(-1);'>"; ?>
						 <tr class="del<?php echo $student_id ?>">
                            <td><?php echo $student_id; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."");?></td>
                             <td><span style="color: Red;">No Value</span></td>
                        </tr>
					
				<?php		}
						} 
					}
				//}	
				//}?>
                                
                                
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<tr>
                    	<td>

	 </form>  
<a class="btn btn-small btn-danger msgbox-confirm" href="javascript:history.go(-1)">Back</a></td>
    
    
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
<script src="../../js/libs/jquery-1.8.3.min.js"></script>
<script src="../../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../../js/libs/bootstrap.min.js"></script>

<script src="../../js/plugins/flot/jquery.flot.js"></script>
<script src="../../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../../js/Application.js"></script>

<script src="../../js/charts/area.js"></script>
<script src="../../js/charts/donut.js"></script>
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

<script type="text/javascript" language="javascript" src="../../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

  </body>
<!-- InstanceEnd --></html>
