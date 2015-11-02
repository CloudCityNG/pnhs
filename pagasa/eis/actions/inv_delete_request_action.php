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
if(isset($_GET['sd_id'])) {

		$sd_id = $_GET['sd_id'];
		$result = mysql_query("DELETE FROM supply_distribution_t WHERE sd_id= '$sd_id' ") or die(mysql_error());
		header("Location: ../inv_request_items.php");


}
?>