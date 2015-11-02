<!DOCTYPE html>

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
   <link href="styled-elements.css" rel="stylesheet"/>

  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"></style>
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
			@import "../DataTable/media/css/msgGrowl.css";
		</style>
        
<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
.table1 {	font-family: Calibri;
	font-size: 12px;
}
</style>
</head>




<body>

<div class="main">


    <div class=""><div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      	 <div class="main">

      		
      		<p>&nbsp;</p>
      		<div class="widget stacked">
      		  <div class="widget stacked">
                <div class="widget-header"> <i class="icon-check"></i>
                    <h3>ADD NEW ACCOUNT</h3>
                </div>
      		    <!-- /widget-header -->
                <div class="widget-content">
                  <div style="border:1px solid #000; width:auto; margin-left:auto; margin-right:auto;">
                    <form method="post" action="#" name="reg" id="validation-form" class="form-horizontal" />
                    <fieldset>
                    <table class="table1" width="908" >
                      <tr>
                        <td><div class="control-group">
                            <label class="control-label" for="email">Employee Name</label>
                            <div class="controls">
                              <select name="emp_id">
                                <?php
									include('../db/db.php');
										$sql = "SELECT * FROM employee_t";
										$head   = mysql_query($sql);
										echo "<option value='' selected='selected' disabled='disabled'>SELECT EMPLOYEE</option>";
										while($res = mysql_fetch_array($head)) {
			  				 			echo "<option value='".$res['emp_id']."'>".strtoupper($res['l_name']).", ".ucfirst($res['f_name'])." ".ucfirst($res['m_name'])."</option>";
			  						}
		  							?>
                              </select>
                            </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td><div class="control-group">
                            <label class="control-label" for="name">Username</label>
                            <div class="controls">
                              <input name="username" type="text" placeholder="Username">
                            </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td><div class="control-group">
                            <label class="control-label" for="name">Password</label>
                            <div class="controls">
                              <input name="password" type="password" placeholder="Password">
                            </div>
                        </div></td>
                      </tr>
                      <tr>
                        <td><div class="control-group">
                            <label class="control-label" for="name">Re-enter Password</label>
                            <div class="controls">
                              <input name="repassword" type="password" placeholder="Re-enter Password">
                            </div>
                        </div></td>
                      </tr>
                      <tr>
                        <?php include('ams_add_accountemprecord.php'); ?>
                      </tr>
                    </table>
                        <table class="table1" width="auto" >
                          <tr></tr>
                    </table>
                        <table class="table1" width="auto" >
                      <tr>	
      	      <?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../db/db.php";

	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$repassword = mysql_real_escape_string($_POST['repassword']);
	$type = mysql_real_escape_string($_POST['type_no']);
	$privilege_id = mysql_real_escape_string($_POST['privilege_id']);
	
	
	$us = mysql_query("SELECT * FROM account_t WHERE username='$username'");
	
	if(mysql_num_rows($us) > 0) {
		echo "<p class='error-box'>Username already exists!</p>";
	}
	else {
	
	if($password != $repassword){
		echo "<p class='error-box'>Passwords didn't match</p>";
	}
	else if ($password == $repassword){
	   if ($type == 3){
			
		$sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', 'employee')")or die(mysql_error());
	   $id = mysql_insert_id();
	   
		$query = mysql_query("SELECT * FROM account_t WHERE username = '$username' ") or die(mysql_error());
	   $row = mysql_fetch_assoc($query);
	   $acc_id = $row['account_no'];
	   
	   //$acc_id = $id;
	   $sql2 = mysql_query("INSERT INTO employee_account_t VALUES('$emp_id', {$acc_id})") or die(mysql_error());	
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')")or die(mysql_error());
	   
	   }
	   else {
	   $sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', 'Employee Admin')")or die(mysql_error());
	   $query = mysql_query("SELECT * FROM account_t WHERE username = '$username' ") or die(mysql_error());
	   $row = mysql_fetch_assoc($query);
	   $acc_id = $row['account_no'];
	   
	   $sql2 = mysql_query("INSERT INTO employee_account_t VALUES('$emp_id', {$acc_id})") or die(mysql_error());
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')")or die(mysql_error()."     thisthat");
		}
		echo "<script>window.close(); </script>";
	}
	}
}
?>
      
                        <div align="center"> &nbsp;
                            <input name="reset" type="reset" value="Reset All" class="btn">
                            <input name="submit" type="submit" value="Add New Account" class="btn btn-success">
                        </div>
                      </tr>
                    </table>
                      </fieldset>
                      </form>
                  </div>
                </div>
      		    <!-- /widget-content -->
              </div>
        	</div> 
      		.<!-- /widget -->					
			
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

<script src="./js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="../-amsko/js/validation0.js"></script>

</body>
</html>