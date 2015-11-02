<?php
function get_curr_name($curriculum_code){
    //include_once "../../db/db.php";
    $query = mysql_query("SELECT * FROM curriculum_t WHERE curriculum_code = '{$curriculum_code}'");
	$row = mysql_fetch_assoc($query);
	$title = $row['title'];
	
	return $title;
}


function get_total_subjects($curriculum_code){
    //include_once "../../db/db.php";
    $query = mysql_query("SELECT * FROM subject_t,
	 											   year_level_t
										      WHERE year_level_t.curriculum_code = '{$curriculum_code}'
											  AND   subject_t.year_level = year_level_t.lvl_id");
    $total_subjects = 0;
	$total_subjects+= mysql_num_rows($query);
	return $total_subjects;
}

function get_total_units($curriculum_code){
    //include_once "../../db/db.php";
    $query = mysql_query("SELECT * FROM subject_t,
	 											   year_level_t
										      WHERE year_level_t.curriculum_code = '{$curriculum_code}'
											  AND   subject_t.year_level = year_level_t.lvl_id");
    $total_units = 0;
	while($row = mysql_fetch_assoc($query)){
	    $total_units += $row['credit_unit'];	
	}
	return $total_units;
}


?>