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
                <li class="active"> <a href="ca-home.php"> <i class="shortcut-icon icon-heart"></i> <span class="shortcut-label">My Home</span> </a> </li>
	   	        <li> <a href="ca-members.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">My Members</span> </a> </li>
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
                <th width="80%"><i class="icon-list"></i>MY HOME</th>
                <th align="center"> <i class="icon-plus"></i>EDIT</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th>

       <div style="margin: 50px auto; box-shadow:0 0 30px #000000; height:350px; width:700px;">
        <br>

       <table align="center">
	   
	   
        <?php
		$Today=date('y:m:d');
        $new=date('l, F d, Y',strtotime($Today));
         
		?>
         <?php 
				 
		require('../db/db.php');
	  

	  
	  $querydata = mysql_query("select * from club_adv_account_t where account_no = '$account_no'");
	  $fetchdata = mysql_fetch_assoc($querydata);
	  $id = $fetchdata['club_id'];
	  
	  $queryadv = mysql_query("SELECT * FROM club_t WHERE club_id = '$id'");
	  $getadv = mysql_fetch_assoc($queryadv);
	  $adv = $getadv['club_adviser'];
	  
	  $queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$adv'");
	  $getemp = mysql_fetch_assoc($queryemp);
	 
					
	  $queryempid = mysql_query("SELECT * FROM employee_account_t WHERE account_no = '$account_no'");
	  $getempid = mysql_fetch_assoc($queryempid);
	  $empid = $getempid['emp_id'];
	  
	  $querypicname = mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid'");
	  $getpicname = mysql_fetch_assoc($querypicname);
	  $picname = $getpicname['pic_name'];
	  
					?>
	   
       <tr>
        <td>
        <img src="../eis/include/dpic/<?php echo $picname ?>" />
		</td>
        <td align="left">
		  <div style="margin: 50px auto; height:150px; width:200px;">

     
     
     <h1> <?php echo $getemp['f_name']."&nbsp;".$getemp['l_name'] ?></h1>
     <p><h3>Club adviser of <?php echo $getadv['club_name'] ?></h3></p>
     <h5><?php echo $new ?></h5>


							</div>
                            </td>
                            </tr>
                            </table>
                            </div>
                            </th>

                
                
                
                
                
                <th style="background-color:#F0F0F0">
                
                   
                 

                  <a class="btn btn-block" data-toggle="modal" href="#settings<?php echo $account_no; ?>"><i class="icon-pencil"></i> Account Settings</a>
                  					
                 
 <?php
include('../db/db.php');
$queryup = mysql_query("SELECT * FROM account_t WHERE account_no= '$account_no'");
$getup = mysql_fetch_assoc($queryup);
$uname = $getup['username'];
$pword = $getup['password'];
?>        
                
                
                      <div class="modal fade hide" id="settings<?php echo $account_no; ?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Account Settings</h3>
                          
                          </div>
                          <div class="modal-body">
                          
                          
            <form style="text-align:center" action="ca-home.php"  method="post"   enctype="multipart/form-data">

            <center><i class="icon-user"><b>&nbsp;Change Username</b></i></center>
            <br />
             Username:&nbsp;<input name="uname" type="text" value="<?php echo $uname;?>" required min="4"> 
            <br />
            <center><i class="icon-lock"><b>&nbsp;Change Password</b></i></center>
            <br />
            Current password:&nbsp;<input name="pword" type="password" pattern="<?php echo $pword;?>" required>
            <br />
            New password:&nbsp;<input name="newpword" type="text" required min="4">
           
            <br />
            <br />
			<br />
			
			
	<div class="modal-footer" >
<input name="Update" type="submit" class="btn btn-success">
<a href="sis-admin-clubs.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
</div>
                                </form>
                                </div><!-- /modal-body-->
                        
                  
                          </div><!-- / modal -->   
                          
 <?php
if(isset($_POST['Update'])){
	$new_u = $_POST['uname'];
	$password = $_POST['pword'];
	$newpword = $_POST['newpword'];
	$dup_checker = 0;
	$confirmer = 0;
	

	
	$querydup = mysql_query("SELECT * FROM account_t WHERE account_no != '$account_no'");
	while($getdup = mysql_fetch_assoc($querydup)){
		if($getdup['username'] == $new_u){
		$dup_checker = $dup_checker+1;
		}
	}
		if($dup_checker>0){
		?><script>alert("Username already exists!")</script> <?php
	}else{

		mysql_query("UPDATE account_t SET username = '$new_u', password = '$newpword' WHERE account_no = '$account_no'");
		echo '<div class="alert-success"><p align="right"><i class="icon-user">&nbsp;Account successfully updated!</i></p><br />
		Username:&nbsp;'.$new_u.'<br />Password:&nbsp;'.$newpword.'
		</div>';
		
	}

}


?>  

      
        <a class="btn btn-block" data-toggle="modal" href="#update<?php echo $account_no; ?>"><i class="icon-pencil"></i> Change Club Name</a>
        
        
         <?php 
		require('../db/db.php');

	  $querydata = mysql_query("select * from club_adv_account_t where account_no = '$account_no'");
	  $fetchdata = mysql_fetch_assoc($querydata);
	  $cid = $fetchdata['club_id'];
	  
	  $queryclub = mysql_query("SELECT * FROM club_t WHERE club_id = '$cid'");
	  $getclub = mysql_fetch_assoc($queryclub);
					
					
					?>
        
        
         <div class="modal fade hide" id="update<?php echo $account_no; ?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Change Club Name</h3>
                          
                          </div>
                          <div class="modal-body">
                          
                          
            <form style="text-align:center" action="ca-home.php"  method="post"   enctype="multipart/form-data">

            <input type="hidden" name="club_id" value="<?php echo $getclub['club_id']; ?>" />
            <center>Club Name:&nbsp;&nbsp;&nbsp;<input name="newclub_name" type="text" value="<?php echo $getclub['club_name']; ?>" required /></center>
            <br />
			<br />
			<br />
			<div class="modal-footer" >
<input type="submit" name="Update2" value="Update" class="btn btn-success">
<a href="sis-admin-clubs.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
</div>
			

                                </form>
                                </div><!-- /modal-body-->
                        
                  
                          </div><!-- / modal -->   
                          
       <?php
                 if(isset($_POST['Update2'])){
	 
	$newclub_name = $_POST['newclub_name'];
	
	$id = $_POST['club_id'];
	
	
	
//	echo $newclub_name, $id;
	
	
			mysql_query("START Transaction");
			mysql_query("Auto-Commit = 'Off'");
			$dup_checker = 0;
	$querydup = mysql_query("SELECT * FROM club_t");
	while($getdup  = mysql_fetch_assoc($querydup)){
		if($getdup['club_name'] == $newclub_name){
			$dup_checker = $dup_checker+1;
		}
	}
	if($dup_checker>0){
		?><script>alert("Another club with this name is existing!");</script><?php
	}
	else{
	$sql = "UPDATE club_t SET club_name='$newclub_name' WHERE club_id='$id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	?><script>alert("Club name successfully changed to <?php echo $newclub_name ?>")</script><?php
	}
	mysql_query("Commit");
	
	
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
