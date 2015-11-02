      <?php	
        error_reporting(0);
  	     require('db.php');
		
					  	
					  $book = $_GET['book'];
					  mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");

					   mysql_query("UPDATE book_limit_t SET no_books='$book'");
						mysql_query("Commit");					 
						
		
					 
		 header ("location:setting.php"); 
			
?>