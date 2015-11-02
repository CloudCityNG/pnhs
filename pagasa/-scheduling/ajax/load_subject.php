<?php

require "../../db/db.php";
$subject_code = $_GET['subject_code'];
	
$query = mysql_query("SELECT * FROM subject_t WHERE subject_code='{$subject_code}'") or die(mysql_error());	
$row = mysql_fetch_assoc($query);
echo json_encode($row);

?>