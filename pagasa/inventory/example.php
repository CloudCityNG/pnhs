<html>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script>

<?php
include('../db/db.php');

if(isset($_POST['pc_id']) && $_POST['pc_id'] != '')
{
  $pc_id = $_POST['pc_id'];
  $pc_id = mysql_real_escape_string($pc_id);
  $query = "select * from stock_details_t where item_no='".$pc_id."'";
  $res = mysql_query($query);
  if(mysql_num_rows($res))
  {
    while($row = mysql_fetch_array($res))
	{
	  echo "<option value='".$row['details']."'>".ucfirst($row['details'])."</option>";
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
   

<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.sheepItPlugin.js"></script>

<script type="text/javascript">

$(document).ready(function() {
     
    var sheepItForm = $('#sheepItForm').sheepIt({
        separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        allowRemoveAll: true,
        allowAdd: true,
        allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
    });
 
});

</script>
<style>

a {
    text-decoration:underline;
    color:#00F;
    cursor:pointer;
}

#sheepItForm_controls div, #sheepItForm_controls div input {
    float:left;    
    margin-right: 10px;
}


</style>

</head>

<body>

<!-- sheepIt Form -->
<div id="sheepItForm">
 
  <!-- Form template-->
  <div id="sheepItForm_template">
	<table border="0" cellpadding="0px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
        <tr>
            <th>Item</th>
            <th>Detail</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Unit Amt.</th>
            <th>Total Amt.</th>
            <th>Option</th>
        </tr>

            	<tr bgcolor="#FFFFFF">
                	<td align="center">
                    <select id="parent_category" name="item_name" style="">
		  				<?php
		  				include('../db/db.php');
							$query = "select * from inventory_item_t";
							$res   = mysql_query($query);
			 				 echo "<option value=''>-- Select --</option>";
		  					 while($row = mysql_fetch_array($res)) {
		    					echo "<option value='".$row['item_no']."'>".ucfirst($row['item_name'])."</option>";
		  					}
		  				?>
					</select></td>
                    
                    <td align="center">		
        			<select id="child_category" name="details">
		  				<option value="">-- No category selected --</option>
					</select></td>
                    
                    <td align="center">
                    <select name="unit">
		  				<?php
		  				include('../db/db.php');
							$sql = "select * from unit_t";
							$unit   = mysql_query($sql);
			 				 echo "<option value=''>-- Select --</option>";
			 				 while($row = mysql_fetch_array($unit)) {
			  					  echo "<option value='".$row['unit_type']."'>".ucfirst($row['unit_type'])."</option>";
			  				 }
		  				?>
					</select></td>

                    <td align="center"> <input name="quantity" type="text" placheholder="Quantity"> </td>                    
                    <td align="center">Php <input name="unit_amount" type="text" placheholder="Unit Amount"> </td>
                    <td align="center">Php <?php # ?></td>
                    <td align="center"><a id="sheepItForm_remove_current"><img class="delete" src="images/cross.png" width="16" height="16" border="0"></a></td>
                </tr>

				<tr> <td></td><td></td><td></td>
					<td colspan="5" align="right">
                	<input type="button" value="Update Price" onClick="update_cart()">
                	</td>
                </tr>

	</table>    
  </div>
  <!-- /Form template-->
   
  <!-- No forms template -->
  <div id="sheepItForm_noforms_template">No Data</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm_controls">
    <div id="sheepItForm_add"><a><span>Add Item</span></a></div>
    <div id="sheepItForm_remove_last"><a><span>Remove</span></a></div>
    <div id="sheepItForm_remove_all"><a><span>Remove all</span></a></div>
    <div id="sheepItForm_add_n">
    <input id="sheepItForm_add_n_input" type="text" size="4" />
    <div id="sheepItForm_add_n_button"><a><span>Add</span></a></div></div>
  </div>
  <!-- /Controls -->
   
</div>
<!-- /sheepIt Form -->


</body>
</html>
