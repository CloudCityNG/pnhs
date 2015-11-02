

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_GET['lvl_id'])){
  $lvl_id = $_GET['lvl_id'];  
}

include "actions/class_functions.php";
include "actions/subject_functions.php";
include "actions/sched_functions.php";

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
                                        <td bgcolor="#999999" style="background-color:#999999">Lis of Subjects (<?php echo ucfirst($row_lvl['lvl_name']);?>)</td>
                                    </tr>
                                    <tr>
                                      <td>
                                <table style="" cellpadding="0" cellspacing="0" border="0" class=" table-bordered table-striped" id="ta<?php echo $lvl;?>" width="100%">
                                    
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Subject Title</th>
                                            <th>Units</th>
                                            <th>Time</th>
                                            <th>Category</th>
                                            <th>Curriculum</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    
                                     <?php 				     
                                        include_once "../db/db.php";
                                        $query = mysql_query("SELECT * FROM subject_t WHERE year_level='$lvl'");
                                        $total_unit=0;
                                        while($row = mysql_fetch_assoc($query)){
                                        $code=$row['subject_code'];  ?>
                                        
                                        <tr class="del<?php echo $code; ?> odd">
                                          <td><center><?php echo $row['subject_code']; ?></center></td>
                                          <td><?php echo $row['subject_title'];?></td>
                                          <td>
										  <div align="center">
										  <?php echo $row['credit_unit'];?>
                                          </div>
                                          </td>
                                          <td>
                                          <div align="center">
                                          <?php
										      $total_unit += $row['credit_unit'];
											  $time = unit_to_time($row['credit_unit']);
											  $time = round($time*4)/4;
											  $whole1 = (int) $time;
											  $frac1 = (($time*100)%100)*.6;
											  printf("%02d:%02d", $whole1, $frac1);
									      ?>
                                          </div>
                                          </td>
                                          <td>
										    <?php $category_id=$row['category_id'];
										      $query2 = mysql_query("SELECT * FROM subject_category_t WHERE category_id={$category_id}"); 
										      $row2 = mysql_fetch_assoc($query2);
										      echo $row2['category_name'];
											?>
                                          </td>
                                          <td>
										  <center>
										      <?php echo $row['curriculum_code'];?>
                                          </center>
                                          </td>
                                                                     
                                        </tr>
                                        
                                    <?php }?>
                                    	
                                    </tbody>
                                    <tfoot>
                                    <tr class="even">
                                      <td colspan="2">
                                        <div align="right">Total: </div>
                                      </td>
                                      <td>
                                      <div align="center">
                                      <hr style="border:1px solid black; width:60%;" /><?php echo $total_units;?>
                                      </div>
                                      </td>
                                      <td>
                                      <div align="center">
                                      <hr style="border:1px solid black; width:60%;" /><?php echo $total_time;?>
                                      </div>
                                      </td>
                                      <td colspan="2">
                                      </td>
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