<!DOCTYPE html>
<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
	
	//$s_type=("employee");
	//if($_SESSION['user_type']==$s_type){
		
		
		//header("location: SIS-Home_restrict2.php");
		
	//	}
	
}
else
	header("location: restrict.php"); // IMPORTANT!!!!
?>

<html lang="en"><!-- InstanceBegin template="/Templates/sisadmin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
  <meta charset="utf-8" />
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Pagasa National Highschool:: Base Admin</title>
  <!-- InstanceEndEditable -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
      <link href="./css/pages/reports.css" rel="stylesheet" />
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
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
			
			<a class="brand" href="../index.html">
				Pagasa National Highschool <sup>2.0.1</sup>
			</a>		
			
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
				  <li class="dropdown">
						
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="icon-user"></i>			<?php
							include('../db/db.php');
							
							$queryid = mysql_query("SELECT * FROM employee_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['emp_id'];
							$queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$id'");
							$getemp = mysql_fetch_assoc($queryemp);
							$fname = $getemp['f_name'];
							$lname = $getemp['l_name'];
							echo $fname.'&nbsp;'.$lname;
							?>
						  <b class="caret"></b>
					  </a>
						
					  <ul class="dropdown-menu">
						 
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
			</a>

			<div class="subnav-collapse collapse">
			
			<!-- InstanceBeginEditable name="navbar" -->
			  <ul class="mainnav">
                <li> <a href="sis-admin-home.php"> <i class="icon-calendar"></i> <span>Home</span> </a> </li>
			    <li> <a href="sis-admin-students.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Students</span> </a> </li>
	   	        <li> <a href="sis-admin-alumni.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Alumni</span> </a> </li>
		        <li class="active"> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Clubs</span> </a> </li>
			    <li> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Offenses</span> </a> </li>
		      </ul>
		    <!-- InstanceEndEditable -->
            
            </div> <!-- /.subnav-collapse -->

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
	
	<!-- InstanceBeginEditable name="content" -->
    
      <div class="widget stacked">
        <div class="widget-header"> <i class="icon-pencil"></i>
          <h3>Update Club</h3>
        </div>
        <!-- /widget-header -->
        
        <div class="widget-content">
       
    <!--   <h2><a href="sis-admin-add-members.php?Add=<?php// echo $_GET['Edit']; ?>" style="text-decoration:none;">Add Members?</a> </h2>  -->
          <?php
require('../db/db.php');
	
	 if(isset($_GET['Edit'])&&isset($_GET['Edit2'])){
	  $club_id = $_GET['Edit'];
	  $club_adv = $_GET['Edit2'];
	  
	  $queryca = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$club_adv'");
	  $getca = mysql_fetch_assoc($queryca);
	  $ca1 = $getca['f_name'];
	  $ca2 = $getca['m_name'];
	  $ca3 = $getca['l_name'];
	 
	
	$search2 = mysql_query("select * from club_t where club_id = '$club_id' ");
	
	//$members =  mysql_query("select * from club_members_t where club_id = '$club_id'");

	$finddata = mysql_fetch_array($search2);
	
//	$c_id = $finddata['club_id'];
	//$club_name = $finddata['club_name'];
	//$c_adv = $finddata['club_adviser'];
	//$club_status = $finddata['club_status'];
	
	 
	 
	
	 ?>
        
 

                 <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT * FROM club_members_t WHERE club_id='$club_id'");
                    
					while($row=mysql_fetch_array($query)){ 
					$id=$row['club_id'];
					$s_id=$row['student_id']; 
					
					$query2=mysql_query("SELECT * FROM student_t WHERE student_id='$s_id' ");
					while($row2=mysql_fetch_array($query2)){ ?>
                   
                    <?php
					}
					}
					?>
                    

    <div style="background-color:#DAFEC5; border-radius:20px; margin: 10px 20px 20px 50px; box-shadow:0 0 30px #000000; height:300px; width:350px;">  
    <br>
	<br>
           <table>
      
      
      
      
       	<form method="post" action="sis-actions/update_action.php?old_name=<?php echo $finddata[1]; ?>">
					
                    <tr align="left">
                    <td>&nbsp;&nbsp;Club ID: </td><td align="left"><input type="hidden" name="club_id" value="<?php echo $finddata[0]; ?>" /><?php echo $finddata[0]; ?></td>
                    </tr>
                    <tr align="left">
                    <td>&nbsp;&nbsp;Club Name: </td><td><input name="newclub_name" type="text" value="<?php echo $finddata[1]; ?>" /></td>
                    </tr>
                     <tr align="left">
                    <td>&nbsp;&nbsp;Club Adviser: </td><td>
                    <select name="newclub_adv">
                    <?php
					$queryadv = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$finddata[2]'");
					$getadv = mysql_fetch_assoc($queryadv);
					echo '<option value="'.$getadv['emp_id'].'">'.$getadv['l_name'].',&nbsp'.$getadv['f_name'].'</option>';
						
						
						$queryemployee = mysql_query("SELECT * FROM employee_t");
						while($getemployee=mysql_fetch_assoc($queryemployee)){
							$check=0;
							$employee=$getemployee['emp_id'];
							
							$queryrole = mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$employee'");
							//if(mysql_num_rows($queryrole) != 0){
							$getrole=mysql_fetch_assoc($queryrole);
							$role=$getrole['role_id'];
							
							$querypostype=mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role'");
							$getpostype=mysql_fetch_assoc($querypostype);
							$postype=$getpostype['position_type'];
							
							if($postype == 'teaching'){
							
							$queryadviser=mysql_query("SELECT * FROM club_t");
							while($getadviser=mysql_fetch_assoc($queryadviser)){
								$adviser=$getadviser['club_adviser'];
								if($employee == $adviser){
									$check=$check+1;
								}
							}
								if($check == 0){
									$dep=$getemployee['dept_id'];
									$qdep=mysql_query("SELECT * FROM department_t WHERE dept_id = '$dep'"); 
									$gdep=mysql_fetch_assoc($qdep);
									$depname=$gdep['dept_name'];
									echo '<option value="'.$employee.'">'.$getemployee['l_name'].',&nbsp;'.$getemployee['f_name'].'&nbsp;-&nbsp;'.$depname.'</option>';
									
								}
							}
							//}
						}
						?>
                        </select>
                    </td>
                    </tr>
                                      <tr align="left">
                    <td>&nbsp;&nbsp;Status: </td>
                    <td>
                    <select name="status">
                    <?php
					if($finddata[3] == 'Active'){
						echo '<option value="Active">Active</option>
							  <option value="Inactive">Inactive</option>';
							 
					}
					else if($finddata[3] == 'Inactive'){
						echo '<option value="Inactive">Inactive</option>
							  <option value="Active">Active</option>';
							 
					}
					 ?>
                    
                    </select>
                    </td>
                    </tr>
                    <tr align="right">
                    <td>&nbsp;</td>
                    <td align="right"><input type="submit" name="Update" value="Update" class="btn btn-success" />&nbsp;&nbsp;<a href="sis-admin-clubs.php" class="btn btn-tertiary">Cancel</a></td>
                    </tr>
                                       					 
                    <tr><td>&nbsp;</td></tr>
       				</form>
                   
  
       			</table>
    </div>

                       <?php 
					}
					?>
      </div>
      <!-- /span6 -->
      
    <!-- InstanceEndEditable -->
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
