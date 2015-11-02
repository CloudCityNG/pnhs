<?php
include("../../db/db.php");
error_reporting(0);

if(isset($_POST['submit'])){

	$dept_id = mysql_real_escape_string($_POST['dept_id']);
	$dept_name = mysql_real_escape_string($_POST['dept_name']);
	$dept_description = mysql_real_escape_string($_POST['dept_description']);
	$dept_head = mysql_real_escape_string($_POST['dept_head']);

	if ($dept_head == '0'){
		$sql = mysql_query("UPDATE department_t SET dept_name = '$dept_name', dept_description = '$dept_description', dept_head = NULL WHERE dept_id ='$dept_id'");
		header("Location: ../eis_admin_manage_dept.php");
	}
	else {
		$sql = mysql_query("UPDATE department_t SET dept_name = '$dept_name', dept_description = '$dept_description', dept_head = '$dept_head' WHERE dept_id ='$dept_id'");
		header("Location: ../eis_admin_manage_dept.php");
	}
}

?>