<?php

require "../../../db/db.php";

$year_level = $_GET['year_lvl'];
$lvl_id = $_GET['lvl_id'];

$query = mysql_query("SELECT * FROM year_level_t WHERE year_lvl='{$year_level}'  AND lvl_id<>'{$lvl_id}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>