<!DOCTYPE html>


<html lang="en"><?php error_reporting(0); ?><!-- InstanceBegin template="/Templates/grading_template_pop.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
          <h3>Long Exam/Chapter Test</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
          <div style="border:0px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<?php 
					include('../db/db.php');
					$subject_title=$_GET['subject_title'];
					
					$query_subj=mysql_query("SELECT * FROM subject_t WHERE subject_title='$subject_title'");
					$row_subj=mysql_fetch_assoc($query_subj);
					$s_id=$row_subj['subject_code'];
					
					$section_id=$_GET['section_id'];
					$query_section=mysql_query("SELECT * FROM section_t WHERE section_id=$section_id");
					$row_section=mysql_fetch_assoc($query_section);
					$sec_name=$row_section['section_name'];
					
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sch_yr=$row_sy['sy_id']; 
					$date=date('Y-m-d');
					?>
<form method="post" action="final/grading_longexam_final.php"><p>
                 		 
                 		    <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0">
                 		    1st Grading
             				&nbsp; &nbsp;
                 		 
                 		    <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1">
                 		    2nd Grading
                 			&nbsp; &nbsp;
                 		
                 		    <input type="radio" name="RadioGroup1" value="3" id="RadioGroup1_2">
                 		    3rd Grading
                 			&nbsp; &nbsp;
                 		
                 		    <input type="radio" name="RadioGroup1" value="4" id="RadioGroup1_3">
                 		    4th Grading
                 			<br> <br>
                            
                            
                            </p>
           					No. of Items<input name="longexamItem" type="number" value="longexamItem" size="5" maxlength="5"> </label>
                            <br><br>
							Subject
							 <td><input name="subject" value="<?php echo $subject_title; ?>">
							<br/><br/>
                           <label>Date<input name="Date" type="Date" value="<?php echo $date; ?>" >
               		  
<table class="table table-striped table-bordered" id="example">
						
                 		<th class="accordion">
                 		  Student_ID</th>
                        <th class="accordion">Name</th>
                  
                		<th class="accordion">Score</th>
             <?php 
					include('../db/db.php');
						$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr");
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	
							
							

						$query_reg2=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$stud_id' AND section_id=$section_id AND school_yr=$sch_yr");
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$id'");
								while($row_stud=mysql_fetch_assoc($query_stud)){
								

								?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
								<input type='hidden' name='student_id[]' value='<?php echo $id; ?>'>
                             <td><input name="grade[]" type="number" value="grade" size="50" maxlength="50"></td>
                        </tr>
						
					
				<?php	} 
					}
				}?>
                                
                                
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<tr>
                    	<td>
	<input value="Submit" name="Submit" type="submit" class="btn btn-small btn-info msgbox-confirm">
   <input value="Clear fields" name="reset" type="reset" class="btn btn-small btn-danger msgbox-confirm" ></td>
    
    
    </tr>
  </div>					   

				
					
         </table>  </form>             
         
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
