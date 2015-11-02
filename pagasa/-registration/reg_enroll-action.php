 <?php 
						require "../db/db.php";
						
						if(isset($_POST['Enroll'])){
							
							$schyr_id=$_POST['schyr_id'];
							$name1=$_POST['name1'];
							for($i=0; $i<sizeof($name1); $i++){
								$query_add=mysql_query("SELECT * FROM student_registration_t WHERE student_id='{$name1[$i]}'");
							while($row_add=mysql_fetch_assoc($query_add)){
								$lvl_id=$row_add['year_level'];
								$query_comp=mysql_query("SELECT * FROM year_level_t WHERE lvl_id='$lvl_id'");
							while($row_comp=mysql_fetch_assoc($query_comp)){
								$yr_level=$row_comp['year_lvl'];
										}
									}
								$yr_level++;
								
								$query_yrlvl=mysql_query("SELECT * FROM year_level_t WHERE year_lvl=$yr_level");
								$row_yrlvl=mysql_fetch_assoc($query_yrlvl);
								$yrLvl=$row_yrlvl['lvl_id'];
								
									$date= date('Y-m-d');
									$query_update=mysql_query("UPDATE student_t SET student_type='returning' where student_id='{$name1[$i]}'");
									$query_insert=mysql_query("INSERT INTO student_registration_t VALUES('', '{$name1[$i]}', null, null, '$date', '$schyr_id', '$yrLvl')") or die ("mali    {$name1[$i]}=='$schyr_id', '$yr_level'");
									$query_fg=mysql_query("INSERT INTO final_grade_t VALUES('', '{$name1[$i]}', '$schyr_id',null)") or die("error");
								
									}
								
								
								} 
								
								echo $yr_level;
								echo "<script type='text/javascript'>
										alert('Successfully Enrolled!');
										</script>";
	
								header ("Location: ../-registration/reg_listofenrolledstudents.php")
								
								
								?>                 