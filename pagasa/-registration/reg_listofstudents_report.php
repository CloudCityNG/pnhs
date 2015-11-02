<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(!isset($_SESSION['username'])){
	header("location: ../restrict.php");
}
?> 
<?php 
include "../actions/user_priviledges.php";
$developer= is_privileged($_SESSION['account_no'], 1);
$registrar= is_privileged($_SESSION['account_no'], 13);
$reg_admin= is_privileged($_SESSION['account_no'], 5);
$super_admin= is_privileged($_SESSION['account_no'], 2);

if(!$developer && !$reg_admin && !$super_admin)
{
	header("Location: ../restrict.php");
	}

 ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
.style1 {
	font-size: 24px
}
.style2 {color: #FFFFFF}
.style3 {color: #000000}
.style4 {font-size: 14px}
-->
</style>


<style type="text/css">
 #body {
	margin: 0;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 20px;
}
</style>
</head>
<?php 
	$sch_yr=$_GET['sy_id']; 
	$start=$_GET['start'];
	$end=$_GET['end'];
			  
?>
<body>
<div style="width:100%;" id="body">
  <div id="header">
  <h2 align="center" style="font-size:25px">Pag-asa National High School</h2>
  <h3 align="center" style="font-size:20px">LIST OF STUDENTS S.Y. <?php echo "".$start."-".$end."" ?></h3>
  </div>
  <div id="content">
    <table width="90%" align="center">

      <tr>
        <td style="background-color:#999999"></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <td>
        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <br />
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT ID</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
        <?php 
					include('../db/db.php');
						
						
						$query_reg=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.school_yr=$sch_yr AND student_t.student_id=student_registration_t.student_id");
						$count=mysql_num_rows($query_reg);
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

								?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $stud_id; ?></td>
                            <td><?php echo strtoupper("".$row_reg['l_name']." , ".$row_reg['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_reg['m_name']."") ?></td>
                            
                        </tr>

					
				<?php	
					}
				?>
	 

        </table>
	<p style="font-size:18px"><strong>Total Number of Students: <?php echo $count; ?></strong></p>

        </table>
        </td>
      </tr>
      <td align="center"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></td>
    </table>
    


    <br>
    <br>
  
  </div>
</div>
</body>
</html>