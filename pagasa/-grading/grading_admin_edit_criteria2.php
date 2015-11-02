<?php require_once('../Connections/pagasa.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE grading_criteria SET quizzes=%s, assignments=%s, participation=%s, chapter_test=%s, projects=%s, `periodical exam`=%s WHERE criteria_id=%s",
                       GetSQLValueString($_POST['quizzes'], "int"),
                       GetSQLValueString($_POST['assignments'], "int"),
                       GetSQLValueString($_POST['participation'], "int"),
                       GetSQLValueString($_POST['chapter_test'], "int"),
                       GetSQLValueString($_POST['projects'], "int"),
                       GetSQLValueString($_POST['periodical_exam'], "int"),
                       GetSQLValueString($_POST['criteria_id'], "int"));

  mysql_select_db($database_pagasa, $pagasa);
  $Result1 = mysql_query($updateSQL, $pagasa) or die(mysql_error());

  $updateGoTo = "grading_admin_criteria.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_pagasa, $pagasa);
$query_Recordset1 = "SELECT * FROM grading_criteria";
$Recordset1 = mysql_query($query_Recordset1, $pagasa) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>


<html lang="en"><!-- InstanceBegin template="/Templates/grading_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
 <?php
  @session_start();
  include "../db/db.php";
  include "../actions/user_privileges.php";
  
  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $adviser = is_privileged($_SESSION['account_no'], 10);
  $teacher = is_privileged($_SESSION['account_no'], 12);
  
  if(!$developer && !$super_admin && !$adviser && !$teacher){
      header("Location: restrict.php");  
  }
  
  ?>
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
							<?php echo $dbusername=$_SESSION['username']; ?>
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
			    <li> <a href="../home.php"> <i class="icon-chevron-left"></i> <span></span></a></li>
			    <li> <a href="grading_admin_home.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">HOME</span></a></li>
                <li class="active"> <a href="#" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">CRITERIA</span></a></li>
			   
			    
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
          <h3>CRITERIA</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
        
           <div id="demo" style="min-height:400px;">
            
					<?php
						$criteria_id=$_GET['criteria_id'];
						echo "CRITERIA NUMBER: ". $criteria_id;
						
						$criteria_q=mysql_query("SELECT * FROM grading_criteria WHERE criteria_id='$criteria_id'");
						$criteria_data=mysql_fetch_assoc($criteria_q);
						$criteria_id=$criteria_data['criteria_id'];
						
						while ($row=mysql_fetch_assoc($criteria_q)){
							
					?>
           	  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
              
  <table align="center">
    <tr valign="baseline">
    	
      <td nowrap align="right">Quizzes:</td>
      <td><input type="text" name="quizzes" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Assignments:</td>
      <td><input type="text" name="assignments" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Participation:</td>
      <td><input type="text" name="participation" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Chapter_test:</td>
      <td><input type="text" name="chapter_test" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Projects:</td>
      <td><input type="text" name="projects" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Periodical exam:</td>
      <td><input type="text" name="periodical_exam" value="" size="32"></td>
    </tr>
   
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Save" class="btn">&nbsp;<input type="reset" value="Clear fields" class="btn"></td>
  
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
                    <?php } ?>
                    <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
                      <table align="center">
                        <tr valign="baseline">
                          <td nowrap align="right">Quizzes:</td>
                          <td><input type="text" name="quizzes" value="<?php echo htmlentities($row_Recordset1['quizzes'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Assignments:</td>
                          <td><input type="text" name="assignments" value="<?php echo htmlentities($row_Recordset1['assignments'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Participation:</td>
                          <td><input type="text" name="participation" value="<?php echo htmlentities($row_Recordset1['participation'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Chapter_test:</td>
                          <td><input type="text" name="chapter_test" value="<?php echo htmlentities($row_Recordset1['chapter_test'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Projects:</td>
                          <td><input type="text" name="projects" value="<?php echo htmlentities($row_Recordset1['projects'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="right">Periodical exam:</td>
                          <td><input type="text" name="periodical_exam" value="<?php echo htmlentities($row_Recordset1['periodical_exam'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
                        </tr>
      
                        <tr valign="baseline">
                          <td nowrap align="right">&nbsp;</td>
                          <td><input type="submit" class="btn" value="Save"></td>
                        </tr>
                      </table>
                      <input type="hidden" name="MM_update" value="form2">
                      <input type="hidden" name="criteria_id" value="<?php echo $row_Recordset1['criteria_id']; ?>">
                    </form>
                    <p>&nbsp;</p>

            
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
mysql_free_result($Recordset1);
?>
