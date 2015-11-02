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
<h3 align="center" class="style16"> Logs Record</h3>
 <div class="widget-content" >
<br />
 <div class="widget-content" >
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
                  <td>Library ID</td>
                  <td>Start Time</td>
                  <td>Log Out Time</td>
                  <td>Date</td>
                 </tr>
                     
<?php    
	  error_reporting(0);
	  include ('db.php');
	 $from=$_GET['from'];
	 $to=$_GET['to'];

		if($to !=NULL || $from != NULL){
		$qry1=mysql_query("SELECT * FROM `library_logs` WHERE log_date >= '$from' AND log_date <= '$to'");
		while($b=mysql_fetch_array($qry1)){
		$temp=$b['log_in_time'];
		$start_time=date('h:i A ', strtotime($temp));
		$temp1=$b['log_out_time'];
		$log_otime=date('h:i A ', strtotime($temp1));
		$date1=$b['log_date'];
		$date=date('M. d, Y', strtotime($date1));
		$id=$b['account_no'];
		$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_account_t` WHERE account_no='$id'"));
		$s_id=$student['student_id'];	
				$student1=mysql_fetch_array(mysql_query("SELECT * FROM `student_t` WHERE student_id='$s_id'"));
		$fname=$student1['f_name'];	
			$mname=$student1['m_name'];	
			$lname=$student1['l_name'];	
		if($s_id ==NULL)
		{
			$employee=mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$id'");
			while($a=mysql_fetch_array($employee)){
			$call=$a['emp_id'];	
			$a1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$call'"));
			$fname=$a1['f_name'];	
			$mname=$a1['m_name'];	
			$lname=$a1['l_name'];	
			}
		}
		else
		{$call=$s_id;
		}
		
		?>        
         <tr> 
		<th><?php echo "$fname $mname $lname ($call)"; ?></th>
		<?php echo"
                  <th><div align='center'>$start_time</div></th>";
				  if($temp1 != 0){
                  echo"<th><div align='center'>$log_otime</div></th>";}
				  else{
				   echo"<th> <div align='center'>Currently on the Library</div></th>";
				   }
             echo"     <th><div align='center'>$date</div></th>";
        
}}
		else{
	$qry1=mysql_query("SELECT * FROM `library_logs` ");
		while($b=mysql_fetch_array($qry1)){
		$temp=$b['log_in_time'];
		//$start_time=date('h:mA ', strtotime($temp));
		$temp1=$b['log_out_time'];
		$log_otime=date('h:i a', strtotime($temp1));
		$start_time=date('h:i a', strtotime($temp));
		$date1=$b['log_date'];
		$date=date('M. d, Y', strtotime($date1));
		
		$id=$b['account_no'];
		
		$student=mysql_fetch_array(mysql_query("SELECT * FROM `student_account_t` WHERE account_no='$id'"));
		$s_id=$student['student_id'];	
				$student1=mysql_fetch_array(mysql_query("SELECT * FROM `student_t` WHERE student_id='$s_id'"));
	
			$fname=$student1['f_name'];	
			$mname=$student1['m_name'];	
			$lname=$student1['l_name'];	
	
		if($s_id == NULL)
		{
			$employee=mysql_query("SELECT * FROM `employee_account_t` WHERE account_no='$id'");
			while($a=mysql_fetch_array($employee)){
			$call=$a['emp_id'];	
			$a1=mysql_fetch_array(mysql_query("SELECT * FROM `employee_t` WHERE emp_id='$call'"));
			$fname=$a1['f_name'];	
			$mname=$a1['m_name'];	
			$lname=$a1['l_name'];	
			}
		}
		else
		{$call=$s_id;
		}
		?>   <tr>       
	<th><div align='center'>
				  <a   class="submit" onClick="window.open('account2.php?call_no=<?php 
							echo "$call";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo" $fname $mname $lname ($call)"; ?> </a></div></th>

        <?php
		echo"
                  <th><div align='center'>$start_time</div></th>";
				  if($temp1 != 0){
                  echo"<th><div align='center'>$log_otime</div></th>";}
				  else{
				   echo"<th> <div align='center'>Currently on the Library</div></th>";
				   }
             echo"     <th><div align='center'>$date</div></th>";
                ?>
                 </tr>
              <?php } } ?>
              
        
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
