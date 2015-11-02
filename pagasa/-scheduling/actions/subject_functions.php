<?php
    require_once "../db/db.php";
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
	
	###function to check if subject name is already taken
	function is_title_unique($subject_title){
	    	$query = mysql_query("SELECT subject_title FROM subject_t WHERE subject_title='{$subject_title}'") or die (mysql_error());
			return (mysql_num_rows($query)<1)? true:false;
	}
	
	###funtion to check whether the teacher has reached his/her max load
	function is_teacher_max($emp_id, $subject_code_2add){
		if($emp_id=="NULL"){
		   return NULL;	
		}
		$query = mysql_query("SELECT * FROM teacher_t WHERE emp_id='$emp_id'") or die("error selecting teach");
		$row = mysql_fetch_assoc($query);
		$max_load = $row['max_load'];
		
		//insert codes for getting the current school year
		$sy_id=get_active_sy();
		$total_units = 0;
		$query2 = mysql_query("SELECT * FROM class_t WHERE teacher_id='$emp_id' AND sy_id='{$sy_id}'") or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
		    $subject_code = $row2['subject_code'];	
			$total_units+= get_units($subject_code);
		}
		
		$total_units+=get_units($subject_code_2add);
		if($total_units>$max_load)
		    return "Teaching load exceeded the maximum allowed value ($total_units/$max_load)";
		else
		    return NULL;
		
	}
	
	###function to check whether a subject is taken with the correct amount of units. Not to exceed maximum value.
	function is_subj_max($class_id, $add_hours){
		$query = mysql_query("SELECT subject_t.credit_unit AS credit_unit FROM subject_t, class_t WHERE subject_t.subject_code=class_t.subject_code
		 														 AND class_t.class_id={$class_id}") or die("error selecting subject");
		$row = mysql_fetch_assoc($query);
		$credit_unit = $row['credit_unit'];
		$total_hours = unit_to_time($credit_unit);
		//insert codes for getting the current school year
		
		
		$curr_hours = total_hours($class_id);
		
		$curr_hours+=$add_hours;
		if($total_hours<$curr_hours)
		    return "Section has exceeded the maximum no. of load for the subject ($curr_hours/$total_hours)";
		else
		    return NULL;
		
	}
	
	###function to get total hours spent of a class
	function total_hours($class_id){
		$query = mysql_query("SELECT * FROM class_schedule_temp_t WHERE class_id={$class_id}");
		//$rows = mysql_num_rows($query);
		$hours = 0;
		while($row = mysql_fetch_assoc($query)){
	        $time_start = $row['time_start'];
			$time_end = $row['time_end'];
            $hours+= get_duration($time_start, $time_end);
		}
		return $hours;
	}
	
	###function to convert unit to time
	function unit_to_time($unit){
	    return $unit*200/60;	
	}
	
	###function to get duration of time between 2 period
	function get_duration($start, $end){
	    $start_t = strtotime($start);
		$end_t = strtotime($end);
		$dur = ($end_t - $start_t)/3600;
		return $dur;	
	}
	
	###function to get latest school year active
	function get_school_yr(){
	    $query = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");	
		$row = mysql_fetch_assoc($query);
		return $row['sy_id'];
	}
	
	###function to get units of a subject
	function get_units($subject_code){
		$query = mysql_query("SELECT * FROM subject_t WHERE subject_code='{$subject_code}'");
		$row = mysql_fetch_assoc($query);
		return $row['credit_unit'];
	}
	###function to get total units of subjects in a year level
	function get_total_units($lvl_id){
		$query = mysql_query("SELECT * FROM subject_t WHERE year_level='{$lvl_id}'");
		$total_units=0;
		while($row = mysql_fetch_assoc($query)){
			$total_units+=$row['credit_unit'];
		}
		return $total_units;
	}
	
	###refresh total units of subject per year level
	function refresh_units(){
	    $query_lvl = mysql_query("SELECT * FROM year_level_t") or die(mysql_error());
		while($row_lvl = mysql_fetch_assoc($query_lvl)){
		    $lvl_id = $row_lvl['lvl_id'];
			$query_subject = mysql_query("SELECT * FROM subject_t WHERE year_level='{$lvl_id}'") or die(mysql_error());	
			$total_units=0;
			while($row_lvl = mysql_fetch_assoc($query_subject)){
				$total_units += $row_lvl['credit_unit'];
			}
			mysql_query("UPDATE year_level_t SET total_unit = {$total_units} 
										   WHERE year_lvl = '{$lvl_id}'") or die(mysql_error());
		}
	}
?>



<?php

########################################################################################################################
################################### THIS BLOCK OF CODE IS USED BY EDITING PROCESSES ####################################
########################################################################################################################

    ###funtion to check whether the teacher has reached his/her max load
	function is_teacher_max_e( $emp_id, $subject_code_2add, $class_id){
		if($emp_id=="NULL"){
		   return NULL;	
		}
		$query = mysql_query("SELECT * FROM teacher_t WHERE emp_id='$emp_id'") or die("error selecting teach");
		$row = mysql_fetch_assoc($query);
		$max_load = $row['max_load'];
		
		//insert codes for getting the current school year
		$sy_id=get_active_sy();
		$total_units = 0;
		$query2 = mysql_query("SELECT * FROM class_t WHERE teacher_id='$emp_id' AND sy_id='{$sy_id}' AND class_id<>'{$class_id}'") or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
		    $subject_code = $row2['subject_code'];	
			$total_units+= get_units($subject_code);
		}
		
		$total_units+=get_units($subject_code_2add);
		if($total_units>$max_load)
		    return "Teaching load exceeded the maximum allowed value ($total_units/$max_load)";
		else
		    return NULL;
		
	}
	
	
    ###function to check whether a subject is taken with the correct amount of units. Not to exceed maximum value. ... with exception
	function is_subj_max_e($class_id, $add_hours, $schedule_id){
		$query = mysql_query("SELECT subject_t.credit_unit AS credit_unit FROM subject_t, class_t WHERE subject_t.subject_code=class_t.subject_code
		 														 AND class_t.class_id={$class_id}") or die("error selecting subject");
		$row = mysql_fetch_assoc($query);
		$credit_unit = $row['credit_unit'];
		$total_hours = unit_to_time($credit_unit);
		//insert codes for getting the current school year
		
		$query_sched = mysql_query("SELECT * FROM class_schedule_temp_t WHERE schedule_id='{$schedule_id}'") or die("subj_func ".mysql_error());
		$row_sched = mysql_fetch_assoc($query_sched);
		$start = $row_sched['time_start'];
		$end = $row_sched['time_end'];
		$deduction = get_duration($start, $end);
		
		$curr_hours = total_hours($class_id) - $deduction;
		
		$curr_hours+=$add_hours;
		if($total_hours<$curr_hours)
		    return "Section has exceeded the maximum no. of load for the subject ($curr_hours/$total_hours)";
		else
		    return NULL;
		
	}
	
	###function to check if subject name is already taken
	function is_title_unique_e($subject_title, $subject_code){
	    	$query = mysql_query("SELECT subject_title FROM subject_t WHERE subject_title='{$subject_title}' AND subject_code <> '{$subject_code}'") or die (mysql_error());
			return (mysql_num_rows($query)<1)? true:false;
	}
  
?>