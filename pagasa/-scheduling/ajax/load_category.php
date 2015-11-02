<?php

require "../../db/db.php";
$category_id = $_GET['category_id'];
	
$query = mysql_query("SELECT * FROM subject_category_t WHERE category_id='{$category_id}'") or die(mysql_error());	
$row = mysql_fetch_assoc($query);
echo json_encode($row);

?>