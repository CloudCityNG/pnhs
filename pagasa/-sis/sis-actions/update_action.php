 <?php

	mysql_connect('localhost','root','')or die("Couldn't connect!");
	mysql_select_db('pagasa') or die ("Couldn't find database!");

 
 
if(isset($_GET['old_name'])){
	$old_name=$_GET['old_name'];
 if(isset($_POST['Update'])){
	$newclub_name = $_POST['newclubname'];
	$newclub_adv= $_POST['newclubadv'];
	$id = $_POST['club_id'];
	$status = $_POST['clubstatus'];
	
	//echo $newclub_adv;

		
	if($newclub_name === $old_name){	
		
	$queryclub = mysql_query("SELECT * FROM club_t WHERE club_name !='$old_name'");
	$count =0;
	while($getclub = mysql_fetch_assoc($queryclub)){
		$existingclub = $getclub['club_name'];
		$existingadv = $getclub['club_adviser'];
		if($existingclub === $newclub_name){
			$count = $count+1;
			}


	}
	if ($count > 0 ){
		echo "<p><font color=\"#FB374A\">Club already exists!</font></p>";
		}
	else{
		echo "    <p><font color=\"#00FF66\">Club successfully added.</font></p>";
		mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$sql = "UPDATE club_t SET club_name='$newclub_name', club_adviser='$newclub_adv', club_status = '$status' WHERE club_id='$id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	mysql_query("Commit");
		}
	
	
	}
  else{
  	$queryclub2 = mysql_query("SELECT * FROM club_t");
	$count2 =0;
	while($getclub2 = mysql_fetch_assoc($queryclub2)){
		$existingclub2 = $getclub2['club_name'];
		$existingadv2 = $getclub2['club_adviser'];
		if($existingclub2 === $newclub_name){
			$count2 = $count2+1;
			}
		else if($existingadv2 === $newclub_adv){
			$count2=$count2+1;	
		}

	}
	if ($count2 > 0 ){
		echo "<p><font color=\"#FB374A\">Club/Club Adviser already exists!</font></p>";
		}
	else{
		echo "    <p><font color=\"#00FF66\">Club successfully added.</font></p>";
		mysql_query("START Transaction");
	mysql_query("Auto-Commit = 'Off'");
	$sql = "UPDATE club_t SET club_name='$newclub_name', club_adviser='$newclub_adv' WHERE club_id='$id'";
	$res = mysql_query($sql) or die("Could not Update".mysql_error());
	mysql_query("Commit");
		}
		
		
		
   }
	
	header("location: ../sis-admin-clubs.php");
 }
}
?>