 <?php
	require('../db/db.php');
	  
	  if(isset($_GET['club_id'])){
		  $club_id = $_GET['club_id'];
		  
		  $queryclub = mysql_query("SELECT * FROM club_t WHERE club_id = '$club_id'");
		  $findclub = mysql_fetch_assoc($queryclub);
		  $club = $findclub['club_name'];
$queryacc = mysql_query("select * from account_t where username = '$username'");
$findacc = mysql_fetch_assoc($queryacc);
$acc = $findacc['account_no'];	 
	
		  $querystud = mysql_query("SELECT * FROM student_account_t WHERE account_no = '$acc'");
		  $findstud = mysql_fetch_assoc($querystud);
		  $stud = $findstud['student_id'];
		  
		  $getdate=date('y:m:d');
		  
		  mysql_query("START Transaction");
		  mysql_query("Auto-Commit = 'Off'");
		  $queryjoin = mysql_query("INSERT INTO club_application_t VALUES ('','$club_id','$stud','$getdate')");
		  mysql_query("Commit");
		  
		 ?><script>alert("Your request to join has been sent. Membership is confirmed once this club appears in your current club list."); window.close(); </script><?php
	  }
	  
	  ?>
      