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
    <div class="widget stacked widget-table action-table">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-plus-sign"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add New Account</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th ><form class="form-horizontal" action="**.php" method="post">
                  <table width="381" height="219" border="0">
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Account Type</label>
                          <div class="controls">
                            <select class="select_ttl" name="select" id="select">
                              <option value='' selected='selected' disabled='disabled'>Select Type</option>
                              <option value='1'>Admin</option>
                              <option value='2'>Employee</option>
                              <option value='3'>Student</option>
                            </select>
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Account No.</label>
                          <div class="controls">
                            <input name="account_no" type="text" placeholder="Account No.">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Employee First Name</label>
                          <div class="controls">
                            <input name="f_name" type="text" placeholder="First Name">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Middle Name</label>
                          <div class="controls">
                            <input name="m_name" type="text" placeholder="Middle Name">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Last Name</label>
                          <div class="controls">
                            <input name="l_name" type="text" placeholder="Last Name">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Module</label>
                          <div class="controls">
                            <select class="select_ttl" name="select" id="select">
                              <option value='' selected='selected' disabled='disabled'>Select Module</option>
                              <option value='1'>Scheduling</option>
                              <option value='2'>Registration</option>
                              <option value='3'>Grading</option>
                              <option value='4'>SIS</option>
                              <option value='5'>EIS</option>
                              <option value='6'>Library</option>
                              <option value='7'>Inventory</option>
                            </select>
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div class="control-group">
                          <label class="control-label" for="name">Role</label>
                          <div class="controls">
                            <input name="role" type="text" placeholder="Role">
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
                            <input name="password" type="password" placeholder="Password">
                          </div>
                      </div></td>
                    </tr>
                    <tr>
                      <td colspan="2"><div align="center">
                          <p>
                          <table class="table" width="auto" >
                            <tr>
                              <div align="center"> &nbsp;
                                  <input name="reset" type="reset" value="Reset All" class="btn">
                                  <input name="submit" type="submit" value="Add Account" class="btn btn-success">
                              </div>
                            </tr>
                          </table>
                        </p>
                      </div></td>
                    </tr>
                  </table>
                </form></th>
                <th style="background-color:#F0F0F0">
                    <a class="btn btn-block" href="account_list.php"><i class="icon-group"></i>&nbsp;View Accounts</a>
                    <a class="btn btn-block" onClick="window.open('ams_add_account.php?account_no=<?php echo $row["account_no"];?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=600,position=center');"><i class="icon-plus"></i> Add Account</a>
        			<a class="btn btn-block" href="account_type.php"><i class="icon-file-alt"></i> Account Types</a>  
                  
                </th>
              </tr>
            </tbody>
          </table>
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
