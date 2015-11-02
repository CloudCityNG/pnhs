<!DOCTYPE html>
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
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
                <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span> </a> </li>
                <li> <a href="sis-admin-home.php"> <i class="icon-table"></i> <span>Accounts</span> </a> </li>
                
			    <li> <a href="sis-admin-students.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Students</span> </a> </li>
	   	        <li class="active"> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Clubs</span> </a> </li>
		        <li> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Offenses</span> </a> </li>

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
   		  
   		<div class="widget stacked widget-table action-table">
       <?php $query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sy_id=$row_sy['sy_id'];
					$sy_start=$row_sy['sy_start']; 
					$sy_end=$row_sy['sy_end'];
					?>
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-list"></i>CLUBS</th>
                <th align="center"> <i class="icon-plus"></i>ADD</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th>
                <div id="demo">
            <table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
                 <thead>
                    <tr>
                        <th>Club ID</th>
                        <th width="138">Club Name</th>
                        <th width="142">Club Adviser</th>
                        <th width="73">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT * FROM club_t ORDER BY club_id");
                    
					while($row=mysql_fetch_array($query)){ 
					$id=$row['club_id']; 
					
					$emp_id=$row['club_adviser'];
					$query2=mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
					$row2=mysql_fetch_assoc($query2);
					$fname=$row2['f_name'];
					$l_name=$row2['l_name'];
					
					?>
                    <tr class="del<?php echo $id ?>">
                      <td  align="center" width="65"><?php echo $row['club_id']; ?></td>
                      <td align="center"><?php echo ucfirst($row['club_name']); ?></td>
                      <td align="center"><?php echo $fname."&nbsp;".$l_name; ?></td>
                      <td align="center"><?php echo $row['club_status'];?></td>
                      
                      <td align="center" width="338">      
                          <script type="text/javascript">
                             jQuery(document).ready(function() {
                             	$('#p<?php echo $id; ?>').popover('show')
                                $('#p<?php echo $id; ?>').popover('hide')
                             });
                          </script>
                                
                         <a class="btn btn-success" data-toggle="modal" href="#update<?php echo $row['club_id'];?>">&nbsp;Update Details</a> 
                        <a class="btn btn-tertiary" href='sis-admin-club-members.php?Edit=<?php echo $row["club_id"];?>'>&nbsp;List of Members</a> 
                      
						
                      </td>
                      <?php
					$club_id=$row['club_id'];
					$club_adv=$row['club_adviser'];
                    $queryca = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$club_adv'");
					  $getca = mysql_fetch_assoc($queryca);
					  $ca1 = $getca['f_name'];
					  $ca2 = $getca['m_name'];
					  $ca3 = $getca['l_name'];
					 
	
	$search2 = mysql_query("select * from club_t where club_id = '$club_id' ");
	
	//$members =  mysql_query("select * from club_members_t where club_id = '$club_id'");

	$finddata = mysql_fetch_assoc($search2);

	 
	
	 ?>
        
 

                
					
                      <div class="modal fade hide" id="update<?php echo $row['club_id'];?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Update details of <?php echo $row['club_name'];?></h3>
                          
                          </div>
                          <div class="modal-body">
                          
                          
                                               <form style="text-align:center" action="sis-admin-clubs.php?club_id=<?php echo $finddata['club_id']; ?>" method="post" enctype="multipart/form-data" id="validation-form" >

   				Club ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="club_id" value="<?php echo $finddata['club_id']; ?>" required /><?php echo $finddata['club_id']; ?>
                 <br />
                    Club Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="newclubname" type="text" value="<?php echo $finddata['club_name']; ?>" required />
                     <br />
                    Club Adviser:&nbsp;&nbsp;&nbsp;<select name="newclubadv" type="text" required />
                    <?php
				$c_adv = $finddata['club_adviser'];
										$queryname = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$c_adv'");
										$getname = mysql_fetch_assoc($queryname);
										$fname = $getname['f_name'];
										$mname = $getname['m_name'];
										$lname = $getname['l_name'];
                                       echo '<option value="'. $c_adv .'">'. 
										
										 $lname.',&nbsp;'.$fname.'</option>'; ?>
                     <?php
						
						
						$queryem = mysql_query("SELECT * FROM employee_t ORDER BY l_name");
						while($getem=mysql_fetch_assoc($queryem)){
							$chk=0;
							$em=$getem['emp_id'];
							
							$queryrol = mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$em'");
							//if(mysql_num_rows($queryrole) != 0){
							$getrol=mysql_fetch_assoc($queryrol);
							$rol=$getrol['role_id'];
							
							$queryptype=mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$rol'");
							$getptype=mysql_fetch_assoc($queryptype);
							$ptype=$getptype['position_type'];
							
							if($ptype == 'teaching'){
							
							$queryadvi=mysql_query("SELECT * FROM club_t");
							while($getadvi=mysql_fetch_assoc($queryadvi)){
								$advi=$getadvi['club_adviser'];
								if($em == $advi){
									$chk=$chk+1;
								}
							}
								if($chk == 0){
									$dept=$getem['dept_id'];
									$qdept=mysql_query("SELECT * FROM department_t WHERE dept_id = '$dept'"); 
									$gdept=mysql_fetch_assoc($qdept);
									$deptname=$gdept['dept_name'];
									echo '<option value="'.$em.'">'.$getem['l_name'].',&nbsp;'.$getem['f_name'].'&nbsp;-&nbsp;'.$deptname.'</option>';
									
								}
							}
							//}
						}
						?>

                    
                    </select>
                     <br />
                    Status:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="clubstatus" required>
                    <?php
					if($finddata['club_status'] == 'Active'){ 
						echo '<option value="Active">Active</option>
							 <option value="Inactive">Inactive</option>';
					}
					
					else if($finddata['club_status'] == 'Inactive'){
						echo '<option value="Inactive">Inactive</option>
							  <option value="Active">Active</option>';
							 
					}
					 ?>
                    
                    </select>
                    <br />
                   
<br />

					<div class="modal-footer" >
					 <input type="submit" name="Update" value="Update" class="btn btn-success" />
<a href="sis-admin-home.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
</div>
                    
					</form>
                                
                                </div><!-- /modal-body-->
                        
                          </div><!-- / modal -->  
                         
                    </tr>
                    <?php
					}
					?>

                </tbody>
                
		</table>
