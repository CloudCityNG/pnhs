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
			    <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
			    <li class="active"> <a href="account_list.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Accounts</span></a></li>
                
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
    <div class="widget stacked widget-table action-table">
    <?php 
	include("../db/db.php");
	error_reporting(0);
	$no = $_GET['account_no'];
	$sql = mysql_query("SELECT * FROM account_t WHERE account_no='$no'");
	while($row = mysql_fetch_assoc($sql)){
	?>
        
        <!-- /widget-header -->
        <div class="widget-content" >
        
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="78%"><i class="icon-edit">&nbsp;&nbsp;&nbsp;&nbsp;</i> Edit Accounts</th>
                <th width="22%"></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th ><div id="demo" style="min-height:400px;">
                <h4><?php echo ($row['username']); ?></h4>
                  
                  <div class="tabbable">
					<ul class="nav nav-tabs">
					  <li class="active">
					    <a href="#profile" data-toggle="tab">DETAILS</a>
					  </li>
					  <li><a href="#settings" data-toggle="tab">ROLE/S</a></li>
                      <li><a href="#delete" data-toggle="tab">DELETE ACCOUNT</a></li>
					</ul>
					
					<br />
					
						<div class="tab-content">
							<div class="tab-pane active" id="profile">
                            
                  			<form action="actions/ams_edit_accountemp_action.php" method="post" class="form-horizontal" />
							
                    		<input type="hidden" name="account_no" value="<?php echo $row['account_no']; ?>">
                            	<fieldset>
									
									<div class="control-group">											
										<label class="control-label" for="username">Account No.</label>
										<div class="controls"><?php echo strtoupper($row['account_no']); ?>
											
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Account Type</label>
										<div class="controls">
											<?php echo strtoupper($row['type']); ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
									
									<div class="control-group">											
										<label class="control-label" for="lastname">Username</label>
										<div class="controls">
											<input type="text" name="username" value="<?php echo ($row['username']); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
								
									<div class="control-group">											
										<label class="control-label" for="password1">Password</label>
										<div class="controls">
											<input type="text" name="password" value="<?php echo ($row['password']); ?>">
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->
									
								
										
										<br />
									
										
									<div class="form-actions">
                                    	
                              			  <a class="btn btn" title="CANCEL" href="JavaScript:window.history.back();"> CANCEL</i></a>
                              		
                              			&nbsp;
                                		<input type="submit" class="btn btn-success" name="submit" value="EDIT">
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
							</div>
							
			<div class="tab-pane" id="settings">
			<a class="btn btn-success" title="Add Role" onClick="window.open('ams_add_emprole.php?id=<?php echo $_GET['account_no']; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=600,position=center');"><i class="icon-plus-sign">&nbsp;</i>Add Role</a>&nbsp;
            <p>&nbsp;</p>
            <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%">
                <thead>
                    <tr>
                          <th><div align="center">Role/s</div></th>
                          <th><div align="center">Action</div></th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					$acc = $_GET['account_no'];
					$role=mysql_query("SELECT * FROM account_t, account_privilege_t, account_permission_t
										WHERE account_t.account_no = account_permission_t.account_no
										AND  account_privilege_t.privilege_id = account_permission_t.privilege_id
										AND account_t.account_no = '$acc'");
                        while($row=mysql_fetch_array($role)){ 
						$id=$row['account_no']; ?>
                        <tr class="del<?php echo $id ?>">
                          <td height="30"><div align="center"><?php echo ucfirst($row['privilege_name']); ?></div></td>
                  		  <td align="center" width="150">  <div align="center">
                              <a class="btn-mini btn" title="Delete Account" href="JavaScript:if(confirm('Are you sure you want to delete this role?')==true)
							{window.location='actions/ams_delete_role_action.php?account_no=<?php echo $acc;?>&privilege=<?php echo $row['privilege_name'];?>';}"><i class="icon-remove"></i>&nbsp;Delete</a> </div></td>
                        </tr>
                  <?php }?>
                </tbody>
		</table> 
        
          		</div>
                            
                            <div class="tab-pane" id="delete">
			                  <div align="center">Are you sure you want to delete this account? <br><br>
                                <a class="btn btn" title="Delete Account" href="JavaScript:if(confirm('Are you sure you want to delete this account?')==true){window.location='actions/ams_delete_account_action.php?account_no=<?php echo $acc; ?>';}"><i class="icon-remove"></i>&nbsp;Delete Account</a>  
          
                    
							  </div>
                            </div>
							
					  </div>
					  
					  
					</div>
                  
                </div></th>
                <th style="background-color:#F0F0F0">
                
                  
                  <a class="btn btn-block" href="account_list.php"><i class="icon-list-alt"></i>&nbsp;View Accounts</a>
                  <a class="btn btn-block" href="ams_add_account_choice.php"><i class="icon-plus-sign"></i> Add Account</a>
                  <a class="btn btn-block" href="ams_emp_accounts.php"><i class="icon-user"></i> Employee Accounts</a>
                  <a class="btn btn-block" href="ams_nonemp_accounts.php"><i class="icon-group"></i> Non-Employee Accounts</a>
                  
                </th>
              </tr>
            </tbody>
          </table>&nbsp;
          
        </div>
        <!-- /widget-content -->
        <?php } ?>
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
