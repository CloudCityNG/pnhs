<?php

require "../../../db/db.php";

$lvl_name = $_GET['lvl_name'];
$lvl_id = $_GET['lvl_id'];

$query = mysql_query("SELECT * FROM year_level_t WHERE lvl_name='{$lvl_name}'  AND lvl_id<>'{$lvl_id}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>