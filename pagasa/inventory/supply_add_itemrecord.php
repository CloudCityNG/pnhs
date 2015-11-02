
<script src="js/jquery.min.js"></script>

<?php
include('../db/db.php');
if(isset($_POST['pc_id']) && $_POST['pc_id'] != '')
{
  $pc_id = $_POST['pc_id'];
  $pc_id = mysql_real_escape_string($pc_id);
  $query = "select * from supply_category_t where item_no='".$pc_id."'";
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
		 url: "supply_add_itemrecord.php",
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
   <td colspan="8" style="background-color:#969696;font-size:30px;font-style:italic;"><p><strong>&nbsp; ITEMS</strong></p></td>
</tr>
<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Item Name</label>
		<div class="controls">
			<select class="select_ttl" name="item_no" id="parent_category">
                        <?php
		  				include('../db/db.php');
							$query = "select * from inventory_item_t";
							$res   = mysql_query($query);
			 				 echo "<option value='' selected='selected' disabled='disabled'>Select Item</option>";
		  					 while($row = mysql_fetch_array($res)) {
		    					echo "<option value='".$row['item_no']."'>".ucfirst($row['item_name'])."</option>";
		  					}
		  				?>
            </select>
		</div>
	</div></td>
    
	<td><div class="control-group">
		<label class="control-label" for="name">Unit</label>
		<div class="controls">
			<select name="unit">
		  				<?php
		  				include('../db/db.php');
							$sql = "select * from unit_t";
							$unit   = mysql_query($sql);
			 				 echo "<option value='' selected='selected' disabled='disabled'>Select Unit</option>";
			 				 while($row = mysql_fetch_array($unit)) {
			  					  echo "<option value='".$row['unit_no']."'>".ucfirst($row['unit_type'])."</option>";
			  				 }
		  				?>
			</select>
		</div>
	</div></td>
</tr>

<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Category</label>
		<div class="controls">
			<select class="select_ttl" id="child_category" name="detail_no">
  					<option value="" selected='selected' disabled='disabled'>Select Category</option>
                    <option value="" disabled='disabled'>Select ITEM FIRST</option>
			</select>
		</div>
	</div></td>
    
    <td><div class="control-group">
		<label class="control-label" for="name">Unit Cost</label>
		<div class="controls">
			<input name="unit_amount" type="text" placeholder="Enter Unit Cost">
		</div>
	</div></td>
    
</tr>
                     
<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Description</label>
		<div class="controls">
			<input name="description" type="text" placeholder="Enter Description">
		</div>
	</div></td>
    
    <td><div class="control-group">
		<label class="control-label" for="name">Quantity</label>
		<div class="controls">
			<input name="quantity" type="text" placeholder="Enter Quantity">
		</div>
	</div></td>
</tr>
                  
</table>                    
