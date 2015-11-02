<?php

error_reporting(0);
if(isset($_POST['submit'])) {
require "../../db/db.php";

	$ris_no = mysql_real_escape_string($_POST['ris_no']);
	$rcc = mysql_real_escape_string($_POST['rcc']);
	$supplier = mysql_real_escape_string($_POST['supplier']);
	$item_no = mysql_real_escape_string($_POST['item_no']);
	$detail_no = mysql_real_escape_string($_POST['detail_no']);
	$description = mysql_real_escape_string($_POST['description']);
	$type_no = mysql_real_escape_string($_POST['type_no']);
	$unit = mysql_real_escape_string($_POST['unit']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$unit_amount = mysql_real_escape_string($_POST['unit_amount']);
	
	date_default_timezone_set("Asia/Manila");
	$date = date("Y-m-d  ");
	$total_amount = $unit_amount * $quantity;
	
	/** echo "RIS NO:    "."$ris_no"."<br>" ;
	echo "RCC:       "."$rcc". "<br> " ;
	echo "SUPPLIER:  "."$supplier". "<br> ";
	echo "ITEM:      "."$item_no"."<br> ";
	echo "CATEGORY:  "."$detail_no"."<br> ";
	echo "DETAILS:   "."$description"."<br> ";
	echo "TYPE:      "."$type_no"."<br> " ;
	echo "UNIT:      "."$unit". "<br> ";
	echo "QTY:       "."$quantity"."<br> " ;
	echo "UNIT AMT:  "."$unit_amount"."<br> <br>";
	
	echo "DATE:      "."$date"."<br> " ;
	echo "TOTAL AMT: "."$total_amount"."<br> ";
	
	echo "YEAH " ; **/
	$year = mysql_query("SELECT * FROM school_year_t WHERE SY_status ='1'");
	$taon = mysql_fetch_assoc($year);
	$sy_id = $taon['sy_id'];

	$sql = mysql_query("SELECT * FROM inventory_stock_t
								 WHERE detail_no = '$detail_no'
								 AND unit_no = '$unit' 
								 AND description = '$description'");
	if ($unit_amount > 0){
	  if ($quantity > 0){
		if(mysql_num_rows($sql)> 0){
			//echo "check";
			while ($row = mysql_fetch_array($sql)) {
				$stock_no = $row['stock_no'];	
			
				mysql_query("INSERT INTO supply_record_t 
							VALUES('','$stock_no','$supplier','$ris_no','$rcc','$quantity','$quantity','$date','$unit_amount','$total_amount','$sy_id')");
				mysql_query("UPDATE inventory_stock_t SET qoh = '$quantity'+ qoh WHERE stock_no = '$stock_no'"); 
				echo "<script>window.close(); </script>";
			}	
		}
		else {
				$row = mysql_fetch_array($sql);	
					mysql_query("INSERT INTO inventory_stock_t VALUES('','$detail_no','$unit','$type_no','$description','$quantity')");
					$no = mysql_query("SELECT stock_no FROM inventory_stock_t
								 		WHERE detail_no = '$detail_no'
								 		AND unit_no = '$unit' 
								 		AND type_no = '$type_no'
								 		AND description = '$description'");
					$row = mysql_fetch_array($no); 
					$stock = $row['stock_no'];
					mysql_query("INSERT INTO supply_record_t 
								VALUES('','$stock','$supplier','$ris_no','$rcc','$quantity','$quantity','$date','$unit_amount','$total_amount','$sy_id')");
					echo "<script>window.close(); </script>";			
		}
	  } else { echo "<script>window.alert('PLEASE ENTER CORRECT QUANTITY!'); window.history.back();</script>"; }
	} else { echo "<script>window.alert('PLEASE ENTER CORRECT UNIT COST!'); window.history.back();</script>"; } 
	
	mysql_query("COMMIT");	
	
}
?>