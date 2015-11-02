
<script src="js/jquery.min.js"></script>

<?php
error_reporting(0);
include('../db/db.php');
if(isset($_POST['pc_id']) && $_POST['pc_id'] != '')
{
  $pc_id = $_POST['pc_id'];
  $pc_id = mysql_real_escape_string($pc_id);
  $query = "select * from equipment_category_detail where category_id='".$pc_id."'";
  $res = mysql_query($query);
  if(mysql_num_rows($res))
  {
    while($row = mysql_fetch_array($res))
	{
	  echo "<option value='".$row['detail_no']."'>".ucfirst($row['category'])."</option>";
	}
  }
}
?>

<script type="text/javascript">
$(document).ready(function()
{
  $("#parent_category").change(function()
  {
    var pc_id = $(this).val();
	if(pc_id != '')  
	 {
	  $.ajax
	  ({
	     type: "POST",
		 url: "equipment_additem.php",
		 data: "pc_id="+ pc_id,
		 success: function(option)
		 {
		   $("#child_category").html(option);
		 }
	  });
	 }
	 else
	 {
	   $("#child_category").html("<option value=''>-- No category selected --</option>");
	 }
	return false;
  });
});
</script>

<table width="100%">
<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Item Name</label>
		<div class="controls">
			<select class="select_ttl" name="item_no" id="parent_category">
                        <?php
		  				include('../db/db.php');
							$query = "select * from equipment_category_t";
							$res   = mysql_query($query);
			 				 echo "<option value='' selected='selected' disabled='disabled'>Select Item</option>";
		  					 while($row = mysql_fetch_array($res)) {
		    					echo "<option value='".$row['category_id']."'>".ucfirst($row['item_name'])."</option>";
		  					}
		  				?>
            </select>
		</div>
	</div></td>
    <td><div class="control-group">
		<label class="control-label" for="name">Brand</label>
		<div class="controls">
			<select class="select_ttl" id="child_category" name="detail_no">
  					<option value="" selected='selected' disabled='disabled'>Select Category</option>
                    <option value="" disabled='disabled'>Select ITEM FIRST</option>
			</select>
		</div>
	</div></td>
</tr>
                       
<tr>                        
	<td><div class="control-group">
		<label class="control-label" for="name">Color</label>
		<div class="controls">
			<select name="type_no">
                  <?php
				      require "../db/db.php";
				      $query = mysql_query("SELECT * FROM equipment_color_t");
				      echo "<option value='' selected='selected' disabled='disabled'>Select Color</option>"; 
                      while($row = mysql_fetch_assoc($query)){
						  echo "<option value='".$row['color_id']."' > ".ucfirst($row['color_name'])."</option>";
					  }
				  ?>
            </select>
		</div>
	</div></td>
    
    <td><div class="control-group">
		<label class="control-label" for="name">Specification</label>
		<div class="controls">
			<input name="specs" type="text" placeholder="Enter Item Specification">
		</div>
	</div></td>
</tr>

							<tr>
                        		<td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp; EQUIPMENT DETAILS</strong></p></td>
                        	</tr>
                            
                            <tr>
                            	<td><div class="control-group">
                                	<label class="control-label" for="name">Unit</label>
                                	<div class="controls">
                                  	   <select name="unit">
                   						<?php
				      					require "../db/db.php";
				      					$query = mysql_query("SELECT * FROM unit_t");
										echo "<option value='' selected='selected' disabled='disabled'>Select Unit</option>";
				      					while($row = mysql_fetch_assoc($query)){
						  					echo "<option value='".$row['unit_no']."' > ".$row['unit_type']."</option>";
					  					}
				  						?>
                  						</select>
                               		</div>
                            	</div></td>
                                <td><div class="control-group">
                                	<label class="control-label" for="name">Amount</label>
                                	<div class="controls">
                                  	   <input name="unit_amount" type="text" placeholder="Enter Amount">
                               		</div>
                            	</div></td>
                            </tr>
                            <tr>
                            	<td><div class="control-group">
                                	<label class="control-label" for="name">Quantity</label>
                                	<div class="controls">
                                  	   <input name="quantity" type="text" placeholder="Enter Quantity">
                               		</div>
                            	</div></td>
                                <td><div class="control-group">
                                	<label class="control-label" for="name">Life Span</label>
                                	<div class="controls">
                                  	   <input name="rcc" type="text" placeholder="Enter Life Span">
                               		</div>
                            	</div></td>
                            </tr>
                            
                            <tr>
                        		<td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp; SUPPLIER</strong></p></td>
                        	</tr>
                            
                            <tr>
                            	<td><div class="control-group">
                                	<label class="control-label" for="name">Supplier</label>
                                	<div class="controls">
                                    <select name="supplier">
				        			<?php
  										include('../db/db.php');
										$sql = "select * from inventory_supplier_t";
										$unit   = mysql_query($sql);
  										echo "<option value='' selected='selected' disabled='disabled'>Select Supplier</option>";
  										while($row = mysql_fetch_array($unit))
  										{
  										  echo "<option value='".$row['supplier_no']."'>".ucfirst($row['supplier_name'])."</option>";
										}
  									?>
		      	    			  </select>
                               		</div>
                            	</div></td>
                            </tr>
                        </table>
                        

</table>