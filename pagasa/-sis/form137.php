<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
{
header("location: ../restrict.php");
}
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
<title>Untitled Document</title>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

<?php
require('../db/db.php');

if(isset($_GET['student_id'])){
	$student_id = $_GET['student_id'];
	
	$querystud = mysql_query("SELECT * FROM student_t WHERE student_id = '$student_id'");
	$getstud = mysql_fetch_assoc($querystud);
	$fname = $getstud['f_name'];
	$mname = $getstud['m_name'];
	$lname = $getstud['l_name'];
	$province  = $getstud['province'];
	$city_municipality = $getstud['city_municipality'];
	$parent = $getstud['name_of_parent_guardian'];
	$school = $getstud['name_of_last_school_attended'];
	
	
?>
<p align="left">DepEd Form 137-A</p>
<p align="center">&nbsp;</p>
<p align="center"> <img src="../images/pnhs_logo.png" width="106" height="99" alt="de" /> </p>
<p align="center">Republic of the Phillippines </p>
<p align="center">DEPARTMENT OF EDUCATION</p>
<p align="center">Region V</p>
<p align="center">Pag-asa National High School</p>
<p align="center">Legazpi City</p>
<p align="center">&nbsp;</p>
<p align="center"><strong>SECONDARY STUDENT'S PERMANENT RECORD</strong></p>
<p align="center">&nbsp;</p>
<p align="center"><?php__________________________________________ Date of Birth: Year ______ Month _____________ Day ______ Sex ________</p>
<p align="center"> (Surname) (Given Name)</p>
<p align="center">Place of Birth: Province _____________________ Town ________________________ Barrio _____________________________</p>
<p align="center">Parent or Guardian: _________________________________________________________________________________________</p>
<p align="center">(Name)	(Address)(Occupation)</p>
<p align="center">Elementary course completed ______________ School _______________________________ Year _______ Gen.Ave __________</p>
<p align="center">&nbsp;</p>
<p align="center"><strong>RECORD OF STANDARD INTELLIGENCE AND ACHIEVEMENT TEST</strong></p>
  

<div align="center">
  <table width="887" border="1">
    <tr>
      <td width="248" height="70"><div align="center">Name and Form of Test</div></td>
      <td width="80" bordercolor="#F0F0F0"><p align="center">Score</p>
      <p align="center">Received</p></td>
      <td width="80"><p align="center">Percentile</p>
      <p align="center">Rank </p></td>
      <td width="269"><div align="center">Name and Form of Test</div></td>
      <td width="86"><p align="center">Score</p>
      <p align="center">Received</p></td>
      <td width="84"><p align="center">Percentile</p>
      <p align="center">Rank </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p align="center">School___________________________________________________Year_________________Section______________</p>
<p align="center">Total number of years in school to date___________________________________________School Year 20____- 20____</p>
  

<div align="center">
  <table width="886" border="1">
    <tr>
      <td width="253" height="58" rowspan="2"><div align="center"><strong>SUBJECT</strong></div></td>
      <td colspan="4"><p align="center"><strong>PERIODICAL RATING</strong></p>
      <p align="center"><strong>Averaging/Cumulative</strong></p></td>
      <td width="80" rowspan="2"><p><strong>Final</strong></p>
      <p><strong>Rating</strong></p></td>
      <td width="82" rowspan="2"><p><strong>Action</strong></p>
      <p><strong>Taken</strong></p></td>
      <td width="83" rowspan="2"><p><strong>Units </strong></p>
      <p><strong>Earned</strong></p></td>
      <td width="89" rowspan="2"><p><strong>Extra-</strong></p>
        <p><strong>Curricular</strong></p>
      <p><strong>Activities</strong></p></td>
    </tr>
    <tr>
      <td height="43"><strong>1</strong></td>
      <td><strong>2</strong></td>
      <td><strong>3</strong></td>
      <td><strong>4</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="61">&nbsp;</td>
      <td width="62">&nbsp;</td>
      <td width="65">&nbsp;</td>
      <td width="53">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <table width="885" border="1">
    <tr>
      <td width="184" height="30">&nbsp;</td>
      <td width="42">June</td>
      <td width="43">July</td>
      <td width="45">Aug</td>
      <td width="48">Sept</td>
      <td width="45">Oct</td>
      <td width="44">Nov</td>
      <td width="44">Dec</td>
      <td width="42">Jan</td>
      <td width="44">Feb</td>
      <td width="40">Mar</td>
      <td width="45">April</td>
      <td width="45">May</td>
      <td width="86"><div align="center"><strong>TOTAL</strong></div></td>
    </tr>
    <tr>
      <td><div align="center">Days of School</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">Days Present</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p align="center">Has Advance Units in ______________________________________________________________________________________</p>
<p align="center">Lacks Units in ____________________________________________________________________________________________</p>
<p align="center">To be Classified as ___________________________________________ Total number of years in School to date ____________ (Cur. Year)</p>
<div align="center">
  <table width="886" border="1">
    <tr>
      <td width="253" height="58" rowspan="2"><div align="center"><strong>SUBJECT</strong></div></td>
      <td colspan="4"><p align="center"><strong>PERIODICAL RATING</strong></p>
          <p align="center"><strong>Averaging/Cumulative</strong></p></td>
      <td width="80" rowspan="2"><p><strong>Final</strong></p>
          <p><strong>Rating</strong></p></td>
      <td width="82" rowspan="2"><p><strong>Action</strong></p>
          <p><strong>Taken</strong></p></td>
      <td width="83" rowspan="2"><p><strong>Units </strong></p>
          <p><strong>Earned</strong></p></td>
      <td width="89" rowspan="2"><p><strong>Extra-</strong></p>
          <p><strong>Curricular</strong></p>
        <p><strong>Activities</strong></p></td>
    </tr>
    <tr>
      <td height="43"><strong>1</strong></td>
      <td><strong>2</strong></td>
      <td><strong>3</strong></td>
      <td><strong>4</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="61">&nbsp;</td>
      <td width="62">&nbsp;</td>
      <td width="65">&nbsp;</td>
      <td width="53">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p align="center">&nbsp;</p>
<div align="center"></div>
<p align="center">Has Advance Units in ______________________________________________________________________________________</p>
<p align="center">Lacks Units in ____________________________________________________________________________________________</p>
<p align="center">To be Classified as ___________________________________________ Total number of years in School to date ____________ (Cur. Year)</p>
<div align="center">
  <table width="886" border="1">
    <tr>
      <td width="253" height="58" rowspan="2"><div align="center"><strong>SUBJECT</strong></div></td>
      <td colspan="4"><p align="center"><strong>PERIODICAL RATING</strong></p>
          <p align="center"><strong>Averaging/Cumulative</strong></p></td>
      <td width="80" rowspan="2"><p><strong>Final</strong></p>
          <p><strong>Rating</strong></p></td>
      <td width="82" rowspan="2"><p><strong>Action</strong></p>
          <p><strong>Taken</strong></p></td>
      <td width="83" rowspan="2"><p><strong>Units </strong></p>
          <p><strong>Earned</strong></p></td>
      <td width="89" rowspan="2"><p><strong>Extra-</strong></p>
          <p><strong>Curricular</strong></p>
        <p><strong>Activities</strong></p></td>
    </tr>
    <tr>
      <td height="43"><strong>1</strong></td>
      <td><strong>2</strong></td>
      <td><strong>3</strong></td>
      <td><strong>4</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="61">&nbsp;</td>
      <td width="62">&nbsp;</td>
      <td width="65">&nbsp;</td>
      <td width="53">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<div align="center">Has Advance Units in ______________________________________________________________________________________</div>
<p align="center">Lacks Units in ____________________________________________________________________________________________</p>
<p align="center">To be Classified as ___________________________________________ Total number of years in School to date ____________ (Cur. Year)</p>
<div align="center">
  <table width="886" border="1">
    <tr>
      <td width="253" height="58" rowspan="2"><div align="center"><strong>SUBJECT</strong></div></td>
      <td colspan="4"><p align="center"><strong>PERIODICAL RATING</strong></p>
          <p align="center"><strong>Averaging/Cumulative</strong></p></td>
      <td width="80" rowspan="2"><p><strong>Final</strong></p>
          <p><strong>Rating</strong></p></td>
      <td width="82" rowspan="2"><p><strong>Action</strong></p>
          <p><strong>Taken</strong></p></td>
      <td width="83" rowspan="2"><p><strong>Units </strong></p>
          <p><strong>Earned</strong></p></td>
      <td width="89" rowspan="2"><p><strong>Extra-</strong></p>
          <p><strong>Curricular</strong></p>
        <p><strong>Activities</strong></p></td>
    </tr>
    <tr>
      <td height="43"><strong>1</strong></td>
      <td><strong>2</strong></td>
      <td><strong>3</strong></td>
      <td><strong>4</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="61">&nbsp;</td>
      <td width="62">&nbsp;</td>
      <td width="65">&nbsp;</td>
      <td width="53">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
<p align="center">&nbsp;</p>
<div align="center"></div>
<p align="center">Has Advance Units in ______________________________________________________________________________________</p>
<p align="center">Lacks Units in ____________________________________________________________________________________________</p>
<p align="center">To be Classified as ___________________________________________ Total number of years in School to date ____________ (Cur. Year)</p>
<p align="center">&nbsp;</p>
<p align="center">------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<p align="center">&nbsp;</p>
<div> 
  <div align="center">
    <p><strong> CERTIFICATE OF TRANSFER</strong></p>
    <p>&nbsp;</p>
  </div>
</div>
<div>
  <div align="center"><strong>To Whom It May Concern:</strong></div>
</div>
<div> 
  <p align="center">	I certify that thus us a true record of ________________________________, this student is eligible, on this __________</p>
  <p align="center"> day  of ______________________,  20_____,  for  admission  to  the  _______________  year  as  a regular/an Irregular and had </p>
  <p align="center">no money or property responsibility in thiss school. </p>
  <p align="center">Remarks__________________________________________________________________________________  </p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center"> ___________________</p>
  <p align="center"> (Principal)</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <div>  </div>
  <p align="center">&nbsp;</p>
</div>
<?php
}
?>
</body>
</html>