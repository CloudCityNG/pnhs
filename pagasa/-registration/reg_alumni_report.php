<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<?php 
					include('../db/db.php');
					
					$query_schyr=mysql_query("SELECT * FROM school_year_t");
								$count=mysql_num_rows($query_schyr);
								$count=$count-2;
								$query_prev=mysql_query("SELECT * FROM school_year_t LIMIT $count,1");
								$row_prev=mysql_fetch_assoc($query_prev);
								$sch_yr=$row_prev['sy_id'];					
					?>

<div style="width:100%;" id="body">
  <div id="header">
  <h2 align="center" style="font-size:25px">Pag-asa National High School</h2>
  <h3 align="center" style="font-size:20px">Graduated Students in year  <?php echo "".$row_prev['sy_start']."-".$row_prev['sy_end'].""; ?> </h3>
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
        <p>&nbsp;</p>
        <p>&nbsp;</p>
     <p style="font-size:18px">Male</p>
              		
        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong></strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
        <?php
          	require_once "../db/db.php";
			
						$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr AND year_level=6");
						$countt=1;
						$count++;
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$stud_id' AND gender='Male'");
								while($row_stud=mysql_fetch_assoc($query_stud)){
							
							
						?>
              
			 <tr class="del<?php echo $id1 ?>">
             				<td><?php echo $countt; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
            
              </tr>
		
		<?php
					}
				}
	  ?>

        </table>
        
      
        <br />
        <br />
        <p style="font-size:18px">Female</p>

        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong></strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
        <?php
          	require_once "../db/db.php";
			
						$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr AND year_level=6");
						$countt1=1;
						$countt1++;
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$stud_id' AND gender='Female'");
								while($row_stud=mysql_fetch_assoc($query_stud)){
						?>
              
			 <tr class="del<?php echo $id1 ?>">
             				<td><?php echo $countt1; ?></td>
                            <td><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
            
              </tr>
		<?php
					}
				}
	  ?>

        </table>
        </td>
      </tr>
      <td align="center"><input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></td>
    </table>

  </div>
</div>
</body>
</html>