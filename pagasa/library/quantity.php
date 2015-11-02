 <script type="text/javascript">
	function plus()
	{
		var v=document.getElementById("q").value;
		v++;
		if(v>=1000) v=999;
		document.getElementById("q").value=v;
	}
	
	function minus()
	{
		var v=document.getElementById("q").value;
		v--;
		if(v==-1) v=0;
		document.getElementById("q").value=v;
	}
</script>