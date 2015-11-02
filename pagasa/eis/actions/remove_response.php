<?php
include("../../db/db.php");

$id = $_GET['leave_res_id'];
	mysql_query("DELETE FROM eis_leave_response_t WHERE leave_res_id = '$id' ");
	header("Location: ../eis_emp_view_leave.php");
?>