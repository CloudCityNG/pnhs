<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

		$privilege_id = mysql_real_escape_string($_POST['privilege_id']);
		$account_no = mysql_real_escape_string($_POST['account_no']);

	   
	   //$query = ("SELECT * FROM employee_account_t WHERE emp_id = '$emp_id' AND account_no = '$account_no' ");
	   //$row1 = mysql_fetch_assoc($query);
	   //$acc_id = $row['account_no'];
	   
	   $sql3 = mysql_query("INSERT INTO account_permission_t VALUES('$account_no', '$privilege_id')");
	   
	   } 

	echo "<script>window.close(); </script>";
	

?>