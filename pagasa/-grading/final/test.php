<?php
include('../../db/db.php');
//$i = 0;
foreach ($_POST['grade'] as $key => $value) {
								
								$student_id = $_POST['student_id'][$key];
								$quiz_score = $_POST['grade'][$key];
								//echo $student_id."<br/>";
								$sqll =  mysql_query("INSERT INTO test values ('$student_id')") or die("Error in data insertion.".mysql_error());
								//mysql_query("INSERT INTO test VALUES ('$student_id')");
								//$i++;
								}
								
?>								