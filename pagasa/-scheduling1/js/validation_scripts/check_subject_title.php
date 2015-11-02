<?php

require "../../../db/db.php";

$subject_title = $_GET['subject_title'];
//$subject_code = $_GET['subject_code'];

$query = mysql_query("SELECT * FROM subject_t WHERE subject_title='{$subject_title}'") or die(mysql_error());
$row = mysql_fetch_assoc($query);

if(mysql_num_rows($query)>0){
    echo "false";
}
else{
    echo "true";	
}
?>