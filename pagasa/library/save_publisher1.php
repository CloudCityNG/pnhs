      <?php	
        error_reporting(0);
  	     require('db.php');
		
					  	
					  $id = $_GET['id'];
					  $name = $_GET['name'];
					  $street = $_GET['street'];
					  $city = $_GET['city'];
					  $country = $_GET['country'];
					  mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
	
			mysql_query("UPDATE cat_publisher_t SET pub_name='$name', street='$street', city='$city', country='$country' WHERE publisher_id='$id'");
  											
						mysql_query("Commit");					 
						
		
					 
	header ("location:setting.php"); 
			
?>