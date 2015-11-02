<?php


require_once "../db/db.php";

require('fpdf/fpdf.php');
$pdf = new FPDF();

class PDF extends FPDF
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print current and total page numbers
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}



$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial' , 'B' , 12);




if(isset($_GET['emp_id'])){
  $emp_id = $_GET['emp_id'];  
}
		  
include "actions/class_functions.php";
include "actions/subject_functions.php";
if(!isset($_GET['sy_id'])){
	$school_yr = get_active_sy();
}
else{
	$school_yr = $_GET['sy_id'];
}


	
	
	
	
$image1 = "../images/pnhs_logo.png";
//$pdf->Cell( 30, 30, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 25), 1, 0, 'L', false );
$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 25);
$pdf->Cell(0,10, "PAG'ASA NATIONAL HIGH SCHOOL", 0, 1, 'C'); 
$pdf->Cell(0,10, "Summary of Load ", 0, 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 


				  $query_emp = mysql_query("SELECT * FROM employee_t WHERE emp_id='$emp_id'");
				  $row_emp = mysql_fetch_assoc($query_emp);
				  
				  $query_load = mysql_query("SELECT * FROM teacher_t WHERE emp_id='{$emp_id}'");
				  $row_load = mysql_fetch_assoc($query_load);

				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'");
				  $row_sy = mysql_fetch_assoc($query_sy);

$pdf->Cell(70,10, "", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(190,10, "SECTION DETAILS", 1, 1, '', true); 
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell(95,10, "NAME: ".$row_emp['l_name'].", ".$row_emp['f_name'], 1, '', ''); 
$pdf->Cell(95,10, "SCHOOL YEAR: ".$row_sy['sy_start']." - ".$row_sy['sy_end'], 1, 1, ''); 

$pdf->Cell(95,10, "MAX LOAD: ".$row_load['max_load'], 1, '', ''); 
$pdf->Cell(95,10, "ID NUMBER: ".$row_emp['emp_id']." - ".$row_sy['sy_end'], 1, 1, ''); 



$pdf->SetFont('Arial' , 'B' ,12);


$pdf->SetFillColor(150);
$pdf->Cell(190,10, "CLASSES", 1, 1, '', true); 

$pdf->SetFont('Arial' , 'B' ,9);


$pdf->Cell(39,8, "SUBJECT TITLE ", 1, '', 'C', true); 
$pdf->Cell(39,8, "SUBJECT CATEGORY ", 1, '', 'C', true); 
$pdf->Cell(34,8, "CREDIT UNIT ", 1, '', 'C', true); 
$pdf->Cell(39,8, "HOURS/WEEK ", 1, '', 'C', true); 
$pdf->Cell(39,8, "SECTION ", 1, 1, 'C', true); 

$pdf->SetFont('Arial' , '' , 9);


////
		  $total_unit=0;
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id='{$school_yr}' AND teacher_id={$emp_id}") or die( );
		  //$pdf->Cell(39,8, "this", 1, '', 'C'); 
		  while($row = mysql_fetch_assoc($query)){
			  

			      $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
				  $row_subject = mysql_fetch_assoc($query_subject);
				  //echo ; 

$pdf->Cell(39,8, $row_subject['subject_title'], 1, '', 'C'); 

				  $query_subj=mysql_query("SELECT * FROM subject_category_t WHERE category_id='{$row_subject['category_id']}'"); 
				  $row_subj=mysql_fetch_assoc($query_subj);
				  //echo ;
$pdf->Cell(39,8, $row_subj['category_name'], 1, '', 'C'); 

$pdf->Cell(34,8, $row_subject['credit_unit'], 1, '', 'C'); 
			      //echo ;
			      $total_unit += $row_subject['credit_unit'];

				      $time = unit_to_time($row_subject['credit_unit']);
				      $time = round($time*4)/4;
				      $whole1 = (int) $time;
				      $frac1 = (($time*100)%100)*.6;
$pdf->Cell(39,8, sprintf(" %d:%02d", $whole1, $frac1), 1, '', 'C' ); 
				      

			      if($row['section_id']!=NULL){
					  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id={$row['section_id']}");
                      $row_section = mysql_fetch_assoc($query_section);
                      //echo ;

$pdf->Cell(39,8,  $row_section['section_name'], 1, 1, 'C' ); 
				  }
				  else{
					  //echo "-";  
$pdf->Cell(39,8, "-", 1, '', 'C', true); 
				  }

          }

				  $time = unit_to_time($total_unit);
				  $time = round($time*4)/4;
				  $whole1 = (int) $time;
				  $frac1 = (($time*100)%100)*.6;
				  

$pdf->Cell(78,8, "TOTAL UNITS:", 1, '', 'R'); 
$pdf->Cell(34,8, $total_unit, 1, '', 'C'); 
$pdf->Cell(39,8, sprintf(" %02d:%02d", $whole1, $frac1), 1, '', 'C'); 
$pdf->Cell(39,8, "", 1, 1, 'C'); 









$pdf->Output();

?>

                <?php 
				  require_once "../db/db.php";
				?>
                
              </td>
              <td>
                <?php 
				  require_once "../db/db.php";
				?>
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
                <th>Units</th>
                <th>Hours/Week</th>
                <th>Section</th>

        </tr>
        <?php
          require_once "../db/db.php";
		  //include "actions/class_functions.php";
		  //$sy_id = get_active_sy();
		  $total_unit=0;
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id='{$school_yr}' AND teacher_id={$emp_id}") or die(mysql_error());
		  while($row = mysql_fetch_assoc($query)){?>
		      <tr>
              <td>
              <center>
			  <?php // echo $row['subject_code'];
			      $query_subject = mysql_query("SELECT * FROM subject_t WHERE subject_code={$row['subject_code']}");
				  $row_subject = mysql_fetch_assoc($query_subject);
				  $category_id=$row_subject['category_id'];
				  echo $row_subject['subject_title']; 
			  ?>
              </center>
              </td>
             
              <td><center> 
			  <?php
			   $query_subj=mysql_query("SELECT * FROM subject_category_t WHERE category_id='$category_id'"); 
			   $row_subj=mysql_fetch_assoc($query_subj);
			   echo $row_subj['category_name'];
			  		?></center></td>
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
				  printf(" %02d:%02d", $whole1, $frac1);
			  ?>
              </center>
              </td>
              <td><center>
			  <?php //echo $row['class_id'];
			      $query_section = mysql_query("SELECT * FROM section_t WHERE section_id={$row['section_id']}");
				  $row_section = mysql_fetch_assoc($query_section);
				  echo $row_section['section_name'];
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
                <hr style=" width:50%; border:1px solid black;" />
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