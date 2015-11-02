      <?php	
        error_reporting(0);
  	     require('db.php');
		
					  	
					  $name = $_GET['name'];
					  $street = $_GET['street'];
					  $city = $_GET['city'];
					  $country = $_GET['country'];
					  mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
	
			mysql_query("INSERT INTO cat_publisher_t values('','$name','$street','$city','$country')");
									
						mysql_query("Commit");					 
						
		
					 
		 header ("location:setting.php"); 
			
?>