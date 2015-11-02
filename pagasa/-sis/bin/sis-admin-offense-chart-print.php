<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: restrict.php"); // IMPORTANT!!!!
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Certification of Good Moral Character</title>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

  <div id="container" align="center">
      <div id="header">
		<img src="../images/banner.jpg" width="100%" />
      </div>

<table>
<tr>
<td>
					<?php
					$querycurryear = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
					$getcurryear = mysql_fetch_assoc($querycurryear);
					$curryear1 = $getcurryear['sy_start'];
					$curryear2 = $getcurryear['sy_end'];
					?>
                    
                    <h4 align="center">Offense Report for School Year: <?php echo $curryear1 ?>-<?php echo $curryear2 ?></h4>
</td>
</tr>
<tr>
<td>


						<table border="1" cellpadding="0">							
							<thead >
                            <tr>								
								<th>Offenses</th>
								<th>No. of Students</th>								
							</tr></thead>
					
						<tbody>
                        <tr>
							<?php 
							include("../db/db.php");
							$query_currsy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
							$row_currsy = mysql_fetch_assoc($query_currsy);
							$currsy = $row_currsy['sy_id'];
							
							$query_municipality=mysql_query("SELECT * FROM discipline_offense_t");
							while($row_municipality=mysql_fetch_assoc($query_municipality)){
								$name=$row_municipality['offense_description'];
								$offcode=$row_municipality['offense_code'];
								
							$count_name=0;
							$query_name=mysql_query("SELECT * from student_offense_list_t WHERE offense_code = '$offcode' AND school_year = '$currsy'");
										while($row_name=mysql_fetch_assoc($query_name)){ 
											$count_name=mysql_num_rows($query_name);
										}?>
                            			<td><?php echo $name; ?></td>
                                        
										<td><?php echo $count_name; ?> - 
                                        <?php 
											$query_student=mysql_query("SELECT * FROM student_t");
											$count_student=mysql_num_rows($query_student);
											$percent=($count_name/$count_student)*100;
											printf("%.2f%%", $percent);
										?></td>                           			
						</tr>
                        <?php } ?>
						
						
					</tbody></table>
						

</td>
</tr>
</table>




</body>
<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.orderBars.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>



<script type="text/javascript">
$(function () {
	
		var data = [];
		var i=0;
		<?php

	
		$query_currsy = mysql_query("SELECT * FROM school_year_t WHERE SY_Status = '1'");
		$get_currsy = mysql_fetch_assoc($query_currsy);
		$currsy = $get_currsy['sy_id'];
							
		$query_offense=mysql_query("SELECT * FROM discipline_offense_t");
			while($row_offense=mysql_fetch_assoc($query_offense)){
					$off=$row_offense['offense_code'];
					$offname=$row_offense['offense_description'];
								
					$count_off=0;
					$query_off=mysql_query("SELECT * from student_offense_list_t WHERE offense_code = '$off' AND school_year = '$currsy'");
						while($row_off=mysql_fetch_assoc($query_off)){ 
							$count_off=mysql_num_rows($query_off);
		}?>
		<?php
		if($count_off>=1){
		?>
		data[i] = { label: "<?php echo $offname;?>", data: <?php echo $count_off;?> }
		i++;
		
		<?php 
		}
			}
			
		?>
	
	$.plot($("#pie-chart"), data, 
	{
			colors: [],
			series: {
				pie: { 
					show: true,
					label: {
						show: false,
						formatter: function(label, series){
							return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
						},
						threshold: 0.1
					}
				}
			},
			legend: {
				show: true,
				noColumns: 1, // number of colums in legend table
				labelFormatter: null, // fn: string -> string
				labelBoxBorderColor: "#888", // border color for the little label boxes
				container: null, // container (as jQuery object) to put legend in, null means default on top of graph
				position: "bottom", // position of default legend container within plot
				margin: [5, 10], // distance from grid edge to default legend container within plot
				backgroundOpacity: 0 // set to 0 to avoid background
			},
			grid: {
				hoverable: false,
				clickable: false
			},
	});
	
	});

</script>





</html>