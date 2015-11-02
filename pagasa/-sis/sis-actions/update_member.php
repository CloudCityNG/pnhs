 <?php

	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pnhs') or die ("Couldn't find database!");

 if(isset($_POST['position']) || isset($_POST['year'])){
	$club_id = $_POST['club_id'];
	$student_id = $_POST['student_id'];
	$pos =  $_POST['position'];
	$year = $_POST['year'];
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$sql = "UPDATE club_members_t SET position='$pos', year_joined='$year' WHERE club_id='$club_id' AND student_id='$student_id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	mysql_query("Commit");
	
	header("location: ../SIS-add_members.php?Add=$club_id");
 }
?>