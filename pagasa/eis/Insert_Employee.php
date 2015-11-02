<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
<!--
.style61 {font-size: 12px; font-family: tahoma; }
.style82 {font-family: Arial, Helvetica, sans-serif}
.style83 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style84 {color: red}
-->
</style>
<style type="text/css">
<!--
.style86 {font-size: 0.9em}
.style88 {
	color: #0066FF
}
.style94 {color: #003399}
-->

</style>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>APW</title>
		<link rel="stylesheet" type="text/css" href="apw/styles.css" />
       
       
<script type="text/javascript">
function validateForm()
{
	var x=document.forms["myForm"]["lastname"].value;
  

	if (x==null || x=="")
	  {
	  alert("Surname Field must be filled out.");
	  return false;
	  }
	var x=document.forms["myForm"]["firstname"].value;
	
	if (x==null || x=="")
	  {
	  alert("Field for First Name must be filled out.");
	  return false;
	  }
	  
	  var x=document.forms["myForm"]["email"].value;
	  if (x != "")
		{
	 		var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  				{
  						alert("Not a valid e-mail address");
  						return false;
  				}
			}
	  
	var x=document.forms["myForm"]["sbdate"].value;
	if (x==null || x=="")
	  {
	  alert("Field for Birth Date must be filled out.");
	  return false;
	  }

	var x=document.forms["myForm"]["password"].value;
	if (x==null || x=="")
	  {
	  alert("Password Field must not be empty.");
	  return false;
	  }
	  
	    if (myForm.password.value.length < 8)
		{
		alert("Please enter at least 8 characters in the \"password\" field.");
		myForm.password.focus();
		return (false);
		}
	  
	var x=document.forms["myForm"]["password2"].value;
	if (x==null || x=="")
	  {
	  alert("Password Field must not be empty.");
	  return false;
	  }
	  
	var x1=document.forms["myForm"]["password"].value;
	var x2=document.forms["myForm"]["password2"].value;
	if (x1!=x2)
	  {
	  alert("Passwords do not match.");
	  return false;
	  }
	
	var x=document.forms["myForm"]["brgy"].value;
	if (x==null || x=="")
	  {
	  alert("Field for Barangay place of birth must not be empty.");
	  return false;
	  }
	  
	  
	  var x=document.forms["myForm"]["municipality"].value;
	if (x==null || x=="")
	  {
	  alert("Field for municipality place of birth must not be empty.");
	  return false;
	  }
	
 var x=document.forms["myForm"]["province"].value;
	if (x==null || x=="")
	  {
	  alert("Field for province place of birth must not be empty.");
	  return false;
	  }
var x=document.forms["myForm"]["zipcode"].value;
	if (x==null || x=="")
	  {
	  alert("Field for zipcode place of birth must not be empty.");
	  return false;
	  }
	  
	  
	  var x=document.forms["myForm"]["brgy2"].value;
	if (x==null || x=="")
	  {
	  alert("Field for zipcode must not be empty.");
	  return false;
	  }

 var x=document.forms["myForm"]["municipality2"].value;
	if (x==null || x=="")
	  {
	  alert("Field for municipality must not be empty.");
	  return false;
	  }

 var x=document.forms["myForm"]["zipcode2"].value;
	if (x==null || x=="")
	  {
	  alert("Field for zipcode must not be empty.");
	  return false;
	  }



}
</script>
<script type="text/javascript">
   function lettersOnly(evt) {
       evt = (evt) ? evt : event;
	  
       var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
          ((evt.which) ? evt.which : 0));
       if (charCode > 33 && (charCode < 65 || charCode > 90) && 
          (charCode < 97 || charCode > 122)) {
         
          return false;
       }
       return true;
     }
</script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript" src="../WildlifeWebsite/employee/javascripts/regform.js"></script>
<script type="text/javascript" src="../WildlifeWebsite/employee/javascripts/jquery.js"></script>
<!--datepicker-->
<script src="../WildlifeWebsite/employee/datepicker/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
<link href="../WildlifeWebsite/employee/datepicker/jquery-ui.css" type="text/css" rel="stylesheet" media="all"/>
<script type="text/javascript" src="../WildlifeWebsite/employee/fancybox/jquery.fancybox-1.3.2.js"></script>
<script type="text/javascript" src="../WildlifeWebsite/employee/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="../WildlifeWebsite/employee/fancybox/jquery.fancybox-1.3.2.pack.js"></script>
<script type="text/javascript" src="../WildlifeWebsite/employee/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<link href="../WildlifeWebsite/employee/fancybox/jquery.fancybox-1.3.2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
 
