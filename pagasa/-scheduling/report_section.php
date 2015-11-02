

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_GET['section_id'])){
  $section_id = $_GET['section_id'];  
}

include "actions/class_functions.php";
include "actions/subject_functions.php";

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
    <table width="100%" style="border:1px solid black;">
      <tr>
        <td style="background-color:#999999">Section Details</td>
      </tr>
      <tr>
        <td>
          <table style="width:100%">
            <tr>
              <td>
                <?php 
				  require_once "../db/db.php";
				  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id'");
				  $row_section = mysql_fetch_assoc($query_section);
				  
				  $year_level = $row_section['year_level'];
			      $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id={$year_level}") or die(mysql_error());
				  $row_lvl = mysql_fetch_assoc($query_lvl);
				  
			  
				?>
                  Section Name: <?php echo $row_section['section_name'];?> <br />
                  Year Level: <?php echo ucfirst($row_lvl['lvl_name']);?> <br />
                  Curriculum: <?php echo $row_section['curriculum_code'];?> <br />
                
              </td>
              <td>
                <?php 
				  require_once "../db/db.php";
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'");
				  $row_sy = mysql_fetch_assoc($query_sy);
				?>
                School Year:  <?php echo $row_sy['sy_start']." - ".$row_sy['sy_end'];?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#999999" style="background-color:#999999">Classes</td>
      </tr>
      <tr>
        <td>
        <table style="width:100%">
        <tr>
          <th>Subject Title</th>
          <th>Subject Category</th>
          <th>Credit Unit</th>
          <th>Hours/Week</th>
          <th>Teacher</th>
        </tr>
        <?php
          require_once "../db/db.php";
		  //include "actions/class_functions.php";
		  //$sy_id = get_active_sy();
		  $total_unit=0;
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id={$school_yr} AND section_id={$section_id}");
		  while($row = mysql_fetch_assoc($query)){?>
		      <tr>
           
              <td><center>
			  <?php // echo $row['subject_code'];
			      $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
				  $row_subject = mysql_fetch_assoc($query_subject);
				  echo $row_subject['subject_title']; 
			  ?></center>
              </td>
                 <td>
                 <center> 
			  	<?php
					   $query_subj=mysql_query("SELECT * FROM subject_category_t WHERE category_id='{$row_subject['category_id']}'"); 
					   $row_subj=mysql_fetch_assoc($query_subj);
					   echo $row_subj['category_name'];
			  		?></center>
                 </td>
              <td>
              <center>
			  <?php 
			      echo $row_subject['credit_unit'];
			      $total_unit += $row_subject['credit_unit'];
			  ?>
              </center>
              </td>
              
              <td>
                  <center>
				  <?php 
				      $time = unit_to_time($row_subject['credit_unit']);
				      $time = round($time*4)/4;
				      $whole1 = (int) $time;
				      $frac1 = (($time*100)%100)*.6;
				      printf(" %d:%02d", $whole1, $frac1);
				  ?>
                  </center>
                  </td>
              <td><center>
			  <?php //echo $row['teacher_id'];
			      if($row['teacher_id']!=NULL){
					  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$row['teacher_id']}");
					  $row_teacher = mysql_fetch_assoc($query_teacher);
					  echo $row_teacher['f_name']." ".$row_teacher['l_name'];
				  }
				  else{
					  echo "-";  
				  }
			  ?></center>
              </td>
             
              </tr>
		<?php
          }
		?>
            <tr>
              <td></td>
              <td align="right"><b>Total: </b></td>
              <td >
                <center>
                <hr style=" width:60%; border:1px solid black;" />
			    <?php echo $total_unit;?>
                </center>
               
              </td>
              <td >
                <center>
                <hr style=" width:60%; border:1px solid black;" />
			    <?php 
				  $time = unit_to_time($total_unit);
				  $time = round($time*4)/4;
				  $whole1 = (int) $time;
				  $frac1 = (($time*100)%100)*.6;
				  printf(" %02d:%02d", $whole1, $frac1);
			    ?>
                </center> 
              </td>
              <td></td>
            </tr>
        </table>
        </td>
      </tr>
    </table>
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