<?php
//1 Registration
//2 Grading
//3 Scheduling
//4 SIS
//5 EIS
//6 Library
//7 Inventory

//session_start();

function is_priveleged($account_no, $privilege_id){
	$query = mysql_query("SELECT * FROM permision_t WHERE privilege_id={'$privilege_id'}") or die(mysql_error());
	return (mysql_num_rows($query)>0)? true:false;
	
}


function grant_access($mod_no, $user_type, $teaching=NULL){
	if($mod_no==1){ //REGISTRATION
	    switch($user_type){
		    case "registration officer":
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
	if($mod_no==2){ //GRADING
	    if($teaching=="teacher")
		   return true;
	    switch($user_type){
		    case "teacher":
			case "admin":
			        return true;
			default :
					return false;	
		}
		
	}
	if($mod_no==3){ //SCHEDULING
	    switch($user_type){
		    case "scheduling officer":
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
	if($mod_no==4){ //SIS
	    
		$type = $_SESSION['user_type'];
	    if("student"==$type)
		    return true;
	    switch($user_type){
		    case "sis admin":
			case "student":
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
	if($mod_no==5){ //EIS
	    switch($user_type){
		    case "eis admin":
			case "employee";
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
	if($mod_no==6){ //LIBRARY
	    switch($user_type){
		    case "librarian":
			case "student":
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
	if($mod_no==7){ //INVENTORY
	    switch($user_type){
		    case "supply officer":
			case "admin":
			        return true;
			default :
					return false;	
		}
	}
}



?>