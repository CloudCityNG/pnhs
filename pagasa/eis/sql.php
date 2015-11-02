<?php 

class SQL
{
	var $selectSQLtempHolder = array();
	public function connect($address,$username,$password,$database)
	{
		$sql = mysql_connect($address,$username,$password) or die("Cannot to the database");
		$db = mysql_select_db($database,$sql) or die("Data does not exist");
	}
	
	public function sqlCount($table,$statement)
	{
		$sql = mysql_query("SELECT * FROM ".$table." ".$statement) or die("Cannot count rows".mysql_error());
		$count = mysql_num_rows($sql);
		return $count;
	}
	
	public function selectSQLByOne($table,$statement,$fetchwhat)
	{
		$select = mysql_query("SELECT * FROM ".$table." ".$statement) or die("Cannot make a select query statement");	
		$fetch = mysql_fetch_array($select);
		return $fetch[$fetchwhat];
	}
	
	public function selectSQL($table,$statement)
	{
		$this->selectSQLtempHolder = mysql_query("SELECT * FROM ".$table." ".$statement) or die("Cannot make a select query statement");
	}
	
	public function insertSQL($table,$fields,$values)
	{
		mysql_query("INSERT INTO ".$table."(".$fields.") VALUES(".$values.")") or die("Error in data insertion.".mysql_error());
	}
	
	public function updateSQL($table,$statement)
	{
		mysql_query("UPDATE ".$table." ".$statement) or die(mysql_error()."Update failed.");
	}
}
?>