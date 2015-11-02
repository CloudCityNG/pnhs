      <?php	
        error_reporting(0);
  	     require('db.php');
	
		@session_start();	
		$datereceived= date('y-m-d');
		$callno = $_GET['callno'];
		$daterecorded= $_GET['daterecorded'];
		$title=$_GET['title'];
    	$subtitle=$_GET['subtitle'];
		$pages=$_GET['pages'];
		$volume=$_GET['volume'];
		$copyright=$_GET['copyright'];
		$size=$_GET['size'];
		$unit=$_GET['unit'];
		$borrowtype=$_GET['borrowtype'];
		$ddc=$_GET['ddc'];
		$edition=$_GET['edition'];
		if($_GET['ill']){ $ill='ill.'; }else{ $ill=' '; }
		$description=$_GET['description'];
		$section=$_GET['booktype'];
		$isbn=$_GET['isbn'];
		$quantity=$_GET['quantity'];
		$lname=$_GET['lname'];
		$fname=$_GET['fname'];
		$mi=$_GET['mi'];
		$publisher=$_GET['publisher'];
		$supplier=$_GET['supplier'];
		$newsupplier=$_GET['newsupplier'];
		$supplytype=$_GET['sup'];
		$unitcost=$_GET['unitcost'];
		echo"$callno";
		echo"$lname";
		
		mysql_query("INSERT INTO `cat_reading_material_t` VALUES ('$callno','$pages','$size','$unit','$title','$subtitle','$volume','$copyright','$daterecorded','1','','1','1')");
		
		
					 
//	header ("location:book_add.php"); 
			
?>