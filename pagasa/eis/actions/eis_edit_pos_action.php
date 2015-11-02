<?php
include("../../db/db.php");
error_reporting(0);

if(isset($_POST['submit'])){

	$pos_id = mysql_real_escape_string($_POST['pos_id']);
	$pos_title = mysql_real_escape_string($_POST['pos_title']);
	$pos_type = mysql_real_escape_string($_POST['pos_type']);

	
		$sql = mysql_query("UPDATE `employee_position_t` SET `position_title`='$pos_title',`position_type`='$pos_type' WHERE `position_id`='$pos_id'");
		header("Location: ../eis_admin_manage_position.php");
	
	
}

?>