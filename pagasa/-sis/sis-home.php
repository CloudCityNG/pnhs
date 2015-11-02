<?php 
@session_start();

include "../db/db.php";
include "../actions/user_privileges.php";

  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $sis_admin = is_privileged($_SESSION['account_no'], 4);
  $club_adviser = is_privileged($_SESSION['account_no'], 11);
  $student = is_privileged($_SESSION['account_no'], 17);
  if(!$developer && !$super_admin && !$sis_admin && !$club_adviser && !$student){
      header("Location: restrict.php");  
  }


			  if($developer && $super_admin){
				  header("location: ../-sis/sis-admin-home.php");
			  }
			  else if($sis_admin){
				  header("location: ../-sis/sis-admin-home.php");
			  }
			  else if ($club_adviser){
				  header("location: ../-sis/ca-home.php");  
			  } else if ($student){
				  header("location: ../-sis/student-home.php");  
			  }
			  else{
				header("location: ../restrict.php");
			  }
?>