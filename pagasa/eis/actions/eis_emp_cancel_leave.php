<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else {
	header("location: restrict.php"); // IMPORTANT!!!!
}
?>

<?php	
error_reporting(0);
include('../../db/db.php');
if(isset($_GET['leave_id'])) {

		$id = $_GET['leave_id'];
		$result = mysql_query("DELETE FROM eis_leave_t WHERE leave_id= '$id' ") or die(mysql_error());
		header("Location: ../eis_emp_view_leave.php");


}
?>