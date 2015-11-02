

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_GET['lvl_id'])){
  $lvl_id = $_GET['lvl_id'];  
}

require "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/section_functions.php";
include "actions/class_functions.php";
if(!isset($_GET['sy_id'])){
	$school_yr = get_active_sy();
}
else{
	$school_yr = $_GET['sy_id'];
}
		  

?>

<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:#FFF">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Section Load</title>

<link type="text/css" rel="stylesheet" href="../css/bootstrap1.css"  />
</head>

<body style="background-color:#FFF">
<div style="width:95%; margin:10px auto;">
  <div id="header" style="margin-bottom:20px; height:100px; overflow:hidden;">
    <img style=" display:inline-block" src="../images/pnhs_logo.png" align="top" >
    <div style="display:inline-block;; border:0px solid black; height:100%; width:500px;font-weight:bold; padding-top:20px; padding-left:20px;"><h4>PAGASA NATIONAL HIGH SCHOOL</h4></div>
  </div>
  <div>
  
      <?php
	      $set = "";
		  if(isset($lvl_id)){
		    $set = "WHERE lvl_id='{$lvl_id}'";
		  }
		  $query_top = mysql_query("SELECT * FROM year_level_t ".$set) or die();
		  while($row = mysql_fetch_assoc($query_top)){
	          $lvl = $row['lvl_id'];
	  ?>
    					 		<div class="widget-header">
                                    <h3>
									<?php
									    $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$lvl}'") or die(mysql_error()); 
									    $row_lvl = mysql_fetch_assoc($query_lvl);
										//echo ucfirst($row_lvl['lvl_name']);
									    
									?>
                                    </h3>
                                    <div class="pull-right">
                                    <h3>
                                    <?php
                                        $total_units = get_total_units($lvl);
										$total_time = print_time($total_units);
										//echo "Total Units: ".$total_units." / ".$total_time." hrs";
									?>
                                    
                                    </h3>
                                    </div>
                                </div>
                                <table width="100%" style="border:1px solid black;">
                                    <tr>
                                        <td bgcolor="#999999" style="background-color:#999999">List of Sections (<?php echo ucfirst($row_lvl['lvl_name']);?>)</td>
                                    </tr>
                                    <tr>
                                      <td>
                                <table style="" cellpadding="0" cellspacing="0" border="0" class=" table-bordered table-striped" id="ta<?php echo $lvl;?>" width="100%">
                                    
                                    <thead>
                                        <tr>
                                            <th>Section name</th>
                                            <th align="center">Sectino no</th>
                                            <th>Section Size</th>
                                            <th>No. of Students</th>
                                            <th>Curriculum</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    
                                     <?php 				     
										include('../db/db.php');
										$query = mysql_query("SELECT * FROM section_t WHERE year_level='{$lvl}'");
										
										$total_students = 0;
										while($row = mysql_fetch_assoc($query)){
										$section_id=$row['section_id']; ?>
										
										<?php
										$yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row['year_level']}'");
										$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);
										?>
										
										<tr class=" odd del<?php echo $section_id; ?>">
                                          
										  <td><center><?php echo $row['section_name']; ?></center></td>
										  <td><center><?php echo $row['section_no'];?></center></td>
										  <td><center><?php echo $row['section_size'];?></center></td>
                                          <td><center><?php echo section_students($section_id, get_active_sy()) ; $total_students+=section_students($section_id, get_active_sy()) ;?></center></td>
										  <td><center><?php echo $row['curriculum_code'];?></center></td>
										  
										</tr>
										
									  <?php }?>
                                    	
                                    </tbody>
                                    <tfoot>
                                        <tr class=" odd del<?php echo $section_id; ?>">
                                          
										  <td colspan="3"><div align="right"> <strong>Total number of Students: </strong></div></td>
                                          <td><hr style="border:1px solid black; width:50%;" /><center><?php echo $total_students ;?></center></td>
										  <td></td>
										  
										</tr>
                                    </tfoot>
                                </table>
                                        </td>
                                    </tr>
                                </table>
        <?php
		  }
        ?>
    <div id="buttons">
        <input name="back" type="button" value="Back" id="backButton" onclick="goBack()"/>
        <input name="print" type="button" value="Print" id="printButton" onClick="printpage()" />
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
function printpage() {
document.getElementById('buttons').style.visibility="hidden";
window.print();
document.getElementById('buttons').style.visibility="visible";  
}
function goBack(){
	window.history.go(-1);
}
</script>

</html>