<?php require_once ("../../db/db.php"); ?>
<?php
if (isset($_GET['property_no']) && ($_GET['property_no']))			
         
{
			$property_no = $_GET['property_no'];
			mysql_query("START Transaction");
			mysql_query("Auto-Commit = 'OFF'");
			
			$sql = mysql_query("SELECT * FROM equipment_property_t, equipment_record_t 
								WHERE equipment_property_t.stock_no = equipment_record_t.stock_no
								AND equipment_property_t.property_no = '$property_no'");
			$row = mysql_fetch_array($sql);
			$qa = $row['quantity_acquired'];
			$sn = $row['stock_no'];
			$qoh = $row['qoh'];
			
			$update1 = mysql_query("UPDATE equipment_record_t SET qoh = '$qoh' + '$qa' WHERE stock_no = $sn");
			$update = mysql_query("UPDATE equipment_property_t SET status='returned' WHERE property_no = $property_no") or die("ERROR IN UPDATING");
			mysql_query("Commit");
			
			echo "<script>alert('Status Updated!')</script><META HTTP-EQUIV=Refresh CONTENT='0; URL=../equipment_logs.php'>";
			}
	?>			