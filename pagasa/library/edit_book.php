<!DOCTYPE html>
 <?php
 require "db.php";
 
@session_start();	
if (!isset($_SESSION['username'])) {
	header("location: ../restrict.php"); // IMPORTANT!!!!
}
include_once "../actions/user_priviledges.php";

$developer = is_privileged($_SESSION['account_no'], 1);
$super_admin = is_privileged($_SESSION['account_no'], 2);
$librarian = is_privileged($_SESSION['account_no'], 8);

?>
    

<html lang="en">
<head>
  <meta charset="utf-8" />
<title>Pagasa National Highschool:: Base Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes" />    
    
  <link rel="stylesheet" href="cs2/css/style.css" type="text/css" media="screen" />

  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
  <link href="../css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet" />
  <link href="../css/flick/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />

    
  <link href="../css/base-admin-2.css" rel="stylesheet" />
  
    
  <link href="../css/pages/dashboard.css" rel="stylesheet" />   

  


  <link href="../css/custom.css" rel="stylesheet" />

  <link>
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

  </style>
<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		</style>
        
<style>

body {
	line-height: 1;
	color: #51565b;
	background: #f1f1f1 url(img/bg/patterns/noise.png);
}

.table{
width: inherit;
	font-family: Calibri;
	font-size: 1px;
	
}

#page-title{
	overflow: hidden;
	height: 103px;
	margin-bottom: 30px;
	background: url(img/tabs-divider.png) repeat-x bottom center;
	text-shadow: 1px 1px rgba(255, 255, 255, 1);
}

#page-title .title{
	display: block;
	float: left;
	font-family: 'Ubuntu', arial, serif;
	font-size: 40px;
	line-height: 10px;
	margin-left: 30px;
}

#page-title .subtitle{
	display: block;
	float: left;
	margin-left: 30px;
	font-size: 14px;
	margin-top: 4px;
	line-height: 20px;
	color: #929191;
	font-style: italic;	
}

</style>
<link rel="stylesheet" href="cs2/css/social-icons.css" type="text/css" media="screen" />

</head>



<body>
<br><br>
<div class="main">
    <div class="container">

      <div class="row">
      	
      	<div class="span12">
      	 <div class="main">

                     
      		<div class="widget stacked" >
					
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Book Adding Form</h3>
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					<br />
			<div style="border:1px solid #000;width:888px;">

  <?php 
		error_reporting(0);
  	    include_once('db.php');
		$call_no = $_GET['call_no'];
		
		$qry1=mysql_query("SELECT * FROM cat_books_t JOIN cat_reading_material_t ON cat_books_t.book_id = cat_reading_material_t.call_no WHERE call_no='$call_no'");
		while($a=mysql_fetch_array($qry1)){
		$call_no=$a['call_no'];
		$edition=$a['edition'];
		$type=$a['type'];
		$description=$a['description'];
		$title=$a['title'];
		$subtitle=$a['subtitle'];
		$label=$a['label'];
		$isbn=$a['isbn'];
		$type=$a['type'];
		$illustration=$a['illustration'];
		$issued_within=$a['issued_within'];
		$pages=$a['pages'];
		$size=$a['size'];
		$unit=$a['unit'];
		$volume=$a['volume'];
		$copyright=$a['copyright'];
		$subject=$a['subject'];
		$section=$a['section_no'];
		$p_id=$a['publisher_id'];
		$qty=mysql_fetch_array(mysql_query("SELECT * FROM `cat_supplies_t` where call_no='$call_no'"));
		$copies=$qty['quantity'];
		$price=$qty['unit_price'];
		$unit_price=number_format($price, 2, '.', ',');
		$date_received=$qty['date_received'];
		$supplier_name=$qty['supplier_name'];
		$supplier_type=$qty['supply_type'];
		$section1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_section_t` where section_no='$section'"));
		$section_no=$section1['section_name'];
		$class1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_ddc_t` where dec_no='$subject'"));
		$class=$class1['class'];
		$p=mysql_fetch_array(mysql_query("SELECT * FROM `cat_publisher_t` where publisher_id='$p_id'"));
		$pub_name=$p['pub_name'];
		$street=$p['street'];
		$counrty=$p['counrty'];
		$city=$p['city'];
		}    
		?>

					<form method="post" action="#"  id="validation-form"  />
						<fieldset >
                         <?php 
		
