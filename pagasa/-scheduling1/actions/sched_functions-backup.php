<?php
    //require_once "../db/db.php";
	###Function to delete a given load
    function delete_load($load_id ){
		echo "<script>alert('Deleting Load.');</script>";
	    mysql_query("DELETE FROM load_t WHERE load_id = '$load_id'");
	}
	$start_times = array('07:15', '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45');
    $end_times = array( '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45','16:45');
	
	###function to check if the subject to be added to a year level is unique
	function is_category_unique($category_id, $lvl_id, $subject_code){
		if($subject_code==NULL){
		    $query = mysql_query("SELECT * FROM subject_t WHERE category_id='$category_id' AND year_level='$lvl_id'") or die("error in unique category $category_id, $lvl_id");
		    return (mysql_num_rows($query)<1)? true:false;
		}
		else{
		    $query = mysql_query("SELECT * FROM subject_t WHERE category_id='$category_id' AND year_level='$lvl_id' AND subject_code <> $subject_code") or die("error in unique category $category_id, $lvl_id");
		    return (mysql_num_rows($query)<1)? true:false;	
		}
	}
	function is_unit_maxed($lvl_id, $subject_code, $subject_unit){
		$deduction_unit = 0;
		if($subject_code!=0){
		    $query = mysql_query("SELECT * FROM subject_t WHERE subject_code='$subject_code'");
			$row = mysql_fetch_assoc($query);
			$deduction_unit = $row['credit_unit'];	
		}
		$query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$lvl_id'");
		$row = mysql_fetch_assoc($query);
		$max_units = $row['max_unit'];
		
		$query2 = mysql_query("SELECT * FROM subject_t WHERE year_level='$lvl_id' ");
		$total_units = 0;
		while($row2 = mysql_fetch_assoc($query2)){
			$total_units += $row2['credit_unit'];
		}
		
		if($total_units+$subject_unit-$deduction_unit > $max_units)
		    return false;	
		else
		    return true;
	}
	
	
	##########################################################################################
	##   VERY IMPORTANT for CONFLICT CHECKER
	##########################################################################################
	function is_loaded(){
		$start_times = array('07:15', '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45');
        $end_times = array( '07:30','08:30','09:30','09:45','10:45','11:45','12:45','13:45','14:45','15:45','16:45');
		
		
		$section_id = $_POST['section_menu'];
		$room_no = $_POST['room_menu'];
		$emp_id = $_POST['teacher_menu'];
		
		foreach($_POST['day_menu'] as $day){
			$time_index = $_POST['time_menu'];
			$start_time = $start_times[$time_index].":00";
			$end_time = $end_times[$time_index].":00";
			
			//conflict checking for lunch break, flag ceremony and recess...
			if(strtotime($start_time)<strtotime($end_times[0]))
			    return "Sorry, but that time is alloted for \"Th Flag Ceremony\".";
			if(strtotime($start_time)<=strtotime($start_times[4]."00") && strtotime($end_times[4])<=strtotime($end_time.":00"))
			    return "Sorry, but that time is alloted for recess.";
			if(strtotime($start_time)<=strtotime($start_times[7]."00") && strtotime($end_times[7])<=strtotime($end_time.":00"))
			    return "Sorry, but that time is alloted for lunch break.";
				
			$start_time = $start_times[$time_index].":00";
			$end_time = $end_times[$time_index].":00";
			
			$query1 = mysql_query("SELECT * FROM load_t WHERE section_id = '$section_id' 
														  AND day = '$day'
														  AND start_time = '$start_time'
														  AND end_time = '$end_time'");
			if(mysql_num_rows($query1)>0){
				return "Section is loaded for that particular time.";	
			}
			
			$query2 = mysql_query("SELECT * FROM load_t WHERE emp_id = '$emp_id' 
														  AND day = '$day'
														  AND start_time = '$start_time'
														  AND end_time = '$end_time'");
			if(mysql_num_rows($query2)>0){
				return "Teacher is loaded for that particular time.";	
			}
			
			$query3 = mysql_query("SELECT * FROM load_t WHERE room_no = '$room_no' 
														  AND day = '$day'
														  AND start_time = '$start_time'
														  AND end_time = '$end_time'");
			if(mysql_num_rows($query3)>0){
				return "Room is occupied for that particular time.";	
			}
			
			return NULL;
		}
	}
	
	###funtion to check whether the teacher has reached his/her max load
	function is_teacher_max($emp_id, $subject_code){
		$query = mysql_query("SELECT * FROM teaching_staff_t WHERE emp_id='$emp_id'") or die("error selecting teach");
		$row = mysql_fetch_assoc($query);
		$max_load = $row['maximum_load'];
		
		//insert codes for getting the current school year
		
		$query2 = mysql_query("SELECT * FROM load_t WHERE emp_id='$emp_id'") or die("error in selecting load");
		$current_total_unit = mysql_num_rows($query2) * 0.3;
		$new_total_unit = $current_total_unit + 0.3;
		if($new_total_unit>$max_load)
		    return "Teaching load exceeded the maximum allowed value ($new_total_unit/$max_load)";
		else
		    return NULL;
		
	}
	
	###function to check whether a subject is taken with the correct amount of units. Not to exceed maximum value.
	function is_subj_max($section_id, $subject_code){
		$query = mysql_query("SELECT * FROM subject_t WHERE subject_code='$subject_code'") or die("error selecting subject");
		$row = mysql_fetch_assoc($query);
		$credit_unit = $row['credit_unit'];
		
		//insert codes for getting the current school year
		
		$query2 = mysql_query("SELECT * FROM load_t WHERE subject_code='$subject_code' AND section_id='$section_id'") or die("error in selecting load");
		$current_total_unit = mysql_num_rows($query2) * 0.3;
		$new_total_unit = $current_total_unit + 0.3;
		if($new_total_unit>$credit_unit)
		    return "Section has exceeded the maximum no. of load for the subject ($new_total_unit/$credit_unit)";
		else
		    return NULL;
		
	}
	
	###function to get latest school year active
	function get_school_yr(){
	    $query = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");	
		$row = mysql_fetch_assoc($query);
		return $row['sy_id'];
	}
?>