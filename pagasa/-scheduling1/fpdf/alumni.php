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
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial' , 'B' , 14);

$query_schyr=mysql_query("SELECT * FROM school_year_t");
								$count=mysql_num_rows($query_schyr);
								$count=$count-2;
								$query_prev=mysql_query("SELECT * FROM school_year_t LIMIT $count,1");
								$row_prev=mysql_fetch_assoc($query_prev);
								$sch_yr=$row_prev['sy_id'];	
								
$pdf->Cell(0,10, "PAG'ASA NATIONAL HIGH SCHOOL", '', 1, 'C'); 
$pdf->Cell(0,10, "Graduated Students in year ".$row_prev['sy_start']."-".$row_prev['sy_end']."", '', 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 

$pdf->Cell(70,10, "MALE", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(70,10, "Student ID", 1, '', '', true); 
$pdf->SetFillColor(150);
$pdf->Cell(120,10, "Student Name", 1, 1, '', true); 
}
$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr AND year_level=6");
						$countt=1;
						$count++;
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$stud_id' AND gender='Male'");
								while($row_stud=mysql_fetch_assoc($query_stud)){
							
			  
$pdf->Cell(120,10, $id1, 1, 1); 
$pdf-Cell(120,10,$countt, 1, 1);
$pdf->Cell(120,10, "".$row_stud['l_name']." , ".$row_stud['f_name']." ".$row_stud['m_name']."", 1, 1); 
}          

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial' , 'B' , 14);
$pdf->Cell(70,10, "FEMALE"); 

$pdf->Output();
?>