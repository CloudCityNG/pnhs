<?php


function load_sched($section_id, $sy_id){
	//$sy_id=get_active_sy();
	
	$query = mysql_query("SELECT * FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t WHERE section_id={$section_id} AND sy_id={$sy_id})") or die("fail");
	
	while($row = mysql_fetch_assoc($query)){
		$schedule_id = $row['schedule_id'];
		$class_id = $row['class_id'];
		$day = $row['day'];
		$time_start = $row['time_start'];
		$time_end = $row['time_end'];
		$room = $row['room'];
		
		if(is_existing_v($schedule_id)){
			mysql_query("UPDATE class_schedule_temp_t SET class_id='{$class_id}',
														  day='{$day}',
														  time_start='{$time_start}',
														  time_end='{$time_end}',
														  room='{$room}'
													  WHERE schedule_id={$schedule_id}") or die("update ".mysql_error());
		}
		else{
			mysql_query("INSERT INTO class_schedule_temp_t VALUES('$schedule_id',
																  '$class_id',
																  '$day',
																  '$time_start',
																  '$time_end',
																  '$room')") or die("insert ".mysql_error());
		}
	}
    return;
}




function load_sched_emp($emp_id, $sy_id){
	//$sy_id=get_active_sy();
	$query = mysql_query("SELECT * FROM class_schedule_t WHERE class_id IN (SELECT class_id FROM class_t WHERE teacher_id={$emp_id} AND sy_id={$sy_id})") or die("fail");
	
	while($row = mysql_fetch_assoc($query)){
		$schedule_id = $row['schedule_id'];
		$class_id = $row['class_id'];
		$day = $row['day'];
		$time_start = $row['time_start'];
		$time_end = $row['time_end'];
		$room = $row['room'];
		
		if(is_existing_v($schedule_id)){
			mysql_query("UPDATE class_schedule_temp_t SET class_id='{$class_id}',
														  day='{$day}',
														  time_start='{$time_start}',
														  time_end='{$time_end}',
														  room='{$room}'
													  WHERE schedule_id={$schedule_id}") or die("update ".mysql_error());
		}
		else{
			mysql_query("INSERT INTO class_schedule_temp_t VALUES('$schedule_id',
																  '$class_id',
																  '$day',
																  '$time_start',
																  '$time_end',
																  '$room')") or die("insert ".mysql_error());
		}
	}
    return;
}

function is_existing_v($schedule_id){
	$query = mysql_query("SELECT * FROM class_schedule_temp_t WHERE schedule_id={$schedule_id}") or die(mysql_error());
	return (mysql_num_rows($query)>0)? true:false; 
}
?>