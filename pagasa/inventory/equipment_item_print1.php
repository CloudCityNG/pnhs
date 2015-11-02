<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include "../db/db.php";
error_reporting(0);
if ($_POST['submit']){

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];

?>
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
    <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
    <div class="span9 span-fixed-sidebar">
      <div class="hero-unit">

      <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #B1F3B4}
-->
      </style> 
<h4 align="center" class="style16">Pag-Asa National High School</h4>
<h5 align="center" class="style16">Rawis, Legazpi, Albay</h5>
<h1 align="center" class="style16">Equipment Inventory</h1>
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
      <table width="994" height="93" border="1" bordercolor="#FFFFFF" class="table table-hover">
		<thead bgcolor="#006666">
           <tr>
             <th><div align="center" class="style4"><span class="style16 style11">Stock No.</span></div></th>
               <th><div align="center" class="style4"><span class="style16 style11">Category</span></div></th>
	         <th><div align="center" class="style4"><span class="style16 style11">Unit</span></div></th>
              <th><div align="center" class="style4"><span class="style16 style11">Amount</span></div></th>
              <th><div align="center" class="style4"><span class="style16 style11">Quantity</span></div></th>
              <th><div align="center" class="style4"><span class="style16 style11">Status</span></div></th>
	         <th><div align="center" class="style4"><span class="style16 style11">Life Span</span></div></th>
              <th><div align="center" class="style4"><span class="style16 style11">Date Delivered</span></div></th>
          </tr>
		</thead>
        
        <tbody bgcolor="#D9FFD9" class="style17">
				<?php
                    require("../db/db.php");
					mysql_query("START Transaction");
					mysql_query("Auto-Commit = 'OFF'");
					$query = mysql_query("SELECT * FROM equipment_record_t WHERE equipment_record_t.date_delivered BETWEEN '$from_date' AND '$to_date'");
				    while($row = mysql_fetch_assoc($query)){
					    $stock_no = $row['stock_no'];
						$unit=$row['unit'];
					  	$query5 =mysql_fetch_array( mysql_query("SELECT * FROM equipment_item_t WHERE stock_no='$stock_no'"));
				        $em_id = $query5['item_id'];
						$category_id = $query5['category_id'];
					      
						$query1 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_category_t WHERE category_id='$category_id'"));
				  		$item_name=$query1['item_name'];
						
						 $query3 = mysql_query("SELECT * FROM employee_t WHERE position='supply officer'");
					    $row3 = mysql_fetch_assoc($query3);
						
						 $query4 =mysql_fetch_array(mysql_query("SELECT * FROM unit_t WHERE unit_no='$unit'"));
				   		
					    $unit_type = $query4['unit_type'];
						$unit_no = $query4['unit_no'];
						
						$date=$row["date_delivered"];
						$date_del = mysql_query("SELECT Year(date_delivered) As Year FROM equipment_record_t WHERE stock_no = '$stock_no'");
						$r_date = mysql_fetch_assoc($date_del);
						date('Y');
						mysql_query("Commit");

						?>
						<tr>
						      <td  align="center" width="50"><?php echo "$stock_no"; ?></td>
                            <td align="center"><?php echo "$item_name"; ?></td>	
                            <td align="center"><?php echo "$unit_type"; ?></td>
                             <td align="center"><?php echo ucfirst($row["amount"]); ?></td>	
                            <td align="center"><?php echo ucfirst($row["quantity"]); ?></td>
                             <td align="center"><?php if(date('Y') <= ($row["life_span"]+$date)){ echo "Useful";} else {echo "Depreciated"; }?> </td>	
                             <td align="center"><?php echo ucfirst($row["life_span"]); ?></td>	
                            <td align="center"><?php echo ucfirst($date); ?></td>
					   </tr>
							 <?php
	}
				?>
                </tbody>
                </table>
        </center>
  </p>
</div>
<p>&nbsp;  </p>
 </form>
 <div align="center">
     <p>&nbsp;</p>
     <p>Prepared by:</p>
     <p>&nbsp;     </p>
   <p><?php 
			include ("../db/db.php");
			$so = mysql_query("SELECT * FROM employee_t, account_t, employee_account_t, account_permission_t, account_privilege_t
								WHERE employee_t.emp_id = employee_account_t.emp_id
								AND employee_account_t.account_no = account_t.account_no
								AND account_t.account_no = account_permission_t.account_no
								AND account_privilege_t.privilege_id = account_permission_t.privilege_id
								AND account_privilege_t.privilege_name = 'supply_officer'");
								$res = mysql_fetch_assoc($so);
								echo strtoupper($res['f_name']." ".$res['m_name']." ".$res['l_name']);
			?></p>
   <p> Supply Officer</p>
   <p>&nbsp;</p>
</div>
</body>
</html>
<?php } ?>