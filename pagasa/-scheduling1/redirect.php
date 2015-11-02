<?php 
@session_start();

include "../db/db.php";
include "../actions/user_privileges.php";

  if(!isset($_SESSION['username'])){
	  header("Location: ../restrict.php");
	  
  }
  
  $developer = is_privileged($_SESSION['account_no'], 1);
  $super_admin = is_privileged($_SESSION['account_no'], 2);
  $scheduling_admin = is_privileged($_SESSION['account_no'], 6);
  $scheduling_officer = is_privileged($_SESSION['account_no'], 14);
  
  if(!$developer && !$super_admin && !$scheduling_admin && !$scheduling_officer){
      header("Location: restrict.php");  
  }


?>

<?php 
  if(!$developer && $super_admin && !$scheduling_admin && !$scheduling_officer){
      header("location: reports_section.php");
  }
  else{
	  header("location: schedules.php");  
  }
?>