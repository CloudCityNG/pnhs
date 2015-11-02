<?php require_once ("../../db/db.php"); ?>
<?php
if (isset($_POST['submit']) && isset($_GET['sd_id']))
	{
		$sd_id = $_GET['sd_id'];
		$message = $_POST['message'];
		if($message) {
		echo "$message";
		mysql_query("INSERT INTO supply_message_t VALUES('','$message','$sd_id','no')");
		mysql_query("UPDATE supply_distribution_t SET type='ignore' WHERE sd_id= '$sd_id' ") or die(mysql_error());
		}
		header("Location: ../inv_home.php");
	}
	mysql_query("COMMIT");	
?>