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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

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
<h3 align="center" class="style16"> Fine(s) Record</h3>
 <div class="widget-content" >
<br />
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="1100px">
           <thead>
                <tr  bgcolor='#CCFFFF' align="center" >
                
                        <th width="200" >Title</th>
                        <th width="200">Borrower's Name</th>
                        <th width="180">Returned Date & Time</th>
                        <th width="180">Borrowed Date & Time</th>
                        <th width="100">Fine Amount</th>
                        <th width="200">Person in Charge</th>
                        <th width="5px"></th>
                        
               </tr>
                  </thead>   
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $from=$_GET['from'];
	 $to=$_GET['to'];

		if($to !=NULL || $from != NULL){
$book=mysql_query("SELECT * FROM `appraisal_t` WHERE  return_date >= '$from' AND return_date <= '$to' AND fine !='0'");
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
			$id=$a['account_no'];
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
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
		$fname1=$employee1['f_name'];
			$mname1=$employee1['m_name'];
			$lname1=$employee1['l_name'];
			$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_account_t` WHERE account_no='$id'"));
			$s_id=$student['student_id'];	
		
			if($s_id ==NULL)
			{
			$employee=mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$id'");
			while($a=mysql_fetch_array($employee)){
			$call=$a['emp_id'];	
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$call'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			}
			
		}
		else
		{$call=$s_id;
			$emp=mysql_query("SELECT * FROM `student_t` WHERE student_id='$call'");
			while($student=mysql_fetch_array($emp))
			{$fname=$student['f_name'];
			$mname=$student['m_name'];
			$lname=$student['l_name'];
			}
			
		}	$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE return_date >= '$from' AND return_date <= '$to' AND fine != '0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			
			 echo"
			<tr>
			<td><div align='center'>$title2</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	
			<td><div align='center'>$bdate1 $btime1</div</td>	  
			<td><div align='center'>$rdate1 $rtime1</div</td>
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname1 $mname1 $lname1 </div</td>	
			<td><div align='center'>$remark1</div></td></tr>  
			";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> ----- </div></td>
			  </tr>";
			  }	
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t` WHERE  fine !='0'");
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
			$id=$a['account_no'];
			if($remark=='paid'){
			$remark1=PAID;}
			else{$remark1=CREDIT;}
			$fines=number_format($fine, 2, '.', ',');
			$btime1=date('h:i a', strtotime($btime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname1=$employee1['f_name'];
			$mname1=$employee1['m_name'];
			$lname1=$employee1['l_name'];
			$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_account_t` WHERE account_no='$id'"));
			$s_id=$student['student_id'];	
		
			if($s_id ==NULL)
			{
			$employee=mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$id'");
			while($a=mysql_fetch_array($employee)){
			$call=$a['emp_id'];	
			$employee1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$call'"));
			$fname=$employee1['f_name'];
			$mname=$employee1['m_name'];
			$lname=$employee1['l_name'];
			}
			
		}
		else
		{$call=$s_id;
			$emp=mysql_query("SELECT * FROM `student_t` WHERE student_id='$call'");
			while($student=mysql_fetch_array($emp))
			{$fname=$student['f_name'];
			$mname=$student['m_name'];
			$lname=$student['l_name'];
			}
			
		}$sum=mysql_fetch_array(mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE  fine !='0' AND a_remark='paid'"));
			$sum1=$sum['sum'];
			$total=number_format($sum1, 2, '.', ',');
			 echo"
			<tr>
			<td><div align='center'>$title2</div</td>	  
			<td><div align='center'>$fname $mname $lname </div</td>	
			<td><div align='center'>$bdate1 $btime1</div</td>	  
			<td><div align='center'>$rdate1 $rtime1</div</td>
			<td><div align='center'>Php. $fines</div</td>	  
			<td><div align='center'>$fname1 $mname1 $lname1 </div</td>	
			<td><div align='center'>$remark1</div></td></tr>  
			";
              }
			  echo"<tr style='color:#FF0000'>
			  <td><div align='center'> TOTAL </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> Php. $total </div></td>
			  <td><div align='center'> -------------- </div></td>
			  <td><div align='center'> ----- </div></td>
			  </tr>";
			  
			  }?>
                       </table>
               </div>
                </th>
            
</tbody></table>
<p>
</div>
 <div align="center">
     <p>Prepared by:     </p>
     <p>&nbsp;</p>
  <p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
   <p>&nbsp;</p>
</div>
</body>
</html>
