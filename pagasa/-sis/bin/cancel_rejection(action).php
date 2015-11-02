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
if(isset($_POST['no'])){
header("Location: ca-club-pplications.php");
}
?>