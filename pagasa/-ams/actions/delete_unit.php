<?php require_once ("../../db/db.php"); ?>
<?php
if (isset($_GET['unit_no']) && is_numeric($_GET['unit_no']))
	{
		$unit_no = $_GET['unit_no'];
		$result = mysql_query("DELETE FROM unit_t WHERE unit_no=$unit_no") or die(mysql_error());
		header("Location: ../supply_item_units.php");
	}

?>
