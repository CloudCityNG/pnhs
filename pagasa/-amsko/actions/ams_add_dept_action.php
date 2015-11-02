<?php
include("../../db/db.php");
error_reporting(0);

if(isset($_POST['submit'])){

	$dept_name = mysql_real_escape_string($_POST['dept_name']);
	$dept_description = mysql_real_escape_string($_POST['dept_description']);
	$dept_head = mysql_real_escape_string($_POST['dept_head']);
	
	if ($dept_head == '0'){
		$sql = mysql_query("INSERT INTO department_t VALUES('','$dept_name','$dept_description',NULL)");
		header("Location: ../ams_department.php");
	}
	else {
		$sql = mysql_query("INSERT INTO department_t VALUES('','$dept_name','$dept_description','$dept_head')");
		header("Location: ../ams_department.php");
	}
}

?>