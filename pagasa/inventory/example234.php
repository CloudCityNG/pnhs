<html>
<head>

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
        maxFormsCount: 100,
        minFormsCount: 1,
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
	<table border="0" cellpadding="0px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="auto">
        <tr>
            <th>Serial Number</th>
            <th>Option</th>
        </tr>

            	<tr bgcolor="#FFFFFF">
                    <td align="center"> <input name="quantity" type="text" placheholder="Quantity"> </td>                    
                    <td align="center"><a id="sheepItForm_remove_current"><img class="delete" src="images/cross.png" width="16" height="16" border="0"></a></td>
                </tr>

				<tr> <td></td>
					<td colspan="5" align="right"> ... </td>
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
