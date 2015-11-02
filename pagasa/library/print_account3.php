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
  <body><br><br><br>
  <?php    
	  error_reporting(0);
	  include ('db.php');
	 $id1 = $_GET['id'];
   	$fname = $_GET['name'];
   	$from = $_GET['from'];
   	$to = $_GET['to'];
   
    	  ?>
  <img src="img/pnhs_logo.png" style="position:absolute;top:80px;right:800px">
<h4 align="center"> 	 
  PAG-ASA NATIONAL HIGH SCHOOL<br />Rawis, Legazpi, Albay</h4>
<h3 align="center" class="style16"><?php echo"$fname"; ?> <br>Fine Record(s)</h3>
 <div class="widget-content" >
<br />

            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
   	        <th width="150"><div align='center'>Title</div></th>
             <th align="center"><div align='center'>Borrowed Time & date</div></th>
             <th align="center"><div align='center'>Returned Time & date</div></th>
             <th align="center"><div align='center'>Fine Amount</div></th>
             <th><div align='center'>Person In Charge</div></th>
             <th><div align='center'>Remark</div></th>
             </tr> 
              <tbody>            	
<?php 	
			if($to != NULL){
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND return_date >= '$from' AND return_date <= '$to' AND fine !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['fine'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE return_date >= '$from' AND return_date <= '$to' AND fine != '0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			?><tr>
			<?php echo"
			<td><div align='center'>$title2</div</td>
			<td><div align='center'>$bdate1 $btime1</div</td>	  
			<td><div align='center'>$rdate1 $rtime1</div</td>
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	
			<td><div align='center'>$remark1</div></td></tr>  
			";
             }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE account_no='$id1' AND fine !='0'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$access_no=$a['access_no'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$rtime1=date('h:i a', strtotime($rtime));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$fine=$a['fine'];
			$remark=$a['a_remark'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE account_no='$id1' AND fine !='0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			?><tr>
			<?php echo"
			<td><div align='center'>$title2</div</td>
			<td><div align='center'>$bdate1 $btime1</div</td>
			<td><div align='center'>$rdate1 $rtime1</div</td>	  
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	  
			<td><div align='center'> $remark1 </div</td>	  
			</tr>";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  </tr>";
			  }?>
           </tbody>
            </table>
           

<br><br>
   <div align="center">
     <p>Prepared by:</p>
     <br>
 <p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
    <p align="right">&nbsp; 
                   
</p>
</div>

</div></div> </div></div>