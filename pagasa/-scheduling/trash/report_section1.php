

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_GET['section_id'])){
  $section_id = $_GET['section_id'];  
}
		  

?>

<html xmlns="http://www.w3.org/1999/xhtml" style="background-color:#FFF">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link type="text/css" rel="stylesheet" href="../css/bootstrap1.css"  />
</head>

<body style="background-color:#FFF">
<div style="width:95%; margin:10px auto;">
  <div id="header">
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
				?>
                  Section Name: <?php echo $row_section['section_name'];?> <br />
                  Year Level: <?php echo $row_section['year_level'];?> <br />
                  Curriculum: <?php echo $row_section['curriculum_code'];?> <br />
                
              </td>
              <td>
                <?php 
				  require_once "../db/db.php";
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
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
          <th>Credit Unit</th>
          <th>Teacher</th>
        </tr>
        <?php
          require_once "../db/db.php";
		  include "actions/class_functions.php";
		  $sy_id = get_active_sy();
		  
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id={$sy_id} AND section_id={$section_id}");
		  while($row = mysql_fetch_assoc($query)){?>
		      <tr>
              
              <td>
			  <?php // echo $row['subject_code'];
			      $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
				  $row_subject = mysql_fetch_assoc($query_subject);
				  echo $row_subject['subject_title']; 
			  ?>
              </td>
              <td><?php echo $row_subject['credit_unit'];?></td>
              <td>
			  <?php //echo $row['teacher_id'];
			      $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$row['teacher_id']}");
				  $row_teacher = mysql_fetch_assoc($query_teacher);
				  echo $row_teacher['f_name'];
			  ?>
              </td>
             
              </tr>
		<?php
          }
		?>
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