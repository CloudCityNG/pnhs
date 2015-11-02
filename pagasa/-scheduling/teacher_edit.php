<?php
require_once "../db/db.php";

if(isset($_POST['submit'])){
    $employee = $_POST['e_emp_id'];
	$max_load = $_POST['e_max_load'];	
	
	$query = mysql_query("SELECT * FROM teacher_t WHERE emp_id='{$employee}'") or die(mysql_error());
	if(mysql_num_rows($query)==0){
	    mysql_query("INSERT INTO teacher_t (emp_id, max_load, teacher_status) VALUES ('$employee', '$max_load', 1)")or die("adding  -  ".mysql_error());
	}
	else{
		mysql_query("UPDATE teacher_t SET max_load='$max_load', teacher_status=1 WHERE emp_id='{$employee}'")or die("  -  ".mysql_error());

	}
	header('location: teachers.php');
}
?>