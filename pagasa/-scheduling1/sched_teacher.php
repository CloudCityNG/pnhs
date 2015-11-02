<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once "../db/db.php";
include "actions/time_intervals.php"; //include the aray $times[]
include "actions/class_functions.php";
include "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/load_schedule.php"; //to pre-load schedule on the time table.

//load_sched_emp($_GET['emp_id']);

if(!isset($_GET['sy_id'])){
    load_sched_emp($_GET['emp_id'], get_active_sy());
	$school_yr = get_active_sy();
}
else{
	
    load_sched_emp($_GET['emp_id'], $_GET['sy_id']);
	$school_yr = $_GET['sy_id'];
}

if(isset($_GET['emp_id'])){
    $emp_id=$_GET['emp_id'];	
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule for</title>

<link rel="stylesheet" href="css/tables.css" type="text/css" media="screen"/>


<?php 	


			     
$color = array(
	"#C6D9F0",
	"#DBE5F1",
	"#F2DCDB",
	"#EBF1DD",
	"#E5E0EC",
	"#DBEEF3",
	"#FDEADA",
	"#FBD5B5");
	include('../db/db.php');
	$sy_id=get_active_sy();
	$query = mysql_query("SELECT * FROM class_t WHERE teacher_id={$_GET['emp_id']} AND sy_id={$sy_id}");
	$class = array();
	$i=0;
	while($row = mysql_fetch_assoc($query)){
	  $class_id = $row['class_id'];	
	  
	  $class_color[$class_id] = $color[$i%8];
	  $i++;
	
	}
?>


</head>

<body>

          <table style="width:100%">
            <tr>
              <td>
                <?php 
				  require_once "../db/db.php";
				  $query_emp = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
				  $row_emp = mysql_fetch_assoc($query_emp);
				  
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'");
				  $row_sy = mysql_fetch_assoc($query_sy);
				  
				  $query_load = mysql_query("SELECT * FROM teacher_t WHERE emp_id='{$emp_id}'");
				  $row_load = mysql_fetch_assoc($query_load);

				?>
                  Name: <?php echo $row_emp['l_name'].", ".$row_emp['f_name'];?> <br />
                  Max Load: <?php echo $row_load['max_load'];?> <br />
                  ID number: <?php echo $row_emp['emp_id'];?> <br />
                  School Year:  <?php echo $row_sy['sy_start']." - ".$row_sy['sy_end'];?>
              </td>
            </tr>
          </table>


 <table  width="100%" border="0" bordercolor="#FFFFFF" class="timetable" style="" cellpadding="0" cellspacing="0">
                        <colgroup>
							<col width="50"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
							<col width="100"/>
						</colgroup>
                        <thead><tr bgcolor="#006699" style="color:white">
                            <th width="50">TIME</th>
                            <?php
                            $day_count = count($day_array);
                            for($i=0;$i<$day_count;$i++){ ?>
                                <th class="timetable_header" style=''><?php echo $day_array[$i]?></th>
                            <?php
                            }
                            ?>
                        </tr></thead>
                    
                      <?php
                      // $i === time interval
                      // $j === sections
					  
                      for($i=0;$i<count($times)-1;$i++){ ?>
                          <tr bgcolor='#F2F2F2'>
                                    <th bgcolor='#EDEEFE' font="Arial"><font face='Arial, Helvetica, sans-serif' size='1'><?php echo date('h:i A',strtotime($times[$i]))?></th>
                          <?php
                          if($i>=0 && $i<=1){
                              echo ($i==0)? "<th colspan='$day_count' rowspan='2' class='restricted end'> FLAG CEREMONY</th>":"";
                              continue;
                          } 
                           if($i>=10 && $i<=11){
                              echo ($i==10)? "<th colspan='$day_count' rowspan='2' class='restricted end'> RECESS</th>":"";
                              continue;
                          } 
                           if($i>=20 && $i<=23){
                              echo ($i==20)?"<th colspan='$day_count' rowspan='4' class='restricted end'> LUNCH BREAK</th>":"";
                              continue;
                          } 
                          for($j=0;$j<$day_count;$j++){
                              $loaded_day_ID = $day_array[$j];
                              $start = $times[$i];
                              $end = $times[$i+1];
							  $schedule_id = teacher_loaded($_GET['emp_id'], $start, $end, $loaded_day_ID, $school_yr);
							  $loaded_class_id = get_class_id($schedule_id, 1);//to retrieve from actual table
							  
							  
                              if($loaded_class_id!=""){
							      $slots = get_slots($schedule_id);
								  if(is_first($schedule_id, $start)){
									  ?> <th bgcolor="<?php echo $class_color[$loaded_class_id];?>" class="loaded" rowspan="<?php echo $slots;?>"> <?php
								      $query_subject = mysql_query("SELECT subject_t.subject_title FROM subject_t, class_t 
										                                                           WHERE subject_t.subject_code=class_t.subject_code
																								   AND class_t.class_id=$loaded_class_id") or die(mysql_error());
								      $row_subject = mysql_fetch_assoc($query_subject);
									  echo $row_subject['subject_title'];
									  ?></th><?php
								   }
								   ?> 
							  <?php
                              }
                              else {?>
                                     <th></th>
                              <?php
					          }
                          }
                          echo "</tr>";
                      }
                      ?>
                      
                    </table>

    <div id="buttons">
        <input name="back" type="button" value="Back" id="backButton" onClick="goBack()"/>
        <input name="print" type="button" action="action" value="Print" id="printButton" onClick="printpage()" />
    </div>

</body>


<script src="../js/libs/jquery-1.8.3.min.js"></script>

<script type="text/javascript"  charset="utf-8">
function printpage() {
document.getElementById('buttons').style.visibility="hidden";
window.print();
document.getElementById('buttons').style.visibility="visible";  
}
function goBack(){
	window.history.go(-1);
}

    window.onbeforeunload=function() {
		    
			$.ajax({
			url: "actions/truncate.php",
			type: "GET",
			data: {teacher_id:<?php echo $_GET['emp_id'];?>},
			async : false
			});
    }
	window.unload( function () { 
	    
		$.ajax({
			url: "actions/truncate.php",
			async : false

		});	
	});
</script>
</html>