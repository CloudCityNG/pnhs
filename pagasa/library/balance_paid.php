      <?php	
	  				error_reporting(0);
					require "db.php";
					  	
					  $section = $_GET['no'];
					mysql_query("UPDATE appraisal_t SET a_remark='paid' WHERE a_no='$section'");
					header ("location:balance.php"); 
			
?>;