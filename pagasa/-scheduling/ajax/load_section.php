<?php

require "../../db/db.php";
$section_id = $_GET['section_id'];
	
$query = mysql_query("SELECT * FROM section_t WHERE section_id='{$section_id}'") or die(mysql_error());	
$row = mysql_fetch_assoc($query);
echo json_encode($row);

?>