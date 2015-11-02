<?php

function is_section_name_unique($section_name){
	$query = mysql_query("SELECT * FROM section_t WHERE section_name='{$section_name}'") or die(mysql_error());
	return (mysql_num_rows($query)<1)? true:false;
	
}

function section_students($section_id, $sy_id){
	//$sy_id = get_active_sy();
	$query = mysql_query("SELECT * FROM student_registration_t WHERE section_id='{$section_id}' AND school_yr='{$sy_id}'") or die(mysql_query());
	return mysql_num_rows($query);
}
?>