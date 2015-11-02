<?php 
mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");
	
	if(isset($_POST['Add'])){
		$emp_id=$_POST['emp_name'];
		$priv_id=$_POST['priv_name'];
		$username=$_POST['username'];
		$password=$_POST['pwd2'];
		
		mysql_query("INSERT INTO `account_t`(`account_no`, `username`, `password`,`type`) VALUES ('','$username','$password','employee')");
		
		mysql_query("INSERT INTO `employee_account_t`( `account_no`,`emp_id`) VALUES (LAST_INSERT_ID(),'$emp_id')");
		
		if($priv_id!="null"){
		mysql_query("INSERT INTO `account_permission_t`(`account_no`, `privilege_id`) VALUES (LAST_INSERT_ID(),'$priv_id')");
		}
		
	echo $emp_id;	
	echo '<script>alert("Account Added!!");
	</script>';	
		header('location: eis_admin_manage_users.php');
	
	}



?>