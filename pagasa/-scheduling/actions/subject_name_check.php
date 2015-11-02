<?php
include_once "../../db/db.php";

$subject_title = $_GET['title'];

$query = mysql_query("SELECT * FROM subject_t WHERE subject_title='{$subject_title}'");

$rows = mysql_num_rows($query);

if($rows>0){
	return false;
}else{
	return true;
}


?>