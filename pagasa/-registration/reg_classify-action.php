<?php 
require "../db/db.php";

	$query_sy=mysql_query("SELECT * FROM school_year_t WHERE SY_Status=1");
	$row_sy=mysql_fetch_assoc($query_sy);
	$sy=$row_sy['sy_id'];

	$lvl_id=$_GET['lvl_id'];
	
	echo $lvl_id;
	echo "<br>";
	
	echo $sy;
	echo "<br>";
	
	$query_reg=mysql_query("SELECT reg_no, student_t.student_id, student_t.exam_result, year_level
							FROM student_t, student_registration_t 
							WHERE student_registration_t.year_level='$lvl_id' 
							AND student_registration_t.school_yr=$sy 
							AND student_t.student_id = student_registration_t.student_id
							ORDER BY exam_result DESC
							");
		
	$query_curr = mysql_query("SELECT * FROM curriculum_t WHERE curriculum_code='K12'");
	$row_curr = mysql_fetch_assoc($query_curr);
	$quota = $row_curr['quota'];
	
	//if($quota<=$exam_result)
	$curriculum = $row_curr['curriculum_code']; 
	echo $curriculum; //to get section	
	echo "<br />";
	
	$query_yr_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$lvl_id' AND curriculum_code='$curriculum'");
	
	echo $lvl_id."<br><br>";
	
	$query_section = mysql_query("SELECT * FROM section_t WHERE year_level='$lvl_id'"); //ORDER BY section_no
	$row_section = mysql_fetch_assoc($query_section);
	$capacity = $row_section['section_size'];
		
	$student_count=1;
	while($row_reg=mysql_fetch_assoc($query_reg)){
		$studentID=$row_reg['student_id'];
		$reg_no = $row_reg['reg_no'];
		$exam_result = $row_reg['exam_result'];
		//$lvl_name= $row_reg['year_level']; // to get yearl_lvl  
		$section_id = $row_section['section_id'];
		//if ssc
		
		
		echo $studentID." is enrolled in ".$section_id."    $student_count /  $capacity<br>";
		$up=mysql_query("UPDATE student_registration_t SET section_id=$section_id WHERE student_id='$studentID' AND school_yr=$sy");
		$student_count++;
		if($student_count>$capacity){
			$row_section = mysql_fetch_assoc($query_section);
			$capacity = $row_section['section_size'];
			$student_count=1;
	}
	
	//return $curriculum_code;
}

header ("Location: reg_section.php");
?>