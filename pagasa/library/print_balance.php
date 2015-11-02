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
<h3 align="center" class="style16"> Account(s) Record</h3>
 <div class="widget-content" >
<br />
  <div class="widget-content" >
            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="1080px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
              <th width="100">Library ID</th>
                        <th width="200">Name</th>
                        <th width="100">Status</th>
                        <th width="200">Address</th>
                  </tr>
                     
            </tbody>           
<?php    
	  error_reporting(0);
	  include ('db.php');
          
			$qry1=mysql_query("SELECT * FROM `account_t` where type !='admin'");
		while($b=mysql_fetch_array($qry1)){
		$id=$b['account_no'];	
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
			$add=$employee1['address'];
			}
			echo"<tr>
                  <th><div align='center'>$call</div></th>";
        	        ?>	<th><div align='center'>
				  <a   class="submit" onClick="window.open('account2.php?call_no=<?php 
							echo "$call";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo" $fname $mname $lname "; ?> </a></div></th>
<?php
echo" <th><div align='center'>Employee</div></th>
                  <th><div align='center'>$add</div></th>
                  ";
?>
               <?php
		}
		else
		{$call=$s_id;
			$emp=mysql_query("SELECT * FROM `student_t` WHERE student_id='$call'");
			while($student=mysql_fetch_array($emp))
			{$fname=$student['f_name'];
			$mname=$student['m_name'];
			$lname=$student['l_name'];
			$type=$student['student_type'];
			$city=$student['city_municipality'];
			$barangay=$student['barangay'];
			$street=$student['street'];
			 	}
			echo"<tr>
                  <th><div align='center'>$call</div></th>";
        ?>	<th><div align='center'>
				  <a   class="submit" onClick="window.open('account2.php?call_no=<?php 
							echo "$call";?>&&herf=<?php echo"$herf"; ?>','','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1100, height=900,position=center');"><?php echo" $fname $mname $lname"; ?> </a></div></th>
<?php
			echo" <th><div align='center'> $type Student </div></th>
                  <th><div align='center'> $street $barangay $city </div></th>
                  ";
			?>
              	
		  <?php } }?>          
                </th>
</tr> 
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
