      <?php	
        error_reporting(0);
  	     include_once('db.php');
		
					  	
					  $section = $_GET['section'];
					  mysql_query("start transaction");
					mysql_query("Auto-Commit='off'");
			mysql_query("INSERT 'cat_supplies_t' values('','$callno','$copies','$price','$datereceived','$supplier','$supplytype') ");		
								
						mysql_query("Commit");					 
						
		
					 
		 header ("location:setting.php"); 
			
?>