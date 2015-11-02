<?php

require "../../../db/db.php";

$section_no = $_GET['section_no'];
$year_level = $_GET['year_level'];
$section_id = $_GET['section_id'];

$query = mysql_query("SELECT * FROM section_t WHERE section_id<>'{$section_id}' AND section_no='{$section_no}' AND year_level='{$year_level}' ") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>