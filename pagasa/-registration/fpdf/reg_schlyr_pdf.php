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

$pdf = new FPDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial' , 'B' , 14);
$pdf->Cell(0,10, "PAGASA NATIONAL HIGH SCHOOL", '', 1, 'C'); 
$pdf->Cell(0,10, "Lists of Students Enrolled in a School Year", '', 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 

$pdf->SetFillColor(150);
$pdf->Cell(80,10, "YEAR", 1, '', 'C', true); 
$pdf->SetFillColor(150);
$pdf->Cell(90,10, "NUMBER OF STUDENTS", 1, 1, 'C', true);       
		
$query_schoolyear=mysql_query("SELECT * FROM school_year_t");
			while($row_schoolyr=mysql_fetch_assoc($query_schoolyear)){
			$sy_id=$row_schoolyr['sy_id'];
			$sy_start=$row_schoolyr['sy_start'];
			$sy_end=$row_schoolyr['sy_end'];
			
			
			$query_yr=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sy_id");
			$count_yr=mysql_num_rows($query_yr);
			
			
$pdf->SetFont('Arial' , '' , 14);  
//$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(80,10, "".$sy_start."-".$sy_end."", 1, '', 'C'); 
$pdf->Cell(90,10, "$count_yr", 1, 1, 'C'); 
}

$pdf->Output();
?>