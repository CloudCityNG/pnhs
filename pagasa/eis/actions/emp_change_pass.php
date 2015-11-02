<?php 
include("../../db/db.php");

if(isset($_POST['change_pass'])){
	$emp_id=$_POST['emp_id'];
	$new_pass=$_POST['pwd2'];
	
		//echo $emp_id."||".$new_pass;
		$find_acc=mysql_query("SELECT * FROM employee_account_t WHERE emp_id='$emp_id'");
		$found_acc=mysql_fetch_assoc($find_acc);
		$acc_id=$found_acc['account_no'];
	
		mysql_query("UPDATE `account_t` SET `password`='$new_pass' WHERE account_no='$acc_id'");
	
		echo '<script>alert("Password Successfully Chaged!!");
			window.location= "../eis_emp_home.php";
			</script>';
		
	}



?>