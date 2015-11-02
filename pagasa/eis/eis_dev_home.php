<!DOCTYPE html>
<?php 
 session_start();
 include('../db/db.php');
?>

<?php

if (!isset($_SESSION['username'])) {

echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
 
 }
 
else{

$username = $_SESSION['username'];

?>

<?php 
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
    
  <!-- PDS JS -->
  <!-- The Scripts -->
	<!-- ----------- -->
	<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">
	
	<link rel="stylesheet" href="../include/css/elements.css">
	
		<link rel="stylesheet" href="../include/css/external/jquery-ui-1.8.21.custom.css">

	<link rel="stylesheet" href="../include/css/icons.css">
	<script src="../include/js/main.js"></script>
	<!-- JavaScript at the top (will be cached by browser) -->
	

	<script src="../include/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="../include/js/mylibs/number-functions.js"></script>
	<script src="../include/js/libs/jquery-1.7.2.min.js"></script>
		<!-- Do the same with jQuery UI -->
	<script src="../include/js/libs/jquery-ui-1.8.21.min.js"></script>
	<script src="../include/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>

	<!-- VALIDATION ENGINE --> 
	
	<script src="../include/js/validationEngine/jquery.validationEngine.js"></script>
	<script src="../include/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
	<!-- end scripts -->
		<!-- VALIDATION ENGINE CSS-->
	<link rel="stylesheet" href="../include/css/validationEngine.jquery.css">
<script>
$(document).ready(function () {
    
var select=function(dateStr) {
      var d1 = $('#bdate').datepicker('getDate');
      var d2 = $('#end_date').datepicker('getDate');
      var diff = 0;
      if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
      }
      $('#duration').val(diff);
}

$("#bdate").datepicker({ 
	changeMonth: true,
	changeYear: true,
    onSelect: select
});
$('#end_date').datepicker({
changeMonth: true,
changeYear: true,
onSelect: select});
});

</script>
<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		jQuery("#AddPersonnel").validationEngine({
					promptPosition : "topLeft", 
					relative: true,
					autoPositionUpdate : true,
					onValidationComplete: function(form, status){
					if (status == true) {
							window.onunload = refreshParent;
							function refreshParent() {
							window.opener.location.reload();
							}
							submit();
					}
					}

				});
		
		 
	});
	
  </script>
  <script>
	
	$(function() {
		$("#p_bdate, #p_elem_attendance_from,  #p_elem_attendance_to, #p_second_attendance_from,  #p_second_attendance_to, #p_voc_attendance_from,  #p_voc_attendance_to, #p_col1_attendance_from,  #p_col1_attendance_to, #p_col2_attendance_from,  #p_col2_attendance_to, #p_grad1_attendance_from,  #p_grad1_attendance_to, #p_grad2_attendance_from,  #p_grad2_attendance_to, #p_work_date_from1, #p_work_date_to1, #p_work_date_from2, #p_work_date_to2, #p_work_date_from3, #p_work_date_to3, #p_work_date_from4, #p_work_date_to4, #p_work_date_from5, #p_work_date_to5, #p_work_date_from6, #p_work_date_to6, #p_work_date_from7, #p_work_date_to7,#p_work_date_from8, #p_work_date_to8, #p_work_date_from9, #p_work_date_to9, #p_work_date_from10, #p_work_date_to10, #p_work_date_from11, #p_work_date_to11, #p_work_date_from12, #p_work_date_to12, #p_work_date_from13, #p_work_date_to13, #p_work_date_from14, #p_work_date_to14, #p_work_date_from15, #p_work_date_to15, #p_work_date_from16, #p_work_date_to16, #p_work_date_from17, #p_work_date_to17, #p_work_date_from18, #p_work_date_to18, #p_work_date_from19, #p_work_date_to19, #p_work_date_from20, #p_work_date_to20, #p_license_date_rel1, #p_license_date_rel2, #p_license_date_rel3, #p_license_date_rel4, #p_license_date_rel5, #p_license_date_rel6, #p_license_date_rel7, #p_license_date_rel8, #p_date_exam1, #p_date_exam2,  #p_date_exam3, #p_date_exam4, #p_date_exam5, #p_date_exam6, #p_date_exam7, #p_date_exam8, #p_child_bday1, #p_child_bday2, #p_child_bday3, #p_child_bday4, #p_child_bday5, #p_child_bday6, #p_child_bday7, #p_child_bday8, #p_child_bday9, #p_child_bday10, #p_child_bday11, #p_child_bday12, #p_voluntary_date_from1, #p_voluntary_date_to1, #p_voluntary_date_from2, #p_voluntary_date_to2, #p_voluntary_date_from3, #p_voluntary_date_to3, #p_voluntary_date_from4, #p_voluntary_date_to4, #p_voluntary_date_from5, #p_voluntary_date_to5,#p_training_date_from1, #p_training_date_to1, #p_training_date_from2, #p_training_date_to2, #p_training_date_from3, #p_training_date_to3, #p_training_date_from4, #p_training_date_to4, #p_training_date_from5, #p_training_date_to5, #p_training_date_from6, #p_training_date_to6, #p_training_date_from7, #p_training_date_to7, #p_training_date_from8, #p_training_date_to8, #p_training_date_from9, #p_training_date_to9, #p_training_date_from10, #p_training_date_to10, #p_training_date_from11, #p_training_date_to11, #p_training_date_from12, #p_training_date_to12, #p_training_date_from13, #p_training_date_to13, #p_training_date_from14, #p_training_date_to14, #p_training_date_from15, #p_training_date_to15").datepicker({
			yearRange: '1900:2100',
			changeMonth: true,
			changeYear: true
		});
	});
	
	
	</script>
