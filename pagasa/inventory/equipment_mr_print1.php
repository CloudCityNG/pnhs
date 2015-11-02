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
.style1 {
	font-size: 24px
}
-->
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p><input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

<p align="center" class="style2 style1">MEMORANDUM RECEIPT FOR SEMI-EXPENDABLE AND</p>
<p align="center" class="style2 style1">NON EXPENDABLE EQUIPMENT OR PROPERTY</p>
<p align="center" class="style2">Name of Local Goverment Unit: Pag Asa National high School Date: <?php echo date('m/d/Y'); ?></p>
<div align="center">
  <table width="1031" height="251" border="1" bordercolor="#FFFFFF" bgcolor="#000000">
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td height="64" colspan="8"><div align="left">
          <p align="center">I hereby acknowledged to have received in the date <?php echo date('m/d/Y'); ?> from the following equipment/property which will be used </p>
        <p align="center"> and for which I am immediatety accountable.</p>
        </div></td>
    </tr>
    <tr align="center" valign="middle" bgcolor="#FFFFFF">
      <td width="130" height="64"><span class="style6">Quantity Acquired</span></td>
      <td width="92"><span class="style6">Serial no.</span></td>
      <td width="92"><span class="style6">Unit of Issue</span></td>
      <td width="263"><span class="style6">Description</span></td>
      <td width="152"><span class="style6">Date Aquired</span></td>
      <td width="117"><span class="style6">Property No.</span></td>
      <td width="117"><span class="style6">Amount</span></td>
      <td width="237"><span class="style6">Total Cost</span></td>
    </tr>
   
      
      <?php
				    error_reporting(0);
					 	include ('../db/db.php');
	  			  		if ($_GET['property_no']) {	  
	  			  		$property_no = $_GET['property_no'];
						mysql_query("START Transaction");
						mysql_query("Auto-Commit = 'OFF'");	
						$query = mysql_query("SELECT * FROM equipment_property_t WHERE property_no = '$property_no'");
						while($row = mysql_fetch_assoc($query)){
						
						
						$date_acquired = $row ['date_acquired'];						
						$stock_no = $row ['stock_no'];
						$quantity_acquired = $row ['quantity_acquired'];
						$emp_id = $row ['emp_id'];
						
						$query2 = mysql_fetch_array(mysql_query("SELECT * FROM equipment_record_t WHERE stock_no = '$stock_no'"));
						$unit=$query2['unit'];
						
						$par = mysql_query("SELECT * FROM equipment_item_t WHERE stock_no = '$stock_no'");
						$query3 =mysql_fetch_array($par);
						$category_id = $query3['category_id'];
						$color_id = $query3['color_id'];
					      
						$query4 = mysql_fetch_assoc(mysql_query("SELECT * FROM equipment_category_t WHERE category_id='$category_id'"));
						$item_name=$query4['item_name'];
						
						$query6 = mysql_query(mysql_query("SELECT * FROM equipment_category_detail WHERE category_id='$category_id'"));
				  		$category=$query6['category'];
			
					  	$query9 = mysql_query("SELECT * FROM unit_t WHERE unit_no='$unit'");
						$fetchquery9 = mysql_fetch_assoc($query9);
				   		$unit_type = $fetchquery9['unit_type'];
						
						$query7 = mysql_query("SELECT * FROM equipment_record_t WHERE stock_no = '$stock_no'");
						$fetchquery7 = mysql_fetch_assoc($query7);
						$amount = $fetchquery7['amount'];
						 
						 $query8 = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
						 $row8 = mysql_fetch_assoc($query8);
						 $position = $row8['position'];
						 mysql_query("Commit");
						
						$query =mysql_fetch_array( mysql_query("SELECT * FROM equipment_item_t, equipment_color_t, equipment_category_t, equipment_category_detail
																WHERE equipment_item_t.stock_no='$stock_no' 
																AND equipment_item_t.color_id = equipment_color_t.color_id"));
				        $em_id = $query['item_id'];
						$specs=$query['specs'];
						$color1=$query['color_name'];
					      
						}
						
						echo "<tr>
						
							  <td bgcolor='#B1F3B4'><div align='center'>". $quantity_acquired."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". "1"."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". $unit_type."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". ucfirst($item_name)." ".ucfirst($category)." ".ucfirst($color1)." ".ucfirst($specs)."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>".$date_acquired."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". $property_no."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". "Php $amount"."</div></td>
							  <td bgcolor='#B1F3B4'><div align='center'>". "Php ".$total=($quantity_acquired*$amount)."</div></td>
							  </tr>";
						
				?>
                <?php } ?>
    </tr>
  </table>
  <br />
  <tr bgcolor="#FFFFFF">
      <td height="46" colspan="8">Remarks/Other Information (if any):___________________________________________________________________________________________________</td>
      <br />
      
      <blockquote>&nbsp;</blockquote>
  </tr>
    <tr bgcolor="#FFFFFF">
    
      <td height="50" colspan="8"><blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <p align="left"><?php echo $row8["position"]; ?></p>
                </blockquote>
                <p align="left"> Designation/Position</p>
                <p align="right"><?php echo ucfirst($row8["f_name"]." ".$row8["m_name"]." ".$row8["l_name"]); ?></p>
                <p align="right">______________________</p>
                <p align="right">Signature over printed name</p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>      </td>
  </tr>
  </table>
 
</p>
        </div>
<p>&nbsp;  </p>
 </form>
</body>
</html>
