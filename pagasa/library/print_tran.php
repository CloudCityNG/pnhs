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
<h3 align="center" class="style16"> Book Transactions Record</h3>
 <div class="widget-content" >
<br />
  <div class="widget-content" >
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="1080px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
             			<th width="200">Title</th>
                        <th width="160">Borrowed Date</th>
                        <th width="160">Retured Date</th>
                        <th width="160">Borrower's Name</th>
                        <th width="160">Person In Charge</th>
               </tr>
                     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $from=$_GET['from'];
	 $to=$_GET['to'];

		if($to !=NULL || $from != NULL){
		$book=mysql_query("SELECT * FROM `appraisal_t` WHERE  borrow_date >= '$from' AND borrow_date <= '$to'");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$access_no=$a['access_no'];
			$account_no=$a['account_no'];
			$btime1=date('h:i a', strtotime($btime));
			$rtime1=date('h:i a', strtotime($rtime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$e=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname1=$e['f_name'];
			$mname1=$e['m_name'];
			$lname1=$e['l_name'];
			
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
			?><tr>
        	<?php echo"<td><div align='center'>$title2</div</td>";
			echo"<td><div align='center'>$bdate1$btime1</div</td>";
			if($rtime == 0 ){echo"<td><div align='center'>Not Yet Returned</div</td>";}
			else{echo"<td><div align='center'>$rdate1$rtime1</div</td>";}
			echo"<td><div align='center'>$fname $mname $lname</div></td>";
            echo"<td><div align='center'>$fname1 $mname1 $lname1</div></td>";
             ?> </tr> 
			 <?php }}
			else{
			$book=mysql_query("SELECT * FROM `appraisal_t`");
			while($a=mysql_fetch_array($book))
			{	
			$bdate=$a['borrow_date'];
			$btime=$a['borrow_time'];
			$rdate=$a['return_date'];
			$rtime=$a['return_time'];
			$access_no=$a['access_no'];
			$id=$a['account_no'];
			$btime1=date('h:i a', strtotime($btime));
			$rtime1=date('h:i a', strtotime($rtime));
			$bdate1=date('M. d, Y', strtotime($bdate));
			$rdate1=date('M. d, Y', strtotime($rdate));
			$charge =$a['library_in_charge'];
			$copies=mysql_fetch_array(mysql_query("SELECT * FROM `cat_copies_t` WHERE access_no='$access_no'"));
			$title=$copies['call_no'];
			$book2=mysql_fetch_array(mysql_query("SELECT * FROM `cat_books_t` WHERE book_id='$title'"));
			$book1 =$book2['book_id'];
			$title1=mysql_fetch_array(mysql_query("SELECT * FROM `cat_reading_material_t` WHERE call_no='$title'"));
			$title2=$title1['title'];
			$empl1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$charge'"));
			$emp_id=$empl1['emp_id'];
			$e=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$emp_id'"));
			$fname1=$e['f_name'];
			$mname1=$e['m_name'];
			$lname1=$e['l_name'];
			
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
		
			?>
            <tr>
		<?php echo"<td><div align='center'>$title2</div</td>";
			echo"<td><div align='center'>$bdate1$btime1</div</td>";
			if($rtime == 0 ){echo"<td><div align='center'>Not Yet Returned</div</td>";}
			else{echo"<td><div align='center'>$rdate1$rtime1</div</td>";}
			echo"<td><div align='center'>$fname $mname $lname</div></td>";
            echo"<td><div align='center'>$fname1 $mname1 $lname1</div></td>";
               ?>  </tr>
             <?php }}?>
            </tbody>
        </table>
<p>
</div>
 <div align="center">
     <br><br><p>Prepared by:     </p>
     <br>
 <p> Mrs. Mary Ann O. Taduran<br>Librarian</p>
    <p>&nbsp;</p>
</div>
</body>
</html>
