<?php
if(isset($_POST['submit'])){
	$quer = $_POST['quer'];
	$stud_quer = $_POST['stud_quer'];
	
	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");
	$sql3 = "select * from student_t where $quer like \"%$stud_quer%\"";
	$search = mysql_query($sql3);
	
	while($findit = mysql_fetch_assoc($search)){
		echo '<p><b>'.$findit['student_id'].'</b><br />'.$findit['F_name'].'<br />'.$findit['L_name'].'</p>';
	}
}
?>