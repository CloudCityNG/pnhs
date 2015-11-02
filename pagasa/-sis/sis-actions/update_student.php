 
 <?php
 
	
	mysql_connect("localhost","root","");
	mysql_select_db("pagasa");
	
if(isset($_GET['student_id'])){
	$student_id = $_GET['student_id'];

		date_default_timezone_set("Asia/Manila");
		if(isset($_POST['Update'])){
			$fname =$_POST['f_name'];
			$mname=$_POST['m_name'];
			$lname=$_POST['l_name'];
			$birthdate =$_POST['birthdate'];
			$city=$_POST['city'];
			$prov=$_POST['province'];
			$zipcode=$_POST['zipcode'];
			$brgy=$_POST['barangay'];
			$street=$_POST['street'];
		if(isset($_POST['gender'])){
			$gender=$_POST['gender'];
		}
		else{
			$gender=NULL;
		}
			$name_of_parent=$_POST['name_of_parent_guardian'];
		if(isset($_POST['Relation'])){
			$relation=$_POST['Relation'];}
		else{
			$relation=NULL;
			}
			$scholarship=$_POST['scholarship'];
			$last_sch_attended=$_POST['name_of_last_sch_attended'];
			$exam_result=$_POST['exam_result'];
			$dateEnrolled= date("Y-m-d");
		}
		
		if(isset($_POST['Update'])) {


		   
				$query_stud = mysql_query("UPDATE student_t SET f_name='$fname', m_name='$mname',  l_name='$lname', birthdate='$birthdate', city_municipality='$city', province='$prov', zip_code='$zipcode', barangay='$brgy', street='$street',  name_of_parent_guardian='$name_of_parent', relation_to_student='$relation', gender='$gender', scholarship='$scholarship', name_of_last_school_attended='$last_sch_attended', exam_result='$exam_result' WHERE student_id = '$student_id'") or die(mysql_error());

		}

	header("location: ../sis-admin-students.php");
	
}
?>