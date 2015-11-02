<!DOCTYPE html>

<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
{
header("location: ../restrict.php");
}
?> 

 <html lang="en"><!-- InstanceBegin template="/Templates/sisclubadviser_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
			
							$queryid = mysql_query("SELECT * FROM club_adv_account_t WHERE account_no = '$account_no'");
							$getid = mysql_fetch_assoc($queryid);
							$id = $getid['club_id'];
							$queryadv = mysql_query("SELECT * FROM club_t WHERE club_id = '$id'");
							$getadv = mysql_fetch_assoc($queryadv);
							$adv = $getadv['club_adviser'];
							$queryname = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$adv'");
							$getname = mysql_fetch_assoc($queryname);
							$fname = $getname['f_name'];
							$lname = $getname['l_name'];
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
				<li><a href="..home.php"><i class="shortcut-icon icon-home"></i><span class="shortcut-label">Home</span></a></li>
                <li> <a href="ca-home.php"> <i class="shortcut-icon icon-heart"></i> <span class="shortcut-label">My Home</span> </a> </li>
	   	        <li class="active"> <a href="ca-members.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">My Members</span> </a> </li>
		        <li> <a href="ca-club-applications.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">My Applicants 				<?php 
				$queryc = mysql_query("SELECT * FROM club_adv_account_t WHERE account_no = '$account_no'");
				$getc = mysql_fetch_assoc($queryc);
				$c = $getc['club_id'];
				$querypending = mysql_query("SELECT * FROM club_application_t WHERE club_id = '$c' AND app_status = 'Unapproved'");
				$getpending = mysql_fetch_assoc($querypending);
				$pending = $getpending['club_app_id'];
				$number = mysql_num_rows($querypending);
				if(!$number){
					echo '0';
					}
					else{
					?> <p><font color="#FF0000"><?php echo $number?></font></p> <?php
					}
				
				
				?></span> </a> </li>

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

        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-list"></i>CURRENT MEMBERS</th>
                <th align="center"> <i class="icon-plus"></i>VIEW</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th>
                
                      <table width="100%">
      <tr>
    
      </tr>
      </table>
    <?php 
				 
		require('../db/db.php');
	  
			  
			  	  $qdata = mysql_query("select * from account_t where account_no = '$account_no'");
	  $fdata = mysql_fetch_assoc($qdata);
	  $acct = $fdata['account_no'];
	  
	  $qdata2 = mysql_query("select * from club_adv_account_t where account_no = '$acct'");
	  $fdata2 = mysql_fetch_assoc($qdata2);
	  
	  

	$club_id2=$fdata2['club_id'];
					
					?>

       <div id="demo">
       <table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>School Year Joined</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                 <?php 
	 
					
					$q=mysql_query("SELECT * FROM club_members_t WHERE club_id='$club_id2'");
                    
					while($fq=mysql_fetch_array($q)){ 
					$id2=$fq['club_id'];
					$sid2=$fq['student_id']; 
					$sy2 = $fq['academicyear_joined'];
					
					$querysystat = mysql_query("SELECT * FROM school_year_t WHERE sy_id = '$sy2'");
					$getsystat = mysql_fetch_assoc($querysystat);
					$status = $getsystat['SY_Status']; ?>
					<p align="right"><button class="btn btn-large btn-default"><a style="text-decoration: none" href="sis-admin-club-members-print.php?syear=<?php echo $sy2 ?>&&club=<?php echo $club_id2 ?>"><i class="icon-print"></i> Print</a></button></p>
					<?php
					if($status == 1){

		$q2=mysql_query("SELECT * FROM student_t WHERE student_id='$sid2' ");
					while($fq2=mysql_fetch_array($q2)){?>
                    <tr class="del<?php echo $id2 ?>">
                      <td  align="center" width="100"><?php echo $fq['student_id']; ?></td>
                      <td  align="center" width="100"><?php echo $fq2['f_name']; ?></td>
                      <td  align="center" width="100"><?php echo $fq2['l_name']; ?></td>
                      <td  align="center" width="100"><?php
                      $position = $fq['position']; 
					  $querypos = mysql_query("SELECT * FROM club_position_t WHERE position_id = '$position'");
					  $getpos = mysql_fetch_assoc($querypos);
					  echo $pos = $getpos['position_desc'];
					  ?></td>
                      <td  align="center" width="100"><?php 
					  $yearjoined = $fq['academicyear_joined'];
					  $querydef = mysql_query("SELECT * FROM school_year_t WHERE sy_id = '$yearjoined'");
					  $getdef = mysql_fetch_assoc($querydef);
					  $def = $getdef['sy_start'];
					  $def2 = $getdef['sy_end'];
					  echo $def.'-'.$def2;
					   ?></td>
                      
                      
                      <td align="center" width="200">      
                          <script type="text/javascript">
                             jQuery(document).ready(function() {
                             	$('#p<?php echo $id; ?>').popover('show')
                                $('#p<?php echo $id; ?>').popover('hide')
                             });
                          </script>
                         <a class="btn btn-success" data-toggle="modal" href='#update<?php echo $fq["student_id"];?>'>&nbsp;Change Position</a>        
                 <?php 
				 $student_id = $fq['student_id']; 
				 $club_id = $fq['club_id'];
				 ?>
                      </td>
                          <?php
	require('../db/db.php');

		
		 $query =mysql_query("SELECT *
							FROM club_members_t
							WHERE club_id = '$club_id'
							AND student_id = '$student_id'");
			
		
		while($row = mysql_fetch_assoc($query)){
		$query2=mysql_query("SELECT * FROM student_t WHERE student_id = '$student_id'");
		$row2= mysql_fetch_assoc($query2);
		
		$query3=mysql_query("SELECT * FROM club_t WHERE club_id = '$club_id'");
		$row3= mysql_fetch_assoc($query3);
		
	?>    
                      <div class="modal fade hide" id="update<?php echo $fq['student_id']?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Change position of <?php echo $row2['f_name']."&nbsp;".$row2['l_name'] ?></h3>
                          
                          </div>
                          <div class="modal-body">
                          
                          
         

 <form method="post" style="text-align:center" action="ca-members.php" enctype="multipart/form-data">
<input type="hidden" name="club_id" value="<?php echo $club_id ?>">
<input type="hidden" name="student_id" value="<?php echo $student_id ?>">
   
   <center> Position:&nbsp;&nbsp;<select name="position">
    				<option value="<?php echo $row['position'] ?>"><?php $pos = $row['position'];
 $query4 = mysql_query("SELECT * FROM club_position_t WHERE position_id = '$pos'");
 $get4 = mysql_fetch_assoc($query4);
 echo $get4['position_desc'];?></option>
                    <?php
					
					//$check2=0;
					$query5 = mysql_query("SELECT * FROM club_position_t");
					
					$querycurrent = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
					$findcurrent = mysql_fetch_assoc($querycurrent);
					$current = $findcurrent['sy_id'];
					
					while($get5 = mysql_fetch_assoc($query5)){
						$check=0;
						
						$query6 = mysql_query("SELECT * FROM club_members_t WHERE club_id = '$club_id' AND academicyear_joined = '$current'");
						while($get6 = mysql_fetch_assoc($query6))
						{
							if($get5['position_id'] == $get6['position']){
						$check=$check+1;
				
							}
							
				
						}
						if($check == 0){
							echo '<option value="'.$get5['position_id'].'">'.$get5['position_desc'].'</option>';
							}

						
						
						
					}
					?>
                    </select></center>
                    <br />
 
 <div class="modal-footer" >
 <p align="right"><input type="submit" value="Update" name="update_mem" class="btn btn-success">&nbsp;<a href="sis-admin-clubs.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a></p>
</div>
    
   </form>
   <?php
		}
		}
					}
					}
   ?>
                                </div><!-- /modal-body-->
                        
                  
                          </div><!-- / modal -->                           
                    </tr>
                    
               
                </tbody>
                
		</table>   

       
        </div>
			  
			 <?php
 include('../db/db.php');
 if(isset($_POST['position'])){
	$clubid = $_POST['club_id'];
	$studentid = $_POST['student_id'];
	$pos =  $_POST['position'];
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$sql = "UPDATE club_members_t SET position='$pos' WHERE club_id='$clubid' AND student_id='$studentid'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	mysql_query("Commit");
	

 }
?>  


                </th>

                
                
                
                
                
                <th style="background-color:#F0F0F0">
                
                   
                 

                  <a class="btn btn-block" href="ca-members-archive.php"></i> Previous Members</a>
                  					
 
                </th>
                          
                     
    
              </tr>
            </tbody>
          </table>
          
        </div>

      
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
      
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
