<?php
mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("pagasa") or die(mysql_error());
/* RECEIVE VALUE */
$validateValue=$_REQUEST['fieldValue'];
$validateId=$_REQUEST['fieldId'];


$validateError= "This Employee ID is already taken";
$validateSuccess= "This Employee ID is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	
$query = mysql_query("SELECT * FROM employee_t WHERE emp_id='$validateValue'");	
$num = mysql_num_rows($query);
if($num == 0){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}

?>