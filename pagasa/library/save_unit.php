      <?php	
	  				error_reporting(0);
					require "db.php";
					  	
					  $section = $_GET['section'];
					  $number = $_GET['number'];
					  $unit = $_GET['unit'];
					  echo"$section=$unit=$number";
					  if($unit == 'day'){ 
					  		$time1=((($number*24)*60)*60);
					  }
					  else if($unit == 'hour'){
					  		$time1=(($number*60)*60);
										echo"<br>$time1";
					  }
					  else if($unit == 'minute'){
					  		$time1=($number*60);
					  }
					  else{
					  $time1=0;
					  }
					 $sec=mysql_query("SELECT section_no FROM cat_section_t WHERE section_name='$section'");
			   			while($row=mysql_fetch_array($sec))
					   {
					   $sec1=$row['section_no'];
					   }
  					mysql_query("UPDATE cat_section_t SET section_unit='$unit', time='$time1' WHERE section_no='$sec1'");
  		//echo"$time1==$sec1==$unit";
		
		header ("location:setting.php"); 
			
?>