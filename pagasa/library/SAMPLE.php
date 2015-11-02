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
include("quantity.php");
?>
  <?php 
		
@session_start();
	    error_reporting(0);
  	    include_once('db.php');
		$datereceived= date('y-m-d');
		if($_POST['add']){
		$callno = $_POST['call_no'];
		$daterecorded= date('Y-m-d');
		$title=$_POST['title'];
    	$subtitle=$_POST['subtitle'];
		$pages=$_POST['pages'];
		$volume=$_POST['volume'];
		$copyright=$_POST['copyright'];
		$size=$_POST['size'];
		$unit=$_POST['unit'];
		$borrowtype=$_POST['borrowtype'];
		$class=$_POST['ddc'];
		$edition=$_POST['edition'];
		if($_POST['ill']){ $ill='ill.'; }else{ $ill=' '; }
		$description=$_POST['description'];
		$booktype=$_POST['booktype'];
		$isbn=$_POST['isbn'];
		$copies=$_POST['quantity'];
		$lname1=$_POST['lname1'];
		$fname1=$_POST['fname1'];
		$mname1=$_POST['mname1'];
		$xname1=$_POST['xname1'];
		
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
		
		$publisher=$_POST['publisher'];
		$supplier=$_POST['supplier'];
		$newsupplier=$_POST['newsupplier'];
		$supplytype=$_POST['sup'];
		$price=$_POST['unitprice'];
		
		$qry=mysql_query("SELECT * from cat_ddc_t where class='$class'");
		while($go=mysql_fetch_array($qry))		
		{
		$class1=$go['dec_no'];
		}
		$qry=mysql_query("SELECT * from cat_publisher_t where pub_name='$publisher'");
		while($a=mysql_fetch_array($qry))		
		{
		$pu_id=$a['publisher_id'];
		}
		$qry3=mysql_query("SELECT count(*) as count FROM `cat_books_t` WHERE edition = '$edition' AND description = '$description' AND isbn = '$isbn' AND illustration = '$ill' AND type = '$booktype'");  
		while($d=mysql_fetch_array($qry3)){
		$countbook=$d['count'];
		}
		$qry4=mysql_query("SELECT count(*) as count FROM`cat_supplies_t` WHERE call_no ='$callno'");
		while($e=mysql_fetch_array($qry4)){
		$count_s=$e['count'];
		}
		$qry5=mysql_query("SELECT * from cat_section_t where section_name='$borrowtype'");
		while($f=mysql_fetch_array($qry5))		
		{
		$section_no=$f['section_no'];
		}
		$qry6=mysql_query("SELECT max(access_no) as max from cat_copies_t");
		while($f=mysql_fetch_array($qry6))		
		{
		$max=$f['max'];
		$max1=$max+$copies;
		}
		$qry2=mysql_query("SELECT count(*) as count FROM `cat_reading_material_t` WHERE call_no = '$callno'");
		while($c=mysql_fetch_array($qry2)){
		$countrm = $c['count'];
		}
		
		
		if($countrm=='0')
		{
			require('db.php');
			mysql_query("INSERT INTO `cat_reading_material_t` 		VALUES('$callno','$pages','$size','$unit','$title','$subtitle','$volume','$copyright','$daterecorded','$pu_id','$class','$section_no')");
			if($countbook=='0')
			{
				mysql_query("INSERT INTO `cat_books_t`VALUES ('$callno','$edition','$description','$isbn','$ill','$booktype')");
				for($s=0; $s<$copies; $s++){
				$max1=$max1+000001;
				mysql_query("INSERT INTO `cat_copies_t`VALUES ('$max1','$callno','On shelf','','$supplytype')");}
			}
	
				if($fname1 != NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname1','$mname1','$lname1','$xname1')");
				}
				if($fname2 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname2','$mname2','$lname2','$xname2')");}
				if($fname3 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname3','$mname3','$lname3','$xname3')");}
				if($fname4 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname4','$mname4','$lname4','$xname4')");}
				if($fname5 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname5','$mname5','$lname5','$xname5')");}
				if($fname6 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname6','$mname6','$lname6','$xname6')");}
		
				if($count_s=='0'){
				mysql_query("INSERT INTO `cat_supplies_t`VALUES ('','$callno','$copies','$price','$datereceived','$newsupplier','$supplytype')");}
		
		echo"<p class='success-box'>&nbsp;&nbsp;&nbsp;<b>Sucessfully Added!!</b><br>";
		echo"&nbsp;&nbsp;&nbsp;Here's the Id of $copies Book(s) ";
		for($s=0; $s<$copies; $s++){
			$max1=$max1+000001;
		echo"<br>&nbsp;&nbsp;&nbsp;$max1";	
		}
		?>
		
		<br><a onClick="window.close();" class="btn btn-success btn"><span class="icon i16-icon_bended-arrow-left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			<a href="bago.php" class="btn"><span class="icon i16-icon_bended-arrow-right"></span>ADD MORE BOOKS</a>
					
</p>
	<?php }
		else{
			if($countrm != '0'){
				for($s=0; $s<$copies; $s++){
			$max1=$max1+000001;
		mysql_query("INSERT INTO `cat_copies_t`VALUES ('$max1','$callno','On shelf','','$supplytype')");}
		$query=mysql_query("SELECT * from cat_supplies_t where call_no='$callno'");
		while($fee=mysql_fetch_array($query))		
		{
		$quan=$fee['quantity'];
		}
		$quan2=$copies+$quan;
		mysql_query("UPDATE cat_supplies_t SET quantity='$quan2' WHERE call_no='$callno'");
			
				echo"<p class='success-box'>&nbsp;&nbsp;&nbsp;<b>Sucessfully Added!!</b><br>";
				echo"&nbsp;&nbsp;&nbsp;Here's the Id of $copies Book(s) ";
			for($s=0; $s<$copies; $s++){
			$max1=$max1+000001;
			echo"<br>&nbsp;&nbsp;&nbsp;$max1";	
				}
			}?>
		
		<br><a onClick="window.close();" class="btn btn-success btn"><span class="icon i16-icon_bended-arrow-left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			<a href="bago.php" class="btn"><span class="icon i16-icon_bended-arrow-right"></span>ADD MORE BOOKS</a>

	<?php	}
		}
		
		?>
     
					<form method="post" action="#"  id="validation-form"  />
						<fieldset >
						 <table class="form-horizontal">
                         <tr>
                         
			<td width="40"  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><strong>BOOK INFORMATION</strong></td>
						  </tr>
                        	<tr><td>
						    <div class="  control-group">
						   <br>
                              <label class="control-label" for="name">CALL NUMBER</label>
						      <div class="controls">
						       <input type="text" class="input-large" name="call_no"  style="width:250px;height:20px;" />
						      </div>
						    </div></td>
                            </tr>
                            
                           <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="email">BOOK TITLE</label>
						      <div class="controls">
						        <input type="text" type="text"  name="title"   style="width:250px;height:20px;" />
						      </div>
						    </div> </td>
                            <td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">SUBTITLE</label>
						      <div class="controls">
						        <input type="text" class="input-large" name="subtitle" style="width:250px;height:20px;" />
						      </div>
						    </div></td>
                            </tr>
                           <tr><td>
                            <div class="control-group ">
						      <label class="control-label" for="subject">NUMBER OF PAGES</label>
						      <div class="controls">
						        <input type="text" class="input-large" type="text"  name="pages"  style="width:250px;height:20px;"/>
						      </div>
						    </div></td>
             			<td>
						    <div class="control-group ">
						      <label class="control-label" for="email">VOLUME</label>
						      <div class="controls">
						        <input type="text" type="text"  name="volume" id="fname" style="width:250px;height:20px;" />
						      </div>
						    </div> </td>
                          </tr>
                          <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="email">COPYRIGHT</label>
						      <div class="controls">
						    <select style="width:250px;font-size:12px" name="copyright"  ><option></option>
   						     <?php for($i=1800;$i<=date(Y);$i++){?>
							<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option><?php }?></select> </div>
						    </div> </td>
                        	<td>
                            <div class="control-group ">
						      <label class="control-label" for="subject">SIZE</label>
						      <div class="controls">
						       <input  title="Enter Size"  type="text"  name="size" id="size" style="width:150px;height:20px;"/>
                               	<select  name="unit" style="width:80px;font-size:12px">
						<option value="cm" selected="selected">cm</option>
						<option value="inches">inches</option>
						<option value="mm">mm</option>
                    	</select>
    					 </div></div>
						 </td>
                          </tr>
                         
                          <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="email">SECTION</label>
						      <div class="controls"><select  name="borrowtype" style="width:250px;font-size:12px"  ><option></option>
						<?php error_reporting(0); require('db.php'); $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec)){echo "<option value='" . $row['section_name'] ."'>" . $row['section_name'] ."</option>";}?> </select></div>
						    </div> </td>
                            <td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">CLASSIFICATION</label>
						      <div class="controls"><select  name="ddc" style="width:250px;font-size:12px"  >
       					 <option></option>
                          <?php echo $ddc=mysql_query("SELECT * FROM cat_ddc_t");
			 		  while($row=mysql_fetch_array($ddc)){?>
					<option value="<?php echo $row['dec_no'];?>"><?php echo $row['dec_no']?>---<?php echo $row['class'];?></option><?php }?></select> </div>
						    </div></td>
                            </tr>
                    <tr><td>
					<div class="control-group ">
					<label class="control-label" for="email">EDITION</label>
					<div class="controls">
                    <select  name="edition" style="width:110px;font-size:12px">
        			<option value="1st" selected="selected">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<?php for($i=4;$i<11;$i++){ ?>
					<option value="<?php echo $i; ?>th"><?php echo $i; ?>th</option><?php }?>
			  		<option value="Revised" selected="selected">Revised</option>
					</select><input style="width:auto" type="checkbox" name="ill"/>&nbsp;with illustration
	 				</div></div>
					</td><td>
					<div class="control-group ">
					<label class="control-label" for="email">ISBN</label>
					<div class="controls">
                    <input    type="text" name="isbn" id="fname"  style="width:250px;height:20px;" /></div>
					</td></tr>
                    
                    <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">BOOK TYPE</label>
						      <div class="controls ">
                       <input  name="booktype" type="radio" id="radio3" style="width:auto" value="Non-fiction" />
						Non-Fiction</label>
				  		<label class="radio">
						<input  type="radio" name="booktype" id="radio4" value="Fiction"  checked="checked"/>
					Fiction</label> </td>
        			 </div>
						    </div></td><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">DESCRIPTION</label>
						      <div class="controls">
                       		<textarea name="description" cols="30" rows="5" id="textfield5" class="form-poshytip" ></textarea>
						   </div>
						    </div></td>
                            </tr>
                           
                    <tr><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">COPIES</label>
						      <div class="controls">
                  <input  type="text"  name="quantity" id="fname"  style="width:250px;height:20px;" />
        			 </div>
						    </div></td><td>
						    <div class="control-group ">
						      <label class="control-label" for="subject">PUBLISHER</label>
						      <div class="controls">
                       <select name="publisher"  style="width:250px;font-size:12px">
          				<?php echo $ga=mysql_query("SELECT * FROM cat_publisher_t");
			   			while($numrow=mysql_fetch_array($ga)){?>
						<option value="<?php echo $numrow['pub_name'];?>"><?php echo $numrow['pub_name']?></option><?php
			  			 }?></select>
       </div>
						    </div></td>
                            </tr>
                           
                            
                          <tr>
<td width="40"  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><B>SUPPLIER INFORMATION</B></strong></td> </tr>
						<tr><td><BR>
						<div class="control-group ">
						      <label class="control-label" for="subject">BOOK TYPE</label>
						      <div class="controls"><select name="sup"  style="width:250px;font-size:12px">
          				<option ></option>
             			<option >Donated</option><option >Borrowed</option><option >Purchased</option>
						</select>
	   					 </div></div>
                         </td><td><BR>
						<div class="control-group ">
 						<label class="control-label" for="validateSelect">NAME</label>
				            <div class="controls">
				          <input  name="newsupplier" style="width:250px;height:20px;" type="text"/> </div>
						    </div></td>
                            </tr>
                            <tr><td>
                           	<div class="control-group ">
						      <label class="control-label" for="subject">PRICE</label>
						      <div class="controls"><input name="unitprice" style="width:250px;height:20px;" type="text" />
                              </div>
						    </div></td>
                            </tr>
                          <tr>
<td width="40"  colspan="8" style="background-color:#969696;font-size:23px; font-family:Georgia, 'Times New Roman', Times, serif"><B>AUTHOR INFORMATION</B></strong></td> </tr>
						</tr>
                        <tr>
                        <td  colspan="2" style="background-color:#EAEAEA;font-size:19px;" >
                        <br>
&nbsp;&nbsp;&nbsp;&nbsp; First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp; Middle Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Name Extension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           				</td>
                         </tr>
                    	 </td>
                         </table>
<table>
<tr><td class="control-group controls">
<input name="fname1" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname1" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname1" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname1" style="width:200px;height:20px;" type="text" />
</td></tr>
<tr><td class="control-group controls">
<input name="fname2" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname2" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname2" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname2" style="width:200px;height:20px;" type="text" />
</td></tr>
<tr><td class="control-group controls">
<input name="fname3" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname3" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname3" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname3" style="width:200px;height:20px;" type="text" />
</td></tr>
<tr><td class="control-group controls">
<input name="fname4" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname4" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname4" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname4" style="width:200px;height:20px;" type="text" />
</td></tr>
<tr><td class="control-group controls">
<input name="fname5" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname5" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname5" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname5" style="width:200px;height:20px;" type="text" />
</td></tr>
<tr><td class="control-group controls">
<input name="fname6" style="width:200px;height:20px;" type="text" />
</td><td class="control-group controls">
<input name="mname6" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"> 
<input name="lname6" style="width:200px;height:20px;" type="text" />
</td>
<td class="control-group controls"><input name="xname6" style="width:200px;height:20px;" type="text" />
</td></tr>
                        
    				   </table>                 
    					  <div class="form-actions" align="center">
						     <input class="btn btn-success btn" type="submit" value="ADD" name="add" id="submit"  />
	
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
