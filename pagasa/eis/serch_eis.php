<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include("../db/db.php");
?>
<form action="search_eis.php" method="post">
<table>
<tr>
<td>Search by:</td>
<td>
<select name="category">
<option value="teaching">Teaching staff</option>
<option value="non-teaching">Non-teaching staff</option>

<option value="f_name">First name</option>
<option value="l_name">Last name</option>
<option value="address">Address</option>
<option value="gender">Gender</option>
<option value="civil_status">Civil status</option>

<option value="name_of_school">School graduated</option>
<option value="degree_course">Course taken</option>
</select>
</td>
<td><input name="tofind" type="text" /></td>
<td><input name="search" value="Search" type="submit" /></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['search'])){
	$category = $_POST['category'];
	$tofind = $_POST['tofind'];
	?>
    <table width="100%" class="">
	<tr>
	<td><i class="icon-magnifying-glass"></i>&nbsp;<strong>Search Results</strong></td>
	</tr>
	<tr>
	<td><hr /></td>
	</tr>
    <?php
	
	if($category == 'f_name'){
		$queryfname = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		while($getfname = mysql_fetch_assoc($queryfname)){
			$empid1 = $getfname['emp_id'];
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid1; ?>"><?php echo $getfname['f_name'].'&nbsp;'.$getfname['m_name'].'&nbsp;'.$getfname['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname1= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid1'");
	  $getpicname1 = mysql_fetch_assoc($querypicname1);
	  $picname1 = $getpicname1['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname1 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'l_name'){
		$querylname = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		while($getlname = mysql_fetch_assoc($querylname)){
			$empid2 = $getlname['emp_id'];
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid2; ?>"><?php echo $getlname['f_name'].'&nbsp;'.$getlname['m_name'].'&nbsp;'.$getlname['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname2= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid2'");
	  $getpicname2 = mysql_fetch_assoc($querypicname2);
	  $picname2 = $getpicname2['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname2 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'address'){
		$queryadd = mysql_query("SELECT * FROM employee_t WHERE address like \"%$tofind%\"");
		while($getadd = mysql_fetch_assoc($queryadd)){
			$empid3 = $getadd['emp_id'];
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid3; ?>"><?php echo $getadd['f_name'].'&nbsp;'.$getadd['m_name'].'&nbsp;'.$getadd['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname3= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid3'");
	  $getpicname3 = mysql_fetch_assoc($querypicname3);
	  $picname3 = $getpicname3['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname3 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'gender'){
		$querygender = mysql_query("SELECT * FROM employee_t WHERE gender like \"%$tofind%\"");
		while($getgender = mysql_fetch_assoc($querygender)){
			$empid4 = $getgender['emp_id'];
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid4; ?>"><?php echo $getgender['f_name'].'&nbsp;'.$getgender['m_name'].'&nbsp;'.$getgender['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname4= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid4'");
	  $getpicname4 = mysql_fetch_assoc($querypicname4);
	  $picname4 = $getpicname4['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname4 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'civil_status'){
		$querycs = mysql_query("SELECT * FROM employee_t WHERE civil_status like \"%$tofind%\"");
		while($getcs = mysql_fetch_assoc($querycs)){
			$empid5 = $getcs['emp_id'];
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid5; ?>"><?php echo $getcs['f_name'].'&nbsp;'.$getcs['m_name'].'&nbsp;'.$getcs['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname5= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid5'");
	  $getpicname5 = mysql_fetch_assoc($querypicname5);
	  $picname5 = $getpicname5['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname5 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'name_of_school'){
		$querynamesch = mysql_query("SELECT * FROM eis_educ_bg_t WHERE name_of_school like \"%$tofind%\"");
		while($getnamesch = mysql_fetch_assoc($querynamesch)){
			$empid6 = $getnamesch['emp_id'];
			$querynameschool = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$empid6'");
			$getnameschool = mysql_fetch_assoc($querynameschool);
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid6; ?>"><?php echo $getnameschool['f_name'].'&nbsp;'.$getnameschool['m_name'].'&nbsp;'.$getnameschool['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname6= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid6'");
	  $getpicname6 = mysql_fetch_assoc($querypicname6);
	  $picname6 = $getpicname6['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname6 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'degree_course'){
		$querydegree = mysql_query("SELECT * FROM eis_educ_bg_t WHERE degree_course like \"%$tofind%\"");
		while($getdegree = mysql_fetch_assoc($querydegree)){
			$empid7 = $getdegree['emp_id'];
			$querydeg = mysql_query("SELECT * FROM employee_t WHERE emp_id = '$empid7'");
			$getdeg = mysql_fetch_assoc($querydeg);
			?>
            <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $empid7; ?>"><?php echo $getdeg['f_name'].'&nbsp;'.$getdeg['m_name'].'&nbsp;'.$getdeg['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname7= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$empid7'");
	  $getpicname7 = mysql_fetch_assoc($querypicname7);
	  $picname7 = $getpicname7['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname7 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
			<?php
		}
	}

?>
  <?php
	
	if($category == 'teaching'){
		$queryfirst = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		$count4first = mysql_num_rows($queryfirst);
		if($count4first > 0){
		while($getfirst = mysql_fetch_assoc($queryfirst)){
			$emp = $getfirst['emp_id'];
		$queryrole = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp'");
		$getrole = mysql_fetch_assoc($queryrole);
		$role = $getrole['role_id'];
		
		$querypos = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role'");
		$getpos = mysql_fetch_assoc($querypos);
		$pos = $getpos['position_type'];
		
		if($pos == $category){
			?>
			 <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $emp; ?>"><?php echo $getfirst['f_name'].'&nbsp;'.$getfirst['m_name'].'&nbsp;'.$getfirst['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname8= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp'");
	  $getpicname8 = mysql_fetch_assoc($querypicname8);
	  $picname8 = $getpicname8['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname8 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}else{
		
		$querylast = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		$count4last = mysql_num_rows($querylast);
		if($count4last > 0){
		while($getlast = mysql_fetch_assoc($querylast)){
			$emp2 = $getlast['emp_id'];
		$queryrole2 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp2'");
		$getrole2 = mysql_fetch_assoc($queryrole2);
		$role2 = $getrole2['role_id'];
		
		$querypos2 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role2'");
		$getpos2 = mysql_fetch_assoc($querypos2);
		$pos2 = $getpos2['position_type'];
		
		if($pos2 == $category){
			?>
			 <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $emp2; ?>"><?php echo $getlast['f_name'].'&nbsp;'.$getlast['m_name'].'&nbsp;'.$getlast['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname9= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp2'");
	  $getpicname9 = mysql_fetch_assoc($querypicname9);
	  $picname9 = $getpicname9['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname9 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}
		}
		
	}
?>
  <?php
	
	if($category == 'non-teaching'){
		$queryfirst2 = mysql_query("SELECT * FROM employee_t WHERE f_name like \"%$tofind%\"");
		$count4first2 = mysql_num_rows($queryfirst2);
		if($count4first2 > 0){
		while($getfirst2 = mysql_fetch_assoc($queryfirst2)){
			$emp3 = $getfirst2['emp_id'];
		$queryrole3 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp3'");
		$getrole3 = mysql_fetch_assoc($queryrole3);
		$role3 = $getrole3['role_id'];
		
		$querypos3 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role3'");
		$getpos3 = mysql_fetch_assoc($querypos3);
		$pos3 = $getpos3['position_type'];
		
		if($pos3 == $category){
			?>
			 <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $emp; ?>"><?php echo $getfirst2['f_name'].'&nbsp;'.$getfirst2['m_name'].'&nbsp;'.$getfirst2['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname10= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp3'");
	  $getpicname10 = mysql_fetch_assoc($querypicname10);
	  $picname10 = $getpicname10['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname10 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}else{
		
		$querylast2 = mysql_query("SELECT * FROM employee_t WHERE l_name like \"%$tofind%\"");
		$count4last2 = mysql_num_rows($querylast2);
		if($count4last2 > 0){
		while($getlast2 = mysql_fetch_assoc($querylast2)){
			$emp4 = $getlast2['emp_id'];
		$queryrole4 = mysql_query("SELECT * FROM employee_role_t WHERE emp_id = '$emp4'");
		$getrole4 = mysql_fetch_assoc($queryrole4);
		$role2 = $getrole2['role_id'];
		
		$querypos4 = mysql_query("SELECT * FROM employee_position_t WHERE position_id = '$role4'");
		$getpos4 = mysql_fetch_assoc($querypos4);
		$pos4 = $getpos4['position_type'];
		
		if($pos4 == $category){
			?>
			 <tr>
            <td align="left">
            <a style="text-decoration:none; color:#000" href="eis_admin_view_emp.php?emp_id=<?php echo $emp4; ?>"><?php echo $getlast2['f_name'].'&nbsp;'.$getlast2['m_name'].'&nbsp;'.$getlast2['l_name'];?></a>
            </td>
            <td align="right">
          <?php   $querypicname11= mysql_query("SELECT * FROM eis_pic_t WHERE emp_id = '$emp4'");
	  $getpicname11 = mysql_fetch_assoc($querypicname11);
	  $picname11 = $getpicname11['pic_name'];
	  
			?>
        <img src="../eis/include/dpic/<?php echo $picname11 ?>" height="65px" width="75px" />
        
           </td>
            </tr>
            <?php
		}
		
			
		}
		
		}
		}
		
	}
?>

</table>
<?php
}
?>
</body>
</html>