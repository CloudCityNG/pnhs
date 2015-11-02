<HTML>
<head>
<title>Work stuff</title>
<?php include '../include/php/js.php';
include '../include/php/css.php'; ?>

<script language="javascript">
row_no=1;
function addRow(tbl,row){
//row count

var tick = String(row_no);
if (row_no<20){
//Declaring text boxes
var textbox  ='<input type="text" name="p_child'+tick+'_name"  id="p_child'+tick+'_name"  style="width:180px;height:17px;" >';
var textbox2 = '<input type="date" name="p_child_bday'+tick+'"  id="p_child_bday'+tick+'" style="width:150px;height:17px;text-align:center;" >';
//var textbox3 = '<input type="text" size = "5" maxlength= "5"  id=frm'+tick+'>';
//var textbox4 = '<input type="date" class=validate[required]" size = "5" maxlength= "5"  id=to'+tick+'>';
//delete button
var stop = '<input type="button" class="btn btn-mini btn-danger" value="delete" onclick="deleteRow(this)" >';

//Inserting textboxes into table cells
var tbl = document.getElementById(tbl);
var rowIndex = document.getElementById(row).value;
var newRow = tbl.insertRow(row_no);
var newCell = newRow.insertCell(0);
newCell.innerHTML = textbox;
var newCell = newRow.insertCell(1);
newCell.innerHTML = textbox2;
//var newCell = newRow.insertCell(2);
//newCell.innerHTML = textbox3;
//var newCell = newRow.insertCell(3);
//newCell.innerHTML = textbox4;
//delete button within cell
var newCell = newRow.insertCell(2);
newCell.innerHTML = stop;

row_no++;
}

}
//Delete Function
function deleteRow(r)
{
    var i=r.parentNode.parentNode.rowIndex;
    document.getElementById('TableMain').deleteRow(i);
    
    // Decrementing row_no
    row_no--;
}


</script> 
</head>


<body>
<h3>So . . . Where have you worked</h3>
<!--table just for layout sake-->
<table width="100%" >
<tr>
<td width = 80%>
<!--Form-->
<form name="invoice" method="post">
<b>Professional Experience</b>
</br>
</br>
<!--Main table-->
<table width="100%" border="0" cellspacing="0" cellpadding="2" id="TableMain" class="styled">

<!--Headers-->
<th><center>Company</th>
<th>Position</th>
<!--<th>From (mm/yy)</th>
<th>To(mm/yy)</th>-->
<tr id="row1">
</tr>
</table>
</form></td>
<td valign="top" width = 20%>
<!--Add more button-->
</br></br></br><input type="button" name="Button" value="Add more" onClick="addRow('TableMain','row1')"></td>
</tr>
</table>
</body>
</html>