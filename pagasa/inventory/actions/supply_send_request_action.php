<?php
error_reporting(0);
include('../../db/db.php');

$sd_id  = $_GET['sd_id'];
$rec_id = $_GET['record_id'];
echo $sd_id." ".$rec_id;
if ($sd_id && $rec_id) {
	
	$date = date("Y-m-d");
	$sql = mysql_query("SELECT * FROM inventory_stock_t, supply_record_t, supply_distribution_t
						WHERE inventory_stock_t.stock_no = supply_record_t.stock_no
						AND supply_distribution_t.sd_id = '$sd_id'
						AND supply_record_t.record_id = '$rec_id'");
	$row = mysql_fetch_array($sql);
	$bal_q = $row['balance_quantity'];
	$stock = $row['stock_no'];
	
	$q = mysql_query("SELECT quantity FROM supply_distribution_t WHERE sd_id = '$sd_id'");
	$row1 = mysql_fetch_array($q);
	$quantity  = $row1['quantity'];

	if( $bal_q < $quantity){
		echo "<script>window.alert('NOT SUFFICIENT QUANTITY!'); window.history.back(); </script>";
	}
	else { 
		mysql_query("UPDATE supply_distribution_t SET type = 'delivered' WHERE sd_id = '$sd_id'");
		mysql_query("UPDATE supply_distribution_t SET date_recieved = '$date' WHERE sd_id = '$sd_id'");
		mysql_query("UPDATE supply_distribution_t SET record_id = '$rec_id' WHERE sd_id = '$sd_id'");
		mysql_query("UPDATE supply_record_t SET balance_quantity = balance_quantity - '$quantity' WHERE record_id = '$rec_id'");
		$qqq = mysql_query("UPDATE inventory_stock_t SET qoh = qoh - '$quantity' WHERE inventory_stock_t.stock_no = '$stock'");
		echo "<script>window.location='../inv_home1.php'; </script>";
	} 

}
?>