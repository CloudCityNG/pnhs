<?php

function delete_teacher($empd_id){
    require_once "../../db/db.php";
	mysql_query("UPDATE teacher_t SET teacher_status='0' WHERE emp_id='{$empd_id}'") or die(mysql_error());	
	
}
?>