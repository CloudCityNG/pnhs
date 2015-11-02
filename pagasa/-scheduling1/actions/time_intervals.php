<?php

$times = array();

$add = strtotime("00:15");
$time = strtotime("07:00");

for($i=0;$i<4*10+2;$i++){
	$times[$i] = date( 'H:i:00', $time);
	$time=$time+(60*15);
}

$day_array = array('monday','tuesday','wednesday','thursday','friday');                                          #


$t1 = strtotime("07:00");
$t2 = strtotime("07:30");
$flag_ceremony = array(
    "start_time" => $t1,
	"end_time"   => $t2,
	"slots"      => ($t2-$t1)/900);

$t1 = strtotime("09:30");
$t2 = strtotime("09:45");
$recess = array(
    "start_time" => $t1,
	"end_time"   => $t2,
	"slots"      => ($t2-$t1)/900);
	
$t1 = strtotime("12:00");
$t2 = strtotime("13:00");
$lunch = array(
    "start_time" => $t1,
	"end_time"   => $t2,
	"slots"      => ($t2-$t1)/900);	


/*
function get_time_index($time){
    $t_time = strtotime($time);
	for($i=0;$i<count($times);$i++){
	    $t_times = strtotime($times[$i]);
		if($t_time == $t_times)
		    return $i;	
	}
	return -1;
} */
?>