<?php
include ('../db/db.php');
@session_start();
include '../include/php/js.php';
include '../include/php/css.php';


 if (!isset($_SESSION['username'])) {
	
		echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
}
else{
	$username = $_SESSION['username'];
//if (!$_SESSION['username']) {
//header("location: ../restrict.php"); // IMPORTANT!!!!
	
//}
//else{
//$username = $_SESSION['username'];
//$query2 = mysql_query("SELECT * FROM account_t WHERE username='$username'")or die(mysql_error());

//while($found = mysql_fetch_assoc($query2)){
//$admin_id = $found['account_no'];

//$query1 = mysql_query("SELECT * FROM employee_t WHERE account_no='$admin_id'") or die(mysql_error());
//while($row= mysql_fetch_array($query1)){ 
//$data = array(
//				'emp_id' => $row['emp_id'],
//				'f_name' => $row['f_name'],
//				'l_name' => $row['l_name']
//			);
			
			
// get
$emp_id = $_GET['id'];

//account
$query12 = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'")or die(mysql_error());
while ($accs= mysql_fetch_assoc($query12)){
	//$account_no =$accs['account_no'];
	//$q12=mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'") or die(mysql_error());
	//$pis_info=mysql_fetch_assoc($q12);

$query = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'") or die(mysql_error());
$pis_personnel= mysql_fetch_array($query);
$q2 = mysql_query("SELECT * FROM eis_pic_t WHERE emp_id='$emp_id'") or die(mysql_error());
$q2= mysql_fetch_array($q2);
//$q3 = mysql_query("SELECT * FROM pis_position WHERE emp_id='$emp_id'") or die(mysql_error());
//$q3 =mysql_fetch_assoc($q3);
//$q4 = mysql_query("SELECT * FROM account_t WHERE account_no='$account_no'") or die(mysql_error());
//$q4 =mysql_fetch_assoc($q4);
//$q5 = mysql_query("SELECT * FROM eis_leave_credits_t WHERE emp_id='$emp_id'") or die(mysql_error());
//$q5 =mysql_fetch_assoc($q5);
$pis = array(
				'emp_id' => $pis_personnel['emp_id'],
				'dept_id' => $pis_personnel['dept_id'],
				'fname' => $pis_personnel['f_name'],
				'lname' => $pis_personnel['l_name'],
				'mname' => $pis_personnel['m_name'],
				'ext_name' => $pis_personnel['name_extension'],
				'bdate' => $pis_personnel['b_date'],
				'place_birth' => $pis_personnel['place_of_birth'],
				'gender' => $pis_personnel['gender'],
				'civil_status' => $pis_personnel['civil_status'],
				'citizenship' => $pis_personnel['citizenship'],
				'height' => $pis_personnel['height'],
				'weight' => $pis_personnel['weight'],
				'bloodtype' => $pis_personnel['blood_type'],
				'gsis' => $pis_personnel['gsis_id_no'],
				'pagibig' => $pis_personnel['pag_ibig_id_no'],
				'philhealth' => $pis_personnel['philhealth_id_no'],
				'sss' => $pis_personnel['sss_id_no'],
				'r_address' => $pis_personnel['address'],
				'address' => $pis_personnel['p_address'],
				'zip1' => $pis_personnel['zip_code'],
				'zip2' => $pis_personnel['p_zipcode'],
				'tel1' => $pis_personnel['contact_no1'],
				'tel2' => $pis_personnel['contact_no2'],
				'cp' => $pis_personnel['contact_no3'],
				'eadd' => $pis_personnel['e_add1'],
				'agency_emp_no' => $pis_personnel['agency_emp_no'],
				'tin' => $pis_personnel['tin'],
				'spouse_fname' => $pis_personnel['sf_name'],
				'spouse_mname' => $pis_personnel['sm_name'],
				'spouse_lname' => $pis_personnel['sl_name'],
				'spouse_occupation' => $pis_personnel['s_occupation'],
				'spouse_bus_name' => $pis_personnel['s_bus_name'],
				'spouse_bus_add' => $pis_personnel['s_bus_add'],
				'spouse_bus_tel_no' => $pis_personnel['s_bus_telno'],
				'father_fname' => $pis_personnel['ff_name'],
				'father_mname' => $pis_personnel['fm_name'],
				'father_lname' => $pis_personnel['fl_name'],
				'mother_maiden_name' => $pis_personnel['mmaiden_name'],
				'mother_fname' => $pis_personnel['mf_name'],
				'mother_mname' => $pis_personnel['mm_name'],
				'mother_lname' => $pis_personnel['ml_name'],
				//'position' => $pis_personnel['position'],
				//'teaching' => $pis_personnel['teaching'],
				//'nonteaching' => $pis_personnel['nonteaching'],
				
				'pic' => $q2['pic_name'],
				//'type' => $q3['type'],
				
				
				//'subject' => $q3['teach_subject'],
				//'user' => $q4['p_username'],
				//'pass' => $q4['p_password'],
				//'user' => $pis_info['username'],
				//'pass' => $pis_info['password'],
				//'type' => $pis_info['type'],
				//'sick_bal' => $q5['sick_bal'],
				//'vaca_bal' => $q5['vacation_bal'],
				//'total_bal' => $q5['leave_balance'],
			);
			
			?>

<html>
<head>

<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		jQuery("#EditPersonnel").validationEngine({
		promptPosition : "topLeft"
		
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

<!-- For Adding Children -->
<?php 
error_reporting(0);
$f_count=mysql_query("SELECT * FROM `eis_child_t` WHERE emp_id='$emp_id'");
$c_count= 0;
while($s_count=mysql_fetch_assoc($f_count)){
$c_count = $c_count + 1;}
?>
<script language="javascript">

//row_no=1;
row_no=parseInt(<?php echo $c_count; ?>);
if(row_no <= 0){
	row_no=1;	
	}
else{	
	row_no=parseInt(<?php echo $c_count; ?>)+1;
	}
function addRowChildren(tbl,row){
//row count

var tick = String(row_no);
if (row_no<11){
//Declaring text boxes
var count = tick;
var textbox  ='<input type="text" value="p_child'+tick+'_name" name="p_child'+tick+'_name"  id="p_child'+tick+'_name"  style="width:180px;height:17px;" >';
var textbox2 = '<input type="text" value="p_child_bday'+tick+'" name="p_child_bday'+tick+'"  id="p_child_bday'+tick+'" value="<?php  echo date('m/d/Y'); ?>" style="width:150px;height:17px;text-align:center;" >';
//var textbox3 = '<input type="text" size = "5" maxlength= "5"  id=frm'+tick+'>';
//var textbox4 = '<input type="date" class=validate[required]" size = "5" maxlength= "5"  id=to'+tick+'>';
//delete button
var stop = '<input type="button" class="btn btn-mini btn-danger" value="delete" onclick="deleteRow(this)" >';

//Inserting textboxes into table cells
var tbl = document.getElementById(tbl);
var rowIndex = document.getElementById(row).value;
var newRow = tbl.insertRow(row_no+1);
var newCell = newRow.insertCell(0);
newCell.innerHTML = count;
var newCell = newRow.insertCell(1);
newCell.innerHTML = textbox;
var newCell = newRow.insertCell(2);
newCell.innerHTML = textbox2;
//var newCell = newRow.insertCell(2);
//newCell.innerHTML = textbox3;
//var newCell = newRow.insertCell(3);
//newCell.innerHTML = textbox4;
//delete button within cell
var newCell = newRow.insertCell(3);
newCell.innerHTML = stop;

row_no++;
}

}
//Delete Function
function deleteRow(r)
{
    var i=r.parentNode.parentNode.rowIndex;
    document.getElementById('ChildrenTable').deleteRow(i);
    
    // Decrementing row_no
    row_no--;
}


</script> 




</head>
<body>
<!-- Some dialogs etc. -->

	<!-- The loading box -->
	<div id="loading-overlay"></div>
	<div id="loading">
		<span>Loading...</span>
	</div>
	<!-- End of loading box -->	

	<!-- The toolbar at the top -->
<?php /*	<section id="toolbar">
		<div class="container_12">
		
			<!-- Left side -->
			<div class="left">
				<ul class="breadcrumb">
					<li><a href="?menu=Dashboard">Dashboard</a></li>
				</ul>
			</div>
			<!-- End of .left -->
			
			<!-- Right side -->
			<div class="right">
				<ul>
				
					<li><a href="?viewProfile=<?php echo $admin_id;?>"><span class="icon i14_admin-user"></span>Profile</a></li>
					
					<li class="red"><a href="?menu=Logout">Logout</a></li>
					
				</ul>
			</div><!-- End of .right -->
			
			<!-- Phone only items -->
			<div class="phone">
				
				<!-- User Link -->
				<li><a href="pages_profile.html"><span class="icon icon-user"></span></a></li>
				<!-- Navigation -->
				<li><a class="navigation" href="#"><span class="icon icon-list"></span></a></li>
			
			</div><!-- End of phone items -->
			
		</div><!-- End of .container_12 -->
	</section><!-- End of #toolbar --> */ ?>

	
	<!--------------------------------->
	<!-- Now, the page itself begins -->
	<!--------------------------------->
	
	<!-- The container of the sidebar and content box -->
	<!--<div role="main" id="main" class="container_12 clearfix">
	
		<!-- The blue toolbar stripe -->
		<!--<section class="toolbar">
			<?php// include("toolbar.php"); ?>
		</section><!-- End of .toolbar-->
		
		<!-- The sidebar -->
		<!--<aside>
			<div class="top">
			
			<!-- Navigation -->
			<!--	<nav>
				<ul class="collapsible accordion">
				
					<li><a href="?view=Dashboard"><span class="icon i16_home"></span>Dashboard</a></li>
					<li class="current"><a href="?view=editPDS&id=<?php// echo $emp_id; ?>"><span class="icon i16_edit"></span>Edit PDS</a></li>
					<li ><a href="?view=Employees"><span class="icon i16_user"></span>Employees</a></li>
					<li><a href="?view=Leaves"><span class="icon i16_application--pencil"></span>Leaves</a></li>
					<li><a href="?view=Users"><span class="icon i16_users"></span>Users</a></li>
					
					
				</ul>
				</nav><!-- End of nav -->			
			
			<!--</div>
		</aside><!-- End of sidebar -->
		
		
		<!-- Here goes the content. -->
		<section id="content" class="container_12 clearfix" data-sort=true>
		<h1 class="grid_12 margin-top no-margin-top-phone">Edit PDS</h1>
		
		<div class="grid_12">
				<form id="EditPersonnel" action="edit_prof.php" method="post" enctype="multipart/form-data">
				
				<div class="box">

					
					<div class="accordion">
					
						<h3><a href="#">PERSONAL INFORMATION, FAMILY BACKGROUND AND EDUCATIONAL BACKGROUND</a></h3>
						<div>
						<table width="816" class="styled">
						  <tr>
							<td colspan="8"><strong>PERSONNAL BACKGROUND</strong></td>
						  </tr>
                          <tr>
                          	<td colspan="2">EMPLOYEE ID</td>
                            <td colspan="2"><input type="hidden" name="emp_id" value="<?php echo $pis['emp_id']; ?>" /><input type="text" disabled value="<?php echo $pis['emp_id']; ?>"></td>
                            <td colspan="2">DEPARTMENT</td>
							<td width="auto"> <select name="dept" id="dept" class="validate[required]" style="height:25px;font-size:12px;width:auto" >
									<?php 
									$dept_id=$pis['dept_id'];
                                    $dept =mysql_query("SELECT * FROM department_t WHERE dept_id='$dept_id'");
                                    while($print_dept=mysql_fetch_assoc($dept)){
                                     ?>
                                    <option value="<?php echo $print_dept['dept_id']; ?>"><?php echo $print_dept['dept_name']; ?> </option>
                                    <?php } ?>
                                    <?php 
                                    $dept =mysql_query("SELECT * FROM department_t");
                                    while($print_dept=mysql_fetch_assoc($dept)){
                                     ?>
                                    <option value="<?php echo $print_dept['dept_id']; ?>"><?php echo $print_dept['dept_name']; ?></option>                                    <?php } ?>
                                    <option value="0">NONE</option>
                                    </select>
                              </td>
                          </tr>
						  <tr>
							<td colspan="2">SURNAME</td>
							<td colspan="2"><input value="<?php echo $pis['lname']; ?>" class="validate[required] text-input" type="text" name="p_lname" id="p_lname" style="width:200px;height:17px;"  /></td>
							
                            
                            <td colspan="2">POSITION</td>
                            <td><select name="position" class="validate[required]">
                           
                            <?php 
							include("../db/db.php");
								$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$emp_id'");
								$found_role=mysql_fetch_assoc($find_role);
								$role_id=$found_role['role_id'];
									$find_pos=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$role_id'");
									while($found_pos=mysql_fetch_assoc($find_pos)){
							 ?>
                            <option value="<?php echo $found_pos['position_id']; ?>" ><?php echo $found_pos['position_title']; ?></option>
                            <?php } ?>
                            <?php 
							include("../db/db.php");
                            $find_pos=mysql_query("SELECT * FROM employee_position_t");
									while($found_pos=mysql_fetch_assoc($find_pos)){
                            ?>
                            <option value="<?php echo $found_pos['position_id']; ?>" ><?php echo $found_pos['position_title']; ?></option>
                            <?php } ?>
							</select>
                            </td>
						  </tr>
						  <tr>
							<td colspan="2">FIRST NAME</td>
							<td colspan="2"><input value="<?php echo $pis['fname']; ?>" type="text" class="validate[required] text-input" name="p_fname" id="p_fname"  style="width:200px;height:17px;" /></td>
						  </tr>
						  <tr>
							<td colspan="2">MIDDLE NAME</td>
							<td colspan="2"><input value="<?php echo $pis['mname']; ?>" type="text" name="p_mname" class="validate[required]" id="p_mname" style="width:200px;height:17px;" /></td>
							<td colspan="2">NAME EXTENSION(e.g. Jr., Sr.,)</td>
							<td width="203" colspan="2"><input value="<?php echo $pis['ext_name']; ?>" type="text" name="p_name_extnd" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">DATE OF BIRTH(mm/dd/yyyy)</td>
							<td colspan="2"><input value="<?php echo $pis['bdate']; ?>" type="text" name="p_bdate" id="p_bdate" style="width:200px;height:17px;"  class="validate[required],custom[dateFormat]"/></td>
							<td colspan="2">RESIDENTIAL ADDRESS</td>
							<td colspan="2"><input value="<?php echo $pis['r_address']; ?>" type="text" name="p_add1" id="p_add1" style="width:200px;height:17px;" class="validate[required] text-input"/></td>
						  </tr>
						  <tr>
							<td colspan="2">PLACE OF BIRTH</td>
							<td colspan="2"><input value="<?php echo $pis['place_birth']; ?>" type="text" name="p_place_birth" id="p_place_birth" style="width:200px;height:17px;"/></td>
							<td colspan="2">ZIP </td>
							<td colspan="2"><input value="<?php echo $pis['zip1']; ?>" type="text" name="p_zip1"id="p_zip1" maxlength="4"  style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">SEX</td>
							<td colspan="2">
                            <?php 
							if ($pis['gender']=='Male'){
							?>
                            <input type="radio" name="p_sex" id="p_sex1" value="Male"  class="validate[required] radio" checked/>
							Male
                             <input type="radio" name="p_sex" value="Female" id="p_sex2"  class="validate[required] radio"/>
														Female
							  <?php }else{ ?>
                               <input type="radio" name="p_sex" id="p_sex1" value="Male"  class="validate[required] radio"/>
							Male                                                         
                            <input type="radio" name="p_sex" value="Female" id="p_sex2"  class="validate[required] radio" checked/>
														Female
                            <?php } ?>
                                                        </td>
							<td colspan="2">CONTACT NO.</td>
							<td colspan="2"><input value="<?php echo $pis['tel1']; ?>" type="text" name="p_tel1"id="p_tel1" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">CIVIL STATUS</td>
							<td colspan="2"><select class="validate[required]" name="p_civil_status" style="width:150px;font-size:11px" >
                            <option value="<?php echo $pis['civil_status']; ?>"><?php echo $pis['civil_status'];  ?></option>
							  <option value="Single">Single</option>
							  <option value="Married">Married</option>
							  <option value="Annulled">Annulled</option>
							  <option value="Widowed">Widowed</option>
							  <option value="Separated">Separated</option>
							</select></td>
							<td colspan="2">PERMANENT ADDRESS</td>
							<td colspan="2"><input value="<?php echo $pis['address']; ?>" type="text" name="p_add2" id="p_add2" style="width:200px;height:17px;" class="validate[required] text-input"/></td>
						  </tr>
						  <tr>
							<td colspan="2">CITIZENSHIP</td>
							<td colspan="2"><input value="<?php echo $pis['citizenship']; ?>" type="text" name="p_citizen"  id="p_citizen" style="width:200px;height:17px;" /></td>
							<td colspan="2">ZIP</td>
							<td colspan="2"><input value="<?php echo $pis['zip2']; ?>" type="text" name="p_zip2"id="p_zip2" maxlength="4" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">HEIGHT</td>
							<td colspan="2"><input value="<?php echo $pis['height']; ?>" type="text" name="p_height" id="p_height" style="width:200px;height:17px;"/></td>
							<td colspan="2">TELEPHONE NO.</td>
							<td colspan="2"><input value="<?php echo $pis['tel2']; ?>" type="text" name="p_tel2"id="p_tel2" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">WEIGHT</td>
							<td colspan="2"><input value="<?php echo $pis['weight']; ?>" type="text" name="p_weight" id="p_weight"  style="width:200px;height:17px;"/></td>
							<td colspan="2">EMAIL ADDRESS(if any)</td>
							<td colspan="2"><input value="<?php echo $pis['eadd']; ?>" type="text" name="p_eadd" id="p_eadd"  style="width:200px;height:17px;" class="validate[custom[email]]"/></td>
						  </tr>
						  <tr>
							<td colspan="2">BLOOD TYPE</td>
							<td colspan="2"><input value="<?php echo $pis['bloodtype']; ?>"  type="text" name="p_blood_type"  id="p_blood_type" style="width:200px;height:17px;"/></td>
							<td colspan="2">CELLPHONE NO.</td>
							<td colspan="2"><input value="<?php echo $pis['cp']; ?>" type="text" name="p_cp" id="p_cp" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">GSIS ID NO.</td>
							<td colspan="2"><input value="<?php echo $pis['gsis']; ?>" type="text" name="p_gsis"  id="p_gsis" style="width:200px;height:17px;"   maxlength="10"/></td>
							<td colspan="2">AGENCY EMPLOYEE NO.</td>
							<td colspan="2"><input value="<?php echo $pis['agency_emp_no']; ?>" type="text" name="p_agency_no" id="p_agency_no" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">PAG-IBIG ID NO.</td>
							<td colspan="2"><input value="<?php echo $pis['pagibig']; ?>" type="text" name="p_pagibig" id="p_pagibig" style="width:200px;height:17px;"/></td>
							<td colspan="2">TIN</td>
							<td colspan="2"><input value="<?php echo $pis['tin']; ?>" type="text" name="p_tin"  id="p_tin" style="width:200px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td colspan="2">PHILHEALTH NO.</td>
							<td colspan="2"><input value="<?php echo $pis['philhealth']; ?>"  type="text" name="p_philhealth" id="p_philhealth" style="width:200px;height:17px;"/></td>
							<td colspan="4" rowspan="2" style="display:none;">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2">SSS NO.</td>
							<td colspan="2"><input value="<?php echo $pis['sss']; ?>" type="text" name="p_sss"  id="p_sss" style="width:200px;height:17px;"  maxlength="10"/></td>
						  </tr>
						  </table>
						 	<div style="width:auto;">
						<table class="styled" >
						<tr>
						<td colspan="8"><hr /><strong>FAMILY BACKGROUND</strong><hr /></td>
						</tr>
						</table>
						<div id="fam_center">

						<table class="styled" >
						  <tr>
							<td width="200">SPOUSE'S NAME</td>
							<td width="188"><input value="<?php echo $pis['spouse_lname']; ?>" type="text" name="p_spouse_lname"  id="p_spouse_lname"style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>FIRST NAME</td>
							<td><input value="<?php echo $pis['spouse_fname']; ?>" type="text" name="p_spouse_fname" id="p_spouse_fname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>MIDDLE NAME</td>
							<td><input value="<?php echo $pis['spouse_mname']; ?>" type="text" name="p_spouse_mname" id="p_spouse_mname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>OCCUPATION</td>
							<td><input value="<?php echo $pis['spouse_occupation']; ?>" type="text" name="p_spouse_occupation" id="p_spouse_occupation" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>EMPLOYER/BUS. NAME</td>
							<td><input value="<?php echo $pis['spouse_bus_name']; ?>" type="text" name="p_spouse_bus_name" id="p_spouse_bus_name" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>BUSINNESS ADDRESS</td>
							<td><input value="<?php echo $pis['spouse_bus_add']; ?>"type="text" name="p_spouse_bus_add" id="p_spouse_bus_add" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>TELEPHONE NO.</td>
							<td><input value="<?php echo $pis['spouse_bus_tel_no']; ?>" type="text" name="p_spouse_bus_telno" id="p_spouse_bus_telno" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>FATHER'S SURNAME</td>
							<td><input value="<?php echo $pis['father_lname']; ?>" type="text" name="p_father_lname" id="p_father_lname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>FIRST NAME</td>
							<td><input value="<?php echo $pis['father_fname']; ?>" type="text" name="p_father_fname" id="p_father_fname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>MIDDLE NAME</td>
							<td><input value="<?php echo $pis['father_mname']; ?>"type="text" name="p_father_mname" id="p_father_mname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>MOTHER'S MAIDEN NAME</td>
							<td><input value="<?php echo $pis['mother_maiden_name']; ?>" type="text" name="p_mother_maiden_name" id="p_mother_maiden_name" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>SURNAME</td>
							<td><input value="<?php echo $pis['mother_lname']; ?>" type="text" name="p_mother_lname" id="p_mother_lname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>FIRST NAME</td>
							<td><input value="<?php echo $pis['mother_fname']; ?> "type="text" name="p_mother_fname" id="p_mother_fname" style="width:180px;height:17px;"/></td>
						  </tr>
						  <tr>
							<td>MIDDLE NAME</td>
							<td><input type="text"  value="<?php echo $pis['mother_mname']; ?>" name="p_mother_mname" id="p_mother_mname" style="width:180px;height:17px;"/></td>
						  </tr>
						</table>
						</div>
                        <br/><hr/>
						<div id="fam_center">
                        

						<table class="styled" id="ChildrenTable">
						  <tr>
                          	<td>Count</td>
							<td>NAME OF CHILD(Write full name)</td>
							<td>DATE OF BIRTH(mm/dd/yyyy)</td>
                           <!-- <td><input type="button" name="Button" value="Add more" onClick="addRowChildren('ChildrenTable','row1')"></td> -->
						  </tr>
						   <?php
							$child_count = 0;
							
							//echo "<input type='hidden' id='child_count' value='".$c_count."'>";
							$query=mysql_query("SELECT * FROM eis_child_t WHERE emp_id='$emp_id' ORDER BY `eis_child_t`.`count` ASC ") or die(mysql_error());
							while($pis_child=mysql_fetch_assoc($query)){
							$child_count = $child_count + 1;
							$child_bdate=$pis_child['child_bdate'];
							if($child_bdate== "" ){
							$child_bdate;
							?> 
						  <tr>
                          <td><?php echo $child_count ?></td>
							<td ><input type="text" name="p_child<?php echo $child_count; ?>_name" value="<?php echo $pis_child['child_name']; ?>" id="p_child<?php echo $child_count; ?>_name"  style="width:180px;height:17px;"/></td>
							<td ><input type="text" name="p_child_bday<?php echo $child_count; ?>" value="<?php  echo $child_bdate;; ?>" id="p_child_bday<?php echo $child_count; ?>" style="width:150px;height:17px;text-align:center;"/></td>
						  </tr>
						 <?php
							}else{
							$child_bdate=strtotime($pis_child['child_bdate']);
						?>
						  <tr>
                          <td><?php echo $child_count ?></td>
							<td id="child1"><input type="text" name="p_child<?php echo $child_count; ?>_name" value="<?php echo $pis_child['child_name']; ?>" id="p_child<?php echo $child_count; ?>_name"  style="width:180px;height:17px;"/></td>
							<td id="child1"><input type="text" name="p_child_bday<?php echo $child_count; ?>" value="<?php  echo date('m/d/Y',$child_bdate); ?>" id="p_child_bday<?php echo $child_count; ?>" style="width:150px;height:17px;text-align:center;" /></td>
						 </tr>
						 <?php
						 }
						}
						?> 
                        <tr id="row1">
                        
                        </tr>
						</table>
						</div>
						</div>
                        <br/ >
                          <table width="816" class="styled">
						  <tr>
						 
							<td colspan="8"><hr /><strong>EDUCATIONAL BACKGROUND</strong><hr /></td>
						  </tr>
						  <tr>
							<td width="100" rowspan="2"><div align="center">LEVEL</div></td>
							<td width="120" rowspan="2"><div align="center">NAME OF SCHOOL<br />(Write in full)</div></td>
							<td width="130" rowspan="2"><div align="center">DEGREE COURSE<br  />
							(Write in full)</div></td>
							<td width="66" rowspan="2"><div align="center"><span style="font-size:10px">YEAR <br  />
							  GRADUATED<br  />
							(If Graduated)</span></div></td>
							<td rowspan="2"><div align="center"><span style="font-size:10px">HIGHEST GRADE/<br />
							  LEVEL/ <br  />
							  UNITS EARNED<br  />
							(If not graduated)</span></div></td>
							<td colspan="2"><div align="center">INCLUSIVE DATE OF ATTENDANCE</div></td>
							<td rowspan="2"><div align="center">SCHOLARSHIP/<br />
							ACADEMIC HONORS RECEIVED</div></td>
						  </tr>
						  <tr>
							<td><div align="center">From</div></td>
							<td><div align="center">To</div></td>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
						  <?php
	$level ='Elementary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='1'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
							<tr>
							<td>ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" value="<?php echo $educ_bg['name_of_school']; ?>" name="p_elem_school_name1" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input  value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem1" style=";height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem1"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_elem1" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_elem_attendance_from" id="p_elem_attendance_from1" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" value="<?php echo $date_to;?>" name="p_elem_attendance_to" id="p_elem_attendance_to1" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem1" style="width:80px;height:17px;"/>
							</div></td>
							</tr>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
		<?php }else{ 
  $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
  ?>				  	
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_elem_school_name1" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem1" style="height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem1"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"type="text" name="p_highest_grade_elem1" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>"type="text" name="p_elem_attendance_from1" id="p_elem_attendance_from" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_elem_attendance_to1" id="p_elem_attendance_to" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem1" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  
		  <?php }}?>			

						                          <tr>
							<td>ELEMENTARY</td>
						  <?php
	$level ='Elementary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='2'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
							<tr>
							<td>ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" value="<?php echo $educ_bg['name_of_school']; ?>" name="p_elem_school_name2" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input  value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem2" style=";height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem2"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_elem2" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_elem_attendance_from2" id="p_elem_attendance_from2" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" value="<?php echo $date_to;?>" name="p_elem_attendance_to2" id="p_elem_attendance_to2" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem2" style="width:80px;height:17px;"/>
							</div></td>
							</tr>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
		<?php }else{ 
  $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
  ?>				  	
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_elem_school_name2" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem2" style="height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem2"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"type="text" name="p_highest_grade_elem2" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>"type="text" name="p_elem_attendance_from2" id="p_elem_attendance_from" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_elem_attendance_to2" id="p_elem_attendance_to" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem2" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  
		  <?php }}?>	

						                          <tr>
							<td>ELEMENTARY</td>
						  <?php
	$level ='Elementary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='3'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
							<tr>
							<td>ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" value="<?php echo $educ_bg['name_of_school']; ?>" name="p_elem_school_name3" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input  value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem3" style=";height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem3"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_elem3" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_elem_attendance_from3" id="p_elem_attendance_from3" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" value="<?php echo $date_to;?>" name="p_elem_attendance_to3" id="p_elem_attendance_to3" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem3" style="width:80px;height:17px;"/>
							</div></td>
							</tr>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
		<?php }else{ 
  $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
  ?>				  	
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_elem_school_name3" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem3" style="height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem3"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"type="text" name="p_highest_grade_elem3" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>"type="text" name="p_elem_attendance_from3" id="p_elem_attendance_from" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_elem_attendance_to3" id="p_elem_attendance_to" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem3" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  
		  <?php }}?>		

							                          <tr>
							<td>ELEMENTARY</td>
						  <?php
	$level ='Elementary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='4'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
							<tr>
							<td>ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" value="<?php echo $educ_bg['name_of_school']; ?>" name="p_elem_school_name4" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input  value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem4" style=";height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem4"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_elem4" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_elem_attendance_from4" id="p_elem_attendance_from4" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" value="<?php echo $date_to;?>" name="p_elem_attendance_to4" id="p_elem_attendance_to" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem4" style="width:80px;height:17px;"/>
							</div></td>
							</tr>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
		<?php }else{ 
  $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
  ?>				  	
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_elem_school_name4" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem4" style="height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem4"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"type="text" name="p_highest_grade_elem4" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>"type="text" name="p_elem_attendance_from4" id="p_elem_attendance_from" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_elem_attendance_to4" id="p_elem_attendance_to" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem4" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  
		  <?php }}?>		

						                          <tr>
							<td>ELEMENTARY</td>
						  <?php
	$level ='Elementary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='5'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
							<tr>
							<td>ELEMENTARY</td>
							<td> <div align="center">
							  <input type="text" value="<?php echo $educ_bg['name_of_school']; ?>" name="p_elem_school_name5" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input  value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem5" style=";height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem5"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_elem5" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_elem_attendance_from5" id="p_elem_attendance_from" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input type="text" value="<?php echo $date_to;?>" name="p_elem_attendance_to5" id="p_elem_attendance_to" class="validate[dateRange[grp2]]" style="width:70px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem5" style="width:80px;height:17px;"/>
							</div></td>
							</tr>
						  </tr>
                          <tr>
							<td>ELEMENTARY</td>
		<?php }else{ 
  $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
  ?>				  	
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_elem_school_name5" style="height:17px;"/>
							</div></td>
							<td>    <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_elem5" style="height:17px"/>
							</div></td>
							<td> 							  <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_elem5"  id="p_year_grad_elem" onBlur="chk_elem_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"type="text" name="p_highest_grade_elem5" style="width:80px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>"type="text" name="p_elem_attendance_from5" id="p_elem_attendance_from" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td>  <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_elem_attendance_to5" id="p_elem_attendance_to" class="validate[dateRange[grp1]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_elem5" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  
		  <?php }}?>				  
						 <tr>
							<td>SECONDARY</td> 
			  <?php
	$level ='Secondary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='1'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
		$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>				  
						  <tr>
						  <td>&nbsp;</td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second1" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second1" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second1" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_from;?>" type="text"   name="p_second_attendance_from1" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_second_attendance_to1" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_second1" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  </tr>
                          <tr>
							<td>SECONDARY</td>
		    <?php }else{ 
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	?>				
						
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second1" style="width:height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second1" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second1" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text"   name="p_second_attendance_from1" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_second_attendance_to1" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_second1" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>	
	 <?php }}?>
	 
					<tr>
							<td>SECONDARY</td> 
			  <?php
	$level ='Secondary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='2'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
		$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>				  
						  <tr>
						  <td>&nbsp;</td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second2" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second2" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second2" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_from;?>" type="text"   name="p_second_attendance_from2" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_second_attendance_to2" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_second2" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  </tr>
                          <tr>
							<td>SECONDARY</td>
		    <?php }else{ 
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	?>				
						
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second2" style="width:height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second2" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second2" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text"   name="p_second_attendance_from2" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_second_attendance_to2" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_second2" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>	
	 <?php }}?>
	 
						<tr>
							<td>SECONDARY</td> 
			  <?php
	$level ='Secondary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='3'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
		$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>				  
						  <tr>
						  <td>&nbsp;</td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second3" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second3" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second3" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_from;?>" type="text"   name="p_second_attendance_from3" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_second_attendance_to3" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_second3" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  </tr>
                          <tr>
							<td>SECONDARY</td>
		    <?php }else{ 
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	?>				
						
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second3" style="width:height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second3" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second3" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text"   name="p_second_attendance_from3" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_second_attendance_to3" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_second3" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>	
	 <?php }}?>
     			
				<tr>
							<td>SECONDARY</td> 
			  <?php
	$level ='Secondary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='4'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
		$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>				  
						  <tr>
						  <td>&nbsp;</td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second4" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second4" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second4" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_from;?>" type="text"   name="p_second_attendance_from4" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_second_attendance_to4" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_second4" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  </tr>
                          <tr>
							<td>SECONDARY</td>
		    <?php }else{ 
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	?>				
						
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second4" style="width:height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second4" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second4" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text"   name="p_second_attendance_from4" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_second_attendance_to4" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_second4" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>	
	 <?php }}?>
	 
					<tr>
							<td>SECONDARY</td> 
			  <?php
	$level ='Secondary';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='5'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
		$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>				  
						  <tr>
						  <td>&nbsp;</td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second5" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second5" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second5" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_from;?>" type="text"   name="p_second_attendance_from5" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_second_attendance_to5" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_second5" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
						  </tr>
                          <tr>
							<td>SECONDARY</td>
		    <?php }else{ 
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	?>				
						
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_second_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_second5" style="width:height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text"  name="p_year_grad_second5" id="p_year_grad_second" onBlur="chk_second_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text"name="p_highest_grade_second5" style="width:80px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text"   name="p_second_attendance_from5" id="p_second_attendance_from" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_second_attendance_to5" id="p_second_attendance_to" class="validate[dateRange[grp2]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_second5" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>	
	 <?php }}?>
     			
     			
     			
     					<tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
	  <?php
	$level ='VOCATIONAL';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='1'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name1" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_voc1" style=";height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc1" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc1" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_voc_attendance_from1" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>" type="text" name="p_voc_attendance_to1" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_voc1" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
			<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name1" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_voc1" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc1" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc1" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_voc_attendance_from1" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_voc_attendance_to1" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_voc1" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
    <?php }}?>
    
					<tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
	  <?php
	$level ='VOCATIONAL';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='2'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name2" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_voc2" style=";height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc2" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc2" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_voc_attendance_from2" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>" type="text" name="p_voc_attendance_to2" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_voc2" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
			<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name2" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_voc2" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc2" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc2" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_voc_attendance_from2" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_voc_attendance_to2" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_voc2" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
    <?php }}?>
	
					<tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
	  <?php
	$level ='VOCATIONAL';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='3'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name3" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_voc3" style=";height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc3" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc3" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_voc_attendance_from3" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>" type="text" name="p_voc_attendance_to3" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_voc3" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
			<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name3" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_voc3" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc3" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc3" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_voc_attendance_from3" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_voc_attendance_to3" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_voc3" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
    <?php }}?>
	
					<tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
	  <?php
	$level ='VOCATIONAL';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='4'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name4" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_voc4" style=";height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc4" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc4" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_voc_attendance_from4" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>" type="text" name="p_voc_attendance_to4" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_voc4" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
			<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name4" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_voc4" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc4" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc4" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_voc_attendance_from4" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_voc_attendance_to4" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_voc4" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
    <?php }}?>
	
					<tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
	  <?php
	$level ='VOCATIONAL';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='5'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name5" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_voc5" style=";height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc5" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc5" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_voc_attendance_from5" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $date_to;?>" type="text" name="p_voc_attendance_to5" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_voc5" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td><span style="font-size:11px">VOCATIONAL/<br  />
						TRADE COURSE</span></td>
			<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_voc_school_name5" style="height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_voc5" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_voc5" id="p_year_grad_voc" onBlur="chk_voc_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_voc5" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_voc_attendance_from5" id="p_voc_attendance_from" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>" type="text" name="p_voc_attendance_to5" id="p_voc_attendance_to" class="validate[dateRange[grp3]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_voc5" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
    <?php }}?>
    				<tr>
					<td rowspan="2">COLLEGE</td>
		  <?php
	$level ='College1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='1'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
		
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_col1_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_col11" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>"  type="text" name="p_year_grad_col11" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_col11" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" id="p_col1_attendance_from"  type="text" name="p_col1_attendance_from1" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>" id="p_col1_attendance_to"  type="text" name="p_col1_attendance_to1" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col11" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td rowspan="2">COLLEGE</td>
				  <?php }else{
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to); 
	
	?> 		  
		
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"   type="text" name="p_col1_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_col11" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_col11" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"   type="text" name="p_highest_grade_col11" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>"   type="text" name="p_col1_attendance_from1" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"   type="text" name="p_col1_attendance_to1" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col11" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
					<?php }}?>	  
					<tr><td>&nbsp;</td><tr>
							<tr>
					<td rowspan="2">COLLEGE</td>
		  <?php
	$level ='College1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='2'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
		
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_col1_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_col12" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>"  type="text" name="p_year_grad_col12" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_col12" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" id="p_col1_attendance_from"  type="text" name="p_col1_attendance_from2" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>" id="p_col1_attendance_to"  type="text" name="p_col1_attendance_to2" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col12" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td rowspan="2">COLLEGE</td>
				  <?php }else{
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to); 
	
	?> 		  
		
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"   type="text" name="p_col1_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_col12" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_col12" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"   type="text" name="p_highest_grade_col12" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>"   type="text" name="p_col1_attendance_from2" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"   type="text" name="p_col1_attendance_to2" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col12" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
					<?php }}?>	  
					<tr><td>&nbsp;</td><tr>
					<tr>
					<td rowspan="2">COLLEGE</td>
		  <?php
	$level ='College1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='3'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
		
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_col1_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_col13" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>"  type="text" name="p_year_grad_col13" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_col13" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" id="p_col1_attendance_from"  type="text" name="p_col1_attendance_from3" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>" id="p_col1_attendance_to"  type="text" name="p_col1_attendance_to3" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col13" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td rowspan="2">COLLEGE</td>
				  <?php }else{
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to); 
	
	?> 		  
		
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"   type="text" name="p_col1_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_col13" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_col13" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"   type="text" name="p_highest_grade_col13" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>"   type="text" name="p_col1_attendance_from3" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"   type="text" name="p_col1_attendance_to3" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col13" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
					<?php }}?>	  
					<tr><td>&nbsp;</td><tr>
					<tr>
					<td rowspan="2">COLLEGE</td>
		  <?php
	$level ='College1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='4'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
		
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_col1_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_col14" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>"  type="text" name="p_year_grad_col14" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_col14" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" id="p_col1_attendance_from"  type="text" name="p_col1_attendance_from4" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>" id="p_col1_attendance_to"  type="text" name="p_col1_attendance_to4" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col14" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td rowspan="2">COLLEGE</td>
				  <?php }else{
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to); 
	
	?> 		  
		
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"   type="text" name="p_col1_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_col14" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_col14" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"   type="text" name="p_highest_grade_col14" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>"   type="text" name="p_col1_attendance_from4" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"   type="text" name="p_col1_attendance_to4" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col14" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
					<?php }}?>	  
						 <tr><td>&nbsp;</td><tr>
						 
						 <tr>
					<td rowspan="2">COLLEGE</td>
		  <?php
	$level ='College1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='5'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];

	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>	
		
						
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_col1_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_col15" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>"  type="text" name="p_year_grad_col15" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_col15" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" id="p_col1_attendance_from"  type="text" name="p_col1_attendance_from5" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>" id="p_col1_attendance_to"  type="text" name="p_col1_attendance_to5" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col15" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                          <tr>
							<td rowspan="2">COLLEGE</td>
				  <?php }else{
	$date_from =strtotime($date_from);
	$date_to =strtotime($date_to); 
	
	?> 		  
		
							<td>  <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"   type="text" name="p_col1_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_col15" style="height:17px"/>
							</div></td>
							<td><div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_col15" id="p_year_grad_col1" onBlur="chk_col1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"   type="text" name="p_highest_grade_col15" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_from);?>"   type="text" name="p_col1_attendance_from5" id="p_col1_attendance_from" class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"   type="text" name="p_col1_attendance_to5" id="p_col1_attendance_to"  class="validate[dateRange[grp4]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['scholarship']; ?>"  type="text" name="p_scholarship_col15" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
					<?php }}?>	  
  					<tr><td>&nbsp;</td><tr>
  						<tr>
							<td rowspan="2">GRADUATE STUDIES</td>
						  <?php
	$level ='GS1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='1'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>  
						  
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_grad1_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_grad11" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad11" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_grad11" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_grad1_attendance_from1" id="p_grad1_attendance_from1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_grad1_attendance_to1" id="p_grad1_attendance_to1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad11" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                           <tr>
							<td rowspan="2">GRADUATE STUDIES</td>
				<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 		
							
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"  type="text" name="p_grad1_school_name1" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_grad11" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad11" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_grad11" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_grad1_attendance_from1" id="p_grad1_attendance_from" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_grad1_attendance_to1" id="p_grad1_attendance_to" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad11" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
  <?php }}?>
  <tr><td>&nbsp;</td><tr>
						<tr>
							<td rowspan="2">GRADUATE STUDIES</td>
						  <?php
	$level ='GS1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='2'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>  
						  
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_grad1_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_grad12" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad12" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_grad12" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_grad1_attendance_from2" id="p_grad1_attendance_from2" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_grad1_attendance_to2" id="p_grad1_attendance_to2" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad12" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                           <tr>
							<td rowspan="2">GRADUATE STUDIES</td>
				<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 		
							
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"  type="text" name="p_grad1_school_name2" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_grad12" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad12" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_grad12" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_grad1_attendance_from2" id="p_grad1_attendance_from" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_grad1_attendance_to2" id="p_grad1_attendance_to" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad12" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
  <?php }}?>
  <tr><td>&nbsp;</td><tr>
						<tr>
							<td rowspan="2">GRADUATE STUDIES</td>
						  <?php
	$level ='GS1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='3'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>  
						  
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_grad1_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_grad13" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad13" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_grad13" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_grad1_attendance_from3" id="p_grad1_attendance_from1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_grad1_attendance_to3" id="p_grad1_attendance_to1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad11" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                           <tr>
							<td rowspan="2">GRADUATE STUDIES</td>
				<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 		
							
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"  type="text" name="p_grad1_school_name3" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_grad13" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad13" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_grad13" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_grad1_attendance_from3" id="p_grad1_attendance_from" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_grad1_attendance_to3" id="p_grad1_attendance_to" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad13" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
  <?php }}?>
  <tr><td>&nbsp;</td><tr>
						<tr>
							<td rowspan="2">GRADUATE STUDIES</td>
						  <?php
	$level ='GS1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='4'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>  
						  
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_grad1_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_grad14" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad14" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_grad14" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_grad1_attendance_from4" id="p_grad1_attendance_from1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_grad1_attendance_to4" id="p_grad1_attendance_to1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad14" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                           <tr>
							<td rowspan="2">GRADUATE STUDIES</td>
				<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 		
							
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"  type="text" name="p_grad1_school_name4" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_grad14" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad14" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_grad14" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_grad1_attendance_from4" id="p_grad1_attendance_from" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_grad1_attendance_to4" id="p_grad1_attendance_to" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad14" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
  <?php }}?>
  <tr><td>&nbsp;</td><tr>
						<tr>
							<td rowspan="2">GRADUATE STUDIES</td>
						  <?php
	$level ='GS1';
	$query = mysql_query("SELECT * FROM eis_educ_bg_t WHERE emp_id='$emp_id' && level='$level' && count='5'") or die(mysql_error());
	while($educ_bg=mysql_fetch_assoc($query)){	
	$date_from =$educ_bg['inclusive_date_att_from'];
	$date_to =$educ_bg['inclusive_date_att_to'];
	if(($date_from == "" || $date_to == "")||($date_from == "" && $date_to == "")){
?>  
						  
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>" type="text" name="p_grad1_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>" type="text" name="p_degree_grad15" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad15" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>"  type="text" name="p_highest_grade_grad15" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_from;?>" type="text" name="p_grad1_attendance_from5" id="p_grad1_attendance_from1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $date_to;?>"  type="text" name="p_grad1_attendance_to5" id="p_grad1_attendance_to1" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad15" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
                          
                           <tr>
							<td rowspan="2">GRADUATE STUDIES</td>
				<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?> 		
							
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['name_of_school']; ?>"  type="text" name="p_grad1_school_name5" style="height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['degree_course']; ?>"  type="text" name="p_degree_grad15" style="height:17px"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo $educ_bg['year_graduated']; ?>" type="text" name="p_year_grad_grad15" id="p_year_grad_grad1" onBlur="chk_grad1_grad()" style="width:50px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo $educ_bg['highest_grade_earned']; ?>" type="text" name="p_highest_grade_grad15" style="width:80px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input  value="<?php echo date('m/d/Y',$date_from);?>" type="text" name="p_grad1_attendance_from5" id="p_grad1_attendance_from" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td> <div align="center">
							  <input value="<?php echo date('m/d/Y',$date_to);?>"  type="text" name="p_grad1_attendance_to5" id="p_grad1_attendance_to" class="validate[dateRange[grp6]]" style="width:75px;height:17px;"/>
							</div></td>
							<td><div align="center">
							  <input  value="<?php echo $educ_bg['scholarship']; ?>" type="text" name="p_scholarship_grad15" style="width:80px;height:17px;"/>
							</div></td>
						  </tr>
  <?php }}?>
						
						  <tr>
							<td colspan="8" style="display:none;">&nbsp;</td>
						  </tr>
						</table>



						</div>
						
						<h3><a href="#">CIVIL SERVICE ELIGIBILITY AND WORK EXPERIENCE</a></h3>
						<div>
							 <table width="816" class="styled">
							  <tr>
								<td colspan="8"><strong>CIVIL SERVICE ELIGIBILITY</strong></td>
							  </tr>
							  <tr>
								<td colspan="2" rowspan="2"><div align="center">CAREER SERVICE/ RA 1080 (BAORD/BAR)<BR  />
								UNDER SPECIAL LAW/CES/CSEE</div></td>
								<td width="66" rowspan="2"><div align="center">RATING</div></td>
								<td rowspan="2"><div align="center">DATE OF<BR />
								  EXAMINATION/<BR />
								CONFERMENT</div></td>
								<td colspan="2" rowspan="2"><div align="center">PLACE OF EXAMINATION/<br />CONFERMENT</div></td>
								<td colspan="2"><div align="center">LICENSE(if applicable)</div></td>
							  </tr>
							  <tr>
								<td width="88"><div align="center">NUMBER</div></td>
								<td width="105"><div align="center">DATE OF RELEASE</div></td>
							  </tr>
								<?php
	$career_count = 0;
	$query = mysql_query("SELECT * FROM eis_civ_service_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($career=mysql_fetch_assoc($query)){	
	$career_count = $career_count + 1 ;
	$date_exam =$career['date_of_exam'];
	$date_rel =$career['license_date_release'];
	
	if(($date_exam =="" || $date_rel =="")||($date_exam =="" && $date_rel =="")){
?>
							  <tr>
								<td colspan="2"><div align="center">
								  <input type="text" name="p_career_service_<?php echo $career_count?>" value="<?php echo $career['career_service']; ?>" id="p_career_service_<?php echo $career_count?>"  style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_career_rating_<?php echo $career_count?>" value="<?php echo $career['rating']; ?>" id="p_career_rating_<?php echo $career_count?>"  style="width:56px;height:17px;"/>
								</div></td>
								<td width="120"><div align="center">
								  <input type="text" name="p_date_exam<?php echo $career_count?>"	value="<?php echo $date_exam;?>" id="p_date_exam<?php echo $career_count?>"  class="validate[custom[dateFormat]]" style="width:120px;height:17px;"/>
								</div></td>
								<td colspan="2"><div align="center">
								  <input type="text"name="p_place_exam<?php echo $career_count?>" value="<?php echo $career['place_of_exam']; ?>" id="p_place_exam<?php echo $career_count?>" style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_license_no<?php echo $career_count?>" value="<?php echo $career['license_no']; ?>" id="p_license_no<?php echo $career_count?>" style="width:80px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_license_date_rel<?php echo $career_count?>" value="<?php echo $date_rel;?>" id="p_license_date_rel<?php echo $career_count?>"  class="validate[custom[dateFormat]]" style="width:80px;height:17px;"/>
								</div></td>
							  </tr>
							   <?php }else{ 
	$date_exam =strtotime($date_exam);
	$date_rel =strtotime($date_rel);
	?> 			
								<tr>
								<td colspan="2"><div align="center">
								  <input type="text"  name="p_career_service_<?php echo $career_count?>" value="<?php echo $career['career_service']; ?>" id="p_career_service_<?php echo $career_count?>" style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_career_rating_<?php echo $career_count?>" value="<?php echo $career['rating']; ?>" id="p_career_rating_<?php echo $career_count?>"style="width:56px;height:17px;"/>
								</div></td>
								<td width="120"><div align="center">
								  <input type="text"  name="p_date_exam<?php echo $career_count?>"	value="<?php echo date('m/d/Y',$date_exam);?>" id="p_date_exam<?php echo $career_count?>"  style="width:120px;height:17px;"/>
								</div></td>
								<td colspan="2"><div align="center">
								  <input type="text" name="p_place_exam<?php echo $career_count?>" value="<?php echo $career['place_of_exam']; ?>" id="p_place_exam<?php echo $career_count?>"  style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_license_no<?php echo $career_count?>" value="<?php echo $career['license_no']; ?>" id="p_license_no<?php echo $career_count?>" style="width:80px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_license_date_rel<?php echo $career_count?>" value="<?php echo date('m/d/Y',$date_rel);?>" id="p_license_date_rel<?php echo $career_count?>"  class="validate[custom[dateFormat]]" style="width:80px;height:17px;"/>
								</div></td>
							  </tr>
							 
	 <?php }}?>



							 </table>
							  
							<table width="816"  class="styled">  
							  <tr>
								<td colspan="8"><strong>WORK EXPERIENCE</strong></td>
							  </tr>
							  <tr>
								<td colspan="2"><div align="center">INCLUSIVE DATES<br />
								(mm/dd/yy)</div></td>
								<td width="105" rowspan="2"><div align="center">POSITION TITLE<br />
								(Write in full)</div></td>
								<td width="200" rowspan="2"><div align="center">DEPARTMENT/<br />AGENCY/OFFICE/<br />COMPANY<br />
								(Write in full)</div></td>
								<td width="82" rowspan="2"><div align="center">MONTHLY<br />
								SALARY</div></td>
								<td width="75" rowspan="2"><div align="center"><span style="font-size:10px;">SALARY GRADE<br  />
							  &amp; STEP <br />
								  INCREMENT<br />
								(format &quot;00-0&quot;)</span></div></td>
								<td width="145" rowspan="2"><div align="center">STATUS OF <br />
								APPOINTMENT</div></td>
								<td width="62" rowspan="2"><div align="center">GOV'T<br />
								  SERVICE<br />
								(Yes/No)</div></td>
							  </tr>
							  <tr>
								<td width="60"><div align="center">FROM</div></td>
								<td width="60"><div align="center">TO</div></td>
							  </tr>
							 <?php
	$work_count = 0;
	$y = 7;
	$query = mysql_query("SELECT * FROM eis_work_experience_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($work=mysql_fetch_assoc($query)){	
	$work_count = $work_count + 1 ;
	$y++;
	$date_from =$work['inclusive_date_from'];
	$date_to =$work['inclusive_date_to'];
	
	if(($date_from =="" || $date_to =="")||($date_from =="" && $date_to =="")){
?>
							  <tr>
								<td><div align="center">
								  <input type="text" name="p_work_date_from<?php echo $work_count; ?>" value="<?php echo $date_from;?>" id="p_work_date_from<?php echo $work_count; ?>"  class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:60px;height:17px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_date_to<?php echo $work_count; ?>" value="<?php echo $date_to;?>" id="p_work_date_to<?php echo $work_count; ?>"  class="validate[dateRange[grp<?php echo $y; ?>]]"style="width:60px;height:17px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_pos_title<?php echo $work_count; ?>" value="<?php echo $work['position_title']; ?>" id="p_work_pos_title<?php echo $work_count; ?>" style="width:100px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_agency<?php echo $work_count; ?>"  value="<?php echo $work['dept_agency_office_company']; ?>" id="p_work_agency<?php echo $work_count; ?>" style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_mon_salary<?php echo $work_count; ?>" value="<?php echo $work['monthly_salary']; ?>" id="p_work_mon_salary<?php echo $work_count; ?>" style="width:50px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_salary_grade<?php echo $work_count; ?>" value="<?php echo $work['salary_grade_and_step_inc']; ?>" id="p_work_salary_grade<?php echo $work_count; ?>"  style="width:60px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_status_appoint<?php echo $work_count; ?>" value="<?php echo $work['status_of_appointment']; ?>" id="p_work_status_appoint<?php echo $work_count; ?>" style="width:100px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <select name="p_gov_service<?php echo $work_count; ?>"  id="p_gov_service<?php echo $work_count; ?>" style="width:20px;height:17px;">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								  </select>
								</div></td>
							  </tr>
							  <?php }else{ 
   $date_from =strtotime($date_from);
  $date_to =strtotime($date_to);
  ?>  
							<tr>
								<td><div align="center">
								  <input type="text" name="p_work_date_from<?php echo $work_count; ?>" value="<?php echo date('m/d/Y',$date_from);?>" id="p_work_date_from<?php echo $work_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:60px;height:17px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_date_to<?php echo $work_count; ?>" value="<?php echo date('m/d/Y',$date_to);?>" id="p_work_date_to<?php echo $work_count; ?>"  class="validate[dateRange[grp<?php echo $y; ?>]]"style="width:60px;height:17px;" />
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_pos_title<?php echo $work_count; ?>" value="<?php echo $work['position_title']; ?>" id="p_work_pos_title<?php echo $work_count; ?>" style="width:100px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_agency<?php echo $work_count; ?>"  value="<?php echo $work['dept_agency_office_company']; ?>" id="p_work_agency<?php echo $work_count; ?>" style="width:200px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_mon_salary<?php echo $work_count; ?>" value="<?php echo $work['monthly_salary']; ?>" id="p_work_mon_salary<?php echo $work_count; ?>" style="width:50px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text"name="p_work_salary_grade<?php echo $work_count; ?>" value="<?php echo $work['salary_grade_and_step_inc']; ?>" id="p_work_salary_grade<?php echo $work_count; ?>" style="width:60px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <input type="text" name="p_work_status_appoint<?php echo $work_count; ?>" value="<?php echo $work['status_of_appointment']; ?>" id="p_work_status_appoint<?php echo $work_count; ?>" style="width:100px;height:17px;"/>
								</div></td>
								<td><div align="center">
								  <select name="p_gov_service<?php echo $work_count; ?>"  id="p_gov_service<?php echo $work_count; ?>" style="width:20px;height:17px;">
									<option value="No">No</option>
									<option value="Yes">Yes</option>
								  </select>
								</div></td>
							  </tr>
  
    <?php }}?>
							</table>

						</div>
						
						<h3><a href="#">VOLUNTARY ORGANIZATION/S AND TRAINING PROGRAMS </a></h3>
						<div>
							<table class="styled">
							 <tbody>
							  <tr>
								<td colspan="5"  bgcolor="#999999"><strong>VOLUNTARY WORK OR INVOLVEMENT IN CIVIC/NON-GOVERNMENT/PEOPLE/VOLUNTARY ORGANIZATION/S</strong></td>
								</tr>
							 
							  <tr>
								<td width="308" rowspan="2" align="center" bgcolor="#CCCCCC" style="font-size:11.5px;">NAME & ADDRESS OF ORGANIZATION<br />
								(Write in full)</td>
								<td colspan="2" align="center" bgcolor="#CCCCCC">INCLUSEIVE DATES<br />(mm/dd/yyyy)</td>
								<td width="70" rowspan="2" align="center" bgcolor="#CCCCCC">NUMBER OF<br /> HOURS</td>
								<td width="224" rowspan="2" align="center" bgcolor="#CCCCCC">POSITION/NATURE OF WORK<br />(Write in full)</td>
							  </tr>
							  <tr>
								<td width="90" align="center" bgcolor="#CCCCCC">FROM</td>
								<td width="90" align="center" bgcolor="#CCCCCC">TO</td>
								</tr>
								  <?php
	$vol_count = 0;
	$y = 27;
	$query = mysql_query("SELECT * FROM eis_voluntary_work_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($vol=mysql_fetch_assoc($query)){	
	$vol_count = $vol_count + 1 ;
	$y++;
	$date_from =$vol['inclusive_date_from'];
	$date_to =$vol['inclusive_date_to'];
	if(($date_from =="" || $date_to =="")||($date_from =="" && $date_to =="")){
?>	
								<tr>
								<td><input type="text" name="p_voluntary_name<?php echo $vol_count; ?>" value="<?php echo $vol['name_of_org']; ?>"  id="p_voluntary_name<?php echo $vol_count; ?>"  style="width:250px;height:17px;"/></td>
								<td> <input type="text"name="p_voluntary_date_from<?php echo $vol_count; ?>" value="<?php echo $date_from;?>" id="p_voluntary_date_from<?php echo $vol_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
								<td><input type="text" name="p_voluntary_date_to<?php echo $vol_count; ?>" value="<?php echo $date_to;?>" id="p_voluntary_date_to<?php echo $vol_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
								<td><input type="text" name="p_voluntary_no_hrs<?php echo $vol_count; ?>" value="<?php echo $vol['no_of_hrs']; ?>" id="p_voluntary_no_hrs<?php echo $vol_count; ?>" style="width:70px;height:17px;"/></td>
								<td><input type="text" name="p_voluntary_position<?php echo $vol_count; ?>" value="<?php echo $vol['nature_of_work']; ?>" id="p_voluntary_position<?php echo $vol_count; ?>" style="width:225px;height:17px;"/></td>
							  </tr>
							 
						<?php }else{ 
   $date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
   ?>
								<tr>
								<td><input type="text" name="p_voluntary_name<?php echo $vol_count; ?>" value="<?php echo $vol['name_of_org']; ?>"  id="p_voluntary_name<?php echo $vol_count; ?>"  style="width:250px;height:17px;"/></td>
								<td> <input type="text" name="p_voluntary_date_from<?php echo $vol_count; ?>" value="<?php echo date('m/d/Y',$date_from);?>" id="p_voluntary_date_from<?php echo $vol_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
								<td><input type="text" name="p_voluntary_date_to<?php echo $vol_count; ?>" value="<?php echo date('m/d/Y',$date_to);?>" id="p_voluntary_date_to<?php echo $vol_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
								<td><input type="text"	name="p_voluntary_no_hrs<?php echo $vol_count; ?>" value="<?php echo $vol['no_of_hrs']; ?>" id="p_voluntary_no_hrs<?php echo $vol_count; ?>"  style="width:70px;height:17px;"/></td>
								<td><input type="text" name="p_voluntary_position<?php echo $vol_count; ?>" value="<?php echo $vol['nature_of_work']; ?>" id="p_voluntary_position<?php echo $vol_count; ?>" style="width:225px;height:17px;"/></td>
							  </tr>
   
   <?php }}?>
   
							   </tbody>
								</table>
								
								 <table class="styled">
								 <tbody>
								  <tr>
									<td colspan="5"  bgcolor="#999999"><strong>TRAINING PROGRAMS</strong></td>
									</tr>
								 
								  <tr>
									<td width="308" rowspan="2" align="center" bgcolor="#CCCCCC" style="font-size:11.5px;">TITLE OF SEMINARS/CONFERENCE/WORKSHOP/SHORT COURSE<br />
									(Write in full)</td>
									<td colspan="2" align="center" bgcolor="#CCCCCC">INCLUSEIVE DATE OF ATTENDANCE<br />(mm/dd/yyyy)</td>
									<td width="70" rowspan="2" align="center" bgcolor="#CCCCCC">NUMBER OF<br /> HOURS</td>
									<td width="224" rowspan="2" align="center" bgcolor="#CCCCCC">CONDUCTED/SPONSORED BY<br />(Write in full)</td>
								  </tr>
								  <tr>
									<td width="90" align="center" bgcolor="#CCCCCC">FROM</td>
									<td width="90" align="center" bgcolor="#CCCCCC">TO</td>
									</tr>
								   <?php
	$training_count = 0;
	$y=32;
	$query = mysql_query("SELECT * FROM eis_training_program_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($training=mysql_fetch_assoc($query)){	
	$training_count = $training_count + 1 ;
	$y++;
	$date_from =$training['inclusive_date_att_from'];
	$date_to =$training['inclusive_date_att_to'];

	if(($date_from =="" || $date_to =="")||($date_from =="" && $date_to =="")){
?>	
								 <tr>
									<td><input type="text"name="p_training_title<?php echo $training_count; ?>" value="<?php echo $training['title_of_seminar']; ?>" id="p_training_title<?php echo $training_count; ?>"  style="width:250px;height:17px;"/></td>
									<td><input type="text" name="p_training_date_from<?php echo $training_count; ?>" value="<?php echo $date_from;?>" id="p_training_date_from<?php echo $training_count; ?>"  class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
									<td><input type="text" name="p_training_date_to<?php echo $training_count; ?>" value="<?php echo $date_to;?>" id="p_training_date_to<?php echo $training_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td> 
									<td><input type="text" name="p_training_no_hrs<?php echo $training_count; ?>" value="<?php echo $training['no_of_hrs']; ?>" id="p_training_no_hrs<?php echo $training_count; ?>"  style="width:120px;height:17px;"/></td>
									<td><input type="text"  name="p_training_sponsor<?php echo $training_count; ?>" value="<?php echo $training['conducted_sponsor_by']; ?>" id="p_training_sponsor<?php echo $training_count; ?>" style="width:200px;height:17px;"/></td>
								  </tr>
								 <?php }else{
		$date_from =strtotime($date_from);
	$date_to =strtotime($date_to);
	
	?> 	
								 <tr>
									<td><input type="text"  name="p_training_title<?php echo $training_count; ?>" value="<?php echo $training['title_of_seminar']; ?>" id="p_training_title<?php echo $training_count; ?>" style="width:250px;height:17px;"/></td>
									<td><input type="text" name="p_training_date_from<?php echo $training_count; ?>" value="<?php echo date('m/d/Y',$date_from);?>" id="p_training_date_from<?php echo $training_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td>
									<td><input type="text" name="p_training_date_to<?php echo $training_count; ?>" value="<?php echo date('m/d/Y',$date_to);?>" id="p_training_date_to<?php echo $training_count; ?>" class="validate[dateRange[grp<?php echo $y; ?>]]" style="width:70px;height:17px;" /></td> 
									<td><input type="text" name="p_training_no_hrs<?php echo $training_count; ?>" value="<?php echo $training['no_of_hrs']; ?>" id="p_training_no_hrs<?php echo $training_count; ?>" style="width:120px;height:17px;"/></td>
									<td><input type="text" name="p_training_sponsor<?php echo $training_count; ?>" value="<?php echo $training['conducted_sponsor_by']; ?>" id="p_training_sponsor<?php echo $training_count; ?>"style="width:200px;height:17px;"/></td>
								  </tr>
	  <?php }}?>
	
								</tbody>
								  </table>
								  
								  <table class="styled">
								<tbody>
								  <tr>
									<td colspan="3"  bgcolor="#999999"><strong>OTHER INFORMATION</strong></td>
									</tr>
								  <TR>
								  <td width="272"  align="center" bgcolor="#CCCCCC">SPECIAL SKILLS/HOBBIES</td>
								  <td width="272"  align="center" bgcolor="#CCCCCC">NON-ACEDEMIC DISTICTIONS/RECOGNITION
								<br>(Write in full)</td>
								  <td width="272"  align="center" bgcolor="#CCCCCC">MEMBERS IN ASSOCIATION/ORGANIZATION
								<br>(Write in full)</td>
								  </tr>
									 <?php
	$other1_count = 0;
	$query = mysql_query("SELECT * FROM eis_other_info1_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($other_info1=mysql_fetch_assoc($query)){	
	$other1_count = $other1_count + 1 ;
	
?>	 
								   <tr>
									<td>  <input type="text"  name="p_hobbies<?php echo $other1_count; ?>" value="<?php echo $other_info1['special_skills']; ?>"  style="width:250px;height:17px;"/></td>
									<td> <input type="text" name="p_recognition<?php echo $other1_count; ?>" value="<?php echo $other_info1['recognition']; ?>" style="width:250px;height:17px;" /></td>
									<td> <input type="text" name="p_organization<?php echo $other1_count; ?>" value="<?php echo $other_info1['organization']; ?>"  style="width:250px;height:17px;" /></td>
									</tr>
									  <?php } ?> 	
									</tbody>
								  </table>
	
						</div>
						
						<h3><a href="#">OTHER INFORMATION</a></h3>
						<div>
						<table width="816" border="1" class="styled">
  <tr>

    <td width="616" style="border:none">36.Are you related by consanguinity or affinity to any of the following : </td>
    <td width="200" style="border:none">&nbsp;</td>
	
	</tr>
  <tr>
    <td style="border:none"></td>
    <td style="border:none">&nbsp; </td>
  </tr>
  <tr>
   
    <td rowspan="3" style="border:none">a. Within the third degree (for National Government Employees):                                                      appointing authority, recommending authority, chief of office/bureau/department or person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?</td>
    <td style="border:none">
 <?php
	$q="q36_a";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q36_a")&&($q_ans == "YES")){
