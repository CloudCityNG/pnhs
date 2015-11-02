
 <?php
 			require_once('../db/db.php');
			$id=$_GET['id'];
			if ( ! isset($_FILES['image']))
			{
				
			}
			
			else 
			{
			$image=addslashes($_FILES["image"]["tmp_name"]);
			$image_name = $_FILES["image"]["name"];
			$type = $_FILES["image"]["type"];
			$size = $_FILES["image"]["size"];
			$temp = $_FILES["image"]["tmp_name"];
			$error = $_FILES["image"]["error"];
			
			
			if($size == FALSE)
			echo "this is not an image"; 
			
			else
			{
			move_uploaded_file($temp,'../-registration/large/'.$image_name);
							// *** Include the class
							include_once ("resize-class.php");
			
							// *** 1) Initialise / load image
							$resizeObj = new resize('../-registration/large/'.$image_name);
			
							// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
							$resizeObj -> resizeImage(180, 180, 'crop');
			
							// *** 3) Save image
							$resizeObj -> saveImage('../-registration/include/dpic/'.$image_name, 100);
			
						//query img to db
			
			$update = mysql_query("UPDATE student_t SET photo='$image_name' WHERE student_id='$id'") or die(mysql_error());
					}
			echo $image_name;
			echo "<img src='../-registration/include/dpic/$image_name' />";

			
			}
		header ("Location: account2.php?call_no=$id");
			
			?>
            
        

