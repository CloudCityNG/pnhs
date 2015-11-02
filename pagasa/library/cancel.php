<?php
				require "db.php";
					
					$access_no = $_GET['access_no'];
					 $account_no = $_GET['account_no'];
					 $amount = $_GET['amount'];
					  $return_date =date('y-m-d');
					  $return_time = gmdate('H:i:s',time()+28800);
				echo"$amount";
					mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");

					mysql_query("UPDATE appraisal_t SET return_date='$return_date', return_time='$return_time', penalties ='$amount', a_remark='credit'WHERE account_no='$account_no' and access_no='$access_no' and return_time='0'");
					mysql_query("UPDATE cat_copies_t SET status='On shelf' where access_no='$access_no'"); 
					echo"done=$account_no<br>$access_no";
					mysql_query("Commit");
					
					header ("location: book_return.php");		
					
                    ?>