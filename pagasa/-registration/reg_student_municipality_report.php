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
  <h3 align="center" style="font-size:20px">Percentage of Student per Municipality </h3>
  </div>
  <div id="content">
    <table width="70%" align="center">
      <tr>
        <td style="background-color:#999999"></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <td>
        <table cellspacing="0px" border="1" style="border: thin" width="500px" align="center">
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>MUNICIPALITY</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>NUMBER OF STUDENTS</strong></td>
        </tr>
        <?php
          	require_once "../db/db.php"; 
			$query_municipality=mysql_query("SELECT * FROM municipality_t");
			while($row_municipality=mysql_fetch_assoc($query_municipality)){
					$name=$row_municipality['municipality_name'];
								
					$count_name=0;
					$query_name=mysql_query("SELECT * from student_t WHERE city_municipality like '%$name%'");
						while($row_name=mysql_fetch_assoc($query_name)){ 
							$count_name=mysql_num_rows($query_name);
		}
				?>
  
			 <tr class="del<?php echo $id ?>">
						  <td align="center"><?php echo $name; ?></td>
						  <td align="center"><?php echo $count_name; ?> -
                           <?php 
											$query_student=mysql_query("SELECT * FROM student_t");
											$count_student=mysql_num_rows($query_student);
											$percent=($count_name/$count_student)*100;
											printf("%.2f%%", $percent);
										?></td>
            
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