<?php
//1				developer
//2				super_admin
//3				EIS_admin
//4				SIS_admin
//5				registration_admin
//6				scheduling_admin
//7				grading_admin
//8				library_admin
//9				supply_admin
//10			adviser
//11			club_adviser
//12			teacher
//13			registrar
//14			scheduling_officer
//15			librarian
//16			supply_officer
//17			student



function is_privileged($account_no, $privilege_id){
    $query = mysql_query("SELECT * FROM account_permission_t WHERE account_no='{$account_no}'
															   AND privilege_id='{$privilege_id}'") or die("is_privilege function error: ".mysql_error());	
			 return (mysql_num_rows($query)>0)? true:false;												   
}


function get_username(){
	
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