@session_start();
	    error_reporting(0);
  	    include_once('db.php');
		
	    if($_POST['add']){
		$title1=$_POST['title'];
    	$subtitle1=$_POST['subtitle'];
		$pages1=$_POST['pages'];
		$volume1=$_POST['volume'];
		$copyright1=$_POST['copyright'];
		$size1=$_POST['size'];
		$unit1=$_POST['unit'];
		$edition1=$_POST['edition'];
		$label1=$_POST['label'];
		$type1=$_POST['booktype'];
		$section1=$_POST['borrowtype'];
		$class11=$_POST['ddc'];
		$label1=$_POST['label'];
		$month1=$_POST['month1'];
		$year1=$_POST['year1'];
		$isbn1=$_POST['isbn'];
		$copies1=$_POST['quantity'];
		$every1=$_POST['every1'];
		$issueunit1=$_POST['issue_unit1'];
		$id1=$_POST['author1'];
		$id2=$_POST['author2'];
		$id3=$_POST['author3'];
		$id4=$_POST['author4'];
		$id5=$_POST['author15'];
		
		$lname2=$_POST['lname2'];
		$fname2=$_POST['fname2'];
		$mname2=$_POST['mname2'];
		$xname2=$_POST['xname2'];
		
		$lname3=$_POST['lname3'];
		$fname3=$_POST['fname3'];
		$mname3=$_POST['mname3'];
		$xname3=$_POST['xname3'];
		
		$lname4=$_POST['lname4'];
		$fname4=$_POST['fname4'];
		$mname4=$_POST['mname4'];
		$xname4=$_POST['xname4'];
		
		$lname5=$_POST['lname5'];
		$fname5=$_POST['fname5'];
		$mname5=$_POST['mname5'];
		$xname5=$_POST['xname5'];
		$lname6=$_POST['lname6'];
		$fname6=$_POST['fname6'];
		$mname6=$_POST['mname6'];
		$xname6=$_POST['xname6'];
		$publisher1=$_POST['publisher'];
		$supplier1=$_POST['supplier'];
		$newsupplier1=$_POST['newsupplier'];
		$supplytype1=$_POST['sup'];
		$price1=$_POST['unitprice'];
		$account_no=$_SESSION['account_no'];
		$qry9=mysql_query("SELECT *,count(*) as count FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no WHERE call_no='$call_no'");
		while($go9=mysql_fetch_array($qry9))		
		{
		$no=$go9['count'];
		}
				$qry=mysql_query("SELECT * from cat_ddc_t where class='$class11'");
				while($go=mysql_fetch_array($qry))		
				{
				$class1=$go['dec_no'];
				}
				$qry=mysql_query("SELECT * from cat_publisher_t where pub_name='$publisher1'");
				while($a1=mysql_fetch_array($qry))		
				{
				$pu_id=$a1['publisher_id'];
				}
				$qry5=mysql_query("SELECT * from cat_section_t where section_name='$section1'");
				while($f=mysql_fetch_array($qry5))		
				{
				$section_no1=$f['section_no'];
				}
						
				if($id1 !=NULL)
				{ mysql_query("UPDATE `cat_author_t` SET author_fname='$fname2',author_mname='$mname2',author_lname='$lname2',nameextention='$xname2' WHERE author_id='$id1'");}
				if($id2 !=NULL)
				{ mysql_query("UPDATE `cat_author_t` SET author_fname='$fname3',author_mname='$mname3',author_lname='$lname3',nameextention='$xname3' WHERE author_id='$id2'");}
				if($id3 !=NULL)
				{ mysql_query("UPDATE `cat_author_t` SET author_fname='$fname4',author_mname='$mname4',author_lname='$lname4',nameextention='$xname4' WHERE author_id='$id3'");}
				if($id4 !=NULL)
				{ mysql_query("UPDATE `cat_author_t` SET author_fname='$fname5',author_mname='$mname5',author_lname='$lname5',nameextention='$xname5' WHERE author_id='$id4'");}
				if($id5 !=NULL)
				{ mysql_query("UPDATE `cat_author_t` SET author_fname='$fname6',author_mname='$mname6',author_lname='$lname6',nameextention='$xname6' WHERE author_id='$id5'");}
				
		 
	if($copies != $copies1){
	$tempquantity=mysql_query("SELECT count(call_no) as total from cat_copies_t where call_no='$call_no'");
	while($l=mysql_fetch_array($tempquantity))		
	{
	$count=$l['total'];
			if($no != 0 && $copies > $copies1)
			{echo"<p class='error-box'>WARNING!! </br> You cannot decrease number of copies because some of the $title are use in borrowing transaction.";}
			
			else if($copies < $copies1 && $no != 0)
			{
			mysql_query("UPDATE `cat_supplies_t` SET quantity='$copies1',unit_price='$price1',supplier_name='$newsupplier1',supply_type='$supplytype1' WHERE call_no='$call_no'");

			
				$loo=mysql_query("SELECT max(access_no) as max from cat_copies_t");
				while($fi=mysql_fetch_array($loo))		
				{
				$max=$fi['max'];
				}
				
				$tempcount= $copies1 -  $copies ;
				echo"<p class='success-box'>&nbsp;&nbsp;&nbsp;Here's the Id of $tempcount new Updated Book(s) ";
				for($s=0; $s<$tempcount; $s++)
				{
				$max=$max+00000001;
				echo"<br>&nbsp;&nbsp;&nbsp;$max ";
				mysql_query("INSERT INTO `cat_copies_t` VALUES ('$max','$call_no','On shelf','$account_no','$supplytype1')");
				}
			}
			else if($copies < $copies1 && $no == 0)
			{
			mysql_query("UPDATE `cat_supplies_t` SET quantity='$copies1',unit_price='$price1',supplier_name='$newsupplier1',supply_type='$supplytype1' WHERE call_no='$call_no'");

			
				$loo=mysql_query("SELECT max(access_no) as max from cat_copies_t");
				while($fi=mysql_fetch_array($loo))		
				{
				$max=$fi['max'];
				}
				
				$tempcount= $copies1 -  $copies ;
				echo"<p class='success-box'>&nbsp;&nbsp;&nbsp;<b>Sucessfully Updated!!</b><br>";
				echo"&nbsp;&nbsp;&nbsp;Here's the Id of $tempcount new Updated Book(s) ";
				for($s=0; $s<$tempcount; $s++)
				{
				$max=$max+00000001;
				echo"<br>&nbsp;&nbsp;&nbsp;$max ";
				mysql_query("INSERT INTO `cat_copies_t` VALUES ('$max','$call_no','On shelf','$account_no','$supplytype1')");
				}
			}
			else if($copies > $copies1 && $no == 0)
			{
			mysql_query("UPDATE `cat_supplies_t` SET quantity='$copies1',unit_price='$price1',supplier_name='$newsupplier1',supply_type='$supplytype1' WHERE call_no='$call_no'");
			echo"<p class='success-box'>&nbsp;&nbsp;&nbsp;<b>Sucessfully Updated!!</b><br>";
			echo"&nbsp;&nbsp;&nbsp;Since you Delete sum of the Book(s)<br>
			&nbsp;&nbsp;&nbsp;You must Update all of the ID <br>
			&nbsp;&nbsp;&nbsp;Here's the Updated Id of $copies1 Book(s) ";
				for($s=0; $s<$count; $s++)
				{mysql_query("DELETE FROM `cat_copies_t` WHERE call_no='$call_no'");}
				$qry6=mysql_query("SELECT max(access_no) as max from cat_copies_t");
				while($f=mysql_fetch_array($qry6))		
				{
				$max1=$f['max'];
				}
				for($s=0; $s<$copies1; $s++)
				{
				$max1=$max1+00000001;
				echo"<br>&nbsp;&nbsp;&nbsp;$max1 ";
				mysql_query("INSERT INTO `cat_copies_t` VALUES ('$max1','$call_no','On shelf','$account_no','$supplytype1')");
				}
	}
		}
		
		
		}
		
		
		mysql_query("UPDATE `cat_supplies_t` SET unit_price='$price1',supplier_name='$newsupplier1',supply_type='$supplytype1' WHERE call_no='$call_no'");
		mysql_query("UPDATE `cat_reading_material_t` SET pages='$pages1',size='$size1',unit='$unit1',title='$title1',subtitle='$subtitle1',volume='$volume1',copyright='$copyright1',publisher_id='$pu_id',subject='$class1',section_no='$section_no1' WHERE call_no='$call_no'");
		
		mysql_query("UPDATE `cat_books_t` SET edition='$edition1',isbn='$isbn1',type='$type1' WHERE book_id='$call_no'");
		
		if($no != 0 && $copies > $copies1){echo"<br>All are been updated except for the quantity of book";}
		else if($no != 0 && $copies < $copies1){}
		else if(($no != 0 && $copies < $copies1) || ($copies < $copies1) || $copies > $copies1 ){}else{
		echo"<p class='success-box'>";
		echo"&nbsp;&nbsp;&nbsp;<b>Sucessfully Updated!!</b><br>";
		}
			?><br><a onClick="window.close();" class="btn btn-success btn"><span class="icon i16-icon_bended-arrow-left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				<?php
	}
		?>


						 <table class="form-horizontal">
                         <tr>
                         
			<td width="40"  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><strong>BOOK INFORMATION</strong></td>
						  </tr>
                        	 
                           <tr>
                          <td>
                          <br>
                          
						    <div class="control-group ">
						      <label class="control-label" for="email">BOOK TITLE</label>
						      <div class="controls">
						        <input value='<?php echo"$title";?>' type="text" type="text"  name="title"   style="width:250px;height:20px;" />
						      </div>
						    </div> </td>
                            <td>
                            <br>
						    <div class="control-group ">
						      <label class="control-label" for="subject">SUBTITLE</label>
						      <div class="controls">
						        <input value='<?php echo"$subtitle";?>' type="text" class="input-large" name="subtitle" style="width:250px;height:20px;" />
						      </div>
						    </div></td>
                            </tr>
                           <tr><td>
                            <div class="control-group ">
						      <label class="control-label" for="subject">NUMBER OF PAGES</label>
						      <div class="controls">
						        <input type="text" value='<?php echo"$pages";?>' class="input-large" type="text"  name="pages"  style="width:250px;height:20px;"/>
						      </div>
						    </div></td>
             			<td>
						    <div class="control-group ">
						      <label class="control-label" for="email">VOLUME</label>
						      <div class="controls">
						        <input type="text" value='<?php echo"$volume";?>'  name="volume" id="fname" style="width:250px;height:20px;" />
						      </div>
						    </div> </td>
                          </tr>
                          <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="email">COPYRIGHT</label>
						      <div class="controls">
						    <select style="width:250px;font-size:12px" name="copyright"  ><option></option>
   						    <?php
    for($i=1800;$i<=date(Y);$i++)
    {
    ?>
    <option value="<?php echo $i; ?>" <?php if($copyright==$i){ ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
    <?php
      }
      ?>
</select> </div>
						    </div> </td>
                        	<td>
                            <div class="control-group ">
						      <label class="control-label" for="subject">SIZE</label>
						      <div class="controls">
						       <input  title="Enter Size" value=" <?php echo"$size"; ?>"   type="text"  name="size" id="size" style="width:160px;height:20px;"/>
                               	<select  name="unit" style="width:80px;font-size:12px">
					<option value="cm" <?php if($unit=='cm'){ ?>selected="selected"<?php } ?>>cm</option>
    <option value="inches" <?php if($unit=='inches'){ ?>selected="selected"<?php } ?>>inches</option>
    <option value="mm" <?php if($unit=='mm'){ ?>selected="selected"<?php } ?>>mm</option>
    </select>	 </div></div>
						 </td>
                          </tr>
                         
                          <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="email">SECTION</label>
						      <div class="controls"><select  name="borrowtype" style="width:250px;font-size:12px"  ><option><?php echo"$section_no";?></option>
						<?php  $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec)){
						echo "<option value='". $row['section_name'] ."'>" . $row['section_name'] ."</option>";}
						?> </select></div>
						    </div> </td>
                            <td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">CLASSIFICATION</label>
						      <div class="controls"><select  name="ddc" style="width:250px;font-size:12px"  >
       					 		<option><?php echo"$class";?></option>
		 <?php echo $ddc=mysql_query("SELECT * FROM cat_ddc_t");
			 		  while($row=mysql_fetch_array($ddc)){?>
					<option value="<?php echo $row['dec_no'];?>"><?php echo $row['dec_no']?>---<?php echo $row['class'];?></option><?php }?></select> </div>
						    </div></td>
                            </tr>
        
                    <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">BOOK TYPE</label>
						      <div class="controls ">
                              
                       <input name="booktype" type="radio"  style="width:auto" value="Non-Fiction"  <?php if($type == 'Non-Fiction'){ ?> checked="checked" <?php } ?> />
						Non-Fiction</label>
				  		<label class="radio">
						<input  type="radio" name="booktype"  value="Fiction"   <?php if($type == 'Fiction'){ ?> checked="checked" <?php } ?> />
					Fiction</label> </td>
        			 </div>
						    </div></td>
                            
                            <td>
		<div class="control-group ">
					<label class="control-label" for="email">EDITION</label>
					<div class="controls">
                    
					<select name="edition" style="width:110px;font-size:12px">
   <option value="Revised" <?php if($edition=='Revised'){ ?>selected="selected"<?php } ?>>Revised</option>
    <option value="1st" <?php if($edition=='1st'){ ?>selected="selected"<?php } ?>>1st</option>
    <option value="2nd" <?php if($edition=='2nd'){ ?>selected="selected"<?php } ?>>2nd</option>
    <option value="3rd" <?php if($edition=='3rd'){ ?>selected="selected"<?php } ?>>3rd</option>
    <?php
       for($i=4;$i<11;$i++)
       { ?>
    <option value="<?php echo $i; ?>th" <?php $ith=$i.'th'; if($edition==$ith){ ?>selected="selected"<?php } ?>><?php echo $i; ?>th</option>
    <?php }
       ?>
			  	</select>
        	  			</div></div>
								</td></tr>
                                       <tr></tr>
                    
                    <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">PUBLISHER</label>
						      <div class="controls">
                       <select name="publisher"  style="width:250px;font-size:12px">
          			<option><?php echo"$pub_name"?></option>
						<?php echo $ga=mysql_query("SELECT * FROM cat_publisher_t");
			   			while($numrow=mysql_fetch_array($ga)){?>
						<option value="<?php echo $numrow['pub_name'];?>"><?php echo $numrow['pub_name']?></option><?php
			  			 }?></select>
       	 </div></div>
                         </td>
                
                    <td>
                    
						    <div class="control-group ">
						      <label class="control-label" for="subject">COPIES</label>
						      <div class="controls">
                              
				  <input  type="text"  name="quantity" id="fname"  value="<?php echo $copies;?>" style="width:250px;height:20px;" />
        			 </div>
						    </div></td></tr>
                        <tr><td></td>    
                    <td>
					<div class="control-group ">
					<label class="control-label" for="email">ISBN</label>
					<div class="controls">
                    <input    type="text" value="<?php echo $isbn ?>" name="isbn"  id="fname"  style="width:250px;height:20px;" /></div>
					</div></td>   
                            
                          <tr>
