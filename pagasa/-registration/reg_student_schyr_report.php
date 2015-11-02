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

<body>
<div style="width:100%;" id="body">
  <div id="header">
  <h2 align="center" style="font-size:25px">Pag-asa National High School</h2>
  <h3 align="center" style="font-size:20px">List of Students Enrolled in a School Year </h3>
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
        <br>
        <br />
        <br />
        
        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>YEAR</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>NUMBER OF STUDENTS</strong></td>
        </tr>
        <?php 
			include("../db/db.php");
			$query_schoolyear=mysql_query("SELECT * FROM school_year_t");
			while($row_schoolyr=mysql_fetch_assoc($query_schoolyear)){
			$sy_id=$row_schoolyr['sy_id'];
			$sy_start=$row_schoolyr['sy_start'];
			$sy_end=$row_schoolyr['sy_end'];
			
			
			$query_yr=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sy_id");
			$count_yr=mysql_num_rows($query_yr);
			
						?>
  
			 <tr class="del<?php echo $id ?>">
						 <td align="center"><?php echo "".$sy_start."-".$sy_end.""; ?></td>
						 <td align="center"><?php echo $count_yr; ?></td>
            
              </tr>
             <?php } ?>
        </table>
        </td>
      </tr>
      <td align="center"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></td>
    </table>

  </div>
</div>
</body>
</html>