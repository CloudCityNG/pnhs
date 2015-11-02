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
<title>Untitled Document</title>
</head>

<body>
  <p>
    
    <div class="span9 span-fixed-sidebar">
      <div class="hero-unit">

      <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #B1F3B4}
-->
      </style> 
 <input name="print" type="button" value="Print" id="printButton" onClick="printpage()" class="btn" >
<h5 align="right" class="style16">Form 138</h5>
<h4 align="center" class="style16">Republic of the Philippines <br /> Department of Education <br /> City Schools Division of Legazpi<br />PAG-ASA NATIONAL HIGH SCHOOL </h4>
<h4 align="center" class="style16">Rawis, Legazpi, Albay</h4>
<h2 align="center" class="style16">Report Card</h2>
<p>

<?php
    require "../db/db.php";
	$student_id=$_GET['student_id'];
	
	
	$query1=mysql_query("SELECT * FROM student_t WHERE student_id='$student_id'") or die("Hello");
	 $row1= mysql_fetch_assoc($query1);
	 $stud_name=$row1['l_name'];
	 
	 $query3=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$student_id'") or die("error");
					$stud3=mysql_fetch_assoc($query3);
					$yr_lvl3=$stud3['year_level'];
					$sec_id=$stud3['section_id'];
					
					$query4=mysql_query("SELECT * FROM year_level_t WHERE year_lvl='$yr_lvl3'") or die("error");
					$yrlvl=mysql_fetch_assoc($query4);
					$lvlname=$yrlvl['lvl_name'];
					
					$query5=mysql_query("SELECT * FROM section_t WHERE section_id='$sec_id'");
					$section=mysql_fetch_assoc($query5);
					$sectionname=$section['section_name'];
					
					
					
	 ?>
	  
	   <tr>
						      <tr>
                             <td> <div align='center'>Name: <?php echo $stud_name; ?><?php echo ',&nbsp;'?><?php echo $row1['f_name']; ?> <?php echo $row1['m_name']; ?></div></td>
						      
                              <td><div align='center'>Year Level: <?php echo $lvlname; ?></div></td>
                              <td><div align='center'>Section: <?php echo $sectionname;?></div></td>
							  </tr>"


<div align="right">
    <table width="843" height="40" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="10"><form action="" method="post" name="search" >
          <div align="right"></div>
          </form>          </td>
          <td width="833">&nbsp;</td>
      </tr>
    </table>
    <center class="style2">
      <table width="1032" height="100" border="1"  class="table table-hover">
<thead bgcolor='#333333'>
           <tr>
             <th width="159" height="45"><div align="center" class="style4"><span class="style16 style11">Subject</span></div></th>
             <th width="142"><div align="center" class="style4"><span class="style16 style11">First Grading Period</span></div></th>
             <th width="143"><div align="center" class="style4"><span class="style16 style11">Second Grading Period</span></div></th>
             <th width="145"><div align="center" class="style4"><span class="style16 style11">Third Grading Period</span></div></th>
             <th width="147"><div align="center" class="style4"><span class="style16 style11">Fourth Grading Period</span></div></th>
	         <th width="125"><div align="center" class="style4"><span class="style16 style11">Final Grade</span></div></th>
             <th width="125"><div align="center" class="style4"><span class="style16 style11">Remark</span></div></th>
        </tr>
		</thead>
        
        <tbody class="style17">
				<?php
                    require("../db/db.php");
					
					$query=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$student_id'") or die("error");
					$stud=mysql_fetch_assoc($query);
					$yr_lvl=$stud['year_level'];
					
					$query2 = mysql_query("SELECT * FROM subject_t WHERE year_level='$yr_lvl'  ") or die("error");
				   while($row2 = mysql_fetch_assoc($query2)) {
					    $sub_title = $row2['subject_title'];
						
						

					 
						
						
					?>	
					<tr>
			          <td height="47"><div align='center'><?php echo $sub_title; ?></div></td>
				      <td><div align='center'></div></td>
                               <td><div align='center'></div></td>
                               <td><div align='center'></div></td>
                               <td><div align='center'></div></td>
                               <td><div align='center'></div></td>
                               <td><div align='center'></div></td>
                                                            
							  
							  

</tbody>

                <?php } ?>
      </table>
      <table width="1032" height="53" border="1"  class="table table-hover">
       
        <tr>
          <td width="160"><div align="center">Average</div></td>
          <td width="141"></td>
          <td width="144"></td>
          <td width="144"></td>
          <td width="149">&nbsp;</td>
          <td width="125"></td>
          <td width="123"></td>
        </tr>
        
      </table>
      
         
      
  </center>
  </p>
</div>
<p>&nbsp;  </p>
 </form>
 
 <div align="center">
     <p>Prepared by:     </p>
     <p>&nbsp;</p>
   <p><b> FIONA LLANETA</b><br />Secondary School Principal III</p>
   <p>&nbsp;</p>
</div>
</body>
</html>
