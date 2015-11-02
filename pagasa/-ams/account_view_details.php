<!DOCTYPE html>
<?php
@session_start();
require ('../db/db.php');


	
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
<style type="text/css"></style>
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
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

      		
      		<div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>VIEW ACCOUNT</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h2 align="center"> ACCOUNT </h2>
                <p align="center">&nbsp;</p>
                <?php
					   include("../db/db.php");
					   error_reporting(0);
					   $account_no = $_GET['account_no'];
					   $sql = mysql_query("SELECT * FROM account_t, employee_t
											WHERE account_t.emp_id = employee_t.emp_id
											AND account_t.account_no = '$account_no'");
						while($row = mysql_fetch_array($sql)) {
						$type = $row['type'];
						if ($type=='admin') {
					   ?>     
                       
                       <table align="center" width="300" height="50">
						  <tr>
						    <td>Employee ID</td>
						    <td><strong><?php echo $row['emp_id']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Employee Name</td>
						    <td><strong><?php echo ucfirst($row['f_name'])." ".ucfirst($row['m_name'])." ".ucfirst($row['l_name']); ?></strong></td>
						  </tr>
                          <tr>
						    <td>Account Number</td>
						    <td><strong><?php echo $row['account_no']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Username</td>
						    <td><strong><?php echo $row['username']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Password</td>
						    <td><strong><?php echo $row['password']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Type</td>
						    <td><strong><?php echo ucfirst($row['type']); ?></strong></td>
						  </tr>
                          <tr>
						    <td colspan="2"></td>
					      </tr>
                          <?php 
						  $query = mysql_query("SELECT * FROM account_t, account_module_t, account_admin_t
						  						WHERE account_t.account_no = '$account_no'
												AND account_module_t.module_no = account_admin_t.module_no
												AND account_admin_t.account_no = account_t.account_no");
						  while($row1 = mysql_fetch_array($query)){
						  ?>
                          <tr>
						    <td>Admin of </td>
						    <td><strong><?php echo ucfirst($row1['module_name']); ?></strong></td>
						  </tr>
                          <tr>
						    <td>Role</td>
						    <td><strong><?php echo ucfirst($row1['role']); }?></strong></td>
						  </tr>
				  		</table>

                        <?php } else { ?>
                        
                        <table align="center" width="300" height="50">
						  <tr>
						    <td>Employee ID</td>
						    <td><strong><?php echo $row['emp_id']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Employee Name</td>
						    <td><strong><?php echo ucfirst($row['f_name'])." ".ucfirst($row['m_name'])." ".ucfirst($row['l_name']); ?></strong></td>
						  </tr>
                          <tr>
						    <td>Account Number</td>
						    <td><strong><?php echo $row['account_no']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Username</td>
						    <td><strong><?php echo $row['username']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Password</td>
						    <td><strong><?php echo $row['password']; ?></strong></td>
						  </tr>
                          <tr>
						    <td>Type</td>
						    <td><strong><?php echo ucfirst($row['type']); ?></strong></td>
						  </tr>
				  		</table>

                        <?php } } ?>
                       
       			  <p>&nbsp;</p>
                    <p>&nbsp;</p>
				    <p>&nbsp;</p>
				</div>
				<!-- /widget-content -->
					
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
<script src="js/validation.js"></script>

</body>
</html>
