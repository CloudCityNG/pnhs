
<?php
session_start();
$username = $_SESSION['username'];
error_reporting(0);
include("../db/db.php");
if($_POST['submit']){
	
	$user = $_POST['username'];
	$cpassw = $_POST['cpassword'];
	$passw = $_POST['password'];
	$repassw = $_POST['repassword'];

	$qqq = mysql_query("SELECT * FROM account_t WHERE username='$username'");
	$row = mysql_fetch_array($qqq);
	$id = $row['account_no'];

		if ($passw == $repassw){
			$sql = mysql_query("UPDATE account_t SET username = '$user', password = '$passw' WHERE account_no ='$id'");
			$_SESSION['username'] = $user ;
			header ("Location: ACCOUNT_SETTINGS.php");
		}

}
?>