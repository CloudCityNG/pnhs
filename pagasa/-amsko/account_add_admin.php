<!DOCTYPE html>
<?php 
 @session_start();
 


?>

<html lang="en"><!-- InstanceBegin template="/Templates/ams_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<?php  //
 @session_start();
 include "../db/db.php";
 include "../actions/user_priviledges.php";
 if(!isset($_SESSION['username'])){
      header("Location: ../restrict.php");
	  }
	  
	  
  if(!is_privileged($_SESSION['account_no'], 2)){
        header("Location: ../restrict.php");
	  }	  
	  
	  ?>
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
							Dick Dela Vega
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
			    <li> <a href="ams_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li class="active"> <a href="account_list.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Accounts</span></a></li>
                <li> <a href="ams_department.php" > <i class="shortcut-icon icon-group"></i> <span class="shortcut-label">Department</span></a></li>
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
<?php
include('../db/db.php');
error_reporting(0);
$module_no = $_GET['module_no'];
$sql = mysql_query("SELECT * FROM account_module_t WHERE module_no = '$module_no' ");
while($row=mysql_fetch_array($sql)){ 
?>  
      <div class="widget-content">
                    <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-lock">&nbsp;&nbsp;&nbsp;&nbsp;</i>System Administrators</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                <h4><?php echo strtoupper($row['module_name']) ?> ADMINISTRATORS</h4> 
                <p>&nbsp;</p>
          <div id="demo" style="min-height:400px;">
          
          	<h5>ADD NEW ADMIN <?php echo strtoupper($row['dept_name']); ?></h5>
          	<p>&nbsp;</p>
          	<form action="actions/ams_add_admin_action.php" method="post">
            <input type="hidden" name="module_no" value="<?php echo $module_no; ?>">
            <table width="70%">
			  <tr>
			    <td>Employee Name</td>
			    <td>
                <select name="emp_id">
		  				<?php
		  				include('../db/db.php');
							$sql = "SELECT * FROM employee_t ORDER BY l_name ASC";
							$head   = mysql_query($sql);
							echo "<option value='' selected='selected' disabled='disabled'>SELECT EMPLOYEE</option>";
							while($row = mysql_fetch_array($head)) {
			  				 echo "<option value='".$row['emp_id']."'>".strtoupper($row['l_name']).", ".ucfirst($row['f_name'])." ".ucfirst($row['m_name'])."</option>";
			  				}
		  				?>
				</select> 
                </td>
			  </tr>
			  <tr>
			    <td>Account Type</td>
			    <td>			
                				 <select>
                                 <option value='' selected='selected' disabled='disabled'>SELECT TYPE</option>
 								 <option value="employee">Admin</option>
 								 <option value="admin">Employee</option>
 								 </select></td>
			  </tr>
			  
			  <tr>
			    <td colspan="2"><p>&nbsp; </p>
                  <div align="center">
                  	<button class="btn btn"><a href="account_admin.php?module_no=<?php echo $module_no; ?>">CANCEL</a></button>&nbsp;
                    <input type="submit" class="btn btn-success" name="submit" value="ADD">
                    </div></td>
			    </tr>
			</table>
            </form>
          </div>
                </th>
                <th style="background-color:#F0F0F0">
 
                   <a class="btn btn-block" href="account_list.php"><i class="icon-list-alt"></i>&nbsp;View Accounts</a>
                  <a class="btn btn-block" href="ams_add_account_choice.php"><i class="icon-plus-sign"></i> Add Account</a>
                  <a class="btn btn-block" href="account_module.php"><i class="icon-lock"></i> System Admins</a>
                  <a class="btn btn-block" href="ams_emp_accounts.php"><i class="icon-user"></i> Employee Accounts</a>  
                  
                </th>
              </tr>
            </tbody>
          </table>
        <!-- /widget-content -->
      </div>  
<?php } ?>
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
