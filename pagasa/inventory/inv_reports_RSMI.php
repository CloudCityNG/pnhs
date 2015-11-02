<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include "../db/db.php";
error_reporting(0);
if ($_POST['rsmi']){

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
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style8 {
	font-size: 12px;
	font-style: italic;
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

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
        <tr>
          <td height="20" align="center"><p class="style1">REPORT OF SUPPLIES AND MATERIALS ISSUED
          <p><em>
          <strong>Pag-asa National High School</strong></em></p>          </td>
        </tr>

        <tr>
          <td height="10"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
              
                <td width="15%"><strong>DATE: From</strong></td>
                <td width="15%">&nbsp;<?php echo $from_date; ?></td>
                <td width="5%"><strong>To</strong></td>
                <td width="65%">&nbsp;<?php echo $to_date; ?></td>
            </tr>
              
          </table></td>
        </tr>

        <tr>
          <td><table width="100%"  border="1" cellspacing="0" cellpadding="0">

              <tr>
                <td width="70%" colspan="6" align="center"><em>
                To be filled up in the Supply and Property Unit</em></td>
                <td width="30%" colspan="4" align="center"><span class="style8">
                To be filled up in the Accounting Unit</span></td>
            </tr>

              <tr>
                <td width="116"><div align="center"><strong>RIS No.</strong></div></td>
      			<td width="168"><div align="center"><strong>
   			    Responsiblity<br />
   			    Center Code
   			  </strong></div></td>
  			    <td width="116"><div align="center"><strong>Stock No.</strong></div></td>
   			    <td width="200"><div align="center"><strong>ITEM</strong></div></td>
   			    <td width="111"><div align="center"><strong>Unit</strong></div></td>
   			    <td width="103"><div align="center"><strong>Qty Issued</strong></div></td>
   			    <td colspan="2"><div align="center"><strong>Unit Cost</strong></div></td>
   			    <td colspan="2"><div align="center"><strong>Amount</strong></div></td>
            </tr>

			  <tbody>
    			<?php
					include '../db/db.php';
    				$sql = mysql_query("SELECT *
							FROM inventory_stock_t, supply_category_t, inventory_item_t, unit_t, supply_record_t
							WHERE inventory_stock_t.unit_no = unit_t.unit_no
							AND inventory_stock_t.detail_no = supply_category_t.detail_no
							AND supply_category_t.item_no = inventory_item_t.item_no
							AND supply_record_t.stock_no = inventory_stock_t.stock_no
							AND supply_record_t.date_recorded BETWEEN '$from_date' AND '$to_date'");
					if (mysql_num_rows($sql) > 0){
					while($row=mysql_fetch_array($sql)){ 
    			?>
    
   	 			<tr class="del">
                        <td><?php echo ucfirst($row['ris_no']); ?></td>
                        <td><?php echo ucfirst($row['rcc']); ?></td>
                        <td><div align="center"><?php echo ucfirst($row['stock_no']); ?></div></td>
                        <td><?php echo ucfirst($row['description'])." ".ucfirst($row['category'])." ".ucfirst($row['item_name']); ?></td>
                        <td><?php echo ucfirst($row['unit_type']); ?></td>
                    	<td><?php echo ucfirst($row['quantity']); ?></td>
                        <td width="122"> </td>
                  		<td width="104"> </td>
                        <td width="90"> </td>
                        <td width="90"> </td>
             	</tr>
             	<?php } }
				else {
					echo "<tr> <td colspan='9' align='center'><br> NO TRANSACTION ON THAT DATE! </td </tr>";
				} ?>
    			</tbody>
          </table></td>
        </tr>

        <tr>
          <td align="center">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <strong>
            <?php 
			include ("../db/db.php");
			$so = mysql_query("SELECT * FROM employee_t, account_t, employee_account_t, account_permission_t, account_privilege_t
								WHERE employee_t.emp_id = employee_account_t.emp_id
								AND employee_account_t.account_no = account_t.account_no
								AND account_t.account_no = account_permission_t.account_no
								AND account_privilege_t.privilege_id = account_permission_t.privilege_id
								AND account_privilege_t.privilege_name = 'supply_officer'");
								$res = mysql_fetch_assoc($so);
								echo strtoupper($res['f_name']." ".$res['m_name']." ".$res['l_name']);
			?>
            </strong><br>
            Supply Officer
          </p></td>
        </tr>
    </table>
   </td>
  </tr>
</table>

</div>
</body>
</html>
<?php } ?>