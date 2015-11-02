      <?php	
					require "db.php";
					  	
					  $access_no = $_GET['access_no'];
					  $account_no = $_GET['account_no'];
					  $return_date =date('y-m-d');
					 $return_time = gmdate('h:i:s',time()+28800);
					mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");

					mysql_query("UPDATE appraisal_t SET return_date='$return_date', return_time='$return_time', a_remark='AFFIDAVIT OF LOSS' WHERE account_no='$account_no' and access_no='$access_no' and return_time='0'");
					mysql_query("UPDATE cat_copies_t SET status='lost' where access_no='$access_no'"); 
                	mysql_query("Commit");
					echo"$access_no$account_no";
					//echo"access_no=$access_no
					//<br>account_no=$account_no
					//<br>$amount";
					header ("location:book_lost.php");
?>