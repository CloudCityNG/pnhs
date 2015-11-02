<?php


require_once "../db/db.php";

require "actions/sched_functions.php";
include "actions/subject_functions.php";
include "actions/section_functions.php";
include "actions/class_functions.php";


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




if(isset($_GET['lvl_id'])){
  $lvl_id = $_GET['lvl_id'];  
}
		  
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
$pdf->Cell(0,10, "List of Sections ", 0, 1, 'C'); 
$pdf->Cell(0,10, "", '', 1, 'C'); 




 $set = "";
		  if(isset($lvl_id)){
		    $set = "WHERE lvl_id='{$lvl_id}'";
		  }
		  $query_top = mysql_query("SELECT * FROM year_level_t ".$set) or die();
		  while($row = mysql_fetch_assoc($query_top)){
	          $lvl = $row['lvl_id'];

									    $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$lvl}'") or die(mysql_error()); 
									    $row_lvl = mysql_fetch_assoc($query_lvl);
										//echo ucfirst($row_lvl['lvl_name']);
                                        $total_units = get_total_units($lvl);
										$total_time = print_time($total_units);
										//echo "Total Units: ".$total_units." / ".$total_time." hrs";
$pdf->Cell(70,10, "", '', 1); 
$pdf->SetFillColor(150);
$pdf->Cell(190,10, "LIST OF SECTIONS(".ucfirst($row_lvl['lvl_name']).")", 1, 1, '', true); 

$pdf->SetFont('Arial' , 'B' , 9);


$pdf->Cell(39,8, "SECTION NAME ", 1, '', 'C', true); 
$pdf->Cell(39,8, "SECTION NO ", 1, '', 'C', true); 
$pdf->Cell(34,8, "SECTION SIZE ", 1, '', 'C', true); 
$pdf->Cell(39,8, "# OF STUDENTS ", 1, '', 'C', true); 
$pdf->Cell(39,8, "CURRICULUM ", 1, 1, 'C', true); 
		
		
$pdf->SetFont('Arial' , '' , 9);
		     
										$query = mysql_query("SELECT * FROM section_t WHERE year_level='{$lvl}'");
										$total_students = 0;
										while($row = mysql_fetch_assoc($query)){
										$section_id=$row['section_id']; 
										

										$yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row['year_level']}'");
										$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);

$pdf->Cell(39,8, $row['section_name'], 1, '', 'C'); 
$pdf->Cell(39,8, $row['section_no'], 1, '', 'C'); 
$pdf->Cell(34,8, $row['section_size'], 1, '', 'C'); 
$pdf->Cell(39,8, section_students($section_id, get_active_sy()), 1, '', 'C'); 
$pdf->Cell(39,8, $row['curriculum_code'], 1, 1, 'C'); 

									    }
                                          
$pdf->Cell(112,8, "Total Number of Students: " , 1, '', 'R'); 	
$pdf->Cell(39,8,  $total_students , 1, '', 'C'); 										  
$pdf->Cell(39,8,  $total_students , 1, 1, 'C'); 										  
       
		  }
        





$pdf->Output();

?>

<?php
	      $set = "";
		  if(isset($lvl_id)){
		    $set = "WHERE lvl_id='{$lvl_id}'";
		  }
		  $query_top = mysql_query("SELECT * FROM year_level_t ".$set) or die();
		  while($row = mysql_fetch_assoc($query_top)){
	          $lvl = $row['lvl_id'];
	  ?>
    					 		<div class="widget-header">
                                    <h3>
									<?php
									    $query_lvl = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$lvl}'") or die(mysql_error()); 
									    $row_lvl = mysql_fetch_assoc($query_lvl);
										//echo ucfirst($row_lvl['lvl_name']);
									    
									?>
                                    </h3>
                                    <div class="pull-right">
                                    <h3>
                                    <?php
                                        $total_units = get_total_units($lvl);
										$total_time = print_time($total_units);
										//echo "Total Units: ".$total_units." / ".$total_time." hrs";
									?>
                                    
                                    </h3>
                                    </div>
                                </div>
                                <table width="100%" style="border:1px solid black;">
                                    <tr>
                                        <td bgcolor="#999999" style="background-color:#999999">List of Sections (<?php echo ucfirst($row_lvl['lvl_name']);?>)</td>
                                    </tr>
                                    <tr>
                                      <td>
                                <table style="" cellpadding="0" cellspacing="0" border="0" class=" table-bordered table-striped" id="ta<?php echo $lvl;?>" width="100%">
                                    
                                    <thead>
                                        <tr>
                                            <th>Section name</th>
                                            <th align="center">Sectino no</th>
                                            <th>Section Size</th>
                                            <th>No. of Students</th>
                                            <th>Curriculum</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                    
                                     <?php 				     
										include('../db/db.php');
										$query = mysql_query("SELECT * FROM section_t WHERE year_level='{$lvl}'");
										
										$total_students = 0;
										while($row = mysql_fetch_assoc($query)){
										$section_id=$row['section_id']; ?>
										
										<?php
										$yr_lvl_query = mysql_query("SELECT * FROM year_level_t WHERE lvl_id='{$row['year_level']}'");
										$yr_lvl_data = mysql_fetch_assoc($yr_lvl_query);
										?>
										
										<tr class=" odd del<?php echo $section_id; ?>">
                                          
										  <td><center><?php echo $row['section_name']; ?></center></td>
										  <td><center><?php echo $row['section_no'];?></center></td>
										  <td><center><?php echo $row['section_size'];?></center></td>
                                          <td><center><?php echo section_students($section_id, get_active_sy()) ; $total_students+=section_students($section_id, get_active_sy()) ;?></center></td>
										  <td><center><?php echo $row['curriculum_code'];?></center></td>
										  
										</tr>
										
									  <?php }?>
                                    	
                                    </tbody>
                                    <tfoot>
                                        <tr class=" odd del<?php echo $section_id; ?>">
                                          
										  <td colspan="3"><div align="right"> <strong>Total number of Students: </strong></div></td>
                                          <td><hr style="border:1px solid black; width:50%;" /><center><?php echo $total_students ;?></center></td>
										  <td></td>
										  
										</tr>
                                    </tfoot>
                                </table>
                                        </td>
                                    </tr>
                                </table>
        <?php
		  }
        ?>