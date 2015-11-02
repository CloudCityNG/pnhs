<?php 
require "../db/db.php";

$query_schyr=mysql_query("SELECT sy_id FROM school_year_t");		
	$count=mysql_num_rows($query_schyr);
	$count=$count-2;
	$query_prev=mysql_query("SELECT * FROM school_year_t LIMIT $count,1");
	$row_prev=mysql_fetch_assoc($query_prev);
	$prev=$row_prev['sy_id'];
	
$date=date('Y-m-d');
$student_id=$_GET['stud_id'];
$query_select=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$student_id' AND school_yr=$prev");
$row_select=mysql_fetch_assoc($query_select);
$lvl_id=$row_select['year_level'];

$query_yearlvl=mysql_query("SELECT * FROM year_level_t WHERE lvl_id=$lvl_id");
$row_yearlvl=mysql_fetch_assoc($query_yearlvl);
$year_level=$row_yearlvl['year_lvl'];
$year_level++;

echo $year_level;

$query_schyr=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
$row_schyr=mysql_fetch_assoc($query_schyr);
$sy_id=$row_schyr['sy_id'];

$query_stud=mysql_query("SELECT * FROM student_t WHERE student_id= '$student_id'");
$row_stud=mysql_fetch_assoc($query_stud);
$type=$row_stud['type'];

$query_reg=mysql_query("INSERT INTO student_registration_t VALUES ('', '$student_id', null, null, '$date', '$sy_id', '$year_level')") or die ('mali');

$query_fg=mysql_query("INSERT INTO final_grade_t VALUES ('', '$student_id', '$sy_id', null)") or die('mali');

if($type=='new')
		$query_up=mysql_query("UPDATE student_t SET type='returning' WHERE student_id='$student_id'");
	else{
	}
	
header('Location: reg_listofenrolledstudents.php');
?>