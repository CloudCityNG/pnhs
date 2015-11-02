
          <script type="text/javascript"> // create the XMLHttpRequest object, according browser

function get_XmlHttp() {
	
  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
  var xmlHttp = null;

  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
    xmlHttp = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return xmlHttp;
}

// sends data to a php file, via POST, and displays the received answer
function req() {
	
  var request =  get_XmlHttp();		// call the function for the XMLHttpRequest instance
  // create pairs index=value with data that must be sent to server
  

  // Check request status
  // If the response is received completely, will be transferred to the HTML tag with tagID
  request.onreadystatechange = function() {
    if (request.readyState == 4) {
		//
    }
  }
  request.open("POST", "queries_addbook.php", true);			// set the request
  request.send();	

}
</script>
 
     <script type="text/javascript">
	 <!--
	 function supplies(value){
		div="";
		
			req();
			div= window.prompt("Others Please Specify..");
		document.getElementById('supplyid').innerHTML= div;
			 
	 
	 }
	 -->
     </script>
     