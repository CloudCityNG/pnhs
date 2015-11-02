<?php 
include("../db/db.php");


if(isset($_POST['Change'])){
  	$emp_id=$_POST['emp_id'];
	echo $emp_id;
	$pic=$_POST['dpic_usr'];
	
	// UPDATE IMAGE ---- Working
		$img_name = $_FILES["dpic_usr"]["name"];
		$type = $_FILES["dpic_usr"]["type"];
		$size = $_FILES["dpic_usr"]["size"];
		$temp = $_FILES["dpic_usr"]["tmp_name"];
		$error = $_FILES["dpic_usr"]["error"];
		move_uploaded_file($temp,"include/dpic/".$img_name.$emp_id);
				// *** Include the class
				include("resize-class.php");

				// *** 1) Initialise / load image
				$resizeObj = new resize('include/dpic/'.$img_name.$emp_id);

				// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
				$resizeObj -> resizeImage(137, 175, 'crop');

				// *** 3) Save image
				$resizeObj -> saveImage('include/dpic/'.$img_name.$emp_id, 100);
			//query img to db

			$usr_img ="UPDATE `eis_pic_t` SET `pic_name`='$img_name$emp_id' WHERE `emp_id`='$emp_id'";
			mysql_query($usr_img) or die(mysql_error());

			header("location: eis_admin_view_emp.php?emp_id=$emp_id");

}


?>