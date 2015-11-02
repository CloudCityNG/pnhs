<?php

	mysql_connect("localhost","root","");
	mysql_select_db("pagasa");



 if(isset($_GET['club_app_id'])){
  $club_app_id = $_GET['club_app_id'];

$queryclubappid = mysql_query("SELECT * FROM club_application_t WHERE club_app_id = '$club_app_id'");
$getclubappid = mysql_fetch_assoc($queryclubappid);
$clubappid = $getclubappid['club_app_id'];



mysql_query("START Transaction");
mysql_query("Auto-Commit = 'Off'");
$querydelapp = mysql_query("DELETE FROM pnhs.club_application_t WHERE club_application_t.club_app_id = '$club_app_id'");
mysql_query("Commit");


header("Location: ../sis-admin-clubs.php");
}

?>