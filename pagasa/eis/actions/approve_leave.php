<?php
include("../../db/db.php");
$leave_id = $_GET['leave_id'];

	$sql = mysql_query("UPDATE eis_leave_t SET leave_status = 'APPROVED' WHERE leave_id = '$leave_id'");
	
	$query = mysql_query("SELECT * FROM eis_leave_t, eis_leave_credits_t
							WHERE eis_leave_t.emp_id = eis_leave_credits_t.emp_id 
							AND eis_leave_t.leave_id = '$leave_id'");
	$row = mysql_fetch_assoc($query);
	$emp = $row['emp_id'];
	//echo $emp;
	$duration = $row['duration'];		
	$leave_bal = $row['leave_balance'];	
	//echo $duration;
	//echo $leave_bal;			
	$type = $row['type_of_leave'];
	if ($type == "Sick Leave"){
	$sick_bal = $row['sick_bal'];
	//echo $sick_bal;
	 mysql_query("UPDATE eis_leave_credits_t SET sick_bal = $sick_bal - $duration WHERE emp_id = '$emp'");
	 mysql_query("UPDATE eis_leave_credits_t SET leave_balance = $leave_bal - $duration WHERE emp_id = '$emp'");
	
	}
	
	else {
	$vac_bal = $row['vacation_bal'];
	//echo $vac_bal;
	 mysql_query("UPDATE eis_leave_credits_t SET vacation_bal = $vac_bal - $duration WHERE emp_id = '$emp'");
	 mysql_query("UPDATE eis_leave_credits_t SET leave_balance = $leave_bal - $duration WHERE emp_id = '$emp'");
	}
	
	echo "<script>window.location='../eis_admin_manage_leave.php';</script>";
?>