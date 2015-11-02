<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$repassword = mysql_real_escape_string($_POST['repassword']);
	$type = mysql_real_escape_string($_POST['type']);
	$privilege_id = mysql_real_escape_string($_POST['privilege_id']);
	
	if ($password == $repassword){
	   if ($type == 'employee'){
	   $sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')");
	   
	   $query = ("SELECT * FROM account_t WHERE username = '$username' AND password='$password' AND type='$type' ");
	   $row = mysql_fetch_assoc($query);
	   $acc_id = $row['account_no'];
	   
	   $sql2 = mysql_query("INSERT INTO employee_account_t VALUES('$emp_id', '$acc_id')");	
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')");
	   
	   }
	   else {
	    $sql3 = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')");   
		}
	}
	else{
	echo "Passwords didn't match";
	}

	//echo "<script>window.close(); </script>";
	
}
?>