 <?php

	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pnhs') or die ("Couldn't find database!");

if(isset($_POST['Update'])){
	$club_id= $_GET['club_id'];
	$club_name= $_POST['club_name'];
	$club_adv=$_POST['club_adv'];
	echo $club_id;
	echo $club_name;

    mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	mysql_query("Update club_t set club_name='$club_name', club_adviser='$club_adv' WHERE club_id='$club_id'");
	mysql_query("Commit");
	
	}	
	//header("location: ../SIS-add_club.php");
?>