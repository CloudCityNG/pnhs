<?php require_once ("file:///C|/xampp/htdocs/db/db.php"); ?>
<?php
if (isset($_GET['account_no']) && is_numeric($_GET['account_no']) && isset($_GET['account_no']))
	{
		$account_no = $_GET['account_no'];
		$result = mysql_query("DELETE FROM account_details_t WHERE account_no='$account_no'") or die(mysql_error());
		$account_no = $_GET['account_no'];
		header("Location: ../account_detail.php?account_no=$account_no");
		
	}

?>
