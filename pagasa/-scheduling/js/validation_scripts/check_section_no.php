<?php

require "../../../db/db.php";

$section_no = $_GET['section_no'];
$year_level = $_GET['year_level'];

$query = mysql_query("SELECT * FROM section_t WHERE section_no='{$section_no}' AND year_level='{$year_level}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>