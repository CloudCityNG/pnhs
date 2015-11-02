<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>

          		  <?php
		  require('../db/db.php');
		  if(isset($_GET['id'])){
		  	$student_id = $_GET['id'];


	if(isset($_POST['create'])){
	$uname = $_POST['username_stud'];
	$pword = $_POST['password_stud'];
	
			$querycheck = mysql_query("SELECT * FROM account_t WHERE username = '$uname'");
	$getcheck = mysql_fetch_assoc($querycheck);
	$check = $getcheck['username'];
	
	 if(($uname == 'NULL' && $pword == 'NULL') || ($uname == 'NULL' || $pword == 'NULL')){
		 echo '<font color="#DC2948"><i class="icon-warning-sign"></i>All fields are required.</font>';
	}else if($uname == $check){
		 echo '<p align="center"><font color="#DC2948"><i class="icon-warning-sign"></i>Username already exists!</font></p>';
	}else{

	mysql_query("INSERT INTO 
account_t(username, password, type) VALUES('$uname','$pword','student')");
	
	$queryacct = mysql_query("SELECT * FROM account_t WHERE username = '$uname'");
	$getacct = mysql_fetch_assoc($queryacct);
	$acct = $getacct['account_no'];
	$today=date("Y-m-d");
	
	mysql_query("INSERT INTO student_account_t(account_no, student_id, account_date) VALUES ('$acct','$student_id','$today')");
	
	mysql_query("INSERT INTO account_permission_t (account_no, privilege_id) VALUES ('$acct','17')");

	  
	  echo '<p align="center"><font color="#46F45C"><i class="icon-check">Account successfully added</i></font></p>';
	}
	}
		  }
		  header("Location: sis-admin-home.php");
		  ?>

          
 