<!DOCTYPE html>
<?php 
 @session_start();
 


?>
<?php 
include("../db/db.php");
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
			    <li> <a href="eis_admin_dashboard.php"> <i class="icon-home"></i><span class="shortcut-label">Dashboard</span></a></li>
			    <li class="active"> <a href="eis_admin_manage_leave.php" > <i class="shortcut-icon icon-file"></i> <span class="shortcut-label">Manage Leaves</span></a></li>
                
                <li><a href="eis_admin_manage_users.php"><i class="shortcut-icon icon-barcode"></i></i><span class="shortcut-label">Manage Users</span></a>
                </li>
                
			    <li class="dropdown"><a href="eis_admin_manage_employees.php" class="dropdown-toggle" data-toggle="dropdown"> <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Manage Employees</span></a>
                
                	<ul class="dropdown-menu">
                	<li><a href="eis_admin_manage_employees.php">Employees</a></li>
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
    <div class="widget-content">
    <?php 
include ('../db/db.php');

if(isset($_POST['ADD'])){
	$holiday_name=$_POST['holiday_name'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$hol_date = $month."-".$day;
	
	$query_add=mysql_query("INSERT INTO holidays_t VALUES('','$holiday_name','$hol_date')");
	
	echo "<script type='text/javascript'> 
			alert('Succesfully added!');
			</script>";
	}
	
if(isset($_POST['update'])){
	$name=$_POST['name'];
	$h_name=$_POST['prev_name'];
	
	$date=$_POST['date'];
	$day=$_POST['day'];
	$id=$_POST['id'];
	
	$hol_date = $date."-".$day;
	
	$name_update=mysql_query("UPDATE holidays_t SET holiday_name='$name' WHERE holiday_name='$h_name' AND holiday_id='$id'");
	$date_update=mysql_query("UPDATE holidays_t SET holiday_date='$hol_date' WHERE holiday_id='$id'");
	
	echo "<script type='text/javascript'> 
			alert('Succesfully updated!');
			</script>";
	}
	
	if(isset($_POST['delete'])){
	$d_id=$_POST['d_id'];
	
	
	$delete=mysql_query("DELETE FROM `holidays_t` WHERE holiday_id='$d_id'");
	
	echo "<script type='text/javascript'> 
			alert('Succesfully Deleted!');
			</script>";
	}

?>
    
    
                    <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-calendar"></i>Manage Holiday</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >

           <div id="demo" style="min-height:400px;" >
            <table cellpadding="0" cellspacing="0" border="0" class="table-hover" id="example" width="100%">
                <thead>
                    <tr>
						<th>Holiday ID</th>
                        <th>Holiday Name</th>
                        <th>Holiday Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT * FROM holidays_t");
					
					while ($row=mysql_fetch_assoc($query)){ 
							$id=$row['holiday_id'];
							$name=$row['holiday_name'];
							$date=$row['holiday_date'];
							?>
                            
					    <tr class="del<?php echo $id ?>">
							<td align="center"><div align="center"><?php echo $id; ?></td>
                            <td align="center"><div align="center"><?php echo ucfirst($row['holiday_name']); ?></div></td>
                            
                            
                            <td>
							<?php 
								$month= substr($date, 0, 2);
								switch($month){
									case 1: echo "January "; break;
									case 2: echo "February "; break;
									case 3: echo "March "; break;
									case 4: echo "April"; break;
									case 5: echo "May "; break;
									case 6: echo "June"; break;
									case 7: echo "July "; break;
									case 8: echo "August "; break;
									case 9: echo "September "; break;
									case 10: echo "October "; break;
									case 11: echo "November "; break;
									case 12: echo "December "; break;
								}
								echo $month." ";
								echo "(".$row['holiday_date'].")"; 
							?>
                            </td>
                            
                            <td align="center"><a class="btn btn-success btn-mini" href="#update<?php echo str_replace(" ","_",$date);echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>" data-toggle="modal" id="<?php echo str_replace(" ","_",$date);echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>"><i class="icon-plus"></i>Update</a><a class="btn btn-danger btn-mini" href="#delete<?php echo str_replace(" ","_",$date);echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>" data-toggle="modal" id="<?php echo str_replace(" ","_",$date);echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>"><i class="icon-remove"></i>Delete</a></td>
                        </tr>
    

<div class="modal fade hide" id="delete<?php echo str_replace(" ","_",$date); echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal">&times;</button>
    		<h3>DELETE HOLIDAY </h3>
  		</div>
 	 <div class="modal-body">
 							<form class="form-horizontal" name="delete_holiday" id="validation-form" action="eis_admin_holidays.php" method="post">
                              <fieldset>
						 
						  <div class="control-group">
						      	<label class="control-label">ARE YOU SURE YOU WANT TO DELETE HOLIDAY: <?php echo str_replace("_"," ",$name); ?></label>
						      <div class="controls">
                                
						        <input type="hidden" class="input-large" name="d_id" id="d_id" value="<?php echo str_replace("_"," ",$id); ?>" />

                              </div>
						   </div> 
                           
          
                                                
  		<div class="modal-footer">
    	<a href="javascript:;" class="btn" data-dismiss="modal" >Close</a>
        <input class="btn btn-danger" type="submit" name="delete" value="DELETE" >
		</div>
                              </fieldset>
                            </form>
                            
	</div>
 </div>
	
 <div class="modal fade hide" id="update<?php echo str_replace(" ","_",$date); echo str_replace(" ","_",$name);echo str_replace(" ","_",$id); ?>">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal">&times;</button>
    		<h3>UPDATE HOLIDAY </h3>
  		</div>
 	 <div class="modal-body">
 							<form class="form-horizontal" name="update_municipality" id="validation-form" action="eis_admin_holidays.php" method="post">
                              <fieldset>
						 
						  <div class="control-group">
						      	<label class="control-label">HOLIDAY NAME</label>
						      <div class="controls">
                                <input type="text" class="input-large" name="name" id="name" value="<?php echo str_replace("_"," ",$name); ?>" />
						        <input type="hidden" class="input-large" name="prev_name" id="prev_name" value="<?php echo str_replace("_"," ",$name); ?>" />

                              </div>
						   </div> 
                           
                           <div class="control-group">
						      	<label class="control-label">HOLIDAY MONTH</label>
						      <div class="controls">
                              
                            <select class="input-large" name="date" id="date" value="
							<?php 
								$month= substr($date, 0, 2);
								echo str_replace("_"," ",$month); 
							?>" />
                                    <option <?php if ($month == 1 ) echo 'selected'; ?> value="01"> January</option>
                                    <option <?php if ($month == 2 ) echo 'selected'; ?> value="02"> February</option>
                                    <option <?php if ($month == 3 ) echo 'selected'; ?> value="03"> March</option>
                                    <option <?php if ($month == 4 ) echo 'selected'; ?> value="04"> April</option>
                                    <option <?php if ($month == 5 ) echo 'selected'; ?> value="05"> May</option>
                                    <option <?php if ($month == 6 ) echo 'selected'; ?> value="06"> June</option>
                                    <option <?php if ($month == 7 ) echo 'selected'; ?> value="07"> July</option>
                                    <option <?php if ($month == 8 ) echo 'selected'; ?> value="08"> August</option>
                                    <option <?php if ($month == 9 ) echo 'selected'; ?> value="09"> September</option>
                                    <option <?php if ($month == 10 ) echo 'selected'; ?> value="10"> October</option>
                                    <option <?php if ($month == 11 ) echo 'selected'; ?> value="11"> November</option>
                                    <option <?php if ($month == 12 ) echo 'selected'; ?> value="12"> December</option>
                                </select>
                                
						        <input type="hidden" class="id" name="prev_date" id="id" value="<?php echo str_replace("_"," ",$id); ?>" />

                              </div>
						   </div> 
                           
                           <div class="control-group">
						      	<label class="control-label">HOLIDAY DAY</label>
						      <div class="controls">
                                <select type="text" class="input-large" name="day" id="day"  /> <!--value="<?php //$day= substr($date, -2); echo str_replace("_"," ",$day); ?>"-->
									<option value="<?php $day= substr($date, -2); echo str_replace("_"," ",$day); ?>"><?php $day= substr($date, -2); echo str_replace("_"," ",$day); ?></option>
									
                                    <option value="01"> 1</option>
                                    <option value="02"> 2</option>
                                    <option value="03"> 3</option>
                                    <option value="04"> 4</option>
                                    <option value="05"> 5</option>
                                    <option value="06"> 6</option>
                                    <option value="07"> 7</option>
                                    <option value="08"> 8</option>
                                    <option value="09"> 9</option>
                                    <option value="10"> 10</option>
                                    <option value="11"> 11</option>
                                    <option value="12"> 12</option>
                                    <option value="13"> 13</option>
                                    <option value="14"> 14</option>
                                    <option value="15"> 15</option>
                                    <option value="16"> 16</option>
                                    <option value="17"> 17</option>
                                    <option value="18"> 18</option>
                                    <option value="19"> 19</option>
                                    <option value="20"> 20</option>
                                    <option value="21"> 21</option>
                                    <option value="22"> 22</option>
                                    <option value="23"> 23</option>
                                    <option value="24"> 24</option>
                                    <option value="25"> 25</option>
                                    <option value="26"> 26</option>
                                    <option value="27"> 27</option>
                                    <option value="28"> 28</option>
                                    <option value="29"> 29</option>
                                    <option value="30"> 30</option>
                                    <option value="31"> 31</option>
								
								</select>
								
						        <input type="hidden" class="input-large" name="id" id="id" value="<?php echo str_replace("_"," ",$id); ?>" />

                              </div>
						   </div> 
                                                
  		<div class="modal-footer">
    	<a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="update" value="UPDATE" >
		</div>
                              </fieldset>
                            </form>
                            
	</div>
 </div>
 
 
 
 


				<?php	} ?>
                </tbody>
		</table>
            
          </div>
                </th>
                <th style="background-color:#F0F0F0">
 					<a  href="eis_admin_manage_leave.php" class="btn btn-block" ><span><i class=" icon-file"></i></span>Manage Leave</a>
                    <a  href="eis_admin_manage_credits.php" class="btn btn-block" ><span><i class=" icon-credit-card"></i></span>Manage Leave Credits</a>
                    <hr style="color:#000"/>
                  <a class="btn btn-block" href="#add" data-toggle="modal"><span><i class="icon-calendar"></i></span>   Add Holiday</a>
                  
                </th>
              </tr>
            </tbody>
          </table>
        <!-- /widget-content -->
      </div>
      

<div class="modal fade hide" id="add">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>ADD HOLIDAY </h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="add_municipality" id="validation-form1" action="eis_admin_holidays.php" method="post">
                              <fieldset>
						 <table class="table" width="816" >
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="municipality_name">HOLIDAY NAME</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="holiday_name" id="holiday_name" />
						      </div>
						    </div> </td>
                            </tr>
                            
                            <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="municipality_name">MONTH</label>
						      <div class="controls">
						        <select class="input-large" name="month" id="month" />
                                	<option disabled selected> Select Month</option>
                                    <option value="01"> January</option>
                                    <option value="02"> February</option>
                                    <option value="03"> March</option>
                                    <option value="04"> April</option>
                                    <option value="05"> May</option>
                                    <option value="06"> June</option>
                                    <option value="07"> July</option>
                                    <option value="08"> August</option>
                                    <option value="09"> September</option>
                                    <option value="10"> October</option>
                                    <option value="11"> November</option>
                                    <option value="12"> December</option>
                                </select>
                                
						      </div>
						    </div> </td>
                            </tr>
                            
                            <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="municipality_name">DAY</label>
						      <div class="controls">
						        <select class="input-large" name="day" id="day" />
                                	<option disabled selected> Select Day</option>
                                    <option value="01"> 1</option>
                                    <option value="02"> 2</option>
                                    <option value="03"> 3</option>
                                    <option value="04"> 4</option>
                                    <option value="05"> 5</option>
                                    <option value="06"> 6</option>
                                    <option value="07"> 7</option>
                                    <option value="08"> 8</option>
                                    <option value="09"> 9</option>
                                    <option value="10"> 10</option>
                                    <option value="11"> 11</option>
                                    <option value="12"> 12</option>
                                    <option value="13"> 13</option>
                                    <option value="14"> 14</option>
                                    <option value="15"> 15</option>
                                    <option value="16"> 16</option>
                                    <option value="17"> 17</option>
                                    <option value="18"> 18</option>
                                    <option value="19"> 19</option>
                                    <option value="20"> 20</option>
                                    <option value="21"> 21</option>
                                    <option value="22"> 22</option>
                                    <option value="23"> 23</option>
                                    <option value="24"> 24</option>
                                    <option value="25"> 25</option>
                                    <option value="26"> 26</option>
                                    <option value="27"> 27</option>
                                    <option value="28"> 28</option>
                                    <option value="29"> 29</option>
                                    <option value="30"> 30</option>
                                    <option value="31"> 31</option>
                                </select>
                                
						      </div>
						    </div> </td>
                            </tr>
                             
                             </table>                       
  	<div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="ADD" value="ADD" >
	</div>
                              </fieldset>
                            </form>

 	 </div>
  </div>
  
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