<td width="40"  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><B>SUPPLIER INFORMATION</B></strong></td> </tr>
						<tr><td><BR>
						<div class="control-group ">
						      <label class="control-label" for="subject">TYPE</label>
						      <div class="controls"><select name="sup"  style="width:250px;font-size:12px">
          				<option value="Donated" <?php if($supplier_type=='Donated'){ ?>selected="selected"<?php } ?>>Donated</option>
    					<option value="Borrowed" <?php if($supplier_type=='Borrowed'){ ?>selected="selected"<?php } ?>>Borrowed</option>
  						  <option value="Purchased" <?php if($supplier_type=='Purchased'){ ?>selected="selected"<?php } ?>>Purchased</option>
    </select>
	   					 </div></div>
                         </td><td><BR>
						<div class="control-group ">
 						<label class="control-label" for="validateSelect">NAME</label>
				            <div class="controls">
				          <input  name="newsupplier" value="<?php echo $supplier_name?>" style="width:250px;height:20px;" type="text"/> </div>
						    </div></td>
                            </tr>
                            <tr><td>
                           	<div class="control-group ">
						      <label class="control-label" for="subject">PRICE</label>
						      <div class="controls"><input name="unitprice" value="<?php echo "$unit_price"; ?>" style="width:250px;height:20px;" type="text" />
                              </div>
						    </div></td>
                            </tr>
                          <tr>
