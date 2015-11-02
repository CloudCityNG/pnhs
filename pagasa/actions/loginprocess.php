<?php

session_start();
require "../db/db.php";
echo $_SESSION['username'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
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
			$_SESSION['account_no']=$user_id;
			
			//identify type of user using the used system
			//$_SESSION['user_type'] = identify_user_type($user_id);
			
			header ("location: ../home.php");
		}
		else {
		//header("Location: ../index.php");
			?><script>alert("Incorrect password!");
            history.back();
            </script><?php
			}
	}

	else {
	//header("Location: ../index.php");
	?><script>alert("Username does not exist!");
    history.back();
    </script><?php

	}
}

else {
//header("Location: ../index.php");
?><script>alert("All form fields are required");
history.back();
</script><?php
}

function identify_user_type($id){
	$acct_query = mysql_query("SELECT * FROM account_t WHERE account_no='$id'");
	$acct_data = mysql_fetch_assoc($acct_query);
	
	$acct_type = $acct_data['type'];
	if($acct_type=="employee"){
		$query2 = mysql_query("SELECT account_no, position, teaching FROM employee_t WHERE account_no = '$id'") or die("Error in retrieving account type.");
		$row2 = mysql_fetch_assoc($query2);
		$position = $row2['position'];
		$is_teacher = $row2['teaching'];
		
		if($is_teacher==1)
		    $_SESSION['teaching'] = 1;
		
	    return $position;	
	}
	return $acct_type;
}



?>