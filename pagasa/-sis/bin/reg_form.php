<!DOCTYPE html>
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

		    $query1 = mysql_query("INSERT into student_t VALUES('', 'new', '$fname', '$mname', '$lname', '$birthdate', '$city', '$prov', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', null, '$exam_result')") or die("error");
			
			

			//$query1 = mysql_query("INSERT into student_t VALUES('', null, '$type', '$fname', '$mname', '$lname', '$birthdate', '$city', '$zipcode', '$brgy', '$street',  '$name_of_parent', '$relation', '$gender', '$scholarship', '$last_sch_attended', '$syg', null, '$id', '$exam_result')");
			//$query3=mysql_query("INSERT into student_t(student_id,f_name, birthdate, account_no) VALUES ('','$fname', '$birthdate', '$id')");
			
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



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class=""><div class="container" style="width:1000px; margin-top:20px;">
    <div class=""><div class="main">

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
						      <label class="control-label" for="subject">CITY/MUNICIPALITY</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="city" id="city" />
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
				            <label class="control-label" for="validateSelect">SCHOLARSHIP</label>
				            <div class="controls">
				              <select id="scholarship" name="scholarship">
				                <option value="" />Select...
				                <option value="1" />1
				                <option value="2" />2
				                <option value="3" />3
				                <option value="4" />4
				                <option value="5" />5
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
						    <button type="submit" class="btn btn-success btn" name="Enroll">Enroll</button>&nbsp;&nbsp;
						      <button type="reset" class="btn">Cancel</button>
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
      	  <!-- /widget -->					
			
	    </div> 
      	<!-- /span12 -->     	
      	
      	
      </div> 
      <!-- /row -->

    </div> <!-- /container -->
    
</div>
<!-- /widget-content --><!-- /span6 -->
  <!-- /span6 -->
</div>
<!-- /row --></div>
<!-- /span6 -->
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
