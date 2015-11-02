	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>
<style type="text/css">
<!--
.style2 {font-weight: bold}
.style4 {font-weight: bold; color: #FFFFFF; }
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
  <p>
   <a type="submit" value="Print" id="printButton" onClick="printpage()"> <img src="img/mono-icons/printer32.png" /><br>Print</a>
<div class="span9 span-fixed-sidebar">
      <div class="hero-unit">

      <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #B1F3B4}
-->
      </style> 
      
      
<?php    
	  error_reporting(0);
	  include ('db.php'); 
	  $action=$_GET['action'];
	  ?>
<img src="img/pnhs_logo.png" style="position:absolute;top:80px;right:800px">
<h4 align="center"> 	 
  PAG-ASA NATIONAL HIGH SCHOOL<br />Rawis, Legazpi, Albay</h4>
<h1 align="center" class="style16"><?php echo"$action"; ?></h1><br><br>
 <div class="widget-content" >
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
                  <td width="80">Date</td>
                  <td width="100">Title</td>
                  <td width="100">Subtitle</td>
                  <td width="100">Author</td>
                 <td width="20">Qty.</td>
                  <td width="100">Person in Charge</td>
                </tr>
                     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $from=$_GET['from'];
	 $to=$_GET['to'];

		if($to==NULL || $from == NULL){
		$qry=mysql_query("SELECT * FROM `cat_books_t`");
		while($a=mysql_fetch_array($qry)){
		$call_no=$a['book_id'];
		$b=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` where call_no='$call_no'"));
		$title=$b['title'];
		$subtitle=$b['subtitle'];
		$date=$b['date_recorded'];
		$date1=date('M d Y', strtotime($date));
		$c=mysql_fetch_array(mysql_query(" SELECT *, count(*)  as count FROM cat_copies_t   where call_no='$call_no' GROUP BY call_no"));
		$d=mysql_fetch_array(mysql_query("SELECT call_no,GROUP_CONCAT(author_fname,' ',author_mname,' ',author_lname,' ',nameextention,'  ') as aut
  		FROM (SELECT call_no,author_fname,author_mname,author_lname,nameextention,CONCAT(author_fname,' ',author_mname,' ',author_lname,nameextention,'+',COUNT(*)) as author_fname1
        FROM cat_author_t GROUP BY call_no,author_fname,author_mname,author_lname,nameextention) as x WHERE call_no='$call_no' GROUP BY call_no"));
		$author1=$d['aut'];
		$empl=mysql_query("SELECT * FROM `cat_copies_t` WHERE call_no='$call_no'");
			while($employee=mysql_fetch_array($empl)){
			$charge =$employee['librarian_in_charge'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
		}
		$qty=mysql_fetch_array(mysql_query("SELECT * FROM `cat_supplies_t` where call_no='$call_no'"));
		$copies=$qty['quantity'];
	
		
		
		echo"<tr align='center'>
                  <td>$date1</td>
                  <td>$title</td>
                  <td>$subtitle</td>
                  <td>$author1 </td>
                  <td>$copies</td>
				   <td><div align='center'>$fname $mname $lname</div></td>";
         

}}
		else{
		$qry=mysql_query("SELECT * FROM cat_reading_material_t WHERE date_recorded >= '$from' AND date_recorded <= '$to'");
		while($a=mysql_fetch_array($qry)){
		$call_no=$a['call_no'];
		$qry1=mysql_query("SELECT * FROM `cat_books_t` where book_id='$call_no'");
		while($qry11=mysql_fetch_array($qry1)){	
		$call_no1=$qry11['book_id'];
		$qry2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` where call_no='$call_no1'"));
		$date=$qry2['date_recorded'];
		$date1=date('M d Y', strtotime($date));
		$title1=$qry2['title'];
		$subtitle1=$qry2['subtitle'];
		$qty=mysql_fetch_array(mysql_query("SELECT * FROM `cat_supplies_t` where call_no='$call_no'"));
		$copies=$qty['quantity'];
	
		$author=mysql_fetch_array(mysql_query("SELECT call_no,GROUP_CONCAT(author_fname,' ',author_mname,' ',author_lname,' ',nameextention,'  ') as aut
  FROM (SELECT call_no,author_fname,author_mname,author_lname,nameextention,CONCAT(author_fname,' ',author_mname,' ',author_lname,nameextention,'+',COUNT(*)) as author_fname1
          FROM cat_author_t GROUP BY call_no,author_fname,author_mname,author_lname,nameextention) as x WHERE call_no='$call_no' GROUP BY call_no"));

		$author1=$author['aut'];
		$empl=mysql_query("SELECT * FROM `cat_copies_t` WHERE call_no='$call_no'");
			while($employee=mysql_fetch_array($empl)){
			$charge =$employee['librarian_in_charge'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
		}
				echo"<tr align='center'>
                  <td>$date1</td>
                  <td>$title1</td>
                  <td>$subtitle1</td>
                  <td>$author1 </td>
                  <td>$copies</td>
				   <td><div align='center'>$fname $mname $lname</div></td>";
         
}   }   }          ?>

</tbody></table>
<p>
</div>
 <div align="center"><br><br>
     <p>Prepared by:     </p>
     <p>&nbsp;</p>
<p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
