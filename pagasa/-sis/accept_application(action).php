
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
if(isset($_GET['student_id']) && isset($_GET['club_id']) && isset($_GET['club_app_id'] )){
	$student_id = $_GET['student_id'];
    
		$club_id=$_GET['club_id'];
		
			$club_app_id = $_GET['club_app_id'];



                          //  $Today=date('y:m:d');
                            //$new=date('Y',strtotime($Today));
                         
	//					 $fut = $new+1;
						 
						 $querysy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status =  '1'");
						 $getsy = mysql_fetch_assoc($querysy);
						 $sy = $getsy['sy_id'];
						 $querypos = mysql_query("SELECT * FROM club_position_t WHERE position_desc = 'Undeclared'");
						 $getpos = mysql_fetch_assoc($querypos);
						 $pos = $getpos['position_id'];
						    
mysql_query("START Transaction");
mysql_query("Auto-Commit = 'Off'");
$query = mysql_query("INSERT INTO club_members_t (`club_id`, `student_id`, `position`, `academicyear_joined`) VALUES ('$club_id','$student_id','$pos','$sy')");
$query2 = mysql_query("UPDATE club_application_t SET app_status = 'Approved' WHERE club_app_id = '$club_app_id'");

mysql_query("Commit");

header("Location: ca-home.php");
		}

?>