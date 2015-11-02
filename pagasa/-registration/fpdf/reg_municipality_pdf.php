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
$pdf->Cell(0,10, "Percentage of Students per Municipality", '', 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 

$pdf->SetFillColor(150);
$pdf->Cell(95,10, "MUNICIPALITY", 1, '', 'C', true); 
$pdf->SetFillColor(150);
$pdf->Cell(95,10, "NUMBER OF STUDENTS", 1, 1, 'C', true); 


$query_municipality=mysql_query("SELECT * FROM municipality_t");
			while($row_municipality=mysql_fetch_assoc($query_municipality)){
					$name=$row_municipality['municipality_name'];
								
					$count_name=0;
					$query_name=mysql_query("SELECT * from student_t WHERE city_municipality like '%$name%'");
						while($row_name=mysql_fetch_assoc($query_name)){ 
							$count_name=mysql_num_rows($query_name);
							
}
//$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(95,10, "$name", 1, '', 'C');
    
					$query_student=mysql_query("SELECT * FROM student_t");
					$count_student=mysql_num_rows($query_student);
					$percent=($count_name/$count_student)*100;
$pdf->Cell(95,10, "".$count_name."-".$percent."%", 1, 1, 'C');

	
}
$pdf->Output();
?>