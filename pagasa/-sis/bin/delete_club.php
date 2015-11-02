<?php

mysql_connect("localhost","root","");
mysql_select_db("pagasa");

if(isset($_GET['Edit'])){
	$club_id = $_GET['club_id'];
	
	mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	mysql_query("DELETE FROM club_t WHERE club_id='$club_id'");
	mysql_query("DELETE FROM club_members_t WHERE club_id='$club_id'");
	mysql_query("Commit");
	


}
header("Location: sis-admin-clubs.php");
?>
