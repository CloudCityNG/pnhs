<?php


mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");


	if(isset($_GET['s_id'])){
    	$s_id=$_GET['s_id'];
	if(isset($_GET['off_code'])){
    	$off_code=$_GET['off_code'];
	if(isset($_GET['date'])){
    	$date=$_GET['date'];		
	if(isset($_POST['Update'])){
	$remarks=$_POST['remarks'];
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	mysql_query("UPDATE student_offense_list_t  SET Remarks='$remarks' WHERE  student_id='$s_id' AND offense_code='$off_code' AND offense_date='$date'");
	mysql_query("Commit");

	header("location: ../sis-admin-personal-offenses.php?student_id=".$s_id);
	}
	}
	}
	}


?>