      <?php	 		
	  				@session_start();
					require "db.php";
					  $access_no = $_GET['access_no'];
					  $account_no = $_GET['account_no'];
					  $return_date =date('y-m-d');
					  $return_time = gmdate('H:i:s',time()+28800);
					mysql_query("UPDATE appraisal_t SET return_date='$return_date', return_time='$return_time', a_remark='N/A', notification='N/A' WHERE account_no='$account_no' and access_no='$access_no' and return_time='0'");
					mysql_query("UPDATE cat_copies_t SET status='On shelf' where access_no='$access_no'");
					echo"$access_no<br>$account_no";
					//<br>account_no=$account_no
					//<br>$amount";
					header ("location:book_return.php");
?>