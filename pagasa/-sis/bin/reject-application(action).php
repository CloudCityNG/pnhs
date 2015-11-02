
<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
	
	//$s_type=("employee");
	//if($_SESSION['user_type']==$s_type){
		
		
		//header("location: SIS-Home_restrict2.php");
		
	//	}
	
}
else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>

<?php

mysql_connect('localhost','root','')or die("Couldn't connect!");
mysql_select_db('pagasa') or die("Couldn't find database!");

 if(isset($_GET['club_app_id'])){
	  $club_app_id = $_GET['club_app_id'];

//$queryclubappid = mysql_query("SELECT * FROM club_application_t WHERE club_app_id = '$club_app_id'");
//$getclubappid = mysql_fetch_assoc($queryclubappid);
//$clubappid = $getclubappid['club_app_id'];


mysql_query("START Transaction");
mysql_query("Auto-Commit = 'Off'");
$querydelapp = mysql_query("DELETE FROM club_application_t WHERE club_app_id = '$club_app_id'");
mysql_query("Commit");


header("Location: ca-home.php");
}

?>
