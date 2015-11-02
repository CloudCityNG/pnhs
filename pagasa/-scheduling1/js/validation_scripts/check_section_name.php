<?php

require "../../../db/db.php";

$section_name = $_GET['section_name'];

$query = mysql_query("SELECT * FROM section_t WHERE section_name='{$section_name}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>