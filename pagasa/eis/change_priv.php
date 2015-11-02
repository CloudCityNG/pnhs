<?php 
mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");
	
	if(isset($_POST['Change'])){
		$emp_id=$_POST['emp_name'];
		//$username=$_POST['username'];
		//$acc_no=$_POST['acc_no'];
		//$password=$_POST['pwd2'];
		$priv_id=$_POST['priv_name'];
		
		$find_no=mysql_query("SELECT * FROM employee_account_t WHERE emp_id='$emp_id'");
		$found_no=mysql_fetch_assoc($find_no);
		$acc_no=$found_no['account_no'];
		
		mysql_query("UPDATE `account_permission_t` SET `privilege_id`='$priv_id' WHERE `account_no`='$acc_no'");
		

	
	echo $emp_id;	
	echo $priv_id;
	echo '<script>alert("Password Changed!!");
	</script>';	
		header('location: eis_admin_manage_users.php');
	
	}



?>