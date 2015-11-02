<?php 
include("../db/db.php");
 @session_start();
 
 if (!isset($_SESSION['username'])) {
	
		echo'<script language="javascript">
		alert(\'Unable to view this page you have to login!\')
		</script>';

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../?error=Login_Required\">";
}
else{
	$username = $_SESSION['username'];
	
	
?>
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
//$registrar= is_privileged($_SESSION['account_no'], 13);
$eis_admin= is_privileged($_SESSION['account_no'], 3);
$super_admin= is_privileged($_SESSION['account_no'], 2);
$student= is_privileged($_SESSION['account_no'], 17);


if(!$developer && !$eis_admin){
	if($student){
	header("Location: ../restrict.php");
	}
	else{
		header("Location: eis_emp_home.php");
		}
}
else{
	header("Location: eis_dev_home.php");
	
	}
 ?>
<?php
}
 ?>