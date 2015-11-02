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
		
		$sql = mysql_query("SELECT * FROM supply_distribution_t, inventory_stock_t 
							WHERE sd_id = '$sd_id'
							AND supply_distribution_t.stock_no = inventory_stock_t.stock_no");
							
		$row = mysql_fetch_assoc($sql);
		$quantity = $row['quantity'];
		$stock_no = $row['stock_no']; 
		$result = mysql_query("UPDATE supply_distribution_t SET type='pending' WHERE sd_id= '$sd_id' ") or die(mysql_error());
		header("Location: ../inv_request_list.php");


}
?>