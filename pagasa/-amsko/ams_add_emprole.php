<!DOCTYPE html>
<?php 
 @session_start();
 
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
					<i class="icon-plus"></i>
					<h3>ADD ROLE</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content"><br />
				    <form class="form-horizontal" action="actions/ams_add_emprole_action.php" method="post" id="validation-form">
			        <table width="70%">
                    			 <?php 
					include('../db/db.php');
					$acc_id=$_GET['id'];
					error_reporting(0);
					$query=mysql_query("SELECT * FROM account_t, employee_account_t, employee_t
										WHERE account_t.account_no = $acc_id AND employee_account_t.account_no=account_t.account_no AND 		employee_t.emp_id=employee_account_t.emp_id");
                        while($row=mysql_fetch_array($query)){ 
						$id=$row['emp_id']; ?>
                     
                     
                      <tr class="del<?php echo $id ?>">
                        <td width="22%" height="35"><strong>Account No.</strong></td>
                        <td width="78%"><?php echo strtoupper($acc_no = $row['account_no']); ?>
                        <input type="hidden" value="<?php echo $acc_no; ?>" name="account_no"></td>
                      </tr>
                      <tr>
                        <td height="35">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="35"><strong>Username</strong></td>
                        <td><?php echo ($us = $row['username']); ?></td>
                      </tr><p>
                      <tr>
                        <td height="33">&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="33"><strong>Employee Name</strong></td>
                        <td>
                                    
                                     <?php echo ucfirst($row['f_name'])." ".ucfirst($row['m_name'])." ".ucfirst($row['l_name']); ?>                          </td>
                      </tr> </p>
                      <p> 
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                         <td>&nbsp;</td>
                         <td>&nbsp;</td>
                       </tr>
                       <tr>
                        <td><strong>Role</strong></td>
                        
                    	<td>  
                        <select name="privilege_id">
		  							<?php
		  							include('../db/db.php');
									$account_no  = $_GET['id'];
									$emp_query = mysql_query("SELECT * FROM employee_account_t WHERE account_no='{$account_no}'") or die(mysql_error());
									if(mysql_num_rows($emp_query)<1){
									$sql = mysql_query("SELECT * FROM account_privilege_t WHERE privilege_level=0");
									}
									else{
									$sql = mysql_query("SELECT * FROM account_privilege_t WHERE privilege_level<>1 AND privilege_level<>4");
									}
										echo "<option value='' selected='selected' disabled='disabled'>ADD ROLE</option>";
										while($row1 = mysql_fetch_array($sql)) {
			  				 				echo "<option value='".$row1['privilege_id']."'>".ucfirst($row1['privilege_name'])."</option>";
			  							}
		  							?>
								</select>&nbsp;</td>
                      </tr>  
                       <tr>
                         <td colspan="2">&nbsp;</td>
                       </tr>
                       <tr>
                         <td colspan="2">
                         
                         <?php }?>  &nbsp;</td>
                       </tr>
                      <tr>
                        <td colspan="2"><p>&nbsp; </p>
                            <div align="left">
                              
                          <a class="btn btn" title="CANCEL" href="JavaScript:window.close();">&nbsp;CANCEL</a>
                         
                              &nbsp;
                              <input type="submit" class="btn btn-success" name="submit" value="ADD">
                          </div></td>
                      </tr>
                    </table>
			      </form>
				</div>
				<!-- /widget-content -->
					
			</div> 
      		<!-- /widget -->					
	    </div> 
      	 <!-- /span12 -->     	
      	
      	
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
	
</div> <!-- /footer --><!-- Le javascript
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
<script src="js/validation4.js"></script>

</body>
</html>
