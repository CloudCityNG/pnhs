<?php 

	function eString($value)
	{
		return mysql_real_escape_string($value);	
	}
	function cValue($value)
	{
		if(!empty($value))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function tdTable($value)
	{
		return "<td>".$value."</td>";
	}
	
?>