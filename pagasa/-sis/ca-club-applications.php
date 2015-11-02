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
	   	        <li> <a href="ca-members.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">My Members</span> </a> </li>
		        <li class="active"> <a href="ca-club-applications.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">My Applicants
				<?php 
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
				
				
				?>
				</span> </a> </li>

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
          <h3>Club Applications</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          
      
      <?php 
				 
?>
 
 
       <div id="demo">
       <table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
       <thead>
 <tr>
 <th>Student ID</th>
 <th>Student</th>
 <th>Action</th>
 </tr>
 </thead>

 <tbody>
  <?php
  	require('../db/db.php');
	  
	  $querydata = mysql_query("select * from club_adv_account_t where account_no = '$account_no'");
	  $fetchdata = mysql_fetch_assoc($querydata);
	  $club_id = $fetchdata['club_id'];
		

	 
	 $queryactive = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
	 $getactive = mysql_fetch_assoc($queryactive);
	 $active = $getactive['sy_id'];
 
 
 $querycapp = mysql_query("SELECT * FROM club_application_t WHERE club_id = '$club_id' AND app_status = 'Unapproved'");
 while($getcapp = mysql_fetch_assoc($querycapp)){
	 $checkexist = 0;
	 $capp = $getcapp['student_id'];
	 $cappid = $getcapp['club_app_id'];
	 $queryexisting = mysql_query("SELECT * FROM club_members_t WHERE academicyear_joined = '$active' AND club_id = '$club_id'");
	 while($getexisting = mysql_fetch_assoc($queryexisting)){
		 $existing = $getexisting['student_id'];
		 	if($existing == $capp){
				$checkexist=$checkexist+1;
			}
	 }
	 
	 if($checkexist == 0){ ?>
		 <tr class="del<?php echo $capp;?>">
 <td align="center"><?php echo $capp;
?></td>
 <td align="center"><?php 
 $queryname = mysql_query("SELECT * FROM student_t WHERE student_id = '$capp'");
 $getname = mysql_fetch_assoc($queryname);
 echo $getname['l_name'].",&nbsp;".$getname['f_name']."&nbsp;".$getname['m_name'];
 ?></td>
 <td align="center">
<a class="btn btn-success" data-toggle="modal" href="#accept<?php echo $cappid;?>">Accept</a>
  
 <div class="modal fade hide" id="accept<?php echo $cappid; ?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Accept application</h3>
                          
                          </div>
                          <div class="modal-body">
                          Are you sure you want to accept this application?
                          <br />
                          <br />
                          <a href="accept_application(action).php?student_id=<?php echo $capp;?>&&club_id=<?php echo $club_id ?>&&club_app_id=<?php echo $cappid; ?>" class="btn btn-success">Yes</a>&nbsp;&nbsp;<a class="btn btn-tertiary" href="ca-club-applications.php">No</a>
                          
            
                                </div><!-- /modal-body-->
                        
                  
                          </div><!-- / modal -->   
 
 
 &nbsp;
 <a class="btn btn-tertiary" data-toggle="modal" href="#reject<?php echo $cappid;?>">Reject</a>
  
 <div class="modal fade hide" id="reject<?php echo $cappid; ?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Reject application</h3>
                          
                          </div>
                          <div class="modal-body">
                          Are you sure you want to reject this application?
                          <br />
                          <br />
                          <a href="sis-actions/adv_reject_app.php?club_app_id=<?php echo $cappid?>" class="btn btn-success">Yes</a>&nbsp;&nbsp;<a class="btn btn-tertiary" href="ca-club-applications.php">No</a>
                          
            
                                </div><!-- /modal-body-->
                        
                  
                          </div><!-- / modal -->  
                          
                      </td>  
 </tr>
 <?php
	 }
 }
 ?>
 </tbody>


 </table>
      
        
        
        
      </div>   
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
