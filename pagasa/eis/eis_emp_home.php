<!DOCTYPE html>
<?php
include '../db/db.php';
error_reporting(0);
session_start();
?>
<?php

if (!isset($_SESSION['username'])) {

echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
 
 }
 
else{

$username = $_SESSION['username'];
$query = mysql_query("SELECT * FROM account_t WHERE username='$username'")or die(mysql_error());
while ($leave = mysql_fetch_assoc($query)){
		$accno = $leave['account_no'];
	
$query=mysql_query("SELECT * FROM employee_t, employee_account_t, account_t
					WHERE account_t.account_no='$accno'
					AND account_t.account_no=employee_account_t.account_no
					AND employee_account_t.emp_id=employee_t.emp_id") or die(mysql_error());
while($pis_info=mysql_fetch_assoc($query)){
$p_id= $pis_info['emp_id'];
$fname = $pis_info['f_name'];
$lname = $pis_info['l_name'];
$mname = $pis_info['m_name'];
$position =$pis_info['position'];
		
?>



<html lang="en"><!-- InstanceBegin template="/Templates/eis_employee_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
							<?php echo $_SESSION['username'];?>
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
			    <li class="active"> <a href="eis_emp_home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li> <a href="eis_emp_view_pds.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">View PDS</span></a></li>
			    <li> <a href="eis_emp_view_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Apply Leave</span></a></li>
			    <li> <a href="inv_my_inventory.php" > <i class="shortcut-icon icon-briefcase"></i> <span class="shortcut-label">My Inventory</span></a></li>
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
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Dashboard</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
            <p>&nbsp;</p>
            <section id="content" class="container_12 clearfix" data-sort=true>

				<?php 
					$find_user=mysql_query("SELECT * FROM account_t WHERE username='$username'");
					$found_user=mysql_fetch_assoc($find_user);
					$acc_no=$found_user['account_no'];
	
					$find_emp=mysql_query("SELECT * FROM employee_account_t WHERE account_no='$acc_no'");
					$found_emp=mysql_fetch_assoc($find_emp);
	
					$p_id=$found_emp['emp_id'];	
					
					$find_pis=mysql_query("SELECT * FROM employee_t WHERE emp_id='$p_id'");
					while($pis=mysql_fetch_assoc($find_pis)){
						
						$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$p_id'");
						while($found_role=mysql_fetch_assoc($find_role)){
						$pos_id=$found_role['role_id'];
						$find_pos=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$pos_id'");
						while($found_pos=mysql_fetch_assoc($find_pos)){
 

				?>
			
		<div class=" table-striped">
			
				<table width="965" class="table-bordered table-condensed">
            	<tr>
            		<td align="center">
            		<?php $find_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$p_id'");
						while($found_pic=mysql_fetch_assoc($find_pic)){ ?>
                     <ul class="gallery-container"> 
                    <li>
                    <a href="include/dpic/<?php echo $found_pic['pic_name']; ?>" class="ui-lightbox">   
					<img src="include/dpic/<?php echo $found_pic['pic_name']; ?>" alt="" />
                    </a>
                    <a href="include/dpic/<?php echo $found_pic['pic_name']; ?>" class="preview"></a>
                    </li>
                    </ul>
            		<?php } ?>
            		</td>
                    <td>
                    <table class=" table table-striped table-bordered">
                    	<tr>
                        	<td style=" font:Century Gothic"><h1 style=" font:Century Gothic"><b><?php echo $pis['f_name'].'&nbsp;'.$pis['l_name'].'&nbsp;'.$pis['name_extension']; ?></b></h1></td>
                        </tr>
                    	<tr>
            				<td><h1></h1>
                    		</td>
                    	</tr>
                        <tr>
                    		<td>
            				(<?php echo $found_pos['position_title'].'&nbsp;|&nbsp;'.ucfirst($found_pos['position_type']); ?>)
            				</td>
                        </tr>    
            		</table>	
					</td>
            	</tr>
            </table>
				<br />
				<br />

				
				 <div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Personal Details</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
                <table width="900" class="table table-striped table-bordered">
                    <tr>
                        <td width="82" align="right">Full Name:&nbsp;</td>
                        <td width="358"><b><?php echo $pis['f_name'].'&nbsp;'.$pis['m_name'].'&nbsp;'.$pis['l_name'].'&nbsp;'.$pis['name_extension']; ?></b></td>
                        <td width="174" align="right">Date of Birth(yyyy-mm-dd):&nbsp;</td>
                        <td width="266"><b><?php echo $pis['b_date']; ?></b></td>
                    </tr>
					<tr>
                    	<td align="right">Position:&nbsp;</td>
                        <td><b><?php echo $found_pos['position_title']; ?></b></td>
                        <td align="right">Status:&nbsp;</td>
                        <td><b><?php echo ucfirst($found_pos['position_type']); ?></b></td>
                    
                    </tr>
                    <tr>
                    	<td align="right">Address:&nbsp;</td>
                        <td><b><?php echo $pis['address'].'&nbsp;&nbsp;&frasl;&nbsp;&nbsp;'.$pis['p_address']; ?></b></td>
                        <td align="right">Contact No:&nbsp;</td>
                        <td><b><?php echo $pis['contact_no1'].'&nbsp;&nbsp;&frasl;&nbsp;&nbsp;'.$pis['contact_no2'].'&nbsp;&nbsp;&frasl;&nbsp;&nbsp;'.$pis['contact_no3']; ?></b></td>
                    </tr>
              	</table>
                
                <hr/>
                
                
                
           	  </div> 
				
                <hr/>
                
				<div class="widget stacked">
            	<!--<div class="widget-header">
                <i class="icon-barcode"></i>
                <h3>Account Details</h3>
                </div> -->
                <table class="table table-striped table-bordered">
                	<thead>
                    	<tr>
                    		<th width="80%"><span><i class="icon-barcode"></i></span>&nbsp;&nbsp;Account Details</th>
                        	<th>Actions</th>
                        </tr>    
                    </thead>
                	<tbody>
                    	<tr>
                        	<th>
                                
                                <table class="table table-striped table-bordered">
                                <?php
                                    $find_no=mysql_query("SELECT * FROM employee_account_t WHERE emp_id='$p_id'");
                                    $found_no=mysql_fetch_assoc($find_no);
                                    $acc_no=$found_no['account_no'];
                                    $find_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$acc_no'");
                                    $found_acc=mysql_fetch_assoc($find_acc);
                                 ?>
                                <tr>
                                    <td width="91" align="right">Username:&nbsp;</td>
                                    <td width="173" style="font-size:14px"><b><?php echo $found_acc['username']; ?></b></td>
                                    <td width="159" align="right">Password:&nbsp;</td>
                                    <td width="217" style="font-size:14px"><b><?php echo $found_acc['password']; ?></b></td>
                                    <td width="136" align="right">Account Type:&nbsp;</td>
                                    <td width="91" style="font-size:14px"><b><?php echo ucfirst($found_acc['type']); ?></b></td>
                                </tr>
                                
                                
                                
                                </table>
                                
                			</th>
                        	<th style="background-color:#F0F0F0">
                             <a class="btn btn-block" href="#changePass" data-toggle="modal"><span><i class=" icon-lock"></i></span>Change Password</a>
                            
                        	</th>
                     </tr>
                </tbody>
                </table>
            </div>
            
            <!-- Start of Modal: Change Password -->
            
                                <div class="modal fade hide" id="changePass">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3>Change Your Password</h3>
                      </div>
                      <div class="modal-body">
                      
                        <form action="actions/emp_change_pass.php" method="post">
                            <table class="table table-striped table-bordered">
                            	<tr>
                                	<td><input type="hidden" name="emp_id" value="<?php echo $p_id; ?>"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Your Old Password:&nbsp;</strong></td>
                                    <td><input type="password" name="old_pwd" id="old_pwd" required pattern="<?php echo $found_acc['password']; ?>"></td>
                                </tr>
                                <tr>
                                <td align="right"><strong>New Password:&nbsp;</strong></td>
                                <td><input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd1" onchange="
                  this.setCustomValidity(this.validity.patternMismatch ? 'Password must contain at least 6 characters, including UPPER/lowercase and numbers' : ''); if(this.checkValidity()) form.pwd2.pattern = this.value;"></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Confirm New Password:&nbsp;</strong></td>
                                <td><input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}" name="pwd2" onchange="
                  this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');
                "></td>
                            </tr>
                                
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center"><input type="submit" name="change_pass" value="Change Password" class="btn-success"></td>
                                    
                                </tr>
                            </table>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                        
                      </div>
                    </div>
                    <!-- End of Modal -->
				
			<div class="widget stacked">
            	<div class="widget-header">
            		<i class="icon-file"></i>
            		<h3>Leave Credits Summary</h3>
            	</div>
                
                <?php 
				$find_cred=mysql_query("SELECT * FROM eis_leave_credits_t WHERE emp_id='$p_id'");
				$found_cred=mysql_fetch_assoc($find_cred);
				
				?>
                <div class="widget-content">
                <table width="891" class="table table-striped table-bordered">
                	<tr>
                    	<td width="143" align="right">Sick Leave Balance:&nbsp;</td>
                        <td width="134"><b><?php echo $found_cred['sick_bal']; ?></b></td>
                        <td width="170" align="right">Vacation Leave Balance:&nbsp;</td>
                        <td width="166"><b><?php echo $found_cred['vacation_bal']; ?></b></td>
                        <td width="128" align="right">Total Balance:&nbsp;</td>
                        <td width="122"><b><?php echo $found_cred['leave_balance']; ?></b></td>
                    </tr>
                </table>
                </div>
            </div>
				
				<?php	
											
										}
								}
								}
								?>
				
				
				
				
		
		
		</section>
            
          </div>
          </div>
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
<?php 
}
}
}
?>