<td  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><B>AUTHOR INFORMATION</B></strong></td> </tr>
						</tr>
                     <tr>
                        <td  colspan="2" style="background-color:#EAEAEA;font-size:19px;" >
                        <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Middle Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name Extension
                         </tr>
                    	 </td> 
                         </table>
                         
<table>      <?php 
	   
		error_reporting(0);
  	  include_once('db.php');
	$iren=mysql_query("SELECT count(*) as count FROM cat_author_t WHERE call_no='$call_no'");
	while($lotino=mysql_fetch_array($iren))
	{
	$llona=$lotino['count'];
	} 
	
	$ppp=mysql_query("SELECT author_fname,author_mname,author_lname,nameextention FROM cat_author_t WHERE call_no='$call_no'");
	$num=0;
	 while($author7=mysql_fetch_array($ppp))
	{
	
	$fname= $author7['author_fname'];
	$mname=$author7['author_mname'];
	$lname=$author7['author_lname'];
	$xname=$author7['nameextention'];
	} 
	if($llona >=1){
	?>	
    <tr><td class="control-group controls">
 <select style="width:250px;font-size:12px" name="author1"><option></option>
 <?php echo $try=mysql_query("SELECT * FROM cat_author_t WHERE call_no ='$call_no'");
while($ro=mysql_fetch_array($try)){
$aid=$ro['author_id'];
$afname=$ro['author_fname'];
$amname=$ro['author_mname'];
$alname=$ro['author_lname'];
$extention=$ro['nameextention'];
?>
<option value='<?php echo"$aid"; ?>'> <?php echo"$afname $amname $alname $extention "; ?></option> <?php }?>
</select> 
</td><td class="control-group controls">
<input name="fname2" style="width:142px;height:20px;" type="text" value='<?php echo"$fname0";?>'/>
</td><td class="control-group controls">
<input name="mname2" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="lname2" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="xname2" style="width:142px;height:20px;" type="text" />
</td></tr>
<?php }if($llona >=2){?>
<tr><td class="control-group controls">
<select style="width:250px;font-size:12px" name="author2"><option></option>
<?php echo $try=mysql_query("SELECT * FROM cat_author_t WHERE call_no ='$call_no'");
while($ro=mysql_fetch_array($try)){
$aid=$ro['author_id'];
$afname=$ro['author_fname'];
$amname=$ro['author_mname'];
$alname=$ro['author_lname'];
$extention=$ro['nameextention'];
?>
<option value='<?php echo"$aid"; ?>'> <?php echo"$afname $amname $alname $extention "; ?></option> <?php }?>
</select> 
</td><td class="control-group controls">
<input name="fname3" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname3" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="lname3" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="xname3" style="width:142px;height:20px;" type="text" />
</td></tr>
<?php }if($llona >=3){?>

<tr><td class="control-group controls">
<select style="width:250px;font-size:12px" name="author3"  ><option></option>
<?php echo $try=mysql_query("SELECT * FROM cat_author_t WHERE call_no ='$call_no'");
while($ro=mysql_fetch_array($try)){
$aid=$ro['author_id'];
$afname=$ro['author_fname'];
$amname=$ro['author_mname'];
$alname=$ro['author_lname'];
$extention=$ro['nameextention'];
?>
<option value='<?php echo"$aid"; ?>'> <?php echo"$afname $amname $alname $extention "; ?></option> <?php }?>
</select> 
</td><td class="control-group controls">
<input name="fname4" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname4" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="lname4" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="xname4" style="width:142px;height:20px;" type="text" />
</td></tr>
<?php }if($llona >=4){?>
<tr><td class="control-group controls">
<select style="width:250px;font-size:12px" name="author4"  ><option></option>
<?php echo $try=mysql_query("SELECT * FROM cat_author_t WHERE call_no ='$call_no'");
while($ro=mysql_fetch_array($try)){
$aid=$ro['author_id'];
$afname=$ro['author_fname'];
$amname=$ro['author_mname'];
$alname=$ro['author_lname'];
$extention=$ro['nameextention'];
?>
<option value='<?php echo"$aid"; ?>'> <?php echo"$afname $amname $alname $extention "; ?></option> <?php }?>
</select> 
</td><td class="control-group controls">
<input name="fname5" style="width:150px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname5" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="lname5" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="xname5" style="width:142px;height:20px;" type="text" />
</td></tr>
<?php }if($llona >=5){?>
<tr><td class="control-group controls">
<select style="width:250px;font-size:12px" name="author5"  ><option></option>
<?php echo $try=mysql_query("SELECT * FROM cat_author_t WHERE call_no ='$call_no'");
while($ro=mysql_fetch_array($try)){
$aid=$ro['author_id'];
$afname=$ro['author_fname'];
$amname=$ro['author_mname'];
$alname=$ro['author_lname'];
$extention=$ro['nameextention'];
?>
<option value='<?php echo"$aid"; ?>'> <?php echo"$afname $amname $alname $extention "; ?></option> <?php }?>
</select> 
</td><td class="control-group controls">
<input name="fname6" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname6" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="lname6" style="width:142px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="xname6" style="width:142px;height:20px;" type="text" />
</td></tr>
<?php } ?>
        			   </table>                 
    					  <div class="form-actions" align="center">
						     <input class="btn btn-success btn" type="submit" value="UPDATE" name="add" id="submit"  />
	
                             <a onClick="window.close()"><button type="reset" class="btn">Cancel</button></a>
						    </div>
                          
                           
						  </fieldset>
						</form>
					
                    
                    </div>
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->					
			
	    </div> <!-- /span12 -->     	
      	
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
</div>
<!-- /main --><!-- /extra -->
    
    
				<div class='modal fade hide' id='confirmation'>
 				  <div class='modal-header'>
       			 <button type='button' class='close' data-dismiss='modal'>&times;</button>
   				<h3></h3>
                          
   </div>
 	<div class='modal-body'>
 				<p style='font-size:18px'>Successfully Added!<br></p>               
  	</div>
  	<div class='modal-footer'>
    <a href='javascript:;' class='btn' data-dismiss='modal'>Close</a>
                                <a onClick='window.close();'><input class='btn btn-success' type='submit' name='OK' value='OK' ></a>

                 
  </div>
 </div>
    
    
<div class="footer">
		
	<div class="container">
		
	  <div class="row">
			
		<div id="footer-copyright" class="span6">
				&copy; 2012-13 BSIT-3C.
		</div> <!-- /span6 --><!-- /.span6 -->
			
	  </div> 
		<!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
$(window).scroll(function() {

    //After scrolling 100px from the top...
    if ( $(window).scrollTop() >= 100 && false ) {
        //$('#head').css('display', 'none');
		//$('#small-head').css('position','fixed');

        //$('#menuheader').css('margin', '65px auto 0');

    //Otherwise remove inline styles and thereby revert to original stying
    } else {
        $('#head').attr('style', '');
		$('#small-head').attr('style', '');

    }
});
$(window).load(function(){
   
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   
   $('#overlay').fadeOut();

});
</script>

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
			
		
	} );
</script>

<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>


<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="validation.js"></script>
<script src="../js/plugins/msgGrowl/js/msgGrowl.js"></script>
<script src="../js/plugins/lightbox/jquery.lightbox.min.js"></script>
<script src="../js/plugins/msgbox/jquery.msgbox.min.js"></script>

<script src="../js/demo/notifications.js"></script></body>
</html>