</div>			<!-- demo -->		

                                              <?php

if(isset($_GET['club_id'])){
	$club = $_GET['club_id'];
 if(isset($_POST['Update'])){
	$newclub_name = $_POST['newclubname'];
	$newclub_adv= $_POST['newclubadv'];
	$status = $_POST['clubstatus'];
	$id = $_POST['club_id'];

	
	$querycname = mysql_query("SELECT * FROM club_t WHERE club_id = '$club'");
	$getcname = mysql_fetch_assoc($querycname);
	$old_name = $getcname['club_name'];
	//echo $newclub_adv;

		

  	$queryclub2 = mysql_query("SELECT * FROM club_t WHERE club_name != '$old_name'");
	$count2 =0;
	while($getclub2 = mysql_fetch_assoc($queryclub2)){
		$existingclub2 = $getclub2['club_name'];
		//$existingadv2 = $getclub2['club_adviser'];
		if($existingclub2 == $newclub_name){
			$count2 = $count2+1;
			}

	}
	if ($count2 > 0 ){
		echo "<div class=\"alert-danger\"><p><font color=\"#FB374A\"><i class=\"icon-warning-sign\">This club already exists!</i></font></p></div>";
		}
	else{
		
		mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$sql = "UPDATE club_t SET club_name='$newclub_name', club_adviser='$newclub_adv', club_status = '$status' WHERE club_id='$id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	$queryid = mysql_query("SELECT * FROM employee_account_t WHERE emp_id = '$newclub_adv'");
	$getid = mysql_fetch_assoc($queryid);
	$gid = $getid['account_no'];
	$query2 = mysql_query("UPDATE club_adv_account_t SET account_no = '$gid' WHERE club_id = '$id'");
	$query3 = mysql_query("INSERT INTO account_permission_t (account_no, privilege_id) VALUES ('$gid','11')");
	mysql_query("Commit");
		}
		
		
		
   }
	

}
?> 
                </th>
                
                
                
                
                
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" href="#club" data-toggle="modal"></i> New Club</a>
                  
                  
                   <div class="modal fade hide" id="club">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Add club</h3>
                          
                          </div>
                          <div class="modal-body">
                          
                          
                        <form style="text-align:center" action="sis-admin-clubs.php"  method="post"   enctype="multipart/form-data">
                     	<table align="center" border="0">
                        <tr>
                        <td>Club name:&nbsp;&nbsp;</td>
                        <td><input name="clubname" required /></td>
                        </tr>
                        <tr>
                        <td>Club adviser:&nbsp;&nbsp;</td>
                        <td>
                        <select name="clubadvi" required >
                        <?php
						
						
						$queryemployee = mysql_query("SELECT * FROM employee_t ORDER BY l_name");
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
                        <tr>
                        <td>Status:&nbsp;&nbsp;</td>
                        <td>
                        <select name="clubstatus" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>
                        
                        </td>
                        </tr>
                        </table>
						<br />
						<br />
						
						<div class="modal-footer" >
