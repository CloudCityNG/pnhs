<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once "../db/db.php";
include "../-scheduling/actions/time_intervals.php"; //include the aray $times[]
include "../-scheduling/actions/class_functions.php";
include "../-scheduling/actions/sched_functions.php";
include "../-scheduling/actions/subject_functions.php";
include "../-scheduling/actions/load_schedule.php"; //to pre-load schedule on the time table.

load_sched($_GET['section_id']);


if(isset($_GET['section_id'])){
    $section_id=$_GET['section_id'];
if($section_id=='NULL')
{
 echo 'Student has no current section yet.';
}	
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
	$query = mysql_query("SELECT * FROM class_t WHERE section_id={$_GET['section_id']} AND sy_id={$sy_id}");
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
				  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id'");
				  $row_section = mysql_fetch_assoc($query_section);
				  
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE SY_status=1");
				  $row_sy = mysql_fetch_assoc($query_sy);
				?>
                  Section Name: <?php echo $row_section['section_name'];?> <br />
                  Year Level: <?php echo $row_section['year_level'];?> <br />
                  Curriculum: <?php echo $row_section['curriculum_code'];?> <br />
                  School Year:  <?php echo $row_sy['sy_start']." - ".$row_sy['sy_end'];?><br />
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
							  $schedule_id = section_loaded($_GET['section_id'], $start, $end, $loaded_day_ID);
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
        <input name="back" type="button" value="Back" id="backButton" onclick="goBack()"/>
        <input name="print" type="button" action="action" value="Print" id="printButton" onClick="printpage()" />
    </div>

</body>
</html>
<script src="../js/libs/jquery-1.8.3.min.js"></script>

<script type="text/javascript" >

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
			data: {section_id:<?php echo $_GET['section_id'];?>},
			async : false
			});
    }
	
</script>
