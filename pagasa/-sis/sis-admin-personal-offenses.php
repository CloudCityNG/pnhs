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
	   	        <li> <a href="sis-admin-clubs.php" > <i class="shortcut-icon icon-book"></i> <span class="shortcut-label">Clubs</span> </a> </li>
		        <li  class="active"> <a href="sis-admin-offenses.php" > <i class="shortcut-icon icon-pencil"></i> <span class="shortcut-label">Offenses</span> </a> </li>

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
       <?php $query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status='1'");
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
                <th width="80%"><i class="icon-list"></i>OFFENSES</th>
                <th align="center"> <i class="icon-plus"></i>PRINT</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th>
 <?php
		if(isset($_GET['student_id'])){
			$student_id = $_GET['student_id'];
				$queryoffdesc = mysql_query("SELECT * FROM discipline_offense_t");
			$get_query = mysql_query("Select * From student_t WHERE student_id='$student_id' ");
			$get_stud = mysql_fetch_assoc($get_query);
			
			?>

  <h4>Offenses of <?php echo $get_stud['f_name']."&nbsp;".$get_stud['l_name'] ?></h4>

          <div id="demo">
            <table cellpadding="0" cellspacing="0" border="0" class=" dynamic styled with-prev-next" id="example" width="100%">
                <thead>
                    <tr>
                        <th width="35%">Offense</th>
						<th width="17%">Category</th>
                        <th width="16%">Date</th>
                        <th width="11%">Remarks</th>
						<th width="21%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                 <?php 
					include('../db/db.php');
					if(isset($_GET['student_id'])){
						$student_id = $_GET['student_id'];
					
					$querystud=mysql_query("SELECT * FROM student_offense_list_t WHERE student_id='$student_id' AND Remarks='Uncleared'");
						
                    
					while($getstud=mysql_fetch_assoc($querystud)){ 
					$stud=$getstud['offense_code'];
					
					$queryoff = mysql_query("SELECT * FROM discipline_offense_t WHERE offense_code = '$stud'");
					$getoff = mysql_fetch_assoc($queryoff);
					$off = $getoff['offense_description'];
					
					$off_cat = $getoff['offense_cat'];
					$querycat = mysql_query("Select * from discipline_category_t Where cat_code='$off_cat'");
					$get_cat = mysql_fetch_assoc($querycat);
					$cat_name = $get_cat['cat_name'];
					
					
					$date = $getstud['offense_date'];
					
					$remarks = $getstud['Remarks'];
					
					
					 ?>
                    <tr class="del<?php echo $student_id ?>">
                      <td align="center"><?php echo $off;?></td>
					  <td align="center"><?php echo $cat_name ?></td>
                      <td align="center"><?php echo $date; ?></td>
                      <td align="center"><?php echo $remarks; ?></td>
					  <td align="center">
                      <a class="btn btn-success" data-toggle="modal" href="#updateoff<?php echo $student_id.'-'.$stud.'-'.$date ?>">&nbsp;Update</a></td>

                                             
                      
                      <?php

				$queryoffdesc = mysql_query("SELECT * FROM discipline_offense_t");
			$get_query = mysql_query("Select * From student_t WHERE student_id='$student_id' ");
			$get_stud = mysql_fetch_assoc($get_query);
			
			$query_remarks = mysql_query("SELECT * FROM student_offense_list_t WHERE student_id='$student_id' AND offense_code='$stud' AND offense_date='$date' ");
			
			$get_rem = mysql_fetch_assoc($query_remarks);
			$remarks = $get_rem['Remarks'];
			
			?>


                      
                       <div class="modal fade hide" id="updateoff<?php echo $student_id.'-'.$stud.'-'.$date ?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>Update offense record of <?php 
							$qname = mysql_query("SELECT * FROM student_t WHERE student_id = '$student_id'");
							$gname = mysql_fetch_assoc($qname);
							echo $gname['f_name'].'&nbsp;'.$gname['l_name'];?></h3>
                          
                          </div>
                          <div class="modal-body">
     
		<form method="post" action="sis-actions/update_offense.php?s_id=<?php echo $student_id ?>&&off_code=<?php echo $stud ?>&&date=<?php echo $date ?>">
		<input type="hidden" name="s_id" value="<?php $student_id ?>" /><input type="hidden" name="off_code" value="<?php echo $stud ?>" />
        <br />
        Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="date" value="<?php echo $date ?>" /><?php echo $date ?>
        <br />
        Remarks: <select name="remarks" >
		<?php
			if($remarks == 'Cleared'){
			echo '<option value="Cleared">Cleared</option>
			<option value="Uncleared">Uncleared</option>';
			}
			else if($remarks == 'Uncleared'){
			echo '<option value="Uncleared">Uncleared</option>
			<option value="Cleared">Cleared</option>';
			}
		?>
        
        </select>
        <br />
		<br />
		<br />
		<div class="modal-footer">
       <input type="submit" value="Update" name="Update" class="btn btn-success">
<a href="sis-admin-home.php" data-dismiss="modal"><button class="btn btn-default">Cancel</button></a>
</div>
		</form>

                                
                                </div><!-- /modal-body-->
                        
                          </div><!-- / modal -->  
                                                
                  </tr>
                    
                <?php
					}
				}?>
                </tbody>
                
		</table>

        </div>	

<?php
		} ?>
        

                </th>
                
                
                
                
                
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" onClick="window.open('../-sis/sis-admin-print-gmc.php?student_id=<?php echo $student_id; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center')"><i class=" icon-pencil"></i> Certificate of Good Moral Character</a>

                  
                  					
                 
 				
                </th>

              </tr>
            </tbody>
          </table>
          
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->


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
