\<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- The Scripts -->
	<!-- ----------- -->
	<link rel="stylesheet" href="include/css/external/jquery-ui-1.8.21.custom.css">
	
	<link rel="stylesheet" href="include/css/elements.css">
	
		<link rel="stylesheet" href="include/css/external/jquery-ui-1.8.21.custom.css">

	<link rel="stylesheet" href="include/css/icons.css">
	<script src="include/js/main.js"></script>
	<!-- JavaScript at the top (will be cached by browser) -->
	

	<script src="include/js/mylibs/jquery.ui.multiaccordion.js"></script>
	<script src="include/js/mylibs/number-functions.js"></script>
	<script src="include/js/libs/jquery-1.7.2.min.js"></script>
		<!-- Do the same with jQuery UI -->
	<script src="include/js/libs/jquery-ui-1.8.21.min.js"></script>
	<script src="include/js/mylibs/forms/jquery.ui.datetimepicker.js"></script>

	<!-- VALIDATION ENGINE --> 
	
	<script src="include/js/validationEngine/jquery.validationEngine.js"></script>
	<script src="include/js/validationEngine/languages/jquery.validationEngine-en.js"></script>
	<!-- end scripts -->
		<!-- VALIDATION ENGINE CSS-->
	<link rel="stylesheet" href="include/css/validationEngine.jquery.css">
<script>
<script>
$(document).ready(function () {
    
var select=function(dateStr) {
      var d1 = $('#bdate').datepicker('getDate');
      var d2 = $('#end_date').datepicker('getDate');
      var diff = 0;
      if (d1 && d2) {
            diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
      }
      $('#duration').val(diff);
}

$("#bdate").datepicker({ 
	changeMonth: true,
	changeYear: true,
    onSelect: select
});
$('#end_date').datepicker({
changeMonth: true,
changeYear: true,
onSelect: select});
});

</script>
<script>
	jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
		jQuery("#AddPersonnel").validationEngine({
					promptPosition : "topLeft", 
					relative: true,
					autoPositionUpdate : true,
					onValidationComplete: function(form, status){
					if (status == true) {
							window.onunload = refreshParent;
							function refreshParent() {
							window.opener.location.reload();
							}
							submit();
					}
					}

				});
		
		 
	});
	
  </script>

<style>

.table{
	font-family: Calibri;
	font-size: 12px;
	
}
.graphite-box{
	color: #ffffff;
	background-color: #57737f;
	background-image: url('../../img/knobs-icons/Knob Graphite.png');
}
</style>

</head>

