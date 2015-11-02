
<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">System Name</label>
		<div class="controls">
			<select name="system_name">
                        <?php
		  				include('../db/db.php');
							$query = "select * from account_module_t";
							$res   = mysql_query($query);
			 				 echo "<option value='' selected='selected' disabled='disabled'>Select System</option>";
		  					 while($row = mysql_fetch_array($res)) {
		    					echo "<option value='".$row['module_no']."'>".ucfirst($row['module_name'])."</option>";
		  					}
		  				?>
            </select>
		</div>
	</div></td>
</tr>
                     
<tr>
	<td><div class="control-group">
		<label class="control-label" for="name">Role</label>
		<div class="controls">
			<input name="role" type="text" placeholder="Enter Description">
		</div>
	</div></td>
</tr>
  
