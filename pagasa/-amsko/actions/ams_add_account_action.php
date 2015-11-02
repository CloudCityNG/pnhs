<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$repassword = mysql_real_escape_string($_POST['repassword']);
	$type = mysql_real_escape_string($_POST['type_no']);
	$privilege_id = mysql_real_escape_string($_POST['privilege_id']);
	
	if ($password == $repassword){
	   if ($type == admin){
	   $sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')");
	   
	   $query = ("SELECT * FROM account_t WHERE username = '$username' AND password='$password' AND type='$type' ");
	   $row = mysql_fetch_assoc($query);
	   $acc_id = $row['account_no'];


	   $sql2 = mysql_query("INSERT INTO account_privilege_t VALUES('', '$privilege_name')"); 
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')");
	   }
	   else 
	    $sql4 = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')"); 
		$sql5 = mysql_query("INSERT INTO account_privilege_t VALUES('', '$privilege_name')");    
	}
	else{
	echo "Passwords didn't match";
	}

	echo "<script>window.close(); </script>";
	
}
?>