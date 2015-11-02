<?php
include ('../db/db.php');
include ('functions.php');
include ('sql.php');
$sql = new SQL();


if(!isset($_POST['p_sex'])){
		
		echo "<script>alert('Select Gender!')</script><META HTTP-EQUIV=Refresh CONTENT='0; URL=../admin/?view=Employees'>"; 
		
}else {		 
	if(isset($_POST['emp_id'])){
		$emp_id =$_POST['emp_id'];
		$dept =$_POST['dept'];
		$fname = $_POST['p_fname'];
		$mname = $_POST['p_mname'];
		$lname = $_POST['p_lname'];
		$name_extension = $_POST['p_name_extnd'];
		
		$bdate = strtotime($_POST['p_bdate']);
		
		$p_bdate =date('Y-m-d', $bdate);
		$age = strtotime($p_bdate);
		if($age === false){
			return false;
		}
		list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
		$now = strtotime("now");
		list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
		$age = $y2 - $y1;
		if((int)($m2.$d2) < (int)($m1.$d1))
			$age -= 1;
		//$age = $_POST['age'];
		$place_of_birth = $_POST['p_place_birth'];
		$gender = $_POST['p_sex'];
		$civil_status = $_POST['p_civil_status'];
		$citizenship = $_POST['p_citizen'];
		$height = $_POST['p_height'];
		$weight = $_POST['p_weight'];
		$bloodtype = $_POST['p_blood_type'];
		$gsis_id_no = $_POST['p_gsis'];
		$pagibig_id_no = $_POST['p_pagibig'];
		$philhealth_no = $_POST['p_philhealth'];
		$sss_no = $_POST['p_sss'];
		$residential_address = $_POST['p_add1'];
		$permanent_address = $_POST['p_add2'];
		$zipcode1 = $_POST['p_zip1'];
		$zipcode2 = $_POST['p_zip2'];
		$tel_no1 = $_POST['p_tel1'];
		$tel_no2 = $_POST['p_tel2'];
		$contact_no = $_POST['p_cp'];
		$email = $_POST['p_eadd'];
		$agency_employee_no = $_POST['p_agency_no'];
		$tin = $_POST['p_tin'];
		$spouse_fname = $_POST['p_spouse_fname'];
		$spouse_mname = $_POST['p_spouse_mname'];
		$spouse_lname = $_POST['p_spouse_lname'];
		$spouse_occupation = $_POST['p_spouse_occupation'];
		$spouse_bus_name = $_POST['p_spouse_bus_name'];
		$spouse_bus_add = $_POST['p_spouse_bus_add'];
		$spouse_bus_tel_no = $_POST['p_spouse_bus_telno'];
		$father_fname = $_POST['p_father_fname'];
		$father_mname = $_POST['p_father_mname'];
		$father_lname = $_POST['p_father_lname'];
		$mother_maiden_name = $_POST['p_mother_maiden_name'];
		$mother_fname = $_POST['p_mother_fname'];
		$mother_mname = $_POST['p_mother_mname'];
		$mother_lname = $_POST['p_mother_lname'];
		
		
		
		
		
		
									$statement = " 
											   SET 
											    dept_id='".eString($dept)."'
											   ,f_name='".eString($fname)."'
											   , m_name='".eString($mname)."'
											   , l_name='".eString($lname)."'
											   , name_extension='".eString($name_extension)."'
											    , b_date='".eString($p_bdate)."'
												 , age='".eString($age)."'
												, place_of_birth='".eString($place_of_birth)."'
												, gender='".eString($gender)."'
												, civil_status='".eString($civil_status)."'
												, citizenship='".eString($citizenship)."'
												, height='".eString($height)."'
												, weight='".eString($weight)."'
												, blood_type='".eString($bloodtype)."'
												, gsis_id_no='".eString($gsis_id_no)."'
												, pag_ibig_id_no='".eString($pagibig_id_no)."'
												, philhealth_id_no='".eString($philhealth_no)."'
												, sss_id_no='".eString($sss_no)."'
												, agency_emp_no='".eString($agency_employee_no)."'
												, address='".eString($residential_address)."'
												, zip_code='".eString($zipcode1)."'
												, p_address='".eString($permanent_address)."'
												, p_zipcode='".eString($zipcode2)."'
												, contact_no1='".eString($tel_no1)."'
												, contact_no2='".eString($tel_no2)."'
												, contact_no3='".eString($contact_no)."'
												, e_add1='".eString($email)."'
												, tin='".eString($tin)."'
												, sf_name='".eString($spouse_fname)."'
												, sm_name='".eString($spouse_mname)."'
												, sl_name='".eString($spouse_lname)."'
												, s_occupation='".eString($spouse_occupation)."'
												, s_bus_name='".eString($spouse_bus_name)."'
												, s_bus_add='".eString($spouse_bus_add)."'
												, s_bus_telno='".eString($spouse_bus_tel_no)."'
												, ff_name='".eString($father_fname)."'
												, fm_name='".eString($father_mname)."'
												, fl_name='".eString($father_lname)."'
												, mf_name='".eString($mother_fname)."'
												, mm_name='".eString($mother_mname)."'
												, ml_name='".eString($mother_lname)."'
												, mmaiden_name='".eString($mother_maiden_name)."'
												  WHERE emp_id='".eString($_POST['emp_id'])."'
											   ";
									 $sql->updateSQL("`employee_t`",$statement); 
									 
									 
			###################  INSERT ROLE OF EMPLOYEE ##############
		$position =$_POST['position'];
		//echo $position;
		$insert_role="UPDATE employee_role_t SET role_id= '$position' WHERE emp_id='$emp_id'";
		mysql_query($insert_role) or die(mysql_error());
		
		$get_type=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$position'");
		$found_type=mysql_fetch_assoc($get_type);
								
		/*$userID = $_POST['user'];
		$pass = $_POST['pass'];
		$user_type= $_POST['user_type'];
		$position =$_POST['position'];
		$status =$_POST['status'];
		$subject = $_POST['subject'];
			INSERT ACCOUNT
			if($position == 'Principal'){
			$type = 'admin';
			}else { $type = 'employee'; }
			$addLoginquery ="INSERT INTO account_t(username,password,type) VALUES('$userID','$pass','$type')";
			mysql_query($addLoginquery)    or die(mysql_error());
		
		
		$user_type= $_POST['user_type'];
		if($user_type== 'Teaching'){
			$teaching = 1; } else { $teaching = 0; }
			if($user_type== 'Non-Teaching'){
			$nonteaching = 1; } else { $nonteaching = 0; }*/
			
		/* INSERT INFORMATION
		$insert = "INSERT INTO employee_t(f_name, m_name, l_name, name_extension, b_date, place_of_birth, gender, civil_status, citizenship, height, 
		weight, blood_type, gsis_id_no, pag_ibig_id_no, philhealth_id_no, sss_id_no, address, zip_code, contact_no1, contact_no2, e_add1, tin, sf_name, sm_name,
		sl_name, ff_name, fm_name, fl_name, mf_name, mm_name, ml_name, mmaiden_name ) 
		VALUES ('$fname', '$mname', '$lname', '$name_extension', '$p_bdate', '$age', '$place_of_birth', '$gender', '$civil_status', '$citizenship', '$height', 
		'$weight', '$bloodtype', '$gsis_id_no', '$pagibig_id_no', '$philhealth_no', '$sss_no', '$residential_address', '$zipcode1', '$tel_no2', '$contact_no', 
		'$email', '$tin', '$spouse_fname', '$spouse_mname', '$spouse_lname', '$father_fname', '$father_mname', '$father_lname', '$mother_fname', '$mother_mname',
		'$mother_lname', '$mother_maiden_name','$position','$teaching','$nonteaching',LAST_INSERT_ID())";
		mysql_query($insert) or die(mysql_error()); */
									
		
		
/* START */		



  
  
		//p_child
	
	
	
	//p_child bday
	 $count1=1;
$count2=2;
$count3=3;
$count4=4;
$count5=5;
$count6=6;
$count7=7;
$count8=8;
$count9=9;
$count10=10;
$count11=11;
$count12=12;
$count13=13;
$count14=14;
$count15=15;
$count16=16;
$count17=17;
$count18=18;
$count19=19;
$count20=20;
				//p_child1 
			if(isset($_POST['p_child1_name'])){
				$p_child1_name =$_POST['p_child1_name'];
				$p_child_bday1 = $_POST['p_child_bday1'];
				if($p_child_bday1==""){
				$child_query1="UPDATE eis_child_t SET child_name='$p_child1_name' WHERE emp_id='$emp_id' && count='$count1'";
				mysql_query($child_query1)    or die(mysql_error());
				}else{
				$p_child_bday1 = strtotime($_POST['p_child_bday1']);
				$p_child_bday1 = date('Y-m-d',$p_child_bday1);
				$child_query1="UPDATE eis_child_t SET child_name='$p_child1_name',child_bdate='$p_child_bday1' WHERE emp_id='$emp_id' && count='$count1'";
				mysql_query($child_query1)    or die(mysql_error());
				}
			}
				//p_child2 
			if(isset($_POST['p_child2_name'])){
				$p_child2_name =$_POST['p_child2_name'];
				$p_child_bday2 = $_POST['p_child_bday2'];
				if($p_child_bday2==""){
				$child_query2="UPDATE eis_child_t SET child_name='$p_child2_name' WHERE emp_id='$emp_id' && count='$count2'";
				mysql_query($child_query2)    or die(mysql_error());
				}else{
				$p_child_bday2 = strtotime($_POST['p_child_bday2']);
				$p_child_bday2 = date('Y-m-d',$p_child_bday2);
				$child_query2="UPDATE eis_child_t SET child_name='$p_child2_name',child_bdate='$p_child_bday2' WHERE emp_id='$emp_id' && count ='$count2'";
				mysql_query($child_query2)    or die(mysql_error());
				}
			}
	
				//p_child3 
				if(isset($_POST['p_child3_name'])){
				$p_child_bday3 = $_POST['p_child_bday3'];
				$p_child3_name =$_POST['p_child3_name'];
				if($p_child_bday3==""){
				$child_query3="UPDATE eis_child_t SET child_name='$p_child3_name' WHERE emp_id='$emp_id' && count='$count3'";
				mysql_query($child_query3)    or die(mysql_error());
				}else{
				$p_child_bday3 = strtotime($_POST['p_child_bday3']);
				$p_child_bday3 = date('Y-m-d',$p_child_bday3);
				$child_query3="UPDATE eis_child_t SET child_name='$p_child3_name',child_bdate='$p_child_bday3' WHERE emp_id='$emp_id' && count='$count3'";
				mysql_query($child_query3)    or die(mysql_error());
				}
				}
				//p_child4 
				if(isset($_POST['p_child4_name'])){
				$p_child_bday4 = $_POST['p_child_bday4'];
				$p_child4_name =$_POST['p_child4_name'];
				if($p_child_bday4==""){
				$child_query4="UPDATE eis_child_t SET child_name='$p_child4_name' WHERE emp_id='$emp_id' && count='$count4'";
				mysql_query($child_query4)    or die(mysql_error());
				}else{
				$p_child_bday4 = strtotime($_POST['p_child_bday4']);
				$p_child_bday4 = date('Y-m-d',$p_child_bday4);
				$child_query4="UPDATE eis_child_t SET child_name='$p_child4_name',child_bdate='$p_child_bday4' WHERE emp_id='$emp_id' && count='$count4'";
				mysql_query($child_query4)    or die(mysql_error());
				}
				}
				//p_child5 
				if(isset($_POST['p_child5_name'])){
				$p_child_bday5 = $_POST['p_child_bday5'];
				$p_child5_name =$_POST['p_child5_name'];
				if($p_child_bday5==""){
				$child_query5="UPDATE eis_child_t SET child_name='$p_child5_name' WHERE emp_id='$emp_id' && count='$count5'";
				mysql_query($child_query5)    or die(mysql_error());
				}else{
				$p_child_bday5 = strtotime($_POST['p_child_bday5']);
				$p_child_bday5 = date('Y-m-d',$p_child_bday5);
				$child_query5="UPDATE eis_child_t SET child_name='$p_child5_name',child_bdate='$p_child_bday5' WHERE emp_id='$emp_id' && count='$count5'";
				mysql_query($child_query5)    or die(mysql_error());
				}
				}
				//p_child6 
				if(isset($_POST['p_child6_name'])){
				$p_child_bday6 = $_POST['p_child_bday6'];
				$p_child6_name =$_POST['p_child6_name'];
				if($p_child_bday6==""){
				$child_query6="UPDATE eis_child_t SET child_name='$p_child6_name' WHERE emp_id='$emp_id' && count='$count6'";
				mysql_query($child_query6)    or die(mysql_error());
				}else{
				$p_child_bday6 = strtotime($_POST['p_child_bday6']);
				$p_child_bday6 = date('Y-m-d',$p_child_bday6);
				$child_query6="UPDATE eis_child_t SET child_name='$p_child6_name',child_bdate='$p_child_bday6' WHERE emp_id='$emp_id' && count='$count6'";
				mysql_query($child_query6)    or die(mysql_error());
				}
				}
				//p_child7 
				if(isset($_POST['p_child7_name'])){
				$p_child_bday7 = $_POST['p_child_bday7'];
				$p_child7_name =$_POST['p_child7_name'];
				if($p_child_bday7==""){
				$child_query7="UPDATE eis_child_t SET child_name='$p_child7_name' WHERE emp_id='$emp_id' && count='$count7'";
				mysql_query($child_query7)    or die(mysql_error());
				}else{
				$p_child_bday7 = strtotime($_POST['p_child_bday7']);
				$p_child_bday7 = date('Y-m-d',$p_child_bday7);
				$child_query7="UPDATE eis_child_t SET child_name='$p_child7_name',child_bdate='$p_child_bday7' WHERE emp_id='$emp_id' && count='$count7'";
				mysql_query($child_query7)    or die(mysql_error());
				}
				}
				//p_child8 
				if(isset($_POST['p_child8_name'])){
				$p_child_bday8 = $_POST['p_child_bday8'];
				$p_child8_name =$_POST['p_child8_name'];
				if($p_child_bday8==""){
				$child_query8="UPDATE eis_child_t SET child_name='$p_child8_name' WHERE emp_id='$emp_id' && count='$count8'";
				mysql_query($child_query8)    or die(mysql_error());
				}else{
				$p_child_bday8 = strtotime($_POST['p_child_bday8']);
				$p_child_bday8 = date('Y-m-d',$p_child_bday8);
				$child_query8="UPDATE eis_child_t SET child_name='$p_child8_name',child_bdate='$p_child_bday8' WHERE emp_id='$emp_id' && count='$count8'";
				mysql_query($child_query8)    or die(mysql_error());
				}
				}
				//p_child9 
				if(isset($_POST['p_child9_name'])){
				$p_child_bday9 = $_POST['p_child_bday9'];
				$p_child9_name =$_POST['p_child9_name'];
				if($p_child_bday9==""){
				$child_query9="UPDATE eis_child_t SET child_name='$p_child9_name' WHERE emp_id='$emp_id' && count='$count9'";
				mysql_query($child_query9)    or die(mysql_error());
				}else{
				$p_child_bday9 = strtotime($_POST['p_child_bday9']);
				$p_child_bday9 = date('Y-m-d',$p_child_bday9);
				$child_query9="UPDATE eis_child_t SET child_name='$p_child9_name',child_bdate='$p_child_bday9' WHERE emp_id='$emp_id' && count='$count9'";
				mysql_query($child_query9)    or die(mysql_error());
				}
				}
				//p_child10 
				if(isset($_POST['p_child10_name'])){
				$p_child_bday10 = $_POST['p_child_bday10'];
				$p_child10_name =$_POST['p_child10_name'];
				if($p_child_bday10==""){
				$child_query10="UPDATE eis_child_t SET child_name='$p_child10_name' WHERE emp_id='$emp_id' && count='$count10'";
				mysql_query($child_query10)    or die(mysql_error());
				}else{
				$p_child_bday10 = strtotime($_POST['p_child_bday10']);
				$p_child_bday10 = date('Y-m-d',$p_child_bday10);
				$child_query10="UPDATE eis_child_t SET child_name='$p_child10_name',child_bdate='$p_child_bday10' WHERE emp_id='$emp_id' && count='$count10'";
				mysql_query($child_query10)    or die(mysql_error());
				}
				}
				//p_child11
				if(isset($_POST['p_child11_name'])){
				$p_child_bday11 = $_POST['p_child_bday11'];
				$p_child11_name =$_POST['p_child11_name'];
				if($p_child_bday11==""){
				$child_query11="UPDATE eis_child_t SET child_name='$p_child11_name' WHERE emp_id='$emp_id' && count='$count11'";
				mysql_query($child_query11)    or die(mysql_error());
				}else{
				$p_child_bday11 = strtotime($_POST['p_child_bday11']);
				$p_child_bday11 = date('Y-m-d',$p_child_bday11);
				$child_query11="UPDATE eis_child_t SET child_name='$p_child11_name',child_bdate='$p_child_bday11' WHERE emp_id='$emp_id' && count='$count11'";
				mysql_query($child_query11)    or die(mysql_error());
				}
				}
				//p_child12
				if(isset($_POST['p_child12_name'])){
				$p_child_bday12 = $_POST['p_child_bday12'];
				$p_child12_name =$_POST['p_child12_name'];
				if($p_child_bday12==""){
				$child_query12="UPDATE eis_child_t SET child_name='$p_child12_name' WHERE emp_id='$emp_id' && count='$count12'";
				mysql_query($child_query12)    or die(mysql_error());
				}else{
				$p_child_bday12 = strtotime($_POST['p_child_bday12']);
				$p_child_bday12 = date('Y-m-d',$p_child_bday12);
				$child_query12="UPDATE eis_child_t SET child_name='$p_child12_name',child_bdate='$p_child_bday12' WHERE emp_id='$emp_id' && count='$count12'";
				mysql_query($child_query12)    or die(mysql_error());
				}
				}
				
				
		$school_level=array(
			 "elementary" => "Elementary",
			 "secondary" => "Secondary",
			 "vocational" => "Vocational",
			 "college1" => "College1",
			 "college2" => "College2",
			 "gs1" => "GS1",
			 "gs2" => "GS2",
			);
			$level="";
			
		//declaration for elementary
		if(isset($_POST['p_elem_school_name1'])){
		$p_elem_school_name1 = $_POST['p_elem_school_name1'];
		$p_degree_elem1 = $_POST['p_degree_elem1'];
		$p_year_grad_elem1 = $_POST['p_year_grad_elem1'];
		$p_highest_grade_elem1 = $_POST['p_highest_grade_elem1'];
		$p_elem_attendance_from1 =$_POST['p_elem_attendance_from1'];
		$p_elem_attendance_to1 = $_POST['p_elem_attendance_to1'];
		$p_scholarship_elem1 = $_POST['p_scholarship_elem1'];	
		$level=$school_level['elementary'];
		if(($p_elem_attendance_from1 == "" || $p_elem_attendance_to1 =="" || $p_year_grad_elem1="") ||($p_elem_attendance_from1 == "" && $p_elem_attendance_to1 =="" && $p_year_grad_elem1=="")){
			$elemquery1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name1',degree_course='$p_degree_elem1',
			highest_grade_earned='$p_highest_grade_elem1',scholarship='$p_scholarship_elem1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'";  	  
			mysql_query($elemquery1)    or die(mysql_error());
		}else{
		$p_elem_attendance_from1 = strtotime($p_elem_attendance_from1);
		$p_elem_attendance_from1 = date('Y-m-d',$p_elem_attendance_from1);
		$p_elem_attendance_to1 = strtotime($p_elem_attendance_to1);
		$p_elem_attendance_to1 = date('Y-m-d',$p_elem_attendance_to1);
			$elemquery1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name1',degree_course='$p_degree_elem1',year_graduated='$p_year_grad_elem1',
			highest_grade_earned='$p_highest_grade_elem1',inclusive_date_att_from='$p_elem_attendance_from1',inclusive_date_att_to='$p_elem_attendance_to1',
			scholarship='$p_scholarship_elem1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'";  	  
			mysql_query($elemquery1)    or die(mysql_error());
		}
		}
		
		if(isset($_POST['p_elem_school_name2'])){
		$p_elem_school_name2 = $_POST['p_elem_school_name2'];
		$p_degree_elem2 = $_POST['p_degree_elem2'];
		$p_year_grad_elem2 = $_POST['p_year_grad_elem2'];
		$p_highest_grade_elem2 = $_POST['p_highest_grade_elem2'];
		$p_elem_attendance_from2 =$_POST['p_elem_attendance_from2'];
		$p_elem_attendance_to2 = $_POST['p_elem_attendance_to2'];
		$p_scholarship_elem2 = $_POST['p_scholarship_elem2'];	
		$level=$school_level['elementary'];
		if(($p_elem_attendance_from2 == "" || $p_elem_attendance_to2 =="" || $p_year_grad_elem2="") ||($p_elem_attendance_from2 == "" && $p_elem_attendance_to2 =="" && $p_year_grad_elem2=="")){
			$elemquery2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name2',degree_course='$p_degree_elem2',
			highest_grade_earned='$p_highest_grade_elem2',scholarship='$p_scholarship_elem2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'";  	  
			mysql_query($elemquery2)    or die(mysql_error());
		}else{
		$p_elem_attendance_from2 = strtotime($p_elem_attendance_from2);
		$p_elem_attendance_from2 = date('Y-m-d',$p_elem_attendance_from2);
		$p_elem_attendance_to2 = strtotime($p_elem_attendance_to2);
		$p_elem_attendance_to2 = date('Y-m-d',$p_elem_attendance_to2);
			$elemquery2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name2',degree_course='$p_degree_elem2',year_graduated='$p_year_grad_elem2',
			highest_grade_earned='$p_highest_grade_elem2',inclusive_date_att_from='$p_elem_attendance_from2',inclusive_date_att_to='$p_elem_attendance_to2',
			scholarship='$p_scholarship_elem2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'";  	  
			mysql_query($elemquery2)    or die(mysql_error());
		}
		}
		
		if(isset($_POST['p_elem_school_name3'])){
		$p_elem_school_name3 = $_POST['p_elem_school_name3'];
		$p_degree_elem3 = $_POST['p_degree_elem3'];
		$p_year_grad_elem3 = $_POST['p_year_grad_elem3'];
		$p_highest_grade_elem3 = $_POST['p_highest_grade_elem3'];
		$p_elem_attendance_from3 =$_POST['p_elem_attendance_from3'];
		$p_elem_attendance_to3 = $_POST['p_elem_attendance_to3'];
		$p_scholarship_elem3 = $_POST['p_scholarship_elem3'];	
		$level=$school_level['elementary'];
		if(($p_elem_attendance_from3 == "" || $p_elem_attendance_to3 =="" || $p_year_grad_elem3="") ||($p_elem_attendance_from3 == "" && $p_elem_attendance_to3 =="" && $p_year_grad_elem3=="")){
			$elemquery3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name3',degree_course='$p_degree_elem3',
			highest_grade_earned='$p_highest_grade_elem3',scholarship='$p_scholarship_elem3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'";  	  
			mysql_query($elemquery3)    or die(mysql_error());
		}else{
		$p_elem_attendance_from3 = strtotime($p_elem_attendance_from3);
		$p_elem_attendance_from3 = date('Y-m-d',$p_elem_attendance_from3);
		$p_elem_attendance_to3 = strtotime($p_elem_attendance_to3);
		$p_elem_attendance_to3 = date('Y-m-d',$p_elem_attendance_to3);
			$elemquery3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name3',degree_course='$p_degree_elem3',year_graduated='$p_year_grad_elem3',
			highest_grade_earned='$p_highest_grade_elem3',inclusive_date_att_from='$p_elem_attendance_from3',inclusive_date_att_to='$p_elem_attendance_to3',
			scholarship='$p_scholarship_elem3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'";  	  
			mysql_query($elemquery3)    or die(mysql_error());
		}
		}
		
		if(isset($_POST['p_elem_school_name4'])){
		$p_elem_school_name4 = $_POST['p_elem_school_name4'];
		$p_degree_elem4 = $_POST['p_degree_elem4'];
		$p_year_grad_elem4 = $_POST['p_year_grad_elem4'];
		$p_highest_grade_elem4 = $_POST['p_highest_grade_elem4'];
		$p_elem_attendance_from4 =$_POST['p_elem_attendance_from4'];
		$p_elem_attendance_to4 = $_POST['p_elem_attendance_to4'];
		$p_scholarship_elem4 = $_POST['p_scholarship_elem4'];	
		$level=$school_level['elementary'];
		if(($p_elem_attendance_from4 == "" || $p_elem_attendance_to4 =="" || $p_year_grad_elem4="") ||($p_elem_attendance_from4 == "" && $p_elem_attendance_to4 =="" && $p_year_grad_elem4=="")){
			$elemquery4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name4',degree_course='$p_degree_elem4',
			highest_grade_earned='$p_highest_grade_elem4',scholarship='$p_scholarship_elem4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'";  	  
			mysql_query($elemquery4)    or die(mysql_error());
		}else{
		$p_elem_attendance_from4 = strtotime($p_elem_attendance_from4);
		$p_elem_attendance_from4 = date('Y-m-d',$p_elem_attendance_from4);
		$p_elem_attendance_to4 = strtotime($p_elem_attendance_to4);
		$p_elem_attendance_to4 = date('Y-m-d',$p_elem_attendance_to4);
			$elemquery4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name4',degree_course='$p_degree_elem4',year_graduated='$p_year_grad_elem4',
			highest_grade_earned='$p_highest_grade_elem3',inclusive_date_att_from='$p_elem_attendance_from4',inclusive_date_att_to='$p_elem_attendance_to4',
			scholarship='$p_scholarship_elem4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'";  	  
			mysql_query($elemquery4)    or die(mysql_error());
		}
		}
		
		if(isset($_POST['p_elem_school_name5'])){
		$p_elem_school_name5 = $_POST['p_elem_school_name5'];
		$p_degree_elem5 = $_POST['p_degree_elem5'];
		$p_year_grad_elem5 = $_POST['p_year_grad_elem5'];
		$p_highest_grade_elem5 = $_POST['p_highest_grade_elem5'];
		$p_elem_attendance_from5 =$_POST['p_elem_attendance_from5'];
		$p_elem_attendance_to5 = $_POST['p_elem_attendance_to5'];
		$p_scholarship_elem5 = $_POST['p_scholarship_elem5'];	
		$level=$school_level['elementary'];
		if(($p_elem_attendance_from5 == "" || $p_elem_attendance_to5 =="" || $p_year_grad_elem5="") ||($p_elem_attendance_from5 == "" && $p_elem_attendance_to5 =="" && $p_year_grad_elem5=="")){
			$elemquery5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name5',degree_course='$p_degree_elem5',
			highest_grade_earned='$p_highest_grade_elem5',scholarship='$p_scholarship_elem5',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'";  	  
			mysql_query($elemquery5)    or die(mysql_error());
		}else{
		$p_elem_attendance_from5 = strtotime($p_elem_attendance_from5);
		$p_elem_attendance_from5 = date('Y-m-d',$p_elem_attendance_from5);
		$p_elem_attendance_to5 = strtotime($p_elem_attendance_to5);
		$p_elem_attendance_to5 = date('Y-m-d',$p_elem_attendance_to5);
			$elemquery5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_elem_school_name5',degree_course='$p_degree_elem4',year_graduated='$p_year_grad_elem5',
			highest_grade_earned='$p_highest_grade_elem5',inclusive_date_att_from='$p_elem_attendance_from5',inclusive_date_att_to='$p_elem_attendance_to5',
			scholarship='$p_scholarship_elem5',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'";  	  
			mysql_query($elemquery4)    or die(mysql_error());
		}
		}
	
	  //declaration for secondary
		if(isset($_POST['p_second_school_name1'])){
		$p_second_school_name1 = $_POST['p_second_school_name1'];
		$p_degree_second1 = $_POST['p_degree_second1'];
		$p_year_grad_second1 = $_POST['p_year_grad_second1'];
		$p_highest_grade_second1 = $_POST['p_highest_grade_second1'];
		$p_second_attendance_from1 = $_POST['p_second_attendance_from1'];
		$p_second_attendance_to1 =$_POST['p_second_attendance_to1'];
		$p_scholarship_second1 = $_POST['p_scholarship_second1'];
		$level=$school_level['secondary'];
		if(($p_second_attendance_from1 == "" || $p_second_attendance_to1 == "" || $p_year_grad_second1=="") ||($p_second_attendance_from1 == "" && $p_second_attendance_to1 == "" && $p_year_grad_second1=="")){
			$secondquery1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_second_school_name1',degree_course='$p_degree_second1',
			highest_grade_earned='$p_highest_grade_second1',scholarship='$p_scholarship_second1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'"; 
			mysql_query($secondquery1)    or die(mysql_error()); 
		}else{
		$p_second_attendance_from1 = strtotime($p_second_attendance_from1);
		$p_second_attendance_from1 = date('Y-m-d',$p_second_attendance_from1);
		$p_second_attendance_to1 = strtotime($p_second_attendance_to1);
		$p_second_attendance_to1= date('Y-m-d',$p_second_attendance_to1);
			$secondquery1 ="UPDATE  eis_educ_bg_t SET name_of_school='$p_second_school_name1',degree_course='$p_degree_second1',
			year_graduated='$p_year_grad_second1',highest_grade_earned='$p_highest_grade_second1',inclusive_date_att_from='$p_second_attendance_from1',
			inclusive_date_att_to='$p_second_attendance_to1',scholarship='$p_scholarship_second1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'"; 
			mysql_query($secondquery1)    or die(mysql_error());
			}
		}
		
		if(isset($_POST['p_second_school_name2'])){
		$p_second_school_name2 = $_POST['p_second_school_name2'];
		$p_degree_second2 = $_POST['p_degree_second2'];
		$p_year_grad_second2 = $_POST['p_year_grad_second2'];
		$p_highest_grade_second2 = $_POST['p_highest_grade_second2'];
		$p_second_attendance_from2 = $_POST['p_second_attendance_from2'];
		$p_second_attendance_to2 =$_POST['p_second_attendance_to2'];
		$p_scholarship_second2 = $_POST['p_scholarship_second2'];
		$level=$school_level['secondary'];
		if(($p_second_attendance_from2 == "" || $p_second_attendance_to2 == "" || $p_year_grad_second2=="") ||($p_second_attendance_from2 == "" && $p_second_attendance_to2 == "" && $p_year_grad_second2=="")){
			$secondquery2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_second_school_name2',degree_course='$p_degree_second2',
			highest_grade_earned='$p_highest_grade_second2',scholarship='$p_scholarship_second2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'"; 
			mysql_query($secondquery2)    or die(mysql_error()); 
		}else{
		$p_second_attendance_from2 = strtotime($p_second_attendance_from2);
		$p_second_attendance_from2 = date('Y-m-d',$p_second_attendance_from2);
		$p_second_attendance_to2 = strtotime($p_second_attendance_to2);
		$p_second_attendance_to2= date('Y-m-d',$p_second_attendance_to2);
			$secondquery2 ="UPDATE  eis_educ_bg_t SET name_of_school='$p_second_school_name2',degree_course='$p_degree_second2',
			year_graduated='$p_year_grad_second2',highest_grade_earned='$p_highest_grade_second2',inclusive_date_att_from='$p_second_attendance_from2',
			inclusive_date_att_to='$p_second_attendance_to2',scholarship='$p_scholarship_second2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'"; 
			mysql_query($secondquery2)    or die(mysql_error());
			}
		}
		
		if(isset($_POST['p_second_school_name3'])){
		$p_second_school_name3 = $_POST['p_second_school_name3'];
		$p_degree_second3 = $_POST['p_degree_second3'];
		$p_year_grad_second3 = $_POST['p_year_grad_second3'];
		$p_highest_grade_second3 = $_POST['p_highest_grade_second3'];
		$p_second_attendance_from3 = $_POST['p_second_attendance_from3'];
		$p_second_attendance_to3 =$_POST['p_second_attendance_to3'];
		$p_scholarship_second3 = $_POST['p_scholarship_second3'];
		$level=$school_level['secondary'];
		if(($p_second_attendance_from3 == "" || $p_second_attendance_to3 == "" || $p_year_grad_second3=="") ||($p_second_attendance_from3 == "" && $p_second_attendance_to3 == "" && $p_year_grad_second3=="")){
			$secondquery3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_second_school_name3',degree_course='$p_degree_second3',
			highest_grade_earned='$p_highest_grade_second3',scholarship='$p_scholarship_second3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'"; 
			mysql_query($secondquery3)    or die(mysql_error()); 
		}else{
		$p_second_attendance_from3 = strtotime($p_second_attendance_from3);
		$p_second_attendance_from3 = date('Y-m-d',$p_second_attendance_from3);
		$p_second_attendance_to3 = strtotime($p_second_attendance_to3);
		$p_second_attendance_to3= date('Y-m-d',$p_second_attendance_to3);
			$secondquery3 ="UPDATE  eis_educ_bg_t SET name_of_school='$p_second_school_name3',degree_course='$p_degree_second3',
			year_graduated='$p_year_grad_second3',highest_grade_earned='$p_highest_grade_second3',inclusive_date_att_from='$p_second_attendance_from3',
			inclusive_date_att_to='$p_second_attendance_to3',scholarship='$p_scholarship_second3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'"; 
			mysql_query($secondquery3)    or die(mysql_error());
			}
		}
		
		if(isset($_POST['p_second_school_name4'])){
		$p_second_school_name4 = $_POST['p_second_school_name4'];
		$p_degree_second4 = $_POST['p_degree_second4'];
		$p_year_grad_second4 = $_POST['p_year_grad_second4'];
		$p_highest_grade_second4 = $_POST['p_highest_grade_second4'];
		$p_second_attendance_from4 = $_POST['p_second_attendance_from4'];
		$p_second_attendance_to4 =$_POST['p_second_attendance_to4'];
		$p_scholarship_second4 = $_POST['p_scholarship_second4'];
		$level=$school_level['secondary'];
		if(($p_second_attendance_from4 == "" || $p_second_attendance_to4 == "" || $p_year_grad_second4=="") ||($p_second_attendance_from4 == "" && $p_second_attendance_to4 == "" && $p_year_grad_second4=="")){
			$secondquery4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_second_school_name4',degree_course='$p_degree_second4',
			highest_grade_earned='$p_highest_grade_second4',scholarship='$p_scholarship_second4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'"; 
			mysql_query($secondquery4)    or die(mysql_error()); 
		}else{
		$p_second_attendance_from4 = strtotime($p_second_attendance_from4);
		$p_second_attendance_from4 = date('Y-m-d',$p_second_attendance_from4);
		$p_second_attendance_to4 = strtotime($p_second_attendance_to4);
		$p_second_attendance_to4= date('Y-m-d',$p_second_attendance_to4);
			$secondquery4 ="UPDATE  eis_educ_bg_t SET name_of_school='$p_second_school_name4',degree_course='$p_degree_second4',
			year_graduated='$p_year_grad_second4',highest_grade_earned='$p_highest_grade_second4',inclusive_date_att_from='$p_second_attendance_from4',
			inclusive_date_att_to='$p_second_attendance_to4',scholarship='$p_scholarship_second4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'"; 
			mysql_query($secondquery4)    or die(mysql_error());
			}
		}
	
		if(isset($_POST['p_second_school_name5'])){
		$p_second_school_name5 = $_POST['p_second_school_name5'];
		$p_degree_second5 = $_POST['p_degree_second5'];
		$p_year_grad_second5 = $_POST['p_year_grad_second5'];
		$p_highest_grade_second5 = $_POST['p_highest_grade_second5'];
		$p_second_attendance_from5 = $_POST['p_second_attendance_from5'];
		$p_second_attendance_to5 =$_POST['p_second_attendance_to5'];
		$p_scholarship_second5 = $_POST['p_scholarship_second5'];
		$level=$school_level['secondary'];
		if(($p_second_attendance_from5 == "" || $p_second_attendance_to5 == "" || $p_year_grad_second5=="") ||($p_second_attendance_from5 == "" && $p_second_attendance_to5 == "" && $p_year_grad_second5=="")){
			$secondquery5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_second_school_name5',degree_course='$p_degree_second5',
			highest_grade_earned='$p_highest_grade_second5',scholarship='$p_scholarship_second5',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'"; 
			mysql_query($secondquery5)    or die(mysql_error()); 
		}else{
		$p_second_attendance_from5 = strtotime($p_second_attendance_from5);
		$p_second_attendance_from5 = date('Y-m-d',$p_second_attendance_from5);
		$p_second_attendance_to5 = strtotime($p_second_attendance_to5);
		$p_second_attendance_to5= date('Y-m-d',$p_second_attendance_to5);
			$secondquery5 ="UPDATE  eis_educ_bg_t SET name_of_school='$p_second_school_name5',degree_course='$p_degree_second5',
			year_graduated='$p_year_grad_second5',highest_grade_earned='$p_highest_grade_second5',inclusive_date_att_from='$p_second_attendance_from5',
			inclusive_date_att_to='$p_second_attendance_to5',scholarship='$p_scholarship_second5',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'"; 
			mysql_query($secondquery5)    or die(mysql_error());
			}
		}
	
		//declaration for vocational
		if(isset($_POST['p_voc_school_name1'])){
		$p_voc_school_name1 = $_POST['p_voc_school_name1'];
		$p_degree_voc1 = $_POST['p_degree_voc1'];
		$p_year_grad_voc1 = $_POST['p_year_grad_voc1'];
		$p_highest_grade_voc1 = $_POST['p_highest_grade_voc1'];
		$p_voc_attendance_from1 =$_POST['p_voc_attendance_from1'];
		$p_voc_attendance_to1 = $_POST['p_voc_attendance_to1'];
		$p_scholarship_voc1 = $_POST['p_scholarship_voc1'];
		  $level=$school_level['vocational'];
		 if(($p_voc_attendance_from1 =="" || $p_voc_attendance_to1 =="" ||$p_year_grad_voc1 =="")||($p_voc_attendance_from1 =="" && $p_voc_attendance_to1 =="" && $p_year_grad_voc1 =="")){
			$vocquery1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name1',degree_course='$p_degree_voc1',
			highest_grade_earned='$p_highest_grade_voc1',scholarship='$p_scholarship_voc1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'"; 
			mysql_query($vocquery1)    or die(mysql_error());
		}else{
		$p_voc_attendance_from1 =strtotime($p_voc_attendance_from1);
		$p_voc_attendance_from1= date('Y-m-d',$p_voc_attendance_from1);
		$p_voc_attendance_to1 = strtotime($p_voc_attendance_to1);
		$p_voc_attendance_to1= date('Y-m-d',$p_voc_attendance_to1);
			$vocquery1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name1',degree_course='$p_degree_voc1',year_graduated='$p_year_grad_voc1',
			highest_grade_earned='$p_highest_grade_voc1',inclusive_date_att_from='$p_voc_attendance_from1',
			inclusive_date_att_to='$p_voc_attendance_to1',scholarship='$p_scholarship_voc1',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'"; 
			mysql_query($vocquery1)    or die(mysql_error()); 	
		}		
		}
		
		if(isset($_POST['p_voc_school_name2'])){
		$p_voc_school_name2 = $_POST['p_voc_school_name2'];
		$p_degree_voc2 = $_POST['p_degree_voc2'];
		$p_year_grad_voc2 = $_POST['p_year_grad_voc2'];
		$p_highest_grade_voc2 = $_POST['p_highest_grade_voc2'];
		$p_voc_attendance_from2 =$_POST['p_voc_attendance_from2'];
		$p_voc_attendance_to2 = $_POST['p_voc_attendance_to2'];
		$p_scholarship_voc2 = $_POST['p_scholarship_voc2'];
		  $level=$school_level['vocational'];
		 if(($p_voc_attendance_from2 =="" || $p_voc_attendance_to2 =="" ||$p_year_grad_voc2 =="")||($p_voc_attendance_from2 =="" && $p_voc_attendance_to2 =="" && $p_year_grad_voc2 =="")){
			$vocquery2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name2',degree_course='$p_degree_voc2',
			highest_grade_earned='$p_highest_grade_voc2',scholarship='$p_scholarship_voc2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'"; 
			mysql_query($vocquery2)    or die(mysql_error());
		}else{
		$p_voc_attendance_from2 =strtotime($p_voc_attendance_from2);
		$p_voc_attendance_from2= date('Y-m-d',$p_voc_attendance_from2);
		$p_voc_attendance_to2 = strtotime($p_voc_attendance_to2);
		$p_voc_attendance_to2= date('Y-m-d',$p_voc_attendance_to2);
			$vocquery2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name2',degree_course='$p_degree_voc2',year_graduated='$p_year_grad_voc2',
			highest_grade_earned='$p_highest_grade_voc2',inclusive_date_att_from='$p_voc_attendance_from2',
			inclusive_date_att_to='$p_voc_attendance_to2',scholarship='$p_scholarship_voc2',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'"; 
			mysql_query($vocquery2)    or die(mysql_error()); 	
		}		
		}
		
		if(isset($_POST['p_voc_school_name3'])){
		$p_voc_school_name3 = $_POST['p_voc_school_name3'];
		$p_degree_voc3 = $_POST['p_degree_voc3'];
		$p_year_grad_voc3 = $_POST['p_year_grad_voc3'];
		$p_highest_grade_voc3 = $_POST['p_highest_grade_voc3'];
		$p_voc_attendance_from3 =$_POST['p_voc_attendance_from3'];
		$p_voc_attendance_to3 = $_POST['p_voc_attendance_to3'];
		$p_scholarship_voc3 = $_POST['p_scholarship_voc3'];
		  $level=$school_level['vocational'];
		 if(($p_voc_attendance_from3 =="" || $p_voc_attendance_to3 =="" ||$p_year_grad_voc3 =="")||($p_voc_attendance_from3 =="" && $p_voc_attendance_to3 =="" && $p_year_grad_voc3 =="")){
			$vocquery3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name3',degree_course='$p_degree_voc3',
			highest_grade_earned='$p_highest_grade_voc3',scholarship='$p_scholarship_voc3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'"; 
			mysql_query($vocquery3)    or die(mysql_error());
		}else{
		$p_voc_attendance_from3 =strtotime($p_voc_attendance_from3);
		$p_voc_attendance_from3= date('Y-m-d',$p_voc_attendance_from3);
		$p_voc_attendance_to3 = strtotime($p_voc_attendance_to3);
		$p_voc_attendance_to3= date('Y-m-d',$p_voc_attendance_to3);
			$vocquery3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name3',degree_course='$p_degree_voc3',year_graduated='$p_year_grad_voc3',
			highest_grade_earned='$p_highest_grade_voc3',inclusive_date_att_from='$p_voc_attendance_from3',
			inclusive_date_att_to='$p_voc_attendance_to3',scholarship='$p_scholarship_voc3',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'"; 
			mysql_query($vocquery3)    or die(mysql_error()); 	
		}		
		}
		
		if(isset($_POST['p_voc_school_name4'])){
		$p_voc_school_name4 = $_POST['p_voc_school_name4'];
		$p_degree_voc4 = $_POST['p_degree_voc4'];
		$p_year_grad_voc3 = $_POST['p_year_grad_voc4'];
		$p_highest_grade_voc4 = $_POST['p_highest_grade_voc4'];
		$p_voc_attendance_from4 =$_POST['p_voc_attendance_from4'];
		$p_voc_attendance_to4 = $_POST['p_voc_attendance_to4'];
		$p_scholarship_voc4 = $_POST['p_scholarship_voc4'];
		  $level=$school_level['vocational'];
		 if(($p_voc_attendance_from4 =="" || $p_voc_attendance_to4 =="" ||$p_year_grad_voc4 =="")||($p_voc_attendance_from4 =="" && $p_voc_attendance_to4 =="" && $p_year_grad_voc4 =="")){
			$vocquery4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name4',degree_course='$p_degree_voc4',
			highest_grade_earned='$p_highest_grade_voc4',scholarship='$p_scholarship_voc4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'"; 
			mysql_query($vocquery4)    or die(mysql_error());
		}else{
		$p_voc_attendance_from4 =strtotime($p_voc_attendance_from4);
		$p_voc_attendance_from4= date('Y-m-d',$p_voc_attendance_from4);
		$p_voc_attendance_to4 = strtotime($p_voc_attendance_to4);
		$p_voc_attendance_to4= date('Y-m-d',$p_voc_attendance_to4);
			$vocquery4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name4',degree_course='$p_degree_voc4',year_graduated='$p_year_grad_voc4',
			highest_grade_earned='$p_highest_grade_voc4',inclusive_date_att_from='$p_voc_attendance_from4',
			inclusive_date_att_to='$p_voc_attendance_to4',scholarship='$p_scholarship_voc4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'"; 
			mysql_query($vocquery4)    or die(mysql_error()); 	
		}		
		}
		
		if(isset($_POST['p_voc_school_name5'])){
		$p_voc_school_name5 = $_POST['p_voc_school_name5'];
		$p_degree_voc5 = $_POST['p_degree_voc5'];
		$p_year_grad_voc5 = $_POST['p_year_grad_voc5'];
		$p_highest_grade_voc5 = $_POST['p_highest_grade_voc5'];
		$p_voc_attendance_from5 =$_POST['p_voc_attendance_from5'];
		$p_voc_attendance_to5 = $_POST['p_voc_attendance_to5'];
		$p_scholarship_voc5 = $_POST['p_scholarship_voc5'];
		  $level=$school_level['vocational'];
		 if(($p_voc_attendance_from5 =="" || $p_voc_attendance_to5 =="" ||$p_year_grad_voc5 =="")||($p_voc_attendance_from5 =="" && $p_voc_attendance_to5 =="" && $p_year_grad_voc5 =="")){
			$vocquery5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name5',degree_course='$p_degree_voc5',
			highest_grade_earned='$p_highest_grade_voc5',scholarship='$p_scholarship_voc5',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'"; 
			mysql_query($vocquery5)    or die(mysql_error());
		}else{
		$p_voc_attendance_from5 =strtotime($p_voc_attendance_from5);
		$p_voc_attendance_from5= date('Y-m-d',$p_voc_attendance_from5);
		$p_voc_attendance_to5 = strtotime($p_voc_attendance_to5);
		$p_voc_attendance_to5= date('Y-m-d',$p_voc_attendance_to5);
			$vocquery5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_voc_school_name5',degree_course='$p_degree_voc5',year_graduated='$p_year_grad_voc5',
			highest_grade_earned='$p_highest_grade_voc5',inclusive_date_att_from='$p_voc_attendance_from5',
			inclusive_date_att_to='$p_voc_attendance_to5',scholarship='$p_scholarship_voc4',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'"; 
			mysql_query($vocquery5)    or die(mysql_error()); 	
		}		
		}
		
		//declaration for college1
		if(isset($_POST['p_col1_school_name1'])){
		$p_col1_school_name1 = $_POST['p_col1_school_name1'];
		$p_degree_col11 = $_POST['p_degree_col11'];
		$p_year_grad_col11 = $_POST['p_year_grad_col11'];
		$p_highest_grade_col11 = $_POST['p_highest_grade_col11'];
		$p_col1_attendance_from1 = $_POST['p_col1_attendance_from1'];
		$p_col1_attendance_to1 =$_POST['p_col1_attendance_to1'];
		$p_scholarship_col11 = $_POST['p_scholarship_col11'];
		  $level=$school_level['college1'];
		 if(($p_col1_attendance_from1 =="" ||$p_col1_attendance_to1 =="" || $p_year_grad_col11="") || ($p_col1_attendance_from1 =="" && $p_col1_attendance_to1 =="" && $p_year_grad_col11="")){
			$col1query1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name1',degree_course='$p_degree_col11',highest_grade_earned='$p_highest_grade_col11',
			scholarship='$p_scholarship_col11',level='$level' WHERE emp_id='$emp_id' && level='$level && count='1'"; 
			mysql_query($col1query1)    or die(mysql_error()); 
		}else{
		$p_col1_attendance_from1 = strtotime($p_col1_attendance_from1);
		$p_col1_attendance_from1= date('Y-m-d',$p_col1_attendance_from1);
		$p_col1_attendance_to1 = strtotime($p_col1_attendance_to1);
		$p_col1_attendance_to1= date('Y-m-d',$p_col1_attendance_to1);
			$col1query1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name1',degree_course='$p_degree_col11',year_graduated='$p_year_grad_col11',
			highest_grade_earned='$p_highest_grade_col11',inclusive_date_att_from='$p_col1_attendance_from1',inclusive_date_att_to='$p_col1_attendance_to1',
			scholarship='$p_scholarship_col11',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'"; 
			mysql_query($col1query1)    or die(mysql_error()); 
			}
		}
		
		if(isset($_POST['p_col1_school_name2'])){
		$p_col1_school_name2 = $_POST['p_col1_school_name2'];
		$p_degree_col12 = $_POST['p_degree_col12'];
		$p_year_grad_col12 = $_POST['p_year_grad_col12'];
		$p_highest_grade_col12 = $_POST['p_highest_grade_col12'];
		$p_col1_attendance_from2= $_POST['p_col1_attendance_from2'];
		$p_col1_attendance_to2 =$_POST['p_col1_attendance_to2'];
		$p_scholarship_col12 = $_POST['p_scholarship_col12'];
		  $level=$school_level['college1'];
		 if(($p_col1_attendance_from2 =="" ||$p_col1_attendance_to2 =="" || $p_year_grad_col12="") || ($p_col1_attendance_from2 =="" && $p_col1_attendance_to2 =="" && $p_year_grad_col12="")){
			$col1query2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name2',degree_course='$p_degree_col12',highest_grade_earned='$p_highest_grade_col12',
			scholarship='$p_scholarship_col12',level='$level' WHERE emp_id='$emp_id' && level='$level && count='2'"; 
			mysql_query($col1query2)    or die(mysql_error()); 
		}else{
		$p_col1_attendance_from2 = strtotime($p_col1_attendance_from2);
		$p_col1_attendance_from2= date('Y-m-d',$p_col1_attendance_from2);
		$p_col1_attendance_to2 = strtotime($p_col1_attendance_to2);
		$p_col1_attendance_to2 = date('Y-m-d',$p_col1_attendance_to2);
			$col1query2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name2',degree_course='$p_degree_col12',year_graduated='$p_year_grad_col12',
			highest_grade_earned='$p_highest_grade_col12',inclusive_date_att_from='$p_col1_attendance_from2',inclusive_date_att_to='$p_col1_attendance_to2',
			scholarship='$p_scholarship_col12',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'"; 
			mysql_query($col1query2)    or die(mysql_error()); 
			}
		}
		
		if(isset($_POST['p_col1_school_name3'])){
		$p_col1_school_name = $_POST['p_col1_school_name3'];
		$p_degree_col13 = $_POST['p_degree_col13'];
		$p_year_grad_col13 = $_POST['p_year_grad_col13'];
		$p_highest_grade_col13 = $_POST['p_highest_grade_col13'];
		$p_col1_attendance_from3 = $_POST['p_col1_attendance_from3'];
		$p_col1_attendance_to3 =$_POST['p_col1_attendance_to3'];
		$p_scholarship_col13 = $_POST['p_scholarship_col13'];
		  $level=$school_level['college1'];
		 if(($p_col1_attendance_from3 =="" ||$p_col1_attendance_to3 =="" || $p_year_grad_col13="") || ($p_col1_attendance_from3 =="" && $p_col1_attendance_to3 =="" && $p_year_grad_col13="")){
			$col1query3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name3',degree_course='$p_degree_col13',highest_grade_earned='$p_highest_grade_col13',
			scholarship='$p_scholarship_col13',level='$level' WHERE emp_id='$emp_id' && level='$level && count='3'"; 
			mysql_query($col1query3)    or die(mysql_error()); 
		}else{
		$p_col1_attendance_from3 = strtotime($p_col1_attendance_from3);
		$p_col1_attendance_from3= date('Y-m-d',$p_col1_attendance_from3);
		$p_col1_attendance_to3 = strtotime($p_col1_attendance_to3);
		$p_col1_attendance_to3 = date('Y-m-d',$p_col1_attendance_to);
			$col1query3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name3',degree_course='$p_degree_col13',year_graduated='$p_year_grad_col13',
			highest_grade_earned='$p_highest_grade_col13',inclusive_date_att_from='$p_col1_attendance_from3',inclusive_date_att_to='$p_col1_attendance_to3',
			scholarship='$p_scholarship_col13',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'"; 
			mysql_query($col1query3)    or die(mysql_error()); 
			}
		}
		
		if(isset($_POST['p_col1_school_name4'])){
		$p_col1_school_name4 = $_POST['p_col1_school_name4'];
		$p_degree_col14 = $_POST['p_degree_col14'];
		$p_year_grad_col14 = $_POST['p_year_grad_col14'];
		$p_highest_grade_col14 = $_POST['p_highest_grade_col14'];
		$p_col1_attendance_from4 = $_POST['p_col1_attendance_from4'];
		$p_col1_attendance_to4 =$_POST['p_col1_attendance_to4'];
		$p_scholarship_col14 = $_POST['p_scholarship_col14'];
		  $level=$school_level['college1'];
		 if(($p_col1_attendance_from4 =="" ||$p_col1_attendance_to4 =="" || $p_year_grad_col14="") || ($p_col1_attendance_from4 =="" && $p_col1_attendance_to4 =="" && $p_year_grad_col14="")){
			$col1query4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name4',degree_course='$p_degree_col14',highest_grade_earned='$p_highest_grade_col14',
			scholarship='$p_scholarship_col14',level='$level' WHERE emp_id='$emp_id' && level='$level && count='4'"; 
			mysql_query($col1query4)    or die(mysql_error()); 
		}else{
		$p_col1_attendance_from4 = strtotime($p_col1_attendance_from4);
		$p_col1_attendance_from4= date('Y-m-d',$p_col1_attendance_from4);
		$p_col1_attendance_to4 = strtotime($p_col1_attendance_to4);
		$p_col1_attendance_to4 = date('Y-m-d',$p_col1_attendance_to4);
			$col1query4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name4',degree_course='$p_degree_col14',year_graduated='$p_year_grad_col14',
			highest_grade_earned='$p_highest_grade_col14',inclusive_date_att_from='$p_col1_attendance_from4',inclusive_date_att_to='$p_col1_attendance_to4',
			scholarship='$p_scholarship_col14',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'"; 
			mysql_query($col1query4)    or die(mysql_error()); 
			}
		}
	
		if(isset($_POST['p_col1_school_name5'])){
		$p_col1_school_name5 = $_POST['p_col1_school_name5'];
		$p_degree_col15 = $_POST['p_degree_col15'];
		$p_year_grad_col15 = $_POST['p_year_grad_col15'];
		$p_highest_grade_col15 = $_POST['p_highest_grade_col15'];
		$p_col1_attendance_from5 = $_POST['p_col1_attendance_from5'];
		$p_col1_attendance_to5 =$_POST['p_col1_attendance_to5'];
		$p_scholarship_col15 = $_POST['p_scholarship_col15'];
		  $level=$school_level['college1'];
		 if(($p_col1_attendance_from5 =="" ||$p_col1_attendance_to5 =="" || $p_year_grad_col15="") || ($p_col1_attendance_from5 =="" && $p_col1_attendance_to5 =="" && $p_year_grad_col15="")){
			$col1query5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name',degree_course='$p_degree_col1',highest_grade_earned='$p_highest_grade_col1',
			scholarship='$p_scholarship_col1',level='$level' WHERE emp_id='$emp_id' && level='$level && count='5'"; 
			mysql_query($col1query5)    or die(mysql_error()); 
		}else{
		$p_col1_attendance_from5 = strtotime($p_col1_attendance_from5);
		$p_col1_attendance_from5= date('Y-m-d',$p_col1_attendance_from5);
		$p_col1_attendance_to5 = strtotime($p_col1_attendance_to5);
		$p_col1_attendance_to5 = date('Y-m-d',$p_col1_attendance_to5);
			$col1query5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_col1_school_name5',degree_course='$p_degree_col15',year_graduated='$p_year_grad_col15',
			highest_grade_earned='$p_highest_grade_col15',inclusive_date_att_from='$p_col1_attendance_from5',inclusive_date_att_to='$p_col1_attendance_to5',
			scholarship='$p_scholarship_col15',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'"; 
			mysql_query($col1query5)    or die(mysql_error()); 
			}
		}
			//declaration for college2
		/*if(isset($_POST['p_col2_school_name'])){
		$p_col2_school_name = $_POST['p_col2_school_name'];
		$p_degree_col2 = $_POST['p_degree_col2'];
		$p_year_grad_col2 = $_POST['p_year_grad_col2'];
		$p_highest_grade_col2 = $_POST['p_highest_grade_col2'];
		$p_col2_attendance_from = $_POST['p_col2_attendance_from'];
		$p_col2_attendance_to = $_POST['p_col2_attendance_to'];
		$p_scholarship_col2 = $_POST['p_scholarship_col2'];
		$level=$school_level['college2'];
		if(($p_col2_attendance_from =="" ||$p_col2_attendance_to =="" || $p_year_grad_col2="") || ($p_col2_attendance_from =="" && $p_col2_attendance_to =="" && $p_year_grad_col2="")){
			$col2query ="UPDATE eis_educ_bg_t SET name_of_school='$p_col2_school_name',degree_course='$p_degree_col2',highest_grade_earned='$p_highest_grade_col2',scholarship='$p_scholarship_col2',level='$level' WHERE emp_id='$emp_id' && level='$level'"; 
			mysql_query($col2query)    or die(mysql_error()); 
		}else{
		$p_col2_attendance_from = strtotime($p_col2_attendance_from);
		$p_col2_attendance_from= date('Y-m-d',$p_col2_attendance_from);
		$p_col2_attendance_to = strtotime($p_col2_attendance_to);
		$p_col2_attendance_to = date('Y-m-d',$p_col2_attendance_to);
			$col2query ="UPDATE eis_educ_bg_t SET name_of_school='$p_col2_school_name',degree_course='$p_degree_col2',year_graduated='$p_year_grad_col2',highest_grade_earned='$p_highest_grade_col2',inclusive_date_att_from='$p_col2_attendance_from',inclusive_date_att_to='$p_col2_attendance_to',scholarship='$p_scholarship_col2',level='$level' WHERE emp_id='$emp_id' && level='$level'"; 
			mysql_query($col2query)    or die(mysql_error()); 
			}
		}*/
		
		//declaration for gs1
		if(isset($_POST['p_grad1_school_name1'])){
		$p_grad1_school_name1 = $_POST['p_grad1_school_name1'];
		$p_degree_grad11 = $_POST['p_degree_grad11'];
		$p_year_grad_grad11 = $_POST['p_year_grad_grad11'];
		$p_highest_grade_grad11 = $_POST['p_highest_grade_grad11'];
		$p_grad1_attendance_from1 = $_POST['p_grad1_attendance_from1'];
		$p_grad1_attendance_to1 = $_POST['p_grad1_attendance_to1'];
		$p_scholarship_grad11 = $_POST['p_scholarship_grad11'];
		  $level=$school_level['gs1'];
		if(($p_grad1_attendance_from1=="" || $p_grad1_attendance_to1=="" ||$p_year_grad_grad11 =="")||($p_grad1_attendance_from1=="" && $p_grad1_attendance_to1=="" && $p_year_grad_grad11 =="")){
		$gs1query1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name1',degree_course='$p_degree_grad11',highest_grade_earned='$p_highest_grade_grad11',
		scholarship='$p_scholarship_grad11',level='$level'  WHERE emp_id='$emp_id' && level='$level' && count='1'";  
		mysql_query($gs1query1)    or die(mysql_error());
		}else{
		$p_grad1_attendance_from1 = strtotime($p_grad1_attendance_from1);
		$p_grad1_attendance_from1 = date('Y-m-d',$p_grad1_attendance_from1);
		$p_grad1_attendance_to1 =strtotime($p_grad1_attendance_to1);
		$p_grad1_attendance_to1 = date('Y-m-d',$p_grad1_attendance_to1);
		$gs1query1 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name1',degree_course='$p_degree_grad11',year_graduated='$p_year_grad_grad11',
		highest_grade_earned='$p_highest_grade_grad11',inclusive_date_att_from='$p_grad1_attendance_from1',inclusive_date_att_to='$p_grad1_attendance_to1',
		scholarship='$p_scholarship_grad11',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='1'";  
		mysql_query($gs1query1)    or die(mysql_error());	
		}
		}
		
		if(isset($_POST['p_grad1_school_name2'])){
		$p_grad1_school_name2 = $_POST['p_grad1_school_name2'];
		$p_degree_grad12 = $_POST['p_degree_grad12'];
		$p_year_grad_grad12 = $_POST['p_year_grad_grad12'];
		$p_highest_grade_grad12 = $_POST['p_highest_grade_grad12'];
		$p_grad1_attendance_from2 = $_POST['p_grad1_attendance_from2'];
		$p_grad1_attendance_to2 = $_POST['p_grad1_attendance_to2'];
		$p_scholarship_grad12 = $_POST['p_scholarship_grad12'];
		  $level=$school_level['gs1'];
		if(($p_grad1_attendance_from2=="" || $p_grad1_attendance_to2=="" ||$p_year_grad_grad12 =="")||($p_grad1_attendance_from2=="" && $p_grad1_attendance_to2=="" && $p_year_grad_grad12 =="")){
		$gs1query2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name2',degree_course='$p_degree_grad12',highest_grade_earned='$p_highest_grade_grad12',
		scholarship='$p_scholarship_grad12',level='$level'  WHERE emp_id='$emp_id' && level='$level' && count='2'";  
		mysql_query($gs1query2)    or die(mysql_error());
		}else{
		$p_grad1_attendance_from2 = strtotime($p_grad1_attendance_from2);
		$p_grad1_attendance_from2 = date('Y-m-d',$p_grad1_attendance_from2);
		$p_grad1_attendance_to2 =strtotime($p_grad1_attendance_to2);
		$p_grad1_attendance_to2 = date('Y-m-d',$p_grad1_attendance_to2);
		$gs1query2 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name2',degree_course='$p_degree_grad12',year_graduated='$p_year_grad_grad12',
		highest_grade_earned='$p_highest_grade_grad12',inclusive_date_att_from='$p_grad1_attendance_from2',inclusive_date_att_to='$p_grad1_attendance_to2',
		scholarship='$p_scholarship_grad12',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='2'";  
		mysql_query($gs1query2)    or die(mysql_error());	
		}
		}
		if(isset($_POST['p_grad1_school_name3'])){
		$p_grad1_school_name3 = $_POST['p_grad1_school_name3'];
		$p_degree_grad13 = $_POST['p_degree_grad13'];
		$p_year_grad_grad13 = $_POST['p_year_grad_grad13'];
		$p_highest_grade_grad13 = $_POST['p_highest_grade_grad13'];
		$p_grad1_attendance_from3 = $_POST['p_grad1_attendance_from3'];
		$p_grad1_attendance_to3 = $_POST['p_grad1_attendance_to3'];
		$p_scholarship_grad13 = $_POST['p_scholarship_grad13'];
		  $level=$school_level['gs1'];
		if(($p_grad1_attendance_from3=="" || $p_grad1_attendance_to3=="" ||$p_year_grad_grad13 =="")||($p_grad1_attendance_from3=="" && $p_grad1_attendance_to3=="" && $p_year_grad_grad13 =="")){
		$gs1query3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name3',degree_course='$p_degree_grad13',highest_grade_earned='$p_highest_grade_grad13',
		scholarship='$p_scholarship_grad13',level='$level'  WHERE emp_id='$emp_id' && level='$level' && count='3'";  
		mysql_query($gs1query3)    or die(mysql_error());
		}else{
		$p_grad1_attendance_from3 = strtotime($p_grad1_attendance_from3);
		$p_grad1_attendance_from3 = date('Y-m-d',$p_grad1_attendance_from3);
		$p_grad1_attendance_to3 =strtotime($p_grad1_attendance_to3);
		$p_grad1_attendance_to3 = date('Y-m-d',$p_grad1_attendance_to3);
		$gs1query3 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name3',degree_course='$p_degree_grad13',year_graduated='$p_year_grad_grad13',
		highest_grade_earned='$p_highest_grade_grad13',inclusive_date_att_from='$p_grad1_attendance_from3',inclusive_date_att_to='$p_grad1_attendance_to3',
		scholarship='$p_scholarship_grad13',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='3'";  
		mysql_query($gs1query3)    or die(mysql_error());	
		}
		}
		
		if(isset($_POST['p_grad1_school_name4'])){
		$p_grad1_school_name4 = $_POST['p_grad1_school_name'];
		$p_degree_grad14 = $_POST['p_degree_grad1'];
		$p_year_grad_grad14 = $_POST['p_year_grad_grad1'];
		$p_highest_grade_grad14 = $_POST['p_highest_grade_grad1'];
		$p_grad1_attendance_from4 = $_POST['p_grad1_attendance_from'];
		$p_grad1_attendance_to4 = $_POST['p_grad1_attendance_to'];
		$p_scholarship_grad14 = $_POST['p_scholarship_grad1'];
		  $level=$school_level['gs1'];
		if(($p_grad1_attendance_from4=="" || $p_grad1_attendance_to4=="" ||$p_year_grad_grad14 =="")||($p_grad1_attendance_from4=="" && $p_grad1_attendance_to4=="" && $p_year_grad_grad14 =="")){
		$gs1query4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name4',degree_course='$p_degree_grad14',highest_grade_earned='$p_highest_grade_grad14',
		scholarship='$p_scholarship_grad14',level='$level'  WHERE emp_id='$emp_id' && level='$level' && count='4'";  
		mysql_query($gs1query4)    or die(mysql_error());
		}else{
		$p_grad1_attendance_from4 = strtotime($p_grad1_attendance_from4);
		$p_grad1_attendance_from4 = date('Y-m-d',$p_grad1_attendance_from4);
		$p_grad1_attendance_to4 =strtotime($p_grad1_attendance_to4);
		$p_grad1_attendance_to4 = date('Y-m-d',$p_grad1_attendance_to4);
		$gs1query4 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name4',degree_course='$p_degree_grad14',year_graduated='$p_year_grad_grad14',
		highest_grade_earned='$p_highest_grade_grad14',inclusive_date_att_from='$p_grad1_attendance_from4',inclusive_date_att_to='$p_grad1_attendance_to4',
		scholarship='$p_scholarship_grad14',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='4'";  
		mysql_query($gs1query4)    or die(mysql_error());	
		}
		}
		
		if(isset($_POST['p_grad1_school_name5'])){
		$p_grad1_school_name5 = $_POST['p_grad1_school_name5'];
		$p_degree_grad15 = $_POST['p_degree_grad15'];
		$p_year_grad_grad15 = $_POST['p_year_grad_grad15'];
		$p_highest_grade_grad15 = $_POST['p_highest_grade_grad15'];
		$p_grad1_attendance_from5 = $_POST['p_grad1_attendance_from5'];
		$p_grad1_attendance_to5 = $_POST['p_grad1_attendance_to5'];
		$p_scholarship_grad15 = $_POST['p_scholarship_grad15'];
		  $level=$school_level['gs1'];
		if(($p_grad1_attendance_from5=="" || $p_grad1_attendance_to5=="" ||$p_year_grad_grad15 =="")||($p_grad1_attendance_from5=="" && $p_grad1_attendance_to5=="" && $p_year_grad_grad15 =="")){
		$gs1query5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name5',degree_course='$p_degree_grad15',highest_grade_earned='$p_highest_grade_grad15',
		scholarship='$p_scholarship_grad15',level='$level'  WHERE emp_id='$emp_id' && level='$level' && count='5'";  
		mysql_query($gs1query5)    or die(mysql_error());
		}else{
		$p_grad1_attendance_from5 = strtotime($p_grad1_attendance_from5);
		$p_grad1_attendance_from5 = date('Y-m-d',$p_grad1_attendance_from5);
		$p_grad1_attendance_to5 =strtotime($p_grad1_attendance_to5);
		$p_grad1_attendance_to5 = date('Y-m-d',$p_grad1_attendance_to5);
		$gs1query5 ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad1_school_name5',degree_course='$p_degree_grad1',year_graduated='$p_year_grad_grad15',
		highest_grade_earned='$p_highest_grade_grad15',inclusive_date_att_from='$p_grad1_attendance_from5',inclusive_date_att_to='$p_grad1_attendance_to5',
		scholarship='$p_scholarship_grad15',level='$level' WHERE emp_id='$emp_id' && level='$level' && count='5'";  
		mysql_query($gs1query5)    or die(mysql_error());	
		}
		}
		//declaration for gs2
		/*if(isset($_POST['p_grad2_school_name'])){
		$p_grad2_school_name = $_POST['p_grad2_school_name'];
		$p_degree_grad2 = $_POST['p_degree_grad2'];
		$p_year_grad_grad2 = $_POST['p_year_grad_grad2'];
		$p_highest_grade_grad2 = $_POST['p_highest_grade_grad2'];
		$p_grad2_attendance_from =$_POST['p_grad2_attendance_from'];
		$p_grad2_attendance_to =$_POST['p_grad2_attendance_to'];
		$p_scholarship_grad2 = $_POST['p_scholarship_grad2'];		
		$level=$school_level['gs2'];
		if(($p_grad2_attendance_from=="" || $p_grad2_attendance_to=="" ||$p_year_grad_grad2 =="")||($p_grad2_attendance_from=="" && $p_grad2_attendance_to=="" && $p_year_grad_grad2 =="")){
		$gs2query ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad2_school_name',degree_course='$p_degree_grad2',highest_grade_earned='$p_highest_grade_grad2',scholarship='$p_scholarship_grad2',level='$level'  WHERE emp_id='$emp_id' && level='$level'";  
		mysql_query($gs2query)    or die(mysql_error());
		}else{
		$p_grad2_attendance_from = strtotime($p_grad2_attendance_from);
		$p_grad2_attendance_from = date('Y-m-d',$p_grad2_attendance_from);
		$p_grad2_attendance_to =strtotime($p_grad2_attendance_to);
		$p_grad2_attendance_to = date('Y-m-d',$p_grad2_attendance_to);
		$gs2query ="UPDATE eis_educ_bg_t SET name_of_school='$p_grad2_school_name',degree_course='$p_degree_grad2',year_graduated='$p_year_grad_grad2',highest_grade_earned='$p_highest_grade_grad2',inclusive_date_att_from='$p_grad2_attendance_from',inclusive_date_att_to='$p_grad2_attendance_to',scholarship='$p_scholarship_grad2',level='$level' WHERE emp_id='$emp_id' && level='$level'";  
		mysql_query($gs2query)    or die(mysql_error());	
		}		
		}*/
	  
		   //civil service eligibility
		   //declaration of career service 1
		   if(isset($_POST['p_career_service_1'])){
		$p_career_service_1 = $_POST['p_career_service_1'];
		$p_career_rating_1 = $_POST['p_career_rating_1'];
		$p_date_exam1 =$_POST['p_date_exam1'];
		$p_place_exam1 = $_POST['p_place_exam1'];
		$p_license_no1 = $_POST['p_license_no1'];
		$p_license_date_rel1 = $_POST['p_license_date_rel1'];
	  //civil service elgibility to database
		if(($p_date_exam1 =="" || $p_license_date_rel1 =="") ||($p_date_exam1 =="" && $p_license_date_rel1 =="")){
		$career1query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_1',rating='$p_career_rating_1',place_of_exam='$p_place_exam1',license_no='$p_license_no1' WHERE emp_id='$emp_id' && count='$count1'";
		mysql_query($career1query) or die(mysql_error());
		}else{
		$p_date_exam1 = strtotime($p_date_exam1);
		$p_date_exam1 = date('Y-m-d',$p_date_exam1);
		$p_license_date_rel1 =strtotime($p_license_date_rel1);
		$p_license_date_rel1 = date('Y-m-d',$p_license_date_rel1);
		$career1query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_1',rating='$p_career_rating_1',date_of_exam='$p_date_exam1',place_of_exam='$p_place_exam1',license_no='$p_license_no1',license_date_release='$p_license_date_rel1'  WHERE emp_id='$emp_id'&& count='$count1'";
		mysql_query($career1query) or die(mysql_error());
		}
		   }
		 //declaration of career service 2
		  if(isset($_POST['p_career_service_2'])){
		$p_career_service_2 = $_POST['p_career_service_2'];
		$p_career_rating_2 = $_POST['p_career_rating_2'];
		$p_date_exam2 =$_POST['p_date_exam2'];
		$p_place_exam2 = $_POST['p_place_exam2'];
		$p_license_no2 = $_POST['p_license_no2'];
		$p_license_date_rel2 = $_POST['p_license_date_rel2'];
	  //civil service elgibility to database
		if(($p_date_exam2 =="" || $p_license_date_rel2 =="") ||($p_date_exam2 =="" && $p_license_date_rel2 =="")){
		$career2query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_2',rating='$p_career_rating_2',place_of_exam='$p_place_exam2',license_no='$p_license_no2' WHERE emp_id='$emp_id' && count='$count2'";
		mysql_query($career2query) or die(mysql_error());
		}else{
		$p_date_exam2 = strtotime($p_date_exam2);
		$p_date_exam2 = date('Y-m-d',$p_date_exam2);
		$p_license_date_rel2 =strtotime($p_license_date_rel2);
		$p_license_date_rel2 = date('Y-m-d',$p_license_date_rel2);
		$career2query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_2',rating='$p_career_rating_2',date_of_exam='$p_date_exam2',place_of_exam='$p_place_exam2',license_no='$p_license_no2',license_date_release='$p_license_date_rel2'  WHERE emp_id='$emp_id' && count='$count2'";
		mysql_query($career2query) or die(mysql_error());
		}
		  }
		 //declaration of career service 3
		 if(isset($_POST['p_career_service_3'])){
		$p_career_service_3 = $_POST['p_career_service_3'];
		$p_career_rating_3 = $_POST['p_career_rating_3'];
		$p_date_exam3 =$_POST['p_date_exam3'];
		$p_place_exam3 = $_POST['p_place_exam3'];
		$p_license_no3 = $_POST['p_license_no3'];
		$p_license_date_rel3 = $_POST['p_license_date_rel3'];
	  //civil service elgibility to database
		if(($p_date_exam3 =="" || $p_license_date_rel3 =="") ||($p_date_exam3 =="" && $p_license_date_rel3 =="")){
		$career3query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_3',rating='$p_career_rating_3',place_of_exam='$p_place_exam3',license_no='$p_license_no3' WHERE emp_id='$emp_id' && count='$count3'";
		mysql_query($career3query) or die(mysql_error());
		}else{
		$p_date_exam3 = strtotime($p_date_exam3);
		$p_date_exam3 = date('Y-m-d',$p_date_exam3);
		$p_license_date_rel3 =strtotime($p_license_date_rel3);
		$p_license_date_rel3 = date('Y-m-d',$p_license_date_rel3);
		$career3query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_3',rating='$p_career_rating_3',date_of_exam='$p_date_exam3',place_of_exam='$p_place_exam3',license_no='$p_license_no3',license_date_release='$p_license_date_rel3'  WHERE emp_id='$emp_id' && count='$count3'";
		mysql_query($career3query) or die(mysql_error());
		}
		 }
		 //declaration of career service 4
		 if(isset($_POST['p_career_service_4'])){
		$p_career_service_4 = $_POST['p_career_service_4'];
		$p_career_rating_4 = $_POST['p_career_rating_4'];
		$p_date_exam4 =$_POST['p_date_exam4'];
		$p_place_exam4 = $_POST['p_place_exam4'];
		$p_license_no4 = $_POST['p_license_no4'];
		$p_license_date_rel4 = $_POST['p_license_date_rel4'];
	  //civil service elgibility to database
		if(($p_date_exam4 =="" || $p_license_date_rel4 =="") ||($p_date_exam4 =="" && $p_license_date_rel4 =="")){
		$career4query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_4',rating='$p_career_rating_4',place_of_exam='$p_place_exam4',license_no='$p_license_no4' WHERE emp_id='$emp_id' && count='$count4'";
		mysql_query($career4query) or die(mysql_error());
		}else{
		$p_date_exam4 = strtotime($p_date_exam4);
		$p_date_exam4 = date('Y-m-d',$p_date_exam4);
		$p_license_date_rel4 =strtotime($p_license_date_rel4);
		$p_license_date_rel4 = date('Y-m-d',$p_license_date_rel4);
		$career4query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_4',rating='$p_career_rating_4',date_of_exam='$p_date_exam4',place_of_exam='$p_place_exam4',license_no='$p_license_no4',license_date_release='$p_license_date_rel4'  WHERE emp_id='$emp_id' && count='$count4'";
		mysql_query($career4query) or die(mysql_error());
		}
		 }
		 //declaration of career service 5
		 if(isset($_POST['p_career_service_5'])){
		$p_career_service_5 = $_POST['p_career_service_5'];
		$p_career_rating_5 = $_POST['p_career_rating_5'];
		$p_date_exam5 =$_POST['p_date_exam5'];
		$p_place_exam5 = $_POST['p_place_exam5'];
		$p_license_no5 = $_POST['p_license_no5'];
		$p_license_date_rel5 = $_POST['p_license_date_rel5'];
	  //civil service elgibility to database
		if(($p_date_exam5 =="" || $p_license_date_rel5 =="") ||($p_date_exam5 =="" && $p_license_date_rel5 =="")){
		$career5query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_5',rating='$p_career_rating_5',place_of_exam='$p_place_exam5',license_no='$p_license_no5' WHERE emp_id='$emp_id' && count='$count5'";
		mysql_query($career5query) or die(mysql_error());
		}else{
		$p_date_exam5 = strtotime($p_date_exam5);
		$p_date_exam5 = date('Y-m-d',$p_date_exam5);
		$p_license_date_rel5 =strtotime($p_license_date_rel5);
		$p_license_date_rel5 = date('Y-m-d',$p_license_date_rel5);
		$career5query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_5',rating='$p_career_rating_5',date_of_exam='$p_date_exam5',place_of_exam='$p_place_exam5',license_no='$p_license_no5',license_date_release='$p_license_date_rel5'  WHERE emp_id='$emp_id' && count='$count5'";
		mysql_query($career5query) or die(mysql_error());
		}
		 }
		 //declaration of career service 6
		 if(isset($_POST['p_career_service_6'])){
		$p_career_service_6 = $_POST['p_career_service_6'];
		$p_career_rating_6 = $_POST['p_career_rating_6'];
		$p_date_exam6 =$_POST['p_date_exam6'];
		$p_place_exam6 = $_POST['p_place_exam6'];
		$p_license_no6 = $_POST['p_license_no6'];
		$p_license_date_rel6 = $_POST['p_license_date_rel6'];
	  //civil service elgibility to database
		if(($p_date_exam6 =="" || $p_license_date_rel6 =="") ||($p_date_exam6 =="" && $p_license_date_rel6 =="")){
		$career6query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_6',rating='$p_career_rating_6',place_of_exam='$p_place_exam6',license_no='$p_license_no6' WHERE emp_id='$emp_id' && count='$count6'";
		mysql_query($career6query) or die(mysql_error());
		}else{
		$p_date_exam6 = strtotime($p_date_exam6);
		$p_date_exam6 = date('Y-m-d',$p_date_exam6);
		$p_license_date_rel6 =strtotime($p_license_date_rel6);
		$p_license_date_rel6 = date('Y-m-d',$p_license_date_rel6);
		$career6query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_6',rating='$p_career_rating_6',date_of_exam='$p_date_exam6',place_of_exam='$p_place_exam6',license_no='$p_license_no6',license_date_release='$p_license_date_rel6'  WHERE emp_id='$emp_id' && count='$count6'";
		mysql_query($career6query) or die(mysql_error());
		}
		 }
		 //declaration of career service 7
		 if(isset($_POST['p_career_service_7'])){
		$p_career_service_7 = $_POST['p_career_service_7'];
		$p_career_rating_7 = $_POST['p_career_rating_7'];
		$p_date_exam7 =$_POST['p_date_exam7'];
		$p_place_exam7 = $_POST['p_place_exam7'];
		$p_license_no7 = $_POST['p_license_no7'];
		$p_license_date_rel7 = $_POST['p_license_date_rel7'];
	  //civil service elgibility to database
		if(($p_date_exam7 =="" || $p_license_date_rel7 =="") ||($p_date_exam7 =="" && $p_license_date_rel7 =="")){
		$career7query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_7',rating='$p_career_rating_7',place_of_exam='$p_place_exam7',license_no='$p_license_no7' WHERE emp_id='$emp_id' && count='$count7'";
		mysql_query($career7query) or die(mysql_error());
		}else{
		$p_date_exam7 = strtotime($p_date_exam7);
		$p_date_exam7 = date('Y-m-d',$p_date_exam7);
		$p_license_date_rel7 =strtotime($p_license_date_rel7);
		$p_license_date_rel7 = date('Y-m-d',$p_license_date_rel7);
		$career7query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_7',rating='$p_career_rating_7',date_of_exam='$p_date_exam7',place_of_exam='$p_place_exam7',license_no='$p_license_no7',license_date_release='$p_license_date_rel7'  WHERE emp_id='$emp_id' && count='$count7'";
		mysql_query($career7query) or die(mysql_error());
		}
		 }
		 //declaration of career service 8
		 if(isset($_POST['p_career_service_8'])){
		$p_career_service_8 = $_POST['p_career_service_8'];
		$p_career_rating_8 = $_POST['p_career_rating_8'];
		$p_date_exam8 =$_POST['p_date_exam8'];
		$p_place_exam8 = $_POST['p_place_exam8'];
		$p_license_no8 = $_POST['p_license_no8'];
		$p_license_date_rel8 = $_POST['p_license_date_rel8'];
	  //civil service elgibility to database
		if(($p_date_exam8 =="" || $p_license_date_rel8 =="") ||($p_date_exam8 =="" && $p_license_date_rel8 =="")){
		$career8query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_8',rating='$p_career_rating_8',place_of_exam='$p_place_exam8',license_no='$p_license_no8' WHERE emp_id='$emp_id' && count='$count8'";
		mysql_query($career8query) or die(mysql_error());
		}else{
		$p_date_exam8 = strtotime($p_date_exam8);
		$p_date_exam8 = date('Y-m-d',$p_date_exam8);
		$p_license_date_rel8 =strtotime($p_license_date_rel8);
		$p_license_date_rel8 = date('Y-m-d',$p_license_date_rel8);
		$career8query ="UPDATE eis_civ_service_t SET career_service='$p_career_service_8',rating='$p_career_rating_8',date_of_exam='$p_date_exam8',place_of_exam='$p_place_exam8',license_no='$p_license_no8',license_date_release='$p_license_date_rel8'  WHERE emp_id='$emp_id' && count='$count8'";
		mysql_query($career8query) or die(mysql_error());
		}
		 }
		
	
	//work experience
	//declaration for work experience 1
	 if(isset($_POST['p_work_pos_title1'])){
	$p_work_date_from1=$_POST['p_work_date_from1'];
	$p_work_date_to1 =$_POST['p_work_date_to1'];
	$p_work_pos_title1 = $_POST['p_work_pos_title1'];
	$p_work_agency1 = $_POST['p_work_agency1'];
	$p_work_mon_salary1 = $_POST['p_work_mon_salary1'];
	$p_work_salary_grade1 = $_POST['p_work_salary_grade1'];
	$p_work_status_appoint1 = $_POST['p_work_status_appoint1'];
	$p_gov_service1 = $_POST['p_gov_service1'];
	//work experience to db
	if(($p_work_date_from1 == ""|| $p_work_date_to1 =="" || $p_work_mon_salary1 =="")||($p_work_date_from1 == "" && $p_work_date_to1 =="" && $p_work_mon_salary1 =="")){
			$work_query1 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title1',dept_agency_office_company='$p_work_agency1',salary_grade_and_step_inc='$p_work_salary_grade1',status_of_appointment='$p_work_status_appoint1',govt_service='$p_gov_service1' WHERE emp_id='$emp_id' && count='$count1'";		
			mysql_query($work_query1)    or die(mysql_error());
			}else{
			$p_work_date_from1 = strtotime($p_work_date_from1);
			$p_work_date_from1 = date('Y-m-d',$p_work_date_from1);
			$p_work_date_to1 = strtotime($p_work_date_to1);
			$p_work_date_to1 = date('Y-m-d',$p_work_date_to1);
			$work_query1 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from1',inclusive_date_to='$p_work_date_to1',position_title='$p_work_pos_title1',dept_agency_office_company='$p_work_agency1',monthly_salary='$p_work_mon_salary1',salary_grade_and_step_inc='$p_work_salary_grade1',status_of_appointment='$p_work_status_appoint1',govt_service='$p_gov_service1' WHERE emp_id='$emp_id' && count='$count1'";		
			mysql_query($work_query1)    or die(mysql_error());
			}
	 }
			//declaration for work experience 2
	if(isset($_POST['p_work_pos_title2'])){
	$p_work_date_from2=$_POST['p_work_date_from2'];
	$p_work_date_to2 =$_POST['p_work_date_to2'];
	$p_work_pos_title2 = $_POST['p_work_pos_title2'];
	$p_work_agency2 = $_POST['p_work_agency2'];
	$p_work_mon_salary2 = $_POST['p_work_mon_salary2'];
	$p_work_salary_grade2 = $_POST['p_work_salary_grade2'];
	$p_work_status_appoint2 = $_POST['p_work_status_appoint2'];
	$p_gov_service2 = $_POST['p_gov_service2'];
	//work experience to db
	if(($p_work_date_from2 == ""|| $p_work_date_to2 =="" || $p_work_mon_salary2 =="")||($p_work_date_from2 == "" && $p_work_date_to2 =="" && $p_work_mon_salary2 =="")){
			$work_query2 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title2',dept_agency_office_company='$p_work_agency2',salary_grade_and_step_inc='$p_work_salary_grade2',status_of_appointment='$p_work_status_appoint2',govt_service='$p_gov_service2' WHERE emp_id='$emp_id' && count='$count2'";		
			mysql_query($work_query2)    or die(mysql_error());
			}else{
			$p_work_date_from2 = strtotime($p_work_date_from2);
			$p_work_date_from2 = date('Y-m-d',$p_work_date_from2);
			$p_work_date_to2 = strtotime($p_work_date_to2);
			$p_work_date_to2 = date('Y-m-d',$p_work_date_to2);
			$work_query2 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from2',inclusive_date_to='$p_work_date_to2',position_title='$p_work_pos_title2',dept_agency_office_company='$p_work_agency2',monthly_salary='$p_work_mon_salary2',salary_grade_and_step_inc='$p_work_salary_grade2',status_of_appointment='$p_work_status_appoint2',govt_service='$p_gov_service2' WHERE emp_id='$emp_id' && count='$count2'";		
			mysql_query($work_query2)    or die(mysql_error());
			}
	}
			//declaration for work experience 3
	if(isset($_POST['p_work_pos_title3'])){
	$p_work_date_from3=$_POST['p_work_date_from3'];
	$p_work_date_to3 =$_POST['p_work_date_to3'];
	$p_work_pos_title3 = $_POST['p_work_pos_title3'];
	$p_work_agency3 = $_POST['p_work_agency3'];
	$p_work_mon_salary3 = $_POST['p_work_mon_salary3'];
	$p_work_salary_grade3 = $_POST['p_work_salary_grade3'];
	$p_work_status_appoint3 = $_POST['p_work_status_appoint3'];
	$p_gov_service3 = $_POST['p_gov_service3'];
	//work experience to db
	if(($p_work_date_from3 == ""|| $p_work_date_to3 =="" || $p_work_mon_salary3 =="")||($p_work_date_from3 == "" && $p_work_date_to3 =="" && $p_work_mon_salary3 =="")){
			$work_query3 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title3',dept_agency_office_company='$p_work_agency3',salary_grade_and_step_inc='$p_work_salary_grade3',status_of_appointment='$p_work_status_appoint3',govt_service='$p_gov_service3' WHERE emp_id='$emp_id' && count='$count3'";		
			mysql_query($work_query3)    or die(mysql_error());
			}else{
			$p_work_date_from3 = strtotime($p_work_date_from3);
			$p_work_date_from3 = date('Y-m-d',$p_work_date_from3);
			$p_work_date_to3 = strtotime($p_work_date_to3);
			$p_work_date_to3 = date('Y-m-d',$p_work_date_to3);
			$work_query3 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from3',inclusive_date_to='$p_work_date_to3',position_title='$p_work_pos_title3',dept_agency_office_company='$p_work_agency3',monthly_salary='$p_work_mon_salary3',salary_grade_and_step_inc='$p_work_salary_grade3',status_of_appointment='$p_work_status_appoint3',govt_service='$p_gov_service3' WHERE emp_id='$emp_id' && count='$count3'";		
			mysql_query($work_query3)    or die(mysql_error());
			}
	}
			//declaration for work experience 4
	if(isset($_POST['p_work_pos_title4'])){
	$p_work_date_from4=$_POST['p_work_date_from4'];
	$p_work_date_to4 =$_POST['p_work_date_to4'];
	$p_work_pos_title4 = $_POST['p_work_pos_title4'];
	$p_work_agency4 = $_POST['p_work_agency4'];
	$p_work_mon_salary4 = $_POST['p_work_mon_salary4'];
	$p_work_salary_grade4 = $_POST['p_work_salary_grade4'];
	$p_work_status_appoint4 = $_POST['p_work_status_appoint4'];
	$p_gov_service4 = $_POST['p_gov_service4'];
	//work experience to db
	if(($p_work_date_from4 == ""|| $p_work_date_to4 =="" || $p_work_mon_salary4 =="")||($p_work_date_from4 == "" && $p_work_date_to4 =="" && $p_work_mon_salary4 =="")){
			$work_query4 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title4',dept_agency_office_company='$p_work_agency4',salary_grade_and_step_inc='$p_work_salary_grade4',status_of_appointment='$p_work_status_appoint4',govt_service='$p_gov_service4' WHERE emp_id='$emp_id' && count='$count4'";		
			mysql_query($work_query4)    or die(mysql_error());
			}else{
			$p_work_date_from4 = strtotime($p_work_date_from4);
			$p_work_date_from4 = date('Y-m-d',$p_work_date_from4);
			$p_work_date_to4 = strtotime($p_work_date_to4);
			$p_work_date_to4 = date('Y-m-d',$p_work_date_to4);
			$work_query4 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from4',inclusive_date_to='$p_work_date_to4',position_title='$p_work_pos_title4',dept_agency_office_company='$p_work_agency4',monthly_salary='$p_work_mon_salary4',salary_grade_and_step_inc='$p_work_salary_grade4',status_of_appointment='$p_work_status_appoint4',govt_service='$p_gov_service4' WHERE emp_id='$emp_id' && count='$count4'";		
			mysql_query($work_query4)    or die(mysql_error());
			}
	}
			//declaration for work experience 5
	if(isset($_POST['p_work_pos_title5'])){
	$p_work_date_from5=$_POST['p_work_date_from5'];
	$p_work_date_to5 =$_POST['p_work_date_to5'];
	$p_work_pos_title5 = $_POST['p_work_pos_title5'];
	$p_work_agency5 = $_POST['p_work_agency5'];
	$p_work_mon_salary5 = $_POST['p_work_mon_salary5'];
	$p_work_salary_grade5 = $_POST['p_work_salary_grade5'];
	$p_work_status_appoint5 = $_POST['p_work_status_appoint5'];
	$p_gov_service5 = $_POST['p_gov_service5'];
	//work experience to db
	if(($p_work_date_from5 == ""|| $p_work_date_to5 =="" || $p_work_mon_salary5 =="")||($p_work_date_from5 == "" && $p_work_date_to5 =="" && $p_work_mon_salary5 =="")){
			$work_query5 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title5',dept_agency_office_company='$p_work_agency5',salary_grade_and_step_inc='$p_work_salary_grade5',status_of_appointment='$p_work_status_appoint5',govt_service='$p_gov_service5' WHERE emp_id='$emp_id' && count='$count5'";		
			mysql_query($work_query5)    or die(mysql_error());
			}else{
			$p_work_date_from5 = strtotime($p_work_date_from5);
			$p_work_date_from5 = date('Y-m-d',$p_work_date_from5);
			$p_work_date_to5 = strtotime($p_work_date_to5);
			$p_work_date_to5 = date('Y-m-d',$p_work_date_to5);
			$work_query5 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from5',inclusive_date_to='$p_work_date_to5',position_title='$p_work_pos_title5',dept_agency_office_company='$p_work_agency5',monthly_salary='$p_work_mon_salary5',salary_grade_and_step_inc='$p_work_salary_grade5',status_of_appointment='$p_work_status_appoint5',govt_service='$p_gov_service5' WHERE emp_id='$emp_id' && count='$count5'";		
			mysql_query($work_query5)    or die(mysql_error());
			}
	}
			//declaration for work experience 6
	if(isset($_POST['p_work_pos_title6'])){
	$p_work_date_from6=$_POST['p_work_date_from6'];
	$p_work_date_to6 =$_POST['p_work_date_to6'];
	$p_work_pos_title6 = $_POST['p_work_pos_title6'];
	$p_work_agency6 = $_POST['p_work_agency6'];
	$p_work_mon_salary6 = $_POST['p_work_mon_salary6'];
	$p_work_salary_grade6 = $_POST['p_work_salary_grade6'];
	$p_work_status_appoint6 = $_POST['p_work_status_appoint6'];
	$p_gov_service6 = $_POST['p_gov_service6'];
	//work experience to db
	if(($p_work_date_from6 == ""|| $p_work_date_to6 =="" || $p_work_mon_salary6 =="")||($p_work_date_from6 == "" && $p_work_date_to6 =="" && $p_work_mon_salary6 =="")){
			$work_query6 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title6',dept_agency_office_company='$p_work_agency6',salary_grade_and_step_inc='$p_work_salary_grade6',status_of_appointment='$p_work_status_appoint6',govt_service='$p_gov_service6' WHERE emp_id='$emp_id' && count='$count6'";		
			mysql_query($work_query6)    or die(mysql_error());
			}else{
			$p_work_date_from6 = strtotime($p_work_date_from6);
			$p_work_date_from6 = date('Y-m-d',$p_work_date_from6);
			$p_work_date_to6 = strtotime($p_work_date_to6);
			$p_work_date_to6 = date('Y-m-d',$p_work_date_to6);
			$work_query6 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from6',inclusive_date_to='$p_work_date_to6',position_title='$p_work_pos_title6',dept_agency_office_company='$p_work_agency6',monthly_salary='$p_work_mon_salary6',salary_grade_and_step_inc='$p_work_salary_grade6',status_of_appointment='$p_work_status_appoint6',govt_service='$p_gov_service6' WHERE emp_id='$emp_id' && count='$count6'";		
			mysql_query($work_query6)    or die(mysql_error());
			}
	}
			//declaration for work experience 7
	if(isset($_POST['p_work_pos_title7'])){
	$p_work_date_from7=$_POST['p_work_date_from7'];
	$p_work_date_to7 =$_POST['p_work_date_to7'];
	$p_work_pos_title7 = $_POST['p_work_pos_title7'];
	$p_work_agency7 = $_POST['p_work_agency7'];
	$p_work_mon_salary7 = $_POST['p_work_mon_salary7'];
	$p_work_salary_grade7 = $_POST['p_work_salary_grade7'];
	$p_work_status_appoint7 = $_POST['p_work_status_appoint7'];
	$p_gov_service7 = $_POST['p_gov_service7'];
	//work experience to db
	if(($p_work_date_from7 == ""|| $p_work_date_to7 =="" || $p_work_mon_salary7 =="")||($p_work_date_from7 == "" && $p_work_date_to7 =="" && $p_work_mon_salary7 =="")){
			$work_query7 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title7',dept_agency_office_company='$p_work_agency7',salary_grade_and_step_inc='$p_work_salary_grade7',status_of_appointment='$p_work_status_appoint7',govt_service='$p_gov_service7' WHERE emp_id='$emp_id' && count='$count7'";		
			mysql_query($work_query7)    or die(mysql_error());
			}else{
			$p_work_date_from7 = strtotime($p_work_date_from7);
			$p_work_date_from7 = date('Y-m-d',$p_work_date_from7);
			$p_work_date_to7 = strtotime($p_work_date_to7);
			$p_work_date_to7 = date('Y-m-d',$p_work_date_to7);
			$work_query7 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from7',inclusive_date_to='$p_work_date_to7',position_title='$p_work_pos_title7',dept_agency_office_company='$p_work_agency7',monthly_salary='$p_work_mon_salary7',salary_grade_and_step_inc='$p_work_salary_grade7',status_of_appointment='$p_work_status_appoint7',govt_service='$p_gov_service7' WHERE emp_id='$emp_id' && count='$count7'";		
			mysql_query($work_query7)    or die(mysql_error());
			}
	}
		//declaration for work experience 8
	if(isset($_POST['p_work_pos_title8'])){
	$p_work_date_from8=$_POST['p_work_date_from8'];
	$p_work_date_to8 =$_POST['p_work_date_to8'];
	$p_work_pos_title8 = $_POST['p_work_pos_title8'];
	$p_work_agency8 = $_POST['p_work_agency8'];
	$p_work_mon_salary8 = $_POST['p_work_mon_salary8'];
	$p_work_salary_grade8 = $_POST['p_work_salary_grade8'];
	$p_work_status_appoint8 = $_POST['p_work_status_appoint8'];
	$p_gov_service8 = $_POST['p_gov_service8'];
	//work experience to db
	if(($p_work_date_from8 == ""|| $p_work_date_to8 =="" || $p_work_mon_salary8 =="")||($p_work_date_from8 == "" && $p_work_date_to8 =="" && $p_work_mon_salary8 =="")){
			$work_query8 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title8',dept_agency_office_company='$p_work_agency8',salary_grade_and_step_inc='$p_work_salary_grade8',status_of_appointment='$p_work_status_appoint8',govt_service='$p_gov_service8' WHERE emp_id='$emp_id' && count='$count8'";		
			mysql_query($work_query8)    or die(mysql_error());
			}else{
			$p_work_date_from8 = strtotime($p_work_date_from8);
			$p_work_date_from8 = date('Y-m-d',$p_work_date_from8);
			$p_work_date_to8 = strtotime($p_work_date_to8);
			$p_work_date_to8 = date('Y-m-d',$p_work_date_to8);
			$work_query8 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from8',inclusive_date_to='$p_work_date_to8',position_title='$p_work_pos_title8',dept_agency_office_company='$p_work_agency8',monthly_salary='$p_work_mon_salary8',salary_grade_and_step_inc='$p_work_salary_grade8',status_of_appointment='$p_work_status_appoint8',govt_service='$p_gov_service8' WHERE emp_id='$emp_id' && count='$count8'";		
			mysql_query($work_query8)    or die(mysql_error());
			}
	}
		
		//declaration for work experience 9
	if(isset($_POST['p_work_pos_title9'])){
	$p_work_date_from9=$_POST['p_work_date_from9'];
	$p_work_date_to9 =$_POST['p_work_date_to9'];
	$p_work_pos_title9 = $_POST['p_work_pos_title9'];
	$p_work_agency9 = $_POST['p_work_agency9'];
	$p_work_mon_salary9 = $_POST['p_work_mon_salary9'];
	$p_work_salary_grade9 = $_POST['p_work_salary_grade9'];
	$p_work_status_appoint9 = $_POST['p_work_status_appoint9'];
	$p_gov_service9 = $_POST['p_gov_service9'];
	//work experience to db
	if(($p_work_date_from9 == ""|| $p_work_date_to9 =="" || $p_work_mon_salary9 =="")||($p_work_date_from9 == "" && $p_work_date_to9 =="" && $p_work_mon_salary9 =="")){
			$work_query9 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title9',dept_agency_office_company='$p_work_agency9',salary_grade_and_step_inc='$p_work_salary_grade9',status_of_appointment='$p_work_status_appoint9',govt_service='$p_gov_service9' WHERE emp_id='$emp_id' && count='$count9'";		
			mysql_query($work_query9)    or die(mysql_error());
			}else{
			$p_work_date_from9 = strtotime($p_work_date_from9);
			$p_work_date_from9 = date('Y-m-d',$p_work_date_from9);
			$p_work_date_to9 = strtotime($p_work_date_to9);
			$p_work_date_to9 = date('Y-m-d',$p_work_date_to9);
			$work_query9 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from9',inclusive_date_to='$p_work_date_to9',position_title='$p_work_pos_title9',dept_agency_office_company='$p_work_agency9',monthly_salary='$p_work_mon_salary9',salary_grade_and_step_inc='$p_work_salary_grade9',status_of_appointment='$p_work_status_appoint9',govt_service='$p_gov_service9' WHERE emp_id='$emp_id' && count='$count9'";		
			mysql_query($work_query9)    or die(mysql_error());
			}
	}
		//declaration for work experience 10
	if(isset($_POST['p_work_pos_title10'])){
	$p_work_date_from10=$_POST['p_work_date_from10'];
	$p_work_date_to10 =$_POST['p_work_date_to10'];
	$p_work_pos_title10 = $_POST['p_work_pos_title10'];
	$p_work_agency10 = $_POST['p_work_agency10'];
	$p_work_mon_salary10 = $_POST['p_work_mon_salary10'];
	$p_work_salary_grade10 = $_POST['p_work_salary_grade10'];
	$p_work_status_appoint10 = $_POST['p_work_status_appoint10'];
	$p_gov_service10 = $_POST['p_gov_service10'];
	//work experience to db
	if(($p_work_date_from10 == ""|| $p_work_date_to10 =="" || $p_work_mon_salary10 =="")||($p_work_date_from10 == "" && $p_work_date_to10 =="" && $p_work_mon_salary10 =="")){
			$work_query10 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title10',dept_agency_office_company='$p_work_agency10',salary_grade_and_step_inc='$p_work_salary_grade10',status_of_appointment='$p_work_status_appoint10',govt_service='$p_gov_service10' WHERE emp_id='$emp_id' && count='$count10'";		
			mysql_query($work_query10)    or die(mysql_error());
			}else{
			$p_work_date_from10 = strtotime($p_work_date_from10);
			$p_work_date_from10 = date('Y-m-d',$p_work_date_from10);
			$p_work_date_to10 = strtotime($p_work_date_to10);
			$p_work_date_to10 = date('Y-m-d',$p_work_date_to10);
			$work_query10 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from10',inclusive_date_to='$p_work_date_to10',position_title='$p_work_pos_title10',dept_agency_office_company='$p_work_agency10',monthly_salary='$p_work_mon_salary10',salary_grade_and_step_inc='$p_work_salary_grade10',status_of_appointment='$p_work_status_appoint10',govt_service='$p_gov_service10' WHERE emp_id='$emp_id' && count='$count10'";		
			mysql_query($work_query10)    or die(mysql_error());
			}
	}
		//declaration for work experience 11
	if(isset($_POST['p_work_pos_title11'])){
	$p_work_date_from11=$_POST['p_work_date_from11'];
	$p_work_date_to11 =$_POST['p_work_date_to11'];
	$p_work_pos_title11 = $_POST['p_work_pos_title11'];
	$p_work_agency11 = $_POST['p_work_agency11'];
	$p_work_mon_salary11 = $_POST['p_work_mon_salary11'];
	$p_work_salary_grade11 = $_POST['p_work_salary_grade11'];
	$p_work_status_appoint11 = $_POST['p_work_status_appoint11'];
	$p_gov_service11 = $_POST['p_gov_service11'];
	//work experience to db
	if(($p_work_date_from11 == ""|| $p_work_date_to11 =="" || $p_work_mon_salary11 =="")||($p_work_date_from11 == "" && $p_work_date_to11 =="" && $p_work_mon_salary11 =="")){
			$work_query11 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title11',dept_agency_office_company='$p_work_agency11',salary_grade_and_step_inc='$p_work_salary_grade11',status_of_appointment='$p_work_status_appoint11',govt_service='$p_gov_service11' WHERE emp_id='$emp_id' && count='$count11'";		
			mysql_query($work_query11)    or die(mysql_error());
			}else{
			$p_work_date_from11 = strtotime($p_work_date_from11);
			$p_work_date_from11 = date('Y-m-d',$p_work_date_from11);
			$p_work_date_to11 = strtotime($p_work_date_to11);
			$p_work_date_to11 = date('Y-m-d',$p_work_date_to11);
			$work_query11 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from11',inclusive_date_to='$p_work_date_to11',position_title='$p_work_pos_title11',dept_agency_office_company='$p_work_agency11',monthly_salary='$p_work_mon_salary11',salary_grade_and_step_inc='$p_work_salary_grade11',status_of_appointment='$p_work_status_appoint11',govt_service='$p_gov_service11' WHERE emp_id='$emp_id' && count='$count11'";		
			mysql_query($work_query11)    or die(mysql_error());
			}
	}
		//declaration for work experience 12
	if(isset($_POST['p_work_pos_title12'])){
	$p_work_date_from12=$_POST['p_work_date_from12'];
	$p_work_date_to12 =$_POST['p_work_date_to12'];
	$p_work_pos_title12 = $_POST['p_work_pos_title12'];
	$p_work_agency12 = $_POST['p_work_agency12'];
	$p_work_mon_salary12 = $_POST['p_work_mon_salary12'];
	$p_work_salary_grade12 = $_POST['p_work_salary_grade12'];
	$p_work_status_appoint12 = $_POST['p_work_status_appoint12'];
	$p_gov_service12 = $_POST['p_gov_service12'];
	//work experience to db
	if(($p_work_date_from12 == ""|| $p_work_date_to12 =="" || $p_work_mon_salary12 =="")||($p_work_date_from12 == "" && $p_work_date_to12 =="" && $p_work_mon_salary12 =="")){
			$work_query12 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title12',dept_agency_office_company='$p_work_agency12',salary_grade_and_step_inc='$p_work_salary_grade12',status_of_appointment='$p_work_status_appoint12',govt_service='$p_gov_service12' WHERE emp_id='$emp_id' && count='$count12'";		
			mysql_query($work_query12)    or die(mysql_error());
			}else{
			$p_work_date_from12 = strtotime($p_work_date_from12);
			$p_work_date_from12 = date('Y-m-d',$p_work_date_from12);
			$p_work_date_to12 = strtotime($p_work_date_to12);
			$p_work_date_to12 = date('Y-m-d',$p_work_date_to12);
			$work_query12 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from12',inclusive_date_to='$p_work_date_to12',position_title='$p_work_pos_title12',dept_agency_office_company='$p_work_agency12',monthly_salary='$p_work_mon_salary12',salary_grade_and_step_inc='$p_work_salary_grade12',status_of_appointment='$p_work_status_appoint12',govt_service='$p_gov_service12' WHERE emp_id='$emp_id' && count='$count12'";		
			mysql_query($work_query12)    or die(mysql_error());
			}
	}
		//declaration for work experience 13
	if(isset($_POST['p_work_pos_title13'])){
	$p_work_date_from13=$_POST['p_work_date_from13'];
	$p_work_date_to13 =$_POST['p_work_date_to13'];
	$p_work_pos_title13 = $_POST['p_work_pos_title13'];
	$p_work_agency13 = $_POST['p_work_agency13'];
	$p_work_mon_salary13 = $_POST['p_work_mon_salary13'];
	$p_work_salary_grade13 = $_POST['p_work_salary_grade13'];
	$p_work_status_appoint13 = $_POST['p_work_status_appoint13'];
	$p_gov_service13 = $_POST['p_gov_service13'];
	//work experience to db
	if(($p_work_date_from13 == ""|| $p_work_date_to13 =="" || $p_work_mon_salary13 =="")||($p_work_date_from13 == "" && $p_work_date_to13 =="" && $p_work_mon_salary13 =="")){
			$work_query13 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title13',dept_agency_office_company='$p_work_agency13',salary_grade_and_step_inc='$p_work_salary_grade13',status_of_appointment='$p_work_status_appoint13',govt_service='$p_gov_service13' WHERE emp_id='$emp_id' && count='$count13'";		
			mysql_query($work_query13)    or die(mysql_error());
			}else{
			$p_work_date_from13 = strtotime($p_work_date_from13);
			$p_work_date_from13 = date('Y-m-d',$p_work_date_from13);
			$p_work_date_to13 = strtotime($p_work_date_to13);
			$p_work_date_to13 = date('Y-m-d',$p_work_date_to13);
			$work_query13 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from13',inclusive_date_to='$p_work_date_to13',position_title='$p_work_pos_title13',dept_agency_office_company='$p_work_agency13',monthly_salary='$p_work_mon_salary13',salary_grade_and_step_inc='$p_work_salary_grade13',status_of_appointment='$p_work_status_appoint13',govt_service='$p_gov_service13' WHERE emp_id='$emp_id' && count='$count13'";		
			mysql_query($work_query13)    or die(mysql_error());
			}
	}
		//declaration for work experience 14
	if(isset($_POST['p_work_pos_title14'])){
	$p_work_date_from14=$_POST['p_work_date_from14'];
	$p_work_date_to14 =$_POST['p_work_date_to14'];
	$p_work_pos_title14 = $_POST['p_work_pos_title14'];
	$p_work_agency14 = $_POST['p_work_agency14'];
	$p_work_mon_salary14 = $_POST['p_work_mon_salary14'];
	$p_work_salary_grade14 = $_POST['p_work_salary_grade14'];
	$p_work_status_appoint14 = $_POST['p_work_status_appoint14'];
	$p_gov_service14 = $_POST['p_gov_service14'];
	//work experience to db
	if(($p_work_date_from14 == ""|| $p_work_date_to14 =="" || $p_work_mon_salary14 =="")||($p_work_date_from14 == "" && $p_work_date_to14 =="" && $p_work_mon_salary14 =="")){
			$work_query14 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title14',dept_agency_office_company='$p_work_agency14',salary_grade_and_step_inc='$p_work_salary_grade14',status_of_appointment='$p_work_status_appoint14',govt_service='$p_gov_service14' WHERE emp_id='$emp_id' && count='$count14'";		
			mysql_query($work_query14)    or die(mysql_error());
			}else{
			$p_work_date_from14 = strtotime($p_work_date_from14);
			$p_work_date_from14 = date('Y-m-d',$p_work_date_from14);
			$p_work_date_to14 = strtotime($p_work_date_to14);
			$p_work_date_to14 = date('Y-m-d',$p_work_date_to14);
			$work_query14 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from14',inclusive_date_to='$p_work_date_to14',position_title='$p_work_pos_title14',dept_agency_office_company='$p_work_agency14',monthly_salary='$p_work_mon_salary14',salary_grade_and_step_inc='$p_work_salary_grade14',status_of_appointment='$p_work_status_appoint14',govt_service='$p_gov_service14' WHERE emp_id='$emp_id' && count='$count14'";		
			mysql_query($work_query14)    or die(mysql_error());
			}
	}
		//declaration for work experience 15
	if(isset($_POST['p_work_pos_title15'])){
	$p_work_date_from15=$_POST['p_work_date_from15'];
	$p_work_date_to15 =$_POST['p_work_date_to15'];
	$p_work_pos_title15 = $_POST['p_work_pos_title15'];
	$p_work_agency15 = $_POST['p_work_agency15'];
	$p_work_mon_salary15 = $_POST['p_work_mon_salary15'];
	$p_work_salary_grade15 = $_POST['p_work_salary_grade15'];
	$p_work_status_appoint15 = $_POST['p_work_status_appoint15'];
	$p_gov_service15 = $_POST['p_gov_service15'];
	//work experience to db
	if(($p_work_date_from15 == ""|| $p_work_date_to15 =="" || $p_work_mon_salary15 =="")||($p_work_date_from15 == "" && $p_work_date_to15 =="" && $p_work_mon_salary15 =="")){
			$work_query15 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title15',dept_agency_office_company='$p_work_agency15',salary_grade_and_step_inc='$p_work_salary_grade15',status_of_appointment='$p_work_status_appoint15',govt_service='$p_gov_service15' WHERE emp_id='$emp_id' && count='$count15'";		
			mysql_query($work_query15)    or die(mysql_error());
			}else{
			$p_work_date_from15 = strtotime($p_work_date_from15);
			$p_work_date_from15 = date('Y-m-d',$p_work_date_from15);
			$p_work_date_to15 = strtotime($p_work_date_to15);
			$p_work_date_to15 = date('Y-m-d',$p_work_date_to15);
			$work_query15 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from15',inclusive_date_to='$p_work_date_to15',position_title='$p_work_pos_title15',dept_agency_office_company='$p_work_agency15',monthly_salary='$p_work_mon_salary15',salary_grade_and_step_inc='$p_work_salary_grade15',status_of_appointment='$p_work_status_appoint15',govt_service='$p_gov_service15' WHERE emp_id='$emp_id' && count='$count15'";		
			mysql_query($work_query15)    or die(mysql_error());
			}
	}
		//declaration for work experience 16
	if(isset($_POST['p_work_pos_title16'])){
	$p_work_date_from16=$_POST['p_work_date_from16'];
	$p_work_date_to16 =$_POST['p_work_date_to16'];
	$p_work_pos_title16 = $_POST['p_work_pos_title16'];
	$p_work_agency16 = $_POST['p_work_agency16'];
	$p_work_mon_salary16 = $_POST['p_work_mon_salary16'];
	$p_work_salary_grade16 = $_POST['p_work_salary_grade16'];
	$p_work_status_appoint16 = $_POST['p_work_status_appoint16'];
	$p_gov_service16 = $_POST['p_gov_service16'];
	//work experience to db
	if(($p_work_date_from16 == ""|| $p_work_date_to16 =="" || $p_work_mon_salary16 =="")||($p_work_date_from16 == "" && $p_work_date_to16 =="" && $p_work_mon_salary16 =="")){
			$work_query16 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title16',dept_agency_office_company='$p_work_agency16',salary_grade_and_step_inc='$p_work_salary_grade16',status_of_appointment='$p_work_status_appoint16',govt_service='$p_gov_service16' WHERE emp_id='$emp_id' && count='$count16'";		
			mysql_query($work_query16)    or die(mysql_error());
			}else{
			$p_work_date_from16 = strtotime($p_work_date_from16);
			$p_work_date_from16 = date('Y-m-d',$p_work_date_from16);
			$p_work_date_to16 = strtotime($p_work_date_to16);
			$p_work_date_to16 = date('Y-m-d',$p_work_date_to16);
			$work_query16 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from16',inclusive_date_to='$p_work_date_to16',position_title='$p_work_pos_title16',dept_agency_office_company='$p_work_agency16',monthly_salary='$p_work_mon_salary16',salary_grade_and_step_inc='$p_work_salary_grade16',status_of_appointment='$p_work_status_appoint16',govt_service='$p_gov_service16' WHERE emp_id='$emp_id'&& count='$count16'";		
			mysql_query($work_query16)    or die(mysql_error());
			}
	}
		//declaration for work experience 17
	if(isset($_POST['p_work_pos_title17'])){
	$p_work_date_from17=$_POST['p_work_date_from17'];
	$p_work_date_to17 =$_POST['p_work_date_to17'];
	$p_work_pos_title17 = $_POST['p_work_pos_title17'];
	$p_work_agency17 = $_POST['p_work_agency17'];
	$p_work_mon_salary17 = $_POST['p_work_mon_salary17'];
	$p_work_salary_grade17 = $_POST['p_work_salary_grade17'];
	$p_work_status_appoint17 = $_POST['p_work_status_appoint17'];
	$p_gov_service17 = $_POST['p_gov_service17'];
	//work experience to db
	if(($p_work_date_from17 == ""|| $p_work_date_to17 =="" || $p_work_mon_salary17 =="")||($p_work_date_from17 == "" && $p_work_date_to17 =="" && $p_work_mon_salary17 =="")){
			$work_query17 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title17',dept_agency_office_company='$p_work_agency17',salary_grade_and_step_inc='$p_work_salary_grade17',status_of_appointment='$p_work_status_appoint17',govt_service='$p_gov_service17' WHERE emp_id='$emp_id' && count='$count17'";		
			mysql_query($work_query17)    or die(mysql_error());
			}else{
			$p_work_date_from17 = strtotime($p_work_date_from17);
			$p_work_date_from17 = date('Y-m-d',$p_work_date_from17);
			$p_work_date_to17 = strtotime($p_work_date_to17);
			$p_work_date_to17 = date('Y-m-d',$p_work_date_to17);
			$work_query17 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from17',inclusive_date_to='$p_work_date_to17',position_title='$p_work_pos_title17',dept_agency_office_company='$p_work_agency17',monthly_salary='$p_work_mon_salary17',salary_grade_and_step_inc='$p_work_salary_grade17',status_of_appointment='$p_work_status_appoint17',govt_service='$p_gov_service17' WHERE emp_id='$emp_id' && count='$count17'";		
			mysql_query($work_query17)    or die(mysql_error());
			}
	}
		//declaration for work experience 18
	if(isset($_POST['p_work_pos_title18'])){
	$p_work_date_from18=$_POST['p_work_date_from18'];
	$p_work_date_to18 =$_POST['p_work_date_to18'];
	$p_work_pos_title18 = $_POST['p_work_pos_title18'];
	$p_work_agency18 = $_POST['p_work_agency18'];
	$p_work_mon_salary18 = $_POST['p_work_mon_salary18'];
	$p_work_salary_grade18 = $_POST['p_work_salary_grade18'];
	$p_work_status_appoint18 = $_POST['p_work_status_appoint18'];
	$p_gov_service18 = $_POST['p_gov_service18'];
	//work experience to db
	if(($p_work_date_from18 == ""|| $p_work_date_to18 =="" || $p_work_mon_salary18 =="")||($p_work_date_from18 == "" && $p_work_date_to18 =="" && $p_work_mon_salary18 =="")){
			$work_query18 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title18',dept_agency_office_company='$p_work_agency18',salary_grade_and_step_inc='$p_work_salary_grade18',status_of_appointment='$p_work_status_appoint18',govt_service='$p_gov_service18' WHERE emp_id='$emp_id' && count='$count18'";		
			mysql_query($work_query18)    or die(mysql_error());
			}else{
			$p_work_date_from18 = strtotime($p_work_date_from18);
			$p_work_date_from18 = date('Y-m-d',$p_work_date_from18);
			$p_work_date_to18 = strtotime($p_work_date_to18);
			$p_work_date_to18 = date('Y-m-d',$p_work_date_to18);
			$work_query18 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from18',inclusive_date_to='$p_work_date_to18',position_title='$p_work_pos_title18',dept_agency_office_company='$p_work_agency18',monthly_salary='$p_work_mon_salary18',salary_grade_and_step_inc='$p_work_salary_grade18',status_of_appointment='$p_work_status_appoint18',govt_service='$p_gov_service18' WHERE emp_id='$emp_id' && count='$count18'";		
			mysql_query($work_query18)    or die(mysql_error());
			}
	}
		//declaration for work experience 19
	if(isset($_POST['p_work_pos_title19'])){
	$p_work_date_from19=$_POST['p_work_date_from19'];
	$p_work_date_to19 =$_POST['p_work_date_to19'];
	$p_work_pos_title19 = $_POST['p_work_pos_title19'];
	$p_work_agency19 = $_POST['p_work_agency19'];
	$p_work_mon_salary19 = $_POST['p_work_mon_salary19'];
	$p_work_salary_grade19 = $_POST['p_work_salary_grade19'];
	$p_work_status_appoint19 = $_POST['p_work_status_appoint19'];
	$p_gov_service19 = $_POST['p_gov_service19'];
	//work experience to db
	if(($p_work_date_from19 == ""|| $p_work_date_to19 =="" || $p_work_mon_salary19 =="")||($p_work_date_from19 == "" && $p_work_date_to19 =="" && $p_work_mon_salary19 =="")){
			$work_query19 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title19',dept_agency_office_company='$p_work_agency19',salary_grade_and_step_inc='$p_work_salary_grade19',status_of_appointment='$p_work_status_appoint19',govt_service='$p_gov_service19' WHERE emp_id='$emp_id' && count='$count19'";		
			mysql_query($work_query19)    or die(mysql_error());
			}else{
			$p_work_date_from19 = strtotime($p_work_date_from19);
			$p_work_date_from19 = date('Y-m-d',$p_work_date_from19);
			$p_work_date_to19 = strtotime($p_work_date_to19);
			$p_work_date_to19 = date('Y-m-d',$p_work_date_to19);
			$work_query19 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from19',inclusive_date_to='$p_work_date_to19',position_title='$p_work_pos_title19',dept_agency_office_company='$p_work_agency19',monthly_salary='$p_work_mon_salary19',salary_grade_and_step_inc='$p_work_salary_grade19',status_of_appointment='$p_work_status_appoint19',govt_service='$p_gov_service19' WHERE emp_id='$emp_id' && count='$count19'";		
			mysql_query($work_query19)    or die(mysql_error());
			}
	}
		//declaration for work experience 20
	if(isset($_POST['p_work_pos_title20'])){
	$p_work_date_from20=$_POST['p_work_date_from20'];
	$p_work_date_to20 =$_POST['p_work_date_to20'];
	$p_work_pos_title20 = $_POST['p_work_pos_title20'];
	$p_work_agency20 = $_POST['p_work_agency20'];
	$p_work_mon_salary20 = $_POST['p_work_mon_salary20'];
	$p_work_salary_grade20 = $_POST['p_work_salary_grade20'];
	$p_work_status_appoint20 = $_POST['p_work_status_appoint20'];
	$p_gov_service20 = $_POST['p_gov_service20'];
	//work experience to db
	if(($p_work_date_from20 == ""|| $p_work_date_to20 =="" || $p_work_mon_salary20 =="")||($p_work_date_from20 == "" && $p_work_date_to20 =="" && $p_work_mon_salary20 =="")){
			$work_query20 ="UPDATE eis_work_experience_t SET position_title='$p_work_pos_title20',dept_agency_office_company='$p_work_agency20',salary_grade_and_step_inc='$p_work_salary_grade20',status_of_appointment='$p_work_status_appoint20',govt_service='$p_gov_service20' WHERE emp_id='$emp_id' && count='$count20'";		
			mysql_query($work_query20)    or die(mysql_error());
			}else{
			$p_work_date_from20 = strtotime($p_work_date_from20);
			$p_work_date_from20 = date('Y-m-d',$p_work_date_from20);
			$p_work_date_to20 = strtotime($p_work_date_to20);
			$p_work_date_to20 = date('Y-m-d',$p_work_date_to20);
			$work_query20 ="UPDATE eis_work_experience_t SET inclusive_date_from='$p_work_date_from20',inclusive_date_to='$p_work_date_to20',position_title='$p_work_pos_title20',dept_agency_office_company='$p_work_agency20',monthly_salary='$p_work_mon_salary20',salary_grade_and_step_inc='$p_work_salary_grade20',status_of_appointment='$p_work_status_appoint20',govt_service='$p_gov_service20' WHERE emp_id='$emp_id' && count='$count20'";		
			mysql_query($work_query20)    or die(mysql_error());
			}
	}
			
	
			//voluntary work
			//p_voluntary_work 1
			if(isset($_POST['p_voluntary_name1'])){
			$p_voluntary_name1 = $_POST['p_voluntary_name1'];
			$p_voluntary_date_from1 =$_POST['p_voluntary_date_from1'];
			$p_voluntary_date_to1 =$_POST['p_voluntary_date_to1'];
			$p_voluntary_no_hrs1 = $_POST['p_voluntary_no_hrs1'];
			$p_voluntary_position1 = $_POST['p_voluntary_position1'];
			//voluntary work to db
			if(($p_voluntary_date_from1 =="" || $p_voluntary_date_to1 =="" || $p_voluntary_no_hrs1 =="")||($p_voluntary_date_from1 =="" && $p_voluntary_date_to1 =="" && $p_voluntary_no_hrs1 =="")){
			$v_work1 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name1',nature_of_work='$p_voluntary_position1' WHERE emp_id='$emp_id' && count='$count1'";
			mysql_query($v_work1) or die(mysql_error());
			}else{
			$p_voluntary_date_from1 = strtotime($_POST['p_voluntary_date_from1']);
			$p_voluntary_date_from1 = date('Y-m-d',$p_voluntary_date_from1);
			$p_voluntary_date_to1 = strtotime($_POST['p_voluntary_date_to1']);
			$p_voluntary_date_to1 = date('Y-m-d',$p_voluntary_date_to1);
			$v_work1 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name1',inclusive_date_from='$p_voluntary_date_from1',inclusive_date_to='$p_voluntary_date_to1',no_of_hrs='$p_voluntary_no_hrs1',nature_of_work='$p_voluntary_position1'  WHERE emp_id='$emp_id' && count='$count1'";
			mysql_query($v_work1) or die(mysql_error());
			}
			}
			//p_voluntary_work 2
			if(isset($_POST['p_voluntary_name2'])){
			$p_voluntary_name2 = $_POST['p_voluntary_name2'];
			$p_voluntary_date_from2 =$_POST['p_voluntary_date_from2'];
			$p_voluntary_date_to2 =$_POST['p_voluntary_date_to2'];
			$p_voluntary_no_hrs2 = $_POST['p_voluntary_no_hrs2'];
			$p_voluntary_position2 = $_POST['p_voluntary_position2'];
			//voluntary work to db
			if(($p_voluntary_date_from2 =="" || $p_voluntary_date_to2 =="" || $p_voluntary_no_hrs2 =="")||($p_voluntary_date_from2 =="" && $p_voluntary_date_to2 =="" && $p_voluntary_no_hrs2 =="")){
			$v_work2 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name2',nature_of_work='$p_voluntary_position2' WHERE emp_id='$emp_id' && count='$count2'";
			mysql_query($v_work2) or die(mysql_error());
			}else{
			$p_voluntary_date_from2 = strtotime($_POST['p_voluntary_date_from2']);
			$p_voluntary_date_from2 = date('Y-m-d',$p_voluntary_date_from2);
			$p_voluntary_date_to2 = strtotime($_POST['p_voluntary_date_to2']);
			$p_voluntary_date_to2 = date('Y-m-d',$p_voluntary_date_to2);
			$v_work2 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name2',inclusive_date_from='$p_voluntary_date_from2',inclusive_date_to='$p_voluntary_date_to2',no_of_hrs='$p_voluntary_no_hrs2',nature_of_work='$p_voluntary_position2'  WHERE emp_id='$emp_id' && count='$count2'";
			mysql_query($v_work2) or die(mysql_error());
			}
			}
			//p_voluntary_work 3
			if(isset($_POST['p_voluntary_name3'])){
			$p_voluntary_name3 = $_POST['p_voluntary_name3'];
			$p_voluntary_date_from3 =$_POST['p_voluntary_date_from3'];
			$p_voluntary_date_to3 =$_POST['p_voluntary_date_to3'];
			$p_voluntary_no_hrs3 = $_POST['p_voluntary_no_hrs3'];
			$p_voluntary_position3 = $_POST['p_voluntary_position3'];
			//voluntary work to db
			if(($p_voluntary_date_from3 =="" || $p_voluntary_date_to3 =="" || $p_voluntary_no_hrs3 =="")||($p_voluntary_date_from3 =="" && $p_voluntary_date_to3 =="" && $p_voluntary_no_hrs3 =="")){
			$v_work3 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name3',nature_of_work='$p_voluntary_position3' WHERE emp_id='$emp_id' && count='$count3'";
			mysql_query($v_work3) or die(mysql_error());
			}else{
			$p_voluntary_date_from3 = strtotime($_POST['p_voluntary_date_from3']);
			$p_voluntary_date_from3 = date('Y-m-d',$p_voluntary_date_from3);
			$p_voluntary_date_to3 = strtotime($_POST['p_voluntary_date_to3']);
			$p_voluntary_date_to3 = date('Y-m-d',$p_voluntary_date_to3);
			$v_work3 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name3',inclusive_date_from='$p_voluntary_date_from3',inclusive_date_to='$p_voluntary_date_to3',no_of_hrs='$p_voluntary_no_hrs3',nature_of_work='$p_voluntary_position3'  WHERE emp_id='$emp_id' && count='$count3'";
			mysql_query($v_work3) or die(mysql_error());
			}
			}
			//p_voluntary_work 4
			if(isset($_POST['p_voluntary_name4'])){
			$p_voluntary_name4 = $_POST['p_voluntary_name4'];
			$p_voluntary_date_from4 =$_POST['p_voluntary_date_from4'];
			$p_voluntary_date_to4 =$_POST['p_voluntary_date_to4'];
			$p_voluntary_no_hrs4 = $_POST['p_voluntary_no_hrs4'];
			$p_voluntary_position4 = $_POST['p_voluntary_position4'];
			//voluntary work to db
			if(($p_voluntary_date_from4 =="" || $p_voluntary_date_to4 =="" || $p_voluntary_no_hrs4 =="")||($p_voluntary_date_from4 =="" && $p_voluntary_date_to4 =="" && $p_voluntary_no_hrs4 =="")){
			$v_work4 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name4',nature_of_work='$p_voluntary_position4' WHERE emp_id='$emp_id' && count='$count4'";
			mysql_query($v_work4) or die(mysql_error());
			}else{
			$p_voluntary_date_from4 = strtotime($_POST['p_voluntary_date_from4']);
			$p_voluntary_date_from4 = date('Y-m-d',$p_voluntary_date_from4);
			$p_voluntary_date_to4 = strtotime($_POST['p_voluntary_date_to4']);
			$p_voluntary_date_to4 = date('Y-m-d',$p_voluntary_date_to4);
			$v_work4 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name4',inclusive_date_from='$p_voluntary_date_from4',inclusive_date_to='$p_voluntary_date_to4',no_of_hrs='$p_voluntary_no_hrs4',nature_of_work='$p_voluntary_position4'  WHERE emp_id='$emp_id' && count='$count4'";
			mysql_query($v_work4) or die(mysql_error());
			}
			}
			//p_voluntary_work 5
			if(isset($_POST['p_voluntary_name5'])){
			$p_voluntary_name5 = $_POST['p_voluntary_name5'];
			$p_voluntary_date_from5 =$_POST['p_voluntary_date_from5'];
			$p_voluntary_date_to5 =$_POST['p_voluntary_date_to5'];
			$p_voluntary_no_hrs5 = $_POST['p_voluntary_no_hrs5'];
			$p_voluntary_position5 = $_POST['p_voluntary_position5'];
			//voluntary work to db
			if(($p_voluntary_date_from5 =="" || $p_voluntary_date_to5 =="" || $p_voluntary_no_hrs5 =="")||($p_voluntary_date_from5 =="" && $p_voluntary_date_to5 =="" && $p_voluntary_no_hrs5 =="")){
			$v_work5 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name5',nature_of_work='$p_voluntary_position5' WHERE emp_id='$emp_id' && count='$count5'";
			mysql_query($v_work5) or die(mysql_error());
			}else{
			$p_voluntary_date_from5 = strtotime($_POST['p_voluntary_date_from5']);
			$p_voluntary_date_from5 = date('Y-m-d',$p_voluntary_date_from5);
			$p_voluntary_date_to5 = strtotime($_POST['p_voluntary_date_to5']);
			$p_voluntary_date_to5 = date('Y-m-d',$p_voluntary_date_to5);
			$v_work5 = "UPDATE eis_voluntary_work_t SET name_of_org='$p_voluntary_name5',inclusive_date_from='$p_voluntary_date_from5',inclusive_date_to='$p_voluntary_date_to5',no_of_hrs='$p_voluntary_no_hrs5',nature_of_work='$p_voluntary_position5'  WHERE emp_id='$emp_id' && count='$count5'";
			mysql_query($v_work5) or die(mysql_error());
			}
			}
			
			
			//p_training experience
			//Training Experience 1
			if(isset($_POST['p_training_title1'])){
			$p_training_title1 = $_POST['p_training_title1'];
			$p_training_date_from1 = $_POST['p_training_date_from1'];
			$p_training_date_to1 =$_POST['p_training_date_to1'];
			$p_training_no_hrs1 = $_POST['p_training_no_hrs1'];
			$p_training_sponsor1 = $_POST['p_training_sponsor1'];
			//training programs to db
			if(($p_training_date_from1 == "" || $p_training_date_to1 =="" || $p_training_no_hrs1 =="")||($p_training_date_from1 == "" && $p_training_date_to1 =="" && $p_training_no_hrs1 =="")){
			$trainig_query1="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title1',conducted_sponsor_by='$p_training_sponsor1' WHERE emp_id='$emp_id' && count='$count1'";
			mysql_query($trainig_query1)    or die(mysql_error());
			}else{
			$p_training_date_from1 = strtotime($p_training_date_from1);
			$p_training_date_from1 = date('Y-m-d',$p_training_date_from1);
			$p_training_date_to1 = strtotime($p_training_date_to1);
			$p_training_date_to1 = date('Y-m-d',$p_training_date_to1);
			$trainig_query1="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title1',inclusive_date_att_from='$p_training_date_from1',inclusive_date_att_to='$p_training_date_to1',no_of_hrs='$p_training_no_hrs1',conducted_sponsor_by='$p_training_sponsor1' WHERE emp_id='$emp_id' && count='$count1'";
			mysql_query($trainig_query1)    or die(mysql_error());
			}
			}
			//Training Experience 2
			if(isset($_POST['p_training_title2'])){
			$p_training_title2 = $_POST['p_training_title2'];
			$p_training_date_from2 = $_POST['p_training_date_from2'];
			$p_training_date_to2 =$_POST['p_training_date_to2'];
			$p_training_no_hrs2 = $_POST['p_training_no_hrs2'];
			$p_training_sponsor2 = $_POST['p_training_sponsor2'];
			//training programs to db
			if(($p_training_date_from2 == "" || $p_training_date_to2 =="" || $p_training_no_hrs2 =="")||($p_training_date_from2 == "" && $p_training_date_to2 =="" && $p_training_no_hrs2 =="")){
			$trainig_query2="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title2',conducted_sponsor_by='$p_training_sponsor2' WHERE emp_id='$emp_id' && count='$count2'";
			mysql_query($trainig_query2)    or die(mysql_error());
			}else{
			$p_training_date_from2 = strtotime($p_training_date_from2);
			$p_training_date_from2 = date('Y-m-d',$p_training_date_from2);
			$p_training_date_to2 = strtotime($p_training_date_to2);
			$p_training_date_to2 = date('Y-m-d',$p_training_date_to2);
			$trainig_query2="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title2',inclusive_date_att_from='$p_training_date_from2',inclusive_date_att_to='$p_training_date_to2',no_of_hrs='$p_training_no_hrs2',conducted_sponsor_by='$p_training_sponsor2' WHERE emp_id='$emp_id' && count='$count2'";
			mysql_query($trainig_query2)    or die(mysql_error());
			}
			}
			//Training Experience 3
			if(isset($_POST['p_training_title3'])){
			$p_training_title3 = $_POST['p_training_title3'];
			$p_training_date_from3 = $_POST['p_training_date_from3'];
			$p_training_date_to3 =$_POST['p_training_date_to3'];
			$p_training_no_hrs3 = $_POST['p_training_no_hrs3'];
			$p_training_sponsor3 = $_POST['p_training_sponsor3'];
			//training programs to db
			if(($p_training_date_from3 == "" || $p_training_date_to3 =="" || $p_training_no_hrs3 =="")||($p_training_date_from3 == "" && $p_training_date_to3 =="" && $p_training_no_hrs3 =="")){
			$trainig_query3="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title3',conducted_sponsor_by='$p_training_sponsor3' WHERE emp_id='$emp_id' && count='$count3'";
			mysql_query($trainig_query3)    or die(mysql_error());
			}else{
			$p_training_date_from3 = strtotime($p_training_date_from3);
			$p_training_date_from3 = date('Y-m-d',$p_training_date_from3);
			$p_training_date_to3 = strtotime($p_training_date_to3);
			$p_training_date_to3 = date('Y-m-d',$p_training_date_to3);
			$trainig_query3="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title3',inclusive_date_att_from='$p_training_date_from3',inclusive_date_att_to='$p_training_date_to3',no_of_hrs='$p_training_no_hrs3',conducted_sponsor_by='$p_training_sponsor3' WHERE emp_id='$emp_id' && count='$count3'";
			mysql_query($trainig_query3)    or die(mysql_error());
			}
			}
			//Training Experience 4
			if(isset($_POST['p_training_title4'])){
			$p_training_title4 = $_POST['p_training_title4'];
			$p_training_date_from4 = $_POST['p_training_date_from4'];
			$p_training_date_to4 =$_POST['p_training_date_to4'];
			$p_training_no_hrs4 = $_POST['p_training_no_hrs4'];
			$p_training_sponsor4 = $_POST['p_training_sponsor4'];
			//training programs to db
			if(($p_training_date_from4 == "" || $p_training_date_to4 =="" || $p_training_no_hrs4 =="")||($p_training_date_from4 == "" && $p_training_date_to4 =="" && $p_training_no_hrs4 =="")){
			$trainig_query4="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title4',conducted_sponsor_by='$p_training_sponsor4' WHERE emp_id='$emp_id' && count='$count4'";
			mysql_query($trainig_query4)    or die(mysql_error());
			}else{
			$p_training_date_from4 = strtotime($p_training_date_from4);
			$p_training_date_from4 = date('Y-m-d',$p_training_date_from4);
			$p_training_date_to4 = strtotime($p_training_date_to4);
			$p_training_date_to4 = date('Y-m-d',$p_training_date_to4);
			$trainig_query4="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title4',inclusive_date_att_from='$p_training_date_from4',inclusive_date_att_to='$p_training_date_to4',no_of_hrs='$p_training_no_hrs4',conducted_sponsor_by='$p_training_sponsor4' WHERE emp_id='$emp_id' && count='$count4'";
			mysql_query($trainig_query4)    or die(mysql_error());
			}
			}
			//Training Experience 5
			if(isset($_POST['p_training_title5'])){
			$p_training_title5 = $_POST['p_training_title5'];
			$p_training_date_from5 = $_POST['p_training_date_from5'];
			$p_training_date_to5 =$_POST['p_training_date_to5'];
			$p_training_no_hrs5 = $_POST['p_training_no_hrs5'];
			$p_training_sponsor5 = $_POST['p_training_sponsor5'];
			//training programs to db
			if(($p_training_date_from5 == "" || $p_training_date_to5 =="" || $p_training_no_hrs5 =="")||($p_training_date_from5 == "" && $p_training_date_to5 =="" && $p_training_no_hrs5 =="")){
			$trainig_query5="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title5',conducted_sponsor_by='$p_training_sponsor5' WHERE emp_id='$emp_id' && count='$count5'";
			mysql_query($trainig_query5)    or die(mysql_error());
			}else{
			$p_training_date_from5 = strtotime($p_training_date_from5);
			$p_training_date_from5 = date('Y-m-d',$p_training_date_from5);
			$p_training_date_to5 = strtotime($p_training_date_to5);
			$p_training_date_to5 = date('Y-m-d',$p_training_date_to5);
			$trainig_query5="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title5',inclusive_date_att_from='$p_training_date_from5',inclusive_date_att_to='$p_training_date_to5',no_of_hrs='$p_training_no_hrs5',conducted_sponsor_by='$p_training_sponsor5' WHERE emp_id='$emp_id' && count='$count5'";
			mysql_query($trainig_query5)    or die(mysql_error());
			}
			}
			//Training Experience 6
			if(isset($_POST['p_training_title6'])){
			$p_training_title6 = $_POST['p_training_title6'];
			$p_training_date_from6 = $_POST['p_training_date_from6'];
			$p_training_date_to6 =$_POST['p_training_date_to6'];
			$p_training_no_hrs6 = $_POST['p_training_no_hrs6'];
			$p_training_sponsor6 = $_POST['p_training_sponsor6'];
			//training programs to db
			if(($p_training_date_from6 == "" || $p_training_date_to6 =="" || $p_training_no_hrs6 =="")||($p_training_date_from6 == "" && $p_training_date_to6 =="" && $p_training_no_hrs6 =="")){
			$trainig_query6="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title6',conducted_sponsor_by='$p_training_sponsor6' WHERE emp_id='$emp_id' && count='$count6'";
			mysql_query($trainig_query6)    or die(mysql_error());
			}else{
			$p_training_date_from6 = strtotime($p_training_date_from6);
			$p_training_date_from6 = date('Y-m-d',$p_training_date_from6);
			$p_training_date_to6 = strtotime($p_training_date_to6);
			$p_training_date_to6 = date('Y-m-d',$p_training_date_to6);
			$trainig_query6="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title6',inclusive_date_att_from='$p_training_date_from6',inclusive_date_att_to='$p_training_date_to6',no_of_hrs='$p_training_no_hrs6',conducted_sponsor_by='$p_training_sponsor6' WHERE emp_id='$emp_id' && count='$count6'";
			mysql_query($trainig_query6)    or die(mysql_error());
			}
			}
			//Training Experience 7
			if(isset($_POST['p_training_title7'])){
			$p_training_title7 = $_POST['p_training_title7'];
			$p_training_date_from7 = $_POST['p_training_date_from7'];
			$p_training_date_to7 =$_POST['p_training_date_to7'];
			$p_training_no_hrs7 = $_POST['p_training_no_hrs7'];
			$p_training_sponsor7 = $_POST['p_training_sponsor7'];
			//training programs to db
			if(($p_training_date_from7 == "" || $p_training_date_to7 =="" || $p_training_no_hrs7 =="")||($p_training_date_from7 == "" && $p_training_date_to7 =="" && $p_training_no_hrs7 =="")){
			$trainig_query7="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title7',conducted_sponsor_by='$p_training_sponsor7' WHERE emp_id='$emp_id' && count='$count7'";
			mysql_query($trainig_query7)    or die(mysql_error());
			}else{
			$p_training_date_from7 = strtotime($p_training_date_from7);
			$p_training_date_from7 = date('Y-m-d',$p_training_date_from7);
			$p_training_date_to7 = strtotime($p_training_date_to7);
			$p_training_date_to7 = date('Y-m-d',$p_training_date_to7);
			$trainig_query7="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title7',inclusive_date_att_from='$p_training_date_from7',inclusive_date_att_to='$p_training_date_to7',no_of_hrs='$p_training_no_hrs7',conducted_sponsor_by='$p_training_sponsor7' WHERE emp_id='$emp_id' && count='$count7'";
			mysql_query($trainig_query7)    or die(mysql_error());
			}
			}
			//Training Experience 8
			if(isset($_POST['p_training_title8'])){
			$p_training_title8 = $_POST['p_training_title8'];
			$p_training_date_from8 = $_POST['p_training_date_from8'];
			$p_training_date_to8 =$_POST['p_training_date_to8'];
			$p_training_no_hrs8 = $_POST['p_training_no_hrs8'];
			$p_training_sponsor8 = $_POST['p_training_sponsor8'];
			//training programs to db
			if(($p_training_date_from8 == "" || $p_training_date_to8 =="" || $p_training_no_hrs8 =="")||($p_training_date_from8 == "" && $p_training_date_to8 =="" && $p_training_no_hrs8 =="")){
			$trainig_query8="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title8',conducted_sponsor_by='$p_training_sponsor8' WHERE emp_id='$emp_id' && count='$count8'";
			mysql_query($trainig_query8)    or die(mysql_error());
			}else{
			$p_training_date_from8 = strtotime($p_training_date_from8);
			$p_training_date_from8 = date('Y-m-d',$p_training_date_from8);
			$p_training_date_to8 = strtotime($p_training_date_to8);
			$p_training_date_to8 = date('Y-m-d',$p_training_date_to8);
			$trainig_query8="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title8',inclusive_date_att_from='$p_training_date_from8',inclusive_date_att_to='$p_training_date_to8',no_of_hrs='$p_training_no_hrs8',conducted_sponsor_by='$p_training_sponsor8' WHERE emp_id='$emp_id' && count='$count8'";
			mysql_query($trainig_query8)    or die(mysql_error());
			}
			}
			//Training Experience 9
			if(isset($_POST['p_training_title9'])){
			$p_training_title9 = $_POST['p_training_title9'];
			$p_training_date_from9 = $_POST['p_training_date_from9'];
			$p_training_date_to9 =$_POST['p_training_date_to9'];
			$p_training_no_hrs9 = $_POST['p_training_no_hrs9'];
			$p_training_sponsor9 = $_POST['p_training_sponsor9'];
			//training programs to db
			if(($p_training_date_from9 == "" || $p_training_date_to9 =="" || $p_training_no_hrs9 =="")||($p_training_date_from9 == "" && $p_training_date_to9 =="" && $p_training_no_hrs9 =="")){
			$trainig_query9="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title9',conducted_sponsor_by='$p_training_sponsor9' WHERE emp_id='$emp_id' && count='$count9'";
			mysql_query($trainig_query9)    or die(mysql_error());
			}else{
			$p_training_date_from9 = strtotime($p_training_date_from9);
			$p_training_date_from9 = date('Y-m-d',$p_training_date_from9);
			$p_training_date_to9 = strtotime($p_training_date_to9);
			$p_training_date_to9 = date('Y-m-d',$p_training_date_to9);
			$trainig_query9="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title9',inclusive_date_att_from='$p_training_date_from9',inclusive_date_att_to='$p_training_date_to9',no_of_hrs='$p_training_no_hrs9',conducted_sponsor_by='$p_training_sponsor9' WHERE emp_id='$emp_id' && count='$count9'";
			mysql_query($trainig_query9)    or die(mysql_error());
			}
			}
			//Training Experience 10
			if(isset($_POST['p_training_title10'])){
			$p_training_title10 = $_POST['p_training_title10'];
			$p_training_date_from10 = $_POST['p_training_date_from10'];
			$p_training_date_to10 =$_POST['p_training_date_to10'];
			$p_training_no_hrs10 = $_POST['p_training_no_hrs10'];
			$p_training_sponsor10 = $_POST['p_training_sponsor10'];
			//training programs to db
			if(($p_training_date_from10 == "" || $p_training_date_to10 =="" || $p_training_no_hrs10 =="")||($p_training_date_from10 == "" && $p_training_date_to10 =="" && $p_training_no_hrs10 =="")){
			$trainig_query10="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title10',conducted_sponsor_by='$p_training_sponsor10' WHERE emp_id='$emp_id' && count='$count10'";
			mysql_query($trainig_query10)    or die(mysql_error());
			}else{
			$p_training_date_from10 = strtotime($p_training_date_from10);
			$p_training_date_from10 = date('Y-m-d',$p_training_date_from10);
			$p_training_date_to10 = strtotime($p_training_date_to10);
			$p_training_date_to10 = date('Y-m-d',$p_training_date_to10);
			$trainig_query10="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title10',inclusive_date_att_from='$p_training_date_from10',inclusive_date_att_to='$p_training_date_to10',no_of_hrs='$p_training_no_hrs10',conducted_sponsor_by='$p_training_sponsor10' WHERE emp_id='$emp_id' && count='$count10'";
			mysql_query($trainig_query10)    or die(mysql_error());
			}
			}
			//Training Experience 11
			if(isset($_POST['p_training_title11'])){
			$p_training_title11 = $_POST['p_training_title11'];
			$p_training_date_from11 = $_POST['p_training_date_from11'];
			$p_training_date_to11 =$_POST['p_training_date_to11'];
			$p_training_no_hrs11 = $_POST['p_training_no_hrs11'];
			$p_training_sponsor11 = $_POST['p_training_sponsor11'];
			//training programs to db
			if(($p_training_date_from11 == "" || $p_training_date_to11 =="" || $p_training_no_hrs11 =="")||($p_training_date_from11 == "" && $p_training_date_to11 =="" && $p_training_no_hrs11 =="")){
			$trainig_query11="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title11',conducted_sponsor_by='$p_training_sponsor11' WHERE emp_id='$emp_id' && count='$count11'";
			mysql_query($trainig_query11)    or die(mysql_error());
			}else{
			$p_training_date_from11 = strtotime($p_training_date_from11);
			$p_training_date_from11 = date('Y-m-d',$p_training_date_from11);
			$p_training_date_to11 = strtotime($p_training_date_to11);
			$p_training_date_to11 = date('Y-m-d',$p_training_date_to11);
			$trainig_query11="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title11',inclusive_date_att_from='$p_training_date_from11',inclusive_date_att_to='$p_training_date_to11',no_of_hrs='$p_training_no_hrs11',conducted_sponsor_by='$p_training_sponsor11' WHERE emp_id='$emp_id' && count='$count11'";
			mysql_query($trainig_query11)    or die(mysql_error());
			}
			}
			//Training Experience 12
			if(isset($_POST['p_training_title12'])){
			$p_training_title12 = $_POST['p_training_title12'];
			$p_training_date_from12 = $_POST['p_training_date_from12'];
			$p_training_date_to12 =$_POST['p_training_date_to12'];
			$p_training_no_hrs12 = $_POST['p_training_no_hrs12'];
			$p_training_sponsor12 = $_POST['p_training_sponsor12'];
			//training programs to db
			if(($p_training_date_from12 == "" || $p_training_date_to12 =="" || $p_training_no_hrs12 =="")||($p_training_date_from12 == "" && $p_training_date_to12 =="" && $p_training_no_hrs12 =="")){
			$trainig_query12="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title12',conducted_sponsor_by='$p_training_sponsor12' WHERE emp_id='$emp_id' && count='$count12'";
			mysql_query($trainig_query12)    or die(mysql_error());
			}else{
			$p_training_date_from12 = strtotime($p_training_date_from12);
			$p_training_date_from12 = date('Y-m-d',$p_training_date_from12);
			$p_training_date_to12 = strtotime($p_training_date_to12);
			$p_training_date_to12 = date('Y-m-d',$p_training_date_to12);
			$trainig_query12="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title12',inclusive_date_att_from='$p_training_date_from12',inclusive_date_att_to='$p_training_date_to12',no_of_hrs='$p_training_no_hrs12',conducted_sponsor_by='$p_training_sponsor12' WHERE emp_id='$emp_id' && count='$count12'";
			mysql_query($trainig_query12)    or die(mysql_error());
			}
			}
			//Training Experience 13
			if(isset($_POST['p_training_title13'])){
			$p_training_title13 = $_POST['p_training_title13'];
			$p_training_date_from13 = $_POST['p_training_date_from13'];
			$p_training_date_to13 =$_POST['p_training_date_to13'];
			$p_training_no_hrs13 = $_POST['p_training_no_hrs13'];
			$p_training_sponsor13 = $_POST['p_training_sponsor13'];
			//training programs to db
			if(($p_training_date_from13 == "" || $p_training_date_to13 =="" || $p_training_no_hrs13 =="")||($p_training_date_from13 == "" && $p_training_date_to13 =="" && $p_training_no_hrs13 =="")){
			$trainig_query13="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title13',conducted_sponsor_by='$p_training_sponsor13' WHERE emp_id='$emp_id' && count='$count13'";
			mysql_query($trainig_query13)    or die(mysql_error());
			}else{
			$p_training_date_from13 = strtotime($p_training_date_from13);
			$p_training_date_from13 = date('Y-m-d',$p_training_date_from13);
			$p_training_date_to13 = strtotime($p_training_date_to13);
			$p_training_date_to13 = date('Y-m-d',$p_training_date_to13);
			$trainig_query13="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title13',inclusive_date_att_from='$p_training_date_from13',inclusive_date_att_to='$p_training_date_to13',no_of_hrs='$p_training_no_hrs13',conducted_sponsor_by='$p_training_sponsor13' WHERE emp_id='$emp_id' && count='$count13'";
			mysql_query($trainig_query13)    or die(mysql_error());
			}
			}
			//Training Experience 14
			if(isset($_POST['p_training_title14'])){
			$p_training_title14 = $_POST['p_training_title14'];
			$p_training_date_from14 = $_POST['p_training_date_from14'];
			$p_training_date_to14 =$_POST['p_training_date_to14'];
			$p_training_no_hrs14 = $_POST['p_training_no_hrs14'];
			$p_training_sponsor14 = $_POST['p_training_sponsor14'];
			//training programs to db
			if(($p_training_date_from14 == "" || $p_training_date_to14 =="" || $p_training_no_hrs14 =="")||($p_training_date_from14 == "" && $p_training_date_to14 =="" && $p_training_no_hrs14 =="")){
			$trainig_query14="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title14',conducted_sponsor_by='$p_training_sponsor14' WHERE emp_id='$emp_id' && count='$count14'";
			mysql_query($trainig_query14)    or die(mysql_error());
			}else{
			$p_training_date_from14 = strtotime($p_training_date_from14);
			$p_training_date_from14 = date('Y-m-d',$p_training_date_from14);
			$p_training_date_to14 = strtotime($p_training_date_to14);
			$p_training_date_to14 = date('Y-m-d',$p_training_date_to14);
			$trainig_query14="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title14',inclusive_date_att_from='$p_training_date_from14',inclusive_date_att_to='$p_training_date_to14',no_of_hrs='$p_training_no_hrs14',conducted_sponsor_by='$p_training_sponsor14' WHERE emp_id='$emp_id' && count='$count14'";
			mysql_query($trainig_query14)    or die(mysql_error());
			}
			}
			//Training Experience 15
			if(isset($_POST['p_training_title15'])){
			$p_training_title15 = $_POST['p_training_title15'];
			$p_training_date_from15 = $_POST['p_training_date_from15'];
			$p_training_date_to15 =$_POST['p_training_date_to15'];
			$p_training_no_hrs15 = $_POST['p_training_no_hrs15'];
			$p_training_sponsor15 = $_POST['p_training_sponsor15'];
			//training programs to db
			if(($p_training_date_from15 == "" || $p_training_date_to15 =="" || $p_training_no_hrs15 =="")||($p_training_date_from15 == "" && $p_training_date_to15 =="" && $p_training_no_hrs15 =="")){
			$trainig_query15="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title15',conducted_sponsor_by='$p_training_sponsor15' WHERE emp_id='$emp_id' && count='$count15'";
			mysql_query($trainig_query15)    or die(mysql_error());
			}else{
			$p_training_date_from15 = strtotime($p_training_date_from15);
			$p_training_date_from15 = date('Y-m-d',$p_training_date_from15);
			$p_training_date_to15 = strtotime($p_training_date_to15);
			$p_training_date_to15 = date('Y-m-d',$p_training_date_to15);
			$trainig_query15="UPDATE eis_training_program_t SET title_of_seminar='$p_training_title15',inclusive_date_att_from='$p_training_date_from15',inclusive_date_att_to='$p_training_date_to15',no_of_hrs='$p_training_no_hrs15',conducted_sponsor_by='$p_training_sponsor15' WHERE emp_id='$emp_id' && count='$count15'";
			mysql_query($trainig_query15)    or die(mysql_error());
			}
			}
			
			
			
			
			
//other info

//other info 2

//other info 3

//other info 4

//other info 5


			
			//other_info 1 to db
			//other info 1
			if(isset($_POST['p_hobbies1']) || isset($_POST['p_recognition1']) || isset($_POST['p_organization1'])){
				$p_hobbies1 = $_POST['p_hobbies1'];
				$p_recognition1 = $_POST['p_recognition1'];
				$p_organization1 = $_POST['p_organization1'];
			$o_info1 ="UPDATE eis_other_info1_t SET special_skills='$p_hobbies1',recognition='$p_recognition1',organization='$p_organization1' WHERE emp_id='$emp_id' && count='$count1'";
			mysql_query($o_info1) or die(mysql_error());
			}
			if(isset($_POST['p_hobbies2']) || isset($_POST['p_recognition2']) || isset($_POST['p_organization2'])){
				$p_hobbies2 = $_POST['p_hobbies2'];
				$p_recognition2 = $_POST['p_recognition2'];
				$p_organization2 = $_POST['p_organization2'];
			$o_info2 ="UPDATE eis_other_info1_t SET special_skills='$p_hobbies2',recognition='$p_recognition2',organization='$p_organization2' WHERE emp_id='$emp_id' && count='$count2'";
			mysql_query($o_info2) or die(mysql_error());
			}
			if(isset($_POST['p_hobbies3']) || isset($_POST['p_recognition3']) || isset($_POST['p_organization3'])){
				$p_hobbies3 = $_POST['p_hobbies3'];
				$p_recognition3 = $_POST['p_recognition3'];
				$p_organization3 = $_POST['p_organization3'];
			$o_info3 ="UPDATE eis_other_info1_t SET special_skills='$p_hobbies3',recognition='$p_recognition3',organization='$p_organization3' WHERE emp_id='$emp_id' && count='$count3'";
			mysql_query($o_info3) or die(mysql_error());
			}
			if(isset($_POST['p_hobbies4']) || isset($_POST['p_recognition4']) || isset($_POST['p_organization4'])){
				$p_hobbies4 = $_POST['p_hobbies4'];
				$p_recognition4 = $_POST['p_recognition4'];
				$p_organization4 = $_POST['p_organization4'];
			$o_info4 ="UPDATE eis_other_info1_t SET special_skills='$p_hobbies4',recognition='$p_recognition4',organization='$p_organization4' WHERE emp_id='$emp_id' && count='$count4'";
			mysql_query($o_info4) or die(mysql_error());
			}
			if(isset($_POST['p_hobbies5']) || isset($_POST['p_recognition5']) || isset($_POST['p_organization5'])){
			$p_hobbies5 = $_POST['p_hobbies5'];
			$p_recognition5 = $_POST['p_recognition5'];
			$p_organization5 = $_POST['p_organization5'];
			$o_info5 ="UPDATE eis_other_info1_t SET special_skills='$p_hobbies5',recognition='$p_recognition5',organization='$p_organization5' WHERE emp_id='$emp_id' && count='$count5'";
			mysql_query($o_info5) or die(mysql_error());
			}
			
			
			//reference to db
	if(isset($_POST['ref_name1']) || isset($_POST['ref_add1']) || isset($_POST['ref_tel1'])){		
	$ref_name1 = $_POST['ref_name1'];
	$ref_add1 = $_POST['ref_add1'];
	$ref_tel1 = $_POST['ref_tel1'];
	$query="UPDATE eis_reference_t SET name='$ref_name1',address='$ref_add1',tel_no='$ref_tel1' WHERE emp_id='$emp_id' && count='$count1'";
	mysql_query($query) or die(mysql_error());
	}
	if(isset($_POST['ref_name2']) || isset($_POST['ref_add2']) || isset($_POST['ref_tel2'])){
	$ref_name2 = $_POST['ref_name2'];
	$ref_add2 = $_POST['ref_add2'];
	$ref_tel2 = $_POST['ref_tel2'];
	$query="UPDATE eis_reference_t SET name='$ref_name2',address='$ref_add2',tel_no='$ref_tel2' WHERE emp_id='$emp_id' && count='$count2'";
	mysql_query($query) or die(mysql_error());
	}
	if(isset($_POST['ref_name3']) || isset($_POST['ref_add3']) || isset($_POST['ref_tel3'])){
	$ref_name3 = $_POST['ref_name3'];
	$ref_add3 = $_POST['ref_add3'];
	$ref_tel3 = $_POST['ref_tel3'];
	$query="UPDATE eis_reference_t SET name='$ref_name3',address='$ref_add3',tel_no='$ref_tel3' WHERE emp_id='$emp_id' && count='$count3'";
	mysql_query($query) or die(mysql_error());	
	}
		
		
		echo'<script language="javascript">
		alert(\'Profile Updated!\');
		</script>';
			?>
         <script type="text/javascript">
       	  window.close().location = 'eis_admin_view_emp.php?emp_id=<?php echo $emp_id;?>';
		 $.jGrowl('Profile Added', { header: 'Success' });
		 
    	 </script>
	<?php	
		
	}
}	
?>