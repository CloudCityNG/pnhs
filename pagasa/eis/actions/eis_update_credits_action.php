<?php
include("../../db/db.php");
error_reporting(0);

if(isset($_POST['submit'])){

	$id = mysql_real_escape_string($_POST['cat_id']);
	$sick_cred = mysql_real_escape_string($_POST['sick_cred']);
	$vac_cred = mysql_real_escape_string($_POST['vac_cred']);
	
	
		$sql = mysql_query("UPDATE `eis_leave_add_cat` SET `sick_credits`='$sick_cred',`vac_credits`='$vac_cred' WHERE `cat_id`='$id'");
		header("Location: ../eis_admin_manage_credits.php");
	
	
	
}

?>