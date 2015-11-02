<?php
 include('../db/db.php');
if(isset($_GET['student_id'])){
	$student_id = $_GET['student_id'];
	
	
	                          
                            $Today=date("Y-m-d");
                            $new=date('l, F d, Y',strtotime($Today));
                            $new; 
	mysql_query("INSERT INTO gmc_t(student_id, release_date) VALUES ('$student_id','$Today')");
	
}
header("Location: ../sis-admin-gmc-certificate.php?student_id=$student_id");
?>