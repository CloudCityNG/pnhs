<?php

require "../../../db/db.php";

$section_name = $_GET['section_name'];
$section_id = $_GET['section_id'];


$query = mysql_query("SELECT * FROM section_t WHERE section_name='{$section_name}' AND section_id<>'{$section_id}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>