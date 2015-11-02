<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_GET['emp_id'])){
  $emp_id = $_GET['emp_id'];  
}
		  

?>

<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:#FFF">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

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
        <td bgcolor="#999999" style="background-color:#999999">List Of Departments</td>
      </tr>
      <tr>
        <td>
        <table style="width:100%">
        
        <tr>
                <th><div align="center">ID</div></th>
		         <th ><div align="center">Name</div></th>
            	 <th ><div align="center">Description</div></th>
				<th><div align="center">Department Head</div></th>

        </tr>
        <?php 
					include('../db/db.php');
					$query=mysql_query("SELECT * FROM department_t");
                        while($row=mysql_fetch_array($query)){ 
						$id=$row['dept_id']; ?>
                        <tr class="del<?php echo $id ?>">
                            <td align="center" width="40"><div align="center"><?php echo $row['dept_id']; ?></div></td>
                            <td align="center"><?php echo ucfirst($row['dept_name']); ?></td>
                            <td align="center"><?php echo ucfirst($row['dept_description']); ?></td>
                            <td align="center">
							<?php //echo ucfirst($row['dept_head']);
							$que=mysql_query("SELECT * FROM department_t, employee_t
										WHERE department_t.dept_head = employee_t.emp_id AND department_t.dept_id = '$id'");
							$row1=mysql_fetch_array($que);
							echo ucfirst($row1['f_name'])." ".ucfirst($row1['m_name'])." ".ucfirst($row1['l_name']); ?>  </td>
                            
                            <?php } ?>

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
	window.history.go(-1);
}
</script>

</html>