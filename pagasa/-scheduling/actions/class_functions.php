<?php



function is_available($section_id, $subject_code, $teacher_id){
	$sy_id = get_active_sy();
	//echo $sy_id; AND teacher_id={$teacher_id}
	$query = mysql_query("SELECT * FROM class_t 
								   WHERE subject_code={$subject_code}
								   AND section_id={$section_id}
								   AND sy_id={$sy_id}") or die("hello");
    $row = mysql_fetch_assoc($query);
	return (mysql_num_rows($query)<1)? true:false;
}

function does_yr_level_match($section_id, $subject_code){
	$query = mysql_query("SELECT * FROM section_t WHERE section_id='{$section_id}'")  or die(mysql_error());
	$row = mysql_fetch_assoc($query);
	$section_yr_lvl = $row['year_level'];
	
	$query = mysql_query("SELECT * FROM subject_t WHERE subject_code='{$subject_code}'")  or die(mysql_error());
	$row = mysql_fetch_assoc($query);
	$subject_yr_lvl = $row['year_level'];
	
	return ($section_yr_lvl==$subject_yr_lvl)? true:false;
	
}

function get_active_sy(){
    $query = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
	$row = mysql_fetch_assoc($query);
	return $row['sy_id'];	
}

function classes_teacher($teacher_id, $sy_id){
    $query = mysql_query("SELECT * FROM class_t WHERE teacher_id={$teacher_id} AND sy_id={$sy_id}")or die(mysql_error());
	return mysql_num_rows($query);
}

function p_total_units(){
	
}


##################################################################################################################################




function is_available_e($section_id, $subject_code, $teacher_id, $class_id){
	$sy_id = get_active_sy();
	//echo $sy_id; AND teacher_id={$teacher_id}
	$query = mysql_query("SELECT * FROM class_t 
								   WHERE subject_code={$subject_code}
								   AND section_id={$section_id}
								   AND sy_id={$sy_id}
								   AND class_id<>$class_id") or die("hello");
    $row = mysql_fetch_assoc($query);
	return (mysql_num_rows($query)<1)? true:false;
}
?>