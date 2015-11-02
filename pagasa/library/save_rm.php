      <?php	
				require "db.php";
				@session_start();
				$callno=addslashes(@$_POST["callno"]);
				$daterecorded= date("Y-m-d");
				$title=addslashes(ucfirst(@$_POST["title"]));
				$subtitle=addslashes(ucfirst(@$_POST["subtitle"]));
				$pages=@$_POST["pages"];
				$volume=@$_POST["volume"];
				$copyright=@$_POST["copyright"];
				$size=@$_POST["size"];
				$unit=@$_POST["unit"];
				$borrowtype=@$_POST["borrowtype"];
				$class=@$_POST["ddc"];
				$edition=@$_POST["edition"];
				$description=addslashes(@$_POST["description"]);
				$booktype=@$_POST["booktype"];
				$isbn=@$_POST["isbn"];
				$copies=@$_POST["quantity"];
				$lname=@$_POST["lname"];
				$fname=@$_POST["fname"];
				$mi=@$_POST["mi"];
				$publisher=@$_POST["publisher"];
				$street=@$_POST["street"];
				$ctv=@$_POST["ctv"];
				$country=@$_POST["country"];
				$supplier=@$_POST["supplier"];
				$supplytype=@$_POST["sup"];
				$datereceived=@$_POST["date_received"];
				$price=@$_POST["price"];
				$userid=@$_SESSION['u'];
	$ins=@mysql_query("SELECT * FROM `cat_author_t` WHERE author_fname = '$fname' AND author_mname = '$mi' AND author_lname = '$lname'");
	$a2=mysql_num_rows($ins);
	if($a2==0){
		@mysql_query("INSERT INTO `cat_author_t` (`author_fname` ,`author_mname` ,`author_lname`)VALUES ('$fname','$mi','$lname')");}
				
	$author=@mysql_query("SELECT * FROM `cat_author_t` WHERE author_fname = '$fname' AND author_mname = '$mi' AND author_lname = '$lname'");
	$a=@mysql_num_rows($author);
	for($i=0;$i<$a;$i++){
		$au=@mysql_result($author, $i, "author_id");	
	echo"au= $au";
	
	}
			@mysql_query("INSERT INTO `cat_reading_material_t` (`call_no` `pages` , `size` , `unit` , `title` ,`subtitle` ,`volume` ,`copyright` ,`section_no` ,`date_recorded` ,`publisher_id` , `subject` ,`author_id`)VALUES ( '$callno', '$pages', '$size', '$unit', '$title', '$subtitle', '$volume', '$copyright', '$borrowtype','$daterecorded', '$publisher_id', '$class', '$au')");

?>