$(function() {
    setInterval( "slideSwitch()", 2000 );
});


              $(document).ready(function(){
				$('a#ne').fancybox({
				'width' 			: 700,
				'overlayShow'		: true,
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'overlayColor'		: '#fff',
				'overlayOpacity'	: 0.6,
				'centerOnScroll'	: true,
				'enableEscapeButton': true,
				'hideOnOverlayClick': false,
				'margin'			: 0,
				'padding'			:0
				});
				
			    $('#tsdiv').hide();
			  });
			  
function showDetails(){
pos = document.getElementById( "PList" ).value ;
if (pos == "1"){
	$('#tsdiv').fadeIn();
}
else{ $('#tsdiv').hide();}
}
   
   
$(document).ready(function () {
					$( ":input[data-datepicker='true']" ).datepicker({
							dateFormat:"yy-mm-dd",
							changeMonth: true,
							changeYear: true
					});		
		});   

</script>
<script type="text/javascript">
function loadnext(divout,divin){

$("." + divout).hide();
$("." + divin).show();
}

        $(document).ready(function(){	
			$("#entercode").hide();
			
			   $("#logOut").click(function(){  
					var exit = confirm("Are you sure you want to exit?");  
					if(exit==true){window.location = 'home.php?exitPortal=1';}  
				});
		});	
		
		function showenter(){
			$("#entercode").fadeIn("fast");
        }
  
        function m(){$("a#nextstep4").click();}

</script>
<title>Add New Record</title>

<script type="text/javascript" src="../WildlifeWebsite/employee/javascripts/regform.js"></script>
<SCRIPT LANGUAGE="JavaScript">
		function checkIt(evt) 
			{
				evt = (evt) ? evt : window.event
				var charCode = (evt.which) ? evt.which : evt.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57)) 
					{
						return false
					}
    			return true
			}
		
 </SCRIPT>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
