 <?php

	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");
	
	if(isset($_GET['Student']))
	$student_id=$_GET['Student'];
	if(isset($_GET['Club']))
	$club_id=$_GET['Club'];
	
	echo $student_id, $club_id;
		
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	mysql_query("DELETE FROM club_members_t WHERE club_id='$club_id' AND student_id='$student_id'");
	mysql_query("Commit");
	
	header("location: ../sis-admin-update-club.php?Edit=".$club_id);
	
	
?>