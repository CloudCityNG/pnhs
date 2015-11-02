<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../db/db.php";
session_start();

if(isset($_SESSION['account_no'])){
	$account_no = $_SESSION['account_no'];
}

else
	header("location: ../restrict.php"); // IMPORTANT!!!!
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
<title>Print Certification of Good Moral Character</title>
</head>

<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
  <div id="container" align="center">
      <div id="header">
		<img src="../images/banner.jpg" width="100%" />
      </div>
<br />
<br />
<?php
include('../db/db.php');
if(isset($_GET['syear'])&&isset($_GET['club'])){
	$club_id = $_GET['club'];
	$syear = $_GET['syear'];
	
	$queryyear = mysql_query("SELECT * FROM school_year_t WHERE sy_id = '$syear'");
	$getyear = mysql_fetch_assoc($queryyear);
	
	
?>

                    
                   <?php
				   $querycname = mysql_query("SELECT * FROM club_t WHERE club_id = '$club_id'");
				   $getcname = mysql_fetch_assoc($querycname);
				   
				   ?>
								<h4><?php echo $getcname['club_name']; ?></h4>
                                <h5>MEMBERS LIST FOR SCHOOL YEAR <?php echo $getyear['sy_start']?>-<?php echo $getyear['sy_end']?></h5>
                                


       
       <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <thead bgcolor="#666666">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
      
                    </tr>
                </thead>
                <tbody>
  <?php
		$querymem = mysql_query("SELECT * FROM club_members_t WHERE club_id = '$club_id' AND academicyear_joined = '$syear'");
		while($getmem = mysql_fetch_assoc($querymem)){
			$ay_joined = $getmem['academicyear_joined'];
			//if($ay_joined == $year){
								?>
                    <tr class="del<?php echo $club_id ?>"  align="center">
                         <td><?php  
		$sid = $getmem['student_id'];
		$queryname = mysql_query("SELECT * FROM student_t WHERE student_id = '$sid'");
		$getname = mysql_fetch_assoc($queryname);
		echo $getname['f_name'];
									?></td>
						            <td><?php echo $getname['l_name'];?></td>
						            <td><?php  $pos=$getmem['position'];
												$querydef = mysql_query("SELECT * FROM club_position_t WHERE position_id = '$pos'");
												$getdef = mysql_fetch_assoc($querydef);
												echo $getdef['position_desc']; ?></td>

						          </tr>
                                  <?php
		//}
		}
		?>
						        </tbody>
						      </table>

						      
<?php
}

?>
       

</body>
</html>