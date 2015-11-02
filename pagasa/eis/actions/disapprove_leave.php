<?php
include("../../db/db.php");
if ($_POST['submit']){
$leave_id = $_GET['leave_id'];
	
	$response = $_POST['response'];
	$sql = mysql_query("UPDATE eis_leave_t SET leave_status = 'DISAPPROVED' WHERE leave_id = '$leave_id'");
	$sql1 = mysql_query("INSERT INTO eis_leave_response_t VALUES('', '$leave_id', '$response')");
	echo "<script>window.location='../eis_admin_manage_leave.php';</script>";

}
?>