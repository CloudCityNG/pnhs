<?php

mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");



if(isset($_POST['Add'])){
	if(isset($_GET['Club']))
    $club_id=$_GET['Club'];
	$student_id=$_POST['student_id'];
	$position=$_POST['Position'];
	$year_joined=$_POST['Year'];
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	mysql_query("INSERT INTO `club_members_t`(`club_id`, `student_id`, `position`, `year_joined`) VALUES ('$club_id','$student_id','$position','$year_joined')");
	mysql_query("Commit");
	
	header('location: ../sis-admin-add-members.php?Add='.$_GET['Club']);
	}

?>