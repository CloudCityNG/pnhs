<?php 
 	mysql_connect("localhost","root","") or die("mysql_error()");
	mysql_select_db("pagasa") or die("mysql_error()");
	
	$result=mysql_query("SELECT * FROM user_info");
		$row=mysql_fetch_assoc($result);
			$image=$row['image'];
			header ("Content-type: image/jpg");
			echo "$image";

	
	?>