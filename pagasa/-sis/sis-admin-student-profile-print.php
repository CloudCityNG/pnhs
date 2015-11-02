<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}
else
{
header("location: ../restrict.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}

</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 


<title>Print Student Profile</title>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<br />

     <?php
require('../db/db.php');
	
	 if(isset($_GET['student_id'])){
	  $student_id = $_GET['student_id'];
	 
	
	$search2 = mysql_query("select * from student_t where student_id = '$student_id' ");
	$finddata = mysql_fetch_assoc($search2);
 
	
	  ?>

      

    
  					<div align="center">
					<img src="../images/pnhs_logo.png" align="middle" />
					<br />
                    PAGASA NATIONAL HIGH SCHOOL<br />
                    Student's Profile
                    </div>
                    <br />
			<div style="border:1px solid #000;width:850px;margin-left:auto;margin-right:auto;">

					
						 <table class="table" width="816" cellpadding="0" cellspacing="0" border="1">
                         <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>BASIC INFORMATION</strong></td>
						  </tr>
                        	<tr><td>
						    <div class="control-group">
						      <label class="control-label" for="name">FIRST NAME</label>
						      <div class="controls">
						       <?php echo $finddata['f_name'];?>
						      </div>
						    </div>
                            <hr color="#000000" />
						    <div class="control-group">
						      <label class="control-label" for="email">MIDDLE NAME</label>
						      <div class="controls">
						       <?php echo $finddata['m_name'];?>
						      </div>
						    </div> 
                            <hr color="#000000" />
						    <div class="control-group">
						      <label class="control-label" for="subject">LAST NAME</label>
						      <div class="controls">
						        <?php echo $finddata['l_name'];?>
						      </div>
						    </div>
                            <hr color="#000000" />
                            <div class="control-group">
						      <label class="control-label" for="subject">DATE OF BIRTH</label>
						      <div class="controls">
						        <?php echo $finddata['birthdate'];?>
						      </div>
						    </div>
                            <hr color="#000000" />
                           <div class="control-group">
				            <label class="control-label">GENDER</label>
				            <div class="controls">
				              <label class="control-label">
                              <?php echo $finddata['gender'];?>
				              </label>
				            </div>
				          </div></td>
                          <td align="center"><?php $result=mysql_query("SELECT * FROM student_t WHERE student_id = '$student_id'");
		$row=mysql_fetch_assoc($result);
			$image=$row['photo'];
			 ?>
       <img src="../-registration/large/<?php echo $image; ?>" style="height:160px" width="175px" ></td>
                          </tr>
                          
                          <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>ADDRESS</strong></td>
						  </tr>
						<tr><td>
						<div class="control-group">
						      <label class="control-label" for="subject">ZIP CODE</label>
						      <div class="controls">
						        <?php echo $finddata['zip_code'];?>
						      </div>
						    </div>
                            </td>
                            <td>
                            <div class="control-group">
 						<label class="control-label" for="validateSelect">CITY/MUNICIPALITY</label>
				            <div class="controls">
				          <label class="control-group">
                            <?php echo $finddata['city_municipality'];
													 ?>" </label>
                              </div>
						    </div></td>
                            </tr>
                            <tr><td>
                           <div class="control-group">
						      <label class="control-label" for="subject">STREET</label>
						      <div class="controls">
						        <?php echo $finddata['street'];?>
						      </div>
						    </div></td>
                            <td>
                            <div class="control-group">
						      <label class="control-label" for="subject">PROVINCE</label>
						      <div class="controls">
						        <?php echo $finddata['province'];?>
						      </div>
						    </div></td>
                            </tr>
                            <tr><td>
                            
                            <div class="control-group">
						      <label class="control-label" for="subject">BARANGAY</label>
						      <div class="controls">
						      <?php echo $finddata['barangay'];?>"
						      </div>
						    </div></td>
                            </tr>

                             <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>PARENTS/GUARDIAN</strong></td>
						  </tr>
                          <tr><td>
                            <div class="control-group">
						      <label class="control-label" for="subject">NAME OF PARENT/GUARDIAN</label>
						      <div class="controls">
						        <?php echo $finddata['name_of_parent_guardian'];?>"
						      </div>
						    </div></td>
                            </tr>
                            <tr><td>
                            <div class="control-group">
				            <label class="control-label">RELATION TO THE GUARDIAN</label>
				            <div class="controls">
				              <label class="control-label">
                              <?php echo $finddata['relation_to_student'];?>
				              </label>
				            </div>
				          </div></td>
                          </tr>
                           <tr>
							<td colspan="8" style="background-color:#969696;font-size:23px;font-style:italic;"><strong>OTHER INFORMATION</strong></td>
						  </tr>
                          <tr><td>
                          <div class="control-group">
						      <label class="control-label" for="subject">NAME OF LAST SCHOOL ATTENDED</label>
						      <div class="controls">
						       <?php echo $finddata['name_of_last_school_attended'];?>						      </div>
						    </div></td>
                            </tr>
						    <tr><td>
				          <div class="control-group">
                           <?php
						   echo "<p align='center'>";
									echo "<div class='alert alert-error'>";
									echo "<strong>";
									echo "Note: if none, select \"NONE\"";
									echo "</strong>";
									echo "</div>";
							echo "</p>";
							?>

				          <label class="control-label" for="validateSelect">SCHOLARSHIP</label>
				            <div class="controls">
				          <label class="control-label">
                           <?php echo $sch=$finddata['scholarship'];?></label>
				            </div>
				          </div></td>
                          </tr>
                          <tr><td>
                          <div class="control-group">
						      <label class="control-label" for="subject">EXAM RESULT</label>
						      <div class="controls">
						        <?php echo $finddata['exam_result'];?>"
						      </div>
						    </div>
							</td></tr>
                             </table>
                         

					
                    </div>
                <?php
	 }
	 ?>


<!-- JS -->
<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../js/Application.js"></script>

<script src="../js/charts/area.js"></script>
<script src="../js/charts/donut.js"></script>
<script type="text/javascript">
$(window).scroll(function() {

    //After scrolling 100px from the top...
    if ( $(window).scrollTop() >= 100 && false ) {
        //$('#head').css('display', 'none');
		//$('#small-head').css('position','fixed');

        //$('#menuheader').css('margin', '65px auto 0');

    //Otherwise remove inline styles and thereby revert to original stying
    } else {
        $('#head').attr('style', '');
		$('#small-head').attr('style', '');

    }
});

$(window).load(function(){
   
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   
   $('#overlay').fadeOut();

});
</script>

<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../DataTable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#example').dataTable({
		    "bJQueryUI": true		});
	} );
</script>

<script src="../js/libs/jquery-1.8.3.min.js"></script>
<script src="../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../js/libs/bootstrap.min.js"></script>

<script src="../js/plugins/validate/jquery.validate.js"></script>

<script src="../js/Application.js"></script>
<script src="../js/demo/validation.js"></script>
<!-- JS -->
</body>
</html>