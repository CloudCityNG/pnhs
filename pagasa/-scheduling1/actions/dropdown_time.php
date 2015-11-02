<?php
include('../db/db.php');
include "time_intervals.php";
if(isset($_POST['times_index']) && $_POST['times_index'] != '')
{
  $times_index = $_POST['times_index'];
  $times_index = mysql_real_escape_string($times_index);
  $start = $times[0];
  
  for($i=$times_index ; $i<count($times) ; $i++){
	  	  echo "<option value='".$i."'>".date('h:i A', strtotime($times[$i]))."</option>";

  }
  
  //if(true)
  //{
  //  while($row = mysql_fetch_array($res))
	//{
	//  echo "<option value='".$row['detail_no']."'>".ucfirst($row['category'])."</option>";
	//}
  //}
}
?>