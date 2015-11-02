
<script src="../-amsko/js/jquery.min.js"></script>

<?php
include('../db/db.php');
if(isset($_POST['pc_id']) && $_POST['pc_id'] != '')
{
  $pc_id = $_POST['pc_id'];
  $pc_id = mysql_real_escape_string($pc_id);
  $query = "select * from account_privilege_t where privilege_level='".$pc_id."'";
  $res = mysql_query($query);
  if(mysql_num_rows($res))
  {
    while($row = mysql_fetch_array($res))
	{
	  echo "<option value='".$row['privilege_id']."'>".ucfirst($row['privilege_name'])."</option>";
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
		 url: "ams_add_accountemprecord.php",
		 data: "pc_id="+ pc_id,
		 success: function(option)
		 {
		   $("#child_category").html(option);
		 }
	  });
	 }
	 else
	 {
	   $("#child_category").html("<option value=''>-- No Role selected --</option>");
	 }
	return false;
  });
});
</script>

<table width="100%">

<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Account Type</label>
		<div class="controls">
				<select class="select_ttl" name="type_no" id="parent_category">
                <option value='' selected='selected' disabled='disabled'>Select Type</option>
                <option value='2'>Admin</option>
                <option value='3'>Employee</option>
            </select>
		</div>
	</div></td>
</tr>

<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Role</label>
		<div class="controls">
			<select class="select_ttl" id="child_category" name="privilege_id">
  					<option value="" selected='selected' disabled='disabled'>Select Role</option>
                    <option value="" disabled='disabled'>Select TYPE FIRST</option>
			</select>
		</div>
	</div></td>
</tr>
                  
</table>                    
