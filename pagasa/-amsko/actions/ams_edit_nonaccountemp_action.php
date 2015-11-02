<?php
include("../../db/db.php");
error_reporting(0);

if(isset($_POST['submit'])){

	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	$account_no = mysql_real_escape_string($_POST['account_no']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$type = mysql_real_escape_string($_POST['type']);
			
		$sql = mysql_query("UPDATE account_t SET username = '$username', password = '$password' WHERE account_no ='$account_no'");
		header("Location: ../ams_nonemp_accounts.php");
		
}

?>



