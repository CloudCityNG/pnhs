<?php
error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$ris_no = mysql_real_escape_string($_POST['ris_no']);
	$rcc = mysql_real_escape_string($_POST['rcc']);
	$supplier = mysql_real_escape_string($_POST['supplier']);
	$stock_no = mysql_real_escape_string($_POST['stock_no']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$unit_amount = mysql_real_escape_string($_POST['unit_amount']);
	
	$date = date( 'Y-m-d' );	
	$total_amount = $unit_amount * $quantity;
	
	$year = mysql_query("SELECT * FROM school_year_t WHERE SY_status ='1'");
	$taon = mysql_fetch_assoc($year);
	$sy_id = $taon['sy_id'];
	
	/** echo "RIS NO:    "."$ris_no"."<br>" ;
	echo "RCC:       "."$rcc". "<br> " ;
	echo "SUPPLIER:  "."$supplier". "<br> ";
	echo "STOCK NO:      "."$stock_no"."<br> ";
	echo "QTY:       "."$quantity"."<br> " ;
	echo "UNIT AMT:  "."$unit_amount"."<br> <br>";
	
	echo "DATE:      "."$date"."<br> " ;
	echo "TOTAL AMT: "."$total_amount"."<br> ";

	echo "YEAH " ; **/
	
	if ($unit_amount > 0){
	  if ($quantity > 0){
	  
		$sql = mysql_query("INSERT INTO supply_record_t VALUES('','$stock_no','$supplier','$ris_no','$rcc','$quantity','$quantity','$date','$unit_amount','$total_amount','$sy_id')");
		mysql_query("UPDATE inventory_stock_t SET qoh = '$quantity'+ qoh WHERE stock_no = '$stock_no'"); 
		mysql_query("COMMIT");
		echo "<script>window.close(); </script>";
	
	  } else { echo "<script>window.alert('PLEASE ENTER CORRECT QUANTITY !'); window.history.back();</script>"; }
	} else { echo "<script>window.alert('PLEASE ENTER CORRECT UNIT COST!'); window.history.back();</script>"; } 
	
mysql_query("COMMIT");	
}
?>