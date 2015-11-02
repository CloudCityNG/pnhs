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
.style3 {font-size: 24px; font-weight: bold; }
.style5 {color: #FF0000}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
    <div class="hero-unit">
<?php
include "../db/db.php";
error_reporting(0);
if ($_POST['annual_report']){

	$type = $_POST['type'];
	$year = $_POST['sy_id'];
	$yr = mysql_query("SELECT * FROM school_year_t WHERE sy_id = '$year' ");
	$taon = mysql_fetch_array($yr);
	$yr_start = $taon['sy_start'];
	$yr_end = $taon['sy_end'];
	
if ($type=='supplies'){
?>
<table width="100%" border="0" align="center">
  		<tr>
          <td width="15%"><img src="../images/pnhs_logo.png" /></td>
          <td width="85%"><span class="style3">ANNUAL REPORT OF SUPPLIES</span><br />
          			<em><strong>Pag-asa National High School</strong></em><br />
   			  		<em>Rawis, Legazpi City</em><br />
                    <strong>School Year: <?php echo $yr_start." - ".$yr_end;  ?></strong>          </td>
        </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
        <tr>
          <td><table width="100%"  border="1" cellspacing="0" cellpadding="0">

          <tr>
   			    <td><div align="center"><strong>Date</strong></div></td>
   			    <td><div align="center"><strong>Item</strong></div></td>
                <td><div align="center"><strong>Description</strong></div></td>
                <td><div align="center"><strong>Unit</strong></div></td>
                <td><div align="center"><strong>Quantity</strong></div></td>
                <td><div align="center"><strong>Unit Cost</strong></div></td>
                <td><div align="center"><strong>Total Cost</strong></div></td>
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
							AND supply_record_t.sy_id = '$year'");
					
					if (mysql_num_rows($sql) > 0){
					while($row = mysql_fetch_array($sql)){ 
    			?>
   	 			
   	 			<tr class="del">
                        <td><div align="center"><?php echo ucfirst($row['date_recorded']); ?></div></td>
                        <td><?php echo ucfirst($row['item_name']); ?></td>
                        <td><?php echo ucfirst($row['description'])." ".ucfirst($row['category']); ?></td>
                        <td><?php echo ucfirst($row['unit_type']); ?></td>
                    	<td><div align="center"><?php echo ucfirst($row['quantity']); ?></div></td>
                        <td><div align="center"><?php echo number_format($row['unit_amount'], 2, '.', ','); ?></div></td>
                    	<td><div align="center"><?php echo number_format($row['total_amount'], 2, '.', ','); ?></div></td>
             	</tr>
             	<?php } }
				else {
					echo "<tr> <td colspan='9' align='center'><br> NO ITEMS ON THIS SCHOOL YEAR! </td </tr>";
				} ?>
                
                <tr class="del">
   	 			  <td colspan="6" align="right" bgcolor="#F0F0F0"> <span class="style5"><strong>Annual Supplies Cost</strong> &nbsp;</span></td>
   	 			  <td align="center" bgcolor="#F0F0F0">
				    <span class="style5"><strong>
				    <?php
				  $c = mysql_query("SELECT sum(total_amount) as sum FROM supply_record_t WHERE sy_id ='$year'");
					while($cc = mysql_fetch_array($c)){
						$sum = $cc['sum'];
						$amount = number_format($sum, 2, '.', ',');
					}
				  echo "Php ".$amount; ?>
			        </strong> </span></td>
 			    </tr>
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
    </table></td>
  </tr>
</table>

<?php } 
else { 
?>

<table width="100%" border="0" align="center">
  		<tr>
          <td width="15%"><img src="../images/pnhs_logo.png" /></td>
          <td width="85%"><span class="style3">ANNUAL REPORT OF EQUIPMENTS</span><br />
          			<em><strong>Pag-asa National High School</strong></em><br />
   			  		<em>Rawis, Legazpi City</em><br />
                    <strong>School Year: <?php echo $yr_start." - ".$yr_end;  ?></strong>          </td>
        </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">      

        <tr>
          <td><table width="100%"  border="1" cellspacing="0" cellpadding="0">

              <tr>
   			    <td><div align="center"><strong>Date</strong></div></td>
   			    <td><div align="center"><strong>Item</strong></div></td>
                <td><div align="center"><strong>Unit</strong></div></td>
                <td><div align="center"><strong>Quantity</strong></div></td>
                <td><div align="center"><strong>Status</strong></div></td>
                <td><div align="center"><strong>Life Span</strong></div></td>
                <td><div align="center"><strong>Unit Cost</strong></div></td>
                <td><div align="center"><strong>Total Cost</strong></div></td>
            </tr>

			  <tbody>
    			<?php
                    require("../db/db.php");
					mysql_query("START Transaction");
					mysql_query("Auto-Commit = 'OFF'");
					$query = mysql_query("SELECT * FROM equipment_record_t WHERE equipment_record_t.sy_id ='$year'");
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
						$total_cost = ($row["amount"] * $row["quantity"]);

						?>    
   	 			<tr class="del">
                        <td align="center"><?php echo ucfirst($date); ?></td>
                        <td align="center"><?php echo "$item_name"; ?></td>	
                        <td align="center"><?php echo "$unit_type"; ?></td>
                        <td align="center"><?php echo ucfirst($row["quantity"]); ?></td>
                        <td align="center"><?php if(date('Y') <= ($row["life_span"]+$date)){ echo "Useful";} else {echo "Depreciated"; }?> </td>	
                        <td align="center"><?php echo ucfirst($row["life_span"]); ?></td>
                        <td align="center"><?php echo number_format($row["amount"], 2, '.', ','); ?></td>
                        <td align="center"><?php echo number_format($total_cost, 2, '.', ','); ?></td>	
             	</tr>
             	<?php } ?>
                <tr class="del">
   	 			  <td colspan="7" align="right"> <span class="style5"><strong>Annual Equipment Cost</strong> &nbsp;</span></td>
   	 			  <td align="center">
				    <span class="style5"><strong>
				    <?php
				  $c = mysql_query("SELECT sum(amount * quantity) as sum FROM equipment_record_t WHERE sy_id ='$year'");
					while($cc = mysql_fetch_array($c)){
						$sum = $cc['sum'];
						$amount = number_format($sum, 2, '.', ',');
					}
				  echo "Php ".$amount; ?>
			        </strong> </span></td>
 			    </tr>
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
</table></td>
  </tr>
</table>

</div>
</body>
</html>


<?php } } ?>