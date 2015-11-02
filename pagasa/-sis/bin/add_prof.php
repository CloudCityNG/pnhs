<?php
include ('../config.php');

	if(isset($_POST['save'])){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$name_extension = $_POST['name_extension'];
		
		$bdate = strtotime($_POST['bdate']);
		
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
		$place_of_birth = $_POST['place_of_birth'];
		$gender = $_POST['p_sex'];
		$civil_status = $_POST['civil_status'];
		$citizenship = $_POST['citizenship'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$bloodtype = $_POST['bloodtype'];
		$gsis_id_no = $_POST['gsis_id_no'];
		$pagibig_id_no = $_POST['pagibig_id_no'];
		$philhealth_no = $_POST['philhealth_no'];
		$sss_no = $_POST['sss_no'];
		$residential_address = $_POST['residential_address'];
		$permanent_address = $_POST['permanent_address'];
		$zipcode1 = $_POST['zipcode1'];
		$zipcode2 = $_POST['zipcode2'];
		//$tel_no1 = $_POST['tel_no1'];
		$tel_no2 = $_POST['tel_no2'];
		$contact_no = $_POST['contact_no'];
		$email = $_POST['email'];
		$agency_employee_no = $_POST['agency_employee_no'];
		$tin = $_POST['tin'];
		$spouse_fname = $_POST['spouse_fname'];
		$spouse_mname = $_POST['spouse_mname'];
		$spouse_lname = $_POST['spouse_lname'];
		$spouse_occupation = $_POST['spouse_occupation'];
		$spouse_bus_name = $_POST['spouse_bus_name'];
		$spouse_bus_add = $_POST['spouse_bus_add'];
		//$spouse_bus_tel_no = $_POST['spouse_bus_tel_no'];
		$father_fname = $_POST['father_fname'];
		$father_mname = $_POST['father_mname'];
		$father_lname = $_POST['father_lname'];
		$mother_maiden_name = $_POST['mother_maiden_name'];
		$mother_fname = $_POST['mother_fname'];
		$mother_mname = $_POST['mother_mname'];
		$mother_lname = $_POST['mother_lname'];
		
		
		$userID = $_POST['user'];
		$pass = $_POST['pass'];
		$user_type= $_POST['user_type'];
		$position =$_POST['position'];
		//$status =$_POST['status'];
		$subject = $_POST['subject'];
			// INSERT ACCOUNT
			if($position == 'Principal'){
			$type = 'admin';
			}else { $type = 'employee'; }
			$addLoginquery ="INSERT INTO account_t(username,password,type) VALUES('$userID','$pass','$type')";
			mysql_query($addLoginquery)    or die(mysql_error());
		
		
		$user_type= $_POST['user_type'];
		if($user_type== 'Teaching'){
			$teaching = 1; } else { $teaching = 0; }
			if($user_type== 'Non-Teaching'){
			$nonteaching = 1; } else { $nonteaching = 0; }
			
		// INSERT INFORMATION
		$insert = "INSERT INTO employee_t(f_name, m_name, l_name, name_extension, b_date, age, place_of_birth, gender, civil_status, citizenship, height, weight, blood_type, gsis_id_no, pag_ibig_id_no, philhealth_id_no, sss_id_no, address, zip_code, contact_no1, contact_no2, e_add1, tin, sf_name, sm_name, sl_name, ff_name, fm_name, fl_name, mf_name, mm_name, ml_name, mmaiden_name, position, teaching, non_teaching, account_no ) VALUES ('$fname', '$mname', '$lname', '$name_extension', '$p_bdate', '$age', '$place_of_birth', '$gender', '$civil_status', '$citizenship', '$height', '$weight', '$bloodtype', '$gsis_id_no', '$pagibig_id_no', '$philhealth_no', '$sss_no', '$residential_address', '$zipcode1', '$tel_no2', '$contact_no', '$email', '$tin', '$spouse_fname', '$spouse_mname', '$spouse_lname', '$father_fname', '$father_mname', '$father_lname', '$mother_fname', '$mother_mname', '$mother_lname', '$mother_maiden_name','$position','$teaching','$nonteaching',LAST_INSERT_ID())";
		mysql_query($insert) or die(mysql_error());
		
		// INSERT LEAVE CREDITS
		$vacation_bal = 15;
			$sick_bal = 15;
			$total = $vacation_bal+$sick_bal;
			$leave = "INSERT INTO eis_leave_credits_t(emp_id,vacation_bal,sick_bal,leave_balance) VALUES(LAST_INSERT_ID(),'$vacation_bal','$sick_bal','$total')";
			mysql_query($leave) or die(mysql_error());
			
		// INSERT TEACHING AND NON TEACHING STAFF
		if($user_type== 'Teaching'){
			$teaching = "INSERT INTO teaching_staff_t(emp_id) VALUES(LAST_INSERT_ID())";
			mysql_query($teaching) or die(mysql_error());
			} else { 
			$nonteaching = "INSERT INTO non_teaching_staff_t(emp_id) VALUES(LAST_INSERT_ID())";
			mysql_query($nonteaching) or die(mysql_error());}
			
		// INSERT IMAGE
		$img_name = $_FILES["dpic_usr"]["name"];
		$type = $_FILES["dpic_usr"]["type"];
		$size = $_FILES["dpic_usr"]["size"];
		$temp = $_FILES["dpic_usr"]["tmp_name"];
		$error = $_FILES["dpic_usr"]["error"];
		move_uploaded_file($temp,"../include/dpic/".$img_name);
				// *** Include the class
				include("resize-class.php");

				// *** 1) Initialise / load image
				$resizeObj = new resize('../include/dpic/'.$img_name);

				// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				$resizeObj -> resizeImage(137, 175, 'crop');

				// *** 3) Save image
				$resizeObj -> saveImage('../include/dpic/'.$img_name, 100);
			//query img to db

			$usr_img ="INSERT INTO eis_pic_t(emp_id,pic_name) VALUES(LAST_INSERT_ID(),'$img_name')";
			mysql_query($usr_img) or die(mysql_error());
		
/* START */		
		
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




	//eis_child_t
	$child1_name =$_POST['child1_name'];
	$child2_name =$_POST['child2_name'];
	$child3_name =$_POST['child3_name'];
	$child4_name =$_POST['child4_name'];
	$child5_name =$_POST['child5_name'];
	$child6_name =$_POST['child6_name'];
	$child7_name =$_POST['child7_name'];
	$child8_name =$_POST['child8_name'];
	$child9_name =$_POST['child9_name'];
	$child10_name =$_POST['child10_name'];
	$child11_name =$_POST['child11_name'];
	$child12_name =$_POST['child12_name'];
	//eis_child_t bday
	$child_bday1 =	$_POST['child_bday1'];
	$child_bday2 =	$_POST['child_bday2'];
	$child_bday3 =	$_POST['child_bday3'];
	$child_bday4 =	$_POST['child_bday4'];
	$child_bday5 =	$_POST['child_bday5'];
	$child_bday6 =	$_POST['child_bday6'];
	$child_bday7 =	$_POST['child_bday7'];
	$child_bday8 =	$_POST['child_bday8'];
	$child_bday9 =	$_POST['child_bday9'];
	$child_bday10 =	$_POST['child_bday10'];
	$child_bday11 =	$_POST['child_bday11'];
	$child_bday12 =	$_POST['child_bday12'];

	
		
				//eis_child_t1 
				if($child_bday1==""){
				$child_query1="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child1_name','$count1')";
				mysql_query($child_query1)    or die(mysql_error());
				}else{
				$child_bday1 = strtotime($_POST['child_bday1']);
				$child_bday1 = date('Y-m-d',$child_bday1);
				$child_query1="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child1_name','$child_bday1','$count1')";
				mysql_query($child_query1)    or die(mysql_error());
				}
				//p_child2 
				if($child_bday2==""){
				$child_query2="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child2_name','$count2')";
				mysql_query($child_query2)    or die(mysql_error());
				}else{
				$child_bday2 =  strtotime($_POST['child_bday2']);
				$child_bday2 = date('Y-m-d',$child_bday2);
				$child_query2="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child2_name','$child_bday2','$count2')";
				mysql_query($child_query2)    or die(mysql_error());
				}
				//p_child3 
				if($child_bday3==""){
				$child_query3="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child3_name','$count3')";
				mysql_query($child_query3)    or die(mysql_error());
				}else{
				$child_bday3 = strtotime($_POST['child_bday3']);
				$child_bday3 = date('Y-m-d',$child_bday3);
				$child_query3="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child3_name','$child_bday3','$count3')";
				mysql_query($child_query3)    or die(mysql_error());
				}
				//p_child4
				if($child_bday4==""){
				$child_query4="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child4_name','$count4')";
				mysql_query($child_query4)    or die(mysql_error());
				}else{
				$child_bday4 = strtotime($_POST['child_bday4']);
				$child_bday4 = date('Y-m-d',$child_bday4);
				$child_query4="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child4_name','$child_bday4','$count4')";
				mysql_query($child_query4)    or die(mysql_error());
				}
				//p_child5
				if($child_bday5==""){
				$child_query5="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child5_name','$count5')";
				mysql_query($child_query5)    or die(mysql_error());
				}else{	
				$child_bday5 = strtotime($_POST['child_bday5']);
				$child_bday5 = date('Y-m-d',$child_bday5);
				$child_query5="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child5_name','$child_bday5','$count5')";
				mysql_query($child_query5)    or die(mysql_error());
				}
				//p_child6
				if($child_bday6==""){
				$child_query6="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child6_name','$count6')";
				mysql_query($child_query6)    or die(mysql_error());
				}else{
				$child_bday6 = strtotime($_POST['child_bday6']);
				$child_bday5 = date('Y-m-d',$child_bday6);
				$child_query6="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child6_name','$child_bday6','$count6')";
				mysql_query($child_query6)    or die(mysql_error());
				}
				//p_child7
				if($child_bday7==""){
				$child_query7="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child7_name','$count7')";
				mysql_query($child_query7)    or die(mysql_error());
				}else{
				$child_bday7 = strtotime($_POST['child_bday7']);
				$child_bday7 = date('Y-m-d',$child_bday7);
				$child_query7="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child7_name','$child_bday7','$count7')";
				mysql_query($child_query7)    or die(mysql_error());
				}
				//p_child8
				if($child_bday8==""){
				$child_query8="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child8_name','$count8')";
				mysql_query($child_query8)    or die(mysql_error());
				}else{
				$child_bday8 = strtotime($_POST['child_bday8']);
				$child_bday8 = date('Y-m-d',$child_bday8);
				$child_query8="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child8_name','$phild_bday8','$count8')";
				mysql_query($child_query8)    or die(mysql_error());
				}
				//p_child9
				if($child_bday9==""){
				$child_query9="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child9_name','$count9')";
				mysql_query($child_query9)    or die(mysql_error());
				}else{
				$child_bday9 = strtotime($_POST['child_bday9']);
				$child_bday9 = date('Y-m-d',$child_bday9);
				$child_query9="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child9_name','$child_bday9','$count9')";
				mysql_query($child_query9)    or die(mysql_error());
				}
				//p_child10
				if($child_bday10==""){
				$child_query10="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child10_name','$count10')";
				mysql_query($child_query10)    or die(mysql_error());
				}else{
				$child_bday10 = strtotime($_POST['child_bday10']);
				$child_bday10 = date('Y-m-d',$child_bday10);
				$child_query10="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child10_name','$child_bday10','$count10')";
				mysql_query($child_query10)    or die(mysql_error());
				}
				//p_child11
				if($child_bday11==""){
				$child_query11="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child11_name','$count11')";
				mysql_query($child_query11)    or die(mysql_error());
				}else{
				$child_bday11 = strtotime($_POST['child_bday11']);
				$child_bday11 = date('Y-m-d',$child_bday11);
				$child_query11="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child11_name','$child_bday11','$count11')";
				mysql_query($child_query11)    or die(mysql_error());
				}
				//p_child12
				if($child_bday11==""){
				$child_query12="INSERT INTO eis_child_t(emp_id,child_name,count) VALUES(LAST_INSERT_ID(),'$child12_name','$count12')";
				mysql_query($child_query12)    or die(mysql_error());
				}else{
				$child_bday12 = strtotime($_POST['child_bday12']);
				$child_bday12 = date('Y-m-d',$child_bday12);
				$child_query12="INSERT INTO eis_child_t(emp_id,child_name,child_bdate,count) VALUES(LAST_INSERT_ID(),'$child12_name','$child_bday12','$count12')";
				mysql_query($child_query12)    or die(mysql_error());
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
		$elem_school_name = $_POST['elem_school_name'];
		$elem_degree = $_POST['elem_degree'];
		$elem_year_grad = $_POST['elem_year_grad'];
		$elem_highest_grade = $_POST['elem_highest_grade'];
		$elem_attendance_from =$_POST['elem_attendance_from'];
		$elem_attendance_to = $_POST['elem_attendance_to'];
		$elem_scholarship = $_POST['elem_scholarship'];	
		$level=$school_level['elementary'];
		
		if(($elem_attendance_from == "" || $elem_attendance_to =="" || $year_grad_elem="") ||($elem_attendance_from == "" && $elem_attendance_to =="" && $elem_year_grad=="")){
			$elemquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$elem_school_name','$elem_degree','$elem_highest_grade','$elem_scholarship','$level')";  	  
			mysql_query($elemquery) or die(mysql_error());
		}
		else{
			$elemquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$elem_school_name','$elem_degree','$elem_year_grad','$elem_highest_grade','$elem_attendance_from','$elem_attendance_to','$elem_scholarship','$level')";  	  
			mysql_query($elemquery)    or die(mysql_error());
		}
		
		 //declaration for secondary
		$second_school_name = $_POST['second_school_name'];
		$second_degree = $_POST['second_degree'];
		$second_year_grad = $_POST['second_year_grad'];
		$second_highest_grade = $_POST['second_highest_grade'];
		$second_attendance_from = $_POST['second_attendance_from'];
		$second_attendance_to =$_POST['second_attendance_to'];
		$second_scholarship = $_POST['second_scholarship'];
		$level=$school_level['secondary'];
		
		if(($second_attendance_from == "" || $second_attendance_to == "" || $second_year_grad=="") ||($second_attendance_from == "" && $second_attendance_to == "" && $second_year_grad=="")){
			$secondquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$second_school_name','$second_degree','$second_highest_grade','$second_scholarship','$level')"; 
			mysql_query($secondquery)    or die(mysql_error()); 
		}
		
		
		else{
			$secondquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$second_school_name','$second_degree','$second_year_grad','$second_highest_grade','$second_attendance_from','$second_attendance_to','$second_scholarship','$level')"; 
			mysql_query($secondquery)    or die(mysql_error());
		}
			
		//declaration for vocational
		$voc_school_name = $_POST['voc_school_name'];
		$voc_degree = $_POST['voc_degree'];
		$voc_year_grad = $_POST['voc_year_grad'];
		$voc_highest_grade = $_POST['voc_highest_grade'];
		$voc_attendance_from =$_POST['voc_attendance_from'];
		$voc_attendance_to = $_POST['voc_attendance_to'];
		$voc_scholarship = $_POST['voc_scholarship'];
		$level=$school_level['vocational'];
		
		if(($voc_attendance_from =="" || $voc_attendance_to =="" ||$voc_year_grad =="")||($voc_attendance_from =="" && $voc_attendance_to =="" && $voc_year_grad =="")){
			$vocquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$voc_school_name','$voc_degree','$voc_highest_grade','$elem_scholarship','$level')"; 
			mysql_query($vocquery)    or die(mysql_error());
		}
		else{
			$vocquery ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$voc_school_name','$voc_degree','$voc_year_grad','$voc_highest_grade','$voc_attendance_from','$voc_attendance_to ','$elem_scholarship','$level')"; 
			mysql_query($vocquery)    or die(mysql_error()); 	
		}
			
		//declaration for college1
		$col1_school_name = $_POST['col1_school_name'];
		$col1_degree = $_POST['col1_degree'];
		$col1_year_grad = $_POST['col1_year_grad'];
		$col1_highest_grade = $_POST['col1_highest_grade'];
		$col1_attendance_from = $_POST['col1_attendance_from'];
		$col1_attendance_to =$_POST['col1_attendance_to'];
		$col1_scholarship = $_POST['col1_scholarship'];
		$level=$school_level['college1'];
		
		if(($col1_attendance_from =="" ||$col1_attendance_to =="" || $col1_year_grad="") || ($col1_attendance_from =="" && $col1_attendance_to =="" && $col1_year_grad="")){
			$col1query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$col1_school_name','$col1_degree','$col1_highest_grade','$col1_scholarship','$level')"; 
			mysql_query($col1query)    or die(mysql_error()); 
		}
		else{
			$col1query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$col1_school_name','$col1_degree','$col1_year_grad','$col1_highest_grade','$col1_attendance_from','$col1_attendance_to','$col1_scholarship','$level')"; 
			mysql_query($col1query)    or die(mysql_error()); 
			}

		//declaration for college2
		$col2_school_name = $_POST['col2_school_name'];
		$col2_degree = $_POST['col2_degree'];
		$col2_year_grad = $_POST['col2_year_grad'];
		$col2_highest_grade = $_POST['col2_highest_grade'];
		$col2_attendance_from = $_POST['col2_attendance_from'];
		$col2_attendance_to = $_POST['col2_attendance_to'];
		$col2_scholarship = $_POST['col2_scholarship'];
		$level=$school_level['college2'];
		
		if(($col2_attendance_from=="" || $col2_attendance_to =="" || $col2_year_grad=="")||($col2_attendance_from=="" && $col2_attendance_to =="" && $col2_year_grad=="")){
			$col2query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$col2_school_name','$col2_degree','$col2_highest_grade','$col2_scholarship','$level')"; 
			mysql_query($col2query)    or die(mysql_error()); 	
		}
		else{
			$col2query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$col2_school_name','$col2_degree','$col2_year_grad','$col2_highest_grade','$col2_attendance_from','$col2_attendance_to','$col2_scholarship','$level')"; 
			mysql_query($col2query)    or die(mysql_error()); 	
		}
		
		//declaration for gs1
		$grad1_school_name = $_POST['grad1_school_name'];
		$grad1_degree = $_POST['grad1_degree'];
		$grad1_year_grad = $_POST['grad1_year_grad'];
		$grad1_highest_grade = $_POST['grad1_highest_grade'];
		$grad1_attendance_from = $_POST['grad1_attendance_from'];
		$grad1_attendance_to = $_POST['grad1_attendance_to'];
		$grad1_scholarship = $_POST['grad1_scholarship'];
		$level=$school_level['gs1'];
		
		if(($grad1_attendance_from=="" || $grad1_attendance_to=="" ||$grad1_year_grad =="")||($grad1_attendance_from=="" && $grad1_attendance_to=="" && $grad1_year_grad =="")){
			$gs1query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$grad1_school_name','$grad1_degree','$grad1_highest_grade','$grad1_scholarship','$level')";  
			mysql_query($gs1query)    or die(mysql_error());
		}
		else{
			$gs1query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$grad1_school_name','$grad1_degree','$grad1_year_grad','$grad1_highest_grade','$grad1_attendance_from','$grad1_attendance_to','$grad1_scholarship','$level')";  
			mysql_query($gs1query)    or die(mysql_error());	
		}
		
		//declaration for gs2
		$grad2_school_name = $_POST['grad2_school_name'];
		$grad2_degree = $_POST['grad2_degree'];
		$grad2_year_grad = $_POST['grad2_year_grad'];
		$grad2_highest_grade = $_POST['grad2_highest_grade'];
		$grad2_attendance_from =$_POST['grad2_attendance_from'];
		$grad2_attendance_to =$_POST['grad2_attendance_to'];
		$grad2_scholarship = $_POST['grad2_scholarship'];		
		$level=$school_level['gs2'];
		
		if(($grad2_attendance_from =="" || $grad2_attendance_to =="" ||$grad2_year_grad=="")||($grad2_attendance_from =="" && $grad2_attendance_to =="" && $grad2_year_grad=="")){
			$gs2query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,highest_grade_earned,scholarship,level) VALUES(LAST_INSERT_ID(),'$grad2_school_name','$grad2_degree','$grad2_highest_grade','$grad2_scholarship','$level')";  	 
			mysql_query($gs2query)    or die(mysql_error());
		}
		else{
			$gs2query ="INSERT INTO eis_educ_bg_t(emp_id,name_of_school,degree_course,year_graduated,highest_grade_earned,inclusive_date_att_from,inclusive_date_att_to,scholarship,level) VALUES(LAST_INSERT_ID(),'$grad2_school_name','$grad2_degree','$grad2_year_grad','$grad2_highest_grade','$grad2_attendance_from','$grad2_attendance_to','$grad2_scholarship','$level')";  	 
			mysql_query($gs2query)    or die(mysql_error());
		}
		
		//civil service eligibility
		//declaration of career service 1
		$career_service_1 = $_POST['career_service_1'];
		$career_rating_1 = $_POST['career_rating_1'];
		$date_exam1 =$_POST['date_exam1'];
		$place_exam1 = $_POST['place_exam1'];
		$license_no1 = $_POST['license_no1'];
		$license_date_rel1 = $_POST['license_date_rel1'];
	  //civil service elgibility to database
	  if(($date_exam1 =="" || $license_date_rel1 =="") ||($date_exam1 =="" && $license_date_rel1 =="")){
		$career1query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_1','$career_rating_1','$place_exam1','$license_no1','$count1')";
		mysql_query($career1query) or die(mysql_error());
		}else{
		$date_exam1 = strtotime($date_exam1);
		$date_exam1 = date('Y-m-d',$date_exam1);
		$license_date_rel1 =strtotime($license_date_rel1);
		$license_date_rel1 = date('Y-m-d',$license_date_rel1);
		$career1query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_1','$career_rating_1','$date_exam1','$place_exam1','$license_no1','$license_date_rel1','$count1')";
		mysql_query($career1query) or die(mysql_error());
		}	
			
			
		//declaration of career service 2
		$career_service_2 = $_POST['career_service_2'];
		$career_rating_2 = $_POST['career_rating_2'];
		$date_exam2 =$_POST['date_exam2'];
		$place_exam2 = $_POST['place_exam2'];
		$license_no2 = $_POST['license_no2'];
		$license_date_rel2 = $_POST['license_date_rel2'];
	  //civil service elgibility to database
	  if(($date_exam2 =="" || $license_date_rel2 =="") ||($p_date_exam2 =="" && $p_license_date_rel2 =="")){
		$career2query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_2','$career_rating_2','$place_exam2','$license_no2','$count2')";
		mysql_query($career2query) or die(mysql_error());
		}else{
		$date_exam2 = strtotime($date_exam2);
		$date_exam2 = date('Y-m-d',$date_exam2);
		$license_date_rel2 =strtotime($license_date_rel2);
		$license_date_rel2 = date('Y-m-d',$license_date_rel2);
		$career2query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_2','$career_rating_2','$date_exam2','$place_exam2','$license_no2','$license_date_rel2','$count2')";
		mysql_query($career2query) or die(mysql_error());
		}
		
		//declaration of career service 3
		$career_service_3 = $_POST['career_service_3'];
		$career_rating_3 = $_POST['career_rating_3'];
		$date_exam3 =$_POST['date_exam3'];
		$place_exam3 = $_POST['place_exam3'];
		$license_no3 = $_POST['license_no3'];
		$license_date_rel3 = $_POST['license_date_rel3'];
	  //civil service elgibility to database
	  if(($date_exam3 =="" || $license_date_rel3 =="") ||($date_exam3 =="" && $license_date_rel3 =="")){
		$career3query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_3','$career_rating_3','$place_exam3','$license_no3','$count3')";
		mysql_query($career3query) or die(mysql_error());
		}else{
		$date_exam3 = strtotime($date_exam3);
		$date_exam3 = date('Y-m-d',$date_exam3);
		$license_date_rel3 =strtotime($license_date_rel3);
		$license_date_rel3 = date('Y-m-d',$license_date_rel3);
		$career3query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_3','$career_rating_3','$date_exam3','$place_exam3','$license_no3','$license_date_rel3','$count3')";
		mysql_query($career3query) or die(mysql_error());
		}
		
		//declaration of career service 4
		$career_service_4 = $_POST['career_service_4'];
		$career_rating_4 = $_POST['career_rating_4'];
		$date_exam4 =$_POST['date_exam4'];
		$place_exam4 = $_POST['place_exam4'];
		$license_no4 = $_POST['license_no4'];
		$license_date_rel4 = $_POST['license_date_rel4'];
	  //civil service elgibility to database
	  if(($date_exam4 =="" || $license_date_rel4 =="") ||($date_exam4 =="" && $license_date_rel4 =="")){
		$career4query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_4','$career_rating_4','$place_exam4','$license_no4','$count4')";
		mysql_query($career4query) or die(mysql_error());
		}else{
		$date_exam4 = strtotime($date_exam4);
		$date_exam4 = date('Y-m-d',$date_exam4);
		$license_date_rel4 =strtotime($license_date_rel4);
		$license_date_rel4 = date('Y-m-d',$license_date_rel4);
		$career4query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_4','$career_rating_4','$date_exam4','$place_exam4','$license_no4','$license_date_rel4','$count4')";
		mysql_query($career4query) or die(mysql_error());
		}
		
		//declaration of career service 5
		$career_service_5 = $_POST['career_service_5'];
		$career_rating_5 = $_POST['career_rating_5'];
		$date_exam5 =$_POST['date_exam5'];
		$place_exam5 = $_POST['place_exam5'];
		$license_no5 = $_POST['license_no5'];
		$license_date_rel5 = $_POST['license_date_rel5'];
	  //civil service elgibility to database
	  if(($date_exam5 =="" || $license_date_rel5 =="") ||($date_exam5 =="" && $license_date_rel5 =="")){
		$career5query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_5','$career_rating_5','$place_exam5','$license_no5','$count5')";
		mysql_query($career5query) or die(mysql_error());
		}else{
		$date_exam5 = strtotime($date_exam5);
		$date_exam5 = date('Y-m-d',$date_exam5);
		$license_date_rel5 =strtotime($license_date_rel5);
		$license_date_rel5 = date('Y-m-d',$license_date_rel5);
		$career5query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_5','$career_rating_5','$date_exam5','$place_exam5','$license_no5','$license_date_rel5','$count5')";
		mysql_query($career5query) or die(mysql_error());
		}
		
		//declaration of career service 6
		$career_service_6 = $_POST['career_service_6'];
		$career_rating_6 = $_POST['career_rating_6'];
		$date_exam6 =$_POST['date_exam6'];
		$place_exam6 = $_POST['place_exam6'];
		$license_no6 = $_POST['license_no6'];
		$license_date_rel6 = $_POST['license_date_rel6'];
	  //civil service elgibility to database
	  if(($date_exam6 =="" || $license_date_rel6 =="") ||($date_exam6 =="" && $license_date_rel6 =="")){
		$career6query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_6','$career_rating_6','$place_exam6','$license_no6','$count6')";
		mysql_query($career6query) or die(mysql_error());
		}else{
		$date_exam6 = strtotime($date_exam6);
		$date_exam6 = date('Y-m-d',$date_exam6);
		$license_date_rel6 =strtotime($license_date_rel6);
		$license_date_rel6 = date('Y-m-d',$license_date_rel6);
		$career6query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_6','$career_rating_6','$date_exam6','$place_exam6','$license_no6','$license_date_rel6','$count6')";
		mysql_query($career6query) or die(mysql_error());
		}
		
		//declaration of career service 7
		$career_service_7 = $_POST['career_service_7'];
		$career_rating_7 = $_POST['career_rating_7'];
		$date_exam7 =$_POST['date_exam7'];
		$place_exam7 = $_POST['place_exam7'];
		$license_no7 = $_POST['license_no7'];
		$license_date_rel7 = $_POST['license_date_rel7'];
	  //civil service elgibility to database
	  if(($date_exam7 =="" || $license_date_rel7 =="") ||($date_exam7 =="" && $license_date_rel7 =="")){
		$career7query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_7','$career_rating_7','$place_exam7','$license_no7','$count7')";
		mysql_query($career7query) or die(mysql_error());
		}else{
		$date_exam7 = strtotime($date_exam7);
		$date_exam7 = date('Y-m-d',$date_exam7);
		$license_date_rel7 =strtotime($license_date_rel7);
		$license_date_rel7 = date('Y-m-d',$license_date_rel7);
		$career7query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_7','$career_rating_7','$date_exam7','$place_exam7','$license_no7','$license_date_rel7','$count7')";
		mysql_query($career7query) or die(mysql_error());
		}
		
		//declaration of career service 8
		$career_service_8 = $_POST['career_service_8'];
		$career_rating_8 = $_POST['career_rating_8'];
		$date_exam8 =$_POST['date_exam8'];
		$place_exam8 = $_POST['place_exam8'];
		$license_no8 = $_POST['license_no8'];
		$license_date_rel8 = $_POST['license_date_rel8'];
	  //civil service elgibility to database
	  if(($date_exam8 =="" || $license_date_rel8 =="") ||($date_exam8 =="" && $license_date_rel8 =="")){
		$career8query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,place_of_exam,license_no,count) VALUES(LAST_INSERT_ID(),'$career_service_8','$career_rating_8','$place_exam8','$license_no8','$count8')";
		mysql_query($career8query) or die(mysql_error());
		}else{
		$date_exam8 = strtotime($date_exam8);
		$date_exam8 = date('Y-m-d',$date_exam8);
		$license_date_rel8 =strtotime($license_date_rel8);
		$license_date_rel8 = date('Y-m-d',$license_date_rel8);
		$career8query ="INSERT INTO eis_civ_service_t(emp_id,career_service,rating,date_of_exam,place_of_exam,license_no,license_date_release,count) VALUES(LAST_INSERT_ID(),'$career_service_8','$career_rating_8','$date_exam8','$place_exam8','$license_no8','$license_date_rel8','$count8')";
		mysql_query($career8query) or die(mysql_error());
		}
		
		
			
			
			
			
		
	//work experience
	//declaration for work experience 1
	$work_date_from1=$_POST['work_date_from1'];
	$work_date_to1 =$_POST['work_date_to1'];
	$work_pos_title1 = $_POST['work_pos_title1'];
	$work_agency1 = $_POST['work_agency1'];
	$work_mon_salary1 = $_POST['work_mon_salary1'];
	$work_salary_grade1 = $_POST['work_salary_grade1'];
	$work_status_appoint1 = $_POST['work_status_appoint1'];
	$gov_service1 = $_POST['gov_service1'];
	//work experience to db
	if(($work_date_from1 == ""|| $work_date_to1 =="" || $work_mon_salary1 =="")||($work_date_from1 == "" && $work_date_to1 =="" && $work_mon_salary1 =="")){
			$work_query1 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title1','$work_agency1','$work_salary_grade1','$work_status_appoint1','$gov_service1','$count1')";		
			mysql_query($work_query1)    or die(mysql_error());
			}else{
			$work_date_from1 = strtotime($work_date_from1);
			$work_date_from1 = date('Y-m-d',$work_date_from1);
			$work_date_to1 = strtotime($work_date_to1);
			$work_date_to1 = date('Y-m-d',$work_date_to1);
			$work_query1 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from1','$work_date_to1','$work_pos_title1','$work_agency1','$work_mon_salary1','$work_salary_grade1','$work_status_appoint1','$gov_service1','$count1')";		
			mysql_query($work_query1)    or die(mysql_error());
			}
	//declaration for work experience 2
	$work_date_from2=$_POST['work_date_from2'];
	$work_date_to2 =$_POST['work_date_to2'];
	$work_pos_title2 = $_POST['work_pos_title2'];
	$work_agency2 = $_POST['work_agency2'];
	$work_mon_salary2 = $_POST['work_mon_salary2'];
	$work_salary_grade2 = $_POST['work_salary_grade2'];
	$work_status_appoint2 = $_POST['work_status_appoint2'];
	$gov_service2 = $_POST['gov_service2'];
	//work experience to db
	if(($work_date_from2 == ""|| $work_date_to2 =="" || $work_mon_salary2 =="")||($work_date_from2 == "" && $work_date_to2 =="" && $work_mon_salary2 =="")){
			$work_query2 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title2','$work_agency2','$work_salary_grade2','$work_status_appoint2','$gov_service2','$count2')";		
			mysql_query($work_query2)    or die(mysql_error());
			}else{
			$work_date_from2 = strtotime($work_date_from2);
			$work_date_from2 = date('Y-m-d',$work_date_from2);
			$work_date_to2 = strtotime($work_date_to2);
			$work_date_to2 = date('Y-m-d',$work_date_to2);
			$work_query2 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from2','$work_date_to2','$work_pos_title2','$work_agency2','$work_mon_salary2','$work_salary_grade2','$work_status_appoint2','$gov_service2','$count2')";		
			mysql_query($work_query2)    or die(mysql_error());
			}
	//declaration for work experience 3
	$work_date_from3=$_POST['work_date_from3'];
	$work_date_to3 =$_POST['work_date_to3'];
	$work_pos_title3 = $_POST['work_pos_title3'];
	$work_agency3 = $_POST['work_agency3'];
	$work_mon_salary3 = $_POST['work_mon_salary3'];
	$work_salary_grade3 = $_POST['work_salary_grade3'];
	$work_status_appoint3 = $_POST['work_status_appoint3'];
	$gov_service3 = $_POST['gov_service3'];
	//work experience to db
	if(($work_date_from3 == ""|| $work_date_to3 =="" || $work_mon_salary3 =="")||($work_date_from3 == "" && $work_date_to3 =="" && $work_mon_salary3 =="")){
			$work_query3 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title3','$work_agency3','$work_salary_grade3','$work_status_appoint3','$gov_service3','$count3')";		
			mysql_query($work_query3)    or die(mysql_error());
			}else{
			$work_date_from3 = strtotime($work_date_from3);
			$work_date_from3 = date('Y-m-d',$work_date_from3);
			$work_date_to3 = strtotime($work_date_to3);
			$work_date_to3 = date('Y-m-d',$work_date_to3);
			$work_query3 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from3','$work_date_to3','$work_pos_title3','$work_agency3','$work_mon_salary3','$work_salary_grade3','$work_status_appoint3','$gov_service3','$count3')";		
			mysql_query($work_query3)    or die(mysql_error());
			}		
	//declaration for work experience 4
	$work_date_from4=$_POST['work_date_from4'];
	$work_date_to4 =$_POST['work_date_to4'];
	$work_pos_title4 = $_POST['work_pos_title4'];
	$work_agency4 = $_POST['work_agency4'];
	$work_mon_salary4 = $_POST['work_mon_salary4'];
	$work_salary_grade4 = $_POST['work_salary_grade4'];
	$work_status_appoint4 = $_POST['work_status_appoint4'];
	$gov_service4 = $_POST['gov_service4'];
	//work experience to db
	if(($work_date_from4 == ""|| $work_date_to4 =="" || $work_mon_salary4 =="")||($work_date_from4 == "" && $work_date_to4 =="" && $work_mon_salary4 =="")){
			$work_query4 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title4','$work_agency4','$work_salary_grade4','$work_status_appoint4','$gov_service4','$count4')";		
			mysql_query($work_query4)    or die(mysql_error());
			}else{
			$work_date_from4 = strtotime($work_date_from4);
			$work_date_from4 = date('Y-m-d',$work_date_from4);
			$work_date_to4 = strtotime($work_date_to4);
			$work_date_to4 = date('Y-m-d',$work_date_to4);
			$work_query4 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from4','$work_date_to4','$work_pos_title4','$work_agency4','$work_mon_salary4','$work_salary_grade4','$work_status_appoint4','$gov_service4','$count4')";		
			mysql_query($work_query4)    or die(mysql_error());
			}		
	//declaration for work experience 5
	$work_date_from5=$_POST['work_date_from5'];
	$work_date_to5 =$_POST['work_date_to5'];
	$work_pos_title5 = $_POST['work_pos_title5'];
	$work_agency5 = $_POST['work_agency5'];
	$work_mon_salary5 = $_POST['work_mon_salary5'];
	$work_salary_grade5 = $_POST['work_salary_grade5'];
	$work_status_appoint5 = $_POST['work_status_appoint5'];
	$gov_service5 = $_POST['gov_service5'];
	//work experience to db
	if(($work_date_from5 == ""|| $work_date_to5 =="" || $work_mon_salary5 =="")||($work_date_from5 == "" && $work_date_to5 =="" && $work_mon_salary5 =="")){
			$work_query5 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title5','$work_agency5','$work_salary_grade5','$work_status_appoint5','$gov_service5','$count5')";		
			mysql_query($work_query5)    or die(mysql_error());
			}else{
			$work_date_from5 = strtotime($work_date_from5);
			$work_date_from5 = date('Y-m-d',$work_date_from5);
			$work_date_to5 = strtotime($work_date_to5);
			$work_date_to5 = date('Y-m-d',$work_date_to5);
			$work_query5 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from5','$work_date_to5','$work_pos_title5','$work_agency5','$work_mon_salary5','$work_salary_grade5','$work_status_appoint5','$gov_service5','$count5')";		
			mysql_query($work_query5)    or die(mysql_error());
			}		
	//declaration for work experience 6
	$work_date_from6=$_POST['work_date_from6'];
	$work_date_to6 =$_POST['work_date_to6'];
	$work_pos_title6 = $_POST['work_pos_title6'];
	$work_agency6 = $_POST['work_agency6'];
	$work_mon_salary6 = $_POST['work_mon_salary6'];
	$work_salary_grade6 = $_POST['work_salary_grade6'];
	$work_status_appoint6 = $_POST['work_status_appoint6'];
	$gov_service6 = $_POST['gov_service6'];
	//work experience to db
	if(($work_date_from6 == ""|| $work_date_to6 =="" || $work_mon_salary6 =="")||($work_date_from6 == "" && $work_date_to6 =="" && $work_mon_salary6 =="")){
			$work_query6 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title6','$work_agency6','$work_salary_grade6','$work_status_appoint6','$gov_service6','$count6')";		
			mysql_query($work_query6)    or die(mysql_error());
			}else{
			$work_date_from6 = strtotime($work_date_from6);
			$work_date_from6 = date('Y-m-d',$work_date_from6);
			$work_date_to6 = strtotime($work_date_to6);
			$work_date_to6 = date('Y-m-d',$work_date_to6);
			$work_query6 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from6','$work_date_to6','$work_pos_title6','$work_agency6','$work_mon_salary6','$work_salary_grade6','$work_status_appoint6','$gov_service6','$count6')";		
			mysql_query($work_query6)    or die(mysql_error());
			}
	//declaration for work experience 7
	$work_date_from7=$_POST['work_date_from7'];
	$work_date_to7 =$_POST['work_date_to7'];
	$work_pos_title7 = $_POST['work_pos_title7'];
	$work_agency7 = $_POST['work_agency7'];
	$work_mon_salary7 = $_POST['work_mon_salary7'];
	$work_salary_grade7 = $_POST['work_salary_grade7'];
	$work_status_appoint7 = $_POST['work_status_appoint7'];
	$gov_service7 = $_POST['gov_service7'];
	//work experience to db
	if(($work_date_from7 == ""|| $work_date_to7 =="" || $work_mon_salary7 =="")||($work_date_from7 == "" && $work_date_to7 =="" && $work_mon_salary7 =="")){
			$work_query7 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title7','$work_agency7','$work_salary_grade7','$work_status_appoint7','$gov_service7','$count7')";		
			mysql_query($work_query7)    or die(mysql_error());
			}else{
			$work_date_from7 = strtotime($work_date_from7);
			$work_date_from7 = date('Y-m-d',$work_date_from7);
			$work_date_to7 = strtotime($work_date_to7);
			$work_date_to7 = date('Y-m-d',$work_date_to7);
			$work_query7 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from7','$work_date_to7','$work_pos_title7','$work_agency7','$work_mon_salary7','$work_salary_grade7','$work_status_appoint7','$gov_service7','$count7')";		
			mysql_query($work_query7)    or die(mysql_error());
			}
	//declaration for work experience 8
	$work_date_from8=$_POST['work_date_from8'];
	$work_date_to8 =$_POST['work_date_to8'];
	$work_pos_title8 = $_POST['work_pos_title8'];
	$work_agency8 = $_POST['work_agency8'];
	$work_mon_salary8 = $_POST['work_mon_salary8'];
	$work_salary_grade8 = $_POST['work_salary_grade8'];
	$work_status_appoint8 = $_POST['work_status_appoint8'];
	$gov_service8 = $_POST['gov_service8'];
	//work experience to db
	if(($work_date_from8 == ""|| $work_date_to8 =="" || $work_mon_salary8 =="")||($work_date_from8 == "" && $work_date_to8 =="" && $work_mon_salary8 =="")){
			$work_query8 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title8','$work_agency8','$work_salary_grade8','$work_status_appoint8','$gov_service8','$count8')";		
			mysql_query($work_query8)    or die(mysql_error());
			}else{
			$work_date_from8 = strtotime($work_date_from8);
			$work_date_from8 = date('Y-m-d',$work_date_from8);
			$work_date_to8 = strtotime($work_date_to8);
			$work_date_to8 = date('Y-m-d',$work_date_to8);
			$work_query8 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from8','$work_date_to8','$work_pos_title8','$work_agency8','$work_mon_salary8','$work_salary_grade8','$work_status_appoint8','$gov_service8','$count8')";		
			mysql_query($work_query8)    or die(mysql_error());
			}
	//declaration for work experience 9
	$work_date_from9=$_POST['work_date_from9'];
	$work_date_to9 =$_POST['work_date_to9'];
	$work_pos_title9 = $_POST['work_pos_title9'];
	$work_agency9 = $_POST['work_agency9'];
	$work_mon_salary9 = $_POST['work_mon_salary9'];
	$work_salary_grade9 = $_POST['work_salary_grade9'];
	$work_status_appoint9 = $_POST['work_status_appoint9'];
	$gov_service9 = $_POST['gov_service9'];
	//work experience to db
	if(($work_date_from9 == ""|| $work_date_to9 =="" || $work_mon_salary9 =="")||($work_date_from9 == "" && $work_date_to9 =="" && $work_mon_salary9 =="")){
			$work_query9 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title9','$work_agency9','$work_salary_grade9','$work_status_appoint9','$gov_service9','$count9')";		
			mysql_query($work_query9)    or die(mysql_error());
			}else{
			$work_date_from9 = strtotime($work_date_from9);
			$work_date_from9 = date('Y-m-d',$work_date_from9);
			$work_date_to9 = strtotime($work_date_to9);
			$work_date_to9 = date('Y-m-d',$work_date_to9);
			$work_query9 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from9','$work_date_to9','$work_pos_title9','$work_agency9','$work_mon_salary9','$work_salary_grade9','$work_status_appoint9','$gov_service9','$count9')";		
			mysql_query($work_query9)    or die(mysql_error());
			}
	//declaration for work experience 10
	$work_date_from10=$_POST['work_date_from10'];
	$work_date_to10 =$_POST['work_date_to10'];
	$work_pos_title10 = $_POST['work_pos_title10'];
	$work_agency10 = $_POST['work_agency10'];
	$work_mon_salary10 = $_POST['work_mon_salary10'];
	$work_salary_grade10 = $_POST['work_salary_grade10'];
	$work_status_appoint10 = $_POST['work_status_appoint10'];
	$gov_service10 = $_POST['gov_service10'];
	//work experience to db
	if(($work_date_from10 == ""|| $work_date_to10 =="" || $work_mon_salary10 =="")||($work_date_from10 == "" && $work_date_to10 =="" && $work_mon_salary10 =="")){
			$work_query10 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title10','$work_agency10','$work_salary_grade10','$work_status_appoint10','$gov_service10','$count10')";		
			mysql_query($work_query10)    or die(mysql_error());
			}else{
			$work_date_from10 = strtotime($work_date_from10);
			$work_date_from10 = date('Y-m-d',$work_date_from10);
			$work_date_to10 = strtotime($work_date_to10);
			$work_date_to10 = date('Y-m-d',$work_date_to10);
			$work_query10 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from10','$work_date_to10','$work_pos_title10','$work_agency10','$work_mon_salary10','$work_salary_grade10','$work_status_appoint10','$gov_service10','$count10')";		
			mysql_query($work_query10)    or die(mysql_error());
			}
	//declaration for work experience 11
	$work_date_from11=$_POST['work_date_from11'];
	$work_date_to11 =$_POST['work_date_to11'];
	$work_pos_title11 = $_POST['work_pos_title11'];
	$work_agency11 = $_POST['work_agency11'];
	$work_mon_salary11 = $_POST['work_mon_salary11'];
	$work_salary_grade11 = $_POST['work_salary_grade11'];
	$work_status_appoint11 = $_POST['work_status_appoint11'];
	$gov_service11 = $_POST['gov_service11'];
	//work experience to db
	if(($work_date_from11 == ""|| $work_date_to11 =="" || $work_mon_salary11 =="")||($work_date_from11 == "" && $work_date_to11 =="" && $work_mon_salary11 =="")){
			$work_query11 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title11','$work_agency11','$work_salary_grade11','$work_status_appoint11','$gov_service11','$count11')";		
			mysql_query($work_query11)    or die(mysql_error());
			}else{
			$work_date_from11 = strtotime($work_date_from11);
			$work_date_from11 = date('Y-m-d',$work_date_from11);
			$work_date_to11 = strtotime($work_date_to11);
			$work_date_to11 = date('Y-m-d',$work_date_to11);
			$work_query11 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from11','$work_date_to11','$work_pos_title11','$work_agency11','$work_mon_salary11','$work_salary_grade11','$work_status_appoint11','$gov_service11','$count11')";		
			mysql_query($work_query11)    or die(mysql_error());
			}
	//declaration for work experience 12
	$work_date_from12=$_POST['work_date_from12'];
	$work_date_to12 =$_POST['work_date_to12'];
	$work_pos_title12 = $_POST['work_pos_title12'];
	$work_agency12 = $_POST['work_agency12'];
	$work_mon_salary12 = $_POST['work_mon_salary12'];
	$work_salary_grade12 = $_POST['work_salary_grade12'];
	$work_status_appoint12 = $_POST['work_status_appoint12'];
	$gov_service12 = $_POST['gov_service12'];
	//work experience to db
	if(($work_date_from12 == ""|| $work_date_to12 =="" || $work_mon_salary12 =="")||($work_date_from12 == "" && $work_date_to12 =="" && $work_mon_salary12 =="")){
			$work_query12 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title12','$work_agency12','$work_salary_grade12','$work_status_appoint12','$gov_service12','$count12')";		
			mysql_query($work_query12)    or die(mysql_error());
			}else{
			$work_date_from12 = strtotime($work_date_from12);
			$work_date_from12 = date('Y-m-d',$work_date_from12);
			$work_date_to12 = strtotime($work_date_to12);
			$work_date_to12 = date('Y-m-d',$work_date_to12);
			$work_query12 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from12','$work_date_to12','$work_pos_title12','$work_agency12','$work_mon_salary12','$work_salary_grade12','$work_status_appoint12','$gov_service12','$count12')";		
			mysql_query($work_query12)    or die(mysql_error());
			}
	//declaration for work experience 13
	$work_date_from13=$_POST['work_date_from13'];
	$work_date_to13 =$_POST['work_date_to13'];
	$work_pos_title13 = $_POST['work_pos_title13'];
	$work_agency13 = $_POST['work_agency13'];
	$work_mon_salary13 = $_POST['work_mon_salary13'];
	$work_salary_grade13 = $_POST['work_salary_grade13'];
	$work_status_appoint13 = $_POST['work_status_appoint13'];
	$gov_service13 = $_POST['gov_service13'];
	//work experience to db
	if(($work_date_from13 == ""|| $work_date_to13 =="" || $work_mon_salary13 =="")||($work_date_from13 == "" && $work_date_to13 =="" && $work_mon_salary13 =="")){
			$work_query13 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title13','$work_agency13','$work_salary_grade13','$work_status_appoint13','$gov_service13','$count13')";		
			mysql_query($work_query13)    or die(mysql_error());
			}else{
			$work_date_from13 = strtotime($work_date_from13);
			$work_date_from13 = date('Y-m-d',$work_date_from13);
			$work_date_to13 = strtotime($work_date_to13);
			$work_date_to13 = date('Y-m-d',$work_date_to13);
			$work_query13 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from13','$work_date_to13','$work_pos_title13','$work_agency13','$work_mon_salary13','$work_salary_grade13','$work_status_appoint13','$gov_service13','$count13')";		
			mysql_query($work_query13)    or die(mysql_error());
			}
	//declaration for work experience 14
	$work_date_from14=$_POST['work_date_from14'];
	$work_date_to14 =$_POST['work_date_to14'];
	$work_pos_title14 = $_POST['work_pos_title14'];
	$work_agency14 = $_POST['work_agency14'];
	$work_mon_salary14 = $_POST['work_mon_salary14'];
	$work_salary_grade14 = $_POST['work_salary_grade14'];
	$work_status_appoint14 = $_POST['work_status_appoint14'];
	$gov_service14 = $_POST['gov_service14'];
	//work experience to db
	if(($work_date_from14 == ""|| $work_date_to14 =="" || $work_mon_salary14 =="")||($work_date_from14 == "" && $work_date_to14 =="" && $work_mon_salary14 =="")){
			$work_query14 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title14','$work_agency14','$work_salary_grade14','$work_status_appoint14','$gov_service14','$count14')";		
			mysql_query($work_query14)    or die(mysql_error());
			}else{
			$work_date_from14 = strtotime($work_date_from14);
			$work_date_from14 = date('Y-m-d',$work_date_from14);
			$work_date_to14 = strtotime($work_date_to14);
			$work_date_to14 = date('Y-m-d',$work_date_to14);
			$work_query14 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from14','$work_date_to14','$work_pos_title14','$work_agency14','$work_mon_salary14','$work_salary_grade14','$work_status_appoint14','$gov_service14','$count14')";		
			mysql_query($work_query14)    or die(mysql_error());
			}
	//declaration for work experience 15
	$work_date_from15=$_POST['work_date_from15'];
	$work_date_to15 =$_POST['work_date_to15'];
	$work_pos_title15 = $_POST['work_pos_title15'];
	$work_agency15 = $_POST['work_agency15'];
	$work_mon_salary15 = $_POST['work_mon_salary15'];
	$work_salary_grade15 = $_POST['work_salary_grade15'];
	$work_status_appoint15 = $_POST['work_status_appoint15'];
	$gov_service15 = $_POST['gov_service15'];
	//work experience to db
	if(($work_date_from15 == ""|| $work_date_to15 =="" || $work_mon_salary15 =="")||($work_date_from15 == "" && $work_date_to15 =="" && $work_mon_salary15 =="")){
			$work_query15 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title15','$work_agency15','$work_salary_grade15','$work_status_appoint15','$gov_service15','$count15')";		
			mysql_query($work_query15)    or die(mysql_error());
			}else{
			$work_date_from15 = strtotime($work_date_from15);
			$work_date_from15 = date('Y-m-d',$work_date_from15);
			$work_date_to15 = strtotime($work_date_to15);
			$work_date_to15 = date('Y-m-d',$work_date_to15);
			$work_query15 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from15','$work_date_to15','$work_pos_title15','$work_agency15','$work_mon_salary15','$work_salary_grade15','$work_status_appoint15','$gov_service15','$count15')";		
			mysql_query($work_query15)    or die(mysql_error());
			}
	//declaration for work experience 16
	$work_date_from16=$_POST['work_date_from16'];
	$work_date_to16 =$_POST['work_date_to16'];
	$work_pos_title16 = $_POST['work_pos_title16'];
	$work_agency16 = $_POST['work_agency16'];
	$work_mon_salary16 = $_POST['work_mon_salary16'];
	$work_salary_grade16 = $_POST['work_salary_grade16'];
	$work_status_appoint16 = $_POST['work_status_appoint16'];
	$gov_service16 = $_POST['gov_service16'];
	//work experience to db
	if(($work_date_from16 == ""|| $work_date_to16 =="" || $work_mon_salary16 =="")||($work_date_from16 == "" && $work_date_to16 =="" && $work_mon_salary16 =="")){
			$work_query16 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title16','$work_agency16','$work_salary_grade16','$work_status_appoint16','$gov_service16','$count16')";		
			mysql_query($work_query16)    or die(mysql_error());
			}else{
			$work_date_from16 = strtotime($work_date_from16);
			$work_date_from16 = date('Y-m-d',$work_date_from16);
			$work_date_to16 = strtotime($work_date_to16);
			$work_date_to16 = date('Y-m-d',$work_date_to16);
			$work_query16 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from16','$work_date_to16','$work_pos_title16','$work_agency16','$work_mon_salary16','$work_salary_grade16','$work_status_appoint16','$gov_service16','$count16')";		
			mysql_query($work_query16)    or die(mysql_error());
			}
	//declaration for work experience 17
	$work_date_from17=$_POST['work_date_from17'];
	$work_date_to17 =$_POST['work_date_to17'];
	$work_pos_title17 = $_POST['work_pos_title17'];
	$work_agency17 = $_POST['work_agency17'];
	$work_mon_salary17 = $_POST['work_mon_salary17'];
	$work_salary_grade17 = $_POST['work_salary_grade17'];
	$work_status_appoint17 = $_POST['work_status_appoint17'];
	$gov_service17 = $_POST['gov_service17'];
	//work experience to db
	if(($work_date_from17 == ""|| $work_date_to17 =="" || $work_mon_salary17 =="")||($work_date_from17 == "" && $work_date_to17 =="" && $work_mon_salary17 =="")){
			$work_query17 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title17','$work_agency17','$work_salary_grade17','$work_status_appoint17','$gov_service17','$count17')";		
			mysql_query($work_query17)    or die(mysql_error());
			}else{
			$work_date_from17 = strtotime($work_date_from17);
			$work_date_from17 = date('Y-m-d',$work_date_from17);
			$work_date_to17 = strtotime($work_date_to17);
			$work_date_to17 = date('Y-m-d',$work_date_to17);
			$work_query17 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from17','$work_date_to17','$work_pos_title17','$work_agency17','$work_mon_salary17','$work_salary_grade17','$work_status_appoint17','$gov_service17','$count7')";		
			mysql_query($work_query17)    or die(mysql_error());
			}
	//declaration for work experience 18
	$work_date_from18=$_POST['work_date_from18'];
	$work_date_to18 =$_POST['work_date_to18'];
	$work_pos_title18 = $_POST['work_pos_title18'];
	$work_agency18 = $_POST['work_agency18'];
	$work_mon_salary18 = $_POST['work_mon_salary18'];
	$work_salary_grade18 = $_POST['work_salary_grade18'];
	$work_status_appoint18 = $_POST['work_status_appoint18'];
	$gov_service18 = $_POST['gov_service18'];
	//work experience to db
	if(($work_date_from18 == ""|| $work_date_to18 =="" || $work_mon_salary18 =="")||($work_date_from18 == "" && $work_date_to18 =="" && $work_mon_salary18 =="")){
			$work_query18 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title18','$work_agency18','$work_salary_grade18','$work_status_appoint18','$gov_service18','$count18')";		
			mysql_query($work_query18)    or die(mysql_error());
			}else{
			$work_date_from18 = strtotime($work_date_from18);
			$work_date_from18 = date('Y-m-d',$work_date_from18);
			$work_date_to18 = strtotime($work_date_to18);
			$work_date_to18 = date('Y-m-d',$work_date_to18);
			$work_query18 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from18','$work_date_to18','$work_pos_title18','$work_agency18','$work_mon_salary18','$work_salary_grade18','$work_status_appoint18','$gov_service18','$count18')";		
			mysql_query($work_query18)    or die(mysql_error());
			}
	//declaration for work experience 19
	$work_date_from19=$_POST['work_date_from19'];
	$work_date_to19 =$_POST['work_date_to19'];
	$work_pos_title19 = $_POST['work_pos_title19'];
	$work_agency19 = $_POST['work_agency19'];
	$work_mon_salary19 = $_POST['work_mon_salary19'];
	$work_salary_grade19 = $_POST['work_salary_grade19'];
	$work_status_appoint19 = $_POST['work_status_appoint19'];
	$gov_service19 = $_POST['gov_service19'];
	//work experience to db
	if(($work_date_from19 == ""|| $work_date_to19 =="" || $work_mon_salary19 =="")||($work_date_from19 == "" && $work_date_to19 =="" && $work_mon_salary19 =="")){
			$work_query19 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title19','$work_agency19','$work_salary_grade19','$work_status_appoint19','$gov_service19','$count19')";		
			mysql_query($work_query19)    or die(mysql_error());
			}else{
			$work_date_from19 = strtotime($work_date_from19);
			$work_date_from19 = date('Y-m-d',$work_date_from19);
			$work_date_to19 = strtotime($work_date_to19);
			$work_date_to19 = date('Y-m-d',$work_date_to19);
			$work_query19 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from19','$work_date_to19','$work_pos_title19','$work_agency19','$work_mon_salary19','$work_salary_grade19','$work_status_appoint19','$gov_service19','$count19')";		
			mysql_query($work_query19)    or die(mysql_error());
			}
	//declaration for work experience 20
	$work_date_from20=$_POST['work_date_from20'];
	$work_date_to20 =$_POST['work_date_to20'];
	$work_pos_title20 = $_POST['work_pos_title20'];
	$work_agency20 = $_POST['work_agency20'];
	$work_mon_salary20 = $_POST['work_mon_salary20'];
	$work_salary_grade20 = $_POST['work_salary_grade20'];
	$work_status_appoint20 = $_POST['work_status_appoint20'];
	$gov_service20 = $_POST['gov_service20'];
	//work experience to db
	if(($work_date_from20 == ""|| $work_date_to20 =="" || $work_mon_salary20 =="")||($work_date_from20 == "" && $work_date_to20 =="" && $work_mon_salary20 =="")){
			$work_query20 ="INSERT INTO eis_work_experience_t(emp_id,position_title,dept_agency_office_company,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_pos_title20','$work_agency20','$work_salary_grade20','$work_status_appoint20','$gov_service20','$count20')";		
			mysql_query($work_query20)    or die(mysql_error());
			}else{
			$work_date_from20 = strtotime($work_date_from20);
			$work_date_from20 = date('Y-m-d',$work_date_from20);
			$work_date_to20 = strtotime($work_date_to20);
			$work_date_to20 = date('Y-m-d',$work_date_to20);
			$work_query20 ="INSERT INTO eis_work_experience_t(emp_id,inclusive_date_from,inclusive_date_to,position_title,dept_agency_office_company,monthly_salary,salary_grade_and_step_inc,status_of_appointment,govt_service,count) VALUES(LAST_INSERT_ID(),'$work_date_from20','$work_date_to20','$work_pos_title20','$work_agency20','$work_mon_salary20','$work_salary_grade20','$work_status_appoint20','$gov_service20','$count20')";		
			mysql_query($work_query20)    or die(mysql_error());
			}
			
			//voluntary work
			//p_voluntary_work 1
			$voluntary_name1 = $_POST['voluntary_name1'];
			$voluntary_date_from1 =$_POST['voluntary_date_from1'];
			$voluntary_date_to1 =$_POST['voluntary_date_to1'];
			$voluntary_no_hrs1 = $_POST['voluntary_no_hrs1'];
			$voluntary_position1 = $_POST['voluntary_position1'];
			//voluntary work to db
			if(($voluntary_date_from1 =="" || $voluntary_date_to1 =="" || $voluntary_no_hrs1 =="")||($voluntary_date_from1 =="" && $voluntary_date_to1 =="" && $voluntary_no_hrs1 =="")){
			$v_work1 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name1','$voluntary_position1','$count1')";
			mysql_query($v_work1) or die(mysql_error());
			}else{
			$voluntary_date_from1 = strtotime($_POST['voluntary_date_from1']);
			$voluntary_date_from1 = date('Y-m-d',$voluntary_date_from1);
			$voluntary_date_to1 = strtotime($_POST['voluntary_date_to1']);
			$voluntary_date_to1 = date('Y-m-d',$voluntary_date_to1);
			$v_work1 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,inclusive_date_from,inclusive_date_to,no_of_hrs,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name1','$voluntary_date_from1','$voluntary_date_to1','$voluntary_no_hrs1','$voluntary_position1','$count1')";
			mysql_query($v_work1) or die(mysql_error());
			}
			//voluntary_work 2
			$voluntary_name2 = $_POST['voluntary_name2'];
			$voluntary_date_from2 =$_POST['voluntary_date_from2'];
			$voluntary_date_to2 =$_POST['voluntary_date_to2'];
			$voluntary_no_hrs2 = $_POST['voluntary_no_hrs2'];
			$voluntary_position2 = $_POST['voluntary_position2'];
			//voluntary work to db
			if(($voluntary_date_from2 =="" || $voluntary_date_to2 =="" || $voluntary_no_hrs2 =="")||($voluntary_date_from2 =="" && $voluntary_date_to2 =="" && $voluntary_no_hrs2 =="")){
			$v_work2 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name2','$voluntary_position2','$count2')";
			mysql_query($v_work2) or die(mysql_error());
			}else{
			$voluntary_date_from2 = strtotime($_POST['voluntary_date_from2']);
			$voluntary_date_from2 = date('Y-m-d',$voluntary_date_from2);
			$voluntary_date_to2 = strtotime($_POST['voluntary_date_to2']);
			$voluntary_date_to2 = date('Y-m-d',$voluntary_date_to2);
			$v_work2 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,inclusive_date_from,inclusive_date_to,no_of_hrs,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name2','$voluntary_date_from2','$voluntary_date_to2','$voluntary_no_hrs2','$voluntary_position2','$count2')";
			mysql_query($v_work2) or die(mysql_error());
			}
			//voluntary_work 3
			$voluntary_name3 = $_POST['voluntary_name3'];
			$voluntary_date_from3 =$_POST['voluntary_date_from3'];
			$voluntary_date_to3 =$_POST['voluntary_date_to3'];
			$voluntary_no_hrs3 = $_POST['voluntary_no_hrs3'];
			$voluntary_position3 = $_POST['voluntary_position3'];
			//voluntary work to db
			if(($voluntary_date_from3 =="" || $voluntary_date_to3 =="" || $voluntary_no_hrs3 =="")||($voluntary_date_from3 =="" && $voluntary_date_to3 =="" && $voluntary_no_hrs3 =="")){
			$v_work3 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name3','$voluntary_position3','$count3')";
			mysql_query($v_work3) or die(mysql_error());
			}else{
			$voluntary_date_from3 = strtotime($_POST['voluntary_date_from3']);
			$voluntary_date_from3 = date('Y-m-d',$voluntary_date_from3);
			$voluntary_date_to3 = strtotime($_POST['voluntary_date_to3']);
			$voluntary_date_to3 = date('Y-m-d',$voluntary_date_to3);
			$v_work3 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,inclusive_date_from,inclusive_date_to,no_of_hrs,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name3','$voluntary_date_from3','$voluntary_date_to3','$voluntary_no_hrs3','$voluntary_position3','$count3')";
			mysql_query($v_work3) or die(mysql_error());
			}
			//voluntary_work 4
			$voluntary_name4 = $_POST['voluntary_name4'];
			$voluntary_date_from4 =$_POST['voluntary_date_from4'];
			$voluntary_date_to4 =$_POST['voluntary_date_to4'];
			$voluntary_no_hrs4 = $_POST['voluntary_no_hrs4'];
			$voluntary_position4 = $_POST['voluntary_position4'];
			//voluntary work to db
			if(($voluntary_date_from4 =="" || $voluntary_date_to4 =="" || $voluntary_no_hrs4 =="")||($voluntary_date_from4 =="" && $voluntary_date_to4 =="" && $voluntary_no_hrs4 =="")){
			$v_work4 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name4','$voluntary_position4','$count4')";
			mysql_query($v_work4) or die(mysql_error());
			}else{
			$voluntary_date_from4 = strtotime($_POST['voluntary_date_from4']);
			$voluntary_date_from4 = date('Y-m-d',$voluntary_date_from4);
			$voluntary_date_to4 = strtotime($_POST['voluntary_date_to4']);
			$voluntary_date_to4 = date('Y-m-d',$voluntary_date_to4);
			$v_work4 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,inclusive_date_from,inclusive_date_to,no_of_hrs,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name4','$voluntary_date_from4','$voluntary_date_to4','$voluntary_no_hrs4','$voluntary_position4','$count4')";
			mysql_query($v_work4) or die(mysql_error());
			}
			//voluntary_work 5
			$voluntary_name5 = $_POST['voluntary_name5'];
			$voluntary_date_from5 =$_POST['voluntary_date_from5'];
			$voluntary_date_to5 =$_POST['voluntary_date_to5'];
			$voluntary_no_hrs5 = $_POST['voluntary_no_hrs5'];
			$voluntary_position5 = $_POST['voluntary_position5'];
			//voluntary work to db
			if(($voluntary_date_from5 =="" || $voluntary_date_to5 =="" || $voluntary_no_hrs5 =="")||($voluntary_date_from5 =="" && $voluntary_date_to5 =="" && $voluntary_no_hrs5 =="")){
			$v_work5 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name5','$voluntary_position5','$count5')";
			mysql_query($v_work5) or die(mysql_error());
			}else{
			$voluntary_date_from5 = strtotime($_POST['voluntary_date_from5']);
			$voluntary_date_from5 = date('Y-m-d',$voluntary_date_from5);
			$voluntary_date_to5 = strtotime($_POST['voluntary_date_to5']);
			$voluntary_date_to5 = date('Y-m-d',$voluntary_date_to5);
			$v_work5 = "INSERT INTO eis_voluntary_work_t(emp_id,name_of_org,inclusive_date_from,inclusive_date_to,no_of_hrs,nature_of_work,count) VALUES(LAST_INSERT_ID(),'$voluntary_name5','$voluntary_date_from5','$voluntary_date_to5','$voluntary_no_hrs5','$voluntary_position5','$count5')";
			mysql_query($v_work5) or die(mysql_error());
			}
			
			//p_training experience
			//Training Experience 1
			$training_title1 = $_POST['training_title1'];
			$training_date_from1 = $_POST['training_date_from1'];
			$training_date_to1 =$_POST['training_date_to1'];
			$training_no_hrs1 = $_POST['training_no_hrs1'];
			$training_sponsor1 = $_POST['training_sponsor1'];
			//training programs to db
			if(($training_date_from1 == "" || $training_date_to1 =="" || $training_no_hrs1 =="")||($training_date_from1 == "" && $training_date_to1 =="" && $training_no_hrs1 =="")){
			$trainig_query1="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title1','$training_sponsor1','$count1')";
			mysql_query($trainig_query1)    or die(mysql_error());
			}else{
			$training_date_from1 = strtotime($training_date_from1);
			$training_date_from1 = date('Y-m-d',$training_date_from1);
			$training_date_to1 = strtotime($training_date_to1);
			$training_date_to1 = date('Y-m-d',$training_date_to1);
			$trainig_query1="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title1','$training_date_from1','$training_date_to1','$training_no_hrs1','$training_sponsor1','$count1')";
			mysql_query($trainig_query1)    or die(mysql_error());
			}
			//Training Experience 2
			$training_title2 = $_POST['training_title2'];
			$training_date_from2 = $_POST['training_date_from2'];
			$training_date_to2 =$_POST['training_date_to2'];
			$training_no_hrs2 = $_POST['training_no_hrs2'];
			$training_sponsor2 = $_POST['training_sponsor2'];
			//training programs to db
			if(($training_date_from2 == "" || $training_date_to2 =="" || $training_no_hrs2 =="")||($training_date_from2 == "" && $training_date_to2 =="" && $training_no_hrs2 =="")){
			$trainig_query2="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title2','$training_sponsor2','$count2')";
			mysql_query($trainig_query2)    or die(mysql_error());
			}else{
			$training_date_from2 = strtotime($training_date_from2);
			$training_date_from2 = date('Y-m-d',$training_date_from2);
			$training_date_to2 = strtotime($training_date_to2);
			$training_date_to2 = date('Y-m-d',$training_date_to2);
			$trainig_query2="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title2','$training_date_from2','$training_date_to2','$training_no_hrs2','$training_sponsor2','$count2')";
			mysql_query($trainig_query2)    or die(mysql_error());
			}
			//Training Experience 3
			$training_title3 = $_POST['training_title3'];
			$training_date_from3 = $_POST['training_date_from3'];
			$training_date_to3 =$_POST['training_date_to3'];
			$training_no_hrs3 = $_POST['training_no_hrs3'];
			$training_sponsor3 = $_POST['training_sponsor3'];
			//training programs to db
			if(($training_date_from3 == "" || $training_date_to3 =="" || $training_no_hrs3 =="")||($training_date_from3 == "" && $training_date_to3 =="" && $training_no_hrs3 =="")){
			$trainig_query3="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title3','$training_sponsor3','$count3')";
			mysql_query($trainig_query3)    or die(mysql_error());
			}else{
			$training_date_from3 = strtotime($training_date_from3);
			$training_date_from3 = date('Y-m-d',$training_date_from3);
			$training_date_to3 = strtotime($training_date_to3);
			$training_date_to3 = date('Y-m-d',$training_date_to3);
			$trainig_query3="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title3','$training_date_from3','$training_date_to3','$training_no_hrs3','$training_sponsor3','$count3')";
			mysql_query($trainig_query3)    or die(mysql_error());
			}
			//Training Experience 4
			$training_title4 = $_POST['training_title4'];
			$training_date_from4 = $_POST['training_date_from4'];
			$training_date_to4 =$_POST['training_date_to4'];
			$training_no_hrs4 = $_POST['training_no_hrs4'];
			$training_sponsor4 = $_POST['training_sponsor4'];
			//training programs to db
			if(($training_date_from4 == "" || $training_date_to4 =="" || $training_no_hrs4 =="")||($training_date_from4 == "" && $training_date_to4 =="" && $training_no_hrs4 =="")){
			$trainig_query4="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title4','$training_sponsor4','$count4')";
			mysql_query($trainig_query4)    or die(mysql_error());
			}else{
			$training_date_from4 = strtotime($training_date_from4);
			$training_date_from4 = date('Y-m-d',$training_date_from4);
			$training_date_to4 = strtotime($training_date_to4);
			$training_date_to4 = date('Y-m-d',$training_date_to4);
			$trainig_query4="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title4','$training_date_from4','$training_date_to4','$training_no_hrs4','$training_sponsor4','$count4')";
			mysql_query($trainig_query4)    or die(mysql_error());
			}
			//Training Experience 5
			$training_title5 = $_POST['training_title5'];
			$training_date_from5 = $_POST['training_date_from5'];
			$training_date_to5 =$_POST['training_date_to5'];
			$training_no_hrs5 = $_POST['training_no_hrs5'];
			$training_sponsor5 = $_POST['training_sponsor5'];
			//training programs to db
			if(($training_date_from5 == "" || $training_date_to5 =="" || $training_no_hrs5 =="")||($training_date_from5 == "" && $training_date_to5 =="" && $training_no_hrs5 =="")){
			$trainig_query5="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title5','$training_sponsor5','$count5')";
			mysql_query($trainig_query5)    or die(mysql_error());
			}else{
			$training_date_from5 = strtotime($training_date_from5);
			$training_date_from5 = date('Y-m-d',$training_date_from5);
			$training_date_to5 = strtotime($training_date_to5);
			$training_date_to5 = date('Y-m-d',$training_date_to5);
			$trainig_query5="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title5','$training_date_from5','$training_date_to5','$training_no_hrs5','$training_sponsor5','$count5')";
			mysql_query($trainig_query5)    or die(mysql_error());
			}
			//Training Experience 6
			$training_title6 = $_POST['training_title6'];
			$training_date_from6 = $_POST['training_date_from6'];
			$training_date_to6 =$_POST['training_date_to6'];
			$training_no_hrs6 = $_POST['training_no_hrs6'];
			$training_sponsor6 = $_POST['training_sponsor6'];
			//training programs to db
			if(($training_date_from6 == "" || $training_date_to6 =="" || $training_no_hrs6 =="")||($training_date_from6 == "" && $training_date_to6 =="" && $training_no_hrs6 =="")){
			$trainig_query6="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title6','$training_sponsor6','$count6')";
			mysql_query($trainig_query6)    or die(mysql_error());
			}else{
			$training_date_from6 = strtotime($training_date_from6);
			$training_date_from6 = date('Y-m-d',$training_date_from6);
			$training_date_to6 = strtotime($training_date_to6);
			$training_date_to6 = date('Y-m-d',$training_date_to6);
			$trainig_query6="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title6','$training_date_from6','$training_date_to6','$training_no_hrs6','$training_sponsor6','$count6')";
			mysql_query($trainig_query6)    or die(mysql_error());
			}
			//Training Experience 7
			$training_title7 = $_POST['training_title7'];
			$training_date_from7 = $_POST['training_date_from7'];
			$training_date_to7 =$_POST['training_date_to7'];
			$training_no_hrs7 = $_POST['training_no_hrs7'];
			$training_sponsor7 = $_POST['training_sponsor7'];
			//training programs to db
			if(($training_date_from7 == "" || $training_date_to7 =="" || $training_no_hrs7 =="")||($training_date_from7 == "" && $training_date_to7 =="" && $training_no_hrs7 =="")){
			$trainig_query7="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title7','$training_sponsor7','$count7')";
			mysql_query($trainig_query7)    or die(mysql_error());
			}else{
			$training_date_from7 = strtotime($training_date_from7);
			$training_date_from7 = date('Y-m-d',$training_date_from7);
			$training_date_to7 = strtotime($training_date_to7);
			$training_date_to7 = date('Y-m-d',$training_date_to7);
			$trainig_query7="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title7','$training_date_from7','$training_date_to7','$training_no_hrs7','$training_sponsor7','$count7')";
			mysql_query($trainig_query7)    or die(mysql_error());
			}
			//Training Experience 8
			$training_title8 = $_POST['training_title8'];
			$training_date_from8 = $_POST['training_date_from8'];
			$training_date_to8 =$_POST['training_date_to8'];
			$training_no_hrs8 = $_POST['training_no_hrs8'];
			$training_sponsor8 = $_POST['training_sponsor8'];
			//training programs to db
			if(($training_date_from8 == "" || $training_date_to8 =="" || $training_no_hrs8 =="")||($training_date_from8 == "" && $training_date_to8 =="" && $training_no_hrs8 =="")){
			$trainig_query8="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title8','$training_sponsor8','$count8')";
			mysql_query($trainig_query8)    or die(mysql_error());
			}else{
			$training_date_from8 = strtotime($training_date_from8);
			$training_date_from8 = date('Y-m-d',$training_date_from8);
			$training_date_to8 = strtotime($training_date_to8);
			$training_date_to8 = date('Y-m-d',$training_date_to8);
			$trainig_query8="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title8','$training_date_from8','$training_date_to8','$training_no_hrs8','$training_sponsor8','$count8')";
			mysql_query($trainig_query8)    or die(mysql_error());
			}
			//Training Experience 9
			$training_title9 = $_POST['training_title9'];
			$training_date_from9 = $_POST['training_date_from9'];
			$training_date_to9 =$_POST['training_date_to9'];
			$training_no_hrs9 = $_POST['training_no_hrs9'];
			$training_sponsor9 = $_POST['training_sponsor9'];
			//training programs to db
			if(($training_date_from9 == "" || $training_date_to9 =="" || $training_no_hrs9 =="")||($training_date_from9 == "" && $training_date_to9 =="" && $training_no_hrs9 =="")){
			$trainig_query9="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title9','$training_sponsor9','$count9')";
			mysql_query($trainig_query9)    or die(mysql_error());
			}else{
			$training_date_from9 = strtotime($training_date_from9);
			$training_date_from9 = date('Y-m-d',$training_date_from9);
			$training_date_to9 = strtotime($training_date_to9);
			$training_date_to9 = date('Y-m-d',$training_date_to9);
			$trainig_query9="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title9','$training_date_from9','$training_date_to9','$training_no_hrs9','$training_sponsor9','$count9')";
			mysql_query($trainig_query9)    or die(mysql_error());
			}
			//Training Experience 10
			$training_title10 = $_POST['training_title10'];
			$training_date_from10 = $_POST['training_date_from10'];
			$training_date_to10 =$_POST['training_date_to10'];
			$training_no_hrs10 = $_POST['training_no_hrs10'];
			$training_sponsor10 = $_POST['training_sponsor10'];
			//training programs to db
			if(($training_date_from10 == "" || $training_date_to10 =="" || $training_no_hrs10 =="")||($training_date_from10 == "" && $training_date_to10 =="" && $training_no_hrs10 =="")){
			$trainig_query10="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title10','$training_sponsor10','$count10')";
			mysql_query($trainig_query10)    or die(mysql_error());
			}else{
			$training_date_from10 = strtotime($training_date_from10);
			$training_date_from10 = date('Y-m-d',$training_date_from10);
			$training_date_to10 = strtotime($training_date_to10);
			$training_date_to10 = date('Y-m-d',$training_date_to10);
			$trainig_query10="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title10','$training_date_from10','$training_date_to10','$training_no_hrs10','$training_sponsor10','$count10')";
			mysql_query($trainig_query10)    or die(mysql_error());
			}
			//Training Experience 11
			$training_title11 = $_POST['training_title11'];
			$training_date_from11 = $_POST['training_date_from11'];
			$training_date_to11 =$_POST['training_date_to11'];
			$training_no_hrs11 = $_POST['training_no_hrs11'];
			$training_sponsor11 = $_POST['training_sponsor11'];
			//training programs to db
			if(($training_date_from11 == "" || $training_date_to11 =="" || $training_no_hrs11 =="")||($training_date_from11 == "" && $training_date_to11 =="" && $training_no_hrs11 =="")){
			$trainig_query11="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title11','$training_sponsor11','$count11')";
			mysql_query($trainig_query11)    or die(mysql_error());
			}else{
			$training_date_from11 = strtotime($training_date_from11);
			$training_date_from11 = date('Y-m-d',$training_date_from11);
			$training_date_to11 = strtotime($training_date_to11);
			$training_date_to11 = date('Y-m-d',$training_date_to11);
			$trainig_query11="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title11','$training_date_from11','$training_date_to11','$training_no_hrs11','$training_sponsor11','$count11')";
			mysql_query($trainig_query11)    or die(mysql_error());
			}
			//Training Experience 12
			$training_title12 = $_POST['training_title12'];
			$training_date_from12 = $_POST['training_date_from12'];
			$training_date_to12 =$_POST['training_date_to12'];
			$training_no_hrs12 = $_POST['training_no_hrs12'];
			$training_sponsor12 = $_POST['training_sponsor12'];
			//training programs to db
			if(($training_date_from12 == "" || $training_date_to12 =="" || $training_no_hrs12 =="")||($training_date_from12 == "" && $training_date_to12 =="" && $training_no_hrs12 =="")){
			$trainig_query12="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title12','$training_sponsor12','$count12')";
			mysql_query($trainig_query12)    or die(mysql_error());
			}else{
			$training_date_from12 = strtotime($training_date_from12);
			$training_date_from12 = date('Y-m-d',$training_date_from12);
			$training_date_to12 = strtotime($training_date_to12);
			$training_date_to12 = date('Y-m-d',$training_date_to12);
			$trainig_query12="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title12','$training_date_from12','$training_date_to12','$training_no_hrs12','$training_sponsor12','$count12')";
			mysql_query($trainig_query12)    or die(mysql_error());
			}
			//Training Experience 13
			$training_title13 = $_POST['training_title13'];
			$training_date_from13 = $_POST['training_date_from13'];
			$training_date_to13 =$_POST['training_date_to13'];
			$training_no_hrs13 = $_POST['training_no_hrs13'];
			$training_sponsor13 = $_POST['training_sponsor13'];
			//training programs to db
			if(($training_date_from13 == "" || $training_date_to13 =="" || $training_no_hrs13 =="")||($training_date_from13 == "" && $training_date_to13 =="" && $training_no_hrs13 =="")){
			$trainig_query13="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title13','$training_sponsor13','$count13')";
			mysql_query($trainig_query13)    or die(mysql_error());
			}else{
			$training_date_from13 = strtotime($training_date_from13);
			$training_date_from13 = date('Y-m-d',$training_date_from13);
			$training_date_to13 = strtotime($training_date_to13);
			$training_date_to13 = date('Y-m-d',$training_date_to13);
			$trainig_query13="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title13','$training_date_from13','$training_date_to13','$training_no_hrs13','$training_sponsor13','$count13')";
			mysql_query($trainig_query13)    or die(mysql_error());
			}
			//Training Experience 14
			$training_title14 = $_POST['training_title14'];
			$training_date_from14 = $_POST['training_date_from14'];
			$training_date_to14 =$_POST['training_date_to14'];
			$training_no_hrs14 = $_POST['training_no_hrs14'];
			$training_sponsor14 = $_POST['training_sponsor14'];
			//training programs to db
			if(($training_date_from14 == "" || $training_date_to14 =="" || $training_no_hrs14 =="")||($training_date_from14 == "" && $training_date_to14 =="" && $training_no_hrs14 =="")){
			$trainig_query14="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title14','$training_sponsor14','$count14')";
			mysql_query($trainig_query14)    or die(mysql_error());
			}else{
			$training_date_from14 = strtotime($training_date_from14);
			$training_date_from14 = date('Y-m-d',$training_date_from14);
			$training_date_to14 = strtotime($training_date_to14);
			$training_date_to14 = date('Y-m-d',$training_date_to14);
			$trainig_query14="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title14','$training_date_from14','$training_date_to14','$training_no_hrs14','$training_sponsor14','$count14')";
			mysql_query($trainig_query14)    or die(mysql_error());
			}
			//Training Experience 15
			$training_title15 = $_POST['training_title15'];
			$training_date_from15 = $_POST['training_date_from15'];
			$training_date_to15 =$_POST['training_date_to15'];
			$training_no_hrs15 = $_POST['training_no_hrs15'];
			$training_sponsor15 = $_POST['training_sponsor15'];
			//training programs to db
			if(($training_date_from15 == "" || $training_date_to15 =="" || $training_no_hrs15 =="")||($training_date_from15 == "" && $training_date_to15 =="" && $training_no_hrs15 =="")){
			$trainig_query15="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title15','$training_sponsor15','$count15')";
			mysql_query($trainig_query15)    or die(mysql_error());
			}else{
			$training_date_from15 = strtotime($training_date_from15);
			$training_date_from15 = date('Y-m-d',$training_date_from15);
			$training_date_to15 = strtotime($training_date_to15);
			$training_date_to15 = date('Y-m-d',$training_date_to15);
			$trainig_query15="INSERT INTO eis_training_program_t(emp_id,title_of_seminar,inclusive_date_att_from,inclusive_date_att_to,no_of_hrs,conducted_sponsor_by,count) VALUES(LAST_INSERT_ID(),'$training_title15','$training_date_from15','$training_date_to15','$training_no_hrs15','$training_sponsor15','$count15')";
			mysql_query($trainig_query15)    or die(mysql_error());
			}
			
			
			
			
			
			
			
			
			
			
			//other_info 1 to db
			//other info 1
			//other info

			$hobbies1 = $_POST['hobbies1'];
			$recognition1 = $_POST['recognition1'];
			$organization1 = $_POST['organization1'];
			//other info 2
			$hobbies2 = $_POST['hobbies2'];
			$recognition2 = $_POST['recognition2'];
			$organization2 = $_POST['organization2'];
			//other info 3
			$hobbies3 = $_POST['hobbies3'];
			$recognition3 = $_POST['recognition3'];
			$organization3 = $_POST['organization3'];
			//other info 4
			$hobbies4 = $_POST['hobbies4'];
			$recognition4 = $_POST['recognition4'];
			$organization4 = $_POST['organization4'];
			//other info 5
			$hobbies5 = $_POST['hobbies5'];
			$recognition5 = $_POST['recognition5'];
			$organization5 = $_POST['organization5'];
  
			$o_info1 ="INSERT INTO eis_other_info1_t(emp_id,special_skills,recognition,organization,count) VALUES(LAST_INSERT_ID(),'$hobbies1','$recognition1','$organization1','$count1')";
			mysql_query($o_info1) or die(mysql_error());
			$o_info2 ="INSERT INTO eis_other_info1_t(emp_id,special_skills,recognition,organization,count) VALUES(LAST_INSERT_ID(),'$hobbies2','$recognition2','$organization2','$count2')";
			mysql_query($o_info2) or die(mysql_error());
			$o_info3 ="INSERT INTO eis_other_info1_t(emp_id,special_skills,recognition,organization,count) VALUES(LAST_INSERT_ID(),'$hobbies3','$recognition3','$organization3','$count3')";
			mysql_query($o_info3) or die(mysql_error());
			$o_info4 ="INSERT INTO eis_other_info1_t(emp_id,special_skills,recognition,organization,count) VALUES(LAST_INSERT_ID(),'$hobbies4','$recognition4','$organization4','$count4')";
			mysql_query($o_info4) or die(mysql_error());
			$o_info5 ="INSERT INTO eis_other_info1_t(emp_id,special_skills,recognition,organization,count) VALUES(LAST_INSERT_ID(),'$hobbies5','$recognition5','$organization5','$count5')";
			mysql_query($o_info5) or die(mysql_error());
	
	//q36-41 to db
	$q=$_POST['q'];
	$yes="YES";
	//q36_a
	if($q[0] == $yes){
		$details1 = $_POST['details1'];
		$q_no ="q36_a";
		$ans="YES";
		$q36_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details1') ";
		mysql_query($q36_a) or die(mysql_error());
	}else{
	
		$details1 ="";
		$q_no = "q36_a";
		$ans="NO";
		$q36_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details1') ";
		mysql_query($q36_a) or die(mysql_error());
	
	}
	
	
	//q36_b
	if($q[1] == $yes){
		$details2 = $_POST['details2'];
		$q_no = "q36_b";
		$ans="YES";
		$q36_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details2') ";
		mysql_query($q36_b) or die(mysql_error());
	}else{
	
		$details2 ="";
		$q_no = "q36_b";
		$ans="NO";
		$q36_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details2') ";
		mysql_query($q36_b) or die(mysql_error());
	}
	
	//q37_a
	if($q[2] == $yes){
		$details3 = $_POST['details3'];
		$q_no = "q37_a";
		$ans="YES";
		$q37_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details3') ";
		mysql_query($q37_a) or die(mysql_error());
	}else{
	
		$details3 ="";
		$q_no = "q37_a";
		$ans="NO";
		$q37_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details3') ";
		mysql_query($q37_a) or die(mysql_error());
	
	}
	//q37_b
	if ($q[3] == $yes){
		$details4 = $_POST['details4'];
		$q_no = "q37_b";
		$ans="YES";
		$q37_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details4') ";
		mysql_query($q37_b) or die(mysql_error());
	}else{
	
		$details4 ="";
		$q_no = "q37_b";
		$ans="NO";
		$q37_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details4') ";
		mysql_query($q37_b) or die(mysql_error());
	
	}
	//q38
	if($q[4] == $yes){
		$details5 = $_POST['details5'];
		$q_no = "q38";
		$ans="YES";
		$q38="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details5') ";
		mysql_query($q38) or die(mysql_error());
	}else{
	
		$details5 ="";
		$q_no = "q38";
		$ans="NO";
		$q38="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details5') ";
		mysql_query($q38) or die(mysql_error());
	
	}
	//q39
	if($q[5] == $yes){
		$details6 = $_POST['details6'];
		$q_no = "q38";
		$ans="YES";
		$q38="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details6') ";
		mysql_query($q38) or die(mysql_error());
	}else{
	
		$details6 ="";
		$q_no = "q39";
		$ans="NO";
		$q38="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details6') ";
		mysql_query($q38) or die(mysql_error());
	
	}
	//q40
	if($q[6] == $yes){
		$details7 = $_POST['details7'];
		$q_no = "q40";
		$ans="YES";
		$q40="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details7') ";
		mysql_query($q40) or die(mysql_error());
	}else{
	
		$details7 ="";
		$q_no = "q40";
		$ans="NO";
		$q40="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details7') ";
		mysql_query($q40) or die(mysql_error());
	
	}
	//q41_a
	if($q[7] == $yes){
		$details8 = $_POST['details8'];
		$q_no = "q41_a";
		$ans="YES";
		$q41_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details8') ";
		mysql_query($q41_a) or die(mysql_error());
	}else{
	
		$details8 ="";
		$q_no = "q41_a";
		$ans="NO";
		$q41_a="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details8') ";
		mysql_query($q41_a) or die(mysql_error());
	
	}
	//q41_b
		if($q[8] == $yes){
		$details9 = $_POST['details9'];
		$q_no = "q41_b";
		$ans="YES";
		$q41_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details9') ";
		mysql_query($q41_b) or die(mysql_error());
	}else{
	
		$details9 ="";
		$q_no = "q41_b";
		$ans="NO";
		$q41_b="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details9') ";
		mysql_query($q41_b) or die(mysql_error());
	
	}
	//q41_c
	if($q[9] == $yes){
		$details10 = $_POST['details10'];
		$q_no = "q41_c";
		$ans="YES";
		$q41_c="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details10') ";
		mysql_query($q41_c) or die(mysql_error());
	}else{
	
		$details10 ="";
		$q_no = "q41_c";
		$ans="NO";
		$q41_c="INSERT INTO eis_other_info2_t(emp_id,question_no,answer,details) VALUES(LAST_INSERT_ID(),'$q_no','$ans','$details10') ";
		mysql_query($q41_c) or die(mysql_error());
	
	}
	 
	
	
	//reference to db
	
	$ref_name1 = $_POST['ref_name1'];
	$ref_add1 = $_POST['ref_add1'];
	$ref_tel1 = $_POST['ref_tel1'];
	$query="INSERT INTO eis_reference_t(emp_id,name,address,tel_no,count) VALUES(LAST_INSERT_ID(),'$ref_name1','$ref_add1','$ref_tel1','$count1')";
	mysql_query($query) or die(mysql_error());
	$ref_name2 = $_POST['ref_name2'];
	$ref_add2 = $_POST['ref_add2'];
	$ref_tel2 = $_POST['ref_tel2'];
	$query="INSERT INTO eis_reference_t(emp_id,name,address,tel_no,count) VALUES(LAST_INSERT_ID(),'$ref_name2','$ref_add2','$ref_tel2','$count2')";
	mysql_query($query) or die(mysql_error());
	$ref_name3 = $_POST['ref_name3'];
	$ref_add3 = $_POST['ref_add3'];
	$ref_tel3= $_POST['ref_tel3'];
	$query="INSERT INTO eis_reference_t(emp_id,name,address,tel_no,count) VALUES(LAST_INSERT_ID(),'$ref_name3','$ref_add3','$ref_tel3','$count3')";
	mysql_query($query) or die(mysql_error());		
		
		
		
		echo '<script>alert("Profile Added!!"); 
		window.close();</script>';
			
	
}
?>