<?php

require "../../../db/db.php";

$category_name = $_GET['category_name'];
$category_id = $_GET['category_id'];


$query = mysql_query("SELECT * FROM subject_category_t WHERE category_id<>'{$category_id}' AND category_name='{$category_name}' ") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>