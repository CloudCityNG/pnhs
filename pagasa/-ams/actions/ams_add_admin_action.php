<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$module_no = mysql_real_escape_string($_POST['module_no']);
	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	$role = mysql_real_escape_string($_POST['role']);
	
	$query = mysql_query("SELECT * FROM account_t WHERE emp_id='$emp_id'");
	$row = mysql_fetch_array($query);
	$account_no = $row['account_no'];
	
		$sql = mysql_query("INSERT INTO account_admin_t VALUES('', '$module_no', '$account_no', '$role')");
		echo "<script>window.location='../account_admin.php?module_no=$module_no';</script>";
}
?>