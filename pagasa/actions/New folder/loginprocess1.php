<?php

session_start();

require "../db/db.php";

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
//$enc_password = md5('password');

if($username && $password)
{
	$query = mysql_query("select * from account_t where username='$username'");
	
	$numrows = mysql_num_rows($query);
	
	if($numrows != 0){
		while($row = mysql_fetch_assoc($query)) {
		
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
			$user_id = $row['account_no'];
		}
		if($username==$dbusername && $password==$dbpassword){ 
			//$enc_password==$dbpassword
			//echo "Login successful. <a href='home.php'>Click here</a>";
			$_SESSION['username']=$dbusername;
			$_SESSION['user_id']=$user_id;
			
			//identify type of user using the used system
			$_SESSION['user_type'] = identify_user_type($user_id);
			
			
			header ("location: ../home.php");
		}
		else {
			echo ("INCORRECT PASSWORD");
			header("location: ../index.php?Incorrect password");
			}
	}

	else {
		echo ("INCORRECT USERNAME");
		header("location: ../index.php?The username doesnt exist");
	}
}

else {
	echo "ALL FIELDS ARE REQUIRED";
	header("location: ../index.php?All fields are required.");
	//echo"Please enter a username and password";
}

function identify_user_type($id){
	$acct_query = mysql_query("SELECT * FROM account_t WHERE account_no='$id'");
	$acct_data = mysql_fetch_assoc($acct_query);
	
	$acct_type = $acct_data['type'];
	if($acct_type=="employee"){
	    return "employee";	
	}
	return $acct_type;
}

?>