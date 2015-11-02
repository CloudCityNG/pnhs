<?php

mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");



if(isset($_POST['Add'])){
	if(isset($_GET['student_id']))
    $student_id=$_GET['student_id'];
	$off_code=$_POST['offense'];
	$off_date=$_POST['date'];
	$remarks=$_POST['remarks'];
	
	
	
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$querysy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
	$getsy = mysql_fetch_assoc($querysy);
	$sy = $getsy['sy_id'];
	mysql_query("INSERT INTO `student_offense_list_t`(`student_id`, `offense_code`, `offense_date`, `Remarks`, `school_year`) VALUES ('$student_id','$off_code','$off_date','$remarks', '$sy')");
	mysql_query("Commit");
	
	header('location: ../sis-admin-offenses.php');
	}

?>