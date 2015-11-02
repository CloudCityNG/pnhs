<?php require_once ("../../db/db.php"); ?>
<?php
if (isset($_GET['account_no']) && is_numeric($_GET['account_no']) && isset($_GET['account_no']))
	{
	
		$priv_name = $_GET['privilege'];
		$account_no = $_GET['account_no'];
		
		$sql = mysql_query("SELECT * FROM account_privilege_t WHERE privilege_name = '$priv_name' ");
		$row = mysql_fetch_assoc($sql);
		$priv = $row['privilege_id'];
		
		$result = mysql_query("DELETE FROM account_permission_t WHERE account_no='$account_no' AND privilege_id ='$priv' ") or die(mysql_error());
		header("Location: ../ams_edit_accountemp.php?account_no=$account_no");
		
	}
?>