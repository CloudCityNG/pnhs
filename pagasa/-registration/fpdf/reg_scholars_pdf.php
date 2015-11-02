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
$pdf->Cell(0,10, "Lists of Scholars", '', 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 
$name=$_GET['name'];
$pdf->Cell(0,10, "$name", '', 1); 
$pdf->SetFont('Arial' , '' , 14);
$pdf->SetFillColor(150);
$pdf->Cell(70,10, "STUDENT ID", 1, '', 'C', true); 
$pdf->SetFillColor(150);
$pdf->Cell(120,10, "STUDENT NAME", 1, 1, 'C', true);  


				$id=$_GET['id'];
		  		$query_stud=mysql_query("SELECT * FROM student_t WHERE scholarship=$id");
				while($row_stud=mysql_fetch_assoc($query_stud)){
					$student_id=$row_stud['student_id']; 			


//$pdf->Cell(0,10, "$id", '', 1);
$pdf->Cell(70,10, "$student_id", 1, '', 'C');
$pdf->Cell(120,10, "".$row_stud['l_name']." , ".$row_stud['f_name']." ".$row_stud['m_name']."", 1, 1); 
 
}


$pdf->Output();
?>