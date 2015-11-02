<?php
session_start();
include("connect.php");

?>
<html>
<body>
    <div id="templatemo_content_wrapper">
    <span class="top"></span><span class="bottom"></span>
        <div id="templatemo_content"><!-- end of templatemo_slider -->  
       
        <?php
		$rm=$_GET['rm_id'];
		
		$books=mysql_query("SELECT DISTINCT title, subtitle, call_no, pages, volume, copyright, size, section_id, subject, edition, isbn, illustration, description, quantity, date_received, unit_price, pub_name, street, country, city, supplier_name, class,author_fname, author_mname, author_lname FROM cat_reading_material_t JOIN cat_author_t JOIN cat_books_t JOIN cat_supplies_t JOIN cat_publisher_t JOIN cat_ddc_t ON cat_ddc_t.dec_no = cat_reading_material_t.subject AND cat_reading_material_t.rm_id = cat_books_t.book_id AND cat_supplies_t.rm_id = cat_books_t.book_id AND cat_publisher_t.publisher_id = cat_reading_material_t.publisher_id WHERE book_id ='$rm'");
		$num=mysql_num_rows($books);
		for($u=0;$u<$num;$u++){
			$given=mysql_result($books, $u, "author_fname");
			$middle=mysql_result($books, $u, "author_mname");
			$sur=mysql_result($books, $u, "author_lname");
			$callno=mysql_result($books, $u, "call_no");
			$title=mysql_result($books, $u, "title");
			$subtitle=mysql_result($books, $u, "subtitle");
			$pages=mysql_result($books, $u, "pages");
			$copyright=mysql_result($books, $u, "copyright");
			$volume=mysql_result($books, $u, "volume");
			$size=mysql_result($books, $u, "size");
			$borrow_type=mysql_result($books, $u, "section_id");
			$subject=mysql_result($books, $u, "subject");
			$illustration=mysql_result($books, $u, "illustration");
			$description=mysql_result($books, $u, "description");
			$isbn=mysql_result($books, $u, "isbn");
			$edition=mysql_result($books, $u, "edition");
			$quantity=mysql_result($books, $u, "quantity");
			$datereceived=mysql_result($books, $u, "date_received");
			$unitprice=mysql_result($books, $u, "unit_price");
			$supplier=mysql_result($books, $u, "supplier_name");
			$pub=mysql_result($books, $u, "pub_name");
			$class=mysql_result($books, $u, "class");
			$city=mysql_result($books, $u, "city");
			$country=mysql_result($books, $u, "country");
			$street=mysql_result($books, $u, "street");}
				
			
		?>
        <?php
		if ($borrow_type == 1){
			$borrow_type="Periodicals";}
		else if ($borrow_type == 2){
			$borrow_type="Rare Collection";}
		else if ($borrow_type == 3){
			$borrow_type="Non Print";}
		else if ($borrow_type == 4){
			$borrow_type="Reserved Acquisition";}
		else if ($borrow_type == 5){
			$borrow_type="General Circulation";}
		else if ($borrow_type == 6){
			$borrow_type="Fiction Biographies";}
		else if ($borrow_type == 7){
			$borrow_type="Reference";}
		 ?>
        
           <center> 
		   
<table border="5px" bordercolor="#000" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFF" width="430px" height="400px" style=" font-size:18px; color:#000; font-family:'Comic 'Comic Sans MS', cursive'">	<tr>
    	<td style="border-right:none; border-bottom:none">&nbsp;&nbsp;&nbsp;</td>
    	<td style="border-right:none; border-left:none; border-bottom:none" valign="top" align="left" width="20%">
			<strong style="font-size:20px"><strong><?php echo "   ".$subject; ?></strong><br />
<?php echo $callno; ?></strong>
        </td>
        <td style="border-left:none; border-bottom:none" width="80%"><br><strong><?php echo $title; ?></strong>
          <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <font color="#000"><strong>by:</strong> </font> <?php echo $given.' '.$middle.' '.$sur; ?>
             <br><br>
             <font color="#000"><strong>Accession No:</strong> </font> 
		<?php	
		 $accdaa=mysql_query("SELECT access_no FROM cat_copies_t WHERE rm_id ='$rm'");
		$numacc=mysql_num_rows($accdaa);
		for($f=0;$f<$numacc;$f++){
			$access=mysql_result($accdaa, $f, "access_no");
			if($f==0){
				echo $access;}
			else if($f<$numacc){
				echo ', '.$access;
			 }
		}
			?>
           <?php echo '
			<br><font color="#000"><strong>Subtitle:</strong> </font>'.$subtitle; ?> <br><font color="#000">Description: </font> <?php echo $description; ?> 
            <br />
            <font color="#000"><strong>Edition:</strong> </font> <?php echo $edition; ?><br>
            <font color="#000"><strong>Classification:</strong> </font> <?php echo $class; ?>
            <br />
            <font color="#000"><strong>Section: </strong></font> <?php echo $borrow_type; ?> <br>
           <font color="#000"><strong>Publisher: </strong></font><?php echo $pub; ?>:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php  echo $street?>, <?php  echo $city; ?> &nbsp;&nbsp <?php  echo $country; ?><br />
			<font color="#000"><strong>Copyright:</strong> </font><?php echo $copyright; ?>
            <br />
			<?php if($volume!="") echo '<font color="#000"><strong>Volume:</strong> </font>'.$volume.","?> p. <?php echo $pages; ?> : <?php if($illustration!="") echo $illustration." :"; ?> <?php echo $size; ?>.
           
			<br /><font color="#000"><strong>ISBN:</strong> </font> <?php echo $isbn; ?> <br>
            <font color="#000"><strong>Supplier:</strong> </font> <?php echo $supplier; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <br>
            <font color="#000"><strong>Date received:</strong> </font><?php echo $datereceived; ?><br />
             <font color="#000"><strong>Copies: </strong></font><?php echo $quantity; ?><br />
             <font color="#000"><strong>Unit Price:</strong> </font><?php echo $unitprice; ?><br /><br /><br />
            <br />
    	</td>
	</tr>
    <tr><td style="border-top:none; border-bottom:none;" colspan="3" align="center"><strong></strong></td>
    <tr><td style="border-top:none; " colspan="3" align="center"><strong></strong></td>
    </tr>
</table>		 
		   </center>
     <?php
     echo '<h6 align="center"><a OnClick="window.print();"><img src="icons/devices/printer.png" title="PRINT" width="40" height="40"></a></h6>';
	 ?>
        </div>
        <div id="templatemo_sidebar">
          <div class="cleaner"></div>
        </div>
    
    	<div class="cleaner"></div>
    </div> <!-- end of content_wrapper -->
    
    
</body>
</html>