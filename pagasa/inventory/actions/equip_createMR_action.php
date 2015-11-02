<?php
error_reporting(0);
include('../../db/db.php');
if(isset($_POST['submit'])) {
	
	$stock_no = mysql_real_escape_string($_POST['stock_no']);
	$quantity_acquired = mysql_real_escape_string($_POST['quantity']);
	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	$serial_no =$_POST['serial_no'];
	//$status = mysql_real_escape_string($_POST['status']);
	$date = date( 'Y-m-d' );
	
	echo "item:      "."$stock_no". "<br> ";
	echo "brand:       "."$emp_id"."<br> " ;
	echo "color:  "."$quantity_acquired"."<br> <br>";

    mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'OFF'");
	$sql = mysql_query("SELECT qoh FROM equipment_record_t WHERE stock_no = '$stock_no'");
	$row = mysql_fetch_array($sql);
	$q = $row['qoh'];
	$quant = $q - $quantity_acquired;
	if ($emp_id){
	if ($quant >= 0) {

		mysql_query("INSERT INTO equipment_property_t VALUES('', '$stock_no','$emp_id', '$quantity_acquired', '$date', 'borrowed')") or die ("mali ka");
		$property_no = mysql_insert_id();
		mysql_query("UPDATE equipment_record_t SET qoh = qoh - $quantity_acquired WHERE stock_no = '$stock_no'") or die("Wrong Entry");
		
		echo $property_no;
		foreach($serial_no as $serial){
		    mysql_query("INSERT INTO equipment_serial_t VALUES('', '$property_no', '$serial')") or die(mysql_error());	
		}
		mysql_query("Commit");
	echo "<script>window.close(); </script>";
	}
	
	else {
		echo "<script>window.alert('STOCK QUANTITY IS NOT SUFFICIENT!'); window.history.back();</script>";
	}
	} else { 	echo "<script>window.alert('SELECT EMPLOYEE!'); window.history.back();</script>";
	}
}
?>