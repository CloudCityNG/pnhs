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
<h1 align="center" class="style16"><?php echo"$action"; ?></h1>
 <div class="widget-content" >
<br />            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
                  <td>Date</td>
                  <td>Title</td>
                  <td>Subtitle</td>
                  <td>Author</td>
                  <td>Qty.</td>
                  <td>Person in Charge</td>
                 </tr>
                     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 

		$qry1=mysql_query("SELECT * FROM cat_periodical_t JOIN cat_reading_material_t ON cat_periodical_t.p_id = cat_reading_material_t.call_no ");
		while($a=mysql_fetch_array($qry1)){
		$call_no=$a['call_no'];
		$date=$a['date_recorded'];
		$date1=date('M d Y', strtotime($date));
		$title1=$a['title'];
		$subtitle1=$a['subtitle'];
		$date=$a['date_of_issue'];	
		$qty=mysql_fetch_array(mysql_query("SELECT * FROM `cat_supplies_t` where call_no='$call_no'"));
		$copies=$qty['quantity'];
		$author=mysql_query("SELECT call_no,GROUP_CONCAT(author_fname,' ',author_mname,' ',author_lname,' ',nameextention,'  ') as aut
  FROM (SELECT call_no,author_fname,author_mname,author_lname,nameextention,CONCAT(author_fname,' ',author_mname,' ',author_lname,nameextention,'+',COUNT(*)) as author_fname1
          FROM cat_author_t GROUP BY call_no,author_fname,author_mname,author_lname,nameextention) as x WHERE call_no='$call_no' GROUP BY call_no");
while($d=mysql_fetch_array($author)){
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
		}}
		
		
		echo"<tr align='center'>
                  <td>$date1</td>
                  <td>$title1</td>
                  <td>$subtitle1</td>
                  <td>$author1 </td>
                  <td>$copies</td>
             <td><div align='center'>$fname $mname $lname</div></td>";
         
	}    
	        ?>

</tbody></table>
<p>
</div>
 <div align="center"><br>
     <p>Prepared by:     </p>
     <p>&nbsp;</p>
  <p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
   <p>&nbsp;</p>
</div>
</body>
</html>
