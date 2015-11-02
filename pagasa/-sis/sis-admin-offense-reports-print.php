<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
@session_start();	
if ($_SESSION['username']) {
	$username = $_SESSION['username'];
	
	//$s_type=("employee");
	//if($_SESSION['user_type']==$s_type){
		
		
		//header("location: SIS-Home_restrict2.php");
		
	//	}
	
}
else
	header("location: restrict.php"); // IMPORTANT!!!!
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
<br />
<?php 
include('../db/db.php');
if(isset($_GET['s_year'])){
	$s_year = $_GET['s_year'];
	$queryactual = mysql_query("SELECT * FROM school_year_t WHERE sy_id = '$s_year'");
	$getactual = mysql_fetch_assoc($queryactual);
	
	echo '<h1>Student Offense Reports of SY '.$getactual['sy_start'].'-'.$getactual['sy_end'].'</h1>';
?>


<?php

	  $queryoff = mysql_query("SELECT * FROM discipline_offense_t");
	//  $querystat = mysql_query("SELECT * FROM student_offense_list_t");
	  $looptime=0;
	  while($getoff = mysql_fetch_assoc($queryoff)){
		
	  ?>
<h4><?php echo $off = $getoff['offense_description'];
	$offcode = $getoff['offense_code']; ?></h4>
                            <?php
							$count=0;
				$queryname = mysql_query("SELECT * FROM student_offense_list_t WHERE offense_code = '$offcode' AND school_year = '$s_year'");
				while($getname = mysql_fetch_assoc($queryname)){

				$name = $getname['offense_code'];
								
				//$population = count($name);
				$count=$count+1;
				}
				//$population = $population*$count;
				?>
                            
							<span class="value">	<?php
				if($count == '0'){
				echo '0';}
				else{			
				echo $count; 
				}
				$count=0;
				
				?></span>					

 
         <?php
   		$looptime = $looptime+1;  


				echo '<br>';
			  }
}
			?>   

</body>
</html>