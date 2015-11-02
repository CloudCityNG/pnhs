<?php
include '../db/db.php';
error_reporting(0);
session_start();
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
$query = mysql_query("SELECT * FROM account_t WHERE username='$username'")or die(mysql_error());
while ($leave = mysql_fetch_assoc($query)){
		$accno = $leave['account_no'];
	
$query=mysql_query("SELECT * FROM employee_t, employee_account_t, account_t, eis_leave_credits_t, employee_position_t, employee_role_t
					WHERE account_t.account_no='$accno'
					AND account_t.account_no=employee_account_t.account_no
					AND employee_account_t.emp_id=employee_t.emp_id
					AND employee_t.emp_id=eis_leave_credits_t.emp_id
					AND employee_t.emp_id=employee_role_t.emp_id
					AND employee_position_t.position_id=employee_role_t.role_id") or die(mysql_error());
while($pis_info=mysql_fetch_assoc($query)){
$p_id= $pis_info['emp_id'];
$fname = $pis_info['f_name'];
$lname = $pis_info['l_name'];
$mname = $pis_info['m_name'];
$position =$pis_info['position_title'];
$position_type=$pis_info['position_type'];
$leave_bal =$pis_info['leave_balance'];		
?>

<html>
<head><title>Leave Action - PNHS SYSTEM</title>

<link rel="stylesheet" href="include/css/external/jquery-ui-1.8.21.custom.css">
	
	<link rel="stylesheet" href="include/css/elements.css">
	
		<link rel="stylesheet" href="include/css/external/jquery-ui-1.8.21.custom.css">

	<link rel="stylesheet" href="include/css/icons.css">
	<script src="include/js/main.js"></script>
	<!-- JavaScript at the top (will be cached by browser) -->
	

	<script src="include/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="include/js/mylibs/number-functions.js"></script>
	<script src="include/js/libs/jquery-1.7.2.min.js"></script>
		<!-- Do the same with jQuery UI -->
	<script src="include/js/libs/jquery-ui-1.8.21.min.js"></script>
	<script src="include/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>

	<!-- VALIDATION ENGINE --> 
	
	<script src="include/js/validationEngine/jquery.validationEngine.js"></script>
	<script src="include/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
	<!-- end scripts -->
		<!-- VALIDATION ENGINE CSS-->
	<link rel="stylesheet" href="include/css/validationEngine.jquery.css">
<script>
function reason(id){
switch(id){
case 'vleave_reason1':
var chk= document.getElementById('sleave_reason').value="To seek employment";
var textbox = document.getElementById('other_reason1');
if(chk == "To seek employment"){
       textbox.style.display = 'none';
	
}else{

	textbox.style.display = 'none';
}break;

case 'vleave_reason2':
var chk= document.getElementById('vleave_reason2').value="Other";
var textbox = document.getElementById('other_reason1');
if(chk == "Other"){
       textbox.style.display = 'block';
	
}else{

	textbox.style.display = 'none';
}break;

case 'sleave_reason1':
var chk= document.getElementById('sleave_reason').value="Maternity";
var textbox = document.getElementById('other_reason2');
if(chk == "Maternity"){
       textbox.style.display = 'none';
	
}else{

	textbox.style.display = 'none';
}break;

case 'sleave_reason2':
var chk= document.getElementById('sleave_reason2').value="Other";
var textbox = document.getElementById('other_reason2');
if(chk == "Other"){
       textbox.style.display = 'block';
	
}else{

	textbox.style.display = 'none';
}break;

case 'incase_v1':
var chk= document.getElementById('incase_v1').value="Within the Philippines";
var textbox = document.getElementById('incase_v1_specify');
if(chk == "Within the Philippines"){
       textbox.style.display = 'none';
	
}else{

	textbox.style.display = 'none';
}break;

case 'incase_v2':
var chk= document.getElementById('incase_v2').value="Abroad";
var textbox = document.getElementById('incase_v1_specify');
if(chk == "Abroad"){
       textbox.style.display = 'block';
	
}else{

	textbox.style.display = 'none';
}break;

case 'incase_s1':
var chk= document.getElementById('incase_s1').value="In Hospital";
var textbox = document.getElementById('incase_s1_specify');
if(chk == "In Hospital"){
       textbox.style.display = 'block';
	   document.getElementById('incase_s2_specify').style.display="none";
}else{
	textbox.style.display = 'none';
}break;

case 'incase_s2':
var chk= document.getElementById('incase_s2').value="Out patient";
var textbox = document.getElementById('incase_s2_specify');
if(chk == "Out patient"){
       textbox.style.display = 'block';
	   document.getElementById('incase_s1_specify').style.display="none";
}else{
	textbox.style.display = 'none';
}break;
 }
}
</script>
<script>
$(document).ready(function () {
    
var select=function(dateStr) {
      var sd1 = $('#start_date').datepicker('getDate');
      var ed2 = $('#end_date').datepicker('getDate');
      var diff = 0;
      if (sd1 && ed2) {
// Calculate days between dates
var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
sd1.setHours(0,0,0,1);  // Start just after midnight
ed2.setHours(23,59,59,999);  // End just before midnight
var diff = ed2 - sd1;  // Milliseconds between datetime objects    
var days = Math.ceil(diff / millisecondsPerDay);
			
var weeks = Math.floor(days / 7);
var days = days - (weeks * 2);

// Handle special cases
var d1 = sd1.getDay();
var d2 = ed2.getDay();

// Remove weekend not previously removed.   
if (d1 - d2 > 1)         
    var days = days - 2;      

// Remove start day if span starts on Sunday but ends before Saturday
if (d1 == 0 && d2 != 6)
    var days = days - 1  

// Remove end day if span ends on Saturday but starts after Sunday
if (d2 == 6 && d1 != 0)
   var days = days - 1 
   
// Holidays
var ds = pad((sd1.getMonth() + 1), 2) + "-" + pad(sd1.getDate(), 2);
var de = pad((ed2.getMonth() + 1), 2) + "-" + pad(ed2.getDate(), 2);
<?php
include ("../db/db.php");
$sql = mysql_query("SELECT * FROM holidays_t ORDER BY holiday_date");
while($row=mysql_fetch_assoc($sql)){
$num = $row['holiday_date'];

?>
if (ds < <?php echo $num; ?> &&  <?php echo $num; ?> > de)
   var days = days - 1 
<?php } ?>
      }
      $('#duration').val(days);
}

$("#start_date").datepicker({ 
	beforeShowDay: noWeekendsOrHolidays,
	changeMonth: true,
	changeYear: true,
    onSelect: select
});
$('#end_date').datepicker({
beforeShowDay: noWeekendsOrHolidays,
changeMonth: true,
changeYear: true,
onSelect: select});
});

<?php
include ("../db/db.php");
$sql = mysql_query("SELECT * FROM holidays_t ORDER BY holiday_date");
$hol = mysql_num_rows($sql);
$i=0;
while($row=mysql_fetch_assoc($sql)){
$d[$i] = $row['holiday_date'];
$i++;
}
?>
<?php //for ($j=0;$j<$i;$j++){?>
holidayDates = [<?php 
for ($j=0;$j<$i;$j++){

echo "\"".$d[$j]."\","; 
}?> "1-1"];
<?php //} ?>



function nationalDays(date) {
   	dmy = pad((date.getMonth() + 1), 2) + "-" + pad(date.getDate(), 2); //padding 0 2 digits javascript
    if ($.inArray(dmy, holidayDates) == -1) {
        return [true, ""];
    } else {
        return [false, "", "Holiday"];
    }
}


function noWeekendsOrHolidays(date) {
    var noWeekend = $.datepicker.noWeekends(date);
    if (noWeekend[0]) {
        return nationalDays(date);
    } else {
        return noWeekend;
    }
}

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

</script>
<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		jQuery("#leave_form").validationEngine({
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
</head>

<body>
<form action="actions/doleave.php" method="post" id="leave_form" name="leave_form">  
<table width="750" style="border:3px #dce9f9 solid;font-family:calibri" >
  <tr>
    <td height="62" colspan="6"><div align="center"><font size="+3"><u>APPLICATION FOR LEAVE</u></font></div></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;background-color:#dce9f9;"><strong>DISTRICT/SCHOOL: </strong></td>
    <td colspan="3" style="background-color:#dce9f9;"><strong>Name (LAST)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(FIRST)</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(MIDDLE)</strong></td>
    </tr>
  <tr>
    <td colspan="3" style="text-align:center;border:3px #dce9f9 solid;border-top:none;">Leg.Port Dist.I/ Pag-asa National HS</td>
    <td colspan="3" style="border:3px #dce9f9 solid;border-top:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fname;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mname;?></td>
    </tr>
  <tr>
    <td colspan="3" style="text-align:center;background-color:#dce9f9;"> <strong>DATE OF FILING </strong></td>
    <td width="137" style="text-align:center;background-color:#dce9f9;"><strong>POSITION </strong></td>
    <td width="181">&nbsp;</td>
    <td width="66" ></td>
  </tr>
  <tr>
    <td colspan="3" align="center" style="border:3px #dce9f9 solid;border-top:none;"><input align="center" type="text" name="date_filled" readonly value="<?php print(Date("Y-m-d")); ?> " id="date_filed" /></td>
    <td style="text-align:center;border:3px #dce9f9 solid;border-top:none;"><?php echo $position; ?></td>
    <td>&nbsp;</td>
    <td><input type="hidden" value="<?php echo $p_id;?>" name="p_id" /></td>
  </tr>
  <tr>
    <td width="64">&nbsp;</td>
    <td colspan="2" style="text-align:center;background-color:#dce9f9;"><strong>TYPE OF LEAVE&nbsp;<font color="red">*</font></strong></td>
    <td colspan="2" style="text-align:center;background-color:#dce9f9;"> <strong>WHERE LEAVE WILL BE SENT </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="3" style="border:3px #dce9f9 solid;border-top:none;"><center><?php if($position_type == "teaching"){?>
    
		<select name="type_of_leave" id="type_of_leave" class="validate[required]">
        <option></option>
		<option>Sick Leave</option>
    </select>
	<?php }else{
		?><select name="type_of_leave" id="type_of_leave" class="validate[required]">
		  <option></option>
		<option >Vacation Leave</option>
		<option>Sick Leave</option>
    </select>
    <?php }?>
	
	
    <script>
	var select = document.getElementById('type_of_leave');
	
	select.onchange = function() {
	if(select.value == ''){
		
		document.getElementById('vleave_reason').style.display="none";
		document.getElementById('sleave_reason').style.display="none"; 
		document.getElementById('incase_vacation').style.display="none"; 
		document.getElementById('incase_sick').style.display="none";
		document.getElementById('sick_bal').style.display="none";
		document.getElementById('vacation_bal').style.display="none";
		document.getElementById('sleave_reason1').checked=false;
		document.getElementById('sleave_reason2').checked=false;
		document.getElementById('vleave_reason1').checked=false;
		document.getElementById('vleave_reason2').checked=false;
		document.getElementById('other_reason1').style.display="none";
		document.getElementById('other_reason2').style.display="none";
		document.getElementById('other_reason1').value="";
		document.getElementById('other_reason2').value="";
		document.getElementById('incase_s1').checked=false;
		document.getElementById('incase_s2').checked=false;
	   document.getElementById('incase_s1_specify').value="";
	   document.getElementById('incase_s2_specify').value="";
	     document.getElementById('incase_s1_specify').style.display="none";
	   document.getElementById('incase_s2_specify').style.display="none";
	   document.getElementById('incase_v1').checked=false;
		document.getElementById('incase_v2').checked=false;
		document.getElementById('incase_v1_specify').value="";
		document.getElementById('incase_v1_specify').style.display="none";
	}
    else if(select.value == 'Vacation Leave'){
     
		document.getElementById('vleave_reason').style.display="block";
		document.getElementById('sleave_reason').style.display="none"; 
		document.getElementById('incase_vacation').style.display="block"; 
		document.getElementById('incase_sick').style.display="none";
		document.getElementById('vacation_bal').style.display="block";
		document.getElementById('sick_bal').style.display="none";
		document.getElementById('sleave_reason1').checked=false;
		document.getElementById('sleave_reason2').checked=false;
		document.getElementById('other_reason2').style.display="none"; 
		document.getElementById('other_reason2').value="";
		document.getElementById('incase_s1').checked=false;
		document.getElementById('incase_s2').checked=false;
	   document.getElementById('incase_s1_specify').value="";
	   document.getElementById('incase_s2_specify').value="";
	   document.getElementById('incase_s1_specify').style.display="none";
	   document.getElementById('incase_s2_specify').style.display="none";
    }else{
	
		document.getElementById('sleave_reason').style.display="block";
		document.getElementById('vleave_reason').style.display="none";
		document.getElementById('incase_vacation').style.display="none";
		document.getElementById('incase_sick').style.display="block"; 
		document.getElementById('sick_bal').style.display="block";
		document.getElementById('vacation_bal').style.display="none";
		document.getElementById('vleave_reason1').checked=false;
		document.getElementById('vleave_reason2').checked=false;
		document.getElementById('other_reason1').style.display="none";
		document.getElementById('other_reason1').value="";
		document.getElementById('incase_v1').checked=false;
		document.getElementById('incase_v2').checked=false;
		document.getElementById('incase_v1_specify').value="";
		document.getElementById('incase_v1_specify').style.display="none";
		document.getElementById('other_reason2').style.display="none";
		document.getElementById('other_reason2').value="";
    }  
};
</script></center>
     <div id="vleave_reason" style="display:none;">
       <input type="radio" name="vleave_reason" id="vleave_reason1"   onClick="reason(id)" value="To seek employment" class="validate[required] radio"/>To seek employment<br />
       <input type="radio" name="vleave_reason" id="vleave_reason2"   onClick="reason(id)" value="Other" class="validate[required] radio"/>Other (Specify)
     </div>
      <div id="sleave_reason" style="display:none;">
        <input type="radio" name="sleave_reason" id="sleave_reason1"  onClick="reason(id)"  value="Maternity" class="validate[required] radio"/>Maternity/Paternity<br />
        <input type="radio" name="sleave_reason" id="sleave_reason2"  onClick="reason(id)"  value="Other" class="validate[required] radio"/>Other (Specify) 
      </div> <input type="text" name="other_reason1" id="other_reason1" size="20" style="display:none;"/><input type="text" name="other_reason2" id="other_reason2" class="validate[condRequired[sleave_reason2]]" size="20" style="display:none;"/></td>
    <td colspan="2" rowspan="3" style="border:3px #dce9f9 solid;border-top:none;"><div id="incase_vacation" style="display:none;">
    <strong>IN CASE OF VACATION LEAVE</strong> <br />
      <input type="radio" name="incase_v" id="incase_v1" value="Within the Philippines" onClick="reason(id)"  class="validate[required] radio"/> Within the Philippines<br />
	  
      <input type="radio" name="incase_v" id="incase_v2" value="Abroad" onClick="reason(id)"  class="validate[required] radio"/>
     Abroad(Specify)
      <input type="text" name="incase_v1_specify" id="incase_v1_specify" size="20" style="display:none;" class="validate[condRequired[incase_v2]]"/>
      </div>
       <div id="incase_sick" style="display:none;">
       <strong>IN CASE OF SICK LEAVE </strong><br />
      <input type="radio" name="incase_s" id="incase_s1" value="In Hospital" onClick="reason(id)"  class="validate[required] radio" />In Hospital(Specify)<br><input type="text" name="incase_s1_specify" id="incase_s1_specify" size="20" style="display:none;" class="validate[condRequired[incase_s1]]"/>
      <input type="radio" name="incase_s" id="incase_s2" value="Out patient" onClick="reason(id)"  class="validate[required] radio"/>
     Out patient(Specify) 
      <input type="text" name="incase_s2_specify" id="incase_s2_specify" size="20" style="display:none;" class="validate[condRequired[incase_s2]]"/>
       </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td colspan="3" style="text-align:center;background-color:#dce9f9;"><strong>NUMBER OF WORKING DAYS APPLIED FOR </strong></td>
    <td style="text-align:center;background-color:#dce9f9;"><strong>COMMUTATION</strong></td>
    <td style="text-align:center;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="147"  style="text-align:right;background-color:#dce9f9;"><strong>INCLUSIVE DATE:</strong></td>
    <td width="123">&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2" style="border:3px #dce9f9 solid;border-top:none;" ><input type="radio" name="commutation" id="commutation1" value="Requested" class="validate[required] radio" />
    Requested <br />   
      <input type="radio" name="commutation" id="commutation2" value="Not Requested" class="validate[required] radio"/>
Not Requested</td>
    <td style="text-align:center;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:right;background-color:#dce9f9;"><strong>Start Date:&nbsp;<font color="red">*</font></strong></td>
    <td style="border:3px #dce9f9 solid;border-left:none;"><input type="text" name="start_date" id="start_date" size="20" readonly class="validate[required]" />
	<span class="error" style="display:none;" id="SdateEmpty">Start Date is Required</span>
	</td>
    <td style="text-align:center;background-color:#dce9f9;"><strong>Leave Balance: </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:right;background-color:#dce9f9;"><strong>End Date:&nbsp;<font color="red">*</font></strong></td>
    <td style="border:3px #dce9f9 solid;border-left:none;"><input type="text" name="end_date" id="end_date" size="20" readonly class="validate[required]" />
	</td>
    <td style="border:3px #dce9f9 solid;border-top:none;" align="center">
	<input type="text" name="leave_balance" id="leave_bal" size="10" style="text-align:center;" placeholder="<?php echo $leave_bal; ?>" readonly />
	</td>
    <td style="text-align:left;">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="text-align:right;background-color:#dce9f9;" ><strong>Duration:</strong></td>
    <td style="border:3px #dce9f9 solid;border-left:none;"><input type="text" name="duration" id="duration" size="10" readonly placeholder="calculate" style="text-align:center;" class="validate[custom[num],min[1],max[15]]"/>
      Day(s)
	 
	  </td>
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" align="center"><input type="submit" name="submit" class="btn" value="Apply" ><input type="button" class="btn" onClick="window.close()" value="Cancel"/></td>
  </tr>
</table>
</form>
</body>
</html>			
<?php
}
}
}
?>