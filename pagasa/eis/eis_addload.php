<?php 
include('../db/db.php');


if(isset($_POST['addload'])){
	$emp_id=$_POST['emp'];
	$load=$_POST['load'];
	
	mysql_query("INSERT INTO teacher_t(emp_id, max_load) Values ('$emp_id','$load')");
	
	}

echo '<script>alert("Profile Successfully Added!!"); 
		window.close();</script>';
?>