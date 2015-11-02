<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
{
header("location: ../restrict.php");
}
?> 
<?php

mysql_connect('localhost','root','')or die("Couldn't connect!");
mysql_select_db('pagasa') or die("Couldn't find database!");

 if(isset($_GET['club_app_id'])){
  $club_app_id = $_GET['club_app_id'];

$queryclubappid = mysql_query("SELECT * FROM club_application_t WHERE club_app_id = '$club_app_id'");
$getclubappid = mysql_fetch_assoc($queryclubappid);
$clubappid = $getclubappid['club_app_id'];



mysql_query("START Transaction");
mysql_query("Auto-Commit = 'Off'");
mysql_query("Commit");
$queryedit = mysql_query("UPDATE club_application_t SET app_status = 'Rejected' WHERE club_app_id = '$clubappid'");

header("Location: ../ca-club-applications.php");
}

?>