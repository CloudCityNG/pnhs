<?php

require "../../db/db.php";

$section_id = $_GET['section_id'];
$teacher_id = $_GET['teacher_id'];

if(isset($section_id)){
    mysql_query("DELETE FROM class_schedule_temp_t WHERE class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id})  ")or die("sala mamen");
}
if(isset($teacher_id)){
    mysql_query("DELETE FROM class_schedule_temp_t WHERE class_id IN (SELECT class_id FROM class_t WHERE teacher_id={$teacher_id})  ")or die("sala mamen");

}

?>