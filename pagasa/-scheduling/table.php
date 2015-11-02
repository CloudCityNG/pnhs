<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "../DataTable/media/css/demo_page.css";
			@import "../DataTable/media/css/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript">
		    $(document).ready(function(){
			  $("#button").click(function(){
				$("#col1").addClass("designed");
				var str = $("#text").val();
				$("#some").text(str);
			  });
			});
			var tableData = [['a1', 'a2', 'a3', 'a4', 'a5'],
			                 ['b1', 'b2', 'b3', 'b4', 'b5'],
							 ['c1', 'c2', 'c3', 'c4', 'c5']];
			var number = 5.45;
            number = (Math.round(number * 4) / 4).toFixed(2);
		</script>
        <style type="text/css">
		   .designed{
			   background-color:#000000;
			   color:red;
			      
		   }
		</style>
	</head>
	<body id="dt_example">
	<div id="container">
			<div class="full_width big">
				DataTables zero configuration example
			</div>
			
            
            
            <table border="1" id="timeTable">
               <tr>
               <script type="text/javascript">
			       var i = 0;
				   for(i=0;i<tableData.length;i++){
					   var str = "<td id='col"+i+"'>"+i+"</td>";
					   document.write(str+"    "+number);   
				   }
               </script>
               </tr>
            </table>
            <input id="text" type="text">
            <button id="button" type="button" onClick="design()">hello</button>
      <div id="some" >
               sdlfkjsldkjflksdfsdf
	</div>
    
    <?php include "actions/subject_functions.php";?>
    <?php 
	
	$start = "04:00";
	$end = "06:00";
	echo get_duration($start, $end);?>
	</div>
    
    
                                  <a class="btn" data-toggle="modal" href="#add_subject"><i class="icon-plus-sign-alt" > </i> Add Subject via Modal</a>

    
<div class="modal fade hide" id="add_subject">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
   heyoulk

  </div>
</div>
    
    
	</body>
</html>