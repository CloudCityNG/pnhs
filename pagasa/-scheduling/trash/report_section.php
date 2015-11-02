<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div style="width:80%;">
  <div id="header">
  </div>
  <di id="content">
    <table width="90%">
      <tr>
        <td style="background-color:#999999"></td>
      </tr>
      <tr>
      </tr>
      <tr>
        <td style="background-color:#999999"></td>
      </tr>
      <tr>
        <td>
        <table>
        <?php
          require_once "../db/db.php";
		  include "actions/class_functions.php";
		  $sy_id = get_active_sy();
		  if(isset($_GET['section_id'])){
	          $section_id = $_GET['section_id'];  
		  }
		  
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id={$sy_id} AND section_id={$section_id}");
		  while($row = mysql_fetch_assoc($query)){?>
		      <tr>
              
			  <td><?php echo $row['class_id'];?></td>
              <td><?php echo $row['subject_code'];?></td>
              <td><?php echo $row['teacher_id'];?></td>
              <td><?php echo $row['class_id'];?></td>
              </tr>
		<?php
          }
		?>
        </table>
        </td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>