<body>

  <?php 
		error_reporting(0);
  	    include_once('db.php');
		$call_no = $_GET['call_no'];
		
		$qry1=mysql_query("SELECT * FROM cat_periodical_t JOIN cat_reading_material_t ON cat_periodical_t.p_id = cat_reading_material_t.call_no WHERE call_no='$call_no'");
		while($a=mysql_fetch_array($qry1)){
		$call_no=$a['call_no'];
		$date_recorded=$a['date_recorded'];
		$dateofissue=$a['date_of_issue'];
		$title=$a['title'];
		$subtitle=$a['subtitle'];
		$label=$a['label'];
		$issn=$a['issn'];
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
		$unit_price=$qty['unit_price'];
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
<form id="AddPersonnel" action=""  method="post"  enctype="multipart/form-data" >
<div style="border:1px solid #000;width:408px;margin-left:auto;margin-right:auto;">
<table class="table" width="400" >
	<tr>
		<td colspan="8" style="background-color:#949494;font-size:18px;font-style:italic;"><strong>BOOK INFORMATION</strong></td>
	</tr>
	<tr>
		<td colspan="2" style="background-color:#EAEAEA;">CALL NUMBER</td>
   		<td colspan="2"><input class="validate[required] text-input" title="Enter Call No."  name="callno"  style="width:250px;height:20px;"
        value='<?php echo"$call_no";?>' /></td>
     </tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">BOOK TITLE</td>
		<td colspan="2"><input value='<?php echo"$title";?>' title="Enter Title"  type="text"  name="title" id="fname"  style="width:250px;height:20px;" /></td>
        </tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">SUBTITLE</td>
		<td colspan="2"><input  title="Enter Subtitle" value='<?php echo"$subtitle";?>' type="text"  name="subtitle" id="fname"  style="width:250px;height:20px;" />
        </td></tr>
		<tr>
		<td colspan="2" style="background-color:#EAEAEA;">NUMBER OF PAGES</td>
		<td colspan="2"><input class="validate[required],custom[number]" value='<?php echo"$pages";?>' title="Enter No. of pages" text-input" type="text"  name="pages" id="fname"  style="width:250px;height:20px;" /></td>
        </tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">VOLUME</td>
		<td colspan="2"><input  title="Enter volume" text-input" type="text"  name="volume" value='<?php echo"$volume";?>' id="fname"  style="width:250px;height:20px;" /></td>
        </tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">COPYRIGHT</td>
		<td colspan="2"><select class="validate[required] text-input" style="width:250px;font-size:12px" name="copyright"  title="Copyright">
              <?php
    for($i=1800;$i<=date(Y);$i++)
    {
    ?>
    <option value="<?php echo $i; ?>" <?php if($copyright==$i){ ?>selected="selected"<?php } ?>><?php echo $i; ?></option>
    <?php
      }
      ?>
	</select></td>
    	</tr><tr>
        <td  colspan="2" style="background-color:#EAEAEA;">SIZE</td>
		<td  colspan="2"><input class="validate[required] text-input" title="Enter Size" value=" <?php echo"$size"; ?>
		" type="text"  name="size" id="size" style="width:180px;height:20px;"/>
		<select class="validate[required] text-input" name="unit" style="width:65px;font-size:12px" title="Select unit size">
						 <option value="cm" <?php if($unit=='cm'){ ?>selected="selected"<?php } ?>>cm</option>
    <option value="inches" <?php if($unit=='inches'){ ?>selected="selected"<?php } ?>>inches</option>
    <option value="mm" <?php if($unit=='mm'){ ?>selected="selected"<?php } ?>>mm</option>
    </select>
      </td>
      </tr><tr>
         </td><td colspan="2" style="background-color:#EAEAEA;">SECTION</td>
           <td colspan="2"><select class="validate[required] text-input" name="borrowtype" style="width:250px;font-size:12px" title="Enter your section" >
						<option><?php echo"$section_no";?></option>
						<?php  $sec=mysql_query("SELECT section_name FROM cat_section_t");
			   			while($row=mysql_fetch_array($sec)){
						echo "<option value='". $row['section_name'] ."'>" . $row['section_name'] ."</option>";}
						?> </select></td>
       	</tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">CLASSIFICATION</td>
		<td colspan="2"><select class="validate[required] text-input" name="ddc" style="width:250px;font-size:12px" title="Select unit size">
         <option><?php echo"$class";?></option>
		 <?php echo $ddc=mysql_query("SELECT * FROM cat_ddc_t");
			 		  while($row=mysql_fetch_array($ddc)){?>
					<option value="<?php echo $row['dec_no'];?>"><?php echo $row['dec_no']?>---<?php echo $row['class'];?></option><?php }?></select></td>
       	</tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">LABEL</td>
		<td colspan="2"><input  value="<?php echo"$label";?>" title="Enter Title"  type="text"  name="label" id="fname"  style="width:250px;height:20px;" /></td>
		 </tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">DATE OF ISSUE</td>
		<td colspan="2">   
         <input  title="Enter Call No."   style="width:250px;height:20px;"
        value='<?php echo"$dateofissue";?>' disabled="disabled"  />
          <select name="month" class="selec3" class="validate[required] text-input">
		<?php
			   $month=array('January','February','March','April','May','June','July','August','September','October','November','December');
			 
			   for($i=0;$i<12;$i++)
			   {
				?>
			  <option value="<?php echo $month[$i]; ?>" <?php if($dateofissue==$month[$i]){ ?>selected="selected"<?php } ?>><?php echo $month[$i]; ?></option>
  <?php
			   } ?>
			</select>
			  <select name="year" class="selec2" class="validate[required] text-input">
				<?php
			   for($i=1900;$i<=date(Y);$i++)
			   {
				?>
				<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php
			   }?>
			  </select>
              </td>
		</tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">ISSN</td>
		<td colspan="2"><input class="validate[required] text-input" value="<?php echo $issn;?>" title="Enter Issn"  type="text" name="issn" id="fname"  style="width:250px;height:20px;" /></td>
       </tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">CONTRACT COPIES</td>
		<td colspan="2"><input class="validate[required],custom[number]" title="Enter Isbn" value="<?php echo $copies;?>" type="text" name="quantity" id="fname"  style="width:250px;height:20px;" /></td>
      
    	</td>
    	</tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">ISSUED WITHIN</td>
	    <td colspan="2">
       <input  title="Enter Call No."   style="width:250px;height:20px;"
        value='<?php echo"$issued_within";?>' disabled="disabled"  />  
        <input name="every"  type="text" name="quantity" id="fname"  style="width:50px;height:20px;"/>																			                   	<select name="issue_unit" class="selec2" class="validate[required] text-input">
					<option value="days" selected="selected">days</option>
					<option value="months">months</option>
					<option value="years">years</option>
                    </select></td>  
       </tr><tr>
		<td colspan="2" style="background-color:#EAEAEA;">PUBLISHER</td>
		<td colspan="2"><select class="validate[required] text-input" name="publisher" title="Select Publisher" style="width:250px;font-size:12px">
          				<option><?php echo"$pub_name"?></option>
						<?php echo $ga=mysql_query("SELECT * FROM cat_publisher_t");
			   			while($numrow=mysql_fetch_array($ga)){?>
						<option value="<?php echo $numrow['pub_name'];?>"><?php echo $numrow['pub_name']?></option><?php
			  			 }?></select>
       </tr><tr>
       		<td colspan="8" style="background-color:#949494;font-size:18px;font-style:italic;"><strong>SUPPLIER INFORMATION</strong></td>
		</tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">Type</td>
		<td colspan="2">	<select name="sup"  title="Select supplier" class="validate[required] text-input" style="width:250px;font-size:12px">
    <option value="Donated" <?php if($supplier_type=='Donated'){ ?>selected="selected"<?php } ?>>Donated</option>
    <option value="Borrowed" <?php if($supplier_type=='Borrowed'){ ?>selected="selected"<?php } ?>>Borrowed</option>
    <option value="Purchased" <?php if($supplier_type=='Purchased'){ ?>selected="selected"<?php } ?>>Purchased</option>
    </select>
						</select>
	   </td>
       </tr><tr>
       
        <td colspan="2" style="background-color:#EAEAEA;">NAME</td>
        <td><input value="<?php echo $supplier_name?>" class="validate[required] text-input"  title="new supplier" placeholder="Suppliers name" name="newsupplier" /></td>
        </tr><tr>
        <td colspan="2" style="background-color:#EAEAEA;">UNIT PRICE</td>
       <td><input name="unitprice" style="width:250px;height:20px;" value="<?php echo $unit_price ?>" type="text" id="mi" size="2" maxlength="15"  title="new supplier"/></td>
        </tr>
        </table>
        <table class="table" width="400" >
        <tr>
       <td colspan="94" style="background-color:#949494;font-size:18px;font-style:italic;"><strong>AUTHOR INFORMATION</strong></td>
		</tr><tr>
        <td width="94px"  colspan="2" style="background-color:#EAEAEA;" >FIRST NAME</td>
		 <td width="94px"  colspan="2" style="background-color:#EAEAEA;">MIDLE NAME </td>
        <td width="94px"  colspan="2"style="background-color:#EAEAEA;" >LAST NAME</td>
        <td width="94px"  colspan="2"style="background-color:#EAEAEA;" >NAME EXTENSION </td>
       
        </tr>
        <tr>
       <?php 	
	   
		error_reporting(0);
  	  include_once('db.php');
	$author11=mysql_query("SELECT * FROM cat_author_t WHERE call_no='$call_no'");
	 while($author7=mysql_fetch_array($author11))
	{
	$fname = $author7['author_fname'];
	$mname = $author7['author_mname'];
	$lname = $author7['author_lname'];
	$xname = $author7['nameextention'];

	?>
            <tr>
       <td colspan="2"><input class="validate[required] text-input" title="Enter Call No."  name="fname1"  style="width:94px;height:20px;"
        value='<?php echo"$fname";?>' /></td>
  <td colspan="2"> <input  title="Enter Call No."  name="mname1"  style="width:94px;height:20px;"
        value='<?php echo"$mname";?>' /></td>
         <td colspan="2"><input class="validate[required] text-input" title="Enter Call No."  name="lname1"  style="width:94px;height:20px;"
        value='<?php echo"$lname";?>' /></td>
         <td colspan="2"><input  title="Enter Call No."  name="xname1"  style="width:94px;height:20px;"
        value='<?php echo"$xname";?>' /></td>  
         </tr>
      <?php
	     mysql_query("UPDATE `cat_author_t` SET author_fname='$fname1',author_mname='$mname1',author_lname='$lname1',nameextention='$xname1' WHERE call_no='$call_no'");
		 
		 echo"rerer	";}?>
        <tr>
         <td colspan="2"><input name="fname2" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" class="validate[custom[onlyLetterSp]] text-input"/></td>
       <td colspan="2"><input name="mname2" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
       <td colspan="2"><input name="lname2" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"class="validate[custom[onlyLetterSp]] text-input"/></td>
      <td colspan="2"><input name="xname2" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
      </tr>
        <tr>
         <td colspan="2"><input name="fname3" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"class="validate[custom[onlyLetterSp]] text-input"/></td>
       <td colspan="2"><input name="mname3" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
       <td colspan="2"><input name="lname3" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"class="validate[custom[onlyLetterSp]] text-input"/></td>
      <td colspan="2"><input name="xname3" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
      </tr>
        <tr>
         <td colspan="2"><input name="fname4" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" class="validate[custom[onlyLetterSp]] text-input"/></td>
       <td colspan="2"><input name="mname4" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" /></td>
       <td colspan="2"><input name="lname4" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" class="validate[custom[onlyLetterSp]] text-input"/></td>
        <td colspan="2"><input name="xname4" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
    </tr>
        <tr>
         <td colspan="2"><input name="fname5" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" class="validate[custom[onlyLetterSp]] text-input"/></td>
       <td colspan="2"><input name="mname5" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" </td>
       <td colspan="2"><input name="lname5" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15" class="validate[custom[onlyLetterSp]] text-input"/></td>
        <td colspan="2"><input name="xname5" style="width:94px;height:20px;" type="text" id="mi" size="2" maxlength="15"</td>
    </tr>
        <tr>
        
          <td>
          
          <input type="submit" value="EDIT" name="add" id="submit"  />
	      
	<br><br> 
           </td></tr>       </table>
                  </div>
                </form>          

 <?php 
		error_reporting(0);
  	    include_once('db.php');
		if($_POST['add']){
		$callno1 = $_POST['callno'];
		$daterecorded1= date('Y-m-d');
		$datereceived1=date('Y-m-d');
		$title1=$_POST['title'];
    	$subtitle1=$_POST['subtitle'];
		$pages1=$_POST['pages'];
		$volume1=$_POST['volume'];
		$copyright1=$_POST['copyright'];
		$size1=$_POST['size'];
		$unit1=$_POST['unit'];
		$section1=$_POST['borrowtype'];
		$class11=$_POST['ddc'];
		$label1=$_POST['label'];
		$month1=$_POST['month'];
		$year1=$_POST['year'];
		$issn1=$_POST['issn'];
		$copies1=$_POST['quantity'];
		$every1=$_POST['every'];
		$issueunit1=$_POST['issue_unit'];
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
		$publisher1=$_POST['publisher'];
		$supplier1=$_POST['supplier'];
		$newsupplier1=$_POST['newsupplier'];
		$supplytype1=$_POST['sup'];
		$price1=$_POST['unitprice'];
		echo"$call_no == $callno1 == $callno";
		
		$qry9=mysql_query("SELECT *,count(*) as count FROM cat_copies_t JOIN appraisal_t ON cat_copies_t.access_no = appraisal_t.access_no WHERE call_no='$callno1'");
		while($go9=mysql_fetch_array($qry9))		
		{$no=$go9['count'];}
		echo"$no";
		if($no != NULL)
		{echo"<p class='error-box'>WARNING!! </br> You cannot decrease number of copies because some of the $title are use in borrowing transaction.</p>";}
		else{	
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
		mysql_query("UPDATE `cat_reading_material_t` SET call_no='$callno1',pages='$pages1',size='$size1',unit='$unit1',title='$title1',subtitle='$subtitle1',volume='$volume1',copyright='$copyright1',date_recorded='$daterecorded1',publisher_id='$pu_id',subject='$class1',section_no='$section_no1' WHERE call_no='$call_no'");
			
		mysql_query("UPDATE `cat_periodical_t` SET label='$label1',date_of_issue='$month1 $year1',issn='$issn1',issue_within='$every1 $issueunit1' WHERE p_id='$call_no'");
		mysql_query("UPDATE `cat_supplies_t` SET call_no='$callno1',quantity='$copies1',unit_price='$price1',supplier_name='$newsupplier1',supply_type='$supplytype1' WHERE call_no='call_no'");
	$qry6=mysql_query("SELECT * from cat_copies_t where call_no=$call_no");
	while($f=mysql_fetch_array($qry6))		
		{
		$max=$f['access_no'];
		$max1=$max+$copies;
		mysql_query("UPDATE `cat_copies_t` SET call_no='$callno1' WHERE access_no='max'");
		}
		
				if($fname2 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname2','$mname2','$lname2','$xname2')");}
				if($fname3 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname3','$mname3','$lname3','$xname3')");}
				if($fname4 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname4','$mname4','$lname4','$xname4')");}
				if($fname5 !=NULL)
				{		mysql_query("INSERT INTO `cat_author_t` VALUES ('','$callno','$fname5','$mname5','$lname5','$xname5')");}
	
		echo"<p class='graphite-box'>&nbsp;&nbsp;&nbsp;<b>Sucessfully Added!</b><br>";
		echo"&nbsp;&nbsp;&nbsp;Here's the ID of $copies Periodical(s)";
		for($s=$copies; $s<$copies1; $s++){
			$max1=$max1+00000001;
		echo"<br>&nbsp;&nbsp;&nbsp;$max1";	
		}
		?>
		
		<br><a onClick="window.close();" class="button grey block left"><span class="icon i16-icon_bended-arrow-left"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DONE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			<a href="bago.php" class="button grey block right"><span class="icon i16-icon_bended-arrow-right"></span>ADD MORE BOOKS</a>
					
</p>
	<?php }}

		
		?>

  
</body>
</html>
