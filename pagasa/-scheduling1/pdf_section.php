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
		  

	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$section_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];
	
	
	
$image1 = "../images/pnhs_logo.png";
//$pdf->Cell( 30, 30, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 25), 1, 0, 'L', false );
$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 25);
$pdf->Cell(0,10, "PAG'ASA NATIONAL HIGH SCHOOL", 0, 1, 'C'); 
$pdf->Cell(0,10, "Summary of Load - ".$sec."", 0, 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 


				  $query_section = mysql_query("SELECT * FROM section_t WHERE section_id='$section_id'");
				  $row_section = mysql_fetch_assoc($query_section);
				  
				  $year_level = $row_section['year_level'];
			      $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id={$year_level}") or die(mysql_error());
				  $row_lvl = mysql_fetch_assoc($query_lvl);
				  
				  $query_sy = mysql_query("SELECT * FROM school_year_t WHERE sy_id='{$school_yr}'");
				  $row_sy = mysql_fetch_assoc($query_sy);

$pdf->Cell(70,10, "", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(190,10, "SECTION DETAILS", 1, 1, '', true); 
$pdf->SetFont('Arial' , '' , 9);

$pdf->Cell(95,10, "NAME: ".$row_section['section_name'], 1, '', ''); 
$pdf->Cell(95,10, "SCHOOL YEAR: ".$row_sy['sy_start']." - ".$row_sy['sy_end'], 1, 1, ''); 

$pdf->Cell(95,10, "YEAR LEVEL: ".ucfirst($row_lvl['lvl_name']), 1, '', ''); 
$pdf->Cell(95,10, "CURRICULUM: ".$row_section['curriculum_code'], 1, 1, ''); 


$pdf->SetFont('Arial' , 'B' ,12);


$pdf->SetFillColor(150);
$pdf->Cell(190,10, "CLASSES", 1, 1, '', true); 

$pdf->SetFont('Arial' , 'B' ,9);


$pdf->Cell(39,8, "SUBJECT TITLE ", 1, '', 'C', true); 
$pdf->Cell(39,8, "SUBJECT CATEGORY ", 1, '', 'C', true); 
$pdf->Cell(34,8, "CREDIT UNIT ", 1, '', 'C', true); 
$pdf->Cell(39,8, "HOURS/WEEK ", 1, '', 'C', true); 
$pdf->Cell(39,8, "TEACHER ", 1, 1, 'C', true); 

$pdf->SetFont('Arial' , '' , 9);

       //   <th>Subject Title</th>
       //   <th>Subject Category</th>
       //   <th>Credit Unit</th>
       //   <th>Hours/Week</th>
       //   <th>Teacher</th>

		  $total_unit=0;
		  $query = mysql_query("SELECT * FROM class_t WHERE sy_id='{$school_yr}' AND section_id='{$section_id}'") or die( );
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
				      

			      if($row['teacher_id']!=NULL){
					  $query_teacher = mysql_query("SELECT * FROM employee_t WHERE emp_id={$row['teacher_id']}");
					  $row_teacher = mysql_fetch_assoc($query_teacher);
					  //echo;
$pdf->Cell(39,8,  $row_teacher['f_name']." ".$row_teacher['l_name'], 1, 1, 'C' ); 
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

		      <tr>
           
              <td><center>
			  <?php // echo $row['subject_code'];
			  ?></center>
              </td>
                 <td>
                 <center> 
			  	<?php
			  		?></center>
                 </td>
              <td>
              <center>
			  <?php 
			  ?>
              </center>
              </td>
              
              <td>
                  <center>
				  <?php 
				  ?>
                  </center>
                  </td>
              <td><center>
			  <?php //echo $row['teacher_id'];
			  ?></center>
              </td>
             
              </tr>
		<?php
		?>
            <tr>
              <td></td>
              <td align="right"><b>Total: </b></td>
              <td >
                <center>
                <hr style=" width:60%; border:1px solid black;" />
                </center>
               
              </td>
              <td >
                <center>
                <hr style=" width:60%; border:1px solid black;" />
			    <?php 
			    ?>
                </center> 
              </td>
              <td></td>
            </tr>
        </table>
        </td>
      </tr>
    </table>
