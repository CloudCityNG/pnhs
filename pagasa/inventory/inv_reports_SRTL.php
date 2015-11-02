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
.style5 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
    <div class="hero-unit">

      <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {color: #B1F3B4}
-->
      </style>
<div align="right">

    <table width="100%" border="0" align="center">
  			<tr>
   			  <td width="15%"><img src="../images/pnhs_logo.png" /></td>
                    <td width="85%"><span class="style5">SUPPLIES REPORT OF EMPLOYEE LOGS</span><br />
          			<em><strong>Pag-asa National High School</strong></em><br />
	  		  <em>Rawis, Legazpi City</em></td>
  			</tr>
            <tr>
            	<td colspan="1"></td>
            	<td><strong>From: </strong> &nbsp;<?php echo $from_date; ?> &nbsp; &nbsp; &nbsp;  <strong>To: </strong> &nbsp;<?php echo $to_date; ?></td>
        	</tr> 
	</table>
    
    <center class="style2">
      <table width="100%" height="93" border="1" bordercolor="#FFFFFF" class="table table-hover">
      
      
		<thead bgcolor="#006666">
           <tr>
             <th><div align="center" class="style4">Date</div></th>
             <th><div align="center" class="style4">Employee</div></th>
	         <th><div align="center" class="style4">Stock No.</div></th>
             <th><div align="center" class="style4">Description</div></th>
             <th><div align="center" class="style4">Item</div></th>
	         <th><div align="center" class="style4">Unit Span</div></th>
             <th><div align="center" class="style4">Quantity</div></th>
          </tr>
		</thead>
        
        <tbody bgcolor="#FFFFFF">
				<?php 
					include('../db/db.php');
					
					$query = mysql_query("SELECT *
										FROM inventory_stock_t, supply_category_t, inventory_item_t, unit_t, supply_distribution_t, employee_t, supply_record_t
										WHERE inventory_stock_t.unit_no = unit_t.unit_no
										AND inventory_stock_t.detail_no = supply_category_t.detail_no
										AND supply_category_t.item_no = inventory_item_t.item_no
										AND supply_record_t.stock_no = inventory_stock_t.stock_no
										AND supply_distribution_t.emp_id = employee_t.emp_id
										AND supply_distribution_t.record_id = supply_record_t.record_id
										AND supply_distribution_t.type = 'delivered'
										AND supply_distribution_t.date_recieved BETWEEN '$from_date' AND '$to_date'");
						if (mysql_num_rows($query) > 0){				
                        while($row=mysql_fetch_array($query)){ 
						$sd_id = $row['sd_id'];
						$quantity = mysql_query("SELECT quantity FROM supply_distribution_t WHERE sd_id = '$sd_id'");
						?>
                  		<tr class="del">
                            <td ><?php echo $row['date_recieved']?></td>
                            <td ><?php echo ucfirst($row['f_name'])." ".ucfirst($row['m_name'])." ".ucfirst($row['l_name']); ?></td>
                            <td align="center"><?php echo ucfirst($row['stock_no']); ?></td>
                            <td ><?php echo ucfirst($row['description']); ?></td>
                            <td ><?php echo ucfirst($row['category'])." ".ucfirst($row['item_name']); ?></td>
                    		<td ><?php echo ucfirst($row['unit_type']); ?></td>
                            <td align="center"><?php $row1=mysql_fetch_array($quantity); echo $row1['quantity'];?></td>   
                        </tr>
                        
                        <?php } }
						else {
						echo "<tr> <td colspan='7' align='center'><br> NO TRANSACTION BETWEEN THAT DATE! </td> </tr>";
						} ?>
                </tbody>
                
    	<tfoot bgcolor="#006666">
           <tr>
             <th colspan="9"> </th>
           </tr>
		</tfoot>
        
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
								echo "<strong>".strtoupper($res['f_name']." ".$res['m_name']." ".$res['l_name'])."</strong>";
			?></p>
   <p> Supply Officer</p>
   <p>&nbsp;</p>
</div>
</body>
</html>
<?php } ?>