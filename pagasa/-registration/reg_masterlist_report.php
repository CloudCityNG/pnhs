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
require_once "../db/db.php";
 if(isset($_GET['section_id'])){
	          $sec_id = $_GET['section_id'];  
		  	}
	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$sec_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];
			 ?>
<body>
<div style="width:100%;" id="body">
  <div id="header">
  <h2 align="center" style="font-size:25px">Pag-asa National High School</h2>
  <h3 align="center" style="font-size:20px">MASTERLIST - <?php echo $sec; ?></h3>
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
     <p style="font-size:18px">Male</p>

        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT ID</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
        <?php
          	require_once "../db/db.php";
		  
		  	$query_sy=mysql_query("SELECT * FROM school_year_t");
			while($row_sy=mysql_fetch_array($query_sy)){
			$sch_yr=$row_sy['sy_id']; }
			

					include('../db/db.php');

						$query_reg2=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.student_id=student_t.student_id AND student_registration_t.section_id=$sec_id AND student_registration_t.school_yr=$sch_yr AND student_t.gender='Male'");
						$count=mysql_num_rows($query_reg2);
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];

								?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row_reg2['l_name']." , ".$row_reg2['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_reg2['m_name']."") ?></td>
                            
                        </tr>

				
				<?php 
				}?>
        </table>
        <p style="font-size:18px"><strong>Male: <?php echo $count; ?></strong></p>
        
      
        <br />
        <br />
        <p style="font-size:18px">Female</p>

        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT ID</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
         <?php 
					include('../db/db.php');

						$query_reg=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.student_id=student_t.student_id AND student_registration_t.section_id=$sec_id AND student_registration_t.school_yr=$sch_yr AND student_t.gender='Female'");
						$count1=mysql_num_rows($query_reg);
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$id=$row_reg['student_id'];

								?>
                            
					    <tr class="del<?php echo $id ?>">
                            <td><?php echo $id; ?></td>
                            <td><?php echo strtoupper("".$row_reg['l_name']." , ".$row_reg['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_reg['m_name']."") ?></td>
                            
                        </tr>

				
				<?php 
				}?>
        </table>
        <p style="font-size:18px"><strong>Female: <?php echo $count1; ?></strong></p>
<?php $total=$count+$count1; ?>
     <p><strong>Total Number of Students: <?php echo $total; ?></strong></p>
        </td>
      </tr>
      <td align="center"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></td>
    </table>
    


    <br>
    <br>
    <table align="center">
    <tr>
    <td>
    <p align="right"><?php $query_adviser=mysql_query("SELECT * FROM section_t WHERE section_id=$sec_id"); 
						$row_adviser=mysql_fetch_assoc($query_adviser);
						$adviser_id=$row_adviser['class_adviser_id'];
					$query_employee=mysql_query("SELECT * FROM employee_t WHERE emp_id=$adviser_id");
						$row_employee=mysql_fetch_assoc($query_employee);
						$fname=$row_employee['f_name'];
						$lname=$row_employee['l_name'];
				echo "".ucfirst($fname)." ".ucfirst($lname).""; ?></p>
                <p align="center">Class Adviser</p>
	</td>
    </tr>
    </table>
  </div>
</div>
</body>
</html>