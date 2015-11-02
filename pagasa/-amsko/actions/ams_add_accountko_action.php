<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$repassword = mysql_real_escape_string($_POST['repassword']);
	$type = mysql_real_escape_string($_POST['type_no']);
	$privilege_id = mysql_real_escape_string($_POST['privilege_id']);
	
	$us = mysql_query("SELECT * FROM account_t WHERE username='$username'");
	
	if(mysql_num_rows($us) > 0) {
		echo "<div class='alert alert-error'>";
						echo "Username already exists!";
						echo "</div>";
	}
	else {
	if ($password == $repassword){
		if($type == 4) {
			$sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', 'student')")or die(mysql_error());
		} else {
			$sql = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', 'admin')")or die(mysql_error());
		}

	   $query = mysql_query("SELECT * FROM account_t WHERE username = '$username' ") or die(mysql_error());
	   $row = mysql_fetch_assoc($query);
	   $acc_id = $row['account_no'];
	    //$sql3 = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')")or die(mysql_error()."     this");   
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')")or die(mysql_error()."     thisthat");
	   
	   
	echo "<script>window.close(); </script>";
	} 
	
	else {
	  // $sql3 = mysql_query("INSERT INTO account_t VALUES('', '$username', '$password', '$type')")or die(mysql_error()."     this");   
	   //$sq2 = mysql_query("INSERT INTO account_permission_t VALUES('$acc_id', '$privilege_id')")or die(mysql_error()."     thisthat");
		echo "<div class='alert alert-danger'>Passwords didn't match</div>";
	}
  }
}
?>    