<script>
function chocie_yes(id){
switch (id){
case 'choice1y':
var chk= document.getElementById('choice1y').value="YES";
var textbox = document.getElementById('details1');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;

case 'choice2y':
var chk= document.getElementById('choice2y').value="YES";
var textbox = document.getElementById('details2');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice3y':
var chk= document.getElementById('choice3y').value="YES";
var textbox = document.getElementById('details3');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice4y':
var chk= document.getElementById('choice4y').value="YES";
var textbox = document.getElementById('details4');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice5y':
var chk= document.getElementById('choice5y').value="YES";
var textbox = document.getElementById('details5');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice6y':
var chk= document.getElementById('choice6y').value="YES";
var textbox = document.getElementById('details6');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice7y':
var chk= document.getElementById('choice7y').value="YES";
var textbox = document.getElementById('details7');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice8y':
var chk= document.getElementById('choice8y').value="YES";
var textbox = document.getElementById('details8');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice9y':
var chk= document.getElementById('choice9y').value="YES";
var textbox = document.getElementById('details9');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;
case 'choice10y':
var chk= document.getElementById('choice10y').value="YES";
var textbox = document.getElementById('details10');
if(chk == "YES"){
       textbox.style.display = 'block';
	
}
   else{
		 textbox.style.display = 'none';
		}

break;

}
}

function choice_no(id){
switch (id){
case 'choice1n':
var chk= document.getElementById('choice1n').value="NO";
var textbox = document.getElementById('details1');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice2n':
var chk= document.getElementById('choice2n').value="NO";
var textbox = document.getElementById('details2');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice3n':
var chk= document.getElementById('choice3n').value="NO";
var textbox = document.getElementById('details3');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice4n':
var chk= document.getElementById('choice4n').value="NO";
var textbox = document.getElementById('details4');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;

break;
case 'choice5n':
var chk= document.getElementById('choice5n').value="NO";
var textbox = document.getElementById('details5');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
break;
case 'choice6n':
var chk= document.getElementById('choice6n').value="NO";
var textbox = document.getElementById('details6');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;

case 'choice7n':
var chk= document.getElementById('choice7n').value="NO";
var textbox = document.getElementById('details7');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice8n':
var chk= document.getElementById('choice8n').value="NO";
var textbox = document.getElementById('details8');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice9n':
var chk= document.getElementById('choice9n').value="NO";
var textbox = document.getElementById('details9');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;
case 'choice10n':
var chk= document.getElementById('choice10n').value="NO";
var textbox = document.getElementById('details10');
if(chk =="NO"){
       textbox.style.display = 'none';
	
}
   else{
		 textbox.style.display = 'none';
		}
break;


}
}
</script>
    <script type="text/javascript">
 function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#chng_dpic')
						
                        .attr('src', e.target.result)
                        .width(137)
                        .height(175);
                };
				
                reader.readAsDataURL(input.files[0]);
				//document.getElementById('dpic').style.visibility='visible';
				return true;
            }else{
			alert('Please Select Your Photo');
			return false;
			}
			
        }
		
</script>
  <!--END PDS JS -->
  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />    
    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  <link href="../css/base-admin-2-responsive.css" rel="stylesheet" />
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  <link href="./css/pages/plans.css" rel="stylesheet" /> 


  <link href="../css/pages/reports.css" rel="stylesheet" />
  
  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    #eq span {
		height: 175px;
		float: left;
		margin: 15px;
	}
    </style>
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
			    <li class="active"> <a href="eis_dev_home.php"> <i class="icon-home"></i><span class="shortcut-label">Admin and Developer Home</span></a></li>
		      
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
        <div class="widget-header"> <i class="icon-dashboard"></i>
          <h3>Developer and Admin</h3>
        </div>
        <!-- /widget-header -->
        <div class="widget-content">
          <div id="demo">
          
			<a href="eis_admin_dashboard.php" class="button block grey"><span><i class="icon-dashboard"></i></span>Go to Admin Page</a>
			<a href="eis_emp_home.php" class="button block grey"> <span><i class="icon-user"></i></span>Go to Employee Page</a>
          
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

<script src="./js/plugins/hoverIntent/jquery.hoverIntent.minified.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/demo/gallery.js"></script>


<script src="../js/plugins/validate/jquery.validate.js"></script>


<script src="../js/demo/validation.js"></script>

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

}
?>
