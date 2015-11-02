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

if(isset($_GET['section_id'])){
	          $sec_id = $_GET['section_id'];  
		  	}
	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$sec_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];

$pdf->Cell(0,10, "PAGASA NATIONAL HIGH SCHOOL", '', 1, 'C'); 
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
			

						$query_reg2=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.student_id=student_t.student_id AND student_registration_t.section_id=$sec_id AND student_registration_t.school_yr=$sch_yr AND student_t.gender='Male'");
						$count=mysql_num_rows($query_reg2);
						while($row_reg2=mysql_fetch_assoc($query_reg2)){
							$id=$row_reg2['student_id'];

								
                          
$pdf->SetFont('Arial' , '' , 12);
$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(120,10, "".strtoupper($row_reg2['l_name'])." , ".strtoupper($row_reg2['f_name'])." ".ucfirst($row_reg2['m_name'])."", 1, 1); 

}
$pdf->Cell(70,10, "Male: ".$count.""); 


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
	          $sec_id = $_GET['section_id'];  
		  	}
	$query_section=mysql_query("SELECT * from section_t WHERE section_id=$sec_id");
	$row_section=mysql_fetch_assoc($query_section);
	$sec=$row_section['section_name'];
			 


	$query_sy=mysql_query("SELECT * FROM school_year_t");
			while($row_sy=mysql_fetch_array($query_sy)){
			$sch_yr=$row_sy['sy_id']; }
			
				$query_reg=mysql_query("SELECT * FROM student_registration_t, student_t WHERE student_registration_t.student_id=student_t.student_id AND student_registration_t.section_id=$sec_id AND student_registration_t.school_yr=$sch_yr AND student_t.gender='Female'");
						$count1=mysql_num_rows($query_reg);
						while($row_reg=mysql_fetch_assoc($query_reg)){
							$id=$row_reg['student_id'];


$pdf->SetFont('Arial' , '' , 12);
$pdf->Cell(70,10, "$id", 1); 
$pdf->Cell(120,10, "".strtoupper($row_reg['l_name'])." , ".strtoupper($row_reg['f_name'])." ".ucfirst($row_reg['m_name'])."", 1, 1); 

}
$pdf->Cell(70,10, "Female: ".$count1."", '', 1); 
$total=$count+$count1;
$pdf->Cell(70,10, "Total Number: ".$total.""); 
	

$query_adviser=mysql_query("SELECT * FROM section_t WHERE section_id=$sec_id"); 
						$row_adviser=mysql_fetch_assoc($query_adviser);
						$adviser_id=$row_adviser['class_adviser_id'];
					$query_employee=mysql_query("SELECT * FROM employee_t WHERE emp_id=$adviser_id");
						$row_employee=mysql_fetch_assoc($query_employee);
						$fname=$row_employee['f_name'];
						$lname=$row_employee['l_name'];
                
$pdf->SetFont('Arial' , '' , 14);
$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(70,10, "", '', 1);
$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(70,10, "", '', 1); 
$pdf->Cell(0,10, "".ucfirst($fname)." ".ucfirst($lname)."", 'C', 1, 'C'); 
$pdf->Cell(0,10, "Class Adviser", 'C', 1, 'C'); 
$pdf->Output();

?>