<!DOCTYPE html>
<?php 
 @session_start();
 include('../db/db.php');

 if (!isset($_SESSION['username'])) {
	
		echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
}
else{
	$username = $_SESSION['username'];
?>
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
//$registrar= is_privileged($_SESSION['account_no'], 13);
$eis_admin= is_privileged($_SESSION['account_no'], 3);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$eis_admin)
{
	header("Location: ../restrict.php");
	}

 ?>
 



<html lang="en"><!-- InstanceBegin template="/Templates/eis_admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
    <title>Pagasa National Highschool:: Base Admin</title><br>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />
    
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

<script type="text/javascript">
 function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#chng_dpic')
						
                        .attr('src', e.target.result)
                        .width(137)
                        .height(175);
                };
				
                reader.readAsDataURL(input.files[0]);
				//document.getElementById('dpic').style.visibility='visible';
				return true;
            }else{
			alert('Please Select Your Photo');
			return false;
			}
			
        }
		
</script>
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
				<li><a onClick="window.history.back()"><i class="icon-backward"></i><span class="shortcut-label">Back</span></a></li>
			    <li > <a href="eis_admin_dashboard.php"> <i class="icon-home"></i><span class="shortcut-label">Dashboard</span></a></li>
			    <li> <a href="eis_admin_manage_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Manage Leaves</span></a></li>
                
                <li><a href="eis_admin_manage_users.php"><i class="shortcut-icon icon-barcode"></i></i><span class="shortcut-label">Manage Users</span></a>
                </li>
                
			    <li class="dropdown active"><a href="eis_admin_manage_employees.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Manage Employees</span></a>
                
                	<ul class="dropdown-menu">
                	<li ><a href="eis_admin_manage_employees.php">Employees</a></li>
                    <li><a onClick="window.open('add2.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=850, height=900,position=center');">Add New Employee</a></li>
                	</ul>
                </li>
		      <li> <a href="eis_admin_manage_dept.php" > <i class="shortcut-icon icon-group"></i> <span class="shortcut-label">Manage Department</span></a></li>
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
          <h3>View Profile</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
            <?php
			if(isset($_GET['emp_id'])){
				$emp_id=$_GET['emp_id'];
				$find=mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
				while($found=mysql_fetch_assoc($find)){
					
					
							
			
			?>
            <table width="965" class="table-bordered table-condensed">
            	<tr>
            		<td align="center">
            		<?php $find_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$emp_id'");
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
					<ul class="gallery-container">
						<li align="center"><a href="#changepic" class="btn btn-block btn-info" data-toggle="modal">Change Picture</a></li>
					</ul>
            		</td>
					
                    <td>
                    <table class=" table-striped">
                    	<tr>
                        	<td style=" font:Century Gothic"><h1 style=" font:Century Gothic">Profile of <b><?php echo $found['f_name'].'&nbsp;'.$found['l_name'].'&nbsp;'.$found['name_extension']; ?></b></h1></td>
                        </tr>
                    	<tr>
            				<td><h1></h1>
                    		</td>
                    	</tr>
                        <tr>
                    		<td>
                            <?php 
							$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$emp_id'");
								while($found_role=mysql_fetch_assoc($find_role)){
									$pos_id=$found_role['role_id'];
									$find_pos=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$pos_id'");
									while($found_pos=mysql_fetch_assoc($find_pos)){
							
							
							?>
            				(<?php echo $found_pos['position_title'].'&nbsp;'.$found_pos['position_type'];
									}
								}
							
							 ?>)
            				</td>
                        </tr>    
            		</table>	
					</td>
            	</tr>
            </table>
			
			<br/>
			<hr/>
           
            	
		    <div class="widget stacked">
					
				<div class="widget-header">
					<i class="icon-bookmark"></i>
					<h3>Personal Details</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
                <table width="900" class="table-striped">
                    <tr>
                        <td width="82" align="right">Full Name:&nbsp;</td>
                        <td width="358"><b><?php echo $found['f_name'].'&nbsp;'.$found['m_name'].'&nbsp;'.$found['l_name'].'&nbsp;'.$found['name_extension']; ?></b></td>
                        <td width="174" align="right">Date of Birth(yyyy-mm-dd):&nbsp;</td>
                        <td width="266"><b><?php echo $found['b_date']; ?></b></td>
                    </tr>
					<tr>
                    <?php 
							$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$emp_id'");
								while($found_role=mysql_fetch_assoc($find_role)){
									$pos_id=$found_role['role_id'];
									$find_pos=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$pos_id'");
									while($found_pos=mysql_fetch_assoc($find_pos)){
							
							
							?>
                    	<td align="right">Position:&nbsp;</td>
                        <td><b><?php echo $found_pos['position_title']; ?></b></td>
                        <td align="right">Status:&nbsp;</td>
                        <td><b><?php echo $found_pos['position_type']; ?></b></td>
                    <?php 
									}
								}
					
					?>
                    </tr>
                    <tr>
                    	<td align="right">Address:&nbsp;</td>
                        <td><b><?php echo $found['address']; ?></b></td>
                        <td align="right">Contact No:&nbsp;</td>
                        <td><b><?php echo $found['contact_no1'].'&nbsp;&nbsp;&frasl;&nbsp;&nbsp;'.$found['contact_no2'].'&nbsp;&nbsp;&frasl;&nbsp;&nbsp;'.$found['contact_no3']; ?></b></td>
                    </tr>
              	</table>
                
                <hr/>
                
                <table width="897" class="table-striped">
                <tr>
                    <td width="259" align="center"><b><a  onClick="window.open('eis_admin_view_PDS.php?emp_id=<?php echo $emp_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1050, height=900,position=center');" id="view_pds" class="btn btn-grey"><i class="icon-file"></i>View PDS</a></b></td>
                    <td width="336" align="center"><b><a  onClick="window.open('editPDS.php?id=<?php echo $emp_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1050, height=900,position=center');" id="edit_pds" class="btn btn-grey"><i class="icon-edit"></i>Edit PDS</a></b></td>
                    
                </tr>
                </table>
                
                <hr/>
           	  </div> 
			  <!-- /widget-content -->
				
			</div> 
			  <!-- /widget -->
			
            <div class="widget stacked">
            	<div class="widget-header">
                <i class="icon-barcode"></i>
                <h3>Account Details</h3>
                </div>
                
                <div class="widget-content">
                <table width="895" class="table-striped">
                <?php
					$find_no=mysql_query("SELECT * FROM employee_account_t WHERE emp_id='$emp_id'");
					$found_no=mysql_fetch_assoc($find_no);
					$acc_no=$found_no['account_no'];
					$find_acc=mysql_query("SELECT * FROM account_t WHERE account_no='$acc_no'");
					$found_acc=mysql_fetch_assoc($find_acc);
				 ?>
                <tr>
                	<td width="91" align="right">Username:&nbsp;</td>
                    <td width="173"><b><?php echo $found_acc['username']; ?></b></td>
                	<td width="159" align="right">Password:&nbsp;</td>
                    <td width="217"><b><?php echo $found_acc['password']; ?></b></td>
                    <td width="136" align="right">Account Type:&nbsp;</td>
                    <td width="91"><b><?php echo $found_acc['type']; ?></b></td>
                </tr>
                
                <tr>
               
                	<td></td>
                    <td align="center"><b></b></td>
                    <td></td>
                    <!--<td align="center"><b><a  href="#change_pass" id="change_pass" class="button block grey"><i class="icon-edit"></i>Change Password</a></b></td>
                    -->
                </tr>
                
                </table>
                </div>
            </div>
            
            <div class="widget stacked">
            	<div class="widget-header">
            		<i class="icon-file"></i>
            		<h3>Leave Credits Summary</h3>
            	</div>
                 <?php 
				$find_cred=mysql_query("SELECT * FROM eis_leave_credits_t WHERE emp_id='$emp_id'");
				$found_cred=mysql_fetch_assoc($find_cred);
				
				?>
                <div class="widget-content">
                <table width="891" class="table-striped">
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
            Employee profile here. :)

			<?php
							
						
					
				} 
			}
			?>
          </div>
          </div>
		  
		  <div class="modal fade hide" id="changepic">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Change Picture of ...</h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="change_pic" id="validation-form" action="change_pic_action.php" method="post" enctype="multipart/form-data">
                              <fieldset>
						 <table class="table" width="816" >
						 <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>"/>
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">Upload Pictutre</label>
						      <div class="controls">
							  <tr>
						        <td rowspan="6"><div id="dpic"><center><img src="include/dpic/default.jpg" id="chng_dpic" onBlur="chk_img()" id="d_pic"/><center><br />
												<input  type="file" name="dpic_usr" id="dpic_usr"   onchange="readURL(this);"  style="height:20px" /></div></td>
								</tr>
							  </div>
						    </div> </td>
                            </tr>
                             </table>                       
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="Change" value="Change" >

                              </fieldset>
                            </form>

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
<!-- InstanceEnd -->
<script src="../js/plugins/hoverIntent/jquery.hoverIntent.minified.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/demo/gallery.js"></script>
</html>
<?php } ?>