?>	 
	<input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked >YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio">NO
	
  </tr>
	</td>
  </tr>
  <tr>
    <td style="border:none">If YES, give details:
	
</td>
  </tr>
  <tr>
    <td style="border:none"><input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;"></td>
	<?php 
		}else{ ?>
	<input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" >YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked >NO
	
  </tr>
	</td>
  </tr>
  <tr>
    <td style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td style="border:none"><input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;"></td>
	<?php
	}
	}
	?>
	</tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="3" style="border:none">b. Within the fourth degree (for Local Government Employees):                                                              appointing authority or recommending authority where you will be appointed?</td>
    <td style="border:none">	 
	<?php
	$q="q36_b";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q36_b")&&($q_ans == "YES")){
?>	 
	<input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO
	
  </tr>
	</td>
  </tr>
  <tr>
    <td style="border:none">If YES, give details:
	
</td>
  </tr>
  <tr>
    <td style="border:none"><input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;"></td>
	<?php 
		}else{ ?>
	<input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO
	
  </tr>
	</td>
  </tr>
  <tr>
    <td style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td style="border:none"><input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;"></td>
	<?php
	}
	}
	?>
	</tr>
</table><!--close q36 -->

<table width="816" border="1" class="styled">
  <tr>
    <td width="600" style="border:none">37. a. Have you ever been formally charged?</td>
    <td width="200" style="border:none">
	<?php
	$q="q37_a";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q37_a")&&($q_ans == "YES")){
