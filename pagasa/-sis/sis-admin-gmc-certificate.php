<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
?>
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Certification of Good Moral Character</title>
</head>

<body>
<a onclick="window.history.back()"><button>Back</button></a>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

  <div id="container" align="center">
      <div id="header">
		<img src="../images/banner.jpg" width="100%" />
      </div>



<div style="margin:70px 70px 70px 70px; width:750;">
<p align="center"><font face="Georgia, Times New Roman, Times, serif"><h2>
CERTIRFICATE OF GOOD MORAL CHARACTER
</h2>
</font>
</p>
</div>
<br />
<br />
<br />

<div style="margin:70px 70px 70px 70px; width:750;">
                            
<p align="justify"><font face="Georgia, Times New Roman, Times, serif">&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that
<?php
	   include('../db/db.php');
	   if(isset($_GET['student_id'])){
		   $student_id = $_GET['student_id'];

	   $queryname = mysql_query("SELECT * FROM student_t WHERE student_id = '$student_id'");
	   $getname = mysql_fetch_assoc($queryname);
	   echo $getname['l_name'].",&nbsp;".$getname['f_name']."&nbsp;".$getname['m_name'];
	  
 ?>
 has no derrogatory records during his or her stay in this school. Given this <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?> for official records and reference purposes.
                            </font>
                            <?php
	   }
	   ?>
                            </p>
                            </div>
                   

<br />
<br />
<br />
<br />
<br />
<br />
<br />

<p align="center"><font face="Georgia, Times New Roman, Times, serif">Approved by:<br /><br /><br />Ricardo Ll. Llaneta, Ph.D<br />Principal III<br /></font></p>




</body>
</html>