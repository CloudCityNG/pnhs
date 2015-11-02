<?php
if(isset($_GET['emp_id'])){
	$emp_id = $_GET['emp_id'];
	require_once "../../db/db.php";
	mysql_query("UPDATE teacher_t SET teacher_status='0' WHERE emp_id='{$emp_id}'") or die(mysql_error());	
	header("location: ../teachers.php");

}




?>