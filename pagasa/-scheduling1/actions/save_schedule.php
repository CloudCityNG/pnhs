<?php
$section_id =$_GET['section_id'];

require "../../db/db.php";

$query = mysql_query("SELECT * FROM class_schedule_temp_t WHERE class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id})") or die(mysql_error());
	
	while($row = mysql_fetch_assoc($query)){
		$schedule_id = $row['schedule_id'];
		$class_id = $row['class_id'];
		$day = $row['day'];
		$time_start = $row['time_start'];
		$time_end = $row['time_end'];
		$room = $row['room'];
		
		if(is_existing($schedule_id)){
		    mysql_query("UPDATE class_schedule_t SET class_id='{$class_id}',
													 day='{$day}',
													 time_start='{$time_start}',
													 time_end='{$time_end}'
											   WHERE schedule_id='{$schedule_id}'") or die(mysql_error());	
			
		}
		else{
		    mysql_query("INSERT INTO class_schedule_t VALUES( NULL,
															  '$class_id',
															  '$day',
															  '$time_start',
															  '$time_end',
															  '$room')") or die(mysql_error());
		}
	}
function is_existing($schedule_id){
	$query = mysql_query("SELECT * FROM class_schedule_t WHERE schedule_id={$schedule_id}") or die(mysql_error());
	return (mysql_num_rows($query)>0)? true:false; 
}

?>