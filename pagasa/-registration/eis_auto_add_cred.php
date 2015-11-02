<?php 
include("../db.db.php");

if(isset($_POST['Open'])){

	$find_l_emp=mysql_query("SELECT * FROM eis_leave_credits_t");
	while($found_l_emp=mysql_fetch_assoc($find_l_emp)){
		$emp_id=$found_l_emp['emp_id'];
		$vac_bal=$found_l_emp['vacation_bal'];
		$sick_bal=$found_l_emp['sick_bal'];
	
		$find_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$emp_id'");
		$found_role=mysql_fetch_assoc($find_role);
			$role_id=$found_role['role_id'];
			
			$find_pos=mysql_query("SELECT * FROM employee_position_t WHERE position_id='$role_id'");
			$found_pos=mysql_fetch_assoc($find_pos);
			$pos_type=$found_pos['position_type'];
			
				$find_cat_t=mysql_query("SELECT * FROM eis_leave_add_cat WHERE position_type='teaching'");
				$found_cat_t=mysql_fetch_assoc($find_cat_t);
				$sick_t=$found_cat_t['sick_credits'];
				$vac_t=$found_cat_t['vac_credits'];
				
				$find_cat_n=mysql_query("SELECT * FROM eis_leave_add_cat WHERE position_type='non-teaching'");
				$found_cat_n=mysql_fetch_assoc($find_cat_n);
				$sick_n=$found_cat_t['sick_credits'];
				$vac_n=$found_cat_t['vac_credits'];
			
			if($pos_type=="non_teaching"){
			$new_vac=$vac_bal+$$vac_n;
			$new_sick=$sick_bal+$sick_n;
			$new_bal=$new_vac+$new_sick;
			mysql_query("UPDATE `eis_leave_credits_t` SET `vacation_bal`='$new_vac',`sick_bal`='$new_sick',`leave_balance`='$new_bal' WHERE `emp_id`='$emp_id'") or die(mysql_error());
			}
			else if($pos_type=="teaching"){
			$new_vac2=$vac_bal+$vac_t;
			$new_sick2=$sick_bal+$sick_t;
			$new_bal2=$new_vac2+$new_sick2;
			mysql_query("UPDATE `eis_leave_credits_t` SET `vacation_bal`='$new_vac2',`sick_bal`='$new_sick2',`leave_balance`='$new_bal2' WHERE `emp_id`='$emp_id'") or die(mysql_error());
			}
			
	
	}




}


?>