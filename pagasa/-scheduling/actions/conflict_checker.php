<?php

$str_start = "12:00:00";
$str_end = "13:00:00";

$start = strtotime($str_start);
$end = strtotime($str_end);

if($start>$end){
	echo $str_start." > ".$str_end;
}
else if($start<$end){
	echo $str_start." < ".$str_end;
}
else{
	echo $str_start." = ".$str_end;
}

echo "<br>";
$start1 = "12:00";
$end1 = "13:00";
$start2 = "13:00";
$end2 = "14:00";


$t_start1 = strtotime($start1);
$t_end1 = strtotime($end1);
$t_start2 = strtotime($start2);
$t_end2 = strtotime($end2);



echo "$start1 - $end1 <br>";

echo "$start2 - $end2 <br>";


echo conflict_check($t_start1,$t_end1,$t_start2,$t_end2);
function conflict_check_print($t_start1, $t_end1, $t_start2, $t_end2){

if($t_start1>=$t_start2 && $t_start1<$t_end2){
  echo "conflict.";	
}
else{
  echo "good.";	
}
echo "<br>";

if($t_end1>$t_start2 && $t_end1<=$t_end2){
  echo "conflict.";	
}
else{
  echo "good.";	
}
echo "<br>";

if($t_start2>=$t_start1 && $t_start2<$t_end1){
  echo "conflict.";	
}
else{
  echo "good.";	
}
echo "<br>";

if($t_end2>$t_start1 && $t_end2<=$t_end1){
  echo "conflict.";	
}
else{
  echo "good.";	
}
echo "<br>";

//not so sure about this
if($t_end2==$t_end1 && $t_start1==$t_start2){
  echo "conflict.";	
}
else{
  echo "good.";	
}
echo "<br>";

}


function conflict_check($t_start1, $t_end1, $t_start2, $t_end2){
if($t_start1>=$t_start2 && $t_start1<$t_end2){
  return "conflict.";	
}

if($t_end1>$t_start2 && $t_end1<=$t_end2){
  return "conflict.";	
}

if($t_start2>=$t_start1 && $t_start2<$t_end1){
  return "conflict.";	
}

if($t_end2>$t_start1 && $t_end2<=$t_end1){
  return "conflict.";	
}

return "good";

}


?>