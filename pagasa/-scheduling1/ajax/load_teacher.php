<?php

require "../../db/db.php";
$emp_id = $_GET['emp_id'];
	
$query = mysql_query("SELECT  teacher_t.max_load as max_load FROM employee_t, teacher_t WHERE teacher_t.emp_id='{$emp_id}'") or die(mysql_error());	
$row = mysql_fetch_assoc($query);
echo json_encode($row);

?>