      <?php	
	  				error_reporting(0);
					require "db.php";
					  	
					  $section = $_GET['section'];
					  $amount = $_GET['fine'];
					  $unit = $_GET['unit'];
					
					if($unit=='-unit-'){
					$unit1=0;
					}	
					else{
					$unit1=$unit;
					}
			   mysql_query("UPDATE cat_section_t SET fine_amount='$amount',unit_cost='$unit1' WHERE section_name='$section'");
  					  
						
		
					 	 header ("location:setting.php"); 
			
?>