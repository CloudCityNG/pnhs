	<?php
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
				if(@$_POST["ill"]){ $ill="ill."; }else{ $ill=""; }
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

if(isset($_POST['add'])){
	
	$publish=@mysql_query("SELECT * FROM `pnhs`.`cat_publisher_t` WHERE pub_name = '$publisher' AND street = '$street' AND country = '$country' AND city = '$ctv'");
	$numpublish=mysql_num_rows($publish);
	if($numpublish==0){
		@mysql_query("INSERT INTO `pnhs`.`cat_publisher_t` (`pub_name` ,`street` ,`country` ,`city`)VALUES ('$publisher', '$street', '$country' , '$ctv')");
		}
		
	$nopub=@mysql_query("SELECT * FROM `pnhs`.`cat_publisher_t` WHERE pub_name = '$publisher' AND street = '$street' AND country = '$country' AND city = '$ctv'");
	$numnopub=mysql_num_rows($nopub);
	 for($j=0;$j<$numnopub;$j++){
		$publisher_id=@mysql_result($nopub, $j, "publisher_id");
		}
		
	
	$ins=@mysql_query("SELECT * FROM `cat_author_t` WHERE author_fname = '$fname' AND author_mname = '$mi' AND author_lname = '$lname'");
	$a2=mysql_num_rows($ins);
	if($a2==0){
		@mysql_query("INSERT INTO `pnhs`.`cat_author_t` (`author_fname` ,`author_mname` ,`author_lname`)VALUES ('$fname','$mi','$lname')");}
				
	$author=@mysql_query("SELECT * FROM `cat_author_t` WHERE author_fname = '$fname' AND author_mname = '$mi' AND author_lname = '$lname'");
	$a=@mysql_num_rows($author);
	for($i=0;$i<$a;$i++){
		$au=@mysql_result($author, $i, "author_id");	
	}
	
	$read_mat=@mysql_query("SELECT * FROM `cat_reading_material_t` WHERE pages = '$pages' AND size = '$size' AND unit = '$unit' AND call_no = '$callno' AND title = '$title' AND subtitle = '$subtitle' AND volume = '$volume' AND copyright = '$copyright' AND section_id = '$borrowtype' AND publisher_id = '$publisher_id' AND subject = '$class' AND author_id = '$au'");
	$readingmaterial=mysql_num_rows($read_mat);
	
	$q=@mysql_query("SELECT max( rm_id )FROM `cat_reading_material_t`");
				while($row=mysql_fetch_array($q)){
					 	$id= $row["max( rm_id )"];
						if($id==NULL){
							$id=1;
						}else{
					 	$id= $id + 1;
						}
				}	
	if($readingmaterial==0){
		@mysql_query("INSERT INTO `pnhs`.`cat_reading_material_t` (`rm_id`, `pages` , `size` , `unit` , `call_no` , `title` ,`subtitle` ,`volume` ,`copyright` ,`section_id` ,`date_recorded` ,`publisher_id` , `subject` ,`author_id`)VALUES ('$id', '$pages', '$size', '$unit', '$callno', '$title', '$subtitle', '$volume', '$copyright', '$borrowtype', now(), '$publisher_id', '$class', '$au')");
	}	
	$books=@mysql_query("SELECT * FROM `cat_books_t` WHERE edition = '$edition' AND description = '$description' AND isbn = '$isbn' AND illustration = '$ill' AND type = '$booktype' AND book_id = '$id'");
	$numboooks=@mysql_num_rows($books);
	if($numboooks==0){
		@mysql_query("INSERT INTO `pnhs`.`cat_books_t` (`edition` ,`description` ,`isbn` ,`illustration` ,`book_id`, `type`)VALUES ('$edition','$description','$isbn','$ill','$id','$booktype')");
	}
	
	$poi=@mysql_query("SELECT max( access_no )FROM `cat_copies_t`");
				while($row=mysql_fetch_array($poi)){
					 	$poiu= $row["max( access_no )"];
						if($poiu==NULL){
							$poiu=1;
						}else{
					 	$poiu= $poiu + 1;
						}
				}		

	for($c=0;$c<$copies;$c++){
	  $cop=@mysql_query("INSERT INTO `pnhs`.`cat_copies_t` (`access_no`,`rm_id`, `status`) VALUES ('$poiu', '$id', 'On Shelf')");
	  }
	
	$suppp=@mysql_query("SELECT * FROM `pnhs`.`cat_supplies_t` WHERE  supply_type = '$supplytype' AND supplier_name = '$supplier'");
	$numsuppp=@mysql_num_rows($suppp);
	for($y=0;$y<$numsuppp;$y++){
		$supp_id=@mysql_result($suppp, $y, "supplier_id");
		}
	@mysql_query("INSERT INTO `pnhs`.`cat_supplies_t` (`supplier_id` ,`rm_id` ,`quantity` ,`unit_price` ,`date_received` ,`supplier_name` ,`supply_type`)VALUES ('$supp_id', '$id', '$copies', '$price', '$datereceived', '$supplier','$supplytype' )");


	
	
}
?>