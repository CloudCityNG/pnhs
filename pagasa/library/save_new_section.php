      <?php	
        error_reporting(0);
  	    require('db.php');
		
			        	
					  $section = $_GET['section'];
					  $newsection = $_GET['newsection'];
					  
					  $sec=mysql_query("SELECT section_no FROM cat_section_t WHERE section_name='$section'");
			   			while($row=mysql_fetch_array($sec))
					   {
					   $sec1=$row['section_no'];
					   }
  					mysql_query("UPDATE cat_section_t SET section_name='$newsection' WHERE section_no='$sec1'");
  						
		echo"$newsection=$section==$sec1";
					 
	header ("location:setting.php"); 
			
?>