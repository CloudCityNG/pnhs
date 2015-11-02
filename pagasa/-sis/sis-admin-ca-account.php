<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: restrict.php"); // IMPORTANT!!!!
?>
          		  <?php
		  require('../db/db.php');
		  if(isset($_GET['club_id'])&&isset($_GET['club_adv'])){
			  
		  	$club_id = $_GET['club_id'];
			$club_adv = $_GET['club_adv'];

			
			$queryname = mysql_query("SELECT * FROM club_t WHERE club_id = '$club_id'");
			$findname = mysql_fetch_assoc($queryname);
			$getfname = $findname['club_name'];
			$club_adviser = $findname['club_adviser'];
			$getcid = $findname['club_id'];
			
			
			$queryemp = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$club_adv'");
			$getemp = mysql_fetch_assoc($queryemp);
			$emp = $getemp['emp_id'];
			
			$queryaccno = mysql_query("SELECT * FROM employee_account_t WHERE emp_id = '$emp'");
			$getaccno = mysql_fetch_assoc($queryaccno);
			$accno = $getaccno['account_no'];
				$today = date("Y-m-d");
			
			
			mysql_query("INSERT INTO account_permission_t (account_no, privilege_id) VALUES ('$accno','11')");
			
			mysql_query("INSERT INTO club_adv_account_t (account_no, club_id, account_date) VALUES ('$accno', '$getcid','$today')");
			
	  echo '<p align="center"><font color="#46F45C"><i class="icon-check">Account successfully added</i></font></p>';
		  }
			header("Location: sis-admin-home2.php");
	      ?>
          
  