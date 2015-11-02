<?php
include "../../db/db.php";

$schedule_id = $_GET['sched_id'];

$query = mysql_query("SELECT * FROM class_schedule_temp_t WHERE schedule_id={$schedule_id}") or die(mysql_error());
$row = mysql_fetch_assoc($query);

$arra['start'] = $row['time_start'];
$arra['end'] = $row['time_end'];;
$arra['day']= $row['day'];
echo json_encode($arra);
//print_r( $arra );
?>