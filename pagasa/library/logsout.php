<?php 

require "db.php";
				$account_no = $_GET['account_no'];
				$log_out_time =gmdate(" H:i:s",time()+28800);
mysql_query("start transaction");
mysql_query("Auto-Commit='off'");

				mysql_query("UPDATE library_logs SET log_out_time='$log_out_time' WHERE account_no='$account_no' and log_out_time='0'");
				header ("location: logs.php");
mysql_query("Commit");
				
				?>