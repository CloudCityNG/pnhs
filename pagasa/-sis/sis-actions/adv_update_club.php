<?php

	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");

 if(isset($_POST['Update'])){
	 
	$newclub_name = $_POST['newclub_name'];
	
	$id = $_POST['club_id'];
	
	$dup_checker = 0;
	
//	echo $newclub_name, $id;
	
	
			mysql_query("START Transaction");
			mysql_query("Auto-Commit = 'Off'");
	$querydup = mysql_query("SELECT * FROM club_t");
	while($getdup  = mysql_fetch_assoc($querydup)){
		if($getdup['club_name'] == $newclub_name){
			$dup_checker = $dup_checker+1;
		}
	}
	if($dup_checker>0){
		echo '<font color="#DD175C"><i class="icon-warning-sign"></i>Another club with this name is existing!</font>';
	}
	else{
	$sql = "UPDATE club_t SET club_name='$newclub_name' WHERE club_id='$id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	}
	mysql_query("Commit");
	
	//header("location: ../ca-update-club.php");
 }
  