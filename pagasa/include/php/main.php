<?php
class Main{
	public function __construct(){
		mysql_connect("localhost","root","laqcp6q9kpyl") or die(mysql_error());
		mysql_select_db("final") or die(mysql_error());
		session_start();
	}
	public function doLogin($user,$pass){
		$query = mysql_query("SELECT * FROM pis_login_account WHERE p_username='$user' AND p_password='$pass'") or die(mysql_error());
		$result = mysql_fetch_array($query);
		
		if(!empty($result)){
		
		$p_id = $result['p_id'];
		$query = mysql_query("SELECT * FROM pis_position WHERE p_id ='$p_id'")or die(mysql_error());
		$found = mysql_fetch_array($query);
			if(!empty($found)){
			$_SESSION['user_id'] = $result['p_username'];
			$_SESSION['user_type'] = $found['type'];
			
			echo $found['type'];
			//echo "var user =".$result['p_username'].";";
			//echo $result['p_password'];
			//echo "var type =".$found['type'].";";
			}
		}
	}
			
		
	}



$do = new Main();

if(isset($_GET['doLogin'])){
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$do->doLogin($user,$pass);
}
?>