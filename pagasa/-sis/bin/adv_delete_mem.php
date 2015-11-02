<?php

mysql_connect("localhost","root","");
mysql_select_db("pagasa");

if(isset($_GET['Club'])){
		$student_id = $_GET['Club'];
	if( isset($_GET['Student'])){
	$club_id = $_GET['Student'];
	if(isset($_GET['sy'])){
		$yearjoined = $_GET['sy'];

	
	//mysql_query("START Transaction");
	//mysql_query("Auto-Commit = 'Off'");
	mysql_query("DELETE FROM club_members_t WHERE club_id='$club_id' AND student_id='$student_id' AND academicyear_joined ='$yearjoined'");
	//mysql_query("Commit");
	

	
}
	}

}
header("location: ca-members.php");
	?>