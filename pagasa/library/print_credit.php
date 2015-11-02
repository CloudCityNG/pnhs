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
 <h3 align="center" class="style16">Creadit Records</h3>
 <div class="widget-content" ><br><br>
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="1000px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
         <th width="110">Borrow Date</th>
                        <th width="110">Title</th>
                        <th width="110">Borrower's Name</th>
                        <th width="60">Fine</th>
                        <th width="60">Penalties</th>
                        <th width="60">Total</th>
                       </tr>
                     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $from=$_GET['from'];
	 $to=$_GET['to'];

		if($to !=NULL || $from != NULL){
			$qry1=mysql_query("SELECT * FROM `appraisal_t` WHERE borrow_date >= '$from' AND borrow_date <= '$to' AND a_remark = 'credit'");
		while($b=mysql_fetch_array($qry1)){
		$bdate=$b['borrow_date'];
		$btime=$b['borrow_time'];
		$btime1=date('h:i a', strtotime($btime));
		$bdate1=date('M. d, Y', strtotime($bdate));
		$access_no=$b['access_no'];
		$id=$b['account_no'];
		$fine=$b['fine'];
		$penalties=$b['penalties'];
		$fine1=$fine+$penalties;
		$amount1=number_format($fine, 2, '.', ',');
		$amount2=number_format($penalties, 2, '.', ',');
		$amount=number_format($fine1, 2, '.', ',');
		$book=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
		$call_no=$book[call_no];
		$book1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$call_no'"));
		$title=$book1[title];
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
			
		}
		echo"<tr>
                <th><div align='center'>$bdate1 $btime1</div></th>
				<th><div align='center'>$title	</div></th>
				<th><div align='center'>$fname $mname $lname</div></th>";
		if($fine == 0){echo"<th><div align='center'> ------------- </div></th>";}
		else{echo"<th><div align='center'>Php. $amount1</div></th>";}
        if($penalties == NULL){echo"<th><div align='center'> ------------- </div></th>";}
		else{echo"<th><div align='center'>Php. $amount2</div></th>";}
echo"<th><div align='center'>Php. $amount</div></th>
                 </tr>";
         }
		$stu=mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE borrow_date >= '$from' AND borrow_date <= '$to' AND a_remark = 'credit'");
		while($b=mysql_fetch_array($stu)){
		$book1=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sum1 FROM `appraisal_t`WHERE borrow_date >= '$from' AND borrow_date <= '$to' AND a_remark = 'credit'"));
			$sum=$b['sum'];
			$sum1=$book1['sum1'];
			$tot=$sum+$sum1;
		$total1=number_format($sum, 2, '.', ',');
		$total2=number_format($sum1, 2, '.', ',');
		$total3=number_format($tot, 2, '.', ',');
		}
         	echo"<tr align='center' style='color:#FF0000'>
                  <th><div align='center'>TOTAL</div></th>
                  <th><div align='center'>----------</div></th>
                  <th><div align='center'>----------</div></th>
                  <th><div align='center'>Php. $total1</div></th>
        		  <th><div align='center'>Php. $total2</div></th>
        		  <th><div align='center'>Php. $total3</div></th>
                   </tr>";
}	
		else{
			$qry1=mysql_query("SELECT * FROM `appraisal_t` WHERE a_remark = 'credit'");
		while($b=mysql_fetch_array($qry1)){
		$bdate=$b['borrow_date'];
		$btime=$b['borrow_time'];
		$btime1=date('h:i a', strtotime($btime));
		$bdate1=date('M. d, Y', strtotime($bdate));
			
		$access_no=$b['access_no'];
		$id=$b['account_no'];
		$no=$b['a_no'];
			$fine=$b['fine'];
		$penalties=$b['penalties'];
		$fine1=$fine+$penalties;
		$amount1=number_format($fine, 2, '.', ',');
		$amount2=number_format($penalties, 2, '.', ',');
		$amount=number_format($fine1, 2, '.', ',');
		//echo"$amount ====$fine1 $bdate hjhjhj";
		
		$book=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
		$call_no=$book[call_no];
		$book1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$call_no'"));
		$title=$book1[title];
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
			
		}
		
		echo"<tr>
                <th><div align='center'>$bdate1 $btime1</div></th>
				<th><div align='center'>$title	</div></th>
				<th><div align='center'>$fname $mname $lname</div></th>";
						if($fine == 0){echo"<th><div align='center'> ------------- </div></th>";}
		else{echo"<th><div align='center'>Php. $amount1</div></th>";}
        if($penalties == NULL){echo"<th><div align='center'> ------------- </div></th>";}
		else{echo"<th><div align='center'>Php. $amount2</div></th>";}

				echo"<th><div align='center'>Php. $amount</div></th>
                 </tr>";
         }
		$stu=mysql_query("SELECT sum(fine) as sum FROM `appraisal_t`WHERE  a_remark = 'credit'");
		while($b=mysql_fetch_array($stu)){
		$book1=mysql_fetch_array(mysql_query("SELECT sum(penalties) as sum1 FROM `appraisal_t`WHERE a_remark = 'credit'"));
			$sum=$b['sum'];
			$sum1=$book1['sum1'];
			$tot=$sum+$sum1;
		$total1=number_format($sum, 2, '.', ',');
		$total2=number_format($sum1, 2, '.', ',');
		$total3=number_format($tot, 2, '.', ',');
		}
         	echo"<tr align='center' style='color:#FF0000'>
                  <th><div align='center'>TOTAL</div></th>
                  <th><div align='center'>----------</div></th>
                  <th><div align='center'>----------</div></th>
                  <th><div align='center'>Php. $total1</div></th>
        		  <th><div align='center'>Php. $total2</div></th>
        		  <th><div align='center'>Php. $total3</div></th>
                   </tr>";
}?> </table>
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
