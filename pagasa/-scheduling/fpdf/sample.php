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


if(true){
	          $section_id = 102;  
		  	}
	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$section_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];

$pdf->Cell(0,10, "PAG'ASA NATIONAL HIGH SCHOOL", '', 1, 'C'); 
$pdf->Cell(0,10, "MASTERLIST- ".$sec."", '', 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 


$pdf->Cell(70,10, "MALE", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(70,10, "Student ID", 1, '', '', true); 
$pdf->SetFillColor(150);
$pdf->Cell(120,10, "Student Name", 1, 1, '', true); 


	$query_sy=mysql_query("SELECT * FROM school_year_t");
			while($row_sy=mysql_fetch_array($query_sy)){
			$sch_yr=$row_sy['sy_id']; }
			
			$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr");
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

						$query_reg2=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$stud_id' AND section_id=$section_id");
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$id' AND gender='Male'");
							
								while($row_stud=mysql_fetch_assoc($query_stud)){
						
$pdf->SetFont('Arial' , '' , 12);
$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(120,10, "".$row_stud['l_name']." , ".$row_stud['f_name']." ".$row_stud['m_name']."", 1, 1); 


		}
	}
}

$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(70,10, "", '', 1); 

$pdf->SetFont('Arial' , 'B' , 14);
$pdf->Cell(70,10, "FEMALE", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(70,10, "Student ID", 1, '', '', true); 
$pdf->SetFillColor(150);
$pdf->Cell(120,10, "Student Name", 1, 1, '', true); 


if(isset($_GET['section_id'])){
	          $section_id = $_GET['section_id'];  
		  	}
	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$section_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];
			 


	$query_sy=mysql_query("SELECT * FROM school_year_t");
			while($row_sy=mysql_fetch_array($query_sy)){
			$sch_yr=$row_sy['sy_id']; }
			
			$query_reg=mysql_query("SELECT * FROM student_registration_t WHERE school_yr=$sch_yr");
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$stud_id=$row_reg['student_id'];	

						$query_reg2=mysql_query("SELECT * FROM student_registration_t WHERE student_id='$stud_id' AND section_id=$section_id");
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];
							$query_stud=mysql_query("SELECT * FROM student_t where student_id='$id' AND gender='Female'");
							
								while($row_stud=mysql_fetch_assoc($query_stud)){

$pdf->SetFont('Arial' , '' , 12);
$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(120,10, "".$row_stud['l_name']." , ".$row_stud['f_name']." ".$row_stud['m_name']."", 1, 1); 

		}
	}
}

$pdf->Output();

?>