<input type="submit" name="addclub" class="btn btn-success" />
<a href="sis-admin-clubs.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
</div>
</form>
                                </div><!-- /modal-body-->
                        
                          </div><!-- / modal -->  
                  
  <?php
	  if(isset($_POST['addclub'])){
		  $clubname=$_POST['clubname'];
		  $clubadviser=$_POST['clubadvi'];
		  $clubstatus=$_POST['clubstatus'];
		  $check2=0;
		  $querydup=mysql_query("SELECT * FROM club_t");
							while($getdup=mysql_fetch_assoc($querydup)){
								$adviser2=$getdup['club_adviser'];
								$name=$getdup['club_name'];
								if($clubadviser != $adviser2)
									if($clubname == $name){
									$check2=$check2+1;
								}
								}
							
								if($check2>0){
									?><script>alert('Club already exists!');</script>'<?php
								}
								else{
									mysql_query("INSERT INTO club_t (club_name, club_adviser, club_status) VALUES ('$clubname','$clubadviser','$clubstatus')");
									?><script>alert('Club successfully added!');
											 
                                      </script><?php
								}
							
							
	  }
	  
	  ?>
      
      
                  <a class="btn btn-block" href="#position" data-toggle="modal"></i> New Position</a>
                  <div class="modal fade hide" id="position">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Add position in clubs</h3>
                          
                          </div>
                          <div class="modal-body">
                         <form style="text-align:center" action="sis-admin-clubs.php"  method="post"   enctype="multipart/form-data">
						Position name:&nbsp;&nbsp;<input name="posname" required/>
                        <br />
                        <br />
                       <br />
					   <br />
                       
						<div class="modal-footer" >
						<input type="submit" name="addpos" class="btn btn-success" />
						<a href="sis-admin-home.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
						</div>
                                </form>
                                </div><!-- /modal-body-->
                        
                          </div><!-- / modal -->  
      <?php
	  if(isset($_POST['addpos'])){
		  $clubpos=$_POST['posname'];
	
		  $check2=0;
		  $querydup=mysql_query("SELECT * FROM club_position_t");
							while($getdup=mysql_fetch_assoc($querydup)){
								$posdup=$getdup['position_desc'];
								if($clubpos == $posdup){
									
									$check2=$check2+1;
								}
								}
							
								if($check2>0){
									?><script>alert('Position already exists!');</script>'<?php
								}
								else{
									mysql_query("INSERT INTO club_position_t (position_desc) VALUES ('$clubpos')");
									?><script>alert('Position successfully added!');
											 
                                      </script><?php
								}
							
							
	  }
	 
	  ?>
                         
                  					
                 
 				
                </th>
                  
              </tr>
            </tbody>
          </table>
          
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->

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
