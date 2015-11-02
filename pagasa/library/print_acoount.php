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
<h2 align="center" class="style16"><?php echo"$fname"; ?> Log Records</h2>
 <div class="widget-content" >
<br />

            <table cellpadding="1" bordercolor="#003333" cellspacing="1" border="1" class=" " align="center" id="example" width="900px">
           
                <tr  bgcolor='#CCFFFF' align="center" >
   	                <td>Start Time</td>
                        <td>Log out Time</td>
                         <td>Date</td>
              </tr> 
              <tbody>            	
<?php 	
			if($to == NULL){
				$log=mysql_query("SELECT * FROM `library_logs` WHERE account_no='$id1'");
				while($b=mysql_fetch_array($log))
				{	
				$temp=$b['log_in_time'];
				$temp1=$b['log_out_time'];
				$log_otime=date('h:iA', strtotime($temp1));
				$start_time=date('h:iA', strtotime($temp));
				$date1=$b['log_date'];
				$date=date('M. d, Y', strtotime($date1));
		
				echo"<tr align='center'>
				<td>$start_time</td>";
				 if($temp1 != 0){echo"<td>$log_otime</td>";}
				 else{echo"<th> Currently on the Library</th>";}
             	echo"  <td>$date</td>
				</tr>";
			}	}
			else
			{
			$log=mysql_query("SELECT * FROM `library_logs` WHERE account_no='$id1' AND log_date >= '$from' AND log_date <= '$to'");
				while($b=mysql_fetch_array($log))
				{	
				$temp=$b['log_in_time'];
				$temp1=$b['log_out_time'];
				$log_otime=date('h:i A', strtotime($temp1));
				$start_time=date('h:i A', strtotime($temp));
				$date1=$b['log_date'];
				$date=date('M. d, Y', strtotime($date1));
		
				echo"<tr align='center'>
				<td><div align='center'>$start_time</div></td>";
				  if($temp1 != 0){
                  echo"<td><div align='center'>$log_otime</div></td>";}
				  else{
				   echo"<td> <div align='center'>Currently on the Library</div></td>";}
             echo"  <td><div align='center'>$date</div></td></tr>";
			}
		}
		?></tbody>
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