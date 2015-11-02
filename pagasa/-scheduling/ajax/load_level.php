<?php

require "../../db/db.php";
$lvl_id = $_GET['lvl_id'];
	
$query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$lvl_id}'") or die(mysql_error());	
$row = mysql_fetch_assoc($query);
echo json_encode($row);

?>