<script type="text/javascript">
function showHint(str)
{
	var cat=document.getElementById('text').value;
if (str.length==0)
  { 
	  document.getElementById("result").innerHTML="<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("result").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","result.php?q="+str+"&c="+cat,true);
xmlhttp.send();
}
</script>