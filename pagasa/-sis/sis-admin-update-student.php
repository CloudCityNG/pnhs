<!DOCTYPE html>

<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>
<html lang="en"><!-- InstanceBegin template="/Templates/sisadmin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
      <link href="./css/pages/reports.css" rel="stylesheet" />
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
			
			<a class="brand" href="../index.html">
				Pagasa National Highschool <sup>2.0.1</sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
				  <li class="dropdown">
						
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="icon-user"></i>			<?php
							include('../db/db.php');
							
							$queryid = mysql_query("SELECT * FROM employee_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['emp_id'];
							$queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$id'");
							$getemp = mysql_fetch_assoc($queryemp);
							$fname = $getemp['f_name'];
							$lname = $getemp['l_name'];
							echo $fname.'&nbsp;'.$lname;
							?>
						  <b class="caret"></b>
					  </a>
						
					  <ul class="dropdown-menu">
						 
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
			</a>

			<div class="subnav-collapse collapse">
			
			<!-- InstanceBeginEditable name="navbar" -->
			    <ul class="mainnav">
                <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span> </a> </li>
                <li> <a href="sis-admin-home.php"> <i class="icon-table"></i> <span>Accounts</span> </a> </li>
                
			    <li class="active"> <a href="sis-admin-students.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Students</span> </a> </li>
	   	        <li> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Clubs</span> </a> </li>
		        <li> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Offenses</span> </a> </li>

		      </ul>
		    <!-- InstanceEndEditable -->
            
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
	
	<!-- InstanceBeginEditable name="content" -->
    
  


     <?php
require('../db/db.php');
	
	 if(isset($_GET['student_id'])){
	  $student_id = $_GET['student_id'];
	 
	
	$search2 = mysql_query("select * from student_t where student_id = '$student_id' ");
	$finddata = mysql_fetch_assoc($search2);
 
	
	  ?>

      

    
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Update Profile</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
			<div style="border:1px solid #000;width:850px;margin-left:auto;margin-right:auto;">

					<form method="post" action="sis-actions/update_student.php?student_id=<?php echo $student_id?>" name="reg" id="validation-form" class="form-horizontal" />
						<fieldset>
						 <table class="table" width="816" >
                         <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>BASIC INFORMATION</strong></td>
						  </tr>
                        	<tr><td>
						    <div class="control-group">
						      <label class="control-label" for="name">FIRST NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="f_name" id="f_name" value="<?php echo $finddata['f_name'];?>" />
						      </div>
						    </div></td>
                           </tr>
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">MIDDLE NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="m_name" id="m_name" value="<?php echo $finddata['m_name'];?>" />
						      </div>
						    </div> </td>
                            </tr>
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="subject">LAST NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="l_name" id="l_name" value="<?php echo $finddata['l_name'];?>"/>
						      </div>
						    </div></td>
                            </tr>
                           <tr><td>
                            <div class="control-group">
						      <label class="control-label" for="subject">DATE OF BIRTH</label>
						      <div class="controls">
						        <input type="date" class="input-large" name="birthdate" id="birthdate" value="<?php echo $finddata['birthdate'];?>" />
						      </div>
						    </div></td>
             				</tr>
                            <tr><td>
                           <div class="control-group">
				            <label class="control-label">GENDER</label>
				            <div class="controls">
				              <label class="radio">
				                <input type="radio" name="gender" id="gender" value="Male" />
								Male</label>
				              <label class="radio">
				                <input type="radio" name="gender" id="gender" value="Female" />
								Female
				              </label>
				            </div>
				          </div></td>
                          </tr>
                          <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>ADDRESS</strong></td>
						  </tr>
						<tr><td>
						<div class="control-group">
						      <label class="control-label" for="subject">ZIP CODE</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="zipcode" id="zipcode"value="<?php echo $finddata['zip_code'];?>" />
						      </div>
						    </div>
                            </td>
                            <td>
                            <div class="control-group">
 						<label class="control-label" for="validateSelect">CITY/MUNICIPALITY</label>
				            <div class="controls">
				          <select id="validateSelect" name="city">
                            <option value="<?php $citymun=$finddata['city_municipality'];
													echo $citymun; ?>" />
                              <?php $query_mun=mysql_query("SELECT * FROM municipality_t WHERE municipality_name != '$citymun'"); 
								   while($row_mun=mysql_fetch_assoc($query_mun)){
									   $mun_name=$row_mun['municipality_name'];?>

				                <option value="<?php echo $mun_name; ?>" /><?php echo $mun_name; 
								   }?>
				              </select>	
                              </div>
						    </div></td>
                            </tr>
                            <tr><td>
                           <div class="control-group">
						      <label class="control-label" for="subject">STREET</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="street" id="street" value="<?php echo $finddata['street'];?>"/>
						      </div>
						    </div></td>
                            <td>
                            <div class="control-group">
						      <label class="control-label" for="subject">PROVINCE</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="province" id="province" value="<?php echo $finddata['province'];?>" />
						      </div>
						    </div></td>
                            </tr>
                            <tr><td>
                            
                            <div class="control-group">
						      <label class="control-label" for="subject">BARANGAY</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="barangay" id="barangay" value="<?php echo $finddata['barangay'];?>" />
						      </div>
						    </div></td>
                            </tr>

                             <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>PARENTS/GUARDIAN</strong></td>
						  </tr>
                          <tr><td>
                            <div class="control-group">
						      <label class="control-label" for="subject">NAME OF PARENT/GUARDIAN</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="name_of_parent_guardian" id="name_of_parent_guardian" value="<?php echo $finddata['name_of_parent_guardian'];?>" />
						      </div>
						    </div></td>
                            </tr>
                            <tr><td>
                            <div class="control-group">
				            <label class="control-label">RELATION TO THE GUARDIAN</label>
				            <div class="controls">
				              <label class="radio">
				                <input type="radio" name="Relation" id="validateRadio1" value="Relative" />
								Relative</label>
				              <label class="radio">
				                <input type="radio" name="Relation" id="validateRadio2" value="Non-relative" />
								Non-relative
				              </label>
				            </div>
				          </div></td>
                          </tr>
                           <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>OTHER INFORMATION</strong></td>
						  </tr>
                          <tr><td>
                          <div class="control-group">
						      <label class="control-label" for="subject">NAME OF LAST SCHOOL ATTENDED</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="name_of_last_sch_attended" id="name_of_last_sch_attended" value="<?php echo $finddata['name_of_last_school_attended'];?>"/>
						      </div>
						    </div></td>
                            </tr>
						    <tr><td>
				          <div class="control-group">
                           <?php
						   echo "<p align='center'>";
									echo "<div class='alert alert-error'>";
									echo "<strong>";
									echo "Note: if none, select \"NONE\"";
									echo "</strong>";
									echo "</div>";
							echo "</p>";
							?>

				          <label class="control-label" for="validateSelect">SCHOLARSHIP</label>
				            <div class="controls">
				          <select id="validateSelect" name="scholarship">
                            <option value="<?php echo $sch=$finddata['scholarship'];?>"" />
                              <?php $query_scholarship=mysql_query("SELECT * FROM scholarship_t WHERE scholarship_id != '$sch' ORDER BY scholarship_id DESC"); 
								   while($row_scholarship=mysql_fetch_assoc($query_scholarship)){
									   $name=$row_scholarship['scholarship_name'];?>

				                <option value="<?php echo $row_scholarship['scholarship_id']; ?>" /><?php echo $name; 
								   }?>
				              </select>
				            </div>
				          </div></td>
                          </tr>
                          <tr><td>
                          <div class="control-group">
						      <label class="control-label" for="subject">EXAM RESULT</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="exam_result" id="exam_result" value="<?php echo $finddata['exam_result'];?>" />
						      </div>
						    </div>
							</td></tr>
                             </table>
                         
						  <div class="form-actions" align="center">
						    <button type="submit" id="enroll-btn" class="btn btn-success btn" name="Update">Update profile</button>&nbsp;&nbsp;
						     <a onClick="window.history.back()"><button type="reset" class="btn btn-tertiary">Cancel</button></a>&nbsp;&nbsp;
                              

						    </div>
                          
                           </fieldset>
						</form>  
						<hr color="#000000">
                          <p align="center"> <a href="sis-admin-student-profile-print.php?student_id=<?php echo $student_id?>" align="center"><button class="btn btn-default"><i class="icon-print"></i> Print</button></a></p>
					 
                    </div>
                    
                    
                   
				</div> <!-- /widget-content -->
				



<?php
@session_start();
require ('../db/db.php');

		date_default_timezone_set("Asia/Manila");
		if(isset($_POST['Update'])){
			$fname =$_POST['f_name'];
			$mname=$_POST['m_name'];
			$lname=$_POST['l_name'];
			$birthdate =$_POST['birthdate'];
			$city=$_POST['city'];
			$prov=$_POST['province'];
			$zipcode=$_POST['zipcode'];
			$brgy=$_POST['barangay'];
			$street=$_POST['street'];
		if(isset($_POST['gender'])){
			$gender=$_POST['gender'];
		}
		else{
			$gender=NULL;
		}
			$name_of_parent=$_POST['name_of_parent_guardian'];
		if(isset($_POST['Relation'])){
			$relation=$_POST['Relation'];}
		else{
			$relation=NULL;
			}
			$scholarship=$_POST['scholarship'];
			$last_sch_attended=$_POST['name_of_last_sch_attended'];
			$exam_result=$_POST['exam_result'];
			$dateEnrolled= date("Y-m-d");
		}
		
		if(isset($_POST['Update'])) {


		   
				$query_stud = mysql_query("UPDATE student_t SET f_name='$fname', m_name='$mname',  l_name='$lname', birthdate='$birthdate', city_municipality='$city', province='$prov', zip_code='$zipcode', barangay='$brgy', street='$street',  name_of_parent_guardian='$name_of_parent', relation_to_student='$relation', gender='$gender', scholarship='$scholarship', name_of_last_school_attended='$last_sch_attended', exam_result='$exam_result' WHERE student_id = '$student_id'") or die(mysql_error());

				echo "<script type='text/javascript'>alert('Profile successfully updated!');</script>";
	
				echo "<script type='text/javascript'>window.close();</script>";
		
		}


	 }
	 ?>

	

       

      
    <!-- InstanceEndEditable -->
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

<script src="../js/Application.js"></script>
<script src="../js/demo/validation.js"></script>
</html>