?>
   <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">
      <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </td>
  </tr>
  <?php  }else{?>
    <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none"><input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;"></td>
  </tr>
  <?php  }
  
  }?>
  <tr>
    <td  style="border:none">b. Have you ever been guilty of any administrative offense?</td>
    <td  style="border:none">
	<?php
	$q="q37_b";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q37_b")&&($q_ans == "YES")){
?>
   <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">
      <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </td>
  </tr>
  <?php  }else{?>
    <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none">If YES, give details:</td>
  </tr>
  <tr>
    <td  style="border:none">&nbsp;</td>
    <td  style="border:none"><input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;"></td>
  </tr>
  <?php  }
  
  }?>
</table><!--close q37 -->
<table width="816" border="1" class="styled">
  <tr>
    <td width="600" rowspan="3" style="border:none">38. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</td>
    <td width="200" style="border:none">
<?php
	$q="q38";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q38")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
  <?php  }else{?>
   <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
</table><!--close q38 -->
<table width="816" border="1" class="styled">
  <tr>
    <td width="600" rowspan="3" style="border:none">39. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?</td>
    <td width="200" style="border:none"> <?php
	$q="q39";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q39")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
  <?php  }else{?>
   <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
</table><!--close q39 -->
<table width="816" border="1" class="styled">
  <tr>
    <td width="600" rowspan="3" style="border:none">40. Have you ever been a candidate in a national or local election (except Barangay election)?</td>
    <td width="200" style="border:none"> <?php
	$q="q40";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q40")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
  <?php  }else{?>
   <input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">If YES, give details:</span></td>
  </tr>
  <tr>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
</table><!--close q40 -->
<table width="816" border="1" class="styled">
  <tr>
    <td width="600" rowspan="3" style="border:none" >41. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
    <td width="200" style="border:none">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:none">a. Are you a member of any indigenous group?</td>
    <td style="border:none">
	<?php
	$q="q41_a";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q41_a")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
    <?php  }else{
	?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
    <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
  <tr>
    <td style="border:none">b. Are you differently abled?</td>
    <td style="border:none"><?php
	$q="q41_b";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q41_b")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
    <?php  }else{
	?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
    <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
  <tr>
    <td style="border:none">c. Are you a solo parent?</td>
    <td style="border:none"><?php
	$q="q41_c";
	$query = mysql_query("SELECT * FROM eis_other_info2_t WHERE emp_id='$emp_id' && question_no='$q'") or die(mysql_error());
	while($other_info2=mysql_fetch_assoc($query)){
	$q_no=$other_info2['question_no'];
	$q_ans=$other_info2['answer'];
	$q_info=$other_info2['details'];
	if(($q_no == "q41_c")&&($q_ans == "YES")){
?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio" checked disabled>YES 
<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
     <input type="text"  name="details1" readonly id="details1" value="<?php echo $q_info; ?>" style="width:200px;height:15px;display:block;">
    </span></td>
  </tr>
    <?php  }else{
	?><input type="checkbox" name="q36_a" id="choice1y" onClick="chocie_yes(id)" value="YES" class="radio"  disabled>YES 
	<input type="checkbox" name="q36_a" id="choice1n" onClick="choice_no(id)" value="NO" class="radio" checked  disabled>NO</td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">If YES, please specify:</span></td>
  </tr>
  <tr>
    <td style="border:none">&nbsp;</td>
    <td style="border:none"><span style="border:none">
    <input type="text"  name="details1" id="details1" readonly  style="width:200px;height:15px;display:none;">
    </span></td>
  </tr>
  <?php  }}?>
</table><!--close q41 -->

<table width="800" border="1" class="styled">
  <tr>
    <td colspan="4" style="border:none">42. REFERENCES</td>
  </tr>
  <tr>
    <td width="250"  align="center">NAME</td>
    <td width="259" align="center">ADDRESS</td>
    <td width="144" align="center">TEL NO.</td>
    <td width="135"  rowspan="6"><?php
	$pic_usr = mysql_query("SELECT pic_name FROM eis_pic_t WHERE emp_id='$emp_id'")or die(mysql_error());
	while($get_pic = mysql_fetch_assoc($pic_usr)){
	
	?>
	<div id="dpic">
	<img src="<?php if($get_pic['pic_name']==""){
	echo '../include/dpic/default.jpg';
	}else{
	echo 'include/dpic/'.$get_pic['pic_name'];}?>" id="chng_dpic" onBlur="chk_img()"/>
	
    </div>
	<?php }?></td>
  </tr>
 <?php
	$ref_count = 0;
	$query = mysql_query("SELECT * FROM eis_reference_t WHERE emp_id='$emp_id'") or die(mysql_error());
	while($ref=mysql_fetch_assoc($query)){	
	$ref_count = $ref_count + 1 ;
	
?>	
  <tr>
    <td ><input type="text" name="ref_name<?php echo $ref_count; ?>" value="<?php echo $ref['name']; ?>" style="width:200px;height:17px;"></td>
    <td ><input type="text" name="ref_add<?php echo $ref_count; ?>" value="<?php echo $ref['name']; ?>" style="width:200px;height:17px;"></td>
    <td ><input type="text" name="ref_tel<?php echo $ref_count; ?>" value="<?php echo $ref['tel_no']; ?>" style="width:150px;height:17px;"></td>
  </tr>
 <?php } ?> 	 

  <tr>
    <td colspan="3" style="border:none">43. I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines.</td>
  </tr>
  <tr>
    <td colspan="3" rowspan="2" style="border:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.</td>
  </tr>
  <tr>
    <td style="border:none" align="center">PHOTO</td>
  </tr>
</table><!--close references -->


<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>" />
						</div>
							
					</div><!-- End of .accordion-->
					
			</div><!-- End of .box -->
		
			
			</div><!-- End of .grid_4 -->

			<div class="grid_12">
					<a onClick="window.close()" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>Back</a>
					<button type="submit"  class="button grey block right"><span class="icon i16_disk-black"></span>Save</button>
				</div>
		</form>	
	
		
		
		</section><!-- End of #content -->



	<!--</div><!-- End of #main -->
	
	
	<!-- Spawn $$.loaded -->
	<script>
		$$.loaded();
	</script>		
	</body></html>
<?php } 

}
?>
