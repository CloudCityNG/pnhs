       <?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
	header("location: ../restrict.php");
?> 
        <?php
	require('../db/db.php');
	  
	  if(isset($_GET['club_id'])){
	  $id = $_GET['club_id'];
	  
	  $querycurrent = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
					$getcurrent = mysql_fetch_assoc($querycurrent);
					$current = $getcurrent['sy_id'];
							  
		  $queryclub = mysql_query("SELECT * FROM club_t WHERE club_id = '$id'");
		  $findclub = mysql_fetch_assoc($queryclub);
		  $club = $findclub['club_name'];

 $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
	
		  $querystud = mysql_query("SELECT * FROM student_account_t WHERE account_no = '$account_no'");
		  $findstud = mysql_fetch_assoc($querystud);
		  $stud = $findstud['student_id'];
		  
		  $getdate=date('y:m:d');
		  
		  mysql_query("START Transaction");
		  mysql_query("Auto-Commit = 'Off'");
		  $queryjoin = mysql_query("INSERT INTO club_application_t (club_id, student_id, application_date, school_year, app_status) VALUES ('$id','$stud','$getdate','$current','Unapproved')");
		  mysql_query("Commit");
		  
		 ?><script>alert("Your request to join has been sent. Membership is confirmed once this club appears in your current club list."); window.close(); </script><?php
	  }
	  
	  ?>
      
>
