<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:#FFF">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Teaching Document</title>

<link type="text/css" rel="stylesheet" href="../css/bootstrap1.css"  />
</head>

<body style="background-color:#FFF">
<div style="width:95%; margin:10px auto;">
  <div id="header" style="margin-bottom:20px; height:100px; overflow:hidden;">
    <img style=" display:inline-block" src="../images/pnhs_logo.png" align="top" >
    <div style="display:inline-block;; border:0px solid black; height:100%; width:500px;font-weight:bold; padding-top:20px; padding-left:20px;"><h4>PAGASA NATIONAL HIGH SCHOOL</h4></div>
  </div>
  <div>
    <table width="100%" style="border:1px solid black;">
      
      <tr>
        <td bgcolor="#999999" style="background-color:#999999">List Of All Male Employees</td>
      </tr>
      <tr>
        <td align="center">
        <table cellpadding="0" cellspacing="0" border="0" class=" " id="example" width="100%" style="font-size:14px">
							<thead>
								<tr>
                                <th>Emp ID</th>
								<th>Name</th>
								<th>Gender</th>
								<th>Position</th>
								<th>Type</th>
								 
								  
								</tr>
							</thead>
							<tbody>
						 <?php
							include('../db/db.php');
							 $show_personnel="SELECT * FROM employee_t WHERE gender='Male'";
							 $show_p=mysql_query($show_personnel);
							 while($found=mysql_fetch_assoc($show_p)){					
							 $id=$found['emp_id'];
							 $show_role=mysql_query("SELECT * FROM employee_role_t WHERE emp_id='$id'");
							 
							 while($link=mysql_fetch_assoc($show_role)){
							$role_id=$link['role_id'];
							
							$show_pos=mysql_query("SELECT * from employee_position_t WHERE position_id='$role_id'");
							
							while($found_pos=mysql_fetch_assoc($show_pos)){	 	  
								  ?>
							<tr>
                            	<td class="center"><div align="center"><?php echo $found['emp_id']; ?></div></td>
								<td class="center"><div align="center"><?php echo $found['f_name'].'&nbsp;'.$found['l_name'].'&nbsp;'.$found['name_extension']; ?></div></td>
								<td class="center"><div align="center"><?php echo $found['gender']; ?></div></td>
								<td class="center"><div align="center"><?php echo $found_pos['position_title']; ?></div></td>	
								<td class="center"><div align="center"><?php echo $found_pos['position_type']; ?></div></td>
								
							</tr>
							
						<?php 
							}
							}
							 }
							   ?>		
						</tbody>
						</table>
        </td>
      </tr>
    </table>
    <div id="buttons">
        <input name="back" type="button" value="Back" id="backButton" onclick="goBack()"/>
        <input name="print" type="button" value="Print" id="printButton" onClick="printpage()" />
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
function printpage() {
document.getElementById('buttons').style.visibility="hidden";
window.print();
document.getElementById('buttons').style.visibility="visible";  
}
function goBack(){
	window.close();
}
</script>

</html>