      <?php	
        error_reporting(0);
  	     require('db.php');
		
					  	
					  $section = $_GET['section'];
					  mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
	
			mysql_query("INSERT INTO cat_section_t values('','$section','','','','')");
									
						mysql_query("Commit");					 
						
		
					 
		 header ("location:setting.php"); 
			
?>