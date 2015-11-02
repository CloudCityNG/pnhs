      <?php	
					require "db.php";
					  @session_start();
						$publisher=@$_POST["publisher"];
				$street=@$_POST["street"];
				$ctv=@$_POST["ctv"];
				$country=@$_POST["country"];
				
				mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
				
					@mysql_query("INSERT INTO `cat_publisher_t` (`pub_name` ,`street` ,`country` ,`city`)VALUES ('$publisher', '$street', '$country' , '$ctv')");
					mysql_query("Commit");

?>