<!--
#txt {
	font-family: "Courier New", Courier, monospace;
	font-size:24px;
	text-decoration:blink;
	color:#2D2D2D;
	font-weight:bold;
	padding-right:8px;
}
#wrapper #content1 .section_w940 {
	font-family: "Comic Sans MS", cursive;
	font-size: 14px;
}
.style85 {font-family: arial}
.style87 {font-size: small}
.style89 {color: #000000}
.style91 {font-size: 12px}
.style93 {font-size: 90%}
-->
</style>
<body onLoad="">
		<div id="wrapper">
		  <div id="menu"></div>
		  <div style="width:900px; margin:auto"></div>
		  <div id="content1">
    
        <div class="section_w940" style="width:100%">

                      
          <div style="width:100%; height:100%; float:left; font-family: 'Comic Sans MS', cursive;">
            <form action="InsertE_Proces.php" onsubmit="return validateForm();" method="post"  enctype="multipart/form-data" name="myForm" >
              <table width="100%" border="0">
                <tr>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                      <div align="left" class="style5 style66 style83  style93">
                      <input type="file" name="photo"  />
                        <p><strong><img src="Graphics/user_256 (1).png" alt="" width="143" height="138" />Personnel Information</strong></p>
                      </div>
                  </div></td>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                      <div align="left" class="style5 style66 style83 style93"><strong>Place of Birth</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="21%"><div align="right" class="style82 style91">Last Name</div></td>
                  <td width="2%"><div align="center">:</div></td>
                  <td width="30%" height="22"><input type="text" name="lastname" id="last_name" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td width="15%"><div align="right" class="style82 style91">City</div></td>
                  <td width="2%"><div align="center">:</div></td>
                  <td width="30%" height="22"><input type="text" name="B_City"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">First Name</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="firstname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                  <td><div align="right" class="style82 style91">Municipality</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="B_Mun" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Middle Name</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="middlename" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91"></div></td>
                  <td><div align="center"></div></td>
                  <td height="22"></td>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Bacgkground</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Gender</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input name="gender" type="radio" id="radio" value="M" checked="checked" />
                      <span class="style61"> Male
                        &nbsp;
                          <input type="radio" name="gender" id="radio2" value="F" />
                        Female</span></td>
                  <td><div align="right" class="style82 style91"> Address</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="Par_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Citizenship:</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="Citiz" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td>Father</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Civil Status</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="civil_stat" id="civil_stat" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                      
                    </select></td>
                  <td><div align="right" class="style82 style91">Last Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="F_Lname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Birth Date</div></td>
                  <td><div align="center">:</div></td>
                  <td height="25"><input  type="date" name="bdate" id="sbdate" required="required" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"/></td>
                  <td><div align="right" class="style82 style91">First Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="F_Fname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px" /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Height</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="height"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td><div align="right" class="style82 style91">Middle Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="F_Mname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Weight</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="weight"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td>Mother</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Blood Type</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="B_type"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td><div align="right" class="style82 style91">Last Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="M_Lname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><div align="right" class="style82 style91">First Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="M_Fname"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                  <td><div align="right" class="style82 style91">Middle Name</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="M_Mname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Access Data</strong></div>
                  </div></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Residential Address</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Employee_ID</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="Emp_ID" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">User Type</div></td>
                  <td><div align="center">:</div></td>
                  <td><select name="user_type">
                  	<option>PRN</option>
 					<option>VET</option>
                    <option>ADMIN</option>
                  </select></td>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="R_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Status</div></td>
                  <td><div align="center">:</div></td>
                  <td><select name="Status" >
  					<option>ACTIVE</option>
                    <option>DEACTIVATED</option>
                  </select>
                  </td>
                  <td><div align="right" class="style82 style91">Zip Code</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="R_Zip"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Password</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="password" name="password" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px" /></td>
                  <td><div align="right" class="style82 style91">Contact number</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="R_Con" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  
                  
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                      <div align="left" class="style5 style66 style83 style93"><strong>Important Information</strong>s</div>
                  </div></td>
                  <td colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                      <div align="left" class="style5 style66 style83 style93"><strong>Permanent Address</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">SSS Number</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="SSS_no" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="P_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">PAGIBIG Number</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="PAG" id="last_name6" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td><div align="right" class="style82 style91">Zip Code</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="P_Zip" id="last_name22" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Phil Health Number</div></td>
                  <td><div align="center">
                    <div align="center">:</div>
                  </div></td>
                  <td><input type="text" name="PHIL" id="last_name28" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td><div align="right" class="style82 style91">Contact number</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="P_Con" id="last_name23" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">TIN</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="TIN"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td height="22">&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">E-Mail Address</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="email" id="g_email"style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"/></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td height="22">&nbsp;</td>
                </tr>
                <tr>
                  <td height="22" colspan="6">&nbsp;</td>
                </tr>
                <tr>
                  <td height="22" colspan="6">&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Contact number</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Cellphone Number</div></td>
                  <td><input type="text" name="Cell_no" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"/></td>
                 
                </tr>
          </table>
              
              
              <table width="38%" border="0">
                <tr>
                  <td colspan="6">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="6"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>COMMUNITY TAX RECORD</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Certificate Number</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="Cer_num" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Issued City</div></td>
                  <td><div align="center">:</div></td>
                  <td height="24" colspan="4"><input type="text" name="Issued_City" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Issued Baranggay</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="Issued_brgy" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Issued on</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="date" name="Issued_on" id="sbdate3" onchange="remove_askfresh();"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"/></td>
               
                <tr>
                  <td colspan="2">&nbsp;</td>
                  <td colspan="4">&nbsp;</td>
                </tr>
          </table>
  		
  
                <table width="100%" border="0">
                <tr>
        		<td colspan="2" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Spouse <input type="checkbox" name="If_Spouse"/></strong></div>
                </td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">First Name&nbsp;&nbsp;:</div></td><td><input type="text" name="S_Fname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr><tr>
                <td width="15%"><div align="right" class="style82 style91">Middle Name&nbsp;&nbsp;:</div></td><td><input type="text" name="S_Mname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Last Name&nbsp;&nbsp;:</div></td><td><input type="text" name="S_Lname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Occupation&nbsp;&nbsp;:</div></td><td><input type="text" name="S_Occ" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Employer Business Name&nbsp;&nbsp;:</div></td><td><input type="text" name="S_Employer" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Business City&nbsp;&nbsp;:</div></td><td><input type="text" name="Bus_City" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Business Brgy.&nbsp;&nbsp;:</div></td><td><input type="text" name="Bus_Brgy" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                <td width="15%"><div align="right" class="style82 style91">Business ZipCode&nbsp;&nbsp;:</div></td><td><input type="text" name="Bus_Zip" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
  				</table>
  
  
    
<script type="text/javascript">
var child_c=0;
function AddChild(){
	if( child_c == 0)
		document.getElementById('child').innerHTML= "";	
	//fname=[];
	
	for(i=0;i<child_c;i++){
	
	}
		
	document.getElementById('child').innerHTML+= "<tr><td align='center'><input  type='text' name='c_fname"+child_c+"'/></td><td align='center'><input type='text' name='c_mname"+child_c+"'/></td><td align='center'><input type='text' name='c_lname"+child_c+"'/></td><td align='center'><input type='date' name='c_bdate"+child_c+"'/></td></tr>";
	child_c++;
	document.getElementById('child_c').value=child_c;
}

</script>  

`                <table width="100%" border="0">
                <tr>
                <td colspan="2" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Children</strong><input type="button" onclick="AddChild();" value="+"/></div>
               	<input type="hidden" value="0" name="child_c" id="child_c"/>
                </td>
  				</tr>
                </table>
				<table width="100%" border="0">
                <thead>
                <tr bgcolor="" style="font-family:Arial, Helvetica, sans-serif; text-align:center;">
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>Birthdate</td>
  				</tr>
                </thead>
                <tbody id="child">
                <tr>
                <td colspan="4" style="font-family:Arial, Helvetica, sans-serif;" align="center"><a href="javascript:AddChild();">Click to Add</a></td>
                </tr>
                </tbody>
                </table>
  
  
  
<script type="text/javascript">
var ref_c=0;
function AddRef(){
	if( ref_c == 0)
		document.getElementById('ref').innerHTML= "";	
	//fname=[];
	
	for(i=0;i<ref_c;i++){
	
	}
		
	document.getElementById('ref').innerHTML+= "<tr><td align='center'><input  type='text' name='r_fname"+ref_c+"'/></td><td align='center'><input type='text' name='r_mname"+ref_c+"'/></td><td align='center'><input type='text' name='r_lname"+ref_c+"'/></td><td align='center'><input type='date' name='r_bdate"+ref_c+"'/></td><td align='center'><input type='text' name='r_city"+ref_c+"'/></td><td align='center'><input type='text' name='r_brgy"+ref_c+"'/></td><td align='center'><input type='text' name='r_zip"+ref_c+"'/></td><td align='center'><input type='text' name='r_tel"+ref_c+"'/></td></tr>";
	ref_c++;
	document.getElementById('ref_c').value=ref_c;
}

</script>  
  
                <table width="100%" border="0">
                <tr>
                <td colspan="2" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>References</strong><input type="button" onclick="AddRef();" value="+"/></div>
               	<input type="hidden" value="0" name="ref_c" id="ref_c"/>
                </td>
  				</tr>
                </table>
				<table width="100%" border="0">
                <thead>
                <tr bgcolor="" style="font-family:Arial, Helvetica, sans-serif;text-align:center;">
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>Birthdate</td>
                <td>City</td>
                <td>Barangay</td>
                <td>Zip Code</td>
                <td>Tel No.</td>
  				</tr>
                </thead>
                <tbody id="ref">
                <tr>
                <td colspan="8" style="font-family:Arial, Helvetica, sans-serif;" align="center"><a href="javascript:AddRef();">Click to Add</a></td>
                </tr>
                </tbody>
                </table>
                
                <table width="100%" border="0">
                <tr>
                  <td colspan="6"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83  style93">
                      <p><strong>School Record</strong></p>
                    </div>
                  </div></td>
                </tr>
                <tr>
                  <td height="22" colspan="6"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Elementary Record</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="19%"><div align="right" class="style82 style91">School Name</div></td>
                  <td width="2%"><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="E_Name" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="E_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Highest Level Grade</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="E_Level" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Started</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="E_Start" style=" width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Graduated:</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22" colspan="4"><input type="text" name="E_End" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Academic Honors</div></td>
                  <td><div align="center">:</div></td>
                  <td height="25" colspan="4"><input type="text" name="E_Acad" onchange="remove_askfresh();"  style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"/></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Secondary School</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="19%"><div align="right" class="style82 style91">School Name</div></td>
                  <td width="2%"><div align="center">:</div></td>
                  <td width="79%" height="22"><input type="text" name="S_Sname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="S_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Highest Level Grade</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="S_Grade" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Started</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="S_Start" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Graduated</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="S_End" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td height="25"><div align="right" class="style82 style91">Academic Honors</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="S_Acad" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>College School</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">School Name</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_Name" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">College Course/Degree</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_Course" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Highest Level Grade</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_Level" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Started</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_Start" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Graduated</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="C_End" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td height="25"><div align="right" class="style82 style91">Academic Honors</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="C_Acad" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
              </table>
          <table width="100%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Graduating School (Optional)</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">School Name</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_Sname" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Address</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_Add" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">College Course/Degree</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_Course" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Highest Level Grade</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_Level" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"   /></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Started</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_Start" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td><div align="right" class="style82 style91">Year Graduated</div></td>
                  <td><div align="center">:</div></td>
                  <td height="22"><input type="text" name="G_End" style="height:; width:165px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px">
                  </select></td>
                </tr>
                <tr>
                  <td height="25"><div align="right" class="style82 style91">Academic Honors</div></td>
                  <td><div align="center">:</div></td>
                  <td><input type="text" name="G_Acad" style="height:; width:160px; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; padding-left:5px"    /></td>
                </tr>
              </table>
              <table width="101%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>SKILLS / HOBBIES</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="43%" height="22"><div align="right" class="style82 style91">Skills and Hobbies</div></td>
                  <td width="3%" rowspan="2"><div align="center">:</div></td>
                  <td width="54%" rowspan="2"><p>
                    <label for="Sk1"></label>
                    <textarea name="Sk1" id="Sk1" cols="45" rows="5"></textarea>
                  </p></td>
                </tr>
                <tr>
                  <td height="111">&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>NON-ACADEMIC DISTINCTION</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="43%" height="22"><div align="right" class="style82 style91">NON-ACAD RECORDS</div></td>
                  <td width="4%" rowspan="2"><div align="center">:</div></td>
                  <td width="53%" rowspan="2"><p>
                    <label for="N_A"></label>
                    <textarea name="N_A" id="N_A" cols="45" rows="5"></textarea>
                  </p>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="100%" height="204" border="0">
                <tr>
                  <td height="22" colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td height="23" colspan="3"><div align="right" class="style1" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>MEMBERSHIP</strong></div>
                  </div></td>
                </tr>
                <tr>
                  <td width="43%" height="22"><div align="right" class="style82 style91">MEMBERSHIP IN ORG/ASSOCIATION</div></td>
                  <td width="5%" rowspan="2"><div align="center">:</div></td>
                  <td width="52%" rowspan="2"><label for="Mem1"></label>
                  <textarea name="Mem1" id="Mem1" cols="45" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>


<script type="text/javascript">
var work_c=0;
function AddWorkExp(){
	if( work_c == 0)
		document.getElementById('work').innerHTML= "";	
	//fname=[];
	
	for(i=0;i<work_c;i++){
	
	}
	
		
	document.getElementById('work').innerHTML+= "<tr><td align='center'><input  type='date' name='from"+work_c+"'/></td><td align='center'><input type='date' name='to"+work_c+"'/></td><td align='center'><input type='text' name='pos"+work_c+"'/></td><td align='center'><input type='text' name='dept"+work_c+"'/></td><td align='center'><input type='text' name='salary"+work_c+"'/></td><td align='center'><input type='text' name='appoint"+work_c+"'/></td></tr>";
	work_c++;
	document.getElementById('work_c').value=work_c;
}
</script>  

  
			  
                <table width="100%" border="0">
                <tr>
                <td colspan="2" style="padding-left:30px; background-color:#CCCCCC">
                    <div align="left" class="style5 style66 style83 style93"><strong>Working Experience</strong><input type="button" onclick="AddWorkExp();" value="+"/></div>
               	<input type="hidden" value="0" name="work_c" id="work_c"/>
                </td>
  				</tr>
                </table>
				<table width="100%" border="0">
                <thead>
                <tr bgcolor="" style="font-family:Arial, Helvetica, sans-serif;text-align:center;">
                <td>In date from </td>
                <td>In date to</td>
                <td>Position Title</td>
                <td>Department Agency Office </td>
                <td>Monthly Salary</td>
                <td>Status of Appointment</td>
  				</tr>
                </thead>
                <tbody id="work">
                <tr>
                <td colspan="6" style="font-family:Arial, Helvetica, sans-serif;" align="center"><a href="javascript:AddWorkExp();">Click to Add</a></td>
                </tr>
                </tbody>
                </table>
                
<br />
<br />

				<center>
                <input type="submit" name="Add" value=" Add Personnel ">
                </center>
<br />
<br />
<br />
            </form>
          </div>
          
          <div class="cleaner">
          
          </div>
        </div>
    
    </div>
            <div id="content_bottom"></div>
		</div>
<div id="templatemo_footer">
  <center>
  </center>
</div> <!-- end of footer -->
</div>
<!-- end of wrapper -->
</body>
</html>
