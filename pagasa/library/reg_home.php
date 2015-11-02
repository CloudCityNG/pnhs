<!DOCTYPE html>
<?php 
require ('../db/db.php');
$num=1;
$next_yr= date('Y')+$num;
$current_yr=date('Y');
	if(isset($_POST['Open'])){
		$no_of_days=$_POST['days'];
		
		$query_select=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
		$row_select=mysql_fetch_assoc($query_select);
		$schyr_id=$row_select['sy_id'];
		$query_update=mysql_query("UPDATE school_year_t SET SY_status=0 WHERE sy_id=$schyr_id");
		$query_sy_add=mysql_query("INSERT INTO school_year_t VALUES ('','$current_yr','$next_yr','$no_of_days','1')") or die("mali");
	}
//header ("Location: ../-registration/reg_scholarship.php");

?>




<html lang="en"><!-- InstanceBegin template="/Templates/reg_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
    
   	<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

    
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
<link href="js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <title>Pagasa National Highschool:: Base Admin</title>
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
	
</div> <!-- /navbar --><!-- InstanceBeginEditable name="nav" -->
<div class="subnavbar">
  <div class="hide"> <img src="../images/banner.jpg"> </div>
  <div class="subnavbar-inner" >
    <div class="container" > <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse"> <i class="icon-reorder"></i> </a>
      <ul class="mainnav">
        <li> <a href="../home.php"> <i class="icon-home"></i> <span>Home</span></a></li>
        <li class="active"> <a href="reg_home.php"> <i class="icon-calendar"></i> <span>Enrollment</span></a></li>
        <li> <a href="reg_classify.php" > <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Classification</span></a></li>
		<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-file"></i> <span>
							Reports
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                        <li><a href="../-registration/reg_section.php">Masterlist</a></li>
                            <li class="dropdown-submenu">
			                  <a tabindex="-1" href="#">Statistical Report</a>
			                  <ul class="dropdown-menu">
			                    <li><a tabindex="-1" href="../-registration/reg_no_of_student_schyr.php">Students Enroll in a School Year</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_student_municipalities.php">Students in a Municipality</a></li>
			                    <li><a tabindex="-1" href="../-registration/reg_scholars.php">Scholars</a></li>

			                  </ul>
			            	</li>
                            
						<li class="divider"></li>
						<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>        
						<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i> <span>
							Settings
                            </span>
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
                        
                            <li><a data-toggle="modal" href="#open_schoolyr">School Year</a></li>
							<li><a href="../-registration/reg_scholarship.php">Scholarship</a></li>
							<li><a href="../-registration/reg_municipality.php">Municipalities</a></li>

							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
						
					</li>
      </ul>
      <!-- /.subnav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>

<!-- InstanceEndEditable --><!-- /subnavbar -->
    
    
 
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

