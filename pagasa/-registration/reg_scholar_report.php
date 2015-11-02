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

  <link href="../css/bootstrap.css" rel="stylesheet" />
    
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />        
    
   	<link href="../js/plugins/msgGrowl/css/msgGrowl.css" rel="stylesheet" />
	<link href="../js/plugins/lightbox/themes/evolution-dark/jquery.lightbox.css" rel="stylesheet" />	
	<link href="../js/plugins/msgbox/jquery.msgbox.css" rel="stylesheet" />	

  <link href="../css/custom.css" rel="stylesheet" />


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

<body style="background-color:#FFFFFF;line-height: 20px;">
<div style="width:100%;" id="body">
  <div id="header">
  <h2 align="center" style="font-size:25px">Pag-asa National High School</h2>
  <h3 align="center" style="font-size:20px">LIST OF SCHOLARS </h3>
  </div>
  <div id="content">
    <table width="90%" align="center">
      <tr>
        <td style="background-color:#999999"></td>
      </tr>
      <tr>
        <td>
   			<?php 	
			$name=$_GET['name'];
 			?>
        <table cellspacing="0px" border="1" style="border: thin" width="1000px" align="center">
        <tr><td colspan="2" style="border:0;"><strong><?php echo $name; ?></strong></td></tr>
        <tr>
                <td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT ID</strong></td>
        		<td style="background-color:#999999; line-height:40px" align="center"> <strong>STUDENT NAME</strong></td>
        </tr>
        <?php
          	require_once "../db/db.php";
				$id=$_GET['id'];
		  		$query_stud=mysql_query("SELECT * FROM student_t WHERE scholarship=$id");
				while($row_stud=mysql_fetch_assoc($query_stud)){
					$student_id=$row_stud['student_id'];
				

						?>
              
			 <tr class="del<?php echo $id ?>" >
                            <td style="font-size:18px" align="center"><?php echo $student_id; ?></td>
                            <td style="font-size:18px"><?php echo strtoupper("".$row_stud['l_name']." , ".$row_stud['f_name'].""); ?>
                            	<?php echo ucfirst("".$row_stud['m_name']."") ?></td>
            
              </tr>
		<?php 
		echo "<br>";
		}
	  ?>

        </table>
        
        </td>
      </tr>
      <td align="center">
      <a class="btn btn-mini" href="fpdf/reg_scholars_pdf.php?id=<?php echo $id; ?>&&name=<?php echo $name; ?>">Save as PDF</a>
      <input name="print" type="button" value="Print" id="printButton" onClick="printpage()"></td>
    </table>

  </div>
</div>
</body>
</html>