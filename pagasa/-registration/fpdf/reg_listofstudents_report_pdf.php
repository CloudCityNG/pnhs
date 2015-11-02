<?php

	mysql_connect("localhost","root","");
	mysql_select_db("pagasa");

require('fpdf.php');
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
$pdf->SetFont('Arial' , 'B' , 14);

	$sch_yr=$_GET['sy_id']; 
	$start=$_GET['start'];
	$end=$_GET['end'];
	
$pdf->Cell(0,10, "PAGASA NATIONAL HIGH SCHOOL", '', 1, 'C'); 
$pdf->Cell(0,10, "LIST OF STUDENTS S.Y.".$start."-".$end."", '', 1, 'C');


$pdf->Cell(0,10, "", '', 1, 'C'); 

$pdf->SetFillColor(150);
$pdf->Cell(70,10, "Student ID", 1, '', '', true); 
$pdf->SetFillColor(150);
$pdf->Cell(120,10, "Student Name", 1, 1, '', true); 

$query_reg=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.school_yr=$sch_yr AND student_t.student_id=student_registration_t.student_id");
						$count=mysql_num_rows($query_reg);
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

$pdf->SetFont('Arial' , '' , 14);					  
//$pdf->Cell(120,10, "$id", 1, 1);  
$pdf->Cell(70,10, "$stud_id", 1, '', 'C'); 
$pdf->Cell(120,10, "".$row_reg['l_name']." , ".$row_reg['f_name']." ".$row_reg['m_name']."", 1, 1); 
		} 
$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(70,10, "Total Number of Students: ".$count."", '', 1); 

		
$pdf->Output();
?>
						