<!--/smaller navbar--><!-- InstanceBeginEditable name="content" -->
<div class="main">



  <div class="container" style="width:1000px; margin-top:20px;">
    <div class="">
		<div class="widget stacked widget-table action-table">
        
        <!-- /widget-header -->
        <div class="widget-content" >
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="80%"><i class="icon-list"></i> LIST OF STUDENTS</th>
                <th align="center"> <i class="icon-plus"></i>  ADD STUDENT</th>
              </tr>
            </thead>
            <tbody>
              <tr >
                <th >
                
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                    <?php
					  include_once "../db/db.php";
					  
					  $query = mysql_query("SELECT * FROM year_level_t");
                      $i=0;
					  $j=0;
					  while($row = mysql_fetch_assoc($query)){
						  $year_level_tabs[] = $row['lvl_id'];
					  ?>
					  <li class="<?php echo ($i==0)? "active":""; $i=1; ?>">
                        <a href="#<?php echo $row['lvl_id'];?>" data-toggle="tab"><?php echo $row['lvl_name'];?></a>
                      </li>
                      <?php } ?>
					</ul>
                    
                    <br />
                    
                        <div class="tab-content">
                        <?php foreach($year_level_tabs as $lvl){?>
                            <div class="tab-pane <?php echo ($j==0)? "active":""; $j=1; ?>" id="<?php echo $lvl;?>">
                              <div id="demo" style="min-height:300px;">
                        
          <table cellpadding="0" cellspacing="0" border="0" class=" " id="tab<?php echo $lvl;?>" width="100%">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>

                 <?php 
					include('../db/db.php');
					$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
					$row_sy=mysql_fetch_assoc($query_sy);
					$sy_id=$row_sy['sy_id'];
					$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE year_level=$lvl AND school_yr=$sy_id");
					while($row_reg=mysql_fetch_assoc($query_reg)){
						$stud_id=$row_reg['student_id'];
						
					$query=mysql_query("SELECT * FROM student_t where student_id='$stud_id'");
                        while($row=mysql_fetch_array($query)){ 
						$id=$row['student_id'];
						$img=$row['photo'];
						
						?>
                        
                        <tr class="del<?php echo $id ?>">
                            <td align="center" width="100"><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row['l_name']." , ".$row['f_name'].""); ?>
                            	<?php echo ucfirst("".$row['m_name']."") ?></td>
                           <?php if($img!=NULL){ ?>
                            <td align="center"><a class="btn btn-mini msgbox-error" href="javascript:;"><i class="icon-plus"></i>Add Image</a></td>

                           <?php } else {?>
                            <td align="center"><a class="btn btn-mini" data-toggle="modal" href="#add_image<?php echo $id;?>"><i class="icon-plus"></i>Add Image</a></td>
                         <?php } ?>
                         
                      <div class="modal fade hide" id="add_image<?php echo $id?>">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3>ADD IMAGE for <?php echo $id;?></h3>
                          
                          </div>
                          <div class="modal-body">
                                                <form style="text-align:center" action="reg_image-action.php<?php echo "?id=$row[student_id]"; ?>"  method="post"   enctype="multipart/form-data">

                                                   <center><input  type="file" name="image" id="image" style="height:20px;width:90px;" /></center>

                                                    <br />
                                                    <center><input type="submit" name="upload" value ="Upload Now"> </center>      
                                </form>
                                </div><!-- /modal-body-->
                        
                          </div><!-- / modal -->
                            
                        </tr>
                       
                        
                        
                  <?php 
				  		}
					}
					
					
					?>
               
              </tbody>
            </table>
           
            
            		</div>
            </div>
       <?php }?>
                            
                            
    </div>
    	</div>
        
 
                </th>
                <th style="background-color:#F0F0F0">
                
                   
                  <a class="btn btn-block" onClick="window.open('../-registration/reg_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center')"><i class=" icon-pencil"></i> New Student</a>
 				<?php  
				$query_schyr=mysql_query("SELECT * FROM school_year_t");
				$rows=mysql_num_rows($query_schyr);
				if($rows==1){	

					echo "<a class='btn btn-block msgbox-alert' href='javascript:;'><i class='icon-pencil'></i>   Returning</a>";
	
				} else if($rows!=1) {
                  
				  echo "<a class='btn btn-block' href='../-registration/reg_enroll_qualified.php'><i class='icon-pencil'></i>   Returning</a>";
				}
				  ?>

                  <a class="btn btn-block" onClick="window.open('../-registration/reg_trans_form.php','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=650,position=center')"><i class=" icon-pencil"></i> Transferee</a>
                </th>
              </tr>
            </tbody>
          </table>
          
        </div>
        <!-- /widget-content -->
      </div>
      <!--</widget>-->
    <!-- /span6 -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>


 </div>
 
</div>

<!-- InstanceEndEditable --><!-- /main --><!-- /extra -->

<div class="modal fade hide" id="open_schoolyr">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>SCHOOL YEAR  <?php 
						echo $current_yr;
						echo "-";
						echo $next_yr; ?> </h3>
  </div>
  <div class="modal-body">
 							<form class="form-horizontal" name="open_school_year" id="validation-form" action="reg_home.php" method="post">
                              <fieldset>
						 <table class="table" width="816" >
                           <tr><td>
						    <div class="control-group">
						      <label class="control-label" for="email">NO. OF DAYS</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="days" id="days" />
						      </div>
						    </div> </td>
                            </tr>
                           
                      
                          
                             </table>                       
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
                                <input class="btn btn-success" type="submit" name="Open" value="OPEN" >

                              </fieldset>
                            </form>

  </div>
 </div>

    
    
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

<div class="modal fade hide" id="addSection">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <form>
      <input type="text">
  
  </div>
  <div class="modal-footer">
    <a href="javascript:;" class="btn" data-dismiss="modal">Close</a>
    <a href="javascript:;" class="btn btn-primary">Save changes</a>
  </div>
    </form>
</div>
           

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
		    "bJQueryUI": true
				});
	} );
</script>

  </body>
 <?php 
 error_reporting(0);
 foreach($year_level_tabs as $lvl){ ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#tab<?php echo $lvl;?>').dataTable({
		    "bJQueryUI": true,
			"bFilter": true,
			"bInfo": true,
			"bLengthChange": true,
			'iDisplayLength': 5,		});
	} );
</script>
<?php } ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example1').dataTable({
		    "bJQueryUI": true,
			"bFilter": false,
			"bInfo": false,
			"bLengthChange": false,
			'iDisplayLength': 5,		});
	} );
</script>

<!-- InstanceEnd -->

<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="../js/demo/notifications.js"></script>

</html>
