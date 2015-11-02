<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location: ../restrict.php");
}
?> 
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
$registrar= is_privileged($_SESSION['account_no'], 13);
$reg_admin= is_privileged($_SESSION['account_no'], 5);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$registrar)
{
	header("Location: ../restrict.php");
	}

 ?>

<?php
@session_start();
require ('../db/db.php');

		date_default_timezone_set("Asia/Manila");
		if(isset($_POST['Enroll'])){
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
		
		if(isset($_POST['Enroll'])) {
			
			$query_sy=mysql_query("SELECT * from school_year_t where SY_status=1");
			$row_sy=mysql_fetch_assoc($query_sy);
					$sy_id=$row_sy['sy_id'];
					$sy_start=$row_sy['sy_start'];
		
			$query_student=mysql_query("SELECT * FROM student_t");
			$student_number=mysql_num_rows($query_student);

		    
			if($student_number==0){
				$first=1001;
				$query_stud = mysql_query("INSERT into student_t VALUES('$sy_start-$first', 'new', '$fname', '$mname', '$lname', '$birthdate', '$city', '$prov', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', null, '$exam_result')") or die(mysql_error());
				
			}else if($student_number!=0)
				$count=$student_number-1;
				$query_last=mysql_query("SELECT * FROM student_t LIMIT $count,1");
				$row_last=mysql_fetch_assoc($query_last);
				$last_id=$row_last['student_id'];
				$array= preg_split ('/[-]/', $last_id);		
				$last_last=$array[1]+1;
				$query_stud = mysql_query("INSERT into student_t VALUES('$sy_start-$last_last', 'new', '$fname', '$mname', '$lname', '$birthdate', '$city', '$prov', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', null, '$exam_result')") or die(mysql_error());

			
							
				$query_YL=mysql_query("SELECT * FROM year_level_t WHERE year_lvl=1 ");
					$row_YL=mysql_fetch_assoc($query_YL);
					$lvl_id=$row_YL['lvl_id'];
	
				$query_student=mysql_query("SELECT * from student_t");
				while($row_student=mysql_fetch_assoc($query_student)) {
					$s_id=$row_student['student_id'];
				}

				$query5=mysql_query("INSERT into student_registration_t VALUES('', '$s_id', null, null, '$dateEnrolled', '$sy_id', '$lvl_id')") or die("'$s_id', null, null, '$dateEnrolled', '$sy_id', '$lvl_name'   ".mysql_error());
				$queryfg=mysql_query("INSERT into final_grade_t VALUES('','$s_id','$sy_id', null)") or die("$s_id','$sy_id', null ".mysql_error());
			
				
			//$query1 = mysql_query("INSERT into student_t VALUES('', null, '$type', '$fname', '$mname', '$lname', '$birthdate', '$city', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', '$syg', null, '$id', '$exam_result')");
			//$query3=mysql_query("INSERT into student_t(student_id,f_name, birthdate, account_no) VALUES ('','$fname', '$birthdate', '$id')");
				echo "<script type='text/javascript'>alert('Successfully Enrolled!');</script>";
	
				echo "<script type='text/javascript'>window.close();</script>";
		//header("Location: ../-registration/reg_home.php");
		}

		
//$type = $_SESSION['account_type'];
//$query = mysql_query("SELECT * FROM account WHERE type='$type'");
	
	
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
<title>Pagasa National Highschool:: Base Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
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
        
<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
</style>

</head>



<body>

<div class="main">
    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      	 <div class="main">

      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Enrollment Form</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
			<div style="border:1px solid #000;width:850px;margin-left:auto;margin-right:auto;">

					<form method="post" action="reg_form.php" name="reg" id="validation-form" class="form-horizontal" />
						<fieldset>
						 <table class="table" width="816" >
                         <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>BASIC INFORMATION</strong></td>
						  </tr>
                        	<tr><td>
						    <div class="control-group">
						      <label class="control-label" for="name">FIRST NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="f_name" id="f_name" />
						      </div>
						    </div></td>
                           </tr>
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">MIDDLE NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="m_name" id="m_name" />
						      </div>
						    </div> </td>
                            </tr>
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="subject">LAST NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="l_name" id="l_name" />
						      </div>
						    </div></td>
                            </tr>
                           <tr><td>
                            <div class="control-group">
						      <label class="control-label" for="subject">DATE OF BIRTH</label>
						      <div class="controls">
						        <input type="date" class="input-large" name="birthdate" id="birthdate" />
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
						        <input type="text" class="input-large" name="zipcode" id="zipcode" />
						      </div>
						    </div>
                            </td>
                            <td>
                            <div class="control-group">
 						<label class="control-label" for="validateSelect">CITY/MUNICIPALITY</label>
				            <div class="controls">
				          <select id="validateSelect" name="city">
                            <option value="" />Select...
                              <?php $query_mun=mysql_query("SELECT * FROM municipality_t"); 
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
						        <input type="text" class="input-large" name="street" id="street" />
						      </div>
						    </div></td>
                            <td>
                            <div class="control-group">
						      <label class="control-label" for="subject">PROVINCE</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="province" id="province" />
						      </div>
						    </div></td>
                            </tr>
                            <tr><td>
                            
                            <div class="control-group">
						      <label class="control-label" for="subject">BARANGAY</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="barangay" id="barangay" />
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
						        <input type="text" class="input-large" name="name_of_parent_guardian" id="name_of_parent_guardian" />
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
						        <input type="text" class="input-large" name="name_of_last_sch_attended" id="name_of_last_sch_attended" />
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
                      	 <option value="" />Select..
                           <?php $query_scholarship=mysql_query("SELECT * FROM scholarship_t ORDER BY scholarship_id DESC"); 
									while($row_scholarship=mysql_fetch_assoc($query_scholarship)){
										$id=$row_scholarship['scholarship_id'];
										$name=$row_scholarship['scholarship_name']; ?>

                            <option value="<?php echo $id; ?>" /><?php echo $name; ?>
				              <?php } ?>
                              </select>
                              
				            </div>
				          </div></td>
                          </tr>
                          <tr><td>
                          <div class="control-group">
						      <label class="control-label" for="subject">EXAM RESULT</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="exam_result" id="exam_result" />
						      </div>
						    </div>
							</td></tr>
                             </table>
                         
						  <div class="form-actions" align="center">
						    <button type="submit" id="enroll-btn" class="btn btn-success btn" name="Enroll">Enroll</button>&nbsp;&nbsp;
						     <a onClick="window.close()"><button type="reset" class="btn">Cancel</button></a>
						    </div>
                          
                           
						  </fieldset>
						</form>
					
                    </div>
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
</div>
<!-- /main --><!-- /extra -->
<div class="modal fade hide" id="confirmation">
   <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h3></h3>
                          
   </div>
 	<div class="modal-body">
 				<p style="font-size:18px">Successfully Enrolled!</p>               
  	</div>
  	<div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <a onClick="window.close();"><input class="btn btn-success" type="submit" name="OK" value="OK" ></a>

                 
  </div>
 </div>
    
    
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

<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>


<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="../js/demo/validation.js"></script>

  </body>
</html>
