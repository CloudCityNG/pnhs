<?php 
require ('../db/db.php');

$student_id=$_GET['stud_id'];


	$query_schyr=mysql_query("SELECT sy_id FROM school_year_t");		
	$count=mysql_num_rows($query_schyr);
	$count=$count-2;
	$query_prev=mysql_query("SELECT * FROM school_year_t LIMIT $count,1");
	$row_prev=mysql_fetch_assoc($query_prev);
	$prev=$row_prev['sy_id'];


$date= date('Y-m-d');
$query_select=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$student_id' AND school_yr=$prev");
$row_select=mysql_fetch_assoc($query_select);
$yrlvl=$row_select['year_level'];

echo $yrlvl;

$query_schyr=mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
$row_schyr=mysql_fetch_assoc($query_schyr);
$sy_id=$row_schyr['sy_id'];

$query_insert=mysql_query("INSERT INTO student_registration_t VALUES ('','$student_id', null, null, '$date', '$sy_id', '$yrlvl')") or die('mali');

$query_fg=mysql_query("INSERT INTO final_grade_t VALUES ('', '$student_id', '$sy_id', null)") or die('mali');

if($type=='new')
		$query_up=mysql_query("UPDATE student_t SET type='returning' WHERE student_id='$student_id'");
	else{
	}

//$query_update=mysql_query("UPDATE final_grade_t SET final_grade=75 where student_id='$student_id'") or die('mali');

header('Location: reg_listofenrolledstudents.php');


?>