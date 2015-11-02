<?php 
include("../../db/db.php");

if(isset($_POST['add_pos'])){
	$pos_name=$_POST['pos_name'];
	$pos_type=$_POST['pos_type'];

	$query="INSERT INTO `employee_position_t`(`position_id`, `position_title`, `position_type`) VALUES ('','$pos_name','$pos_type')";

	
	mysql_query($query) or die(mysql_error());		
	
	echo "<script>window.location='../eis_admin_manage_position.php';</script>";
}


?>