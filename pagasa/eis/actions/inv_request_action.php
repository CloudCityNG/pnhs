<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
}
else {
	header("location: restrict.php"); // IMPORTANT!!!!
}
?>

<?php	
error_reporting(0);
include('../../db/db.php');
if(isset($_POST['submit'])) {

	$stock_no = mysql_real_escape_string($_POST['stock_no']);
	$quantity = mysql_real_escape_string($_POST['quantity']);
	$emp_id = mysql_real_escape_string($_POST['emp_id']);
	date_default_timezone_set("Asia/Manila");
	$date = date( 'Y-m-d' );

	if($quantity) { 		
	$emp = mysql_query("SELECT * FROM account_t, employee_t, department_t, employee_account_t
		  				WHERE account_t.username = '$username'
						AND employee_t.emp_id = employee_account_t.emp_id
						AND account_t.account_no  = employee_account_t.account_no
						AND employee_t.dept_id = department_t.dept_id");
		$row1 = mysql_fetch_assoc($emp);
		$emp_id = $row1['emp_id'];
		$dept_id = $row1['dept_id'];
		
		echo $stock_no." ".$quantity." ".$emp_id." ".$dept_id." ".$date;
		echo $row['f_name']." ".$row['m_name']." ".$row['l_name']; 

	$sql = mysql_query("SELECT qoh FROM inventory_stock_t WHERE stock_no = '$stock_no'");
	$row2 = mysql_fetch_array($sql);
	$q = $row2['qoh'];
	$quant = $q - $quantity;
	if ($quant >= 0) {
		$record = mysql_query("SELECT * FROM supply_record_t 
						WHERE stock_no = '$stock_no'");
		$row = mysql_fetch_assoc($record);
		$record_id = $row['record_id'];
			mysql_query("INSERT INTO supply_distribution_t VALUES('','$record_id','$dept_id','$emp_id','$quantity','$date','requested')");
			echo "<script>window.close(); </script>";
	}
	
	else {
		echo "<script>window.close(); </script>";
	}
	}
	else {
		echo "<script>window.close(); </script>";
	}
}
?>