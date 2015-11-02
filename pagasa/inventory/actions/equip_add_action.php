<?php

@session_start();
require ('../../db/db.php');
if(isset($_POST['submit'])){

			//$stock_no =$_POST['stock_no'];
			$date_delivered=date( 'Y-m-d' );
			$unit=$_POST['unit'];
			//$supply_type=$_POST['supply_type'];
			$life_span=$_POST['rcc'];
			$amount=$_POST['unit_amount'];
			$quantity=$_POST['quantity'];
			$category_id =$_POST['item_no'];
		    $brand_id=$_POST['detail_no'];
			$color_id=$_POST['type_no'];
			$specs=$_POST['specs'];
			$supplier_no=$_POST['supplier'];
			
	/** echo "date:    "."$date_delivered"."<br>" ;
	echo "date:       "."$unit". "<br> " ;
	//echo "SUPPLy type:  "."$supply_type". "<br> ";
	echo "life:      "."$life_span"."<br> ";
	echo "amt:  "."$amount"."<br> ";
	echo "qty:   "."$quantity"."<br> ";
	echo "item:      "."$category_id". "<br> ";
	echo "brand:       "."$brand_id"."<br> " ;
	echo "color:  "."$color_id"."<br> <br>";
	
	echo "specs:      "."$specs"."<br> " ;
	echo "supplier: "."$supplier_no"."<br> ";
	
	echo "YEAH " ; **/
		
	$year = mysql_query("SELECT * FROM school_year_t WHERE SY_status ='1'");
	$taon = mysql_fetch_assoc($year);
	$sy_id = $taon['sy_id'];
			
	if ($amount > 0){
	  if ($quantity > 0){
	    if ($life_span > 0) {	
			mysql_query("START Transaction");
			mysql_query("Auto-Commit = 'OFF'");
			$qe = mysql_query("SELECT * FROM equipment_record_t ORDER BY stock_no DESC");

			$row = mysql_fetch_assoc($qe); 
			$id = $row['stock_no'];
			$id++;
	
			$query2=mysql_query("INSERT into equipment_record_t VALUES ('', '$supplier_no', '$date_delivered', '$unit', '$quantity', '$life_span', '$amount', '$quantity','$sy_id')")or die("error in record");
			
			$stock=mysql_query("SELECT * FROM equipment_record_t");
			while($stock_row = mysql_fetch_assoc($stock)){
			    $stock_no = $stock_row['stock_no'];
				
		    $query1 = mysql_query("INSERT into equipment_item_t VALUES('', '$stock_no', '$category_id', '$color_id', '$specs')")or die("error in item");
			 mysql_query("Commit");
				echo "<script>window.close(); </script>";	
			}
			
	      } else { echo "<script>window.alert('PLEASE ENTER CORRECT LIFE SPAN !'); window.history.back();</script>"; }	
	   } else { echo "<script>window.alert('PLEASE ENTER CORRECT QUANTITY !'); window.history.back();</script>"; }
	} else { echo "<script>window.alert('PLEASE ENTER CORRECT AMOUNT!'); window.history.back();</script>"; } 

}	
?>