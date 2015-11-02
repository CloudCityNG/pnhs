<?php include('../db/db.php');
@session_start();
 if (!isset($_SESSION['username'])) {
	
		echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
}
else{
	$username = $_SESSION['username'];
 ?>
<html>
<head><title>PNHS System</title>

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
	
	<script type="text/javascript">
function printpage() {
document.getElementById('Back').style.visibility="hidden";
//document.getElementById('dpic_usr').style.visibility="hidden";
document.getElementById('printButton').style.visibility="hidden";
document.getElementById('edit_pds').style.visibility="hidden";

window.print();
document.getElementById('Back').style.visibility="visible";
document.getElementById('edit_pds').style.visibility="visible";
//document.getElementById('dpic_usr').style.visibility="visible";
document.getElementById('printButton').style.visibility="visible";  
}

</script>
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

<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
</style>
</head>


<body>

<?php 
if(isset($_GET['emp_id'])){
	$emp_id=$_GET['emp_id'];
	
	$find=mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
	while($found=mysql_fetch_assoc($find)){

?>

<form id="AddPersonnel" action="#"  method="post" enctype="multipart/form-data" >

<div style="border:1px solid #000;width:816px;margin-left:auto;margin-right:auto;">


<table class="table bordered" width="816" >
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>PERSONAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<?php
								$find_pic=mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$emp_id'");
								$found_pic=mysql_fetch_assoc($find_pic);
							?>
							<td><div id="dpic"><center><img src="include/dpic/<?php echo $found_pic['pic_name']; ?>" id="chng_dpic" onBlur="chk_img()" style="width:137px;height:175px" id="d_pic"/><center><br />
							<!--<input  type="file" class="validate[required]" name="dpic_usr" id="dpic_usr"   onchange="readURL(this);"  style="height:20px;width:90px;" />--></div></td>
						  </tr>
                          <tr>
                          	<td colspan="2" style="background-color:#EAEAEA;">EMPLOYEE ID</td>
                            <td colspan="2"><b><input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>" /><input type="text" disabled value="<?php echo $emp_id; ?>"></b></td>
                            <td colspan="2" style="background-color:#EAEAEA;">DEPARTMENT</td>
							<td colspan="2">
									<?php 
									$dept_id=$found['dept_id'];
                                    $dept =mysql_query("SELECT * FROM department_t WHERE dept_id='$dept_id'");
                                    while($print_dept=mysql_fetch_assoc($dept)){
                                     ?>
                                    <b><?php echo $print_dept['dept_name']; ?> </b>
                                    <?php } ?>
                             </td>
                          </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2"><b><?php echo $found['l_name']; ?></b></td>
							<td width="91" style="background-color:#EAEAEA;" colspan="2">POSITION</td>
							<td width="109"><b>
								<?php 
								$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id ='$emp_id'");
								$found_role=mysql_fetch_assoc($find_role);
								$role_id=$found_role['role_id'];
								$role =mysql_query("SELECT * FROM employee_position_t WHERE position_id='$role_id'");
								while($print_pos=mysql_fetch_assoc($role)){
								 ?>
								<?php echo $print_pos['position_title']; ?>																			
								<?php 
								}
								?>
								</b>
							</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2"><b><?php echo $found['f_name']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" ><b><?php echo $found['m_name']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">NAME EXTENSION(e.g. Jr., Sr.,)</td>
							<td width="203" colspan="2"><b><?php echo $found['name_extension']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">DATE OF BIRTH(yyyy/mm/dd)</td>
							<td colspan="2"><b><?php echo $found['b_date']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">RESIDENTIAL ADDRESS</td>
							<td colspan="2"><b><?php echo $found['address']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PLACE OF BIRTH</td>
							<td colspan="2"><b><?php echo $found['place_of_birth']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP </td>
							<td colspan="2"><b><?php echo $found['zip_code']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SEX</td>
							<td colspan="2"><b><?php echo $found['gender']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">CONTACT NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no1']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CIVIL STATUS</td>
							<td colspan="2"><b><?php echo $found['civil_status']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">PERMANENT ADDRESS</td>
							<td colspan="2"><b><?php echo $found['p_address']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">CITIZENSHIP</td>
							<td colspan="2"><b><?php echo $found['citizenship']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">ZIP</td>
							<td colspan="2"><b><?php echo $found['p_zipcode']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">HEIGHT</td>
							<td colspan="2"><b><?php echo $found['height']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no2']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">WEIGHT</td>
							<td colspan="2"><b><?php echo $found['weight']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">EMAIL ADDRESS(if any)</td>
							<td colspan="2"><b><?php echo $found['e_add1']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">BLOOD TYPE</td>
							<td colspan="2"><b><?php echo $found['blood_type']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">CELLPHONE NO.</td>
							<td colspan="2"><b><?php echo $found['contact_no3']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">GSIS ID NO.</td>
							<td colspan="2"><b><?php echo $found['gsis_id_no']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">AGENCY EMPLOYEE NO.</td>
							<td colspan="2"><b><?php echo $found['agency_emp_no']; ?></b/></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PAG-IBIG ID NO.</td>
							<td colspan="2"><b><?php echo $found['pag_ibig_id_no']; ?></b></td>
							<td colspan="2" style="background-color:#EAEAEA;">TIN</td>
							<td colspan="2"><b><?php echo $found['tin']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">PHILHEALTH NO.</td>
							<td colspan="2"><b><?php echo $found['philhealth_id_no']; ?></b></td>
							<td colspan="4" rowspan="2" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" style="background-color:#EAEAEA;">SSS NO.</td>
							<td colspan="2"><b><?php echo $found['sss_id_no']; ?></b></td>
						  </tr>
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>FAMILY BACKGROUND</strong></td>
						  </tr>
						  </tr>
						  
</table>
<table class="table" width="816">
					<tr align="center">
					<td align="center" width="408">
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S LAST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['sl_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
						  
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S FIRST NAME</td>
							<td colspan="2"  align="left"><b><?php echo $found['sf_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SPOUSE'S MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['sm_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">OCCUPATION</td>
							<td colspan="2" align="left"><b><?php echo $found['s_occupation']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">EMPLOYER/BUS. NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">BUSINNESS ADDRESS</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_add']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">TELEPHONE NO.</td>
							<td colspan="2" align="left"><b><?php echo $found['s_bus_telno']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FATHER'S SURNAME</td>
							<td colspan="2" align="left"><b><?php echo $found['fl_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['ff_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['fm_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MOTHER'S MAIDEN NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mmaiden_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">SURNAME</td>
							<td colspan="2" align="left"><b><?php echo $found['ml_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">FIRST NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mf_name']; ?></b></td>
							
						  </tr>
						  <tr align="center">
							<td colspan="2" style="background-color:#EAEAEA;">MIDDLE NAME</td>
							<td colspan="2" align="left"><b><?php echo $found['mm_name']; ?></b></td>
							
						  </tr>
						</td>
						
						<td align="center" width="408">
							<tr align="center">
  							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">COUNT(#)&nbsp;&nbsp;NAME OF CHILD</td>
							<td colspan="2" style="background-color:#EAEAEA;text-align:center;">DATE OF BIRTH(mm/dd/yyyy)</td>
						  </tr>
						  
						  <tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  </tr>
						  <?php 
							$find_child=mysql_query("SELECT * FROM eis_child_t WHERE emp_id='$emp_id' ORDER BY `eis_child_t`.`count` ASC ");
							while($found_child=mysql_fetch_assoc($find_child)){
						  ?>
						  
						  <tr align="center">
							<td colspan="2"><b><?php echo $found_child['count'].'&nbsp;-&nbsp;'.$found_child['child_name']; ?></b></td>
							<td colspan="2"><b><?php echo $found_child['child_bdate']; ?></b></td>
						  </tr>
						  
						  <?php 
							}
						  ?>
						  
						</td>
					</tr>	  
                          </table>
                          <table class="table" width="816">
						  <tr>
							<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>EDUCATIONAL BACKGROUND</strong></td>
						  </tr>
						  <tr>
							<td width="100" rowspan="2" style="background-color:#EAEAEA;"><div align="center">LEVEL</div></td>
							<td width="120" rowspan="2" style="background-color:#EAEAEA;"><div align="center">NAME OF SCHOOL<br />(Write in full)</div></td>
							<td width="130" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEGREE COURSE<br  />
							(Write in full)</div></td>
							<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">YEAR <br  />
							  GRADUATED<br  />
							(If Graduated)</span></div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px">HIGHEST GRADE/<br />
							  LEVEL/ <br  />
							  UNITS EARNED<br  />
							(If not graduated)</span></div></td>
							<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATE OF ATTENDANCE</div></td>
							<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">SCHOLARSHIP/<br />
							ACADEMIC HONORS RECEIVED</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><div align="center">From</div></td>
							<td style="background-color:#EAEAEA;"><div align="center">To</div></td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"> ELEMENTARY</td>
							<?php 
								$find_elem=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Elementary'");
								while($found_elem=mysql_fetch_assoc($find_elem)){
							
							?>
							<tr>
							<td style="background-color:#EAEAEA;">&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_elem['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_elem['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_elem['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_elem['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_elem['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">SECONDARY</td>
							<?php 
								$find_secon=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Secondary'");
								while($found_secon=mysql_fetch_assoc($find_secon)){
							
							?>
							<tr>
							<td style="background-color:#EAEAEA;">&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_secon['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_secon['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_secon['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_secon['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_secon['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;"><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
						<?php 
								$find_voc=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='Vocational'");
								while($found_voc=mysql_fetch_assoc($find_voc)){
							
							?>
							<tr>
							<td style="background-color:#EAEAEA;">&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_voc['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_voc['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_voc['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_voc['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_voc['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">COLLEGE</td>
							<tr><td>&nbsp;</td></tr>
							<?php 
								$find_col1=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='College1'");
								while($found_col1=mysql_fetch_assoc($find_col1)){
							
							?>
							<tr>
							<td style="background-color:#EAEAEA;">&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_col1['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_col1['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_col1['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_col1['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_col1['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_col1['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_col1['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <tr><td>&nbsp;</td></tr>
						 <!-- <tr>
						  <?php 
								//$find_col2=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='College2'");
								//while($found_col2=mysql_fetch_assoc($find_col2)){
							
							?>
							<td align="center"> <div align="center">
							  <b><?php //echo $found_col2['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php //echo $found_col2['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php //echo $found_col2['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_col2['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_col2['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_col2['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php //echo $found_col2['scholarship']; ?></b>
							</div></td>
							<?php
								//}
							?>
						  </tr> -->
						  <tr>
							<td rowspan="2" style="background-color:#EAEAEA;">GRADUATE STUDIES</td>
							<tr><td>&nbsp;</td></tr>
							<?php 
								$find_gs1=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='GS1' ORDER BY count ASC");
								while($found_gs1=mysql_fetch_assoc($find_gs1)){
							
							?>
							<tr>
							<td style="background-color:#EAEAEA;">&nbsp;</td>
							<td align="center"> <div align="center">
							  <b><?php echo $found_gs1['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php echo $found_gs1['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php echo $found_gs1['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php echo $found_gs1['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php echo $found_gs1['scholarship']; ?></b>
							</div></td>
							</tr>
							<?php
								}
							?>
						  </tr>
						  <!--<tr>
							<?php 
								//$find_gs2=mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' AND level='GS2'");
								//while($found_gs2=mysql_fetch_assoc($find_gs2)){
							
							?>
							<td align="center"> <div align="center">
							  <b><?php //echo $found_gs2['name_of_school']; ?></b>
							</div></td>
							<td>    <div align="center">
							  <b><?php //echo $found_gs2['degree_course']; ?></b>
							</div></td>
							<td> 							  <div align="center">
							  <b><?php //echo $found_gs2['year_graduated']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_gs2['highest_grade_earned']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_gs2['inclusive_date_att_from']; ?></b>
							</div></td>
							<td>  <div align="center">
							  <b><?php //echo $found_gs2['inclusive_date_att_to']; ?></b>
							</div></td>
							<td><div align="center">
							  <b><?php //echo $found_gs2['scholarship']; ?></b>
							</div></td>
							<?php
								//}
							?>
						  </tr> -->
						  <tr>
							<td colspan="8" style="display:none;">&nbsp;</td>
						  </tr>
						</table>



						
							 <table class="table" width="816">
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>CIVIL SERVICE ELIGIBILITY</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">CAREER SERVICE/ RA 1080 (BAORD/BAR)<BR  />
								UNDER SPECIAL LAW/CES/CSEE</div></td>
								<td width="66" rowspan="2" style="background-color:#EAEAEA;"><div align="center">RATING</div></td>
								<td rowspan="2" style="background-color:#EAEAEA;"><div align="center">DATE OF<BR />
								  EXAMINATION/<BR />
								CONFERMENT</div></td>
								<td colspan="2" rowspan="2" style="background-color:#EAEAEA;"><div align="center">PLACE OF EXAMINATION/<br />CONFERMENT</div></td>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">LICENSE(if applicable)</div></td>
							  </tr>
							  <tr>
								<td width="88" style="background-color:#EAEAEA;"><div align="center">NUMBER</div></td>
								<td width="105" style="background-color:#EAEAEA;"><div align="center">DATE OF RELEASE</div></td>
							  </tr>
								<?php  
								$find_civ=mysql_query("SELECT * FROM eis_civ_service_t WHERE emp_id='$emp_id'");
								while($found_civ=mysql_fetch_assoc($find_civ)){ ?>
							  <tr>
								<td colspan="2"><div align="center">
								  <b><?php echo $found_civ['career_service']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['rating']; ?></b>
								</div></td>
								<td width="120"><div align="center">
								  <b><?php echo $found_civ['date_of_exam']; ?></b>
								</div></td>
								<td colspan="2"><div align="center">
								  <b><?php echo $found_civ['place_of_exam']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['license_no']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_civ['license_date_release']; ?></b>
								</div></td>
							  </tr>
								<?php } ?>
							  </table>
							  
							<table class="table" width="816">  
							  <tr>
								<td colspan="8" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>WORK EXPERIENCE</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" style="background-color:#EAEAEA;"><div align="center">INCLUSIVE DATES<br />
								(mm/dd/yy)</div></td>
								<td width="105" rowspan="2" style="background-color:#EAEAEA;"><div align="center">POSITION TITLE<br />
								(Write in full)</div></td>
								<td width="200" rowspan="2" style="background-color:#EAEAEA;"><div align="center">DEPARTMENT/<br />AGENCY/OFFICE/<br />COMPANY<br />
								(Write in full)</div></td>
								<td width="82" rowspan="2" style="background-color:#EAEAEA;"><div align="center">MONTHLY<br />
								SALARY</div></td>
								<td width="75" rowspan="2" style="background-color:#EAEAEA;"><div align="center"><span style="font-size:10px;">SALARY GRADE<br  />
							  &amp; STEP <br />
								  INCREMENT<br />
								(format &quot;00-0&quot;)</span></div></td>
								<td width="145" rowspan="2" style="background-color:#EAEAEA;"><div align="center">STATUS OF <br />
								APPOINTMENT</div></td>
								<td width="62" rowspan="2" style="background-color:#EAEAEA;"><div align="center">GOV'T<br />
								  SERVICE<br />
								(Yes/No)</div></td>
							  </tr>
							  <tr>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">FROM</div></td>
								<td width="60" style="background-color:#EAEAEA;"><div align="center">TO</div></td>
							  </tr>
							   <?php  
									$find_work=mysql_query("SELECT * FROM eis_work_experience_t WHERE emp_id='$emp_id'");
									while($found_work=mysql_fetch_assoc($find_work)){ 
																				 
								 ?> 
							  <tr>
								<td><div align="center">
								  <b><?php echo $found_work['inclusive_date_from']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['inclusive_date_to']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['position_title']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['dept_agency_office_company']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['monthly_salary']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['salary_grade_and_step_inc']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['status_of_appointment']; ?></b>
								</div></td>
								<td><div align="center">
								  <b><?php echo $found_work['govt_service']; ?></b>
								</div></td>
							  </tr>
								<?php } ?>
							</table>

							<table class="table" width="816">
							 <tbody>
							  <tr>
								<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</strong></td>
								</tr>
							 
							  <tr>
								<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5;">NAME & ADDRESS OF ORGANIZATION<br />
								(Write in full)</td>
								<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATES<br />(yyyy/mm/dd)</td>
								<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
								<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">POSITION/NATURE OF WORK<br />(Write in full)</td>
							  </tr>
							  <tr>
								<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
								<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
								</tr>
									<?php  
										$find_vol=mysql_query("SELECT * FROM eis_voluntary_work_t WHERE emp_id='$emp_id'");
										while($found_vol=mysql_fetch_assoc($find_vol)){
													
									?> 
								<tr>
								<td align="center"><b><?php echo $found_vol['name_of_org']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['inclusive_date_from']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['inclusive_date_to']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['no_of_hrs']; ?></b></td>
								<td align="center"><b><?php echo $found_vol['nature_of_work']; ?></b></td>
							  </tr>
							 
							  <?php } ?> 
							   </tbody>
								</table>
								
								 <table class="table" width="816">
								 <tbody>
								  <tr>
									<td colspan="5"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>TRAINING PROGRAMS</strong></td>
									</tr>
								 
								  <tr>
									<td width="308" rowspan="2" align="center" style="background-color:#EAEAEA;font-size:11.5px;">TITLE OF SEMINARS/CONFERENCE/WORKSHOP/SHORT COURSE<br />
									(Write in full)</td>
									<td colspan="2" align="center" style="background-color:#EAEAEA;">INCLUSEIVE DATE OF ATTENDANCE<br />(yyyy/mm/dd)</td>
									<td width="70" rowspan="2" align="center" style="background-color:#EAEAEA;">NUMBER OF<br /> HOURS</td>
									<td width="224" rowspan="2" align="center" style="background-color:#EAEAEA;">CONDUCTED/SPONSORED BY<br />(Write in full)</td>
								  </tr>
								  <tr>
									<td width="90" align="center" style="background-color:#EAEAEA;">FROM</td>
									<td width="90" align="center" style="background-color:#EAEAEA;">TO</td>
									</tr>
								   <?php  
									$find_train=mysql_query("SELECT * FROM eis_training_program_t WHERE emp_id='$emp_id'");
									while($found_train=mysql_fetch_assoc($find_train)){
									
									?>  
								 <tr>
									<td align="center"><b><?php echo $found_train['title_of_seminar']; ?></b></td>
									<td align="center"><b><?php echo $found_train['inclusive_date_att_from']; ?></b></td>
									<td align="center"><b><?php echo $found_train['inclusive_date_att_to']; ?></b></td> 
									<td align="center"><b><?php echo $found_train['no_of_hrs']; ?></b></td>
									<td align="center"><b><?php echo $found_train['conducted_sponsor_by']; ?></b></td>
								  </tr>
								  <?php } ?> 
								</tbody>
								  </table>
								  
								  <table class="table" width="816">
								<tbody>
								  <tr>
									<td colspan="3"  style="background-color:#969696;font-size:17px;font-style:italic;"><strong>OTHER INFORMATION</strong></td>
									</tr>
								  <TR>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">SPECIAL SKILLS/HOBBIES</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">NON-ACEDEMIC DISTICTIONS/RECOGNITION
								<br>(Write in full)</td>
								  <td width="272"  align="center" style="background-color:#EAEAEA;">MEMBERS IN ASSOCIATION/ORGANIZATION
								<br>(Write in full)</td>
								  </tr>
									<?php  
									$find_o1=mysql_query("SELECT * FROM eis_other_info1_t WHERE emp_id='$emp_id'");
									while($found_o1=mysql_fetch_assoc($find_o1)){
									?>  
								   <tr>
									<td align="center"><b><?php echo $found_o1['special_skills']; ?></b></td>
									<td align="center"><b><?php echo $found_o1['recognition']; ?></b></td>
									<td align="center"><b><?php echo $found_o1['organization']; ?></b></td>
									</tr>
									<?php } ?> 
									</tbody>
								  </table>
	
						
							<table class="table" width="816">
						  <tr>
							<td width="616" style="border:none" style="background-color:#EAEAEA;">36.Are you related by consanguinity or affinity to any of the following : </td>
							<td width="200" style="border:none" >&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none"></td>
							<td style="border:none">&nbsp; </td>
						  </tr>
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">a. Within the third degree (for National Government Employees):                                                      appointing authority, recommending authority, chief of office/bureau/department or person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</td>
							
							<?php 
							$find_oi1=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q36_a'");
							$found_oi1=mysql_fetch_assoc($find_oi1)
							?>
							
							<td style="border:none">
							
							<b>&raquo;<?php echo $found_oi1['answer']; ?></b>
											
						  </tr>
							</td>
						  
						  <tr>
                          
							<td style="border:none">&raquo;Details:
							
						</td>
						  </tr>
						  <tr>
                          	
							<td style="border:none"><b>&raquo; <?php echo $found_oi1['details']; ?></b></td>
							
						  </tr>
                          
                          <tr>
                          	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
						  
						  <tr>
							<td rowspan="3" style="border:none" style="background-color:#EAEAEA;">b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?</td>
							
							<?php 
							$find_oi2=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q36_b'");
							$found_oi2=mysql_fetch_assoc($find_oi2)
							?>
							
							<td style="border:none"><b>&raquo; <?php echo $found_oi2['answer'] ?></b></td>
						  </tr>
						  <tr>
                          	
							<td style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td style="border:none"><b>&raquo; <?php echo $found_oi2['details'] ?></b></td>
							
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
						</table><!--close q36 -->

						<table class="table" width="816">
						  <tr>
							<td width="600" style="border:none" style="background-color:#EAEAEA;">37. a. Have you ever been formally charged?</td>
							 <?php 
							$find_oi3=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q37_a'");
							$found_oi3=mysql_fetch_assoc($find_oi3);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi3['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi3['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
							<td  style="border:none" style="background-color:#EAEAEA;">b. Have you ever been guilty of any administrative offense?</td>
							<?php 
							$find_oi4=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q37_b'");
							$found_oi4=mysql_fetch_assoc($find_oi4);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi4['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi4['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  
						</table><!--close q37 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
                            
                            
							<?php 
							$find_oi5=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q38'");
							$found_oi5=mysql_fetch_assoc($find_oi5);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi5['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi5['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  
						</table><!--close q38 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</td>
							<?php 
							$find_oi6=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q39'");
							$found_oi6=mysql_fetch_assoc($find_oi6);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi6['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi6['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						</table><!--close q39 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">40. Have you ever been a candidate in a national or local election (except Barangay election)?</td>
							<?php 
							$find_oi7=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q40'");
							$found_oi7=mysql_fetch_assoc($find_oi7);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi7['answer'] ?></b></td>
						  </tr>
						  <tr>
							
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							
							<td  style="border:none"><b>&raquo;<?php echo $found_oi7['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						</table><!--close q40 -->
						<table class="table" width="816">
						  <tr>
							<td  rowspan="3" style="border:none" style="background-color:#EAEAEA;">41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
							<td width="200" style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">a. Are you a member of any indigenous group?</td>
							<?php 
							$find_oi8=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_a'");
							$found_oi8=mysql_fetch_assoc($find_oi8);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi8['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi8['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">b. Are you differently abled?</td>
							<?php 
							$find_oi9=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_b'");
							$found_oi9=mysql_fetch_assoc($find_oi9);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi9['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi9['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						  <tr>
							<td style="border:none" style="background-color:#EAEAEA;">c. Are you a solo parent?</td>
							<?php 
							$find_oi10=mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' AND question_no='q41_c'");
							$found_oi10=mysql_fetch_assoc($find_oi10);
							?>
                            
                            <td width="200" style="border:none"><b>&raquo;<?php echo $found_oi10['answer'] ?></b></td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td  style="border:none">&raquo;Details:</td>
						  </tr>
						  <tr>
							<td  style="border:none">&nbsp;</td>
							<td  style="border:none"><b>&raquo;<?php echo $found_oi10['details'] ?></b></td>
						  </tr>
                          <tr>
                          	<td>&nbsp;</td>
                          </tr>
						</table><!--close q41 -->
						
						<br/>
						<table class="table" width="816">
                        	
                        
						  <tr>
							<td colspan="4" style="border:none" style="background-color:#EAEAEA;">42. REFERENCES</td>
						  </tr>

						  <tr>
							<td style="text-align:center;" style="background-color:#EAEAEA;">NAME</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">ADDRESS</td>
							<td style="text-align:center;" style="background-color:#EAEAEA;">TEL NO.</td>
							
						
						 </tr>
						  <?php  
							$find_ref=mysql_query("SELECT * FROM eis_reference_t WHERE emp_id='$emp_id'");
							while($found_ref=mysql_fetch_assoc($find_ref)){
						  ?>  
						  <tr>
							<td align="center" ><b><?php echo $found_ref['name']; ?></b></td>
							<td align="center"><b><?php echo $found_ref['address']; ?></b></td>
							<td align="center"><b><?php echo $found_ref['tel_no']; ?></b></td>
						  </tr>
						<?php } ?> 
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
						  <tr>
							<td colspan="3" style="border:none" style="background-color:#EAEAEA;">43. I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.</td>
						  </tr>
						  <tr>
							<td colspan="3" rowspan="2" style="border:none" style="background-color:#EAEAEA;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.</td>
						  </tr>
						  <tr>
							<td style="border:none" align="center"></td>

						  </tr>
						</table>
						
						<br />
						<!--<table class="table" width="816">
						  <tr>
							<td colspan="6" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="6" style="background-color:#969696;font-size:17px;font-style:italic;"><strong>ACCOUNT DETAILS</strong></td>
						  </tr>
						  <tr>
							<td width="162" style="background-color:#EAEAEA;">LOGIN ID</td>
							<td width="150"><input value=""  style="width:150px;height:20px;" class="validate[required,ajax[myTryCallHehe],custom[onlyLetterNumber]] text-input" type="text" name="user" id="user" /></td>
							<!--<td width="91" style="background-color:#EAEAEA;">POSITION</td>
							<td width="109"> <select name="position" id="position" class="validate[required]" style="height:25px;font-size:12px;width:100px" >

<option> </option>
<?php 
//$role =mysql_query("SELECT * FROM employee_position_t");
//while($print_pos=mysql_fetch_assoc($role)){

 ?>

<option value="<?php// echo $print_pos['position_id']; ?>"><?php //echo $print_pos['position_title']; ?></option>
																			
<!--																			<option >Cashier</option>
																			<option>Librarian</option>
																			<option>Principal</option>
																			<option>Registrar</option>
																			<option>H. Teacher III</option>
																			<option>H. Teacher VI</option>
																			<option>M. Teacher I</option>
																			<option>M. Teacher II</option>
																			<option>M. Teacher III</option> -->
																			
<?php 

//}
?>
            														<!--	</select>
                                                                     
																		<script>
																			var select = document.getElementById('position');
																			var input = document.getElementById('user_type');
																			select.onchange = function() {
																			 if(select.value == ''){
																			 document.getElementById('user_type').value='';
																			   document.getElementById('subject').style.display="none";
																				document.getElementById('if_teacher').style.display="none";
																			 
																			 }
																			else if(select.value == 'H. Teacher III' || select.value == 'H. Teacher VI' || select.value == 'M. Teacher I' || select.value == 'M. Teacher II' || select.value == 'M. Teacher III' || select.value == '5' || select.value == '6' || select.value == '7' || select.value == '8' || select.value == '9'){
																			   document.getElementById('user_type').value='Teaching';
																			   document.getElementById('subject').style.display="block";
																				document.getElementById('if_teacher').style.display="block";
																			return; 
																				
																			} else{
																			 document.getElementById('user_type').value='Non-Teaching';
																			   document.getElementById('subject').style.display="none";
																				document.getElementById('if_teacher').style.display="none";
																			
																			}
																		};
																		</script><!--</td> 
						<!--	<td width="119" style="background-color:#EAEAEA;">TYPE</td>
							<td width="157"><span style="border:none">
							  <input type="text" readonly name="user_type"  id="user_type"  style="font-size:12px;text-align:center" />
							</span></td> -->
						<!--  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">PASSWORD</td>
							<td><input type="password" name="pass" id="pass" style="width:150px;height:20px;" class="validate[required]" /></td>
							<td colspan="4" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td style="background-color:#EAEAEA;">CONFIRM PASSWORD</td>
							<td><input type="password" name="cpass" class="validate[required, equals[pass]]" id="cpass" style="width:150px;height:20px;" /></td>
							
							<td id="if_teacher" style="display:none;" style="background-color:#EAEAEA;">TEACHING SUBJECT</td>
							<td id="subject" style="display:none;">
																		  <select name="subject" id="subject" style="height:25px;font-size:12px;" class="validate[required]">
																			<option></option> ";
																			<?php
																			
																			  //$result12 = mysql_query('SELECT * FROM subject_t')  
																			//or die (mysql_error());  
																		 
																			//while ($row12 = mysql_fetch_assoc($result12)) { 
																			 //echo  '<option value="'. $row12['subject_code'] . '" name="' . $row12['subject_code']. '">' . $row12['subject_title']. '</option>';
																			//} 
																			?>
																		</select></td>
						  </tr>
						  <tr>
							<td colspan="6" style="display:none;">&nbsp;</td>
						  </tr>
						</table>-->
                       
<div style="width:200px;margin-left:auto;margin-right:auto;">
					<a id="Back" onClick="window.close();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<a href="editPDS.php?id=<?php echo $emp_id; ?>" id="edit_pds" class="button block grey"><i class="icon-edit"></i>Edit PDS</a>
					<a id="printButton" onClick="printpage()" class="button grey block left"><span class="icon-print"></span>Print</a>
					
					</div>					   
              </div>   
					
					
           </form>  
           
<?php 


	}
} 


?>           
                        
 </body>
</html>	 
<?php } ?>                      