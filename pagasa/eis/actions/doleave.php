<?php

include '../../db/db.php';

if(isset($_POST['submit'])){
	//$username = $_POST['username'];
	$p_id = mysql_real_escape_string($_POST['p_id']);
		echo "$p_id";
	$query = mysql_query("SELECT * FROM eis_leave_credits_t WHERE emp_id='$p_id'") or die(mysql_error());
	while($res=mysql_fetch_assoc($query)){
	$vaca_bal =$res['vacation_bal'];
	$sick_bal =$res['sick_bal'];
	$total_bal = $res['leave_balance'];
	$date_filled = strtotime($_POST['date_filled']);
	$date_filled =date('Y-m-d',$date_filled);
	$type_of_leave = $_POST['type_of_leave'];
	$start_date = strtotime($_POST['start_date']);
	$sdate = date('Y-m-d',$start_date);
	$end_date = strtotime($_POST['end_date']);
	$edate = date('Y-m-d',$end_date);
	$duration = $_POST['duration'];
	$commutation = $_POST['commutation'];
	if($commutation == "Requested"){
		$commutation ="Requested";
	}else{
		$commutation ="Not Requested";
	}
	
	$null = "";
	
	$status = "PENDING";
	if($type_of_leave == "Vacation Leave"){// Vacation Leave
	$other_reason1 = $_POST['other_reason1'];
	$incase_v1_specify = $_POST['incase_v1_specify'];
	$vleave_reason = $_POST['vleave_reason'];
		if($vleave_reason == "To seek employment"){
			$reason ="To seek employment";
			$other_reason = $null;
		}else{
		
			$reason = "Other";
			$other_reason = $other_reason1;
		}
		$incase_v = $_POST['incase_v'];
		if($incase_v == "Within the Philippines"){
			$new_incase_v = "Within the Philippines";
			$incase_v_specify= $null;
		}else{
			$new_incase_v = "Abroad";
			$incase_v_specify = $incase_v1_specify;;
		}
		
	$q="INSERT INTO eis_leave_t(emp_id,leave_id,date_of_filling,duration,type_of_leave,
	start_of_leave,end_of_leave,reason,other_reason,leave_status,incase_of_vacation,
	incase_v_specify,incase_of_sick,incase_s1_specify,incase_s2_specify,
	commutation,as_of_date,as_of_vacation_bal,as_of_sick_bal,as_of_total_bal) 
	VALUES('$p_id',LAST_INSERT_ID(),'$date_filled','$duration','$type_of_leave',
	'$sdate','$edate','$reason','$other_reason','$status','$new_incase_v','$incase_v_specify',
	'$null','$null','$null','$commutation','$date_filled','$vaca_bal','$sick_bal','$total_bal')";
	
	mysql_query($q) or die(mysql_error());
	
	echo'<script language="javascript">
		alert(\'Leave Successfully Applied!!!\');
		window.close();		
		</script>';
	?>
	<script>
	window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload();
				}
	</script>
	<?php
	}
	else{//sick leave
	
	$sleave_reason = $_POST['sleave_reason'];
	$other_reason2 = $_POST['other_reason2'];
	$incase_s = $_POST['incase_s'];
	$incase_s1_specify = $_POST['incase_s1_specify'];
	$incase_s2_specify = $_POST['incase_s2_specify'];
		if($sleave_reason == "Maternity"){
			$reason ="Maternity";
			$other_reason = $null;
		}else{
			$reason = "Other";
			$other_reason = $other_reason2;
		}
		$incase_s = $_POST['incase_s'];
		if($incase_s == "In Hospital"){
		
			$new_incase_s = "In Hospital";
			$incase_s_specify=$incase_s1_specify;
			$q="INSERT INTO eis_leave_t(emp_id,leave_id,date_of_filling,duration,type_of_leave,start_of_leave,end_of_leave,reason,other_reason,leave_status,incase_of_vacation,incase_v_specify,incase_of_sick,incase_s1_specify,incase_s2_specify,commutation,as_of_date,as_of_vacation_bal,as_of_sick_bal,as_of_total_bal) VALUES('$p_id',LAST_INSERT_ID(),'$date_filled','$duration','$type_of_leave','$sdate','$edate','$reason','$other_reason','$status','$null','$null','$new_incase_s','$incase_s1_specify','$null','$commutation','$date_filled','$vaca_bal','$sick_bal','$total_bal') ";
			mysql_query($q) or die(mysql_error());
		}else{
			$new_incase_s = "Out Patient";
			$incase_s_specify=$incase_s2_specify;
			$q="INSERT INTO eis_leave_t(emp_id,leave_id,date_of_filling,duration,type_of_leave,start_of_leave,end_of_leave,reason,other_reason,leave_status,incase_of_vacation,incase_v_specify,incase_of_sick,incase_s1_specify,incase_s2_specify,commutation,as_of_date,as_of_vacation_bal,as_of_sick_bal,as_of_total_bal) VALUES('$p_id',LAST_INSERT_ID(),'$date_filled','$duration','$type_of_leave','$sdate','$edate','$reason','$other_reason','$status','$null','$null','$new_incase_s','$null','$incase_s2_specify','$commutation','$date_filled','$vaca_bal','$sick_bal','$total_bal') ";
			mysql_query($q) or die(mysql_error());
		}
		
	
	echo'<script language="javascript">
		alert(\'Leave Successfully Applied!!!\');
		window.close();	
		</script>';	
	?>
	<script>
	window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload();
				}
	</script>
	<?php
	}
	
	}
	
}

?>